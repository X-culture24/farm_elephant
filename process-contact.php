<?php
// Contact Form Processing Script for DNR Elephant Farm Dairy

// Enable error reporting for development (remove in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: contact.php');
    exit;
}

// Sanitize and validate input data
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Get form data
$firstName = sanitizeInput($_POST['first_name'] ?? '');
$lastName = sanitizeInput($_POST['last_name'] ?? '');
$email = sanitizeInput($_POST['email'] ?? '');
$phone = sanitizeInput($_POST['phone'] ?? '');
$subject = sanitizeInput($_POST['subject'] ?? '');
$message = sanitizeInput($_POST['message'] ?? '');
$newsletter = isset($_POST['newsletter']) ? 1 : 0;

// Validation
$errors = [];

if (empty($firstName)) {
    $errors[] = 'First name is required';
}

if (empty($lastName)) {
    $errors[] = 'Last name is required';
}

if (empty($email)) {
    $errors[] = 'Email is required';
} elseif (!validateEmail($email)) {
    $errors[] = 'Invalid email format';
}

if (empty($subject)) {
    $errors[] = 'Subject is required';
}

if (empty($message)) {
    $errors[] = 'Message is required';
}

// If there are validation errors, redirect back with errors
if (!empty($errors)) {
    session_start();
    $_SESSION['contact_errors'] = $errors;
    $_SESSION['contact_data'] = $_POST;
    header('Location: contact.php');
    exit;
}

// Prepare email content
$to = 'info@dnrelephantfarm.com'; // Replace with actual email
$emailSubject = 'New Contact Form Submission - ' . $subject;

$emailBody = "
New contact form submission from DNR Elephant Farm Dairy website:

Name: {$firstName} {$lastName}
Email: {$email}
Phone: {$phone}
Subject: {$subject}
Newsletter Subscription: " . ($newsletter ? 'Yes' : 'No') . "

Message:
{$message}

---
Submitted on: " . date('Y-m-d H:i:s') . "
IP Address: " . $_SERVER['REMOTE_ADDR'] . "
";

$headers = "From: noreply@dnrelephantfarm.com\r\n";
$headers .= "Reply-To: {$email}\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Send email
$mailSent = mail($to, $emailSubject, $emailBody, $headers);

// Log the submission (optional)
$logEntry = date('Y-m-d H:i:s') . " - Contact form submission from {$firstName} {$lastName} ({$email})\n";
file_put_contents('contact_log.txt', $logEntry, FILE_APPEND | LOCK_EX);

// Database storage (optional - uncomment and configure if needed)
/*
try {
    $pdo = new PDO('mysql:host=localhost;dbname=dnr_dairy', $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $pdo->prepare("
        INSERT INTO contact_submissions 
        (first_name, last_name, email, phone, subject, message, newsletter, submitted_at) 
        VALUES (?, ?, ?, ?, ?, ?, ?, NOW())
    ");
    
    $stmt->execute([$firstName, $lastName, $email, $phone, $subject, $message, $newsletter]);
    
} catch (PDOException $e) {
    error_log("Database error: " . $e->getMessage());
}
*/

// Set success message
session_start();
if ($mailSent) {
    $_SESSION['contact_success'] = 'Thank you for your message! We will get back to you soon.';
} else {
    $_SESSION['contact_error'] = 'Sorry, there was an error sending your message. Please try again or contact us directly.';
}

// Redirect back to contact page
header('Location: contact.php');
exit;
?>
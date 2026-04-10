<?php
// Auto Image Loading Script for DNR Elephant Farm Dairy

header('Content-Type: application/json');

function getImagesFromFolder($folder) {
    $allowed_extensions = ['png', 'jpg', 'jpeg', 'gif', 'webp'];
    $images = [];
    
    $folder_path = "assets/images/" . $folder . "/";
    
    if (is_dir($folder_path)) {
        $files = scandir($folder_path);
        
        foreach ($files as $file) {
            if ($file != "." && $file != "..") {
                $file_extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                
                if (in_array($file_extension, $allowed_extensions)) {
                    $images[] = $folder_path . $file;
                }
            }
        }
    }
    
    return $images;
}

// Get folder parameter
$folder = isset($_GET['folder']) ? $_GET['folder'] : '';

if (empty($folder)) {
    echo json_encode(['error' => 'No folder specified']);
    exit;
}

// Sanitize folder name
$folder = preg_replace('/[^a-zA-Z0-9_-]/', '', $folder);

// Get images from specified folder
$images = getImagesFromFolder($folder);

// Return JSON response
echo json_encode($images);
?>
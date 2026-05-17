<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title : 'DNR Elephant Farm Dairy'; ?></title>

    <?php
    // Detect base URL dynamically
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
    // Find the web root relative path
    $scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
    // Walk up to find the root (where index.php lives)
    $rootPath = rtrim(str_replace('/shop', '', $scriptDir), '/');
    $GLOBALS['site_root'] = $protocol . '://' . $host . $rootPath;
    $siteRoot = $GLOBALS['site_root'];
    ?>

    <!-- Fonts - DM Sans (Spotify-style clean font) -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&family=DM+Serif+Display:ital@0;1&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- AOS Animation CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= $siteRoot ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= $siteRoot ?>/assets/css/animations.css">
    <link rel="stylesheet" href="<?= $siteRoot ?>/assets/css/responsive.css">
</head>
<body class="<?php echo isset($page_class) ? $page_class : ''; ?>">

    <!-- Navigation -->
    <?php include __DIR__ . '/navbar.php'; ?>

    <main id="main-content">
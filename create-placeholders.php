<?php
// Placeholder Image Generator for DNR Elephant Farm Dairy
// Run this script once to create sample placeholder images

// Image dimensions for different sections
$imageSizes = [
    'hero' => ['width' => 1920, 'height' => 1080],
    'farm' => ['width' => 800, 'height' => 600],
    'cows' => ['width' => 600, 'height' => 400],
    'services' => ['width' => 400, 'height' => 300],
    'gallery' => ['width' => 600, 'height' => 400],
    'statistics' => ['width' => 1920, 'height' => 800],
    'technology' => ['width' => 800, 'height' => 600],
    'community' => ['width' => 800, 'height' => 600],
    'partners' => ['width' => 200, 'height' => 100],
    'logo' => ['width' => 200, 'height' => 80]
];

// Colors for different image types
$colors = [
    'hero' => [45, 90, 39],      // Dark green
    'farm' => [74, 124, 89],     // Medium green
    'cows' => [139, 69, 19],     // Brown
    'services' => [46, 125, 50], // Green (was steel blue)
    'gallery' => [60, 179, 113],  // Medium sea green
    'statistics' => [27, 94, 32], // Dark green (was midnight blue)
    'technology' => [105, 105, 105], // Dim gray
    'community' => [218, 165, 32],   // Golden rod
    'partners' => [220, 220, 220],   // Light gray
    'logo' => [45, 90, 39]           // Dark green
];

function createPlaceholderImage($width, $height, $color, $text, $filename) {
    // Create image with true color for better quality
    $image = imagecreatetruecolor($width, $height);
    
    // Set colors
    $bgColor = imagecolorallocate($image, $color[0], $color[1], $color[2]);
    $textColor = imagecolorallocate($image, 255, 255, 255); // White text
    
    // Fill background
    imagefill($image, 0, 0, $bgColor);
    
    // Use imagestring for text (more reliable)
    $x = ($width - strlen($text) * 10) / 2;
    $y = ($height - 15) / 2;
    imagestring($image, 5, $x, $y, $text, $textColor);
    
    // Save as PNG
    imagepng($image, $filename);
    imagedestroy($image);
    
    return file_exists($filename);
}

// Create directory structure if it doesn't exist
$directories = [
    'assets/images/hero',
    'assets/images/farm',
    'assets/images/cows',
    'assets/images/services/milk',
    'assets/images/services/breeding',
    'assets/images/services/advisory',
    'assets/images/services/tourism',
    'assets/images/services/fodder',
    'assets/images/services/training',
    'assets/images/gallery/herd',
    'assets/images/gallery/machinery',
    'assets/images/gallery/facilities',
    'assets/images/partners',
    'assets/images/statistics',
    'assets/images/technology',
    'assets/images/community',
    'assets/images/about',
    'assets/images/heritage',
    'assets/images/clean-milk',
    'assets/images/logo'
];

foreach ($directories as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// Generate placeholder images
$placeholders = [
    // Hero images
    'assets/images/hero/hero-1.png' => ['hero', 'DNR Elephant Farm Dairy'],
    'assets/images/hero/hero-2.png' => ['hero', 'Premium Dairy Excellence'],
    
    // Farm images
    'assets/images/farm/farm-overview.png' => ['farm', 'Farm Overview'],
    'assets/images/farm/pasture.png' => ['farm', 'Green Pastures'],
    
    // Cow images
    'assets/images/cows/dairy-cattle-1.png' => ['cows', 'Dairy Cattle'],
    'assets/images/cows/dairy-cattle-2.png' => ['cows', 'Healthy Herd'],
    
    // Service images
    'assets/images/services/milk/raw-milk.png' => ['services', 'Raw Milk Supply'],
    'assets/images/services/breeding/breeding-stock.png' => ['services', 'Breeding Stock'],
    'assets/images/services/advisory/genetics-advisory.png' => ['services', 'Genetics Advisory'],
    'assets/images/services/tourism/agri-tourism.png' => ['services', 'Agri Tourism'],
    'assets/images/services/fodder/fodder-supply.png' => ['services', 'Fodder Supply'],
    'assets/images/services/training/training-program.png' => ['services', 'Training Programs'],
    
    // Gallery images
    'assets/images/gallery/herd/herd-1.png' => ['gallery', 'Healthy Herd'],
    'assets/images/gallery/herd/herd-2.png' => ['gallery', 'Grazing Cattle'],
    'assets/images/gallery/herd/herd-3.png' => ['gallery', 'Premium Cattle'],
    'assets/images/gallery/machinery/milking-system.png' => ['gallery', 'Milking System'],
    'assets/images/gallery/machinery/farm-equipment.png' => ['gallery', 'Farm Equipment'],
    'assets/images/gallery/machinery/technology.png' => ['gallery', 'Modern Technology'],
    'assets/images/gallery/facilities/dairy-facility.png' => ['gallery', 'Dairy Facility'],
    'assets/images/gallery/facilities/storage-facility.png' => ['gallery', 'Storage Facility'],
    'assets/images/gallery/facilities/processing-plant.png' => ['gallery', 'Processing Plant'],
    
    // Partner logos (simplified to 3 general partners)
    'assets/images/partners/partner-1.png' => ['partners', 'Partner 1'],
    'assets/images/partners/partner-2.png' => ['partners', 'Partner 2'],
    'assets/images/partners/partner-3.png' => ['partners', 'Partner 3'],
    'assets/images/partners/partner-4.png' => ['partners', 'Partner 4'],
    
    // Engineered by Principle
    'assets/images/engineered-principle/principle.png' => ['farm', 'Engineered by Principle'],
    
    // Other images
    'assets/images/statistics/stats-bg.png' => ['statistics', 'Statistics'],
    'assets/images/technology/tech-overview.png' => ['technology', 'Technology'],
    'assets/images/community/community.png' => ['community', 'Community'],
    'assets/images/about/about-us.png' => ['farm', 'About Us'],
    'assets/images/heritage/heritage.png' => ['farm', 'Our Heritage'],
    'assets/images/clean-milk/clean-milk-bg.png' => ['statistics', 'Clean Milk'],
    'assets/images/logo/logo.png' => ['logo', 'DNR'],
    'assets/images/logo/logo-white.png' => ['logo', 'DNR'],
];

echo "<h2>Creating Placeholder Images for DNR Elephant Farm Dairy</h2>\n";
echo "<ul>\n";

$created = 0;
$total = count($placeholders);

foreach ($placeholders as $filename => $config) {
    $type = $config[0];
    $text = $config[1];
    
    $size = $imageSizes[$type];
    $color = $colors[$type];
    
    if (createPlaceholderImage($size['width'], $size['height'], $color, $text, $filename)) {
        echo "<li>✓ Created: {$filename}</li>\n";
        $created++;
    } else {
        echo "<li>✗ Failed: {$filename}</li>\n";
    }
}

echo "</ul>\n";
echo "<p><strong>Summary:</strong> Created {$created} out of {$total} placeholder images.</p>\n";

if ($created === $total) {
    echo "<p style='color: green;'>✓ All placeholder images created successfully!</p>\n";
    echo "<p>You can now view your website with sample images. Replace these placeholders with actual photos.</p>\n";
} else {
    echo "<p style='color: orange;'>⚠ Some images could not be created. Check file permissions and GD library availability.</p>\n";
}

echo "<p><a href='index.php'>→ View Website</a></p>\n";
?>
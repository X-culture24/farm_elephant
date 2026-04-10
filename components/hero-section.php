<?php
// Auto-load hero images
$hero_images = glob("assets/images/hero/*");
$clean_milk_images = glob("assets/images/clean-milk/*");
$farm_images = glob("assets/images/farm/*");
$cow_images = glob("assets/images/cows/*");

// Combine all images for carousel
$all_carousel_images = array_merge($clean_milk_images, $farm_images, $cow_images);
$carousel_images = array_slice($all_carousel_images, 0, 3);
?>

<section class="hero-section" id="heroCarouselSection">
    <div class="hero-carousel-container">
        <div class="carousel slide" id="heroCarousel" data-bs-ride="carousel" data-bs-interval="4000">
            <div class="carousel-inner">
                <?php
                if (!empty($carousel_images)):
                    foreach ($carousel_images as $index => $image): ?>
                        <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>" style="background-image: url('<?php echo $image; ?>');">
                            <div class="hero-overlay-light"></div>
                        </div>
                    <?php endforeach;
                else: ?>
                    <div class="carousel-item active" style="background-image: url('assets/images/hero/default-hero.png');">
                        <div class="hero-overlay-light"></div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row min-vh-100 align-items-center">
            <div class="col-lg-8">
                <div class="hero-content" data-aos="fade-up" data-aos-duration="1000">
                    <h1 class="hero-title display-1 mb-4">
                        Elevating Standards in Kenya's Milk Production
                    </h1>
                    <p class="hero-subtitle h4 mb-5">
                        We are a family-owned dairy farm built on a foundation of science, innovation, and unwavering discipline.
                    </p>
                    <div class="hero-buttons">
                        <a href="about.php" class="btn btn-primary btn-lg me-3" data-aos="fade-up" data-aos-delay="200">
                            Learn More
                        </a>
                        <a href="contact.php" class="btn btn-outline-light btn-lg" data-aos="fade-up" data-aos-delay="400">
                            Contact Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="scroll-indicator" data-aos="fade-up" data-aos-delay="800">
        <div class="scroll-mouse">
            <div class="scroll-wheel"></div>
        </div>
        <p class="scroll-text text-white">Scroll Down</p>
    </div>
</section>
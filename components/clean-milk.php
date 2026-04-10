<?php
// Auto-load clean milk section images
$clean_milk_images = glob("assets/images/clean-milk/*");
?>

<section class="clean-milk-section py-5 bg-white">
    <div class="container">
        <div class="row align-items-center g-5">
            <!-- Image Slider -->
            <div class="col-lg-6" data-aos="fade-right">
                <div class="clean-milk-slider">
                    <div class="carousel slide" id="cleanMilkCarousel" data-bs-ride="carousel" data-bs-interval="4000">
                        <div class="carousel-inner">
                            <?php
                            if (!empty($clean_milk_images)):
                                foreach (array_slice($clean_milk_images, 0, 3) as $index => $image): ?>
                                    <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                                        <img src="<?php echo $image; ?>" alt="Clean Milk Process" class="img-fluid rounded shadow" style="height: 450px; object-fit: cover; width: 100%;">
                                    </div>
                                <?php endforeach;
                            else: ?>
                                <div class="carousel-item active">
                                    <div class="placeholder-image bg-light rounded d-flex align-items-center justify-content-center" style="height: 450px;">
                                        <div class="text-center text-muted">
                                            <i class="fas fa-image fa-3x mb-3"></i>
                                            <p>Clean Milk Process Image</p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#cleanMilkCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#cleanMilkCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Text Content -->
            <div class="col-lg-6" data-aos="fade-left">
                <div class="clean-milk-content">
                    <h2 class="display-4 mb-4" style="color: #2d5a27;">Clean Milk Excellence</h2>
                    <p class="lead text-muted mb-4">
                        As we expand our value chain offering, we are actively exploring long-term referral partnerships, premium raw milk agreements, and integrated quality-assured frameworks.
                    </p>
                    
                    <div class="clean-features mb-5">
                        <div class="feature-item d-flex align-items-start mb-4">
                            <div class="feature-icon me-3">
                                <i class="fas fa-microscope fa-2x" style="color: #d4af37;"></i>
                            </div>
                            <div class="feature-content">
                                <h5 class="mb-2">Laboratory Tested</h5>
                                <p class="text-muted mb-0">Every batch undergoes comprehensive laboratory testing for purity, quality, and safety standards.</p>
                            </div>
                        </div>
                        
                        <div class="feature-item d-flex align-items-start mb-4">
                            <div class="feature-icon me-3">
                                <i class="fas fa-snowflake fa-2x" style="color: #8B6F47;"></i>
                            </div>
                            <div class="feature-content">
                                <h5 class="mb-2">Cold Chain Integrity</h5>
                                <p class="text-muted mb-0">Unbroken cold chain from milking to delivery ensures freshness and extends shelf life.</p>
                            </div>
                        </div>
                        
                        <div class="feature-item d-flex align-items-start">
                            <div class="feature-icon me-3">
                                <i class="fas fa-certificate fa-2x" style="color: #d4af37;"></i>
                            </div>
                            <div class="feature-content">
                                <h5 class="mb-2">Certified Quality</h5>
                                <p class="text-muted mb-0">International certifications and compliance with the highest dairy industry standards.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="clean-milk-stats row g-3 mb-5">
                        <div class="col-6">
                            <div class="stat-box text-center p-3 rounded" style="background: #f8fdf8; border: 2px solid #d4af37;">
                                <h4 style="color: #d4af37;" class="mb-1">99.9%</h4>
                                <p class="text-muted small mb-0">Purity Level</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="stat-box text-center p-3 rounded" style="background: #f8fdf8; border: 2px solid #8B6F47;">
                                <h4 style="color: #8B6F47;" class="mb-1">4°C</h4>
                                <p class="text-muted small mb-0">Storage Temp</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="cta-buttons">
                        <a href="services.php" class="btn btn-primary btn-lg me-3">
                            Learn More
                        </a>
                        <a href="contact.php" class="btn btn-outline-primary btn-lg">
                            Contact Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
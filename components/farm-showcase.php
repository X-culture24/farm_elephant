<?php
// Auto-load farm showcase images
$farm_images = glob("assets/images/farm/*");
$cow_images = glob("assets/images/cows/*");
$gallery_images = glob("assets/images/gallery/facilities/*");
$all_showcase_images = array_merge($farm_images, $cow_images, $gallery_images);
$showcase_images = array_slice($all_showcase_images, 0, 4);
?>

<section class="farm-showcase" style="background: #ffffff; padding: 0; margin: 0;">
    <div class="container" style="padding-top: 1rem; padding-bottom: 1rem;">
        <div class="row align-items-center g-2">
            <!-- Left Side - Image Slider -->
            <div class="col-lg-6" data-aos="fade-right">
                <div class="showcase-slider" style="min-height: 300px;">
                    <div class="carousel slide" id="showcaseCarousel" data-bs-ride="carousel" data-bs-interval="4000">
                        <div class="carousel-inner" style="min-height: 300px;">
                            <?php
                            if (!empty($showcase_images)):
                                foreach ($showcase_images as $index => $image): ?>
                                    <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>" style="min-height: 300px;">
                                        <img src="<?php echo $image; ?>" alt="Elephant Farm Dairy" class="img-fluid rounded shadow" style="height: 300px; object-fit: cover; width: 100%; display: block;">
                                    </div>
                                <?php endforeach;
                            else: ?>
                                <div class="carousel-item active" style="min-height: 300px;">
                                    <div class="placeholder-image bg-light d-flex align-items-center justify-content-center rounded" style="height: 300px;">
                                        <div class="text-center text-muted">
                                            <i class="fas fa-image fa-5x mb-3"></i>
                                            <p>Farm Images</p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#showcaseCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#showcaseCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Right Side - Information -->
            <div class="col-lg-6" data-aos="fade-left">
                <div class="showcase-content" style="padding: 0;">
                    <h2 class="section-title mb-2" style="color: #2d5a27;">Our Farm Operations</h2>
                    <p class="lead mb-3" style="color: #2c3e50; line-height: 1.8; font-size: 1rem;">
                        At Elephant Farm Dairy, we operate a state-of-the-art facility designed for precision, efficiency, and animal welfare. Our fully mechanised systems ensure consistent quality while maintaining the highest standards of hygiene and care.
                    </p>
                    
                    <div class="showcase-features">
                        <div class="feature-block d-flex align-items-start mb-2">
                            <div class="feature-icon me-3">
                                <i class="fas fa-cogs fa-2x" style="color: #d4af37;"></i>
                            </div>
                            <div class="feature-text">
                                <h5 style="color: #2d5a27; font-weight: 600; margin-bottom: 0.3rem;">Advanced Mechanisation</h5>
                                <p style="color: #6c757d; margin: 0; font-size: 0.9rem;">State-of-the-art DeLaval milking systems eliminate human contact and ensure uniform handling for every cow, every time.</p>
                            </div>
                        </div>
                        
                        <div class="feature-block d-flex align-items-start mb-2">
                            <div class="feature-icon me-3">
                                <i class="fas fa-thermometer-half fa-2x" style="color: #8B6F47;"></i>
                            </div>
                            <div class="feature-text">
                                <h5 style="color: #2d5a27; font-weight: 600; margin-bottom: 0.3rem;">Cold Chain Excellence</h5>
                                <p style="color: #6c757d; margin: 0; font-size: 0.9rem;">Milk is cooled immediately and maintained at optimal temperatures throughout storage and transit, preserving freshness and quality.</p>
                            </div>
                        </div>
                        
                        <div class="feature-block d-flex align-items-start">
                            <div class="feature-icon me-3">
                                <i class="fas fa-heartbeat fa-2x" style="color: #d4af37;"></i>
                            </div>
                            <div class="feature-text">
                                <h5 style="color: #2d5a27; font-weight: 600; margin-bottom: 0.3rem;">Animal Health & Welfare</h5>
                                <p style="color: #6c757d; margin: 0; font-size: 0.9rem;">Continuous monitoring and veterinary oversight ensure our cattle receive preventive care, optimal nutrition, and comfortable living conditions.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

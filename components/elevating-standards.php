<section class="elevating-standards py-5 bg-white">
    <div class="container">
        <div class="row align-items-center g-5">
            <!-- Image Slider -->
            <div class="col-lg-6" data-aos="fade-right">
                <div class="elevating-slider">
                    <div class="carousel slide" id="elevatingCarousel" data-bs-ride="carousel" data-bs-interval="4000">
                        <div class="carousel-inner">
                            <?php
                            $farm_images = glob("assets/images/farm/*");
                            $cow_images = glob("assets/images/cows/*");
                            $all_images = array_merge($farm_images, $cow_images);
                            
                            if (!empty($all_images)):
                                foreach (array_slice($all_images, 0, 3) as $index => $image): ?>
                                    <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                                        <img src="<?php echo $image; ?>" alt="Farm Image" class="img-fluid rounded shadow" style="height: 400px; object-fit: cover; width: 100%;">
                                    </div>
                                <?php endforeach;
                            else: ?>
                                <div class="carousel-item active">
                                    <div class="placeholder-image bg-light rounded d-flex align-items-center justify-content-center" style="height: 400px;">
                                        <div class="text-center text-muted">
                                            <i class="fas fa-image fa-3x mb-3"></i>
                                            <p>Farm Image</p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#elevatingCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#elevatingCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Text Content -->
            <div class="col-lg-6" data-aos="fade-left">
                <div class="elevating-content">
                    <h2 class="display-4 mb-4" style="color: #2d5a27;">Elevating Standards</h2>
                    <p class="lead text-muted mb-4">
                        We are committed to raising the bar in dairy farming through innovative practices, sustainable methods, and unwavering dedication to quality at every step of our process.
                    </p>
                    
                    <div class="elevating-features">
                        <div class="feature-item d-flex align-items-start mb-4">
                            <div class="feature-icon me-3">
                                <i class="fas fa-leaf fa-2x" style="color: #2d5a27;"></i>
                            </div>
                            <div class="feature-content">
                                <h5 class="mb-2">Sustainable Practices</h5>
                                <p class="text-muted mb-0">Environmental stewardship through regenerative farming methods that preserve our land for future generations.</p>
                            </div>
                        </div>
                        
                        <div class="feature-item d-flex align-items-start mb-4">
                            <div class="feature-icon me-3">
                                <i class="fas fa-award fa-2x" style="color: #8B6F47;"></i>
                            </div>
                            <div class="feature-content">
                                <h5 class="mb-2">Quality Assurance</h5>
                                <p class="text-muted mb-0">Rigorous testing and monitoring ensure every product meets the highest international quality standards.</p>
                            </div>
                        </div>
                        
                        <div class="feature-item d-flex align-items-start">
                            <div class="feature-icon me-3">
                                <i class="fas fa-heart fa-2x" style="color: #d4af37;"></i>
                            </div>
                            <div class="feature-content">
                                <h5 class="mb-2">Animal Welfare</h5>
                                <p class="text-muted mb-0">Our cattle receive the best care with spacious facilities, nutritious feed, and regular veterinary attention.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
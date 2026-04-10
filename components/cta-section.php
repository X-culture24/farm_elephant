<section class="cta-section" style="background: linear-gradient(135deg, #1a3d1a 0%, #2d5a27 100%); padding: 4rem 0 3rem 0 !important; margin: 0 !important; position: relative; z-index: 1;">
    <div class="container">
        <div class="row align-items-center g-5">
            <!-- Left Side - Information -->
            <div class="col-lg-6" data-aos="fade-right">
                <h2 class="display-5 mb-3" style="color: #2c3e50; font-weight: 700;">Ready to Experience Premium Dairy Excellence?</h2>
                <p class="lead mb-4" style="color: #2c3e50; font-weight: 600;">
                    Join hundreds of satisfied customers who trust Elephant Farm Dairy for their premium dairy needs. From fresh milk supply to breeding stock, we're your partner in dairy excellence.
                </p>
                
                <div class="cta-features row g-3 mb-4">
                    <div class="col-md-6">
                        <div class="feature-item d-flex align-items-center">
                            <i class="fas fa-check-circle me-3" style="color: #d4af37; font-size: 1.5rem;"></i>
                            <span style="color: #2c3e50; font-weight: 600; font-size: 1.05rem;">Premium quality guaranteed</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="feature-item d-flex align-items-center">
                            <i class="fas fa-check-circle me-3" style="color: #d4af37; font-size: 1.5rem;"></i>
                            <span style="color: #2c3e50; font-weight: 600; font-size: 1.05rem;">Sustainable farming practices</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="feature-item d-flex align-items-center">
                            <i class="fas fa-check-circle me-3" style="color: #d4af37; font-size: 1.5rem;"></i>
                            <span style="color: #2c3e50; font-weight: 600; font-size: 1.05rem;">Expert consultation available</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="feature-item d-flex align-items-center">
                            <i class="fas fa-check-circle me-3" style="color: #d4af37; font-size: 1.5rem;"></i>
                            <span style="color: #2c3e50; font-weight: 600; font-size: 1.05rem;">Community-focused approach</span>
                        </div>
                    </div>
                </div>
                
                <div class="cta-buttons mb-4">
                    <a href="contact.php" class="btn btn-primary btn-lg me-3 mb-3">
                        <i class="fas fa-phone me-2"></i>
                        Contact Us Today
                    </a>
                    <a href="services.php" class="btn btn-outline-primary btn-lg mb-3">
                        <i class="fas fa-list me-2"></i>
                        View Our Services
                    </a>
                </div>
                
                <div class="cta-contact">
                    <p class="mb-2" style="color: #ffffff; font-weight: 500;">Call us directly:</p>
                    <h4 style="color: #d4af37;">+254 724 345 658</h4>
                </div>
            </div>
            
            <!-- Right Side - Image Slideshow -->
            <div class="col-lg-6" data-aos="fade-left">
                <div class="cta-slideshow">
                    <div class="carousel slide" id="ctaCarousel" data-bs-ride="carousel" data-bs-interval="5000">
                        <div class="carousel-inner">
                            <?php
                            $farm_images = glob("assets/images/farm/*");
                            $cow_images = glob("assets/images/cows/*");
                            $gallery_images = glob("assets/images/gallery/facilities/*");
                            $all_cta_images = array_merge($farm_images, $cow_images, $gallery_images);
                            
                            if (!empty($all_cta_images)):
                                foreach (array_slice($all_cta_images, 0, 5) as $index => $image): ?>
                                    <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                                        <img src="<?php echo $image; ?>" alt="Elephant Farm Dairy" class="img-fluid rounded shadow" style="height: 450px; object-fit: cover; width: 100%;">
                                    </div>
                                <?php endforeach;
                            else: ?>
                                <div class="carousel-item active">
                                    <div class="placeholder-image bg-secondary d-flex align-items-center justify-content-center rounded" style="height: 450px;">
                                        <div class="text-center text-white">
                                            <i class="fas fa-image fa-5x mb-3"></i>
                                            <p>Farm Images</p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#ctaCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#ctaCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Trust Indicators -->
        <div class="row mt-5 pt-5 border-top">
            <div class="col-12" data-aos="fade-up">
                <div class="trust-indicators text-center">
                    <p style="color: #ffffff; font-weight: 500;" class="mb-3">Trusted by leading organizations:</p>
                    <div class="row g-3 align-items-center justify-content-center">
                        <div class="col-auto">
                            <span class="badge px-3 py-2" style="background: #d4af37; color: #2d5a27;">ISO Certified</span>
                        </div>
                        <div class="col-auto">
                            <span class="badge px-3 py-2" style="background: #d4af37; color: #2d5a27;">HACCP Compliant</span>
                        </div>
                        <div class="col-auto">
                            <span class="badge px-3 py-2" style="background: #d4af37; color: #2d5a27;">Organic Certified</span>
                        </div>
                        <div class="col-auto">
                            <span class="badge px-3 py-2" style="background: #d4af37; color: #2d5a27;">25+ Years Experience</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
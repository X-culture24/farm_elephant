<?php
// Auto-load statistics background images
$stats_images = glob("assets/images/statistics/*");
$stats_bg = !empty($stats_images) ? $stats_images[0] : 'assets/images/statistics/default-stats.png';
?>

<section class="statistics-section" style="background: #ffffff; padding: 5rem 0 !important; margin: 0 !important;">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="mb-3" style="color: #2c3e50; font-size: 2.5rem; font-weight: 700;">Activity Logs</h2>
                <p style="color: #6c757d; font-size: 1.1rem;">Real-time performance metrics from our farm operations</p>
            </div>
        </div>
        
        <!-- Statistics Grid -->
        <div class="row text-center g-5">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-box p-4" style="background: #f8f9fa; border-radius: 15px; border: 2px solid #d4af37;">
                    <div class="stat-icon mb-3">
                        <i class="fas fa-calendar-alt fa-3x" style="color: #d4af37;"></i>
                    </div>
                    <h2 class="counter display-3 fw-bold" data-target="25" style="color: #2c3e50;">0</h2>
                    <h4 class="stat-suffix" style="color: #d4af37;">+</h4>
                    <p class="stat-description fw-bold mb-3" style="color: #2c3e50; font-size: 1.2rem;">Years of Excellence</p>
                    <p class="stat-description" style="color: #6c757d;">Years of transforming dairy production in Kenya through precision, purity, and integrity. By growing to a fully mechanised, zero-human-contact system that meets and exceeds global food safety standards.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-box p-4" style="background: #f8f9fa; border-radius: 15px; border: 2px solid #8B6F47;">
                    <div class="stat-icon mb-3">
                        <i class="fas fa-cow fa-3x" style="color: #8B6F47;"></i>
                    </div>
                    <h2 class="counter display-3 fw-bold" data-target="300" style="color: #2c3e50;">0</h2>
                    <h4 class="stat-suffix" style="color: #8B6F47;">+</h4>
                    <p class="stat-description fw-bold mb-3" style="color: #2c3e50; font-size: 1.2rem;">Premium Cattle</p>
                    <p class="stat-description" style="color: #6c757d;">Individual dairy cows with Friesian, Fleckvieh Jersey, and Brahman genetics. They are health monitored, traceable, and selectively added under veterinary oversight.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-box p-4" style="background: #f8f9fa; border-radius: 15px; border: 2px solid #d4af37;">
                    <div class="stat-icon mb-3">
                        <i class="fas fa-tint fa-3x" style="color: #d4af37;"></i>
                    </div>
                    <h2 class="counter display-3 fw-bold" data-target="2200" style="color: #2c3e50;">0</h2>
                    <h4 class="stat-suffix" style="color: #d4af37;">L</h4>
                    <p class="stat-description fw-bold mb-3" style="color: #2c3e50; font-size: 1.2rem;">Daily Production</p>
                    <p class="stat-description" style="color: #6c757d;">Litres of raw milk produced daily from our cows using fully mechanised, zero-human-contact systems. The milk is cooled, tested and supplied to processors under strict cold-chain protocols.</p>
                </div>
            </div>
        </div>
        
        <div class="row mt-5">
            <div class="col-lg-8 mx-auto text-center" data-aos="fade-up" data-aos-delay="500">
                <h3 style="color: #2c3e50; font-size: 2rem;" class="mb-2">SINCE 1999</h3>
                <p class="lead" style="color: #d4af37; font-weight: 600; font-size: 1.3rem;">
                    Pioneering Excellence in Kenyan Dairy
                </p>
            </div>
        </div>
    </div>
</section>
<?php
$page_title = "Technology - Elephant Farm Dairy";
$page_class = "technology-page";
include 'includes/header.php';
?>

<!-- Page Header -->
<section class="page-header py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center" data-aos="fade-up">
                <h1 class="display-4 mb-3">Technological Infrastructure</h1>
                <p class="lead">Our farm is engineered as a controlled dairy environment where every step from milking to coverage is instrumented, monitored, and optimized for performance.</p>
            </div>
        </div>
    </div>
</section>

<!-- Technology Overview -->
<section class="technology-overview py-5">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <h2 class="section-title mb-4">Technological Infrastructure</h2>
                <p class="lead mb-4">
                    <strong>Our farm is engineered as a controlled dairy environment where every step from milking to coverage is instrumented, monitored, and optimized for performance.</strong> Technology is not an add-on; it is the foundation of our hygiene, consistency, and output discipline.
                </p>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <?php
                $tech_images = glob("assets/images/technology/*");
                if (!empty($tech_images)): ?>
                    <img src="<?php echo $tech_images[0]; ?>" alt="Technology Overview" class="img-fluid rounded shadow">
                <?php else: ?>
                    <div class="placeholder-image bg-light rounded d-flex align-items-center justify-content-center" style="height: 400px;">
                        <div class="text-center text-muted">
                            <i class="fas fa-microchip fa-3x mb-3"></i>
                            <p>Technology overview image</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Technology Systems -->
<section class="technology-systems py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Our Technology Systems</h2>
                <p class="lead text-muted">Integrated solutions for modern dairy farming</p>
            </div>
        </div>
        
        <div class="row g-4">
            <!-- Mechanical Milking System -->
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="tech-card bg-white p-4 rounded shadow h-100">
                    <div class="tech-icon mb-3">
                        <i class="fas fa-cogs fa-3x text-primary"></i>
                    </div>
                    <h4 class="mb-3">Mechanised Milking System</h4>
                    <p class="mb-3">
                        <strong>At the core of our operation is a DeLaval milking system, designed to eliminate human contact and ensure uniform handling on every cow.</strong> Each milking session is time-regularised, flow-measured, and connected to a central system that logs herd yield per animal in real time.
                    </p>
                </div>
            </div>
            
            <!-- Maintenance & System Oversight -->
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <div class="tech-card bg-white p-4 rounded shadow h-100">
                    <div class="tech-icon mb-3">
                        <i class="fas fa-tools fa-3x text-primary"></i>
                    </div>
                    <h4 class="mb-3">Maintenance & System Oversight</h4>
                    <p class="mb-3">
                        <strong>Our on-site technician and resident vet monitor all systems daily.</strong> Preventive maintenance schedules reduce downtime and ensure reliability year-round.
                    </p>
                </div>
            </div>
            
            <!-- Cold Chain Integration -->
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                <div class="tech-card bg-white p-4 rounded shadow h-100">
                    <div class="tech-icon mb-3">
                        <i class="fas fa-thermometer-half fa-3x text-primary"></i>
                    </div>
                    <h4 class="mb-3">Cold Chain Integration</h4>
                    <p class="mb-3">
                        <strong>Milk flows into a bulk tank where temperature is maintained throughout storage and transit,</strong> ensuring freshness and eliminating contamination risk.
                    </p>
                </div>
            </div>
            
            <!-- Feed & Input Control -->
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                <div class="tech-card bg-white p-4 rounded shadow h-100">
                    <div class="tech-icon mb-3">
                        <i class="fas fa-leaf fa-3x text-primary"></i>
                    </div>
                    <h4 class="mb-3">Feed & Input Control</h4>
                    <p class="mb-3">
                        <strong>Feed rations are vertically integrated model.</strong> Feed ratios are adjusted based on herd performance, monitored through daily production analytics.
                    </p>
                </div>
            </div>
            
            <!-- Digital Herd Management -->
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="500">
                <div class="tech-card bg-white p-4 rounded shadow h-100">
                    <div class="tech-icon mb-3">
                        <i class="fas fa-mobile-alt fa-3x text-primary"></i>
                    </div>
                    <h4 class="mb-3">Digital Herd Management</h4>
                    <p class="mb-3">
                        <strong>All cows are digitally tagged.</strong> Health, breeding, and productivity records are tracked continuously, allowing for precise veterinary care and performance-based herd optimization.
                    </p>
                </div>
            </div>
            
            <!-- Standards & Compliance -->
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="600">
                <div class="tech-card bg-white p-4 rounded shadow h-100">
                    <div class="tech-icon mb-3">
                        <i class="fas fa-certificate fa-3x text-primary"></i>
                    </div>
                    <h4 class="mb-3">Standards & Compliance</h4>
                    <p class="mb-3">
                        <strong>Our infrastructure is aligned with NEMA regulations.</strong> All milk is independently tested by Bio Food Laboratories, ensuring every batch meets matter-ready safety and quality thresholds.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Health & Animal Genetics -->
<section class="health-genetics py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Health & Animal Genetics</h2>
                <p class="lead text-muted">Advanced genetic management and health monitoring systems</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="genetics-card text-center p-4 bg-white rounded shadow h-100">
                    <div class="genetics-icon mb-3">
                        <i class="fas fa-dna fa-3x text-primary"></i>
                    </div>
                    <h4 class="mb-3">Genetic Precision</h4>
                    <p>
                        <strong>Our herd includes 300+ high-yield dairy cows with Friesian, Fleckvieh Jersey, and Brahman genetics.</strong> They are health monitored, traceable, and selectively added under veterinary oversight.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="genetics-card text-center p-4 bg-white rounded shadow h-100">
                    <div class="genetics-icon mb-3">
                        <i class="fas fa-clipboard-list fa-3x text-primary"></i>
                    </div>
                    <h4 class="mb-3">Traceable Herd Records</h4>
                    <p>
                        <strong>All cows are digitally tagged.</strong> Health, breeding, and productivity records are tracked continuously, allowing for precise veterinary care and performance-based herd optimization.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="genetics-card text-center p-4 bg-white rounded shadow h-100">
                    <div class="genetics-icon mb-3">
                        <i class="fas fa-stethoscope fa-3x text-primary"></i>
                    </div>
                    <h4 class="mb-3">Veterinary Protocols</h4>
                    <p>
                        <strong>Health is managed preventively, not reactively,</strong> through structured protocols, digital tracking, and veterinary oversight. Each litre of milk, each animal, each metric is part of a larger system designed to scale without compromise.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
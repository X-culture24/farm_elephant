<?php
$page_title = "Our Services - Elephant Farm Dairy";
$page_class = "services-page";
include 'includes/header.php';
?>

<!-- Page Header -->
<section class="page-header py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center" data-aos="fade-up">
                <h1 class="display-4 mb-3">What We Do</h1>
                <p class="lead">Every product and service we offer is the outcome of a highly controlled system measured, traceable, and designed for consistency. Our milk and livestock programs meet strict hygiene, yield, and quality benchmarks, built for institutional buyers and scale-ready partners across the regional value chain.</p>
            </div>
        </div>
    </div>
</section>

<!-- Services Grid -->
<section class="services-grid py-5">
    <div class="container">
        <div class="row g-4">
            
            <!-- Raw Milk Supply -->
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-card d-flex align-items-center p-4 bg-white rounded shadow h-100">
                    <div class="service-image me-4">
                        <?php
                        $milk_images = glob("assets/images/services/milk/*");
                        if (!empty($milk_images)): ?>
                            <img src="<?php echo $milk_images[0]; ?>" alt="Raw Milk Supply" class="img-fluid rounded" style="width: 200px; height: 150px; object-fit: cover;">
                        <?php endif; ?>
                    </div>
                    <div class="service-content">
                        <h4 class="text-primary mb-3">Raw Milk Supply</h4>
                        <p class="text-muted mb-3">
                            We deliver over 2,200 litres of raw milk daily, produced through a fully mechanised, zero-human-contact system. Milk is cooled, tested and supplied to processors under strict cold-chain protocols.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Breeding Stock -->
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-card d-flex align-items-center p-4 bg-white rounded shadow h-100">
                    <div class="service-content me-4">
                        <h4 class="text-primary mb-3">Breeding Stock</h4>
                        <p class="text-muted mb-3">
                            Our herd includes 300+ high-yield dairy cows with Friesian, with Fleckvieh Jersey, and Brahman genetics. They are health monitored, traceable, and selectively add under veterinary oversight.
                        </p>
                    </div>
                    <div class="service-image">
                        <?php
                        $breeding_images = glob("assets/images/services/breeding/*");
                        if (!empty($breeding_images)): ?>
                            <img src="<?php echo $breeding_images[0]; ?>" alt="Breeding Stock" class="img-fluid rounded" style="width: 200px; height: 150px; object-fit: cover;">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <!-- Breeding & Genetics Advisory -->
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-card d-flex align-items-center p-4 bg-white rounded shadow h-100">
                    <div class="service-image me-4">
                        <?php
                        $advisory_images = glob("assets/images/services/advisory/*");
                        if (!empty($advisory_images)): ?>
                            <img src="<?php echo $advisory_images[0]; ?>" alt="Genetics Advisory" class="img-fluid rounded" style="width: 200px; height: 150px; object-fit: cover;">
                        <?php endif; ?>
                    </div>
                    <div class="service-content">
                        <h4 class="text-primary mb-3">Breeding & Genetics Advisory</h4>
                        <p class="text-muted mb-3">
                            We offer breeding advisory to partners, covering feed efficiency, genetic selection, cross-breeding strategy, and disease resistance based on live herd and expert management.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Agri Tourism & Training -->
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                <div class="service-card d-flex align-items-center p-4 bg-white rounded shadow h-100">
                    <div class="service-content me-4">
                        <h4 class="text-primary mb-3">Agri-Tourism & Training</h4>
                        <p class="text-muted mb-3">
                            We provide structured access for training institutions, partners, and educational groups to observe modern dairy systems and sustainable practices in action.
                        </p>
                    </div>
                    <div class="service-image">
                        <?php
                        $tourism_images = glob("assets/images/services/tourism/*");
                        if (!empty($tourism_images)): ?>
                            <img src="<?php echo $tourism_images[0]; ?>" alt="Agri Tourism" class="img-fluid rounded" style="width: 200px; height: 150px; object-fit: cover;">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <!-- Fodder Supply -->
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="500">
                <div class="service-card d-flex align-items-center p-4 bg-white rounded shadow h-100">
                    <div class="service-image me-4">
                        <?php
                        $fodder_images = glob("assets/images/services/fodder/*");
                        if (!empty($fodder_images)): ?>
                            <img src="<?php echo $fodder_images[0]; ?>" alt="Fodder Supply" class="img-fluid rounded" style="width: 200px; height: 150px; object-fit: cover;">
                        <?php endif; ?>
                    </div>
                    <div class="service-content">
                        <h4 class="text-primary mb-3">Fodder Supply</h4>
                        <p class="text-muted mb-3">
                            We are building a controlled organic fodder program through our vertically integrated model. The goal is to supply Kenya's bio-feed brands, with consistent, nutrient-rich feeds.
                        </p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center" data-aos="fade-up">
                <h2 class="display-5 mb-4">Ready to Partner with Us?</h2>
                <p class="lead mb-4">
                    Contact us today to learn more about our services and how we can support your dairy farming needs.
                </p>
                <a href="contact.php" class="btn btn-light btn-lg">Get In Touch</a>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
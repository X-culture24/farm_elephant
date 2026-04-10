<?php
$page_title = "About Us - Elephant Farm Dairy";
$page_class = "about-page";
include 'includes/header.php';
?>

<!-- Page Header -->
<section class="page-header py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center" data-aos="fade-up">
                <h1 class="display-4 mb-3">About Elephant Farm Dairy</h1>
                <p class="lead">Who We Are and How We Operate</p>
            </div>
        </div>
    </div>
</section>

<!-- Farm Overview -->
<section class="farm-overview py-5">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <h2 class="section-title mb-4">Who We Are and How We Operate</h2>
                <p class="lead mb-4">
                    We are a family-owned dairy farm built on a foundation of science, innovation, and unwavering discipline. Founded in 1999 by a visionary mind, the Elephant Farm was established with a singular purpose: to transform dairy production in Kenya through precision, purity, and integrity.
                </p>
                <p class="mb-4">
                    With a clear mandate to produce clean, traceable milk, our operations are defined by a fully mechanised, zero-human-contact system that meets and exceeds global food safety standards. From milking to cooling, every process is engineered to eliminate contamination, preserve nutritional value, and deliver unmatched consistency at scale.
                </p>
                <p>
                    Our journey began with a bold but simple idea that dairy can be pure, transparent, and technologically advanced, without losing its deep connection to the land and the community. Today, we stand as a regional benchmark in controlled-environment farming, elite cattle genetics, and agro-technical professionalism.
                </p>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <?php
                $about_images = glob("assets/images/about/*");
                if (!empty($about_images)): ?>
                    <img src="<?php echo $about_images[0]; ?>" alt="Farm Overview" class="img-fluid rounded shadow">
                <?php else: ?>
                    <div class="placeholder-image bg-light rounded d-flex align-items-center justify-content-center" style="height: 400px;">
                        <div class="text-center text-muted">
                            <i class="fas fa-image fa-3x mb-3"></i>
                            <p>Farm overview image</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Vision and Mission -->
<?php include 'components/vision-mission.php'; ?>

<!-- Our Principles -->
<section class="principles py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Our Principles</h2>
                <p class="lead text-muted">
                    The core values that guide every aspect of our operations
                </p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="principle-card text-center p-4 bg-white rounded shadow h-100">
                    <div class="principle-icon mb-3">
                        <i class="fas fa-seedling fa-3x text-primary"></i>
                    </div>
                    <h4 class="mb-3">Sustainability</h4>
                    <p>
                        We practice regenerative farming methods that enhance soil health, 
                        conserve water, and promote biodiversity across our farmland.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="principle-card text-center p-4 bg-white rounded shadow h-100">
                    <div class="principle-icon mb-3">
                        <i class="fas fa-shield-alt fa-3x text-primary"></i>
                    </div>
                    <h4 class="mb-3">Quality Assurance</h4>
                    <p>
                        Every step of our process is monitored and tested to ensure our products 
                        meet the highest international standards for quality and safety.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="principle-card text-center p-4 bg-white rounded shadow h-100">
                    <div class="principle-icon mb-3">
                        <i class="fas fa-users fa-3x text-primary"></i>
                    </div>
                    <h4 class="mb-3">Community Focus</h4>
                    <p>
                        We believe in empowering local communities through training programs, 
                        employment opportunities, and knowledge sharing initiatives.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Heritage Section -->
<section class="heritage py-5">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <?php
                $heritage_images = glob("assets/images/heritage/*");
                if (!empty($heritage_images)): ?>
                    <img src="<?php echo $heritage_images[0]; ?>" alt="Our Heritage" class="img-fluid rounded shadow">
                <?php else: ?>
                    <div class="placeholder-image bg-light rounded d-flex align-items-center justify-content-center" style="height: 400px;">
                        <div class="text-center text-muted">
                            <i class="fas fa-history fa-3x mb-3"></i>
                            <p>Heritage image</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <h2 class="section-title mb-4">Our Heritage</h2>
                <p class="lead mb-4">
                    Our fully mechanised farm reflects a modern, clean, and health-conscious lifestyle where fresh, nutritious milk and sustainability meet convenience, comfort, and a better way of living.
                </p>
                <p class="mb-4">
                    Founded in 1999, the Elephant Farm was established with a singular purpose: to transform dairy production in Kenya through precision, purity, and integrity. Over the years, we have grown from a visionary idea to one of the region's most respected dairy enterprises, setting benchmarks in controlled-environment farming and elite cattle genetics.
                </p>
                <div class="heritage-stats">
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="stat-box text-center p-3 bg-primary text-white rounded">
                                <h3 class="mb-1">25+</h3>
                                <p class="mb-0 small">Years Since 1999</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="stat-box text-center p-3 bg-secondary text-white rounded">
                                <h3 class="mb-1">300+</h3>
                                <p class="mb-0 small">Premium Cattle</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Care and Lifestyle -->
<section class="care-lifestyle py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Heritage • Care • Lifestyle</h2>
                <p class="lead text-muted">
                    Our fully mechanised farm reflects a modern, clean, and health-conscious lifestyle
                </p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="care-item text-center p-4 bg-white rounded shadow h-100">
                    <div class="care-icon mb-3">
                        <i class="fas fa-history fa-3x text-primary"></i>
                    </div>
                    <h4 class="mb-3">Heritage</h4>
                    <p>
                        Our fully mechanised farm reflects a modern, clean, and health-conscious lifestyle where fresh, nutritious milk and sustainability meet convenience, comfort, and a better way of living.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="care-item text-center p-4 bg-white rounded shadow h-100">
                    <div class="care-icon mb-3">
                        <i class="fas fa-heart fa-3x text-primary"></i>
                    </div>
                    <h4 class="mb-3">Care</h4>
                    <p>
                        Our fully mechanised farm reflects a modern, clean, and health-conscious lifestyle where fresh, nutritious milk and sustainability meet convenience, comfort, and a better way of living.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="care-item text-center p-4 bg-white rounded shadow h-100">
                    <div class="care-icon mb-3">
                        <i class="fas fa-leaf fa-3x text-primary"></i>
                    </div>
                    <h4 class="mb-3">Lifestyle</h4>
                    <p>
                        Our fully mechanised farm reflects a modern, clean, and health-conscious lifestyle where fresh, nutritious milk and sustainability meet convenience, comfort, and a better way of living.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Farm Philosophy -->
<section class="farm-philosophy py-5">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <h2 class="section-title mb-4">Engineered by Principle</h2>
                <p class="lead mb-4">
                    A firm built as a system where structure and performance is the only legacy.
                </p>
                <p class="mb-4">
                    Built on principle, our dairy farm operates as a disciplined system not a sentimental enterprise. From day one, our approach has been deliberate to engineer a dairy environment where discipline overrides assumption and every outcome is controlled by design. We removed human guesswork from milk handling not as innovation, but as standard.
                </p>
                <p>
                    We breed with purpose, not instinct drawing from genetics that yield resilience, and long-term efficiency. Health is managed preventively, not reactively, through structured protocols, digital tracking, and veterinary oversight.
                </p>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="philosophy-points">
                    <div class="point-item d-flex align-items-start mb-4">
                        <div class="point-number me-3">
                            <span class="badge bg-primary rounded-circle p-2">1</span>
                        </div>
                        <div class="point-content">
                            <h5 class="mb-2">Discipline Over Assumption</h5>
                            <p class="mb-0">
                                Every outcome is controlled by design, not sentiment or tradition.
                            </p>
                        </div>
                    </div>
                    
                    <div class="point-item d-flex align-items-start mb-4">
                        <div class="point-number me-3">
                            <span class="badge bg-primary rounded-circle p-2">2</span>
                        </div>
                        <div class="point-content">
                            <h5 class="mb-2">Precision Over Guesswork</h5>
                            <p class="mb-0">
                                Zero-human-contact systems eliminate contamination and ensure consistency.
                            </p>
                        </div>
                    </div>
                    
                    <div class="point-item d-flex align-items-start">
                        <div class="point-number me-3">
                            <span class="badge bg-primary rounded-circle p-2">3</span>
                        </div>
                        <div class="point-content">
                            <h5 class="mb-2">Performance Over Legacy</h5>
                            <p class="mb-0">
                                We construct performance and clarity over tradition and sentiment.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
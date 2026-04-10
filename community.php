<?php
$page_title = "Community Development - Elephant Farm Dairy";
$page_class = "community-page";
include 'includes/header.php';
?>

<!-- Page Header -->
<section class="page-header py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center" data-aos="fade-up">
                <h1 class="display-4 mb-3">Agri-Tourism & Community Development</h1>
                <p class="lead">Our farm is not only a production site, it is a controlled learning environment for modern dairy practices. Through curated access for technical institutions and professional partners, we support sector-wide knowledge transfer as part of our commitment to agricultural development and social responsibility.</p>
            </div>
        </div>
    </div>
</section>

<!-- Community Overview -->
<section class="community-overview py-5">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <h2 class="section-title mb-4">Agri-Tourism & Community Development</h2>
                <p class="lead mb-4" style="color: #2c3e50; font-weight: 500;">
                    Our farm is not only a production site, it is a controlled learning environment for modern dairy practices. Through curated access for technical institutions and professional partners, we support sector-wide knowledge transfer as part of our commitment to agricultural development and social responsibility.
                </p>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <?php
                $community_images = glob("assets/images/community/*");
                if (!empty($community_images)): ?>
                    <img src="<?php echo $community_images[0]; ?>" alt="Community Development" class="img-fluid rounded shadow">
                <?php else: ?>
                    <div class="placeholder-image bg-light rounded d-flex align-items-center justify-content-center" style="height: 400px;">
                        <div class="text-center text-muted">
                            <i class="fas fa-users fa-3x mb-3"></i>
                            <p>Community development image</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Training Programs -->
<section class="training-programs py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Training Programs Integrated into CSR</h2>
                <p class="lead text-white" style="font-weight: 500;">Our agri-tourism model includes structured training aligned with our CSR goals. We offer practical exposure for students, researchers, and professional partners. Supervised sessions ensure participants gain high-standard technical expertise into the region's agricultural future.</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="training-card p-4 rounded shadow h-100" style="background: rgba(255, 255, 255, 0.1);">
                    <h4 class="mb-3 text-white" style="font-weight: 700;">Training Programs Integrated into CSR</h4>
                    <p class="mb-4 text-white" style="font-weight: 500;">
                        Our agri-tourism model includes structured training aligned with our CSR goals. We offer practical exposure for students, researchers, and professional partners. Supervised sessions ensure participants gain high-standard technical expertise into the region's agricultural future.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="training-card p-4 rounded shadow h-100" style="background: rgba(255, 255, 255, 0.1);">
                    <h4 class="mb-3 text-white" style="font-weight: 700;">Local Trainees Fully Trained and Absorbed</h4>
                    <p class="mb-4 text-white" style="font-weight: 500;">
                        Multiple individuals from the local community have completed training and joined our operations. Now working alongside our team, they are embedding real technical expertise into the region's agricultural future. This approach reduces unemployment while embedding real technical expertise into the region's agricultural future.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="training-card p-4 rounded shadow h-100" style="background: rgba(255, 255, 255, 0.1);">
                    <h4 class="mb-3 text-white" style="font-weight: 700;">Clients Partnerships & Educational Institutions</h4>
                    <p class="mb-4 text-white" style="font-weight: 500;">
                        We partner with New Dairies and regional colleges to support curriculum-linked exposure. Our farm is an accredited learning site. These partnerships align education with real-dairy systems building a pipeline of capable, industry-ready talent.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Client Partnerships -->
<section class="client-partnerships py-5 bg-light">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <h2 class="section-title mb-4 text-white">Client Partnerships</h2>
                <p class="lead mb-4 text-white" style="font-weight: 500;">
                    Building strategic partnerships with local cooperatives, schools, 
                    and community organizations to maximize impact.
                </p>
                
                <div class="partnership-types">
                    <div class="partnership-item d-flex align-items-start mb-4">
                        <div class="partnership-icon me-3">
                            <i class="fas fa-handshake fa-2x" style="color: #d4af37;"></i>
                        </div>
                        <div class="partnership-content">
                            <h5 class="mb-2 text-white">Cooperative Development</h5>
                            <p class="mb-0 text-white" style="font-weight: 400;">
                                Supporting the formation and growth of dairy cooperatives 
                                to strengthen local farming communities.
                            </p>
                        </div>
                    </div>
                    
                    <div class="partnership-item d-flex align-items-start mb-4">
                        <div class="partnership-icon me-3">
                            <i class="fas fa-school fa-2x" style="color: #d4af37;"></i>
                        </div>
                        <div class="partnership-content">
                            <h5 class="mb-2 text-white">Educational Programs</h5>
                            <p class="mb-0 text-white" style="font-weight: 400;">
                                Collaborating with schools and universities to provide 
                                practical agricultural education and research opportunities.
                            </p>
                        </div>
                    </div>
                    
                    <div class="partnership-item d-flex align-items-start">
                        <div class="partnership-icon me-3">
                            <i class="fas fa-seedling fa-2x" style="color: #d4af37;"></i>
                        </div>
                        <div class="partnership-content">
                            <h5 class="mb-2 text-white">Sustainability Initiatives</h5>
                            <p class="mb-0 text-white" style="font-weight: 400;">
                                Joint projects focused on environmental conservation 
                                and sustainable agricultural practices.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6" data-aos="fade-left">
                <div class="partnership-stats bg-white p-5 rounded shadow">
                    <h3 class="text-center mb-4 text-primary">Community Impact</h3>
                    
                    <div class="row g-4 text-center">
                        <div class="col-6">
                            <div class="impact-metric">
                                <h2 class="display-6 fw-bold text-primary mb-2">15</h2>
                                <p class="mb-0" style="color: #2c3e50; font-weight: 600;">Cooperatives Supported</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="impact-metric">
                                <h2 class="display-6 fw-bold text-primary mb-2">25</h2>
                                <p class="mb-0" style="color: #2c3e50; font-weight: 600;">Schools Partnered</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="impact-metric">
                                <h2 class="display-6 fw-bold text-primary mb-2">1000+</h2>
                                <p class="mb-0" style="color: #2c3e50; font-weight: 600;">Farmers Trained</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="impact-metric">
                                <h2 class="display-6 fw-bold text-primary mb-2">5</h2>
                                <p class="mb-0" style="color: #2c3e50; font-weight: 600;">Counties Reached</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Social Impact -->
<section class="social-impact py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Well-Being</h2>
                <p class="lead" style="color: #2c3e50; font-weight: 500;">
                    Creating lasting positive change in rural communities
                </p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="impact-card d-flex p-4 bg-white rounded shadow">
                    <div class="impact-icon me-4">
                        <i class="fas fa-users fa-3x text-primary"></i>
                    </div>
                    <div class="impact-content">
                        <h4 class="mb-3">Hiring from the Local Community</h4>
                        <p style="color: #2c3e50;">
                            We intentionally prioritise local recruitment to ensure our operations uplift the surrounding community. This approach fosters long-term employment, reduces income gaps, and builds a workforce invested in our farm's success.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <div class="impact-card d-flex p-4 bg-white rounded shadow">
                    <div class="impact-icon me-4">
                        <i class="fas fa-chart-line fa-3x text-primary"></i>
                    </div>
                    <div class="impact-content">
                        <h4 class="mb-3">Uplifting Livelihoods</h4>
                        <p style="color: #2c3e50;">
                            Team members are trained in modern systems. From mechanised milking to digital tracking. This exposure equips them with skills beyond traditional farming, promoting growth, confidence, and meaningful contribution.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Community CTA -->
<section class="community-cta py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8" data-aos="fade-right">
                <h2 class="display-5 mb-3">Join Our Community Programs</h2>
                <p class="lead mb-4 text-white-50">
                    Whether you're interested in our training programs, partnership opportunities, 
                    or agri-tourism experiences, we welcome you to be part of our community.
                </p>
            </div>
            
            <div class="col-lg-4 text-lg-end" data-aos="fade-left">
                <div class="cta-buttons">
                    <a href="contact.php" class="btn btn-light btn-lg mb-3 d-block">
                        <i class="fas fa-phone me-2"></i>
                        Contact Community Team
                    </a>
                    <a href="services.php" class="btn btn-outline-light btn-lg d-block">
                        <i class="fas fa-graduation-cap me-2"></i>
                        View Training Programs
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
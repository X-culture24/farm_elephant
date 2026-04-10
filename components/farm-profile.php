<?php
// Auto-load farm profile images
$farm_images = glob("assets/images/farm/*");
$cow_images = glob("assets/images/cows/*");
?>

<section class="farm-profile py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="farm-content">
                    <h2 class="section-title display-4 mb-4">Who We Are and How We Operate</h2>
                    <p class="lead text-muted mb-4">
                        We are a family-owned dairy farm built on a foundation of science, innovation, and unwavering discipline. Founded in 1999 by a visionary mind, the Elephant Farm was established with a singular purpose: to transform dairy production in Kenya through precision, purity, and integrity.
                    </p>
                    <p class="text-muted mb-4">
                        With a clear mandate to produce clean, traceable milk, our operations are defined by a fully mechanised, zero-human-contact system that meets and exceeds global food safety standards. From milking to cooling, every process is engineered to eliminate contamination, preserve nutritional value, and deliver unmatched consistency at scale.
                    </p>
                    <p class="text-muted mb-4">
                        Our journey began with a bold but simple idea that dairy can be pure, transparent, and technologically advanced, without losing its deep connection to the land and the community. Today, we stand as a regional benchmark in controlled-environment farming, elite cattle genetics, and agro-technical professionalism.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-6" data-aos="fade-left">
                <div class="farm-image-grid">
                    <?php if (!empty($farm_images)): ?>
                        <div class="main-image">
                            <img src="<?php echo $farm_images[0]; ?>" alt="Farm Overview" class="img-fluid rounded shadow">
                        </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($cow_images)): ?>
                        <div class="secondary-images mt-3">
                            <div class="row g-3">
                                <?php foreach (array_slice($cow_images, 0, 2) as $cow_image): ?>
                                    <div class="col-6">
                                        <img src="<?php echo $cow_image; ?>" alt="Dairy Cattle" class="img-fluid rounded">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
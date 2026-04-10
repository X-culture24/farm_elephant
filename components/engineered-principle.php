<section class="engineered-principle bg-light" style="padding: 0 !important; margin-bottom: 0 !important;">
    <div class="container" style="padding-top: 2rem; padding-bottom: 2rem;">
        <div class="row align-items-center g-2">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="principle-content">
                    <div class="principle-logo mb-2">
                        <img src="assets/images/logo/principle-logo.png" alt="Engineered by Principle" class="img-fluid" style="max-height: 80px;">
                    </div>
                    <h2 class="section-title mb-2">Engineered by Principle</h2>
                    <p class="lead text-muted mb-2">
                        A firm built as a system where structure and performance is the only legacy.
                    </p>
                    <p class="text-muted mb-2">
                        Built on principle, our dairy farm operates as a disciplined system not a sentimental enterprise. From day one, our approach has been deliberate to engineer a dairy environment where discipline overrides assumption and every outcome is controlled by design. We removed human guesswork from milk handling not as innovation, but as standard. We breed with purpose, not instinct drawing from genetics that yield resilience, and long-term efficiency.
                    </p>
                    <p class="text-muted mb-2">
                        Health is managed preventively, not reactively, through structured protocols, digital tracking, and veterinary oversight. Each litre of milk, each animal, each metric is part of a larger system designed to scale without compromise. We do not inherit legacy; we construct performance. And it is this relentless clarity over tradition, structure over sentiment that defines how we work, and why it works.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-6" data-aos="fade-left">
                <?php
                $principle_images = glob("assets/images/engineered-principle/*");
                if (!empty($principle_images)): ?>
                    <img src="<?php echo $principle_images[0]; ?>" alt="Engineered by Principle" class="img-fluid rounded shadow">
                <?php else: ?>
                    <div class="placeholder-image bg-light rounded d-flex align-items-center justify-content-center shadow" style="height: 400px;">
                        <div class="text-center text-muted">
                            <i class="fas fa-cogs fa-3x mb-3"></i>
                            <p>Engineered by Principle image</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
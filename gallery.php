<?php
$page_title = "Gallery - Elephant Farm Dairy";
$page_class = "gallery-page";
include 'includes/header.php';
?>

<!-- Page Header -->
<section class="page-header py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center" data-aos="fade-up">
                <h1 class="display-4 mb-3">Gallery</h1>
                <p class="lead">Discover the beauty of our farm and the excellence of our operations</p>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Sections -->
<section class="gallery-sections py-5">
    <div class="container">
        
        <!-- Healthy Herd Section -->
        <div class="gallery-section mb-5">
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h2 class="section-title text-center mb-5">Healthy Herd</h2>
                </div>
            </div>
            
            <div class="row g-4" id="herd-gallery">
                <?php
                $herd_images = glob("assets/images/gallery/herd/*");
                foreach ($herd_images as $index => $image): ?>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
                        <div class="gallery-item image-hover">
                            <img src="<?php echo $image; ?>" alt="Healthy Cattle" class="img-fluid rounded shadow">
                            <div class="gallery-overlay">
                                <div class="gallery-content">
                                    <h5 style="color: #d4af37;">Premium Dairy Cattle</h5>
                                    <p style="color: #8B6F47;">Healthy and well-cared livestock</p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                
                <!-- Fallback if no images -->
                <?php if (empty($herd_images)): ?>
                    <div class="col-12 text-center">
                        <p class="text-muted">Herd images will be displayed here when added to assets/images/gallery/herd/</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- Farm and Machinery Section -->
        <div class="gallery-section">
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h2 class="section-title text-center mb-5">Farm & Machinery</h2>
                </div>
            </div>
            
            <div class="row g-4" id="machinery-gallery">
                <?php
                $machinery_images = glob("assets/images/gallery/machinery/*");
                foreach ($machinery_images as $index => $image): ?>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
                        <div class="gallery-item image-hover">
                            <img src="<?php echo $image; ?>" alt="Farm Machinery" class="img-fluid rounded shadow">
                            <div class="gallery-overlay">
                                <div class="gallery-content">
                                    <h5 style="color: #d4af37;">Modern Equipment</h5>
                                    <p style="color: #8B6F47;">State-of-the-art farming technology</p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                
                <!-- Fallback if no images -->
                <?php if (empty($machinery_images)): ?>
                    <div class="col-12 text-center">
                        <p class="text-muted">Machinery images will be displayed here when added to assets/images/gallery/machinery/</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- Farm Facilities Section -->
        <div class="gallery-section mt-5">
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h2 class="section-title text-center mb-5">Farm Facilities</h2>
                </div>
            </div>
            
            <div class="row g-4" id="facilities-gallery">
                <?php
                $facilities_images = glob("assets/images/gallery/facilities/*");
                foreach ($facilities_images as $index => $image): ?>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
                        <div class="gallery-item image-hover">
                            <img src="<?php echo $image; ?>" alt="Farm Facilities" class="img-fluid rounded shadow">
                            <div class="gallery-overlay">
                                <div class="gallery-content">
                                    <h5 style="color: #d4af37;">Modern Facilities</h5>
                                    <p style="color: #8B6F47;">Clean and efficient infrastructure</p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                
                <!-- Fallback if no images -->
                <?php if (empty($facilities_images)): ?>
                    <div class="col-12 text-center">
                        <p class="text-muted">Facilities images will be displayed here when added to assets/images/gallery/facilities/</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
    </div>
</section>

<!-- Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-0">
                <img src="" alt="" class="img-fluid w-100" id="modalImage">
            </div>
        </div>
    </div>
</div>

<script>
// Gallery image click handler
document.addEventListener('DOMContentLoaded', function() {
    const galleryItems = document.querySelectorAll('.gallery-item img');
    const modal = new bootstrap.Modal(document.getElementById('imageModal'));
    const modalImage = document.getElementById('modalImage');
    
    galleryItems.forEach(item => {
        item.addEventListener('click', function() {
            modalImage.src = this.src;
            modalImage.alt = this.alt;
            modal.show();
        });
    });
});
</script>

<?php include 'includes/footer.php'; ?>
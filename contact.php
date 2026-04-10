<?php
$page_title = "Contact Us - Elephant Farm Dairy";
$page_class = "contact-page";
include 'includes/header.php';
?>

<!-- Page Header -->
<section class="page-header py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center" data-aos="fade-up">
                <h1 class="display-4 mb-3">Contact Us</h1>
                <p class="lead">Get in touch with our team for inquiries and partnerships</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="contact-section py-5">
    <div class="container">
        <div class="row g-5">
            
            <!-- Contact Information -->
            <div class="col-lg-6" data-aos="fade-right">
                <div class="contact-info">
                    <h2 class="mb-4" style="color: #2c3e50; font-weight: 700;">Get In Touch</h2>
                    <p class="mb-4" style="color: #2c3e50; font-weight: 500;">
                        We'd love to hear from you. Send us a message and we'll respond as soon as possible.
                    </p>
                    
                    <div class="contact-item d-flex align-items-center mb-4">
                        <div class="contact-icon me-3">
                            <i class="fas fa-map-marker-alt fa-2x" style="color: #d4af37;"></i>
                        </div>
                        <div class="contact-details">
                            <h5 class="mb-1" style="color: #2c3e50; font-weight: 700;">Farm Location</h5>
                            <p class="mb-0" style="color: #2c3e50; font-weight: 500;">Elephant Farm Ranch<br>P.O. Box 1241 - 20100<br>Kaparei, Eldoret, Kenya</p>
                        </div>
                    </div>
                    
                    <div class="contact-item d-flex align-items-center mb-4">
                        <div class="contact-icon me-3">
                            <i class="fas fa-phone fa-2x" style="color: #d4af37;"></i>
                        </div>
                        <div class="contact-details">
                            <h5 class="mb-1" style="color: #2c3e50; font-weight: 700;">Phone Number</h5>
                            <p class="mb-0" style="color: #2c3e50; font-weight: 500;">+254 724 345 658<br>+254 772 003 006</p>
                        </div>
                    </div>
                    
                    <div class="contact-item d-flex align-items-center mb-4">
                        <div class="contact-icon me-3">
                            <i class="fas fa-envelope fa-2x" style="color: #d4af37;"></i>
                        </div>
                        <div class="contact-details">
                            <h5 class="mb-1" style="color: #2c3e50; font-weight: 700;">Email Address</h5>
                            <p class="mb-0" style="color: #2c3e50; font-weight: 500;">info@elephantfarm.co.ke<br>www.elephantfarm.co.ke</p>
                        </div>
                    </div>
                    
                    <div class="contact-item d-flex align-items-center mb-4">
                        <div class="contact-icon me-3">
                            <i class="fas fa-clock fa-2x" style="color: #d4af37;"></i>
                        </div>
                        <div class="contact-details">
                            <h5 class="mb-1" style="color: #2c3e50; font-weight: 700;">Business Hours</h5>
                            <p class="mb-0" style="color: #2c3e50; font-weight: 500;">
                                Monday - Friday: 6:00 AM - 6:00 PM<br>
                                Saturday: 6:00 AM - 2:00 PM<br>
                                Sunday: Closed
                            </p>
                        </div>
                    </div>
                    
                    <!-- Social Links -->
                    <div class="social-links mt-4">
                        <h5 class="mb-3" style="color: #2c3e50; font-weight: 700;">Follow Us</h5>
                        <div class="d-flex gap-3">
                            <a href="https://facebook.com/elephantfarmdairy" target="_blank" class="social-icon" aria-label="Facebook" title="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://twitter.com/elephantfarmdairy" target="_blank" class="social-icon" aria-label="Twitter" title="Twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://instagram.com/elephantfarmdairy" target="_blank" class="social-icon" aria-label="Instagram" title="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="https://linkedin.com/company/elephantfarmdairy" target="_blank" class="social-icon" aria-label="LinkedIn" title="LinkedIn">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div class="col-lg-6" data-aos="fade-left">
                <div class="contact-form p-4 rounded" style="background: #2c3e50;">
                    <h3 class="mb-4 text-white" style="font-weight: 700;">Send us a Message</h3>
                    
                    <form id="contactForm" action="process-contact.php" method="POST">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="firstName" class="form-label text-white" style="font-weight: 600;">First Name *</label>
                                <input type="text" class="form-control" id="firstName" name="first_name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="lastName" class="form-label text-white" style="font-weight: 600;">Last Name *</label>
                                <input type="text" class="form-control" id="lastName" name="last_name" required>
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label text-white" style="font-weight: 600;">Email Address *</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="col-12">
                                <label for="phone" class="form-label text-white" style="font-weight: 600;">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone">
                            </div>
                            <div class="col-12">
                                <label for="subject" class="form-label text-white" style="font-weight: 600;">Subject *</label>
                                <select class="form-select" id="subject" name="subject" required>
                                    <option value="">Select a subject</option>
                                    <option value="general">General Inquiry</option>
                                    <option value="milk-supply">Raw Milk Supply</option>
                                    <option value="breeding">Breeding Stock</option>
                                    <option value="training">Training Programs</option>
                                    <option value="tourism">Agri Tourism</option>
                                    <option value="partnership">Partnership Opportunity</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="message" class="form-label text-white" style="font-weight: 600;">Message *</label>
                                <textarea class="form-control" id="message" name="message" rows="5" required placeholder="Tell us about your inquiry..."></textarea>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="newsletter" name="newsletter">
                                    <label class="form-check-label text-white" for="newsletter" style="font-weight: 500;">
                                        Subscribe to our newsletter for updates and farm news
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-lg w-100" style="background: #d4af37; color: #2c3e50; font-weight: 700; border: none;">
                                    <i class="fas fa-paper-plane me-2"></i>Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="map-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12" data-aos="fade-up">
                <h2 class="text-center mb-5">Find Us</h2>
                <div class="map-container rounded overflow-hidden shadow">
                    <!-- Google Maps Embed for Kaparei, Eldoret, Kenya -->
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15959.234567890123!2d35.2697!3d0.5143!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMMKwMzAnNTEuNSJOIDM1wrAxNicxMC45IkU!5e0!3m2!1sen!2ske!4v1234567890123!5m2!1sen!2ske" 
                        width="100%" 
                        height="450" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <div class="text-center mt-3">
                    <a href="https://maps.google.com/?q=Kaparei,Eldoret,Kenya" target="_blank" class="btn btn-outline-primary">
                        <i class="fas fa-directions me-2"></i>Get Directions
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Contact form handling
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Show loading state
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Sending...';
    submitBtn.disabled = true;
    
    // Simulate form submission (replace with actual form handling)
    setTimeout(() => {
        alert('Thank you for your message! We will get back to you soon.');
        this.reset();
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
    }, 2000);
});
</script>

<?php include 'includes/footer.php'; ?>
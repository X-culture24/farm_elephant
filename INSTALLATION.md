# DNR Elephant Farm Dairy Website - Installation Guide

## 🚀 Quick Installation

### Prerequisites
- Web server with PHP 7.4+ (Apache/Nginx)
- Modern web browser
- Basic understanding of file management

### Step 1: Download & Extract
1. Download all project files
2. Extract to your web server directory (e.g., `/var/www/html/` or `htdocs/`)

### Step 2: Set Permissions
```bash
# Set proper permissions (Linux/Mac)
chmod 755 -R /path/to/dnr-dairy-website/
chmod 777 assets/images/
```

### Step 3: Add Your Images
Place your actual images in the organized folder structure:

```
assets/images/
├── hero/                 # Hero section backgrounds (1920x1080)
├── farm/                 # Farm photos (800x600)
├── cows/                 # Cattle photos (600x400)
├── services/             # Service-related images
│   ├── milk/
│   ├── breeding/
│   ├── advisory/
│   ├── tourism/
│   ├── fodder/
│   └── training/
├── gallery/              # Gallery images
│   ├── herd/
│   ├── machinery/
│   └── facilities/
├── partners/             # Partner logos
│   ├── processors/
│   ├── research/
│   ├── veterinary/
│   └── technology/
└── logo/                 # Your logos
```

### Step 4: Generate Placeholder Images (Optional)
If you want to see the website with sample images first:

1. Visit: `http://yoursite.com/create-placeholders.php`
2. This will generate sample images for all sections
3. Replace with your actual images later

### Step 5: Customize Content
Edit the following files to match your farm:

#### Contact Information
- `includes/footer.php` - Update contact details
- `contact.php` - Update contact information
- `process-contact.php` - Update email address

#### Farm Details
- `components/farm-profile.php` - Update farm statistics
- `components/statistics.php` - Update your metrics
- `about.php` - Update farm story and details

#### Services
- `services.php` - Customize your service offerings

### Step 6: Configure Email (Optional)
To enable contact form functionality:

1. Edit `process-contact.php`
2. Update the email address on line 45:
   ```php
   $to = 'your-email@yourdomain.com';
   ```
3. Configure your server's mail settings

## 🔧 Advanced Configuration

### Custom Domain Setup
1. Point your domain to the website directory
2. Update any hardcoded URLs if necessary
3. Consider enabling HTTPS (recommended)

### Database Integration (Optional)
To store contact form submissions in a database:

1. Uncomment the database section in `process-contact.php`
2. Create a MySQL database and table:
   ```sql
   CREATE TABLE contact_submissions (
       id INT AUTO_INCREMENT PRIMARY KEY,
       first_name VARCHAR(100),
       last_name VARCHAR(100),
       email VARCHAR(255),
       phone VARCHAR(20),
       subject VARCHAR(255),
       message TEXT,
       newsletter BOOLEAN DEFAULT FALSE,
       submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );
   ```
3. Update database credentials in the script

### Performance Optimization
1. **Enable Gzip Compression**: The `.htaccess` file includes compression rules
2. **Optimize Images**: Compress your images before uploading
3. **CDN Setup**: Consider using a CDN for static assets
4. **Caching**: Enable browser caching (included in `.htaccess`)

### Security Enhancements
1. **SSL Certificate**: Install SSL for HTTPS
2. **File Permissions**: Ensure proper file permissions
3. **Regular Updates**: Keep PHP and server software updated
4. **Backup**: Set up regular backups

## 🎨 Customization

### Colors & Branding
Edit `assets/css/style.css` and update the CSS variables:
```css
:root {
    --primary-color: #2d5a27;    /* Your primary color */
    --secondary-color: #4a7c59;  /* Your secondary color */
    --accent-color: #d4af37;     /* Your accent color */
}
```

### Typography
Update font choices in `includes/header.php`:
```html
<link href="https://fonts.googleapis.com/css2?family=YourFont:wght@400;500;600;700&display=swap" rel="stylesheet">
```

### Logo
Replace logo files in `assets/images/logo/`:
- `logo.png` - Main logo (dark backgrounds)
- `logo-white.png` - White logo (dark backgrounds)

## 📱 Testing

### Browser Testing
Test your website in:
- Chrome (desktop & mobile)
- Firefox
- Safari (desktop & mobile)
- Edge

### Mobile Responsiveness
- Test on various screen sizes
- Check touch interactions
- Verify image loading

### Performance Testing
- Use Google PageSpeed Insights
- Test loading times
- Optimize images if needed

## 🐛 Troubleshooting

### Common Issues

**Images Not Loading**
- Check file permissions (755 for directories, 644 for files)
- Verify image file formats (JPG, PNG, GIF, WebP)
- Ensure proper folder structure

**Contact Form Not Working**
- Check PHP mail configuration
- Verify email address in `process-contact.php`
- Check server error logs

**Animations Not Working**
- Ensure JavaScript is enabled
- Check browser console for errors
- Verify CDN links are accessible

**Responsive Issues**
- Clear browser cache
- Test in different browsers
- Check CSS media queries

### Getting Help
1. Check browser console for JavaScript errors
2. Review server error logs
3. Verify all files are uploaded correctly
4. Test with placeholder images first

## 📋 Checklist

Before going live:
- [ ] All images uploaded and optimized
- [ ] Contact information updated
- [ ] Email form tested
- [ ] Mobile responsiveness verified
- [ ] All pages load correctly
- [ ] SSL certificate installed (recommended)
- [ ] Analytics tracking added (optional)
- [ ] Backup system in place

## 🎯 Next Steps

After installation:
1. **Content Review**: Ensure all content is accurate and up-to-date
2. **SEO Optimization**: Add meta descriptions and optimize for search engines
3. **Analytics**: Set up Google Analytics or similar tracking
4. **Social Media**: Link your social media accounts
5. **Regular Updates**: Plan for regular content and image updates

---

**Need help?** Check the README.md file for detailed documentation and code structure information.
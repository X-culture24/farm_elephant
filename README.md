# DNR Elephant Farm Dairy Website

A modern PHP-based website template designed with WordPress-like functionality, smooth animations, and automatic image loading system.

## 🌟 Features

- **Modern PHP Architecture**: Clean, modular code structure with reusable components
- **WordPress-like Template System**: Includes header, footer, and component-based layout
- **Automatic Image Loading**: Dynamic image loading from organized folder structure
- **Smooth Animations**: AOS (Animate On Scroll) integration with custom CSS animations
- **Responsive Design**: Mobile-first approach with Bootstrap 5
- **Clean Typography**: Playfair Display for headings, Inter for body text
- **Optimized Performance**: Lazy loading, minified assets, and efficient code

## 📁 Project Structure

```
dnr-dairy-website/
├── index.php                 # Home page
├── about.php                 # About page
├── services.php              # Services page
├── technology.php            # Technology page
├── community.php             # Community development page
├── gallery.php               # Image gallery
├── partners.php              # Partners and clients
├── contact.php               # Contact page
├── get-images.php            # Auto image loading script
├── includes/
│   ├── header.php            # Site header
│   ├── footer.php            # Site footer
│   └── navbar.php            # Navigation menu
├── components/
│   ├── hero-section.php      # Hero banner
│   ├── farm-profile.php      # Farm overview
│   ├── elevating-standards.php
│   ├── vision-mission.php    # Vision and mission cards
│   ├── engineered-principle.php
│   ├── statistics.php        # Statistics section
│   ├── clean-milk.php        # Clean milk section
│   └── cta-section.php       # Call-to-action
└── assets/
    ├── css/
    │   ├── style.css         # Main styles
    │   ├── animations.css    # Animation styles
    │   └── responsive.css    # Responsive design
    ├── js/
    │   └── main.js           # JavaScript functionality
    └── images/               # Organized image folders
        ├── hero/
        ├── farm/
        ├── cows/
        ├── services/
        ├── gallery/
        ├── partners/
        └── ...
```

## 🚀 Quick Start

1. **Clone or download** the project files to your web server
2. **Place images** in the appropriate folders under `assets/images/`
3. **Configure web server** to serve PHP files
4. **Access** `index.php` in your browser

## 📸 Image Management

The website features an **automatic image loading system**:

### Image Folder Structure
```
assets/images/
├── hero/                     # Hero section backgrounds
├── farm/                     # Farm overview images
├── cows/                     # Cattle and livestock photos
├── services/
│   ├── milk/                 # Raw milk supply images
│   ├── breeding/             # Breeding stock photos
│   ├── advisory/             # Advisory service images
│   ├── tourism/              # Agri-tourism photos
│   ├── fodder/               # Fodder supply images
│   └── training/             # Training program photos
├── gallery/
│   ├── herd/                 # Healthy herd gallery
│   ├── machinery/            # Farm machinery photos
│   └── facilities/           # Farm facilities images
├── partners/
│   ├── processors/           # Dairy processor logos
│   ├── research/             # Research institution logos
│   ├── veterinary/           # Veterinary service logos
│   └── technology/           # Technology partner logos
├── statistics/               # Statistics section backgrounds
├── technology/               # Technology overview images
├── community/                # Community development photos
├── about/                    # About page images
├── heritage/                 # Heritage section photos
├── clean-milk/               # Clean milk section backgrounds
└── logo/                     # Site logos and branding
```

### How It Works
- **Automatic Detection**: PHP `glob()` function scans folders for images
- **Supported Formats**: JPG, JPEG, PNG, GIF, WebP
- **Dynamic Loading**: Images appear automatically when added to folders
- **No Hardcoding**: No need to update code when adding new images

## 🎨 Design Features

### Color Scheme
- **Primary Green**: `#2d5a27` - Main brand color
- **Secondary Green**: `#4a7c59` - Supporting green shade
- **Accent Gold**: `#d4af37` - Highlight color
- **Light Green**: `#f8fdf8` - Background tint
- **Dark Green**: `#1a3d1a` - Deep accent

### Typography
- **Headings**: Playfair Display (serif)
- **Body Text**: Inter (sans-serif)
- **Clean Hierarchy**: Proper font weights and sizes

### Animations
- **Scroll Animations**: AOS library integration
- **Hover Effects**: Smooth transitions on interactive elements
- **Loading States**: Elegant loading animations
- **Parallax**: Background parallax effects

## 📱 Responsive Design

- **Mobile-First**: Optimized for mobile devices
- **Breakpoints**: Bootstrap 5 responsive grid
- **Touch-Friendly**: Large tap targets and smooth scrolling
- **Performance**: Optimized images and efficient CSS

## 🔧 Customization

### Adding New Pages
1. Create new PHP file (e.g., `new-page.php`)
2. Include header: `<?php include 'includes/header.php'; ?>`
3. Add your content
4. Include footer: `<?php include 'includes/footer.php'; ?>`
5. Update navigation in `includes/navbar.php`

### Adding New Components
1. Create component file in `components/` folder
2. Use PHP for dynamic content
3. Include in pages with: `<?php include 'components/your-component.php'; ?>`

### Styling
- **Main Styles**: Edit `assets/css/style.css`
- **Animations**: Modify `assets/css/animations.css`
- **Responsive**: Update `assets/css/responsive.css`

## 🌐 Browser Support

- **Modern Browsers**: Chrome, Firefox, Safari, Edge
- **Mobile Browsers**: iOS Safari, Chrome Mobile
- **Graceful Degradation**: Fallbacks for older browsers

## 📋 Requirements

- **PHP**: 7.4 or higher
- **Web Server**: Apache, Nginx, or similar
- **Modern Browser**: For optimal experience

## 🎯 Key Pages

### Home Page (`index.php`)
- Hero section with dynamic background
- Farm profile with statistics
- Vision and mission cards
- Technology highlights
- Call-to-action sections

### Services Page (`services.php`)
- Raw milk supply
- Breeding stock
- Genetics advisory
- Agri-tourism
- Fodder supply
- Training programs

### Gallery Page (`gallery.php`)
- Healthy herd photos
- Farm machinery images
- Facilities showcase
- Modal image viewer

### Technology Page (`technology.php`)
- Mechanical milking systems
- Cold chain integration
- Digital herd management
- Predictive maintenance

### Community Page (`community.php`)
- Training programs
- Success stories
- Partnership initiatives
- Social impact metrics

## 🚀 Performance Features

- **Lazy Loading**: Images load as needed
- **Optimized Assets**: Minified CSS and JavaScript
- **Efficient PHP**: Clean, optimized code
- **CDN Integration**: Bootstrap and fonts from CDN

## 📞 Support

For questions or customization needs, refer to the code comments and documentation within each file.

## 📄 License

This project is designed as a template for DNR Elephant Farm Dairy. Customize as needed for your specific requirements.

---

**Built with ❤️ for modern dairy farming excellence**
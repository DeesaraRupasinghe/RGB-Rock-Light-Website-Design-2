# RGB Rock Light WordPress Theme

A modern, production-ready WordPress theme designed for RGB Rock Light products. This theme is fully compatible with Elementor, WooCommerce, and the WooCommerce Stripe Payment Gateway.

## Features

- **Elementor Compatible**: All pages and layouts are 100% editable with Elementor
- **WooCommerce Ready**: Full support for Shop, Product, Cart, Checkout, and My Account pages
- **Stripe Payments**: Works seamlessly with WooCommerce Stripe Payment Gateway plugin
- **Mobile-First**: Fully responsive design that looks great on all devices
- **SEO Friendly**: Clean, semantic HTML5 markup
- **Accessible**: WCAG 2.1 compliant with proper ARIA attributes
- **Translation Ready**: Fully internationalized (i18n)

## Requirements

- WordPress 6.0 or higher
- PHP 8.0 or higher
- WooCommerce 8.0 or higher (for e-commerce features)
- Elementor (for page building)

## Installation

1. Download or clone this theme to your `wp-content/themes/` directory
2. Rename the folder to `product-theme` if needed
3. In WordPress admin, go to **Appearance → Themes**
4. Click **Activate** on the "RGB Rock Light Theme"
5. Go to **Appearance → Customize** to configure your site

## Required Plugins

For full e-commerce functionality, install these plugins:

### WooCommerce
- Go to **Plugins → Add New**
- Search for "WooCommerce"
- Install and activate

### WooCommerce Stripe Payment Gateway
- Go to **Plugins → Add New**
- Search for "WooCommerce Stripe Payment Gateway"
- Install and activate
- Configure in **WooCommerce → Settings → Payments → Stripe**

### Elementor
- Go to **Plugins → Add New**
- Search for "Elementor"
- Install and activate

## Theme Setup

### 1. Configure Menus
- Go to **Appearance → Menus**
- Create menus for:
  - **Primary Menu**: Main navigation in header
  - **Footer Menu**: Footer navigation links
  - **Mobile Menu**: Mobile-optimized navigation

### 2. Set Up Home Page
- Create a new page (e.g., "Home")
- Edit with Elementor to design your landing page
- Go to **Settings → Reading**
- Set "Your homepage displays" to "A static page"
- Select your home page

### 3. Configure WooCommerce
- Complete the WooCommerce setup wizard
- Add your products
- Set up shipping and taxes

### 4. Configure Stripe Payments
- Go to **WooCommerce → Settings → Payments → Stripe**
- Click "Set up" and follow the instructions
- Add your Stripe API keys (found in your Stripe dashboard)
- Enable the payment method

## Theme Structure

```
product-theme/
├── style.css           # Main stylesheet with theme header
├── functions.php       # Theme setup, enqueues, and customizations
├── header.php          # Site header template
├── footer.php          # Site footer template
├── index.php           # Main template file
├── front-page.php      # Front page template (Elementor-ready)
├── page.php            # Standard page template
├── single.php          # Single post template
├── archive.php         # Archive page template
├── search.php          # Search results template
├── 404.php             # Not found template
├── sidebar.php         # Sidebar template
├── searchform.php      # Search form template
├── comments.php        # Comments template
├── woocommerce/
│   ├── archive-product.php    # Shop page template
│   └── single-product.php     # Single product template
└── assets/
    ├── css/
    │   ├── theme.css          # Additional theme styles
    │   └── woocommerce.css    # WooCommerce styling
    ├── js/
    │   └── theme.js           # Theme JavaScript
    └── images/                 # Theme images
```

## Widget Areas

The theme includes the following widget areas:

- **Sidebar**: General sidebar for posts and pages
- **Shop Sidebar**: WooCommerce product filtering widgets
- **Footer 1-4**: Four footer widget columns

## Customization

### Theme Options
Go to **Appearance → Customize → Theme Options** to:
- Enable/disable sticky header
- Set custom footer copyright text

### Elementor Editing
For pages you want to customize:
1. Edit the page
2. Click "Edit with Elementor"
3. Design your page using Elementor's drag-and-drop interface
4. The theme will automatically adapt to your design

### Custom CSS
Add custom CSS in **Appearance → Customize → Additional CSS**

## Color Palette

The theme uses a dark color scheme inspired by RGB lighting:

| Color | Variable | Hex |
|-------|----------|-----|
| Black | `--color-black` | `#000000` |
| White | `--color-white` | `#ffffff` |
| Purple 500 | `--color-purple-500` | `#a855f7` |
| Pink 500 | `--color-pink-500` | `#ec4899` |
| Cyan 400 | `--color-cyan-400` | `#22d3ee` |
| Green 400 | `--color-green-400` | `#4ade80` |

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- iOS Safari (latest)
- Android Chrome (latest)

## Credits

- Theme designed for RGB Rock Light products
- Built following WordPress theme development best practices
- Compatible with WooCommerce and Elementor

## License

This theme is licensed under the GNU General Public License v2 or later.
See LICENSE file for details.

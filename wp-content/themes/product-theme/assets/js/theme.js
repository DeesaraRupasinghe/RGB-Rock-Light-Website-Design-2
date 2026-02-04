/**
 * RGB Rock Light Theme - JavaScript
 *
 * Minimal JavaScript for theme functionality.
 * Works alongside Elementor and WooCommerce.
 *
 * @package RGB_Rock_Light
 */

(function() {
    'use strict';

    /**
     * DOM Ready
     */
    document.addEventListener('DOMContentLoaded', function() {
        initMobileMenu();
        initStickyHeader();
        initSmoothScroll();
    });

    /**
     * Mobile Menu Toggle
     */
    function initMobileMenu() {
        var menuToggle = document.querySelector('.menu-toggle');
        var mobileNav = document.getElementById('mobile-navigation');
        
        if (!menuToggle || !mobileNav) {
            return;
        }

        menuToggle.addEventListener('click', function() {
            var isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
            
            menuToggle.setAttribute('aria-expanded', !isExpanded);
            mobileNav.classList.toggle('is-open');
            document.body.classList.toggle('mobile-menu-open');
            
            // Toggle menu icon animation
            menuToggle.classList.toggle('is-active');
        });

        // Close menu when clicking on a link
        var mobileLinks = mobileNav.querySelectorAll('a');
        mobileLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                menuToggle.setAttribute('aria-expanded', 'false');
                mobileNav.classList.remove('is-open');
                document.body.classList.remove('mobile-menu-open');
                menuToggle.classList.remove('is-active');
            });
        });

        // Close menu on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && mobileNav.classList.contains('is-open')) {
                menuToggle.setAttribute('aria-expanded', 'false');
                mobileNav.classList.remove('is-open');
                document.body.classList.remove('mobile-menu-open');
                menuToggle.classList.remove('is-active');
            }
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(e) {
            if (mobileNav.classList.contains('is-open') && 
                !mobileNav.contains(e.target) && 
                !menuToggle.contains(e.target)) {
                menuToggle.setAttribute('aria-expanded', 'false');
                mobileNav.classList.remove('is-open');
                document.body.classList.remove('mobile-menu-open');
                menuToggle.classList.remove('is-active');
            }
        });
    }

    /**
     * Sticky Header
     */
    function initStickyHeader() {
        var header = document.querySelector('.site-header');
        
        if (!header) {
            return;
        }

        var scrollThreshold = 100;
        var lastScrollPosition = 0;

        function updateHeader() {
            var currentScrollPosition = window.pageYOffset;

            if (currentScrollPosition > scrollThreshold) {
                header.classList.add('is-scrolled');
            } else {
                header.classList.remove('is-scrolled');
            }

            // Optional: Hide header on scroll down, show on scroll up
            // Uncomment below for this behavior
            /*
            if (currentScrollPosition > lastScrollPosition && currentScrollPosition > 200) {
                header.classList.add('is-hidden');
            } else {
                header.classList.remove('is-hidden');
            }
            */

            lastScrollPosition = currentScrollPosition;
        }

        // Throttle scroll events
        var ticking = false;
        window.addEventListener('scroll', function() {
            if (!ticking) {
                window.requestAnimationFrame(function() {
                    updateHeader();
                    ticking = false;
                });
                ticking = true;
            }
        });

        // Initial check
        updateHeader();
    }

    /**
     * Smooth Scroll for Anchor Links
     */
    function initSmoothScroll() {
        var anchorLinks = document.querySelectorAll('a[href^="#"]');
        
        anchorLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                var targetId = this.getAttribute('href');
                
                if (targetId === '#' || targetId === '#0') {
                    return;
                }

                var targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    e.preventDefault();
                    
                    var headerOffset = 80; // Account for fixed header
                    var elementPosition = targetElement.getBoundingClientRect().top;
                    var offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }

})();

// Hero Slider (Swiper)
document.addEventListener('DOMContentLoaded', function () {
    // Initialize AOS with a small delay to ensure it's fully loaded
    setTimeout(() => {
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 1000,
                once: true,
                offset: 100,
                easing: 'ease-in-out',
            });
        } else {
            console.warn('AOS library not loaded. Animations will not work.');
        }
    }, 100);
    if (typeof Swiper !== 'undefined') {
        const heroSwiperEl = document.querySelector('.hero-swiper');
        if (heroSwiperEl) {
            // eslint-disable-next-line no-undef
            new Swiper('.hero-swiper', {
                loop: true,
                speed: 700,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                effect: 'slide',
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                slidesPerView: 1,
                centeredSlides: false,
                spaceBetween: 0,
                breakpoints: {
                    0: {
                        slidesPerView: 1,
                        spaceBetween: 0,
                    },
                    640: {
                        slidesPerView: 1,
                        spaceBetween: 0,
                    },
                    768: {
                        slidesPerView: 1,
                        spaceBetween: 0,
                    },
                },
            });
        }
    }
});

// Tab Switcher
function openTab(evt, tabName) {
    const tabcontent = document.getElementsByClassName("tab-content");
    const tablinks = document.getElementsByClassName("tab-btn");
    const targetTab = document.getElementById(tabName);

    if (!targetTab) return;

    for (let i = 0; i < tabcontent.length; i++) {
        tabcontent[i].classList.remove("active");
    }

    for (let i = 0; i < tablinks.length; i++) {
        tablinks[i].classList.remove("active", "bg-purple-600", "text-white");
        tablinks[i].classList.add("bg-gray-200", "text-gray-700");
    }

    targetTab.classList.add("active");
    evt.currentTarget.classList.add("active", "bg-purple-600", "text-white");
    evt.currentTarget.classList.remove("bg-gray-200", "text-gray-700");
}

// Counter Animation
function animateCounter(counter) {
    const target = parseInt(counter.dataset.target);
    const increment = target / 100;
    let current = 0;

    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            current = target;
            clearInterval(timer);
        }
        counter.textContent = Math.floor(current);
    }, 20);
}

// Intersection Observer for counters
const counterObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            const counter = entry.target;
            animateCounter(counter);
            counterObserver.unobserve(counter);
        }
    });
});

// Observe all counters
document.querySelectorAll(".counter").forEach((counter) => {
    counterObserver.observe(counter);
});

// Mobile Menu Toggle
function toggleMobileMenu() {
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
    const hamburgerIcon = document.getElementById('hamburger-icon');
    const closeIcon = document.getElementById('close-icon');
    
    if (!mobileMenu || !mobileMenuOverlay || !hamburgerIcon || !closeIcon) return;
    
    const body = document.body;
    const isMenuOpen = !mobileMenu.classList.contains('translate-x-full');
    
    if (isMenuOpen) {
        // Close menu
        closeMobileMenu();
    } else {
        // Open menu
        mobileMenu.classList.remove('translate-x-full');
        mobileMenuOverlay.classList.remove('opacity-0', 'pointer-events-none');
        mobileMenuOverlay.classList.add('opacity-100');
        
        // Toggle icons
        hamburgerIcon.classList.add('opacity-0', 'rotate-90');
        closeIcon.classList.remove('opacity-0');
        closeIcon.classList.add('opacity-100', 'rotate-0');
        
        // Prevent body scroll
        body.style.overflow = 'hidden';
    }
}

function closeMobileMenu() {
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
    const hamburgerIcon = document.getElementById('hamburger-icon');
    const closeIcon = document.getElementById('close-icon');
    
    if (!mobileMenu || !mobileMenuOverlay || !hamburgerIcon || !closeIcon) return;
    
    const body = document.body;
    
    // Close menu
    mobileMenu.classList.add('translate-x-full');
    mobileMenuOverlay.classList.add('opacity-0', 'pointer-events-none');
    mobileMenuOverlay.classList.remove('opacity-100');
    
    // Toggle icons
    hamburgerIcon.classList.remove('opacity-0', 'rotate-90');
    closeIcon.classList.add('opacity-0');
    closeIcon.classList.remove('opacity-100', 'rotate-0');
    
    // Re-enable body scroll
    body.style.overflow = '';
}

// Close mobile menu when clicking overlay
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
    if (mobileMenuOverlay) {
        mobileMenuOverlay.addEventListener('click', closeMobileMenu);
    }
    
    // Close mobile menu on window resize if open
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 768) { // md breakpoint
            closeMobileMenu();
        }
    });
});

// Smooth scrolling for navigation links
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute("href"));
        if (target) {
            target.scrollIntoView({
                behavior: "smooth",
                block: "start",
            });
        }
    });
});

// Form submission (only for consultation form)
const consultationForm = document.getElementById('consultation-form');
if (consultationForm) {
    consultationForm.addEventListener('submit', function (e) {
        e.preventDefault();
        alert('Thank you for your interest! We will contact you soon.');
    });
}

// Maintenance Popup Functionality
function showMaintenancePopup() {
    const popup = document.getElementById('maintenance-popup');
    if (!popup) return;
    
    const popupContent = popup.querySelector('div');
    if (!popupContent) return;
    
    // Show popup
    popup.classList.remove('opacity-0', 'pointer-events-none');
    popup.classList.add('opacity-100');
    
    // Animate content
    setTimeout(() => {
        popupContent.classList.remove('scale-95');
        popupContent.classList.add('scale-100');
    }, 100);
    
    // Prevent body scroll
    document.body.style.overflow = 'hidden';
}

function hideMaintenancePopup() {
    const popup = document.getElementById('maintenance-popup');
    if (!popup) return;
    
    const popupContent = popup.querySelector('div');
    if (!popupContent) return;
    
    // Animate content
    popupContent.classList.remove('scale-100');
    popupContent.classList.add('scale-95');
    
    // Hide popup
    setTimeout(() => {
        popup.classList.add('opacity-0', 'pointer-events-none');
        popup.classList.remove('opacity-100');
    }, 200);
    
    // Re-enable body scroll
    document.body.style.overflow = '';
    
    // Set a flag in localStorage to remember user dismissed the popup
    localStorage.setItem('maintenance-popup-dismissed', 'true');
}

// Initialize maintenance popup
document.addEventListener('DOMContentLoaded', function() {
    const popup = document.getElementById('maintenance-popup');
    
    // Only initialize if popup exists
    if (popup) {
        // Check if popup was already dismissed
        const wasDismissed = localStorage.getItem('maintenance-popup-dismissed');
        
        if (!wasDismissed) {
            // Show popup after a short delay
            setTimeout(showMaintenancePopup, 1000);
        }
        
        // Close button functionality
        const closeButton = document.getElementById('close-maintenance-popup');
        if (closeButton) {
            closeButton.addEventListener('click', hideMaintenancePopup);
        }
        
        // Continue browsing button
        const continueButton = document.getElementById('continue-browsing');
        if (continueButton) {
            continueButton.addEventListener('click', hideMaintenancePopup);
        }
        
        // Notify me button
        const notifyButton = document.getElementById('notify-me');
        if (notifyButton) {
            notifyButton.addEventListener('click', function() {
                // You can implement email notification functionality here
                alert('We\'ll notify you when maintenance is complete!');
                hideMaintenancePopup();
            });
        }
        
        // Close popup when clicking outside
        popup.addEventListener('click', function(e) {
            if (e.target === popup) {
                hideMaintenancePopup();
            }
        });
        
        // Close popup with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !popup.classList.contains('opacity-0')) {
                hideMaintenancePopup();
            }
        });
    }
});

// Maintenance Popup Functionality
function showMaintenancePopup() {
    const popup = document.getElementById('maintenance-popup');
    const popupContent = popup.querySelector('div');
    
    // Show popup
    popup.classList.remove('opacity-0', 'pointer-events-none');
    popup.classList.add('opacity-100');
    
    // Animate content
    setTimeout(() => {
        popupContent.classList.remove('scale-95');
        popupContent.classList.add('scale-100');
    }, 100);
    
    // Prevent body scroll
    document.body.style.overflow = 'hidden';
}

function hideMaintenancePopup() {
    const popup = document.getElementById('maintenance-popup');
    const popupContent = popup.querySelector('div');
    
    // Animate content
    popupContent.classList.remove('scale-100');
    popupContent.classList.add('scale-95');
    
    // Hide popup
    setTimeout(() => {
        popup.classList.add('opacity-0', 'pointer-events-none');
        popup.classList.remove('opacity-100');
    }, 200);
    
    // Re-enable body scroll
    document.body.style.overflow = '';
    
    // Set a flag in localStorage to remember user dismissed the popup
    localStorage.setItem('maintenance-popup-dismissed', 'true');
}

// Initialize maintenance popup
document.addEventListener('DOMContentLoaded', function() {
    const popup = document.getElementById('maintenance-popup');
    
    // Check if popup was already dismissed
    const wasDismissed = localStorage.getItem('maintenance-popup-dismissed');
    
    if (!wasDismissed) {
        // Show popup after a short delay
        setTimeout(showMaintenancePopup, 1000);
    }
    
    // Close button functionality
    const closeButton = document.getElementById('close-maintenance-popup');
    if (closeButton) {
        closeButton.addEventListener('click', hideMaintenancePopup);
    }
    
    // Continue browsing button
    const continueButton = document.getElementById('continue-browsing');
    if (continueButton) {
        continueButton.addEventListener('click', hideMaintenancePopup);
    }
    
    // Notify me button
    const notifyButton = document.getElementById('notify-me');
    if (notifyButton) {
        notifyButton.addEventListener('click', function() {
            // You can implement email notification functionality here
            alert('We\'ll notify you when maintenance is complete!');
            hideMaintenancePopup();
        });
    }
    
    // Close popup when clicking outside
    popup.addEventListener('click', function(e) {
        if (e.target === popup) {
            hideMaintenancePopup();
        }
    });
    
    // Close popup with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !popup.classList.contains('opacity-0')) {
            hideMaintenancePopup();
        }
    });
});

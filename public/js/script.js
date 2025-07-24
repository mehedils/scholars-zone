// Initialize AOS
AOS.init({
    duration: 1000,
    once: true,
});

// Hero Slider

// Tab Switcher
function openTab(evt, tabName) {
    const tabcontent = document.getElementsByClassName("tab-content");
    const tablinks = document.getElementsByClassName("tab-btn");

    for (let i = 0; i < tabcontent.length; i++) {
        tabcontent[i].classList.remove("active");
    }

    for (let i = 0; i < tablinks.length; i++) {
        tablinks[i].classList.remove("active", "bg-purple-600", "text-white");
        tablinks[i].classList.add("bg-gray-200", "text-gray-700");
    }

    document.getElementById(tabName).classList.add("active");
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

// Form submission
document.querySelector("form").addEventListener("submit", function (e) {
    e.preventDefault();
    alert("Thank you for your interest! We will contact you soon.");
});

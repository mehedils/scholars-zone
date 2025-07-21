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
    // Add mobile menu functionality here
    console.log("Mobile menu toggled");
}

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

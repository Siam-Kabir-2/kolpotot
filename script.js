document.addEventListener("DOMContentLoaded", () => {
  // Initialize Lucide icons (already done in HTML, but good to ensure)
  if (typeof lucide !== "undefined") {
    lucide.createIcons();
  }

  // Navbar Scroll Effect
  const topbar = document.getElementById("topbar");
  const handleScroll = () => {
    if (window.scrollY > 20) {
      topbar.classList.add("scrolled");
    } else {
      topbar.classList.remove("scrolled");
    }
  };
  window.addEventListener("scroll", handleScroll);
  handleScroll(); // Initial check

  // Mobile Menu Toggle
  const menuToggle = document.getElementById("menu-toggle");
  const navLinks = document.getElementById("nav-links");

  if (menuToggle && navLinks) {
    menuToggle.addEventListener("click", (e) => {
      e.stopPropagation();
      navLinks.classList.toggle("active");
      const icon = menuToggle.querySelector("i");
      if (navLinks.classList.contains("active")) {
        icon.setAttribute("data-lucide", "x");
      } else {
        icon.setAttribute("data-lucide", "menu");
      }
      lucide.createIcons();
    });

    // Close menu when clicking outside
    document.addEventListener("click", () => {
      if (navLinks.classList.contains("active")) {
        navLinks.classList.remove("active");
        menuToggle.querySelector("i").setAttribute("data-lucide", "menu");
        lucide.createIcons();
      }
    });

    // Close menu when clicking a link
    navLinks.querySelectorAll("a").forEach((link) => {
      link.addEventListener("click", () => {
        navLinks.classList.remove("active");
        menuToggle.querySelector("i").setAttribute("data-lucide", "menu");
        lucide.createIcons();
      });
    });
  }

  // Smooth Reveal Animations with Intersection Observer
  const observerOptions = {
    threshold: 0.15,
    rootMargin: "0px 0px -50px 0px",
  };

  const revealObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("revealed");
        revealObserver.unobserve(entry.target);
      }
    });
  }, observerOptions);

  // Dynamic animation delay for grid items
  const animateElements = (selector, delayIncrement = 100) => {
    const elements = document.querySelectorAll(selector);
    elements.forEach((el, index) => {
      el.classList.add("reveal-item");
      el.style.transitionDelay = `${index * delayIncrement}ms`;
      revealObserver.observe(el);
    });
  };

  // Apply animations
  animateElements(".stat-item", 150);
  animateElements(".gallery-card", 200);
  animateElements(".feature-item", 150);
  animateElements(".membership-form", 0);
  animateElements(".membership-sidebar", 120);
  animateElements(
    ".foundation-content, .foundation-img, .contact-card, .section-header",
    0,
  );

  // Add CSS for reveal animations dynamically
  const revealStyles = document.createElement("style");
  revealStyles.textContent = `
        .reveal-item {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s cubic-bezier(0.2, 1, 0.3, 1);
        }
        .reveal-item.revealed {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Specific reveal for different elements */
        .foundation-img.reveal-item {
            transform: scale(0.95) translateY(20px);
        }
        .foundation-img.reveal-item.revealed {
            transform: scale(1) translateY(0);
        }
    `;
  document.head.appendChild(revealStyles);

  console.log("Kolpopot | UI/UX Pro Max Edition Loaded");
});

export default function (el) {
  const burgerBtn = el.querySelector('.burger-btn');
  const mobileMenu = el.querySelector('.mobile-menu');
  const mobileOverlay = el.querySelector('.mobile-overlay');
  const closeBtn = el.querySelector('.mobile-close');
  const menuLinks = el.querySelectorAll('.mobile-menu-link');
  const nav = el.querySelector('nav');

  // Scroll behavior variables
  let lastScrollY = window.scrollY;
  let ticking = false;

  function openMenu() {
    burgerBtn.classList.add('active');
    mobileOverlay.classList.remove('hidden');
    mobileMenu.classList.remove('translate-x-full');
    document.body.style.overflow = 'hidden';

    setTimeout(() => {
      mobileOverlay.classList.remove('opacity-0');
    }, 10);
  }

  function closeMenu() {
    burgerBtn.classList.remove('active');
    mobileOverlay.classList.add('opacity-0');
    mobileMenu.classList.add('translate-x-full');
    document.body.style.overflow = '';

    setTimeout(() => {
      mobileOverlay.classList.add('hidden');
    }, 300);
  }

  // Handle scroll show/hide navbar
  function handleScroll() {
    const currentScrollY = window.scrollY;

    // Don't hide if at the top
    if (currentScrollY < 10) {
      nav.classList.remove('-translate-y-full');
      lastScrollY = currentScrollY;
      return;
    }

    // Scrolling down - hide navbar
    if (currentScrollY > lastScrollY && currentScrollY > 100) {
      nav.classList.add('-translate-y-full');
    }
    // Scrolling up - show navbar
    else if (currentScrollY < lastScrollY) {
      nav.classList.remove('-translate-y-full');
    }

    lastScrollY = currentScrollY;
  }

  function requestScrollTick() {
    if (!ticking) {
      window.requestAnimationFrame(() => {
        handleScroll();
        ticking = false;
      });
      ticking = true;
    }
  }

  // Handle mobile dropdown toggles
  const dropdownToggles = mobileMenu.querySelectorAll('.mobile-dropdown-toggle');

  dropdownToggles.forEach(toggle => {
    toggle.addEventListener('click', (e) => {
      e.preventDefault();
      e.stopPropagation();

      const dropdown = toggle.closest('.mobile-dropdown');
      const content = dropdown.querySelector('.mobile-dropdown-content');
      const svg = toggle.querySelector('svg');
      const isOpen = dropdown.getAttribute('data-open') === 'true';

      if (isOpen) {
        // Close
        dropdown.setAttribute('data-open', 'false');
        content.style.maxHeight = '0';
        content.style.paddingBottom = '0';
        svg.style.transform = 'rotate(0deg)';
      } else {
        // Open
        dropdown.setAttribute('data-open', 'true');
        content.style.maxHeight = '1000px';
        content.style.paddingBottom = '1rem';
        svg.style.transform = 'rotate(180deg)';
      }
    });
  });

  burgerBtn.addEventListener('click', openMenu);
  closeBtn.addEventListener('click', closeMenu);
  mobileOverlay.addEventListener('click', closeMenu);
  window.addEventListener('scroll', requestScrollTick, { passive: true });

  menuLinks.forEach(link => {
    link.addEventListener('click', closeMenu);
  });

  return () => {
    burgerBtn.removeEventListener('click', openMenu);
    closeBtn.removeEventListener('click', closeMenu);
    mobileOverlay.removeEventListener('click', closeMenu);
    window.removeEventListener('scroll', requestScrollTick);
    menuLinks.forEach(link => {
      link.removeEventListener('click', closeMenu);
    });
  };
}

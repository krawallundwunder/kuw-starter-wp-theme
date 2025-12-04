export default function (el) {
  const burgerBtn = el.querySelector('.burger-btn');
  const mobileMenu = el.querySelector('.mobile-menu');
  const mobileOverlay = el.querySelector('.mobile-overlay');
  const closeBtn = el.querySelector('.mobile-close');
  const menuLinks = el.querySelectorAll('.mobile-menu-link');

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

  burgerBtn.addEventListener('click', openMenu);
  closeBtn.addEventListener('click', closeMenu);
  mobileOverlay.addEventListener('click', closeMenu);

  menuLinks.forEach(link => {
    link.addEventListener('click', closeMenu);
  });

  return () => {
    burgerBtn.removeEventListener('click', openMenu);
    closeBtn.removeEventListener('click', closeMenu);
    mobileOverlay.removeEventListener('click', closeMenu);
    menuLinks.forEach(link => {
      link.removeEventListener('click', closeMenu);
    });
  };
}

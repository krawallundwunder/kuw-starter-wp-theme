document.addEventListener('alpine:init', () => {
  Alpine.data('mobileMenu', () => ({
    open: false,

    toggle() {
      this.open = ! this.open
      document.body.classList.toggle('no-scroll')
    },
  }))
})

// Mobile Menu Toggle with Alpine.js
document.addEventListener('alpine:init', function () {
  // Disable eslint check for next line since Alpine.js is loaded via script tag.
  // eslint-disable-next-line
  Alpine.data('mobileMenu', function () {
    return {
      open: false,
      toggle: function toggle() {
        this.open = !this.open
        document.body.classList.toggle('no-scroll')
      },
    }
  })
})

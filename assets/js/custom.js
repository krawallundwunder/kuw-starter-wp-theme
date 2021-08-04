"use strict";

document.addEventListener('alpine:init', function () {
  Alpine.data('mobileMenu', function () {
    return {
      open: false,
      toggle: function toggle() {
        this.open = !this.open;
        document.body.classList.toggle('no-scroll');
      }
    };
  });
});
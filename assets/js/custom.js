"use strict";

function mobileMenu() {
  return {
    show: false,
    toggle: function toggle() {
      this.show = !this.show;
      document.body.classList.toggle('no-scroll');
    },
    isOpen: function isOpen() {
      return true === this.show;
    }
  };
}
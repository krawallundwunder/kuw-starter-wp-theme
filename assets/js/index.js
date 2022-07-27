import { createApp } from 'petite-vue'

function Menu() {
  return {
    isOpen: false,
    isScrolled: false,
    toggle() {
      this.isOpen = !this.isOpen
      document.body.classList.toggle('no-scroll')
    },
    updateScroll() {
      this.isScrolled = window.scrollY
      if (window.scrollY > 80) {
        this.isScrolled = true
      } else {
        this.isScrolled = false
      }
    },
    watchScroll() {
      window.addEventListener('scroll', this.updateScroll)
    },
  }
}

const Accordion = () => {
  return {
    isOpen: false,
    toggle() {
      this.isOpen = !this.isOpen
    },
  }
}

const Hero = () => {
  return {
    scrollDown() {
      const pageHeight = window.innerHeight
      window.scrollBy(0, pageHeight)
    },
  }
}

createApp({
  $delimiters: ['${', '}'],
  Accordion,
  Menu,
  Hero,
}).mount()

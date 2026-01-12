import { buildRefs, getJSON } from '@/assets/scripts/helpers.js'
import Swiper from 'swiper'
import { Autoplay, A11y, Navigation, Pagination } from 'swiper/modules'
import 'swiper/css'
import 'swiper/css/autoplay'
import 'swiper/css/a11y'
import 'swiper/css/navigation'
import 'swiper/css/pagination'

export default function (el) {
  const elements = buildRefs(el)
  const componentData = getJSON(el)

  let swiper

  // Initialize when component is ready
  const initWhenReady = (startTime) => {
    const now = performance.now();
    if (!startTime) startTime = now;

    // Timeout nach 3 Sekunden
    if (now - startTime > 3000) {
      console.warn('Swiper: Slider element did not gain width within 3s.');
      return;
    }

    if (elements.slider && elements.slider.offsetWidth > 0) {
      swiper = initSlider(elements, componentData);
    } else {
      requestAnimationFrame(() => initWhenReady(startTime));
    }
  };

  if (document.fonts && document.fonts.ready) {
    document.fonts.ready.then(() => {
      initWhenReady()
    })
  } else {
    initWhenReady()
  }

  return () => swiper?.destroy?.()
}

function initSlider(elements, componentData) {
  const { options } = componentData

  const config = {
    modules: [Autoplay, A11y, Navigation, Pagination],
    initialSlide: 0,
    spaceBetween: 40,
    roundLengths: true,
    centeredSlides: true,
    rewind: true,
    updateOnImagesReady: true,
    preloadImages: true,
    watchSlidesProgress: true,

    a11y: options.a11y || {
      prevSlideMessage: 'Previous slide',
      nextSlideMessage: 'Next slide',
      firstSlideMessage: 'This is the first slide',
      lastSlideMessage: 'This is the last slide',
      paginationBulletMessage: 'Go to slide {{index}}'
    },
    breakpoints: {
      768: {
        slidesPerView: 1,
        spaceBetween: 40,
        grabCursor: true,
        resistanceRatio: 0.5,
        touchRatio: 1,
      },
      1024: {
        slidesPerView: 1,
        spaceBetween: 40,
        grabCursor: false,
        allowTouchMove: false,
      }
    },

    navigation: {
      nextEl: elements.next,
      prevEl: elements.prev,
      disabledClass: 'swiper-button-disabled',
      hiddenClass: 'swiper-button-hidden'
    },
    pagination: {
      el: elements.pagination,
      clickable: true,
      bulletClass: 'slider-pagination-bullet inline-block w-2.5 h-2.5 rounded-full border border-primary! cursor-pointer transition-all duration-200',
      bulletActiveClass: 'slider-pagination-bullet-active bg-primary border-primary'
    }
  }

  if (options.autoplay && options.autoplaySpeed) {
    config.autoplay = {
      delay: options.autoplaySpeed,
      disableOnInteraction: false
    }
  }

  try {
    const swiper = new Swiper(elements.slider, config)

    swiper.on('init', () => {
      setEqualHeight(swiper)
    })

    swiper.on('imagesReady', () => {
      setEqualHeight(swiper)
      swiper.update()
    })

    swiper.on('resize', () => {
      setEqualHeight(swiper)
    })

    return swiper
  } catch (error) {
    console.error('Swiper initialization error:', error)
  }
}

function setEqualHeight(swiper) {
  if (!swiper || !swiper.slides) return

  const slides = swiper.slides
  let maxHeight = 0

  slides.forEach(slide => {
    const section = slide.querySelector('section')
    if (section) {
      section.style.height = 'auto'
    }
  })

  slides.forEach(slide => {
    const section = slide.querySelector('section')
    if (section) {
      const slideHeight = section.offsetHeight
      if (slideHeight > maxHeight) {
        maxHeight = slideHeight
      }
    }
  })

  if (maxHeight > 0) {
    slides.forEach(slide => {
      const section = slide.querySelector('section')
      if (section) {
        section.style.height = maxHeight + 'px'
      }
    })
  }
}


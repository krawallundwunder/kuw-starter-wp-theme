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

  // Wait for component to be fully in DOM
  let swiper
  setTimeout(() => {
    swiper = initSlider(elements, componentData)
  }, 100)

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
      bulletClass: 'slider-pagination-bullet inline-block w-2.5 h-2.5 rounded-full border border-yellow-400! cursor-pointer transition-all duration-200',
      bulletActiveClass: 'slider-pagination-bullet-active bg-yellow-400 border-yellow-400'
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

    // Force update to ensure proper rendering
    setTimeout(() => {
      swiper.update()
      swiper.navigation.update()
      swiper.pagination.update()
    }, 300)

    return swiper
  } catch (error) {
    console.error('Swiper initialization error:', error)
  }

}

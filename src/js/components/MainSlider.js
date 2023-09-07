import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';

export default function MainSlider() {
  const swiper = new Swiper('.main-slider .swiper', {
    modules: [Navigation, Pagination],
    loop: false,
    rewind: true,
    spaceBetween: 0,
    slidesPerView: 1,
    pagination: {
      el: ".main-slider__pagination.--desc",
      type: 'custom',
      renderCustom: function (swiper, current, total) {
        return '<div class="fraction-wrapper"><span class="current">' + current + '</span>&nbsp;/&nbsp;<span class="total">' + total + '</span></div>';
      }
    },
  });

  const buttonNext = document.querySelectorAll('.main-slider__navigation .swiper-navigation-next');
  const buttonPrev = document.querySelectorAll('.main-slider__navigation .swiper-navigation-prev');
  if (buttonNext.length > 0) {
    buttonNext.forEach(btn => {
      btn.addEventListener('click', () => {
        swiper.slideNext();
      })
    })
  }

  if (buttonPrev.length > 0) {
    buttonPrev.forEach(btn => {
      btn.addEventListener('click', () => {
        swiper.slidePrev();
      })
    })
  }
}
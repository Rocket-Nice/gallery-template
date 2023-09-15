import Swiper, { Navigation, Pagination } from 'swiper';

Swiper.use([Navigation, Pagination]);

export default function MainSlider() {
  const swiper = new Swiper('.main-slider .swiper', {
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

  const slider = document.querySelector('.main-slider .swiper');

  if (slider) {

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
}
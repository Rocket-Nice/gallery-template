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

    const pagination = document.querySelector('.main-slider__pagination');
    const navigation = document.querySelector('.main-slider__navigation');

    function checkedScroll() {
      if (window.innerWidth > 1439 && window.scrollY > 20) {
        pagination.classList.add('--hidden');
        navigation.classList.add('--hidden');
      } else {
        pagination.classList.remove('--hidden');
        navigation.classList.remove('--hidden');
      }
    }

    checkedScroll();
    window.addEventListener('scroll', () => {
      checkedScroll();
    });
  }
}
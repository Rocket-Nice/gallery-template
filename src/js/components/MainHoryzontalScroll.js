import Swiper from 'swiper';
import SwiperCore, { Keyboard, Mousewheel } from 'swiper';

SwiperCore.use([Keyboard, Mousewheel]);

export default function MainHoryzontalScroll() {
  const swiper = new Swiper('.horizontal-slider', {
    direction: "horizontal",
    spaceBetween: 0,
    slidesPerView: 1,
    speed: 1000,
    allowTouchMove: false,
    mousewheel: {
      releaseOnEdges: false,
    },
  });

  const pagination = document.querySelector('.main-slider__pagination');
  const navigation = document.querySelector('.main-slider__navigation');

  // отключение возможности прокрутки слайдера вниз
  swiper.on('slideChange', function () {
    setTimeout(() => {
      swiper.params.mousewheel.releaseOnEdges = false;
    }, 500);
    // отключение навигации и пагинации внутреннего слайдера на первой экране
    if (swiper.activeIndex === 0) {
      pagination.classList.remove('--hidden');
      navigation.classList.remove('--hidden');
    } else {
      pagination.classList.add('--hidden');
      navigation.classList.add('--hidden');
    }
  });

  // включение возможности прокрутки слайдера вниз на последнем слайде
  swiper.on('reachEnd', function () {
    setTimeout(() => {
      swiper.params.mousewheel.releaseOnEdges = true;
    }, 1000);
  });


  // блокировка слайдера когда страница прокручена вниз
  function clientsNewObservering() {
    const slider = document.querySelectorAll(
      '.horizontal-slider',
    );
    const config = {
      rootMargin: '0%',
      threshold: 1,
    };
    const callback = entries => {
      entries.forEach(entry => {
        if (!entry.isIntersecting) {
          swiper.disable();
        } else {
          swiper.enable();
        }
      });
    };

    const observer = new IntersectionObserver(callback, config);

    slider.forEach(element => {
      observer.observe(element);
    });
  }

  clientsNewObservering();

  // отключение скролла на стрелки
  window.addEventListener("keydown", function (e) {
    if (["Space", "ArrowUp", "ArrowDown", "ArrowLeft", "ArrowRight"].indexOf(e.code) > -1) {
      e.preventDefault();
    }
  }, false);
}
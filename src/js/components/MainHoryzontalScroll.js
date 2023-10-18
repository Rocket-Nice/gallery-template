import Swiper from 'swiper';
import SwiperCore, { Keyboard, Mousewheel } from 'swiper';

SwiperCore.use([Keyboard, Mousewheel]);

export default function MainHoryzontalScroll() {
  const isMainPage = document.querySelector('.main-page');
  if (isMainPage) {
    const menu = document.querySelector('.header-desc .menu');
    const logo = document.querySelector('.header-logo');
    let mql = window.matchMedia("(max-width: 1023px)");
    const swiperAtribute = {
      direction: "horizontal",
      spaceBetween: 0,
      slidesPerView: 1,
      speed: 1000,
      allowTouchMove: false,
      mousewheel: {
        releaseOnEdges: false,
      },
    };

    let isSwiperInit = false;
    if (window.innerWidth > 1023) {
      const swiper = new Swiper('.horizontal-slider', swiperAtribute);
      swiperEvents(swiper);
      isSwiperInit = true;
    }

    const containerSwiper = document.querySelector('.horizontal-slider__container');
    const sliderBlock = document.querySelector('.horizontal-slider');

    // событие сработает когда экран ресайзнет границу 1024px
    mql.onchange = (e) => {
      window.scrollTo({
        top: 0,
        left: 0,
        behavior: 'instant',
      });

      if (sliderBlock && e.matches && isSwiperInit) {
        menu.classList.add('--reverse');
        logo.classList.add('--reverse');
        const swiper1 = sliderBlock.swiper;
        if (swiper1) {
          swiper1.destroy(true, true);
          isSwiperInit = false;
          sliderBlock.style = '';
          sliderBlock.querySelector('.swiper-wrapper').style = '';
          sliderBlock.querySelector('.swiper-slide').style = '';
          window.observer?.unobserve?.(document.querySelector('.horizontal-slider'));
        }
      } else if (containerSwiper && !e.matches && !isSwiperInit) {
        logo.classList.add('--reverse');
        isSwiperInit = true;
        const swiper2 = new Swiper('.horizontal-slider', swiperAtribute);
        swiperEvents(swiper2);
      }
    };

    function swiperEvents(swiper) {
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

        // смена цвета лого и меню
        if (swiper.activeIndex === 1 || swiper.activeIndex === 4) {
          menu.classList.remove('--reverse');
          logo.classList.remove('--reverse');
        } else {
          menu.classList.add('--reverse');
          logo.classList.add('--reverse');
        }
      });

      // включение возможности прокрутки слайдера вниз на последнем слайде
      swiper.on('reachEnd', function () {
        setTimeout(() => {
          swiper.params.mousewheel.releaseOnEdges = true;
        }, 1000);
      });

      clientsNewObservering(swiper);
    }

    // блокировка слайдера когда страница прокручена вниз
    function clientsNewObservering(swiper) {
      const config = {
        rootMargin: '0%',
        threshold: 1,
      };
      const callback = entries => {
        if (window.innerWidth > 1023) {
          entries.forEach(entry => {
            if (!entry.isIntersecting) {
              swiper.disable();
            } else {
              swiper.enable();
            }
          });
        }
      };

      const observer = new IntersectionObserver(callback, config);
      observer.observe(document.querySelector('.horizontal-slider'));
      window.observer = observer;
    }

    //доскролить страницу наверх при перезагрузке
    window.onbeforeunload = function () {
      if (window.innerWidth > 1023) {
        window.scrollTo({
          top: 0,
          left: 0,
          behavior: 'instant',
        });
      }
    }

    // отключение скролла на стрелки
    window.addEventListener("keydown", function (e) {
      if (["Space", "ArrowUp", "ArrowDown", "ArrowLeft", "ArrowRight"].indexOf(e.code) > -1) {
        e.preventDefault();
      }
    }, false);
  }
}
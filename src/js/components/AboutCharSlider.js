import Swiper from 'swiper';
import SwiperCore, { Keyboard, Mousewheel } from 'swiper';

SwiperCore.use([Keyboard, Mousewheel]);

export default function AboutCharSlider() {
  const body = document.querySelector('body');
  const isAboutPage = document.querySelector('.about-page');
  if (isAboutPage) {
    let mql = window.matchMedia("(max-width: 1023px)");
    const swiperAtribute = {
      direction: "vertical",
      spaceBetween: 0,
      slidesPerView: 1,
      speed: 1000,
      allowTouchMove: false,
      mousewheel: {
        enabled: true,
        releaseOnEdges: false,
      },
    };

    let isSwiperInit = false;
    if (window.innerWidth > 1023) {
      const swiper = new Swiper('.about-char .swiper', swiperAtribute);
      swiper.disable();
      swiperEvents(swiper);
      isSwiperInit = true;
    }

    function swiperEvents(swiper) {
      // отключение возможности прокрутки слайдера вниз
      swiper.on('slideChange', function () {
        setTimeout(() => {
          if (swiper.activeIndex !== 0) {
            swiper.params.mousewheel.releaseOnEdges = false;
            swiper.disable();
          }
        }, 500);
      });

      // включение возможности прокрутки слайдера вниз на последнем слайде
      swiper.on('reachEnd', function () {
        setTimeout(() => {
          swiper.params.mousewheel.releaseOnEdges = true;
        }, 1000);
      });

      // включение возможности прокрутки слайдера вниз на последнем слайде
      swiper.on('reachBeginning', function () {
        window.addEventListener('wheel', (e) => {
          console.log(e.deltaY);
        })
      });
    }

    window.addEventListener('scroll', () => {
      if (window.scrollY > window.innerHeight - 10) {
        window.scrollTo({
          top: window.innerHeight,
          left: 0,
          behavior: 'instant',
        });
        const swiper = document.querySelector('.about-char .swiper').swiper;
        setTimeout(() => {
          swiper.enable();
          // swiper.params.mousewheel.releaseOnEdges = true;
        }, 500);
      }
    })

    // // блокировка слайдера когда страница прокручена вниз
    // function clientsNewObservering(swiper) {
    //   const config = {
    //     rootMargin: '0%',
    //     threshold: 1,
    //   };
    //   const callback = entries => {
    //     if (window.innerWidth > 1023) {
    //       entries.forEach(entry => {
    //         if (!entry.isIntersecting) {
    //           swiper.disable();
    //         } else {
    //           console.log(true);
    //           window.scrollTo({
    //             top: window.innerHeight,
    //             left: 0,
    //             behavior: 'instant',
    //           });
    //           setTimeout(() => {
    //             swiper.enable();
    //           }, 500);
    //         }
    //       });
    //     }
    //   };

    //   const observer = new IntersectionObserver(callback, config);
    //   observer.observe(document.querySelector('.about-char .swiper'));
    //   window.observer = observer;
    // }










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
  }
}
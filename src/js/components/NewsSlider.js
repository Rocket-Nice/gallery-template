import Swiper, { Navigation } from 'swiper';

Swiper.use([Navigation]);

export default function NewsSlider() {
  const swiperDesc = new Swiper('.main-news .swiper.--desc', {
    direction: 'horizontal',
    slidesPerView: "auto",
    spaceBetween: 8,
    preloadImages: false,
    centeredSlides: true,
    loop: true,
    navigation: {
      nextEl: '.main-news .swiper.--desc .swiper-navigation-next',
      prevEl: '.main-news .swiper.--desc .swiper-navigation-prev',
    },
    breakpoints: {
      1024: {
        spaceBetween: 215,
      },
    }
  });

  const swiperMobile = new Swiper('.main-news .swiper.--mobile', {
    direction: 'horizontal',
    slidesPerView: 1,
    spaceBetween: 24,
    preloadImages: false,
    centeredSlides: false,
    loop: true,
    navigation: {
      nextEl: '.main-news .swiper.--mobile .swiper-navigation-next',
      prevEl: '.main-news .swiper.--mobile .swiper-navigation-prev',
    },
    breakpoints: {
      768: {
        slidesPerView: 2,
      },
    }
  });
}
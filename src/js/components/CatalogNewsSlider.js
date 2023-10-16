import Swiper, { Navigation, Pagination } from 'swiper';

Swiper.use([Navigation, Pagination]);

export default function CatalogNewsSlider() {
  const swiper = new Swiper('.catalog-single-news .swiper', {
    loop: true,
    rewind: false,
    spaceBetween: 10,
    slidesPerView: 'auto',
    navigation: {
      nextEl: '.catalog-single-news__navigation .swiper-navigation-next',
      prevEl: '.catalog-single-news__navigation .swiper-navigation-prev',
    },
    breakpoints: {
      768: {
        slidesPerView: 2,
      },
    }
  });
}
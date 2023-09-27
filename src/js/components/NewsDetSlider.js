import Swiper, { Navigation, Pagination } from 'swiper';

Swiper.use([Navigation, Pagination]);

export default function NewsDetSlider() {
  const swiper = new Swiper('.news-det-slider .swiper', {
    rewind: true,
    spaceBetween: 20,
    slidesPerView: 1,
    navigation: {
      nextEl: '.news-det-slider .swiper-navigation-next',
      prevEl: '.news-det-slider .swiper-navigation-prev',
    },
  });
}
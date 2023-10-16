import Swiper, { EffectFade, Navigation, Pagination } from 'swiper';

Swiper.use([Navigation, Pagination, EffectFade]);

export default function CatalogSingleImages() {
  const swiper = new Swiper('.catalog-single-sliders__big .swiper', {
    loop: false,
    rewind: true,
    spaceBetween: 30,
    slidesPerView: 1,
    allowTouchMove: false,
    effect: "fade",
    navigation: {
      nextEl: '.catalog-single-sliders__navigation .swiper-navigation-next',
      prevEl: '.catalog-single-sliders__navigation .swiper-navigation-prev',
    },
    pagination: {
      el: ".catalog-single-sliders__pagination",
      type: 'custom',
      renderCustom: function (swiper, current, total) {
        return '<div class="fraction-wrapper"><span class="current">' + current + '</span>&nbsp;/&nbsp;<span class="total">' + total + '</span></div>';
      }
    },
  });

  const swiper1 = new Swiper('.catalog-single-sliders__little .swiper', {
    loop: false,
    rewind: true,
    spaceBetween: 30,
    slidesPerView: 1,
    allowTouchMove: false,
    effect: "fade",
    navigation: {
      nextEl: '.catalog-single-sliders__navigation .swiper-navigation-next',
      prevEl: '.catalog-single-sliders__navigation .swiper-navigation-prev',
    },
  });
}
import Swiper from 'swiper';
import SwiperCore, { Keyboard, Mousewheel } from 'swiper';

SwiperCore.use([Keyboard, Mousewheel]);

export default function MainHoryzontalScroll() {
  const swiper = new Swiper('.horizontal-slider', {
    direction: "horizontal",
    spaceBetween: 0,
    slidesPerView: 1,
    mousewheel: true,
  });
}
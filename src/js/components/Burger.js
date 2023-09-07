import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';

export default function Burger() {
  const body = document.querySelector('body');
  const burger = document.querySelector('[data-burger]');
  const burgerOpen = document.querySelector('[data-burger-open]');
  const burgerClose = document.querySelector('[data-burger-close]');

  if (burger) {
    burgerOpen.addEventListener('click', () => {
      burger.classList.add('--open');
      body.classList.add('hidden');
    });
    burgerClose.addEventListener('click', () => {
      burger.classList.remove('--open');
      body.classList.remove('hidden');
    });
  }
}
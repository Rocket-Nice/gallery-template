export default function Burger() {
  const body = document.querySelector('body');
  const burger = document.querySelector('[data-burger]');
  const burgerOpen = document.querySelector('[data-burger-open]');
  const burgerClose = document.querySelector('[data-burger-close]');
  const logo = document.querySelector('.header-logo');

  if (burger) {
    burgerOpen.addEventListener('click', () => {
      burger.classList.add('--open');
      body.classList.add('hidden');
      logo.classList.add('--burger');
    });
    burgerClose.addEventListener('click', () => {
      burger.classList.remove('--open');
      body.classList.remove('hidden');
      logo.classList.remove('--burger');
    });
  }
}
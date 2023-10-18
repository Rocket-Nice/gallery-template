export default function AboutPage() {
  const isAboutPage = document.querySelector('main.about-page');
  const body = document.querySelector('body');
  if (isAboutPage) {
    const blocksWhite = document.querySelectorAll('[data-header]')
    if (blocksWhite.length > 0) {
      // Запускаем функцию при прокрутке страницы
      window.addEventListener('scroll', function () {
        // Получаем нужный элемент
        blocksWhite.forEach(element => {
          Visible(element);
        })
      });
      // Получаем нужный элемент
      blocksWhite.forEach(element => {
        Visible(element);
      })
    }
  }
}

const menu = document.querySelector('.header-desc .menu');
const logo = document.querySelector('.header-logo');

var Visible = function (target) {
  // Все позиции элемента
  var targetPosition = {
    top: window.scrollY + target.getBoundingClientRect().top,
    bottom: window.scrollY + target.getBoundingClientRect().bottom
  },
    // Получаем позиции окна
    windowPosition = {
      top: window.scrollY,
      bottom: window.scrollY + document.documentElement.clientHeight
    };

  if (targetPosition.bottom > windowPosition.top + 100 && // 
    targetPosition.top < windowPosition.top + 100) { // 
    // Если элемент полностью видно, то запускаем следующий код
    if (target.dataset.header === 'default') {
      logo.classList.remove('--reverse');
    } else {
      logo.classList.add('--reverse');
    }
  }

  if (targetPosition.bottom > windowPosition.bottom - 100 && // 
    targetPosition.top < windowPosition.bottom - 100) { // 
    // Если элемент полностью видно, то запускаем следующий код
    if (target.dataset.header === 'default') {
      menu.classList.remove('--reverse');
    } else {
      menu.classList.add('--reverse');
    }
  }
};
export default function MainPage() {
  const isMainPage = document.querySelector('main.main-page');
  const body = document.querySelector('body');
  if (isMainPage) {
    const noScrollBlocks = document.querySelectorAll('.header-logo, .header-desc');
    if (noScrollBlocks) {
      noScrollBlocks.forEach(block => {
        block.addEventListener("mouseover", () => {
          body.classList.add('hidden');
        });
        block.addEventListener("mouseout", () => {
          body.classList.remove('hidden');
        });
      })
    }
  }

  const blocksWhite = document.querySelectorAll('[data-header]')
  if (blocksWhite.length > 0) {
    // Запускаем функцию при прокрутке страницы
    window.addEventListener('scroll', function () {
      if (window.innerWidth < 1024) {
        // Получаем нужный элемент
        blocksWhite.forEach(element => {
          Visible(element);
        })
      }
    });

    if (window.innerWidth < 1024) {
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
};
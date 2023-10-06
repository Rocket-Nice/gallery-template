export default function Modal() {
  const body = document.querySelector('body');

  // открытие модалки по нажатию на кнопки
  const btns = document.querySelectorAll('[data-modal-open]');
  if (btns.length > 0) {
    btns.forEach(btn => {
      btn.addEventListener('click', () => {
        const modal = document.querySelector(`[data-modal-name=${btn.dataset.modalOpen}]`);
        modalOpen(modal, body);
      });
    });
  }

  // закрытие модалки по нажатию на кнопки
  const btnsModalClose = document.querySelectorAll('[data-modal-close]');
  if (btnsModalClose.length > 0) {
    btnsModalClose.forEach(btn => {
      btn.addEventListener('click', () => {
        const modal = btn.closest('[data-modal-name]');
        modalClose(modal, body);
      });
    });
  }

  // закрытие модалки по нажатию вне области
  window.addEventListener('click', (e) => {
    const target = e.target;
    const modal = target.closest('[data-modal-name]');
    if (modal && !target.closest('.modal__inner')) {
      modalClose(modal, body);
    }
  });
}

function modalOpen(modal, body) {
  body.classList.add('hidden');
  modal.classList.add('--open');
}

function modalClose(modal, body) {
  const form = document.querySelector('#form');
  const completed = document.querySelector('#form-completed');
  const modalContainer = completed.closest('.modal__inner');
  modal.classList.remove('--open');
  body.classList.remove('hidden');
  if (completed && form) {
    setTimeout(() => {
      completed.classList.add('--hidden');
      modalContainer.classList.remove('completed');
      form.classList.remove('--hidden');
    }, 350);
  }
}
export default function NewsSort() {
  const buttons = document.querySelectorAll('.news-tags .news-tags__item');
  if (buttons.length > 0) {
    buttons.forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.preventDefault;
        const activeBtn = document.querySelector('.news-tags .news-tags__item.--active');
        if (btn.classList.contains('--active')) {
          btn.classList.remove('--active');
        } else {
          if (activeBtn) {
            activeBtn.classList.remove('--active');
          }
          btn.classList.add('--active');
        }
      });
    });
  }
}
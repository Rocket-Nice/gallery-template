export default function CatalogFilters() {
  const buttons = document.querySelectorAll('.sidebar-block-body__item');
  if (buttons.length > 0) {
    buttons.forEach(btn => {
      btn.addEventListener('click', () => {
        btn.classList.toggle('--checked');
      });
    });
  }
}
export default function CatalogFilters() {
  const filterButtons = document.querySelectorAll('.sidebar-block-body__item');
  if (filterButtons.length > 0) {
    filterButtons.forEach(btn => {
      btn.addEventListener('click', () => {
        btn.classList.toggle('--checked');
        window.history.replaceState("object or string", "Title", '?'+getUrl() );
      });
    });
  }

  const sidebarHeads = document.querySelectorAll('.sidebar-block-head');
  sidebarHeads.forEach((headBtn) => {
    headBtn.addEventListener('click', () => {
      const container = headBtn.closest('.sidebar-block');
      container.classList.toggle('--open');
      window.history.replaceState("object or string", "Title", '?'+getUrl() );
    })
  })

}

function getUrl() {
  let typeParams = '';
  let categoriesParams = '';
  const sidebarHeads = document.querySelectorAll('.sidebar-block-head');
  const sidebarCategories = document.querySelectorAll('.sidebar-block-body__item');
  sidebarHeads.forEach((headBtn) => {
    if (headBtn.closest('.sidebar-block').classList.contains('--open')) {
      typeParams += headBtn.dataset.type + ',';
    }
  })
  sidebarCategories.forEach((categoriesBtn) => {
    if (categoriesBtn.classList.contains('--checked')) {
      categoriesParams += categoriesBtn.dataset.category + ',';
    }
  })

  return (typeParams ? 'type=' + typeParams.slice(0, -1) + (categoriesParams ? '&category=' + categoriesParams.slice(0, -1) : '') : '');
}
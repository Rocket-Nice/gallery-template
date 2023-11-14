export default function CatalogFilters() {
  const mainContent = document.querySelector('.catalog__content.main-content ');
  const cardsCatalog = document.querySelector('.catalog__content.cards-catalog ');

  const filterButtons = document.querySelectorAll('.sidebar-block-body__item');
  if (filterButtons.length > 0) {
    filterButtons.forEach(btn => {
      btn.addEventListener('click', () => {
        btn.classList.toggle('--checked');
        window.history.replaceState("object or string", "Title", '?' + getUrl());
      });
    });
  }

  const sidebarHeads = document.querySelectorAll('.sidebar-block-head');
  sidebarHeads.forEach((headBtn) => {
    headBtn.addEventListener('click', () => {
      // Закрытие открытого элемента и снятие всех выбранных внетренних характеристик
      const openedContainer = document.querySelector('.sidebar-block.--open');
      if (openedContainer) {
        openedContainer.classList.remove('--open');
        const selectedChars = openedContainer.querySelectorAll('.sidebar-block-body__item.--checked');
        selectedChars.forEach((selectedChar)=> {
          selectedChar.classList.remove('--checked');
        })
      }

      // Открытие нашатого элемента и скрытие/раскрытие таблицы с магазинами
      const container = headBtn.closest('.sidebar-block');
      if (openedContainer !== container) { // Открытие и смена контейнеров
        container.classList.toggle('--open');
        // Скрытие/открытие заголовка таблиы с магазинами
        const showedTitle = cardsCatalog.querySelector('.catalog-title-head.--show');
        if(showedTitle) {
          showedTitle.classList.remove('--show');
        }
        const checkedTitle = cardsCatalog.querySelector(`[data-title="${headBtn.dataset.type}"]`);
        if(checkedTitle) {
          checkedTitle.classList.add('--show');
        }

        cardsCatalog.classList.add('--show');
        mainContent.classList.remove('--show');
      } else { // Только смена контейнеров при ситуации когда все элементы свернуты
        mainContent.classList.add('--show');
        cardsCatalog.classList.remove('--show');
      }

      // Добаление гет параметров
      window.history.replaceState("object or string", "Title", '?' + getUrl());
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
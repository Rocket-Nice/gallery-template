import {PlaceLink} from "./PlaceLink";

export default function CatalogFilters() {
  const mainContent = document.querySelector('.catalog__content.main-content ');
  const cardsCatalog = document.querySelector('.catalog__content.cards-catalog ');
  if (cardsCatalog) {
    const cardsContainer = cardsCatalog.querySelector('.catalog-cards');
  }

  const filterButtons = document.querySelectorAll('.sidebar-block-body__item');
  if (filterButtons.length > 0) {
    filterButtons.forEach(btn => {
      btn.addEventListener('click', () => {
        page = 2;
        btn.classList.toggle('--checked');
        window.history.replaceState("object or string", "Title", '?' + getUrl());
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        updateCatalog(1, urlParams);
        const cardsCatalog = document.querySelector('.catalog__content.cards-catalog ');
        if (cardsCatalog) {
          const cardsContainer = cardsCatalog.querySelector('.catalog-cards');
          cardsContainer.innerHTML = '';
        }
        document.querySelector('.lds-ellipsis--container').style.display = "flex";
      });
    });
  }

  const sidebarHeads = document.querySelectorAll('.sidebar-block-head');
  sidebarHeads.forEach((headBtn) => {
    headBtn.addEventListener('click', () => {
      page = 2;

      // Закрытие открытого элемента и снятие всех выбранных внетренних характеристик
      const openedContainer = document.querySelector('.sidebar-block.--open');
      if (openedContainer) {
        openedContainer.classList.remove('--open');
        const selectedChars = openedContainer.querySelectorAll('.sidebar-block-body__item.--checked');
        selectedChars.forEach((selectedChar) => {
          selectedChar.classList.remove('--checked');
        })
      }

      // Открытие нашатого элемента и скрытие/раскрытие таблицы с магазинами
      const container = headBtn.closest('.sidebar-block');
      if (openedContainer !== container) { // Открытие и смена контейнеров
        container.classList.toggle('--open');
        // Скрытие/открытие заголовка таблиы с магазинами
        const showedTitle = cardsCatalog.querySelector('.catalog-title-head.--show');
        if (showedTitle) {
          showedTitle.classList.remove('--show');
        }
        const checkedTitle = cardsCatalog.querySelector(`[data-title="${headBtn.dataset.type}"]`);
        if (checkedTitle) {
          checkedTitle.classList.add('--show');
        }

        cardsCatalog.classList.add('--show');
        mainContent.classList.remove('--show');
        // Добаление гет параметров
        window.history.replaceState("object or string", "Title", '?' + getUrl());
        // Получаем параметры для фитльтрации
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        updateCatalog(1, urlParams)
        if (cardsCatalog) {
          const cardsContainer = cardsCatalog.querySelector('.catalog-cards');
          cardsContainer.innerHTML = '';
        }
        document.querySelector('.lds-ellipsis--container').style.display = "flex";
      } else { // Только смена контейнеров при ситуации когда все элементы свернуты
        mainContent.classList.add('--show');
        cardsCatalog.classList.remove('--show');
        // Добаление гет параметров
        window.history.replaceState("object or string", "Title", '?' + getUrl());
      }

    })
  })

  // функция бесконечной загрузки постов новостей
  let page = 2;
  let loading = false;
  let offsetBeforeLoad = 250;
  let noMorePosts = false;

  let updateCatalog = debounce((page = 1, urlParams, isMore = false) => {
    const typeParams = urlParams.get('type');
    const categoryParams = urlParams.get('category');

    const cardsCatalog = document.querySelector('.catalog__content.cards-catalog ');
    const cardsContainer = cardsCatalog.querySelector('.catalog-cards');

    // Построение запроса
    let ajaxurl = "/wp-admin/admin-ajax.php";
    let xhr = new XMLHttpRequest();
    xhr.open('POST', ajaxurl, true);

    let data = new FormData();
    data.append('action', 'load_catalog_posts');
    data.append('page', page);
    data.append('type', typeParams);
    data.append('category', categoryParams);

    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4) {
        setTimeout(function () {
          document.querySelector('.lds-ellipsis--container').style.display = "none";
        }, 100);

        if (xhr.status === 200) {
          let response = JSON.parse(xhr.responseText);
          if (response.success) {
            if (isMore) {
              cardsContainer.innerHTML += response.data.html;
            } else {
              cardsContainer.innerHTML = response.data.html;
            }
            PlaceLink();
            noMorePosts = !!response.data.isMorePosts;
            window.onscroll = handleScroll;
            loading = false;
          }
        }
      }
    };

    xhr.send(data);
  }, 1000)

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

  function handleScroll() {
    if (noMorePosts || loading) {
      // window.onscroll = null;
    } else if ((window.innerHeight + window.scrollY) >= (document.body.offsetHeight - offsetBeforeLoad)) {
      // Получаем параметры для фитльтрации
      const queryString = window.location.search;
      const urlParams = new URLSearchParams(queryString);
      updateCatalog(page, urlParams, true);
      page++;
      loading = true;
      document.querySelector('.lds-ellipsis--container').style.display = "flex";
    }
    window.onscroll = handleScroll;
  }

  if (mainContent) {
    // Установка обработчика скролла
    window.onscroll = handleScroll;
  }
}

function debounce(func, timeout = 300) {
  let timer;
  return (...args) => {
    clearTimeout(timer);
    timer = setTimeout(() => {
      func.apply(this, args);
    }, timeout);
  };
}
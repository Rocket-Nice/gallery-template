export default function NewsSort() {

  // Смена табов новостей
  const checkedCheckboxes = document.querySelectorAll('input[type="checkbox"].news-tags__item-checkbox');
  let currentTypes = [];

  // запоминалка состояния чекбоксов
  function restoreCheckboxState() {
      const urlParams = new URLSearchParams(window.location.search);
      const typeParam = urlParams.get('type');

      if (typeParam) {
          currentTypes = typeParam.split(',');

          checkedCheckboxes.forEach(btn => {
              const newsType = btn.dataset.newsType;
              const isChecked = currentTypes.includes(newsType);

              btn.checked = isChecked;
              if (isChecked) {
                  btn.nextElementSibling.classList.add('--active');
              } else {
                  btn.nextElementSibling.classList.remove('--active');
              }
          });
      }
  }

  restoreCheckboxState();

  checkedCheckboxes.forEach(btn => {
      btn.addEventListener('change', (event) => {
          const urlParams = new URLSearchParams(window.location.search);
          let label = document.querySelector(`[for="${event.target.id}"]`);
          const newsType = event.target.dataset.newsType;

          if (event.currentTarget.checked) {
              currentTypes.push(newsType);
              label.classList.add('--active');
          } else {
              label.classList.remove('--active');
              const index = currentTypes.indexOf(newsType);
              if (index !== -1) {
                  currentTypes.splice(index, 1);
              }
          }

          if (currentTypes.length > 0) {
              urlParams.set('type', currentTypes.join(','));
          } else {
              urlParams.delete('type');
          }

          const newUrl = window.location.origin + window.location.pathname + '?' + urlParams.toString();

          history.replaceState(null, null, newUrl);
          loadPosts();
          noMorePosts = false;
          page = 2;
          window.onscroll = handleScroll;
      });
  });  
 
  // загрузка постов при смене табов без перезагрузки
  let loadingPosts = false;

  function loadPosts() {
    if (loadingPosts) {
        return;
    }

    loadingPosts = true;

    let ajaxurl = "/gallery/wp-admin/admin-ajax.php";
    let container = document.querySelector('.news__inner');
    let urlParams = new URLSearchParams(window.location.search);
    let newsType = urlParams.getAll('type');

    if (container) {
        let xhr = new XMLHttpRequest();
        xhr.open('POST', ajaxurl, true);

        let data = new FormData();
        data.append('action', 'load_posts');
        data.append('news_type', newsType);

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    let response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        container.innerHTML = response.data.html; // Заменяем содержимое контейнера
                        loadingPosts = false;
                    }
                }
            }
        };

        xhr.send(data);
    }
  }

  // функция бесконечной загрузки постов новостей
  let page = 2;
  let loading = false;
  let offsetBeforeLoad = 250;
  let noMorePosts = false;

  function loadMorePosts() {
      if (loading || noMorePosts) {
          return;
      }

      loading = true;

      let ajaxurl = "/gallery/wp-admin/admin-ajax.php";
      let container = document.querySelector('.news__inner');
      let urlParams = new URLSearchParams(window.location.search);
      let newsType = urlParams.getAll('type');

      if (container) {
          document.querySelector('.lds-ellipsis--container').style.display = "flex";
          let xhr = new XMLHttpRequest();
          xhr.open('POST', ajaxurl, true);

          let data = new FormData();
          data.append('action', 'load_more_posts');
          data.append('page', page);
          data.append('news_type', newsType);

          xhr.onreadystatechange = function () {
              if (xhr.readyState === 4) {
                  setTimeout(function () {
                      document.querySelector('.lds-ellipsis--container').style.display = "none";
                  }, 200);

                  if (xhr.status === 200) {
                      let response = JSON.parse(xhr.responseText);
                      if (response.success) {
                          container.innerHTML += response.data.html;
                          loading = false;
                          page++;

                          if (!response.data.has_more_posts) {
                              noMorePosts = true;
                          }
                      }
                  }
              }
          };

          xhr.send(data);
      }
  }

  // Функция для обработки скролла
    function handleScroll() {
        if (noMorePosts) {
            window.onscroll = null;
        } else if ((window.innerHeight + window.scrollY) >= (document.body.offsetHeight - offsetBeforeLoad)) {
            loadMorePosts();
        }
    }
    if(checkedCheckboxes.length) {
      // Установка обработчика скролла
      window.onscroll = handleScroll;
    }
}
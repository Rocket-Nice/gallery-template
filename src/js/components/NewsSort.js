export default function NewsSort() {
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

          window.location.replace(newUrl);

          sendForm(newUrl);
      });
  });

  // вариант без обновления страницы

  /** 
   const checkedCheckboxes = document.querySelectorAll('input[type="checkbox"].news-tags__item-checkbox');
    let currentTypes = [];
  
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
  
        const prettyParams = decodeURIComponent(urlParams.toString()).replace(/%2C/g, ",");
  
        history.replaceState(null, null, newUrl);
  
        sendForm(prettyParams);
      });
    });
  */

  // функция бесконечной загрузки постов новостей
  let page = 2;
  let loading = false;
  let postsPerPage = 6;
  let offsetBeforeLoad = 250;
  let noMorePosts = false;

  function loadMorePosts() {
      if (loading || noMorePosts) {
          return;
      }

      loading = true;
      document.querySelector('.lds-ellipsis--container').style.display = "flex";

      let ajaxurl = "/wp-admin/admin-ajax.php";
      let container = document.querySelector('.news__inner');
      let urlParams = new URLSearchParams(window.location.search);
      let newsType = urlParams.getAll('type');

      if (container) {
          let xhr = new XMLHttpRequest();
          xhr.open('POST', ajaxurl, true);

          let data = new FormData();
          data.append('action', 'load_more_posts');
          data.append('posts_per_page', postsPerPage);
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

                          // Проверка, было ли установлено noMorePosts до завершения запроса
                          if (!response.data.has_more_posts) {
                              noMorePosts = true;
                              // Отключите обработчик скролла
                              window.onscroll = null;
                          }
                      }
                  }
              }
          };

          xhr.send(data);
      }
  }

  window.onscroll = function () {
      if (noMorePosts) {
          window.onscroll = null;
      } else if ((window.innerHeight + window.scrollY) >= (document.body.offsetHeight - offsetBeforeLoad)) {
          loadMorePosts();
      }
  };

  // fetch variant

  // let page = 2;
  // let loading = false;
  // let postsPerPage = 6;
  // let offsetBeforeLoad = 250;
  // let noMorePosts = false;

  // async function loadMorePosts() {
  //     if (loading || noMorePosts) {
  //         return;
  //     }

  //     loading = true;
  //     document.querySelector('.lds-ellipsis--container').style.display = "flex";

  //     let ajaxurl = "/wp-admin/admin-ajax.php";
  //     let container = document.querySelector('.news__inner');
  //     let urlParams = new URLSearchParams(window.location.search);
  //     let newsType = urlParams.getAll('type');

  //     if (container) {
  //         try {
  //             let response = await fetch(ajaxurl, {
  //                 method: 'POST',
  //                 headers: {
  //                     'Content-Type': 'application/x-www-form-urlencoded',
  //                 },
  //                 body: new URLSearchParams({
  //                     'action': 'load_more_posts',
  //                     'posts_per_page': postsPerPage,
  //                     'page': page,
  //                     'news_type': newsType,
  //                 }),
  //             });

  //             if (!response.ok) {
  //                 throw new Error('Network response was not ok');
  //             }

  //             let result = await response.json();

  //             setTimeout(function () {
  //                 document.querySelector('.lds-ellipsis--container').style.display = "none";
  //             }, 200);

  //             if (result.success) {
  //                 container.innerHTML += result.data.html;
  //                 loading = false;
  //                 page++;

  //                 // Проверка, было ли установлено noMorePosts до завершения запроса
  //                 if (!result.data.has_more_posts) {
  //                     noMorePosts = true;
  //                     // Отключите обработчик скролла
  //                     window.onscroll = null;
  //                 }
  //             }
  //         } catch (error) {
  //             console.error('Fetch error:', error);
  //         }
  //     }
  // }

  // window.onscroll = function () {
  //     if (noMorePosts) {
  //         window.onscroll = null;
  //     } else if ((window.innerHeight + window.scrollY) >= (document.body.offsetHeight - offsetBeforeLoad)) {
  //         loadMorePosts();
  //     }
  // };
}
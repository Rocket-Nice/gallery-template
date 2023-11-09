export default function NewsSort() {
  const checkedCheckboxes = document.querySelectorAll('input[type="checkbox"].news-tags__item-checkbox');
  let currentTypes = [];

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

async function sendForm(checkedNews) {
  const data = new FormData();
  data.append('action', 'feedbackFunction'); 
  data.append('checkedNews', checkedNews);

  await fetch("/wp-admin/admin-ajax.php", {
      method: "POST",
      body: data,
  })

      .then((response) => {
          if (response.status !== 200) {
              return Promise.reject();
          }
          return response.text()
      })
      .then((response) => {
          console.log(response);
          return true;
      })
      .catch(() => {
          console.log('ошибка');
          return false;
      });
}
}
function main() {
  setTimeout(() => {
    const titleElements = document.querySelector('#map').shadowRoot.querySelectorAll('.mapplic-dir-group-title');
    if (titleElements.length > 0) {
      let count = 0;
      titleElements.forEach(el => {
        if (count === 0) {
          el.closest('.mapplic-dir-group').classList.add('--open');
          count++;
        }
        el.addEventListener('click', () => {
          el.closest('.mapplic-dir-group').classList.toggle('--open');
        });
      })
    }
  }, 100);
}

document.addEventListener("DOMContentLoaded", main);
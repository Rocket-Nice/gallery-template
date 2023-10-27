function main() {
  setTimeout(() => {
    const shadowBlock = document.querySelector('#map').shadowRoot;
    const titleElements = shadowBlock.querySelectorAll('.mapplic-dir-group-title');
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

    const sidebar = shadowBlock.querySelector('.mapplic-sidebar');
    const sidebarTabs = document.querySelector('.sidebar-tabs');
    sidebar.insertBefore(sidebarTabs, sidebar.firstChild);

    const titleIcons = document.querySelectorAll('.title-sidebar-icon');
    if (titleIcons.length > 0) {
      titleIcons.forEach(icon => {
        const sidebarArrow = document.querySelector('.sidebar-arrow').cloneNode(true);
        const blockCount = icon.dataset.icon;
        const sidebarBlockTitle = shadowBlock.querySelector(`.mapplic-dir-group:nth-child(${blockCount}) .mapplic-dir-group-title`);
        sidebarBlockTitle.insertBefore(icon.querySelector('img'), sidebarBlockTitle.firstChild);
        sidebarBlockTitle.appendChild(sidebarArrow);
        // sidebarBlockTitle.insertBefore(document.querySelector('.sidebar-arrow'), sidebarBlockTitle.firstChild);
      });
    }
  }, 300);
}

document.addEventListener("DOMContentLoaded", main);
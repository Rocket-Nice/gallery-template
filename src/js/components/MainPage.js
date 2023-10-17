export default function MainPage() {
  const isMainPage = document.querySelector('main.main-page');
  const body = document.querySelector('body');
  if (isMainPage) {
    const noScrollBlocks = document.querySelectorAll('.header-logo, .header-desc');
    if (noScrollBlocks) {
      noScrollBlocks.forEach(block => {
        block.addEventListener("mouseover", () => {
          body.classList.add('hidden');
        });
        block.addEventListener("mouseout", () => {
          body.classList.remove('hidden');
        });
      })
    }
  }
}
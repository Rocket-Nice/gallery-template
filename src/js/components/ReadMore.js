export default function ReadMore() {
  const btns = document.querySelectorAll('[data-read-more]');
  if (btns.length > 0) {
    btns.forEach(btn => {
      btn.addEventListener('click', () => {
        const text = document.querySelector(`[data-read-text="${btn.dataset.readMore}"]`);
        text.classList.add('--visible');
        btn.style.display = "none";
      })
    })
  }
}
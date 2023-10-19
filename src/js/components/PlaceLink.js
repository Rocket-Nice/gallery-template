export function PlaceLink() {
  // обработка ссылки на всю карточку
  const places = document.querySelectorAll("[data-place]");
  if (places.length) {
    places.forEach((place) => {
      place.addEventListener("click", () => {
        const link = place.querySelector("[data-link]");
        if (link) {
          link.click();
        }
      });
    });
  }
}

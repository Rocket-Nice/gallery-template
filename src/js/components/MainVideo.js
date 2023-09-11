export default function MainVideo() {
  const video = document.querySelector('[data-video]');
  if (video) {
    const videoBgContainer = document.querySelector('[data-video-bg]');
    const videoPlay = document.querySelector('[data-video-play]');
    videoPlay.addEventListener('click', () => {
      video.play();
      videoBgContainer.classList.add('hidden');
    });

    video.addEventListener('click', () => {
      video.pause();
      videoBgContainer.classList.remove('hidden');
    });
  }
}
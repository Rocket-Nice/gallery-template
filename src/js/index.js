import '../scss/app.scss';
import './bootstrap';
import Burger from './components/Burger';
import MainHoryzontalScroll from './components/MainHoryzontalScroll';
import MainSlider from './components/MainSlider';
import MainVideo from './components/MainVideo';
import NewsSlider from './components/NewsSlider';
import SmoothScroll from './components/SmoothScroll';

function main() {
  SmoothScroll();
  MainHoryzontalScroll();
  MainSlider();
  Burger();
  MainVideo();
  NewsSlider();

  //доскролить страницу наверх при перезагрузке
  window.onbeforeunload = function () {
    window.scrollTo({
      top: 0,
      left: 0,
      behavior: 'instant',
    });
  }
}

document.addEventListener("DOMContentLoaded", main);
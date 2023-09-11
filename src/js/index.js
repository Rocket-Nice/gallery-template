import '../scss/app.scss';
import './bootstrap';
import Burger from './components/Burger';
import MainHoryzontalScroll from './components/MainHoryzontalScroll';
import MainSlider from './components/MainSlider';
import MainVideo from './components/MainVideo';
import SmoothScroll from './components/SmoothScroll';

function main() {
  // SmoothScroll();
  // MainHoryzontalScroll();
  MainSlider();
  Burger();
  MainVideo();
}

document.addEventListener("DOMContentLoaded", main);

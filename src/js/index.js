import '../scss/app.scss';
import './bootstrap';
import Burger from './components/Burger';
import MainHoryzontalScroll from './components/MainHoryzontalScroll';
import MainSlider from './components/MainSlider';
import SmoothScroll from './components/SmoothScroll';

function main() {
  // SmoothScroll();
  // MainHoryzontalScroll();
  MainSlider();
  Burger();
}

document.addEventListener("DOMContentLoaded", main);

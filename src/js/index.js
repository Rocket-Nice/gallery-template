import '../scss/app.scss';
import './bootstrap';
import AboutCharSlider from './components/AboutCharSlider';
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
  // AboutCharSlider();
}

document.addEventListener("DOMContentLoaded", main);
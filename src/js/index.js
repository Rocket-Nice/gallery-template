import '../scss/app.scss';
import './bootstrap';
import AboutCharSlider from './components/AboutCharSlider';
import AboutPage from './components/AboutPage';
import Burger from './components/Burger';
import CatalogFilters from './components/CatalogFilters';
import CatalogNewsSlider from './components/CatalogNewsSlider';
import CatalogSingleImages from './components/CatalogSingleImages';
import Form from './components/Form';
import MainHoryzontalScroll from './components/MainHoryzontalScroll';
import MainPage from './components/MainPage';
import MainSlider from './components/MainSlider';
import MainVideo from './components/MainVideo';
import Modal from './components/Modal';
import NewsDetSlider from './components/NewsDetSlider';
import NewsSlider from './components/NewsSlider';
import ReadMore from './components/ReadMore';
import SmoothScroll from './components/SmoothScroll';

function main() {
  SmoothScroll();
  MainHoryzontalScroll();
  MainSlider();
  Burger();
  MainVideo();
  NewsSlider();
  // AboutCharSlider();
  NewsDetSlider();
  Modal();
  Form();
  CatalogFilters();
  CatalogSingleImages();
  CatalogNewsSlider();
  ReadMore();
  MainPage();
  AboutPage();
}

document.addEventListener("DOMContentLoaded", main);
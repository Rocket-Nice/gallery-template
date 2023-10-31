import '../scss/app.scss';
import './bootstrap';
import AboutChar from './components/AboutChar';
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
import NewsSort from './components/NewsSort';
import { PlaceLink } from './components/PlaceLink';
import ReadMore from './components/ReadMore';
import SmoothScroll from './components/SmoothScroll';

function main() {
  AboutChar();
  SmoothScroll();
  MainHoryzontalScroll();
  MainSlider();
  Burger();
  MainVideo();
  NewsSlider();
  NewsDetSlider();
  Modal();
  Form();
  CatalogFilters();
  CatalogSingleImages();
  CatalogNewsSlider();
  ReadMore();
  MainPage();
  AboutPage();
  PlaceLink();
  NewsSort();
}

document.addEventListener("DOMContentLoaded", main);
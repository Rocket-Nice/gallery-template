import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { ScrollSmoother } from '../libs/ScrollSmoother.min.js';

export default function SmoothScroll() {
  gsap.registerPlugin(ScrollTrigger, ScrollSmoother);

  const mainPage = document.querySelector('main.main-page');
  const aboutPage = document.querySelector('main.about-page');

  if (aboutPage) {
    // Создаем экземпляр ScrollSmoother для плавного скролла
    ScrollSmoother.create({
      smooth: 1,
    });

    // Находим все элементы с классом 'link-to' внутри about-page
    const links = aboutPage.querySelectorAll('.link-to');
    
    // Добавляем обработчик события на каждую ссылку
    links.forEach(link => {
      link.addEventListener('click', e => {
        e.preventDefault(); // Предотвращаем стандартное поведение перехода по ссылке
        
        // Получаем целевой элемент по атрибуту href
        const targetId = link.getAttribute('href');
        const targetElement = document.querySelector(targetId);
        
        // Плавно прокручиваем к целевому элементу
        if (targetElement) {
          window.scrollTo({
            top: targetElement.offsetTop,
            behavior: 'smooth' // Используем плавную прокрутку
          });
        }
      });
    });
  }
}

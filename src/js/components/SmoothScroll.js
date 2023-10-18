import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { ScrollSmoother } from '../libs/ScrollSmoother.min.js';

export default function SmoothScroll() {
  gsap.registerPlugin(ScrollTrigger, ScrollSmoother);

  const mainPage = document.querySelector('main.main-page');
  const aboutPage = document.querySelector('main.about-page');

  if (mainPage || aboutPage) {
    ScrollSmoother.create({
      smooth: 1,
    })
  }
}
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

export default function MainHoryzontalScroll() {
    gsap.registerPlugin(ScrollTrigger);

    let sections = gsap.utils.toArray(".block");

    gsap.to(sections, {
        xPercent: -100 * (sections.length - 1),
        ease: "none",
        scrollTrigger: {
            trigger: ".block-container",
            pin: true,
            scrub: 1,
            // snap: {
            //     snapTo: 1 / (sections.length - 1),
            //     duration: 0.3,
            //     delay: 0,
            //     ease: "none",
            // },
            end: "+=3500",
        }
    });
}
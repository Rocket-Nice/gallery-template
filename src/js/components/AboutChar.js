import Swiper from 'swiper';

export default function AboutCharSlider() {

    const swiperChar = new Swiper('.about-char .swiper', {
        direction: 'vertical',
        slidesPerView: "auto",
        spaceBetween: 8,
        speed: 500,
        preloadImages: false,
        centeredSlides: true,
        loop: false,
        mousewheel: true,
    });

    const aboutChar = document.querySelector('.about-char');
    const swiperBlock = aboutChar.querySelector('.swiper');
    console.log(swiperBlock);
    const aboutMarquee = document.querySelector('.about-marquee');


    function activeSwiper() {
        document.body.style.overflow = 'hidden';
        swiperChar.enable();
        swiperChar.mousewheel.enable();
    }

    function disableSwiper() {
        document.body.style.overflow = '';
        swiperChar.disable();
        swiperChar.mousewheel.disable();
    }

    disableSwiper();

    swiperChar.on('slideNextTransitionEnd', function () {
        if (swiperChar.isEnd) {
            disableSwiper()
        }
    });

    swiperChar.on('slidePrevTransitionEnd', function () {
        if (swiperChar.isBeginning) {
            disableSwiper()
        }
    });

    let lastPageScroll = window.scrollY;

    /** 
     * @param {EventHandler} event 
     */

    function checkVisibility(event) {
        console.log(event);
        const direction = lastPageScroll - window.scrollY < 0 ? "DOWN" : "UP";
        lastPageScroll = window.scrollY;
        const isFirstSlide = swiperChar.isBeginning;
        const isEndSlide = swiperChar.isEnd;
        // if (direction === "UP" && isFirstSlide || direction === "DOWN" && isEndSlide) {
        //     disableSwiper();
        // }

        const rect = aboutChar.getBoundingClientRect();
        console.log(rect);
        console.log(window.scrollY)
        if (rect.top <= 0 && rect.top >= -200) {
            if ((isEndSlide && direction === "UP") || (direction === "DOWN" && isFirstSlide)) {
                activeSwiper();
                window.scrollTo({
                    top: swiperBlock.offsetTop,
                    behavior: "instant",
                });
            }
        }
    }

    window.addEventListener('load', checkVisibility);
    window.addEventListener('resize', checkVisibility);
    window.addEventListener('scroll', checkVisibility);
}
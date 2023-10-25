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
    const aboutMarquee = document.querySelector('.about-marquee');


    function activeSwiper() {
        document.body.style.overflow = 'hidden';
        swiperChar.enable();
        swiperChar.mousewheel.enable();
        window.scrollTo({
            top: swiperBlock.offsetTop,
            behavior: "instant",
        });
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
        const direction = lastPageScroll - window.scrollY < 0 ? "DOWN" : "UP";
        lastPageScroll = window.scrollY;
        const isFirstSlide = swiperChar.isBeginning;
        const isEndSlide = swiperChar.isEnd;
        // if (direction === "UP" && isFirstSlide || direction === "DOWN" && isEndSlide) {
        //     disableSwiper();
        // }

        const rect = aboutChar.getBoundingClientRect();
        if (direction === "UP" && isEndSlide) {
            if (rect.bottom <= window.innerhHeight && rect.bottom > 0) {
                activeSwiper();
            }
        } if (direction === "DOWN" && isFirstSlide) {
            if (rect.top <= 0 && rect.top >= -swiperBlock.clientHeight) {
                activeSwiper();
            }
        }
    }

    window.addEventListener('load', checkVisibility);
    window.addEventListener('resize', checkVisibility);
    window.addEventListener('scroll', checkVisibility);
}
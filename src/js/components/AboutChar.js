import Swiper from 'swiper';

export default function AboutChar() {

const swiperContainer = document.querySelector('.about-char');

if(swiperContainer){
    const swiperChar = new Swiper('.about-char .swiper', {
        direction: 'vertical',
        slidesPerView: "auto",
        spaceBetween: 0,
        speed: 1000,
        preloadImages: false,
        centeredSlides: true,
        loop: false,
        mousewheel: true,
    });

    const SCROLL_DIRECTION = {
        DOWN: "DOWN",
        UP: "UP",
    }

    const scrollController = {
        disable: () => {
            document.body.style.overflow = 'hidden';
        },
        enable: () => {
            document.body.style.overflow = '';
        }
    }

    let upperBound = swiperContainer?.offsetTop;
    let lowerBound = upperBound + swiperContainer?.clientHeight;


    function sliderToView() {
        scrollController.disable()
        window.scrollTo({
            top: upperBound,
            behavior: "smooth",
        });
    }

    let isSliderActive = false;

    if (window.scrollY > upperBound) {
        swiperChar.slideTo(3)
    }


    function activeSwiper() {
        scrollController.disable()
        swiperChar.enable();
        swiperChar.mousewheel.enable();
        isSliderActive = true;
    }

    function disableSwiper() {
        swiperChar.disable();
        swiperChar.mousewheel.disable();
        scrollController.enable()
        isSliderActive = false;
    }

    disableSwiper()

    if (window.scrollY === upperBound){
        activeSwiper()
    }

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

    let lastScrollY = window.scrollY;
    function checkVisibility() {
        const scrollY = window.scrollY;
        const direction = scrollY > lastScrollY ? SCROLL_DIRECTION.DOWN : SCROLL_DIRECTION.UP;
        lastScrollY = scrollY;
        const isLastSlide = swiperChar.isEnd;
        const isFirstSlide = swiperChar.isBeginning;
        const nearUpperBound = scrollY >= Math.max(upperBound - 200, 0)
        const nearLowerBound = scrollY + window.innerHeight <= lowerBound + 200

        if (
            (direction === SCROLL_DIRECTION.DOWN && nearUpperBound && isFirstSlide) ||
            (direction === SCROLL_DIRECTION.UP && nearLowerBound && isLastSlide)
        ) {
            sliderToView()
            activeSwiper()
        }
    }

    window.addEventListener('scroll', checkVisibility);
    window.addEventListener('wheel', (e) => {
        if (isSliderActive) {
            const direction = e.deltaY > 0 ? SCROLL_DIRECTION.DOWN : SCROLL_DIRECTION.UP
            if (
                (swiperChar.isBeginning && direction === SCROLL_DIRECTION.UP) ||
                (swiperChar.isEnd && direction === SCROLL_DIRECTION.DOWN)
            ) {
                setTimeout(() => {
                    if(isSliderActive && (swiperChar.isBeginning || swiperChar.isEnd)) { disableSwiper() }
                }, 1000)
            }
        }
    });
    window.addEventListener('resize', () => {
        upperBound = swiperContainer?.offsetTop;
        lowerBound = upperBound + swiperContainer?.clientHeight;
    });    
    if (window.innerWidth <= 1024) {
        swiperChar.destroy(true, true);
        swiperChar.disable();
        
        const swiperElement = swiperContainer.querySelector('.swiper');
        const wrapperElement = swiperContainer.querySelector('.swiper-wrapper');
        const slideElements = swiperContainer.querySelectorAll('.swiper-slide');
    
        swiperElement.classList.remove('swiper');
        wrapperElement.classList.remove('swiper-wrapper');
        slideElements.forEach(element => element.classList.remove('swiper-slide'));
    
        swiperElement.classList.add('about-char__mobile-swiper');
        wrapperElement.classList.add('about-char__mobile-swiper-wrapper');
        slideElements.forEach(element => element.classList.add('about-char__mobile-swiper-slide'));
    } 
}}

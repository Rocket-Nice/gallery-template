import Swiper from 'swiper';

export default function AboutChar() {

const swiperChar = new Swiper('.about-char .swiper', {
    direction: 'vertical',
    slidesPerView: "auto",
    spaceBetween: 0,
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

const slider = document.querySelector('.about-char');
let upperBound = slider.offsetTop;
let lowerBound = upperBound + slider.clientHeight;

if (window.scrollY > upperBound) {
    swiperChar.slideTo(3)
}

function sliderToView() {
    return new Promise((resolve) => {
        window.scrollTo({
            top: upperBound+80,
            behavior: "smooth",
        });
        const endScroll = () => {
            window.removeEventListener('scrollend', endScroll)
            resolve()
        }
        window.addEventListener('scrollend', endScroll)
    })
}

let isSliderActive = false;
function activeSwiper() {
    swiperChar.enable();
    swiperChar.mousewheel.enable();
    scrollController.disable()
    isSliderActive = true;
}

function disableSwiper() {
    swiperChar.disable();
    swiperChar.mousewheel.disable();
    scrollController.enable()
    isSliderActive = false;
}
disableSwiper()

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
function checkVisibility(event) {
    const scrollY = window.scrollY;
    const direction = scrollY > lastScrollY ? SCROLL_DIRECTION.DOWN : SCROLL_DIRECTION.UP;
    lastScrollY = scrollY;
    const isLastSlide = swiperChar.isEnd;
    const isFirstSlide = swiperChar.isBeginning;
    const nearUpperBound = scrollY >= Math.max(upperBound - 200, 0)
    const nearLowerBound = scrollY + window.innerHeight <= lowerBound + 200

    if (direction === SCROLL_DIRECTION.DOWN && nearUpperBound && isFirstSlide) {
        sliderToView().then(activeSwiper)
    } else if (direction === SCROLL_DIRECTION.UP && nearLowerBound && isLastSlide) {
        sliderToView().then(activeSwiper)
    }
}
window.addEventListener('scroll', checkVisibility);

window.addEventListener('wheel', (e) => {
    if (isSliderActive) {
        const direction = e.deltaY > 0 ? SCROLL_DIRECTION.DOWN : SCROLL_DIRECTION.UP
        if (swiperChar.isBeginning && direction === SCROLL_DIRECTION.UP) {
            disableSwiper()
        } else if (swiperChar.isEnd && direction === SCROLL_DIRECTION.DOWN) {
            disableSwiper()
        }
    }
});

window.addEventListener('resize', () => {
    upperBound = slider.offsetTop;
    lowerBound = upperBound + slider.clientHeight;
});
}
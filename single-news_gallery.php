<?php
/*
Template Name: Карточка события
Template Post Type: news_gallery
*/
?>

<?php get_header(); ?>

    <main class="news-det-page">
        <section class="news-det">
            <div class="news-det__container">
                <div class="news-det__inner">
                    <div class="news-det__left">
                        <div class="news-det-title">
                            <a href="#" class="news-det-title__arrow">
                                <div class="news-det-title__arrow-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewBox="0 0 8 14" fill="none">
                                        <path d="M7 1L1 7L7 13" stroke="#2F3542" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                            </a>
                            <div class="news-det-title__text">Скидки до 40% на летней распродаже в «Estelle A-Store»!</div>
                        </div>
                        <div class="news-det__date --mobile">22:38 | 25.08.2022</div>
                        <div class="custom-tag__wrapper">
                            <div class="custom-tag --blue">Новости</div>
                            <div class="custom-tag --black">c 1 авг. по 23 авг.</div>
                        </div>
                        <div class="news-det__content">
                            <p>
                                Еще больше моделей знаменитых европейских брендов со скидками 30% и 40% ждут вас в салоне <strong>«Estelle A-Store»</strong>. Не упустите возможность купить модные купальники, изящное белье и стильную одежду для летнего отдыха по приятным ценам!
                            </p>
                            <div class="gray-bg-block">
                                Еще больше моделей знаменитых европейских брендов со скидками 30% и 40% ждут вас в салоне «Estelle A-Store». Не упустите возможность купить модные купальники, изящное белье и стильную одежду для летнего отдыха по приятным ценам!
                            </div>
                            <p>
                                Еще больше <a href="#">моделей</a> знаменитых европейских брендов со скидками 30% и 40% ждут вас в салоне <strong>«Estelle A-Store»</strong>. Не упустите возможность купить модные купальники, изящное белье и стильную одежду для летнего отдыха по приятным ценам!
                            </p>
                            <p>
                                В нашем магазине вы найдете такие товары, как :
                            </p>
                            <ul>
                                <li>Джинсы</li>
                                <li>Футболки</li>
                                <li>Пиджаки</li>
                            </ul>
                            <p>
                                В нашем магазине вы найдете такие товары, как :
                            </p>
                            <ol>
                                <li>Джинсы</li>
                                <li>Футболки</li>
                                <li>Пиджаки</li>
                            </ol>
                            <p>
                                Еще больше моделей знаменитых европейских брендов со скидками 30% и 40% ждут вас в салоне <strong>«Estelle A-Store»</strong>. Не упустите возможность купить модные купальники, изящное белье и стильную одежду для летнего отдыха по приятным ценам!
                            </p>
                        </div>
                    </div>
                    <div class="news-det__right">
                        <div class="sticky-block">
                            <div class="news-det__date --desc">22:38 | 25.08.2022</div>
                            <div class="news-det-slider">
                                <div class="swiper">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="<?php bloginfo('template_url'); ?>/assets/images/news-det.jpg" width="" height="" loading="lazy" decoding= "async" alt="">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="<?php bloginfo('template_url'); ?>/assets/images/news-det.jpg" width="" height="" loading="lazy" decoding= "async" alt="">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="<?php bloginfo('template_url'); ?>/assets/images/news-det.jpg" width="" height="" loading="lazy" decoding= "async" alt="">
                                        </div>
                                    </div>
                                    <div class="news-det-slider__navigation swiper-navigation">
                                        <div class="swiper-navigation-button swiper-navigation-prev">
                                            <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5 1L1 5L5 9" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <div class="swiper-navigation-button swiper-navigation-next">
                                            <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 1L5 5L1 9" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="dark-btn --desc">
                                <div class="dark-btn__text">Перейти в магазин</div>
                                <div class="dark-btn__icon">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/icons/btn-arrow.svg" width="24" height="24" loading="lazy" decoding= "async" alt="">
                                </div>
                            </a>
                        </div>
                    </div>
                    <a href="#" class="dark-btn --mobile">
                        <div class="dark-btn__text">Перейти в магазин</div>
                        <div class="dark-btn__icon">
                            <img src="<?php bloginfo('template_url'); ?>/assets/icons/btn-arrow.svg" width="24" height="24" loading="lazy" decoding= "async" alt="">
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </main>

    <?php get_footer(); ?>

</body>
</html>
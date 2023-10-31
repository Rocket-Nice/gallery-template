<?php
/*
Template Name: About
*/
?>

<?php get_header(); ?>

    <main>
        <section class="news">
            <div class="news__container">
                <div class="news-title">
                    <div class="news-title__text">События</div>
                    <div class="news-tags">
                        <a class="news-tags__item">Модный блог</a>
                        <a class="news-tags__item">Новости</a>
                        <a class="news-tags__item">Акция</a>
                    </div>
                </div>
                <div class="news__inner">
                    <a href="/news/news-1" class="news-card">
                        <div class="news-card__bg">
                            <img src="<?php bloginfo('template_url'); ?>/assets/images/news-card.jpg" loading="lazy" decoding= "async" alt="">
                            <div class="news-card__bg-hover"></div>
                        </div>
                        <div class="news-card__content">
                            <div class="news-card__info">
                                <div class="news-card__tag --yellow">Акция</div>
                                <div class="news-card__date">24.07 – 05.08</div>
                            </div>
                            <div class="news-card__text">
                                <div class="news-card__title">SALE до 30%</div>
                                <div class="news-card__subtitle">в lady & gentleman CITY</div>
                                <div class="news-card__desc">На старт, внимание, SALE*! В магазине lady & gentleman CITY вас ждут скидки до 30%** на коллекцию Весна-Лето.</div>
                            </div>
                        </div>
                    </a>
                    <a href="/news/news-1" class="news-card">
                        <div class="news-card__bg">
                            <img src="<?php bloginfo('template_url'); ?>/assets/images/news-card.jpg" loading="lazy" decoding= "async" alt="">
                            <div class="news-card__bg-hover"></div>
                        </div>
                        <div class="news-card__content">
                            <div class="news-card__info">
                                <div class="news-card__tag --red">Модный блог</div>
                                <div class="news-card__date">22.07</div>
                            </div>
                            <div class="news-card__text">
                                <div class="news-card__title">SALE до 30%</div>
                                <div class="news-card__subtitle">в lady & gentleman CITY</div>
                                <div class="news-card__desc">На старт, внимание, SALE*! В магазине lady & gentleman CITY вас ждут скидки до 30%** на коллекцию Весна-Лето.</div>
                            </div>
                        </div>
                    </a>
                    <a href="/news/news-1" class="news-card">
                        <div class="news-card__bg">
                            <img src="<?php bloginfo('template_url'); ?>/assets/images/news-card.jpg" loading="lazy" decoding= "async" alt="">
                            <div class="news-card__bg-hover"></div>
                        </div>
                        <div class="news-card__content">
                            <div class="news-card__info">
                                <div class="news-card__tag --blue">Новости</div>
                                <div class="news-card__date">21.07</div>
                            </div>
                            <div class="news-card__text">
                                <div class="news-card__title">SALE до 30%</div>
                                <div class="news-card__subtitle">в lady & gentleman CITY</div>
                                <div class="news-card__desc">На старт, внимание, SALE*! В магазине lady & gentleman CITY вас ждут скидки до 30%** на коллекцию Весна-Лето.</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </main>
    <?php get_footer(); ?>
</body>
</html>
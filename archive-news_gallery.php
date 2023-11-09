<?php
/*
Template Name: About
*/
?>

<?php get_header(); ?>
<?php
    // Акции
    $typePromotion = array('post_type' => 'news_gallery', 'posts_per_page' => -1, 'orderby' => 'date', 'news-page-type' => 'type_promotion');
    $listTypePromotion = new WP_Query($typePromotion);
    if ($listTypePromotion->have_posts()) {
        foreach ($listTypePromotion as $listTypePromotions) {
            $pagedMedia = $listTypePromotions["news-page-type"];
            break;
        }
    }
    // Модный блог
    $typeFashion = array('post_type' => 'news_gallery', 'posts_per_page' => -1, 'orderby' => 'date', 'news-page-type' => 'type_fashion');
    $typeFashionList = new WP_Query($typeFashion);
    if ($typeFashionList->have_posts()) {
        foreach ($typeFashionList as $typeFashionLists) {
            $pagedMedia = $typeFashionLists["news-page-type"];
            break;
        }
    }
    // Новости
    $typeNews = array('post_type' => 'news_gallery', 'posts_per_page' => -1, 'orderby' => 'date', 'news-page-type' => 'type-news');
    $typeNewsList = new WP_Query($typeNews);
    if ($typeNewsList->have_posts()) {
        foreach ($typeNewsList as $typeNewsLists) {
            $pagedMedia = $typeNewsLists["news-page-type"];
            break;
        }
    }

    var_dump($_GET["type"]);
    // Весь список
    $allElementsNews = array('post_type' => 'news_gallery', 'posts_per_page' => -1, 'orderby' => 'date');
    $allElementsNewsList = new WP_Query($allElementsNews);

    wp_reset_postdata();
?>

    <main>
        <section class="news">
            <div class="news__container">
                <div class="news-title">
                    <div class="news-title__text">События</div>
                    <div class="news-tags">
                        <input class="news-tags__item-checkbox" data-news-type="fashion" id="1" type="checkbox">
                        <label for="1" class="news-tags__item">Модный блог</label>
                        <input class="news-tags__item-checkbox" data-news-type="news" id="2" type="checkbox">
                        <label for="2" class="news-tags__item">Новости</label>
                        <input class="news-tags__item-checkbox" data-news-type="promotion" id="3" type="checkbox">
                        <label for="3" class="news-tags__item">Акции</label>
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
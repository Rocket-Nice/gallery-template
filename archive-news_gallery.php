<?php
/*
Template Name: About
*/
?>

<?php get_header(); ?>
<?php

    $listResp = explode(",", $_GET['type']);
    $listResp = array_filter(array_map('trim', $listResp));

    $typePromotion = array('post_type' => 'news_gallery', 'posts_per_page' => 6, 'orderby' => 'date');

    if (!empty($listResp)) {
        $typePromotion['tax_query'] = array(
            array(
                'taxonomy' => 'news-page-type',
                'field'    => 'slug',
                'terms'    => $listResp,
            ),
        );
    }

    $listTypePromotion = new WP_Query($typePromotion);

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
                <?php
                    if ($listTypePromotion->have_posts()) {
                        while ($listTypePromotion->have_posts()) {
                            $listTypePromotion->the_post();
                            ?>
                            <a href="<?= get_post_permalink() ?>" class="news-card">
                                <div class="news-card__bg">
                                    <?php if( get_field('news_photo_title') ) { ?>
                                        <img src="<?= get_field('news_photo_title')["url"]; ?>" loading="lazy" decoding= "async" alt="">
                                    <?php } ?>
                                    <div class="news-card__bg-hover"></div>
                                </div>
                                <div class="news-card__content">
                                    <div class="news-card__info">
                                        <?php
                                            $terms = get_the_terms(get_the_ID(), 'news-page-type');
                                            if ($terms && !is_wp_error($terms)) {
                                                $term = array_shift($terms);
                                                $term_name = $term->name;
                                                ?>
                                                <div class="news-card__tag <?php if($term_name === "Новости") { ?>--blue <?php } elseif ($term_name === "Акция") {?> --yellow <?php } else { ?>--red <?php } ?>"><?= $term_name; ?></div>
                                                <?php
                                            }
                                            ?>
                                        <?php
                                            $beginning_date = get_field('beginning_date');
                                            $end_date = get_field('end_date');
                                            $single_date_news = get_field("single_news_date");

                                            if ($beginning_date && $end_date) {
                                                $beginning_date_formatted = date_i18n('j.m', strtotime($beginning_date));
                                                $end_date_formatted = date_i18n('j.m', strtotime($end_date));

                                                echo '<div class="news-card__date">' . $beginning_date_formatted . ' – ' . $end_date_formatted . '</div>';
                                            } elseif ($single_date_news) {
                                                $single_date_formatted = date_i18n('j.m', strtotime($single_date_news));
                                                echo '<div class="news-card__date">' . $single_date_formatted . '</div>';
                                            }
                                        ?>
                                    </div>
                                    <div class="news-card__text">
                                        <div class="news-card__title"><?= get_field("news_title_archive"); ?></div>
                                        <div class="news-card__subtitle"><?= get_field("news_subtitle_archive"); ?></div>
                                        <div class="news-card__desc"><?= get_field("news_desc_title_archive"); ?></div>
                                    </div>
                                </div>
                            </a>
                    <?php
                        }
                    }
                ?>
                </div>
            </div>
        </section>
    </main>
    <?php get_footer(); ?>
</body>
</html>
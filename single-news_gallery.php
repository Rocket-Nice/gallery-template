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
                            <a href="/news" class="news-det-title__arrow">
                                <div class="news-det-title__arrow-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewBox="0 0 8 14" fill="none">
                                        <path d="M7 1L1 7L7 13" stroke="#2F3542" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                            </a>
                            <h1 class="news-det-title__text"><?= the_title(); ?></h1>
                        </div>
                        <div class="news-det__date --mobile"><?php
                                $created_date = get_the_date('H:i | d.m.Y', get_the_ID());
                                echo $created_date;
                                ?></div>
                        <div class="custom-tag__wrapper">
                        <?php
                            $terms = get_the_terms(get_the_ID(), 'news-page-type');
                            if ($terms && !is_wp_error($terms)) {
                                $term = array_shift($terms);
                                $term_name = $term->name;
                                ?>
                                <div class="custom-tag <?php if($term_name === "Новости") { ?>--blue <?php } elseif ($term_name === "Акция") {?> --yellow <?php } else { ?>--red <?php } ?>"><?= $term_name; ?></div>
                                <?php
                            }
                            ?>
                            <?php
                                $beginning_date = get_field('beginning_date');
                                $end_date = get_field('end_date');
                                $single_date_news = get_field("single_news_date");

                                $month_shortenings = array(
                                    'января' => 'янв.',
                                    'февраля' => 'фев.',
                                    'марта' => 'мар.',
                                    'апреля' => 'апр.',
                                    'мая' => 'мая',
                                    'июня' => 'июн.',
                                    'июля' => 'июл.',
                                    'августа' => 'авг.',
                                    'сентября' => 'сен.',
                                    'октября' => 'окт.',
                                    'ноября' => 'нояб.',
                                    'декабря' => 'дек.'
                                );
                                if ($beginning_date && $end_date) {
                                    $beginning_date_formatted = date_i18n('j F', strtotime($beginning_date));
                                    $end_date_formatted = date_i18n('j F', strtotime($end_date));

                                    $beginning_date_formatted = strtr($beginning_date_formatted, $month_shortenings);
                                    $end_date_formatted = strtr($end_date_formatted, $month_shortenings);

                                    echo '<div class="custom-tag --black">с ' . $beginning_date_formatted . ' по ' . $end_date_formatted . '</div>';
                                } elseif($single_date_news) {
                                    $single_date_formatted = date_i18n('j F', strtotime($single_date_news));
    
                                    $single_date_formatted = strtr($single_date_formatted, $month_shortenings);
    
                                    echo '<div class="custom-tag --black">' . $single_date_formatted . '</div>';
                                }
                                ?>
                        </div>
                        <div class="news-det__content">
                        <?php if (have_rows('news_content_page')):

                            while (have_rows('news_content_page')):
                                the_row();

                                ?>
                                <?php if (get_row_layout() == 'block_news_main_text'):
                                    the_sub_field('news_main_text');
                                elseif(get_row_layout() == 'block_news_text_in_color_block' ): ?>
                                    <div class="gray-bg-block"><?php the_sub_field('news_text_in_color_block'); ?></div>
                                <?php
                                endif;
                                endwhile;
                            endif;
                                ?>
                        </div>
                    </div>
                    <div class="news-det__right">
                        <div class="sticky-block">
                            <div class="news-det__date --desc">
                            <?php
                                $created_date = get_the_date('H:i | d.m.Y', get_the_ID());
                                echo $created_date;
                                ?>
                            </div>
                            <div class="news-det-slider">
                                <div class="swiper">
                                    <div class="swiper-wrapper">
                                        <?php
                                        $newsPages = get_field('news_gallery');
                                        if ($newsPages ?? false) {
                                            foreach ($newsPages as $image_id) {
                                                ?>
                                                <div class="swiper-slide">
                                                    <img src="<?= esc_url($image_id["url"]); ?>" width="" height="" loading="lazy" decoding= "async" alt="">
                                                </div>
                                                <?php
                                            }
                                        }                        
                                        ?>
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
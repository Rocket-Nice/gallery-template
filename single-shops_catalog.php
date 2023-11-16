<?php get_header();
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
?>
    <main class="catalog-single-page">
        <section class="catalog-single">
            <div class="catalog-single__container">
                <div class="catalog-single-title">
                    <div class="catalog-single-title__info">
                        <a href="/catalog" class="btn-back-simple">
                            <div class="btn-back__icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15 6L9 12L15 18" stroke="#2F3542" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </a>
                        <h1 class="catalog-single-title__text"><?php the_title(); ?></h1>
                    </div>
                    <a href="#" class="catalog-single-map --desk">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 10C20 14.418 12 22 12 22C12 22 4 14.418 4 10C4 7.87827 4.84285 5.84344 6.34315 4.34315C7.84344 2.84285 9.87827 2 12 2C14.1217 2 16.1566 2.84285 17.6569 4.34315C19.1571 5.84344 20 7.87827 20 10Z" stroke="#2F3542" stroke-width="1.5"/>
                            <path d="M12 11C12.2652 11 12.5196 10.8946 12.7071 10.7071C12.8946 10.5196 13 10.2652 13 10C13 9.73478 12.8946 9.48043 12.7071 9.29289C12.5196 9.10536 12.2652 9 12 9C11.7348 9 11.4804 9.10536 11.2929 9.29289C11.1054 9.48043 11 9.73478 11 10C11 10.2652 11.1054 10.5196 11.2929 10.7071C11.4804 10.8946 11.7348 11 12 11Z" fill="#2F3542" stroke="#2F3542" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <?php $postFloor = get_field('shop_floor'); ?>
                        <p><?= $postFloor ?></p>
                        <span></span>
                        <p>Посмотреть на карте</p>
                    </a>
                </div>
                <div class="catalog-single__content">
                    <div class="side">
                        <div class="catalog-single-contacts">
                            <?php
                            $main_number = get_field('main_number');
                            if($main_number) {
                            ?>
                                <a href="tel:<?= preg_replace("/[^0-9]/", "", $main_number); ?>" class="catalog-single-contacts__item">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/icons/phone-icon.svg" width="24" height="24" loading="lazy" decoding= "async" alt="">
                                    <p><?= $main_number ?></p>
                                </a>
                            <?php } ?>
                            <div class="catalog-single-contacts__item" data-modal-open="phones">
                                <img src="<?php bloginfo('template_url'); ?>/assets/icons/phone-icon.svg" width="24" height="24" loading="lazy" decoding= "async" alt="">
                                <p>Позвонить</p>
                            </div>
                            <?php
                            $site_link = get_field('site_link');
                            if( $site_link ) {
                            ?>
                                <a href="<?= preg_replace("/[^0-9]/", "", $site_link); ?>" target="_blank" class="catalog-single-contacts__item">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/icons/site-icon.svg" width="24" height="24" loading="lazy" decoding= "async" alt="">
                                    <p>Сайт</p>
                                </a>
                            <?php } ?>
                            <div class="catalog-single-social">
                                 <?php $social_link = get_field('social_links');
                                 $tg_link = $social_link['telegram_link'];
                                 if( $tg_link) {
                                 ?>
                                    <a href="<?= $tg_link ?>" class="catalog-single-social__item tg">
                                        <img src="<?php bloginfo('template_url'); ?>/assets/icons/tg-white.svg" width="24" height="24" loading="lazy" decoding= "async" alt="">
                                    </a>
                                 <?php } ?>
                                 <?php $instagram_link = $social_link['instagram_link'];
                                 if( $instagram_link) {
                                 ?>
                                    <a href="<?= $instagram_link ?>" class="catalog-single-social__item inst">
                                        <img src="<?php bloginfo('template_url'); ?>/assets/icons/inst-white.svg" width="24" height="24" loading="lazy" decoding= "async" alt="">
                                        <div class="catalog-single-social__hover">
                                            *Соцсеть Instagram запрещена в РФ; Она принадлежит корпорации Meta, которая признана в РФ экстремистской.
                                        </div>
                                    </a>
                                <?php } ?>
                                <?php $VK_link = $social_link['vk_link'];
                                 if( $VK_link) {
                                 ?>
                                    <a href="<?= $VK_link ?>" class="catalog-single-social__item vk">
                                        <img src="<?php bloginfo('template_url'); ?>/assets/icons/vk.svg" width="26" height="14" loading="lazy" decoding= "async" alt="">
                                    </a>
                                 <?php } ?>
                            </div>
                        </div>
                        <?php
                        $post_terms = [];
                        $post_terms = array_merge($post_terms, wp_get_post_terms($post->ID, 'shop_type'));
                        $post_terms = array_merge($post_terms, wp_get_post_terms($post->ID, 'food_type'));
                        $post_terms = array_merge($post_terms, wp_get_post_terms($post->ID, 'services_type'));
                        ?>
                        <div class="catalog-single-tags">
                            <?php
                            foreach($post_terms as $post_term) {
                                ?>
                                <div class="catalog-single-tags__item"><?= $post_term->name ?></div>
                            <?php } ?>
                        </div>
                        <div class="catalog-single-text">
                            <div class="catalog-single-text__bg"></div>
                            <div class="catalog-single-text__inner" data-read-text="catalog-single">
                              <?php $main_info = get_field('shop_description');
                              echo $main_info; ?>
                            </div>
                            <button class="catalog-single-text__btn" data-read-more="catalog-single">Читать полностью</button>
                        </div>
                    </div>
                    <?php
                    $gallery = get_field('shop_gallery');
                    if($gallery) {
                    ?>
                        <div class="side">
                            <div class="catalog-single-sliders">
                                <div class="catalog-single-sliders__big">
                                    <div class="swiper">
                                        <div class="swiper-wrapper">
                                            <?php
                                           foreach($gallery as $gallery_item) { ?>
                                               <div class="swiper-slide">
                                                   <img src="<?= $gallery_item["url"] ?>" loading="lazy" decoding= "async" alt="">
                                               </div>
                                           <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="catalog-single-sliders__little">
                                    <div class="swiper">
                                        <div class="swiper-wrapper">
                                            <?php
                                            for($i = 1; $i < count($gallery); $i++ ) {?>
                                                <div class="swiper-slide">
                                                    <img src="<?= $gallery[$i]["url"] ?>" loading="lazy" decoding= "async" alt="">
                                                </div>
                                            <?php }
                                            if(count($gallery) >= 1) {?>
                                                <div class="swiper-slide">
                                                    <img src="<?= $gallery[0]["url"] ?>" loading="lazy" decoding= "async" alt="">
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="swiper">
                                        <div class="swiper-wrapper">
                                            <?php
                                           for($i = 2; $i < count($gallery); $i++ ) { ?>
                                               <div class="swiper-slide">
                                                   <img src="<?= $gallery[$i]["url"] ?>" loading="lazy" decoding= "async" alt="">
                                               </div>
                                           <?php }
                                           if(count($gallery) >= 1) { ?>
                                               <div class="swiper-slide">
                                                   <img src="<?= $gallery[0]["url"] ?>" loading="lazy" decoding= "async" alt="">
                                               </div>
                                           <?php }
                                           if(count($gallery) >= 2) { ?>
                                              <div class="swiper-slide">
                                                  <img src="<?= $gallery[1]["url"] ?>" loading="lazy" decoding= "async" alt="">
                                              </div>
                                           <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="catalog-single-sliders__navigation swiper-navigation">
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
                                <div class="catalog-single-sliders__pagination pagination-fraction"></div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="catalog-single__container --desk">
                <div class="catalog-single__inner">
                    <?php
                        $args = array(
                            'post_type' => 'news_gallery',
                            'posts_per_page' => -1,
                            'meta_query' =>[
                                'relation' => 'OR',
                                [
                                    'key' => 'news_shops',
                                    'value' => get_the_ID(),
                                    'compare' => 'LIKE'
                                ],
                            ],
                        );
                        $query = new WP_Query($args);
                        if($query->have_posts()){

                        ?>
                        <div class="side">
                            <div class="catalog-single-news">
                                <div class="catalog-single-news__title">НОВОСТИ МАГАЗИНА</div>
                                <div class="swiper">
                                    <div class="swiper-wrapper">
                                    <?php while($query->have_posts()){
                                            $query->the_post();
                                            ?>
                                            <div class="swiper-slide">
                                                <a href="<?= get_post_permalink() ?>" class="catalog-single-news-slide">
                                                    <div class="catalog-single-news-slide__title"><?php the_title();  ?></div>
                                                    <div class="catalog-single-news-slide__date">
                                                        <?php
                                                             $beginning_date = get_field('beginning_date');
                                                             $end_date = get_field('end_date');
                                                             $single_date_news = get_field("single_news_date");

                                                             if ($beginning_date && $end_date) {
                                                                 $beginning_date_formatted = date_i18n('j F', strtotime($beginning_date));
                                                                 $end_date_formatted = date_i18n('j F', strtotime($end_date));

                                                                 $beginning_date_formatted = strtr($beginning_date_formatted, $month_shortenings);
                                                                 $end_date_formatted = strtr($end_date_formatted, $month_shortenings);

                                                                 echo 'с ' . $beginning_date_formatted . ' по ' . $end_date_formatted;
                                                             } elseif($single_date_news) {
                                                                 $single_date_formatted = date_i18n('j F', strtotime($single_date_news));

                                                                 $single_date_formatted = strtr($single_date_formatted, $month_shortenings);

                                                                 echo $single_date_formatted;
                                                             }
                                                             ?>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="catalog-single-news__navigation swiper-navigation">
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
                        </div>
                    <?php } ?>
                    <div class="side">
                        <div class="catalog-single-time">
                            <div class="catalog-single-time__inner">
                            <?php $weekDay = date('w'); ?>
                                <div class="catalog-single-time__item <?php if($weekDay === '0') echo '--active' ?>">
                                    <div class="catalog-single-time__title">Пн</div>
                                    <div class="catalog-single-time__info"><?= get_field('monday_time') ?></div>
                                </div>
                                <div class="catalog-single-time__item <?php if($weekDay === '1') echo '--active' ?>">
                                    <div class="catalog-single-time__title">Вт</div>
                                    <div class="catalog-single-time__info"><?= get_field('tuesday_time') ?></div>
                                </div>
                                <div class="catalog-single-time__item <?php if($weekDay === '2') echo '--active' ?>">
                                    <div class="catalog-single-time__title">Ср</div>
                                    <div class="catalog-single-time__info"><?= get_field('wednesday_time') ?></div>
                                </div>
                                <div class="catalog-single-time__item <?php if($weekDay === '3') echo '--active' ?>">
                                    <div class="catalog-single-time__title">Чт</div>
                                    <div class="catalog-single-time__info"><?= get_field('thursday_time') ?></div>
                                </div>
                                <div class="catalog-single-time__item <?php if($weekDay === '4') echo '--active' ?>">
                                    <div class="catalog-single-time__title">Пт</div>
                                    <div class="catalog-single-time__info"><?= get_field('friday_time') ?></div>
                                </div>
                                <div class="catalog-single-time__item <?php if($weekDay === '5') echo '--active' ?>">
                                    <div class="catalog-single-time__title">Сб</div>
                                    <div class="catalog-single-time__info"><?= get_field('saturday_time') ?></div>
                                </div>
                                <div class="catalog-single-time__item <?php if($weekDay === '6') echo '--active' ?>">
                                    <div class="catalog-single-time__title">Вс</div>
                                    <div class="catalog-single-time__info"><?= get_field('sunday_time') ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#" class="catalog-single-map --mobile">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 10C20 14.418 12 22 12 22C12 22 4 14.418 4 10C4 7.87827 4.84285 5.84344 6.34315 4.34315C7.84344 2.84285 9.87827 2 12 2C14.1217 2 16.1566 2.84285 17.6569 4.34315C19.1571 5.84344 20 7.87827 20 10Z" stroke="#FFFFFF" stroke-width="1.5"/>
                    <path d="M12 11C12.2652 11 12.5196 10.8946 12.7071 10.7071C12.8946 10.5196 13 10.2652 13 10C13 9.73478 12.8946 9.48043 12.7071 9.29289C12.5196 9.10536 12.2652 9 12 9C11.7348 9 11.4804 9.10536 11.2929 9.29289C11.1054 9.48043 11 9.73478 11 10C11 10.2652 11.1054 10.5196 11.2929 10.7071C11.4804 10.8946 11.7348 11 12 11Z" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <p>3 этаж</p>
                <span></span>
                <p>Посмотреть на карте</p>
            </a>
        </section>
    </main>
    <div class="modal" data-modal-name="phones">
        <div class="modal__container">
            <div class="modal__inner contacts">
                <div class="modal__close" data-modal-close>
                    <span></span>
                    <span></span>
                </div>
                <div class="catalog-single-modal">
                    <div class="catalog-single-modal__title">Контакты</div>
                    <div class="catalog-single-modal__inner">
                        <?php
                        $additional_numbers = get_field('additional_numbers');
                        if($additional_numbers) {
                            foreach ($additional_numbers as $number) {
                             ?>
                                <div class="catalog-single-modal__item">
                                    <div class="catalog-single-modal__head"><?= $number["number_label"] ?></div>
                                    <a href="tel:<?= preg_replace("/[^0-9]/", "", $number["number_phone"]);  ?>" class="catalog-single-modal__link"><?= $number["number_phone"] ?></a>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php get_footer('empty'); ?>
</body>
</html>
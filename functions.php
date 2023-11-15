<?php

/**
 * Отключение админ панели на сайте, когда залогинен в админ панель.
 */
add_filter( 'show_admin_bar', '__return_false' );

/**
 * Подключение всех основным стилей и скриптов.
 */
require_once( 'inc/script_and_styles.php' );
require_once(__DIR__ . "/inc/FormSend.php"); // отправка формы
require_once(__DIR__ . "/inc/AddPanelSettings.php");
/**
 * Включение автоматической подстановки title страниц.
 * В данном случае title прописывает плагин Yoast SEO
 * Тэг <title> в header должен отсутствовать.
 */
add_theme_support( 'title-tag' );

// функция загрузки постов при смене табов
function load_posts() {

    $news_type_string = explode(',', $_POST['news_type']);
    $news_type_string = array_filter(array_map('trim', $news_type_string));
    $args = array('post_type' => 'news_gallery', 'posts_per_page' => 6, 'orderby' => 'date');
   
   if (!empty($news_type_string) && $news_type_string[0] !== "") {
      $args['tax_query'] = array(
          array(
              'taxonomy' => 'news-page-type',
              'field'    => 'slug',
              'terms'    => array_map('sanitize_text_field', $news_type_string),
          ),
      );
    }

    $query = new WP_Query($args);
    
    ob_start();
   
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            ?>
            <!-- Код для отображения поста -->
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
                         <div class="news-card__title"><?php if (get_field("news_title_archive") === "") {
                                             echo the_title();
                                         } else { echo get_field("news_title_archive"); }?></div>
                        <div class="news-card__subtitle"><?= get_field("news_subtitle_archive"); ?></div>
                        <div class="news-card__desc"><?= get_field("news_desc_title_archive"); ?></div>
                    </div>
                </div>
            </a>
            <?php
        }
    }

    $output = ob_get_clean();
 
    wp_reset_postdata();
 
    wp_send_json_success(array('has_more_posts' => "", 'html' => $output));
 }
 
 add_action('wp_ajax_load_posts', 'load_posts');
 add_action('wp_ajax_nopriv_load_posts', 'load_posts');

// функция загрузки новых постов при скролле
 function load_more_posts() {
   $page = $_POST['page'];
   
   $args = array(
       'post_type' => 'news_gallery',
       'posts_per_page' => 6,
       'paged' => $page,
   );

   $news_type_string = explode(',', $_POST['news_type']);
   
   if (!empty($news_type_string) && $news_type_string[0] !== "") {
      $args['tax_query'] = array(
          array(
              'taxonomy' => 'news-page-type',
              'field'    => 'slug',
              'terms'    => array_map('sanitize_text_field', $news_type_string),
          ),
      );
  }
   $query = new WP_Query($args);

   ob_start();

   if ($query->have_posts()) {
       while ($query->have_posts()) {
           $query->the_post();
           ?>
           <!-- Код для отображения поста -->
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
                        <div class="news-card__title"><?php if (get_field("news_title_archive") === "") {
                                            echo the_title();
                                        } else { echo get_field("news_title_archive"); }?></div>
                       <div class="news-card__subtitle"><?= get_field("news_subtitle_archive"); ?></div>
                       <div class="news-card__desc"><?= get_field("news_desc_title_archive"); ?></div>
                   </div>
               </div>
           </a>
           <?php
       }
   }
   
   $output = ob_get_clean();

   wp_reset_postdata();

   $has_more_posts = $query->max_num_pages > $page;

   wp_send_json_success(array('has_more_posts' => $has_more_posts, 'html' => $output));
}

add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');

function load_catalog_posts() {
    $page = $_POST["page"];
    $args = array(
        'post_type' => 'shops_catalog',
        'posts_per_page' => 9,
        'paged' => $page,
    );

    if ($_POST["type"] !== 'null') {
        $args['tax_query'] = array(
            array(
                'taxonomy' => $_POST["type"]."_type",
                'operator' => 'EXISTS'
            ),
        );
    }

    $categoryList = [];
    if ($_POST["category"] !== 'null') {
        if(array_key_exists('category', $_POST)) {
           $categoryList = explode(",", $_POST["category"]);
        }
        if (!empty($categoryList)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => $_POST["type"]."_type",
                    'field'    => 'slug',
                    'terms'    => $categoryList,
                ),
            );
        }
    }

    $query = new WP_Query($args);
    ob_start();
    if($query->have_posts()) {
        while($query->have_posts()) {
            $query->the_post();
            $postLogo = get_field('shop_logo');
            $postFloor = get_field('shop_floor');
            $postTags = [];
            $postTags = array_merge($postTags, wp_get_post_terms(get_the_ID(), 'shop_type'));
            $postTags = array_merge($postTags, wp_get_post_terms(get_the_ID(), 'food_type'));
            $postTags = array_merge($postTags, wp_get_post_terms(get_the_ID(), 'services_type'));
            $postTags = wp_list_pluck($postTags, "name");
        ?>
            <div class="catalog-card" data-place>
                <div class="catalog-card__img">
                    <img src="<?= $postLogo['url'] ?>" loading="lazy" decoding= "async" alt="">
                </div>
                <div class="catalog-card__content">
                    <a href="<?= get_post_permalink() ?>" class="catalog-card__title" data-link><?php the_title() ?></a>
                    <div class="catalog-card__tags"><?= implode(', ', $postTags) ?></div>
                    <div class="catalog-card__info">
                        <div class="catalog-card__floor"><?= $postFloor ?></div>
                        <a href="#map" class="catalog-card__map">Показать на карте</a>
                    </div>
                </div>
            </div>
    <?php }
    }
    $output = ob_get_clean();
    $has_more_posts = $query->max_num_pages < $page;

    wp_send_json_success(array('html' => $output, 'post' => $post->ID, 'isMorePosts' => $has_more_posts));
    die();
}

add_action('wp_ajax_load_catalog_posts', 'load_catalog_posts');
add_action('wp_ajax_nopriv_load_catalog_posts', 'load_catalog_posts');


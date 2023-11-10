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

// скрипт добавления ajax в скрипт NewsSort.js
function enqueue_custom_scripts() {
    wp_enqueue_script('your-custom-script', get_template_directory_uri() . '/js/NewsSort.js', array('jquery'), null, true);
    wp_localize_script('your-custom-script', 'custom_vars', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

function feedbackFunction()
 {
    $checkedNews = $_POST['checkedNews'];
    var_dump($checkedNews);
    wp_die();
 }
 
add_action('wp_ajax_feedbackFunction', 'feedbackFunction');
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
                       <div class="news-card__title"><?= get_field("news_title_archive"); ?></div>
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

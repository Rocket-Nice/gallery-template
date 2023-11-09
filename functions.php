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

add_action('wp_ajax_feedbackFunction', 'feedbackFunction');
function feedbackFunction()
 {
    $checkedNews = $_POST['checkedNews'];
    var_dump($checkedNews);
    wp_die();
 }
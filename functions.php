<?php

/**
 * Отключение админ панели на сайте, когда залогинен в админ панель.
 */
add_filter( 'show_admin_bar', '__return_false' );

/**
 * Подключение всех основным стилей и скриптов.
 */
require_once( 'inc/script_and_styles.php' );

/**
 * Включение автоматической подстановки title страниц.
 * В данном случае title прописывает плагин Yoast SEO
 * Тэг <title> в header должен отсутствовать.
 */
add_theme_support( 'title-tag' );
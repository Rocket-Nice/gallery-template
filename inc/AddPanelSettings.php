<?php

// Добавляет вкладку в Настройки
function gallery_add_settings_page() {
    add_options_page(
        'Настройки контактов',
        'Настройки контактов',
        'manage_options',
        'gallery_setting_page' ,
        'render_settings_page' ); //Добавляем служебную конструкцию
}
add_action( 'admin_menu', 'gallery_add_settings_page' );

/**
 * Отрисовка полей на странице Настроек
 */
function gallery_api_settings_init( ) {
    // Регистрация опции в админке. Под этим полем хранятся в базе свойства ниже.
    register_setting( 'theme_options', 'gallery_settings');


    /**
     * Регистрация секции настроек Социальных сетей
     */
    add_settings_section(
        'gallery_api_gallery_theme_options_soc',
        __( 'Социальные сети', 'wordpress' ),
        'gallery_api_settings_section_callback_vk',
        'theme_options');

    function gallery_api_settings_section_callback_vk( ) {
        echo __( 'Настройки параметров социальных сетей', 'wordpress' );
    }
    /**
     * Регистрация поля Instagram
     */
    add_settings_field(
        'gallery_instagram_link',
        'URL Instagram',
        'gallery_instagram_render_account_link',
        'theme_options',
        'gallery_api_gallery_theme_options_soc');

    function gallery_instagram_render_account_link( ) {
        $options = get_option( 'gallery_settings' ); ?>
        <label>
            <input type='text' size="47" name='gallery_settings[gallery_instagram_link]' value='<?= $options['gallery_instagram_link'] ?>'>
        </label>
        <?php
    }

    /**
     * Регистрация поля telegram
     */
    add_settings_field(
        'gallery_telegram_link',
        'URL Telegram',
        'gallery_telegram_render_account_link',
        'theme_options',
        'gallery_api_gallery_theme_options_soc');

    function gallery_telegram_render_account_link( ) {
        $options = get_option( 'gallery_settings' ); ?>
        <label>
            <input type='text' size="47" name='gallery_settings[gallery_telegram_link]' value='<?= $options['gallery_telegram_link'] ?>'>
        </label>
        <?php
    }

    /**
     * Регистрация секции настроек Адреса и Времени
     */
    add_settings_section(
        'gallery_api_gallery_theme_options_contact_info',
        __( 'Адрес и время', 'wordpress' ),
        'gallery_api_settings_section_callback_contact_info',
        'theme_options');

    function gallery_api_settings_section_callback_contact_info( ) {
        echo __( 'Настройки адреса и времени', 'wordpress' );
    }

    /**
     * Регистрация поля Время работы
     */
    add_settings_field(
        'gallery_contact_time',
        'Время работы',
        'gallery_contact_time_render',
        'theme_options',
        'gallery_api_gallery_theme_options_contact_info');

    function gallery_contact_time_render( ) {
        $options = get_option( 'gallery_settings' ); ?>
        <label>
            <input type='text' size="47" name='gallery_settings[gallery_contact_time]' value='<?= $options['gallery_contact_time'] ?>'>
        </label>
        <?php
    }

    /**
     * Регистрация поля адреса
     */
    add_settings_field(
        'gallery_contact_address',
        'Адрес',
        'gallery_contact_address_render',
        'theme_options',
        'gallery_api_gallery_theme_options_contact_info');

    function gallery_contact_address_render( ) {
        $options = get_option( 'gallery_settings' ); ?>
        <label>
            <textarea name='gallery_settings[gallery_contact_address]' cols='50' rows="3"><?= $options['gallery_contact_address'] ?></textarea>
        </label>
        <?php
    }
}
add_action( 'admin_init', 'gallery_api_settings_init' );

function render_settings_page( ) {
    ?>
    <form action='options.php' method='post'>
        <h1>
            Настройки контактных адресов
        </h1>

        <?php
        settings_fields( 'theme_options' );
        do_settings_sections( 'theme_options' );
        submit_button();
        ?>
    </form>
    <?php
}

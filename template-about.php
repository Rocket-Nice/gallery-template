<?php
/*
Template Name: About
*/
?>

<?php get_header(); ?>

<div id="smooth-wrapper">
        <div id="smooth-content">
            <main class="about-page">
                <section class="about-desc" data-header="reverse">
                    <div class="about-desc__bg">
                        <img src="<?= get_field("first_section_bg")["url"]; ?>" width="1920" height="1080" loading="lazy" decoding= "async" alt="">
                    </div>
                    <div class="about-desc__container">
                        <div class="about-desc__content">
                            <div class="about-desc__subtitle"><?= get_field("upper_text"); ?></div>
                            <h1 class="about-desc__title"><?= get_field("middle_title_text"); ?></h1>
                            <div class="about-desc__text">
                                <?= get_field("down_text"); ?>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="about-char" data-header="reverse">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="about-char-slide">
                                    <div class="about-char-slide__container">
                                        <div class="about-char-slide__icon">
                                            <img src="<?php bloginfo('template_url'); ?>/assets/icons/about-char-1.svg" width="48" height="48" loading="lazy" decoding= "async" alt="">
                                        </div>
                                        <div class="about-char-slide__title"><?= get_field("first_text_slider"); ?>м<sup>2</sup></div>
                                        <div class="about-char-slide__desc">площадь</div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="about-char-slide">
                                    <div class="about-char-slide__container">
                                        <div class="about-char-slide__icon">
                                            <img src="<?php bloginfo('template_url'); ?>/assets/icons/about-char-2.svg" width="48" height="48" loading="lazy" decoding= "async" alt="">
                                        </div>
                                        <div class="about-char-slide__title"><?= get_field("second_text_slider"); ?>м<sup>2</sup></div>
                                        <div class="about-char-slide__desc">арендопригодная площадь</div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="about-char-slide">
                                    <div class="about-char-slide__container">
                                        <div class="about-char-slide__icon">
                                            <img src="<?php bloginfo('template_url'); ?>/assets/icons/about-char-1.svg" width="48" height="48" loading="lazy" decoding= "async" alt="">
                                        </div>
                                        <div class="about-char-slide__title"><?= get_field("third_text_slider"); ?></div>
                                        <div class="about-char-slide__desc">3 надземных и 2 надземных</div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="about-char-slide">
                                    <div class="about-char-slide__container">
                                        <div class="about-char-slide__icon">
                                            <img src="<?php bloginfo('template_url'); ?>/assets/icons/about-char-4.svg" width="48" height="48" loading="lazy" decoding= "async" alt="">
                                        </div>
                                        <div class="about-char-slide__title"><?= get_field("fourth_text_slider"); ?></div>
                                        <div class="about-char-slide__desc">магазинов</div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="about-char-slide">
                                    <div class="about-char-slide__container">
                                        <div class="about-char-slide__icon">
                                            <img src="<?php bloginfo('template_url'); ?>/assets/icons/about-char-5.svg" width="48" height="48" loading="lazy" decoding= "async" alt="">
                                        </div>
                                        <div class="about-char-slide__title"><?= get_field("fifth_text_slider"); ?></div>
                                        <div class="about-char-slide__desc">торговых островов</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="about-marquee" data-header="reverse">
                    <div class="about-marquee__block" data-marquee-wrapper>
                        <div class="about-marquee__item" data-marquee="left">
                            <a class="about-marquee__link border" href="#">Товары для дома</a>
                            <a class="about-marquee__link white" href="#">Одежда</a>
                            <a class="about-marquee__link border" href="#">Развлечения</a>
                            <a class="about-marquee__link white" href="#">Суши</a>
                            <a class="about-marquee__link border" href="#">Рестораны</a>
                            <a class="about-marquee__link white" href="#">Кино</a>
                            <a class="about-marquee__link border" href="#">Бытовая техника</a>
                        </div>
                        <div class="about-marquee__item" data-marquee="left">
                            <a class="about-marquee__link white" href="#">Товары для дома</a>
                            <a class="about-marquee__link border" href="#">Одежда</a>
                            <a class="about-marquee__link white" href="#">Развлечения</a>
                            <a class="about-marquee__link border" href="#">Суши</a>
                            <a class="about-marquee__link white" href="#">Рестораны</a>
                            <a class="about-marquee__link border" href="#">Кино</a>
                            <a class="about-marquee__link white" href="#">Бытовая техника</a>
                        </div>
                        <div class="about-marquee__item" data-marquee="left">
                            <a class="about-marquee__link border" href="#">Товары для дома</a>
                            <a class="about-marquee__link white" href="#">Одежда</a>
                            <a class="about-marquee__link border" href="#">Развлечения</a>
                            <a class="about-marquee__link white" href="#">Суши</a>
                            <a class="about-marquee__link border" href="#">Рестораны</a>
                            <a class="about-marquee__link white" href="#">Кино</a>
                            <a class="about-marquee__link border" href="#">Бытовая техника</a>
                        </div>
                    </div>
                    <div class="about-marquee__block" data-marquee-wrapper>
                        <div class="about-marquee__item" data-marquee="right">
                            <a class="about-marquee__link white" href="#">Суши</a>
                            <a class="about-marquee__link border" href="#">Бытовая техника</a>
                            <a class="about-marquee__link white" href="#">Одежда</a>
                            <a class="about-marquee__link border" href="#">Товары для дома</a>
                            <a class="about-marquee__link white" href="#">Зоотовары</a>
                            <a class="about-marquee__link border" href="#">Рестораны</a>
                            <a class="about-marquee__link white" href="#">Кино</a>
                        </div>
                        <div class="about-marquee__item" data-marquee="right">
                            <a class="about-marquee__link border" href="#">Суши</a>
                            <a class="about-marquee__link white" href="#">Бытовая техника</a>
                            <a class="about-marquee__link border" href="#">Одежда</a>
                            <a class="about-marquee__link white" href="#">Товары для дома</a>
                            <a class="about-marquee__link border" href="#">Зоотовары</a>
                            <a class="about-marquee__link white" href="#">Рестораны</a>
                            <a class="about-marquee__link border" href="#">Кино</a>
                        </div>
                        <div class="about-marquee__item" data-marquee="right">
                            <a class="about-marquee__link white" href="#">Суши</a>
                            <a class="about-marquee__link border" href="#">Бытовая техника</a>
                            <a class="about-marquee__link white" href="#">Одежда</a>
                            <a class="about-marquee__link border" href="#">Товары для дома</a>
                            <a class="about-marquee__link white" href="#">Зоотовары</a>
                            <a class="about-marquee__link border" href="#">Рестораны</a>
                            <a class="about-marquee__link white" href="#">Кино</a>
                        </div>
                    </div>
                </section>
                <section class="about-info" data-header="reverse">
                    <div class="about-rates__bg">
                        <img src="<?= get_field("third_section_bg")["url"]; ?>" width="1920" height="1080" loading="lazy" decoding= "async" alt="">
                    </div>
                    <div class="about-info__container">
                        <?php if( have_rows('title_and_elements') ){ ?>
                            <?php while( have_rows('title_and_elements') ){ the_row(); 
                                ?>
                                <div class="about-info__block">
                                    <div class="about-info__title"><?= get_sub_field("title_third_section"); ?></div>
                                    <div class="about-info__inner">
                                        <?php if( have_rows('title_and_text_element') ){ ?>
                                            <?php while( have_rows('title_and_text_element') ){ the_row(); 
                                                ?>
                                            <div class="about-info__item <?php if(get_sub_field("green_or_not_bg")) { ?> --green <?php } ?>">
                                                <div class="about-info__head"><?= get_sub_field("title_element"); ?></div>
                                                <div class="about-info__desc"><?= get_sub_field("text_for_element"); ?></div>
                                            </div>
                                        <?php } }?>
                                    </div>
                            </div>
                                <?php
                                    }
                                }
                        ?>
                        <a href="#about-contacts" class="dark-btn">
                            <div class="dark-btn__text">О ТЦ</div>
                            <div class="dark-btn__icon">
                                <img src="<?php bloginfo('template_url'); ?>/assets/icons/btn-arrow.svg" width="24" height="24" loading="lazy" decoding= "async" alt="">
                            </div>
                        </a>
                    </div>
                </section>
                <section class="about-rates" data-header="reverse">
                    <div class="about-rates__bg">
                        <img src="<?= get_field("fourth_section_bg")["url"]; ?>" width="1920" height="1080" loading="lazy" decoding= "async" alt="">
                    </div>
                    <div class="about-rates__container">
                        <div class="about-rates__title"><?= get_field("big_text_fourth_section"); ?></div>
                        <div class="about-rates__subtitle"><?= get_field("small_text_fourth_section"); ?></div>
                        <a href="#" class="dark-btn" style="display: none;">
                            <div class="dark-btn__text">Иформация о тарифах</div>
                            <div class="dark-btn__icon">
                                <img src="<?php bloginfo('template_url'); ?>/assets/icons/btn-arrow.svg" width="24" height="24" loading="lazy" decoding= "async" alt="">
                            </div>
                        </a>
                    </div>
                </section>
                <section class="about-contacts" data-header="default" id="about-contacts">
                    <div class="about-contacts__container">
                        <div class="about-contacts__title">Контактная информация</div>
                        <div class="about-contacts__inner">
                            <?php if( have_rows('title_and_number') ){ ?>
                                <?php while( have_rows('title_and_number') ){ the_row(); 
                                    ?>
                                    <div class="about-contacts__item">
                                        <div class="about-contacts__head"><?= get_sub_field("title_fifth_section"); ?></div>
                                        <?php
                                        $phone_number = get_sub_field("number_fifth_section"); // Получение номера из ACF поля

                                        // Очистка номера от всех символов кроме цифр
                                        $cleaned_number = preg_replace('/[^0-9]/', '', $phone_number);

                                        // Форматирование номера для отображения в текстовом виде
                                        $formatted_number = '+7 (' . substr($cleaned_number, 1, 3) . ') ' . substr($cleaned_number, 4, 3) . ' ' . substr($cleaned_number, 7, 2) . ' ' . substr($cleaned_number, 9, 2);

                                        // Отображение ссылки с номером телефона
                                        ?>
                                        <a href="tel:<?php echo $cleaned_number; ?>" class="about-contacts__desc"><?= $formatted_number; ?></a>
                                    </div>
                            <?php } } ?>
                        </div>
                    </div>
                    <div class="about-contacts__map">
                        <iframe src="https://yandex.ru/map-widget/v1/?ll=44.686316%2C43.030537&mode=poi&poi%5Bpoint%5D=44.686081%2C43.030606&poi%5Buri%5D=ymapsbm1%3A%2F%2Forg%3Foid%3D205202674359&z=19.88" loading="lazy"></iframe>
                    </div>
                </section>
            </main>
            <?php get_footer(); ?>
        </div>
    </div>
</body>
</html>
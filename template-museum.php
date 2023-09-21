<?php
/*
Template Name: About
*/
?>

<?php get_header(); ?>

<div id="smooth-wrapper">
        <div id="smooth-content">
            <main class="about-page">
                <section class="about-desc">
                    <div class="about-desc__bg">
                        <img src="<?php bloginfo('template_url'); ?>/assets/images/about-desc.jpg" width="1920" height="1080" loading="lazy" decoding= "async" alt="">
                    </div>
                    <div class="about-desc__container">
                        <div class="about-desc__content">
                            <div class="about-desc__subtitle">немного о</div>
                            <div class="about-desc__title">GALLERY</div>
                            <div class="about-desc__text">
                                Распространенный в Западной Европе формат, главной особенностью которого является удобство и комфорт доступа непосредственно к магазинам, каждый из которых имеет отдельный вход с улицы.
                            </div>
                        </div>
                    </div>
                </section>
                <section class="about-rates">
                    <div class="about-rates__bg">
                        <img src="<?php bloginfo('template_url'); ?>/assets/images/about-rates.jpg" width="1920" height="1080" loading="lazy" decoding= "async" alt="">
                    </div>
                    <div class="about-rates__container">
                        <div class="about-rates__title">100</div>
                        <div class="about-rates__subtitle">машиномест на подземном паркинге</div>
                        <a href="#" class="dark-btn">
                            <div class="dark-btn__text">Иформация о тарифах</div>
                            <div class="dark-btn__icon">
                                <img src="<?php bloginfo('template_url'); ?>/assets/icons/btn-arrow.svg" width="24" height="24" loading="lazy" decoding= "async" alt="">
                            </div>
                        </a>
                    </div>
                </section>
            </main>
            <?php get_footer(); ?>
        </div>
    </div>
</body>
</html>
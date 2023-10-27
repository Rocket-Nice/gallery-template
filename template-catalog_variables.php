<?php
/*
Template Name: Catalog_variables
*/
?>

<?php get_header(); ?>

    <main class="catalog-page">
        <section class="catalog">
            <div class="catalog__container">
                <div class="catalog__inner">
                    <div class="sidebar-sticky">
                        <div class="sidebar">
                            <div class="sidebar-tabs">
                                <div class="sidebar-tabs__item --active">
                                    <div class="sidebar-tabs__icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.9998 5C13.9998 4.46957 13.7891 3.96086 13.414 3.58579C13.039 3.21071 12.5303 3 11.9998 3C11.4694 3 10.9607 3.21071 10.5856 3.58579C10.2105 3.96086 9.99983 4.46957 9.99983 5M19.2598 9.696L20.6448 18.696C20.6886 18.9808 20.6704 19.2718 20.5913 19.5489C20.5122 19.8261 20.3741 20.0828 20.1865 20.3016C19.999 20.5204 19.7663 20.6961 19.5045 20.8167C19.2428 20.9372 18.958 20.9997 18.6698 21H5.32983C5.04146 21 4.7565 20.9377 4.49447 20.8173C4.23245 20.6969 3.99956 20.5212 3.81177 20.3024C3.62399 20.0836 3.48575 19.8267 3.40653 19.5494C3.32732 19.2721 3.309 18.981 3.35283 18.696L4.73783 9.696C4.81048 9.22359 5.04991 8.79282 5.41275 8.4817C5.7756 8.17059 6.23787 7.9997 6.71583 8H17.2838C17.7616 7.99994 18.2236 8.17094 18.5863 8.48203C18.9489 8.79312 19.1872 9.22376 19.2598 9.696Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div class="sidebar-tabs__text">Списком</div>
                                </div>
                                <a href="/map" class="sidebar-tabs__item">
                                    <div class="sidebar-tabs__icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M20 10C20 14.418 12 22 12 22C12 22 4 14.418 4 10C4 7.87827 4.84285 5.84344 6.34315 4.34315C7.84344 2.84285 9.87827 2 12 2C14.1217 2 16.1566 2.84285 17.6569 4.34315C19.1571 5.84344 20 7.87827 20 10Z" stroke="white" stroke-width="1.5"/>
                                            <path d="M12 11C12.2652 11 12.5196 10.8946 12.7071 10.7071C12.8946 10.5196 13 10.2652 13 10C13 9.73478 12.8946 9.48043 12.7071 9.29289C12.5196 9.10536 12.2652 9 12 9C11.7348 9 11.4804 9.10536 11.2929 9.29289C11.1054 9.48043 11 9.73478 11 10C11 10.2652 11.1054 10.5196 11.2929 10.7071C11.4804 10.8946 11.7348 11 12 11Z" fill="white" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div class="sidebar-tabs__text">Карта</div>
                                </a>
                            </div>
                            <div class="sidebar-block --open">
                                <a href="#" class="sidebar-block-head">
                                    <div class="sidebar-block-head__title">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.9998 5C13.9998 4.46957 13.7891 3.96086 13.414 3.58579C13.039 3.21071 12.5303 3 11.9998 3C11.4694 3 10.9607 3.21071 10.5856 3.58579C10.2105 3.96086 9.99983 4.46957 9.99983 5M19.2598 9.696L20.6448 18.696C20.6886 18.9808 20.6704 19.2718 20.5913 19.5489C20.5122 19.8261 20.3741 20.0828 20.1865 20.3016C19.999 20.5204 19.7663 20.6961 19.5045 20.8167C19.2428 20.9372 18.958 20.9997 18.6698 21H5.32983C5.04146 21 4.7565 20.9377 4.49447 20.8173C4.23245 20.6969 3.99956 20.5212 3.81177 20.3024C3.62399 20.0836 3.48575 19.8267 3.40653 19.5494C3.32732 19.2721 3.309 18.981 3.35283 18.696L4.73783 9.696C4.81048 9.22359 5.04991 8.79282 5.41275 8.4817C5.7756 8.17059 6.23787 7.9997 6.71583 8H17.2838C17.7616 7.99994 18.2236 8.17094 18.5863 8.48203C18.9489 8.79312 19.1872 9.22376 19.2598 9.696Z" stroke="#2F3542" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <span>Магазины</span>
                                    </div>
                                    <div class="sidebar-block-head__arrow">
                                        <img src="<?php bloginfo('template_url'); ?>/assets/icons/sidebar-arrow.svg" loading="lazy" decoding= "async" alt="">
                                    </div>
                                </a>
                                <div class="sidebar-block-body">
                                    <div class="sidebar-block-body__item" data-tag="p1">
                                        <p>Одежда</p>
                                        <div class="sidebar-block-body__icon">
                                            <span></span><span></span>
                                        </div>
                                    </div>
                                    <div class="sidebar-block-body__item" data-tag="p2">
                                        <p>Подарки и аксессуары</p>
                                        <div class="sidebar-block-body__icon">
                                            <span></span><span></span>
                                        </div>
                                    </div>
                                    <div class="sidebar-block-body__item" data-tag="p3">
                                        <p>Красота и здоровье</p>
                                        <div class="sidebar-block-body__icon">
                                            <span></span><span></span>
                                        </div>
                                    </div>
                                    <div class="sidebar-block-body__item" data-tag="p4">
                                        <p>Электроника и бытовая техника</p>
                                        <div class="sidebar-block-body__icon">
                                            <span></span><span></span>
                                        </div>
                                    </div>
                                    <div class="sidebar-block-body__item" data-tag="p5">
                                        <p>Детские товары</p>
                                        <div class="sidebar-block-body__icon">
                                            <span></span><span></span>
                                        </div>
                                    </div>
                                    <div class="sidebar-block-body__item" data-tag="p6">
                                        <p>Продукты питания и напитки</p>
                                        <div class="sidebar-block-body__icon">
                                            <span></span><span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar-block">
                                <a href="#" class="sidebar-block-head">
                                    <div class="sidebar-block-head__title">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.9998 5C13.9998 4.46957 13.7891 3.96086 13.414 3.58579C13.039 3.21071 12.5303 3 11.9998 3C11.4694 3 10.9607 3.21071 10.5856 3.58579C10.2105 3.96086 9.99983 4.46957 9.99983 5M19.2598 9.696L20.6448 18.696C20.6886 18.9808 20.6704 19.2718 20.5913 19.5489C20.5122 19.8261 20.3741 20.0828 20.1865 20.3016C19.999 20.5204 19.7663 20.6961 19.5045 20.8167C19.2428 20.9372 18.958 20.9997 18.6698 21H5.32983C5.04146 21 4.7565 20.9377 4.49447 20.8173C4.23245 20.6969 3.99956 20.5212 3.81177 20.3024C3.62399 20.0836 3.48575 19.8267 3.40653 19.5494C3.32732 19.2721 3.309 18.981 3.35283 18.696L4.73783 9.696C4.81048 9.22359 5.04991 8.79282 5.41275 8.4817C5.7756 8.17059 6.23787 7.9997 6.71583 8H17.2838C17.7616 7.99994 18.2236 8.17094 18.5863 8.48203C18.9489 8.79312 19.1872 9.22376 19.2598 9.696Z" stroke="#2F3542" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <span>Магазины</span>
                                    </div>
                                    <div class="sidebar-block-head__arrow">
                                        <img src="<?php bloginfo('template_url'); ?>/assets/icons/sidebar-arrow.svg" loading="lazy" decoding= "async" alt="">
                                    </div>
                                </a>
                                <div class="sidebar-block-body">
                                    <div class="sidebar-block-body__item">
                                        <p>Одежда</p>
                                    </div>
                                    <div class="sidebar-block-body__item">
                                        <p>Подарки и аксессуары</p>
                                    </div>
                                    <div class="sidebar-block-body__item">
                                        <p>Красота и здоровье</p>
                                    </div>
                                    <div class="sidebar-block-body__item">
                                        <p>Электроника и бытовая техника</p>
                                    </div>
                                    <div class="sidebar-block-body__item">
                                        <p>Детские товары</p>
                                    </div>
                                    <div class="sidebar-block-body__item">
                                        <p>Продукты питания и напитки</p>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar-block">
                                <a href="#" class="sidebar-block-head">
                                    <div class="sidebar-block-head__title">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.9998 5C13.9998 4.46957 13.7891 3.96086 13.414 3.58579C13.039 3.21071 12.5303 3 11.9998 3C11.4694 3 10.9607 3.21071 10.5856 3.58579C10.2105 3.96086 9.99983 4.46957 9.99983 5M19.2598 9.696L20.6448 18.696C20.6886 18.9808 20.6704 19.2718 20.5913 19.5489C20.5122 19.8261 20.3741 20.0828 20.1865 20.3016C19.999 20.5204 19.7663 20.6961 19.5045 20.8167C19.2428 20.9372 18.958 20.9997 18.6698 21H5.32983C5.04146 21 4.7565 20.9377 4.49447 20.8173C4.23245 20.6969 3.99956 20.5212 3.81177 20.3024C3.62399 20.0836 3.48575 19.8267 3.40653 19.5494C3.32732 19.2721 3.309 18.981 3.35283 18.696L4.73783 9.696C4.81048 9.22359 5.04991 8.79282 5.41275 8.4817C5.7756 8.17059 6.23787 7.9997 6.71583 8H17.2838C17.7616 7.99994 18.2236 8.17094 18.5863 8.48203C18.9489 8.79312 19.1872 9.22376 19.2598 9.696Z" stroke="#2F3542" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <span>Магазины</span>
                                    </div>
                                    <div class="sidebar-block-head__arrow">
                                        <img src="<?php bloginfo('template_url'); ?>/assets/icons/sidebar-arrow.svg" loading="lazy" decoding= "async" alt="">
                                    </div>
                                </a>
                                <div class="sidebar-block-body">
                                    <div class="sidebar-block-body__item" data-tag-name="odejda">
                                        <p>Одежда</p>
                                    </div>
                                    <div class="sidebar-block-body__item">
                                        <p>Подарки и аксессуары</p>
                                    </div>
                                    <div class="sidebar-block-body__item">
                                        <p>Красота и здоровье</p>
                                    </div>
                                    <div class="sidebar-block-body__item">
                                        <p>Электроника и бытовая техника</p>
                                    </div>
                                    <div class="sidebar-block-body__item">
                                        <p>Детские товары</p>
                                    </div>
                                    <div class="sidebar-block-body__item">
                                        <p>Продукты питания и напитки</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="catalog__content">
                        <div class="catalog-title">
                            <div class="catalog-title-head">
                                <div class="catalog-title-head__icon --violet">
                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18.6664 6.66667C18.6664 5.95942 18.3855 5.28115 17.8854 4.78105C17.3853 4.28095 16.707 4 15.9998 4C15.2925 4 14.6143 4.28095 14.1142 4.78105C13.6141 5.28115 13.3331 5.95942 13.3331 6.66667M25.6798 12.928L27.5264 24.928C27.5848 25.3078 27.5605 25.6957 27.455 26.0652C27.3495 26.4348 27.1655 26.7771 26.9154 27.0689C26.6653 27.3606 26.3551 27.5948 26.0061 27.7556C25.657 27.9163 25.2774 27.9997 24.8931 28H7.10644C6.72195 28 6.342 27.9169 5.99263 27.7564C5.64326 27.5959 5.33275 27.3617 5.08237 27.0699C4.83199 26.7781 4.64767 26.4356 4.54205 26.0659C4.43642 25.6962 4.412 25.308 4.47044 24.928L6.31711 12.928C6.41397 12.2981 6.73321 11.7238 7.21701 11.3089C7.7008 10.8941 8.31715 10.6663 8.95444 10.6667H23.0451C23.6822 10.6666 24.2982 10.8946 24.7817 11.3094C25.2652 11.7242 25.5829 12.2983 25.6798 12.928Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="catalog-title-head__text">Магазины</div>
                            </div>
                            <a href="#" class="btn-back --desc">
                                <div class="btn-back__icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15 6L9 12L15 18" stroke="#2F3542" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="btn-back__text">Назад</div>
                            </a>
                            <a href="#" class="btn-back-simple --mobile">
                                <div class="btn-back__icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15 6L9 12L15 18" stroke="#2F3542" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                            </a>
                        </div>
                        <div class="catalog-cards">
                            <div class="catalog-card" data-place>
                                <div class="catalog-card__img">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/images/catalog-1.png" loading="lazy" decoding= "async" alt="">
                                </div>
                                <div class="catalog-card__content">
                                    <a href="#" class="catalog-card__title" data-link>[Corner]</a>
                                    <div class="catalog-card__tags">Одежда, Женская одежда, Аксессуары, Обувь, Локальные бренды</div>
                                    <div class="catalog-card__info">
                                        <div class="catalog-card__floor">3 этаж</div>
                                        <a href="#map" class="catalog-card__map">Показать на карте</a>
                                    </div>
                                </div>
                            </div>
                            <div class="catalog-card" data-place>
                                <div class="catalog-card__img">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/images/catalog-2.png" loading="lazy" decoding= "async" alt="">
                                </div>
                                <div class="catalog-card__content">
                                    <a href="#" class="catalog-card__title" data-link>12 STOREEZ</a>
                                    <div class="catalog-card__tags">Одежда, Женская одежда</div>
                                    <div class="catalog-card__info">
                                        <div class="catalog-card__floor">3 этаж</div>
                                        <a class="catalog-card__map">Показать на карте</a>
                                    </div>
                                </div>
                            </div>
                            <div class="catalog-card" data-place>
                                <div class="catalog-card__img">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/images/catalog-3.png" loading="lazy" decoding= "async" alt="">
                                </div>
                                <div class="catalog-card__content">
                                    <a href="#" class="catalog-card__title" data-link>Aeronautica Militare</a>
                                    <div class="catalog-card__tags">Аксессуары, Локальные бренды, Подарки и сувениры, Ювелирные изделия и часы, Подарки и сувениры</div>
                                    <div class="catalog-card__info">
                                        <div class="catalog-card__floor">3 этаж</div>
                                        <a class="catalog-card__map">Показать на карте</a>
                                    </div>
                                </div>
                            </div>
                            <div class="catalog-card" data-place>
                                <div class="catalog-card__img">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/images/catalog-3.png" loading="lazy" decoding= "async" alt="">
                                </div>
                                <div class="catalog-card__content">
                                    <a href="#" class="catalog-card__title" data-link>12 STOREEZ</a>
                                    <div class="catalog-card__tags">Одежда, Женская одежда, Аксессуары, Обувь, Локальные бренды</div>
                                    <div class="catalog-card__info">
                                        <div class="catalog-card__floor">3 этаж</div>
                                        <a class="catalog-card__map">Показать на карте</a>
                                    </div>
                                </div>
                            </div>
                            <div class="catalog-card" data-place>
                                <div class="catalog-card__img">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/images/catalog-1.png" loading="lazy" decoding= "async" alt="">
                                </div>
                                <div class="catalog-card__content">
                                    <a href="#" class="catalog-card__title" data-link>[Corner]</a>
                                    <div class="catalog-card__tags">Одежда, Женская одежда, Аксессуары, Обувь, Локальные бренды</div>
                                    <div class="catalog-card__info">
                                        <div class="catalog-card__floor">3 этаж</div>
                                        <a class="catalog-card__map">Показать на карте</a>
                                    </div>
                                </div>
                            </div>
                            <div class="catalog-card" data-place>
                                <div class="catalog-card__img">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/images/catalog-2.png" loading="lazy" decoding= "async" alt="">
                                </div>
                                <div class="catalog-card__content">
                                    <a href="#" class="catalog-card__title" data-link>Aeronautica Militare</a>
                                    <div class="catalog-card__tags">Одежда, Женская одежда, Аксессуары, Обувь, Локальные бренды</div>
                                    <div class="catalog-card__info">
                                        <div class="catalog-card__floor">3 этаж</div>
                                        <a class="catalog-card__map">Показать на карте</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php get_footer('empty'); ?>
</body>
</html>
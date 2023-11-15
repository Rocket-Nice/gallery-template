<?php
$shopTerms = get_terms([
    'taxonomy' => 'shop_type',
    'hide_empty' => false,
]);
$foodTerms = get_terms([
    'taxonomy' => 'food_type',
    'hide_empty' => false,
]);
$servicesTerms = get_terms([
    'taxonomy' => 'services_type',
    'hide_empty' => false,
]);
$typesList = [];
if(array_key_exists('type', $_GET)) {
    $typesList = explode(",", $_GET['type']);
}

$categoryList = [];
if(array_key_exists('category', $_GET)) {
   $categoryList = explode(",", $_GET['category']);
}

$args = array(
    'post_type' => 'shops_catalog',
    'posts_per_page' => 9,
);

if (!empty($typesList)) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => $typesList[0]."_type",
            'operator' => 'EXISTS'
        ),
    );
}

if (!empty($categoryList)) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => $typesList[0]."_type",
            'field'    => 'slug',
            'terms'    => $categoryList,
        ),
    );
}

$query = new WP_Query($args);
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
                            <div class="sidebar-block <?php if(in_array('shop', $typesList)) { echo "--open"; } ?>">
                                <a class="sidebar-block-head" data-type="shop">
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
                                    <?php foreach($shopTerms as $term) { ?>
                                        <div class="sidebar-block-body__item <?php if(in_array($term->slug, $categoryList)) echo '--checked'; ?>" data-category="<?= $term->slug ?>">
                                            <p><?= $term->name ?></p>
                                            <div class="sidebar-block-body__icon">
                                                <span></span><span></span>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="sidebar-block <?php if(in_array('food', $typesList)) echo "--open" ?>">
                                <a class="sidebar-block-head" data-type="food">
                                    <div class="sidebar-block-head__title">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14 9.01002L14.01 8.99902M8 8.01002L8.01 7.99902M8 14.01L8.01 13.999" stroke="#2F3542" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M5.99996 19.0002L2.23596 3.00418C2.21187 2.90192 2.21505 2.79511 2.24519 2.69446C2.27534 2.59381 2.33138 2.50284 2.40773 2.43065C2.48407 2.35846 2.57803 2.30758 2.6802 2.28311C2.78238 2.25863 2.88919 2.26142 2.98996 2.29118L19 7.00019" stroke="#2F3542" stroke-width="1.5"/>
                                            <path d="M22.1981 8.42489C22.2539 8.20191 22.2652 7.97011 22.2315 7.74274C22.1977 7.51537 22.1195 7.29688 22.0013 7.09974C21.8831 6.90261 21.7272 6.73068 21.5425 6.59378C21.3579 6.45689 21.1481 6.3577 20.9251 6.30189C20.7021 6.24608 20.4703 6.23473 20.2429 6.2685C20.0156 6.30227 19.7971 6.38049 19.5999 6.4987C19.4028 6.61691 19.2309 6.77279 19.094 6.95745C18.9571 7.1421 18.8579 7.35191 18.8021 7.57489C18.4111 9.14289 16.9021 11.6249 14.5751 13.9499C12.2751 16.2509 9.42708 18.1439 6.60708 18.7949C6.38037 18.8438 6.16564 18.9373 5.97537 19.0699C5.7851 19.2025 5.62309 19.3716 5.49876 19.5674C5.37443 19.7632 5.29026 19.9818 5.25114 20.2104C5.21203 20.439 5.21874 20.6731 5.2709 20.8991C5.32305 21.1251 5.41961 21.3384 5.55496 21.5268C5.69031 21.7151 5.86174 21.8747 6.0593 21.9962C6.25685 22.1177 6.47659 22.1987 6.70574 22.2345C6.93489 22.2704 7.16887 22.2603 7.39408 22.2049C11.0741 21.3559 14.4761 18.9989 17.0501 16.4249C19.5991 13.8759 21.5901 10.8569 22.1981 8.42489Z" stroke="#2F3542" stroke-width="1.5" stroke-linecap="round"/>
                                        </svg>
                                        <span>Где поесть</span>
                                    </div>
                                    <div class="sidebar-block-head__arrow">
                                        <img src="<?php bloginfo('template_url'); ?>/assets/icons/sidebar-arrow.svg" loading="lazy" decoding= "async" alt="">
                                    </div>
                                </a>
                                <div class="sidebar-block-body">
                                     <?php foreach($foodTerms as $term) { ?>
                                        <div class="sidebar-block-body__item <?php if(in_array($term->slug, $categoryList)) echo '--checked'; ?>" data-category="<?= $term->slug ?>">
                                            <p><?= $term->name ?></p>
                                            <div class="sidebar-block-body__icon">
                                                <span></span><span></span>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="sidebar-block <?php if(in_array('services', $typesList)) echo "--open" ?>">
                                <a class="sidebar-block-head" data-type="services">
                                    <div class="sidebar-block-head__title">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.00007 11V18M15.0001 11V18M14.0001 5C14.0001 4.46957 13.7894 3.96086 13.4143 3.58579C13.0392 3.21071 12.5305 3 12.0001 3C11.4696 3 10.9609 3.21071 10.5859 3.58579C10.2108 3.96086 10.0001 4.46957 10.0001 5M19.2601 9.696L20.6451 18.696C20.6889 18.9808 20.6706 19.2718 20.5915 19.5489C20.5124 19.8261 20.3743 20.0828 20.1868 20.3016C19.9992 20.5204 19.7666 20.6961 19.5048 20.8167C19.243 20.9372 18.9583 20.9997 18.6701 21H5.33007C5.04171 21 4.75674 20.9377 4.49472 20.8173C4.23269 20.6969 3.9998 20.5212 3.81202 20.3024C3.62423 20.0836 3.48599 19.8267 3.40678 19.5494C3.32756 19.2721 3.30924 18.981 3.35307 18.696L4.73807 9.696C4.81072 9.22359 5.05015 8.79282 5.413 8.4817C5.77584 8.17059 6.23811 7.9997 6.71607 8H17.2841C17.7619 7.99994 18.2239 8.17094 18.5865 8.48203C18.9492 8.79312 19.1874 9.22376 19.2601 9.696Z" stroke="#2F3542" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <span>Услуги</span>
                                    </div>
                                    <div class="sidebar-block-head__arrow">
                                        <img src="<?php bloginfo('template_url'); ?>/assets/icons/sidebar-arrow.svg" loading="lazy" decoding= "async" alt="">
                                    </div>
                                </a>
                                <div class="sidebar-block-body">
                                    <?php foreach($servicesTerms as $term) { ?>
                                        <div class="sidebar-block-body__item <?php if(in_array($term->slug, $categoryList)) echo '--checked'; ?>" data-category="<?= $term->slug ?>">
                                            <p><?= $term->name ?></p>
                                            <div class="sidebar-block-body__icon">
                                                <span></span><span></span>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="catalog__content main-content <?php if(!$typesList && !$categoryList) echo "--show"?>">
                        <div class="catalog-title">
                            <div class="catalog-title-head">
                                <div class="catalog-title-head__icon --violet">
                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18.6664 6.66667C18.6664 5.95942 18.3855 5.28115 17.8854 4.78105C17.3853 4.28095 16.707 4 15.9998 4C15.2925 4 14.6143 4.28095 14.1142 4.78105C13.6141 5.28115 13.3331 5.95942 13.3331 6.66667M25.6798 12.928L27.5264 24.928C27.5848 25.3078 27.5605 25.6957 27.455 26.0652C27.3495 26.4348 27.1655 26.7771 26.9154 27.0689C26.6653 27.3606 26.3551 27.5948 26.0061 27.7556C25.657 27.9163 25.2774 27.9997 24.8931 28H7.10644C6.72195 28 6.342 27.9169 5.99263 27.7564C5.64326 27.5959 5.33275 27.3617 5.08237 27.0699C4.83199 26.7781 4.64767 26.4356 4.54205 26.0659C4.43642 25.6962 4.412 25.308 4.47044 24.928L6.31711 12.928C6.41397 12.2981 6.73321 11.7238 7.21701 11.3089C7.7008 10.8941 8.31715 10.6663 8.95444 10.6667H23.0451C23.6822 10.6666 24.2982 10.8946 24.7817 11.3094C25.2652 11.7242 25.5829 12.2983 25.6798 12.928Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="catalog-title-head__text">Магазины</div>
                            </div>
                            <a href="/" class="btn-back --desc">
                                <div class="btn-back__icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15 6L9 12L15 18" stroke="#2F3542" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="btn-back__text">Назад</div>
                            </a>
                            <a href="/" class="btn-back-simple --mobile">
                                <div class="btn-back__icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15 6L9 12L15 18" stroke="#2F3542" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                            </a>
                        </div>
                        <?php if($shopTerms) { ?>
                            <div class="catalog-cards">
                                <?php foreach($shopTerms as $term) {
                                    if($term->parent) continue;
                                    $shopsList = $term->slug;
                                    foreach($shopTerms as $termInner) {
                                        if($termInner->parent === $term->term_id) $shopsList.=  ','.$termInner->slug;
                                    }
                                    ?>
                                    <a href="?type=shop&category=<?= $shopsList ?>" class="catalog-block">
                                        <img src="<?= get_taxonomy_image($term->term_id)?>" loading="lazy" decoding= "async" alt="">
                                        <div class="catalog-block__title"><?= $term->name ?></div>
                                    </a>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <div class="catalog-title">
                            <div class="catalog-title-head">
                                <div class="catalog-title-head__icon --yellow">
                                    <svg width="32" height="33" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18.6665 12.5133L18.6798 12.4986M10.6665 11.18L10.6798 11.1653M10.6665 19.1799L10.6798 19.1653" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.99994 25.8334L2.98128 4.50542C2.94915 4.36906 2.9534 4.22666 2.99359 4.09245C3.03378 3.95825 3.10851 3.83696 3.2103 3.7407C3.31209 3.64445 3.43737 3.57661 3.5736 3.54398C3.70984 3.51135 3.85226 3.51506 3.98661 3.55475L25.3333 9.83342" stroke="white" stroke-width="1.5"/>
                                        <path d="M29.5971 11.7333C29.6715 11.436 29.6867 11.1269 29.6416 10.8237C29.5966 10.5206 29.4923 10.2293 29.3347 9.96641C29.1771 9.70356 28.9693 9.47432 28.723 9.29179C28.4768 9.10927 28.1971 8.97702 27.8998 8.9026C27.6025 8.82819 27.2934 8.81306 26.9903 8.85809C26.6871 8.90311 26.3958 9.00741 26.1329 9.16502C25.8701 9.32263 25.6408 9.53047 25.4583 9.77668C25.2758 10.0229 25.1435 10.3026 25.0691 10.5999C24.5478 12.6906 22.5358 15.9999 19.4331 19.0999C16.3665 22.1679 12.5691 24.6919 8.80912 25.5599C8.50683 25.6251 8.22052 25.7498 7.96683 25.9266C7.71314 26.1034 7.49713 26.3289 7.33136 26.59C7.16559 26.8511 7.05336 27.1425 7.0012 27.4473C6.94904 27.7521 6.958 28.0642 7.02754 28.3655C7.09708 28.6669 7.22583 28.9513 7.40629 29.2025C7.58675 29.4536 7.81533 29.6663 8.07874 29.8283C8.34215 29.9903 8.63513 30.0984 8.94066 30.1461C9.24619 30.1939 9.55817 30.1805 9.85845 30.1066C14.7651 28.9746 19.3011 25.8319 22.7331 22.3999C26.1318 19.0013 28.7865 14.9759 29.5971 11.7333Z" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                                    </svg>
                                </div>
                                <div class="catalog-title-head__text">Где поесть</div>
                            </div>
                        </div>
                        <?php if($foodTerms) { ?>
                            <div class="catalog-cards">
                                <?php foreach($foodTerms as $term) {
                                    if($term->parent) continue;
                                    $foodList = $term->slug;
                                    foreach($foodTerms as $termInner) {
                                        if($termInner->parent === $term->term_id) $foodList.=  ','.$termInner->slug;
                                    }
                                                                        ?>
                                    <a href="?type=food&category=<?= $foodList ?>" class="catalog-block">
                                        <img src="<?= get_taxonomy_image($term->term_id)?>" loading="lazy" decoding= "async" alt="">
                                        <div class="catalog-block__title"><?= $term->name ?></div>
                                    </a>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <div class="catalog-title">
                            <div class="catalog-title-head">
                                <div class="catalog-title-head__icon --blue">
                                    <svg width="32" height="33" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.9998 15.1667V24.5M19.9998 15.1667V24.5M18.6664 7.16667C18.6664 6.45942 18.3855 5.78115 17.8854 5.28105C17.3853 4.78095 16.707 4.5 15.9998 4.5C15.2925 4.5 14.6143 4.78095 14.1142 5.28105C13.6141 5.78115 13.3331 6.45942 13.3331 7.16667M25.6798 13.428L27.5264 25.428C27.5848 25.8078 27.5605 26.1957 27.455 26.5652C27.3495 26.9348 27.1655 27.2771 26.9154 27.5689C26.6653 27.8606 26.3551 28.0948 26.0061 28.2556C25.657 28.4163 25.2774 28.4997 24.8931 28.5H7.10644C6.72195 28.5 6.342 28.4169 5.99263 28.2564C5.64326 28.0959 5.33275 27.8617 5.08237 27.5699C4.83199 27.2781 4.64767 26.9356 4.54205 26.5659C4.43642 26.1962 4.412 25.808 4.47044 25.428L6.31711 13.428C6.41397 12.7981 6.73321 12.2238 7.21701 11.8089C7.7008 11.3941 8.31715 11.1663 8.95444 11.1667H23.0451C23.6822 11.1666 24.2982 11.3946 24.7817 11.8094C25.2652 12.2242 25.5829 12.7983 25.6798 13.428Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="catalog-title-head__text">Услуги</div>
                            </div>
                        </div>
                        <?php if($servicesTerms) { ?>
                            <div class="catalog-cards">
                                 <?php foreach($servicesTerms as $term) {
                                    if($term->parent) continue;
                                    $servicesList = $term->slug;
                                    foreach($servicesTerms as $termInner) {
                                        if($termInner->parent === $term->term_id) $servicesList.=  ','.$termInner->slug;
                                    }
                                    ?>
                                    <a href="?type=services&category=<?= $servicesList ?>" class="catalog-block">
                                        <img src="<?= get_taxonomy_image($term->term_id)?>" loading="lazy" decoding= "async" alt="">
                                        <div class="catalog-block__title"><?= $term->name ?></div>
                                    </a>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="catalog__content cards-catalog <?php if($categoryList || $typesList) echo "--show" ?>">
                        <div class="catalog-title">
                            <div class="catalog-title-head <?php if(in_array('shop', $typesList)) { echo "--show"; } ?>" data-title="shop">
                                <div class="catalog-title-head__icon --violet">
                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18.6664 6.66667C18.6664 5.95942 18.3855 5.28115 17.8854 4.78105C17.3853 4.28095 16.707 4 15.9998 4C15.2925 4 14.6143 4.28095 14.1142 4.78105C13.6141 5.28115 13.3331 5.95942 13.3331 6.66667M25.6798 12.928L27.5264 24.928C27.5848 25.3078 27.5605 25.6957 27.455 26.0652C27.3495 26.4348 27.1655 26.7771 26.9154 27.0689C26.6653 27.3606 26.3551 27.5948 26.0061 27.7556C25.657 27.9163 25.2774 27.9997 24.8931 28H7.10644C6.72195 28 6.342 27.9169 5.99263 27.7564C5.64326 27.5959 5.33275 27.3617 5.08237 27.0699C4.83199 26.7781 4.64767 26.4356 4.54205 26.0659C4.43642 25.6962 4.412 25.308 4.47044 24.928L6.31711 12.928C6.41397 12.2981 6.73321 11.7238 7.21701 11.3089C7.7008 10.8941 8.31715 10.6663 8.95444 10.6667H23.0451C23.6822 10.6666 24.2982 10.8946 24.7817 11.3094C25.2652 11.7242 25.5829 12.2983 25.6798 12.928Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="catalog-title-head__text">Магазины</div>
                            </div>
                            <div class="catalog-title-head <?php if(in_array('food', $typesList)) { echo "--show"; } ?>" data-title="food">
                                <div class="catalog-title-head__icon --yellow">
                                    <svg width="32" height="33" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18.6665 12.5133L18.6798 12.4986M10.6665 11.18L10.6798 11.1653M10.6665 19.1799L10.6798 19.1653" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.99994 25.8334L2.98128 4.50542C2.94915 4.36906 2.9534 4.22666 2.99359 4.09245C3.03378 3.95825 3.10851 3.83696 3.2103 3.7407C3.31209 3.64445 3.43737 3.57661 3.5736 3.54398C3.70984 3.51135 3.85226 3.51506 3.98661 3.55475L25.3333 9.83342" stroke="white" stroke-width="1.5"/>
                                        <path d="M29.5971 11.7333C29.6715 11.436 29.6867 11.1269 29.6416 10.8237C29.5966 10.5206 29.4923 10.2293 29.3347 9.96641C29.1771 9.70356 28.9693 9.47432 28.723 9.29179C28.4768 9.10927 28.1971 8.97702 27.8998 8.9026C27.6025 8.82819 27.2934 8.81306 26.9903 8.85809C26.6871 8.90311 26.3958 9.00741 26.1329 9.16502C25.8701 9.32263 25.6408 9.53047 25.4583 9.77668C25.2758 10.0229 25.1435 10.3026 25.0691 10.5999C24.5478 12.6906 22.5358 15.9999 19.4331 19.0999C16.3665 22.1679 12.5691 24.6919 8.80912 25.5599C8.50683 25.6251 8.22052 25.7498 7.96683 25.9266C7.71314 26.1034 7.49713 26.3289 7.33136 26.59C7.16559 26.8511 7.05336 27.1425 7.0012 27.4473C6.94904 27.7521 6.958 28.0642 7.02754 28.3655C7.09708 28.6669 7.22583 28.9513 7.40629 29.2025C7.58675 29.4536 7.81533 29.6663 8.07874 29.8283C8.34215 29.9903 8.63513 30.0984 8.94066 30.1461C9.24619 30.1939 9.55817 30.1805 9.85845 30.1066C14.7651 28.9746 19.3011 25.8319 22.7331 22.3999C26.1318 19.0013 28.7865 14.9759 29.5971 11.7333Z" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                                    </svg>
                                </div>
                                <div class="catalog-title-head__text">Где поесть</div>
                            </div>
                            <div class="catalog-title-head <?php if(in_array('services', $typesList)) { echo "--show"; } ?>" data-title="services">
                                <div class="catalog-title-head__icon --blue">
                                    <svg width="32" height="33" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.9998 15.1667V24.5M19.9998 15.1667V24.5M18.6664 7.16667C18.6664 6.45942 18.3855 5.78115 17.8854 5.28105C17.3853 4.78095 16.707 4.5 15.9998 4.5C15.2925 4.5 14.6143 4.78095 14.1142 5.28105C13.6141 5.78115 13.3331 6.45942 13.3331 7.16667M25.6798 13.428L27.5264 25.428C27.5848 25.8078 27.5605 26.1957 27.455 26.5652C27.3495 26.9348 27.1655 27.2771 26.9154 27.5689C26.6653 27.8606 26.3551 28.0948 26.0061 28.2556C25.657 28.4163 25.2774 28.4997 24.8931 28.5H7.10644C6.72195 28.5 6.342 28.4169 5.99263 28.2564C5.64326 28.0959 5.33275 27.8617 5.08237 27.5699C4.83199 27.2781 4.64767 26.9356 4.54205 26.5659C4.43642 26.1962 4.412 25.808 4.47044 25.428L6.31711 13.428C6.41397 12.7981 6.73321 12.2238 7.21701 11.8089C7.7008 11.3941 8.31715 11.1663 8.95444 11.1667H23.0451C23.6822 11.1666 24.2982 11.3946 24.7817 11.8094C25.2652 12.2242 25.5829 12.7983 25.6798 13.428Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="catalog-title-head__text">Услуги</div>
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
                        <div class="lds-ellipsis--container">
                            <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
                        </div>
                        <div class="catalog-cards">
                            <?php
                            if($query->have_posts()) {
                                while($query->have_posts()) {
                                $query->the_post();
                                $postLogo = get_field('shop_logo');
                                $postFloor = get_field('shop_floor');
                                $postTags = [];
                                $postTags = array_merge($postTags, wp_get_post_terms($post->ID, 'shop_type'));
                                $postTags = array_merge($postTags, wp_get_post_terms($post->ID, 'food_type'));
                                $postTags = array_merge($postTags, wp_get_post_terms($post->ID, 'services_type'));
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
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php get_footer('empty'); ?>
</body>
</html>
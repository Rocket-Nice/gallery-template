<?php
/*
Template Name: Map
*/
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
		<title>Карта</title>
		<script type="module" crossorigin src="<?= get_template_directory_uri()?>/map/mapplic.js"></script>
		<script type="module" crossorigin src="<?= get_template_directory_uri()?>/map/main.js"></script>
		<link rel="stylesheet" href="<?= get_template_directory_uri()?>/map/mapplic.css">
		<link rel="preload" href="/wp-content/themes/gallery/assets/fonts/Lato-Medium.woff2" as="font" crossorigin>
    	<link rel="preload" href="/wp-content/themes/gallery/assets/fonts/Lato-Regular.woff2" as="font" crossorigin>
	</head>
	<body>
		<main>
			<a href="/" class="header-logo <?php if(is_front_page() || is_page_template('template-about.php')) echo('--reverse') ?>">
				<img src="<?php bloginfo('template_url'); ?>/assets/icons/black-logo.svg" width="161" height="68" decoding= "async" alt="">
			</a>
			<div class="sidebar-buttons-tab">
				<div class="sidebar-tabs">
					<a href="/catalog-open" class="sidebar-tabs__item">
						<div class="sidebar-tabs__icon">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M13.9998 5C13.9998 4.46957 13.7891 3.96086 13.414 3.58579C13.039 3.21071 12.5303 3 11.9998 3C11.4694 3 10.9607 3.21071 10.5856 3.58579C10.2105 3.96086 9.99983 4.46957 9.99983 5M19.2598 9.696L20.6448 18.696C20.6886 18.9808 20.6704 19.2718 20.5913 19.5489C20.5122 19.8261 20.3741 20.0828 20.1865 20.3016C19.999 20.5204 19.7663 20.6961 19.5045 20.8167C19.2428 20.9372 18.958 20.9997 18.6698 21H5.32983C5.04146 21 4.7565 20.9377 4.49447 20.8173C4.23245 20.6969 3.99956 20.5212 3.81177 20.3024C3.62399 20.0836 3.48575 19.8267 3.40653 19.5494C3.32732 19.2721 3.309 18.981 3.35283 18.696L4.73783 9.696C4.81048 9.22359 5.04991 8.79282 5.41275 8.4817C5.7756 8.17059 6.23787 7.9997 6.71583 8H17.2838C17.7616 7.99994 18.2236 8.17094 18.5863 8.48203C18.9489 8.79312 19.1872 9.22376 19.2598 9.696Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</div>
						<div class="sidebar-tabs__text">Списком</div>
					</a>
					<div class="sidebar-tabs__item --active">
						<div class="sidebar-tabs__icon">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M20 10C20 14.418 12 22 12 22C12 22 4 14.418 4 10C4 7.87827 4.84285 5.84344 6.34315 4.34315C7.84344 2.84285 9.87827 2 12 2C14.1217 2 16.1566 2.84285 17.6569 4.34315C19.1571 5.84344 20 7.87827 20 10Z" stroke="white" stroke-width="1.5"/>
								<path d="M12 11C12.2652 11 12.5196 10.8946 12.7071 10.7071C12.8946 10.5196 13 10.2652 13 10C13 9.73478 12.8946 9.48043 12.7071 9.29289C12.5196 9.10536 12.2652 9 12 9C11.7348 9 11.4804 9.10536 11.2929 9.29289C11.1054 9.48043 11 9.73478 11 10C11 10.2652 11.1054 10.5196 11.2929 10.7071C11.4804 10.8946 11.7348 11 12 11Z" fill="white" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</div>
						<div class="sidebar-tabs__text">Карта</div>
					</div>
				</div>
			</div>
			<div class="sidebar-arrow-wrapper">
				<div class="sidebar-arrow">
					<img src="<?php bloginfo('template_url'); ?>/assets/icons/sidebar-arrow.svg" width="8" height="14" decoding= "async" alt="">
				</div>
			</div>
			<div class="title-sidebar-icons-wrapper">
				<div class="title-sidebar-icon" data-icon="1">
					<img src="<?php bloginfo('template_url'); ?>/assets/icons/shop-icon.svg" width="24" height="24" decoding= "async" alt="">
				</div>
				<div class="title-sidebar-icon" data-icon="2">
					<img src="<?php bloginfo('template_url'); ?>/assets/icons/food-icon.svg" width="24" height="24" decoding= "async" alt="">
				</div>
				<div class="title-sidebar-icon" data-icon="3">
					<img src="<?php bloginfo('template_url'); ?>/assets/icons/services-icon.svg" width="24" height="24" decoding= "async" alt="">
				</div>
				<div class="title-sidebar-icon" data-icon="4">
					<img src="<?php bloginfo('template_url'); ?>/assets/icons/shop-icon.svg" width="24" height="24" decoding= "async" alt="">
				</div>
				<div class="title-sidebar-icon" data-icon="5">
					<img src="<?php bloginfo('template_url'); ?>/assets/icons/shop-icon.svg" width="24" height="24" decoding= "async" alt="">
				</div>
				<div class="title-sidebar-icon" data-icon="6">
					<img src="<?php bloginfo('template_url'); ?>/assets/icons/shop-icon.svg" width="24" height="24" decoding= "async" alt="">
				</div>
				<div class="title-sidebar-icon" data-icon="7">
					<img src="<?php bloginfo('template_url'); ?>/assets/icons/shop-icon.svg" width="24" height="24" decoding= "async" alt="">
				</div>
			</div>
			<div id="content">
				<mapplic-map id="map" data-json="<?= get_template_directory_uri()?>/map/data.json"></mapplic-map>
			</div>
		</main>
	</body>
</html>
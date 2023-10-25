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
		<div id="content">
			<mapplic-map id="map" data-json="<?= get_template_directory_uri()?>/map/data.json"></mapplic-map>
		</div>
		
	</body>
</html>
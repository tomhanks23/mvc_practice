<!DOCTYPE html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui" />
	<title>Mom&Kids</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/shop-homepage.css" rel="stylesheet">

	<!-- Main CSS -->
	<link rel="stylesheet" href="css/styles.css">

	<!-- Payload CSS -->
	<?php echo Payload::get_css(); ?>

	<!-- Modernizr -->
	<!-- <script src="/mvc_practice/bower_components/modernizr/modernizr.js"></script> -->

</head>
<body>

	<div class="page">
		<?php echo $primary_header; ?>
		<?php echo $main_content; ?>
	</div>

	<!-- Include Common Scripts -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script> 

	<!-- <script src="/mvc_practice/bower_components/jquery/dist/jquery.js"></script> -->
	<script src="/mvc_practice/bower_components/ReptileForms/dist/reptileforms.js"></script>

	<!-- Get JS -->
	<script>var app = {};app.settings=<?php echo Payload::get_settings(); ?>;</script>
	<?php echo Payload::get_js(); ?>
	
	<!-- Main JS -->
	<script src="js/main.js"></script>

</body>
</html>
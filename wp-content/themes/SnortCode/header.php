<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

	
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/nano.min.css"/> <!-- 'nano' theme -->

		<script src="https://cdn.jsdelivr.net/npm/qr-code-styling/lib/qr-code-styling.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js"></script>

		<?php wp_head(); ?>
		
	</head>


	<body>
		<div id="page-wrapper" class="clearfix">
			<header class="clearfix">
				<div class="inner-wrapper">
					<?php blankie_nav(); ?>
					
					<?php if (is_user_logged_in()) {
						?>
						<div id="user-menu-toggle"><span><?php echo get_user_initials(); ?></span></div>
						<div id="user-account-menu">
							<?php blankie_user_nav(); ?>
							<a href="#" id="snortcode-logout">Logout</a>
						</div>
					<?php } else { ?>
						<a href="<?php echo get_home_url(); ?>/create-account" class="button-aqua" id="header-signup">Sign Up</a>
						<a href="<?php echo get_home_url(); ?>/login" class="button-gray" id="header-login">Login</a>
					<?php } ?>
				</div>
				
			</header>
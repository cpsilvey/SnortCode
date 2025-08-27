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
			<header>
				<div id="header-logo"></div>
				<div id="header-user">
					<div id="header-user-monogram">
					</div>
					<?php
						$user = wp_get_current_user();
						$first = $user->user_firstname;
  						$last = $user->user_lastname;
						?>
						<p><?php echo $first . ' ' . $last; ?></p>
						<a href="#" id="logout-submit">Logout</a>
				</div>
				<ul>
					<li><a href="<?php echo get_home_url(); ?>"><i class="icon-dashboard"></i><span>Dashboard</span></a></li>
					<li><a href="<?php echo get_home_url() . '/my-codes'; ?>"><i class="icon-codes"></i><span>My Codes</a></span></li>
					<li><a href="<?php echo get_home_url() . '/my-profile'; ?>"><i class="icon-profile"></i><span>My Profile</a></span></li>
				</ul>
			</header>

			<div class="inner-wrapper" class="clearfix">
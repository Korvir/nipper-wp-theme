<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<!-- <link href="//www.google-analytics.com" rel="dns-prefetch"> -->
        <!-- <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon"> -->
        <!-- <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed"> -->

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<link rel="preconnect" href="https://fonts.gstatic.com">

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

	<?php
	global $SVG;
	if ( function_exists('get_field') )
	{
		$site_logo = get_field( 'site_logo', 'options');
	}
	?>

		<header id="header"
				class="header clear bg-white d-flex align-items-center position-sticky shadow-sm"
				role="banner">

			<div class="container">
				<div class="row">

					<div class="col-6 col-lg-4 d-flex align-items-center justify-content-start">
						<div class="logo">
							<a href="<?php echo home_url(); ?>">
								<img src="<?php echo $site_logo['sizes']['medium'] ?>"
									 class="site_logo w-100 lazyloaded"
									 alt="Logo"
									 loading="lazy" >
							</a>
						</div>
					</div>

					<div class="col-lg-4 d-none d-lg-flex align-items-center justify-content-center " >
						<nav class="nav" role="navigation">
							<?php header_menu(); ?>
						</nav>
					</div>

					<div class="col-5 col-lg-4 d-flex align-items-center justify-content-end">
						<?php echo lang_switcher() ?>
					</div>

					<div class="col-1 p-0 pr-2 d-lg-none d-flex  align-items-center justify-content-center">
						<div id="toggle-mobile-menu" class="mobile-menu-toggle">
							<?php echo $SVG['mobile_menu'] ?>
						</div>
					</div>

				</div>
			</div>

		</header>


		<div class="mobile-menu">
			<div class="mobile-menu-wrap">
				<div class="top-bar w-100">

					<a href="<?php echo home_url(); ?>">
						<img src="<?php echo $site_logo['sizes']['medium'] ?>"
							 class="site_logo"
							 alt="Logo"
							 loading="lazy" >
					</a>
					<div class="mobile-menu--close" id="toggle-mobile-menu--close">
						<?php echo $SVG['mobile_close'] ?>
					</div>

				</div>

				<?php header_menu(); ?>

				<div class="lang_mobile w-100">
					<?php echo lang_switcher() ?>
				</div>
			</div>
		</div>


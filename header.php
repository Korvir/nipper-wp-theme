<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title( '' ); ?><?php if ( wp_title( '', false ) ) {
			echo ' :';
		} ?><?php bloginfo( 'name' ); ?></title>

	<!-- <link href="//www.google-analytics.com" rel="dns-prefetch"> -->
	<!-- <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon"> -->
	<!-- <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed"> -->

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php bloginfo( 'description' ); ?>">

	<link rel="preconnect" href="https://fonts.gstatic.com">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
		  integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
global $SVG;
if ( function_exists( 'get_field' ) ) {
	$site_logo = get_field( 'site_logo', 'options' );
}
?>

<header id="header"
		class="header py-3 py-lg-0 clear bg-white d-flex align-items-center position-sticky shadow-sm"
		role="banner">

	<div class="container">
		<div class="row">

			<div class="col-6 col-lg-3 d-flex align-items-center justify-content-start">
				<div class="logo">
					<a href="<?php echo home_url(); ?>">
						<img src="<?php echo $site_logo['sizes']['medium'] ?>"
							 class="site_logo w-100 lazyloaded"
							 alt="Logo"
							 loading="lazy">
					</a>
				</div>
			</div>

			<div class="col-lg-7 d-none d-lg-flex align-items-center justify-content-center ">
				<nav class="nav" role="navigation">
					<?php header_menu(); ?>
				</nav>
			</div>

			<div class="col-5 col-lg-2 d-flex align-items-center justify-content-end">
				<?php echo lang_switcher() ?>
			</div>

			<div class="col-1 p-0 pr-2 d-lg-none d-flex align-items-center justify-content-center">
				<div id="toggle-mobile-menu" class="mobile-menu-toggle">
					<?php echo $SVG['mobile_menu'] ?>
				</div>
			</div>

		</div>


	</div>

</header>



<div class="restoran-menu-block">

	<section class="restoran-menu-block--btn">
		<div class="container d-lg-none">
			<div class="row d-flex align-items-center justify-content-center">
				<button class="navbar-toggler restoran-menu-btn collapsed"
						type="button"
						data-toggle="collapse"
						data-target="#mobileMenuContent"
						aria-controls="mobileMenuContent"
						aria-expanded="false"
						aria-label="Toggle navigation">
					<?php
					switch ( wpm_get_language() ) {
						case 'uk':
							$menu_btn_translate = 'Меню';
							break;
						case 'en':
							$menu_btn_translate = 'Menu';
							break;
						default:
							$menu_btn_translate = 'Меню';
					}
					echo $menu_btn_translate;
					?>
				</button>
			</div>
		</div>
	</section>

	<section class="restoran-menu-block--menu">
		<div class="container d-lg-none">
			<div class="row">
				<div class="collapse navbar-collapse" id="mobileMenuContent">
					<?php restoran_menu(); ?>
				</div>
			</div>
		</div>
	</section>

</div>


<div class="mobile-menu">
	<div class="mobile-menu-wrap">
		<div class="top-bar w-100">

			<a href="<?php echo home_url(); ?>">
				<img src="<?php echo $site_logo['sizes']['medium'] ?>"
					 class="site_logo"
					 alt="Logo"
					 loading="lazy">
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



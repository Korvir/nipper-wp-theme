<?php
/* Template Name: Главная страница */
get_header();
global $SVG;

if ( function_exists('get_fields') ){
	$home_fields = get_fields();
}

?>

	<main role="main" class="homepage">


		<section class="homepage-banner" id="about_us">
			<div class="container-fluid px-0 overflow-hidden">
				<div class="row d-flex flex-column flex-lg-row">
					<div class="homepage-banner--content text-center d-flex flex-column align-items-center justify-content-center col-12 col-lg-6">
						<div class="text-wrapper">
							<?php echo $home_fields['banner-content'] ?>
						</div>
						<div class="quotes w-100  d-flex align-items-center justify-content-center justify-content-lg-end">
							<?php echo $SVG['quotes'] ?>
						</div>
					</div>
					<div class="homepage-banner--image p-0 col-12 col-lg-6">
						<div class="image-overlay">
							<img src="<?php echo $home_fields['banner-image']['sizes']['thumbnail'] ?>"
								 data-src="<?php echo $home_fields['banner-image']['sizes']['large'] ?>"
								 class="site_logo w-100 blur-up lazyload"
								 alt="Logo"
								 loading="lazy" >
						</div>
					</div>
				</div>
			</div>
		</section>


		<section class="homepage-restaurant-menu block-restaurant-menu" id="restaurant_menu">
			<?php if ( have_rows('flexible_contents' ) ) : ?>
				<?php
				while( have_rows('flexible_contents') ) :

					the_row();
					$layout = get_row_layout();
					$inclusion = get_template_directory() . DIRECTORY_SEPARATOR . "flexible-contents" . DIRECTORY_SEPARATOR ."{$layout}.php";

					if( file_exists( $inclusion ) )
					{
						echo '<div class="homepage-restaurant-menu--wrapper w-100">';
						include( $inclusion );
						echo '</div>';
					}

				endwhile;
				?>
			<?php endif; ?>
		</section>


	</main>

<?php get_footer(); ?>

<?php

if ( function_exists( 'get_field' ) ) {
	$anchor         = get_sub_field( 'anchor' );
	$time           = get_sub_field( 'time' );
	$main_col_id    = get_sub_field( 'column_tax_title' );
	$main_col_posts = get_sub_field( 'column_tax_posts' );
	$price_currency = get_field( 'main_currency_symbol', 'options' );
}

$cur_lang = wpm_get_language();
?>

<div class="homepage-restaurant-menu--wrapper w-100" id="<?php echo $anchor ?>">
	<div class="container one-columns-part">
		<div class="row">

			<?php if ( $main_col_id ) : ?>

				<?php
				$tax_obj       = get_term_by( 'term_taxonomy_id', $main_col_id );
				?>

				<div class="col-12 d-flex px-xxl-5 flex-wrap align-items-start justify-content-start">
					<span class="mb-1">
						<?php
						if ( isset( $time ) && ! empty( $time ) ) {
							echo $time;
						}
						?>
					</span>
					<h2 class="w-100"> <?php echo $tax_obj->name ?> </h2>
				</div>

				<?php if ( $main_col_posts ) : ?>
					<?php foreach ( $main_col_posts as $s_post ) :
						$weight = get_field( 'weight', $s_post->ID );
						$price = get_field( 'price', $s_post->ID );
						?>
						<div class="single-restaurant-product px-xxl-5 col-12 col-lg-6 d-flex align-items-start justify-content-center">

							<div class="info">
								<div class="info-row d-flex align-items-start justify-content-between">
									<h4> <?php echo wpm_translate_string( $s_post->post_title, $cur_lang ) ?> </h4>
									<div class="price">
										<?php
										echo wpm_translate_string( $price, $cur_lang ) . ' ' . '<span class="currency">' . wpm_translate_string( $price_currency, $cur_lang ) . '<span>';
										?>
									</div>
								</div>

								<?php if ( ! empty( $s_post->post_content ) ) : ?>
									<div class="single-restaurant-product--content">
										<?php echo wpm_translate_string( $s_post->post_content, $cur_lang ); ?>
									</div>
								<?php endif; ?>

								<p class="single-restaurant-product--weight">
									<?php
									echo wpm_translate_string( $weight, $cur_lang );
									?>
								</p>
							</div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>

			<?php endif; ?>

		</div>
	</div>
</div>

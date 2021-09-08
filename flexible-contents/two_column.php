<?php
if ( function_exists( 'get_field' ) )
{
	$anchor			= get_sub_field( 'anchor' );

	$time_1_left			= get_sub_field( 'time_1_left' );
	$time_2_left			= get_sub_field( 'time_2_left' );

	$time_1_right			= get_sub_field( 'time_1_right' );
	$time_2_right			= get_sub_field( 'time_2_right' );

	$left_col_id  = get_sub_field( 'left_column_tax_title' );
	$right_col_id = get_sub_field( 'right_column_tax_title' );

	$left_col_posts  = get_sub_field( 'left_column_tax_posts' );
	$right_col_posts = get_sub_field( 'right_column_tax_posts' );

	$price_currency = get_field( 'main_currency_symbol', 'options' );

}
$cur_lang = wpm_get_language();
?>

<div class="homepage-restaurant-menu--wrapper w-100" id="<?php echo $anchor ?>">
	<div class="container two-columns-part" >
		<div class="row">

			<?php if ( $left_col_id ) : ?>
				<div class="col-12 col-lg-6 px-xxl-5 d-flex flex-column align-items-start justify-content-start ">
					<?php
					$tax_obj = get_term_by( 'term_taxonomy_id', $left_col_id );
					?>

					<p class="w-100 m-0 mb-1">
						<?php if ( isset( $time_1_left ) && ! empty( $time_1_left ) ) { echo $time_1_left; } ?>
					</p>
					<p class="w-100 m-0 mb-1">
						<?php if ( isset( $time_2_left ) && ! empty( $time_2_left ) ) { echo $time_2_left; } ?>
					</p>

					<h2> <?php echo $tax_obj->name ?> </h2>

					<?php if ( $left_col_posts ) : ?>
						<?php foreach ( $left_col_posts as $key => $s_post ) : ?>
							<div class="single-restaurant-product w-100 d-flex align-items-start justify-content-center">
								<?php
								$weight = get_field( 'weight', $s_post->ID );
								$price  = get_field( 'price', $s_post->ID );
								?>
								<div class="info w-100">
									<div class="info-row w-100 d-flex align-items-start justify-content-between">
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

									<div class="single-restaurant-product--weight d-flex ">
										<?php echo wpm_translate_string( $weight, $cur_lang );; ?>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>

				</div>
			<?php endif; ?>


			<?php if ( $right_col_id ) : ?>
				<div class="col-12 col-lg-6 px-xxl-5 d-flex flex-column align-items-start justify-content-start ">
					<?php
					$tax_obj = get_term_by( 'term_taxonomy_id', $right_col_id );
					?>

					<p class="w-100 m-0 mb-1">
						<?php if ( isset( $time_1_right ) && ! empty( $time_1_right ) ) { echo $time_1_right; } ?>
					</p>
					<p class="w-100 m-0 mb-1">
						<?php if ( isset( $time_2_right ) && ! empty( $time_2_right ) ) { echo $time_2_right; } ?>
					</p>

					<h2> <?php echo $tax_obj->name ?> </h2>

					<?php if ( $right_col_posts ) :
						$counter = count( $right_col_posts );
						?>
						<?php foreach ( $right_col_posts as $key => $s_post ) :
						$class = $counter - 1 == $key ? 'mb-0' : '';
						?>
						<div class="single-restaurant-product w-100 d-flex align-items-start justify-content-center <?= $class ?> ">
							<?php
							$weight = get_field( 'weight', $s_post->ID );
							$price  = get_field( 'price', $s_post->ID );
							?>

							<div class="info w-100">
								<div class="info-row w-100 d-flex align-items-start justify-content-between">
									<h4> <?php echo wpm_translate_string( $s_post->post_title, $cur_lang ); ?> </h4>
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

								<div class="single-restaurant-product--weight d-flex">
									<?php echo wpm_translate_string( $weight, $cur_lang );; ?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
					<?php endif; ?>
				</div>
			<?php endif; ?>

		</div>
	</div>
</div>


<?php
$main_col_id    = get_sub_field( 'column_tax_title' );
$price_currency = get_field( 'main_currency_symbol', 'options' );
?>


<div class="container one-columns-part">
	<div class="row">

		<?php if ( $main_col_id ) : ?>
			<div class="col-12 px-xxl-5 d-flex flex-wrap align-items-start justify-content-start">
				<?php
				$tax_obj = get_term_by( 'term_taxonomy_id', $main_col_id );
				$query_m = new WP_Query( [
						'post_type'      => 'restaurant_product',
						'posts_per_page' => - 1,
						'tax_query'      => array(
								array(
										'taxonomy' => 'production_cats',
										'field'    => 'id',
										'terms'    => $main_col_id
								)
						)
				] );
				?>

				<h2 class="w-100"> <?php echo $tax_obj->name ?> </h2>

				<?php if ( $query_m->posts ) : ?>
					<?php foreach ( $query_m->posts as $s_post ) : ?>
						<div class="single-restaurant-product col-12 col-lg-6 pl-0 pr-xl-5 d-flex align-items-start justify-content-center">

							<div class="info">
								<h4> <?php echo $s_post->post_title ?> </h4>
								<div class="single-restaurant-product--content">
									<?php echo $s_post->post_content ?>
								</div>
								<p class="single-restaurant-product--weight">
									<?php
									$weight = get_field( 'weight', $s_post->ID );
									echo $weight;
									?>
								</p>
							</div>
							<div class="price">
								<?php
								$price = get_field( 'price', $s_post->ID );
								echo $price . ' ' . $price_currency;
								?>
							</div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>

			</div>
		<?php endif; ?>

	</div>
</div>


<?php
$left_col_id    = get_sub_field( 'left_column_tax_title' );
$right_col_id   = get_sub_field( 'right_column_tax_title' );
$price_currency = get_field( 'main_currency_symbol', 'options' );
?>


<div class="container two-columns-part">
	<div class="row">

		<?php if ( $left_col_id ) : ?>
			<div class="col-12 col-lg-6 px-xxl-5 d-flex flex-column align-items-start justify-content-start ">
				<?php
				$tax_obj = get_term_by( 'term_taxonomy_id', $left_col_id );
				$query_l = new WP_Query( [
						'post_type'      => 'restaurant_product',
						'posts_per_page' => - 1,
						'tax_query'      => array(
								array(
										'taxonomy' => 'production_cats',
										'field'    => 'id',
										'terms'    => $left_col_id
								)
						)
				] );
				?>

				<h2> <?php echo $tax_obj->name ?> </h2>

				<?php if ( $query_l->posts ) : ?>
					<?php foreach ( $query_l->posts as $key => $s_post ) : ?>
						<div class="single-restaurant-product w-100 d-flex align-items-start justify-content-center">
							<?php
							$weight = get_field( 'weight', $s_post->ID );
							$price 	= get_field( 'price', $s_post->ID );
							?>
							<div class="info">
								<h4> <?php echo $s_post->post_title ?> </h4>
								<div class="single-restaurant-product--content">
									<?php echo $s_post->post_content ?>
								</div>
								<div class="single-restaurant-product--weight d-flex ">
									<?php echo $weight; ?>
<!--									<h3 class="d-flex align-items-center ml-3 d-lg-none"> --><?php //echo $price . ' ' . $price_currency; ?><!--</h3>-->
								</div>
							</div>
							<div class="price">
								<?php
								echo $price . ' ' . '<span class="currency">' . $price_currency . '<span>';
								?>
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
				$query_r = new WP_Query( [
						'post_type'      => 'restaurant_product',
						'posts_per_page' => - 1,
						'tax_query'      => array(
								array(
										'taxonomy' => 'production_cats',
										'field'    => 'id',
										'terms'    => $right_col_id
								)
						)
				] );
				$counter = $query_r->post_count;
				?>

				<h2> <?php echo $tax_obj->name ?> </h2>

				<?php if ( $query_r->posts ) : ?>
					<?php foreach ( $query_r->posts as $key => $s_post ) :
						$class = $counter-1 == $key ? 'mb-0' : '';
						?>
						<div class="single-restaurant-product w-100 d-flex align-items-start justify-content-center <?= $class ?> ">
							<?php
							$weight = get_field( 'weight', $s_post->ID );
							$price = get_field( 'price', $s_post->ID );
							?>

							<div class="info">
								<h4> <?php echo $s_post->post_title ?> </h4>
								<div class="single-restaurant-product--content">
									<?php echo $s_post->post_content ?>
								</div>
								<div class="single-restaurant-product--weight d-flex">
									<?php echo $weight; ?>
<!--									<h3 class="d-flex align-items-center ml-3 d-lg-none"> --><?php //echo $price . ' ' . $price_currency; ?><!--</h3>-->
								</div>
							</div>
							<div class="price">
								<?php
								echo $price . ' ' . '<span class="currency">' . $price_currency . '<span>';
								?>
							</div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		<?php endif; ?>

	</div>
</div>


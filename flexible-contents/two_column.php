<?php
$left_col_id    = get_sub_field( 'left_column_tax_title' );
$right_col_id   = get_sub_field( 'right_column_tax_title' );

$left_col_posts    = get_sub_field( 'left_column_tax_posts' );
$right_col_posts   = get_sub_field( 'right_column_tax_posts' );

$price_currency = get_field( 'main_currency_symbol', 'options' );
?>


<div class="container two-columns-part">
	<div class="row">

		<?php if ( $left_col_id ) : ?>
			<div class="col-12 col-lg-6 px-xxl-5 d-flex flex-column align-items-start justify-content-start ">
				<?php
				$tax_obj = get_term_by( 'term_taxonomy_id', $left_col_id );
				?>

				<h2> <?php echo $tax_obj->name ?> </h2>

				<?php if ( $left_col_posts ) : ?>
					<?php foreach ( $left_col_posts as $key => $s_post ) : ?>
						<div class="single-restaurant-product w-100 d-flex align-items-start justify-content-center">
							<?php
							$weight = get_field( 'weight', $s_post->ID );
							$price 	= get_field( 'price', $s_post->ID );
							?>
							<div class="info w-100">
								<div class="info-row w-100 d-flex align-items-start justify-content-between">
									<h4> <?php echo $s_post->post_title ?> </h4>
									<div class="price">
										<?php
										echo $price . ' ' . '<span class="currency">' . $price_currency . '<span>';
										?>
									</div>
								</div>
								<div class="single-restaurant-product--content">
									<?php echo $s_post->post_content ?>
								</div>
								<div class="single-restaurant-product--weight d-flex ">
									<?php echo $weight; ?>
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
				$counter = count( $right_col_posts );
				?>

				<h2> <?php echo $tax_obj->name ?> </h2>

				<?php if ( $right_col_posts ) : ?>
					<?php foreach ( $right_col_posts as $key => $s_post ) :
						$class = $counter-1 == $key ? 'mb-0' : '';
						?>
						<div class="single-restaurant-product w-100 d-flex align-items-start justify-content-center <?= $class ?> ">
							<?php
							$weight = get_field( 'weight', $s_post->ID );
							$price = get_field( 'price', $s_post->ID );
							?>

							<div class="info w-100">
								<div class="info-row w-100 d-flex align-items-start justify-content-between">
									<h4> <?php echo $s_post->post_title ?> </h4>
									<div class="price">
										<?php
										echo $price . ' ' . '<span class="currency">' . $price_currency . '<span>';
										?>
									</div>
								</div>
								<div class="single-restaurant-product--content">
									<?php echo $s_post->post_content ?>
								</div>
								<div class="single-restaurant-product--weight d-flex">
									<?php echo $weight; ?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		<?php endif; ?>

	</div>
</div>


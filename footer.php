		<?php
		global $SVG;
		$footer_big_image = get_field( 'footer_big_image', 'options');
		$footer_logo = get_field( 'footer_logo', 'options');
		$footer_title = get_field( 'footer_title', 'options');
		$footer_address = get_field( 'footer_address', 'options');
		$footer_address_url = get_field( 'footer_address_url', 'options');
		$footer_phone = get_field( 'footer_phone', 'options');
		$footer_email = get_field( 'footer_email', 'options');
		$footer_work_time = get_field( 'footer_work_time', 'options');
		$social_facebook = get_field( 'social_facebook', 'options');
		$social_instagram = get_field( 'social_instagram', 'options');
		$social_linkedin = get_field( 'social_linkedin', 'options');
		$social_google = get_field( 'social_google', 'options');
		?>



		<footer class="footer" role="contentinfo">

			<div class="container-fluid px-0 overflow-hidden ">
				<div class="row d-flex flex-column-reverse flex-lg-row">

					<div class="col-12 col-lg-6">
						<div class="big_image h-100 d-flex align-items-center justify-content-center">
							<img src="<?php echo $footer_big_image['sizes']['thumbnail'] ?>"
								 data-src="<?php echo $footer_big_image['sizes']['medium'] ?>"
								 class="w-100 py-5 py-lg-0 blur-up lazyload"
								 alt="logo"
								 loading="lazy" >
						</div>
					</div>

					<div class="col-12 col-lg-6 contacts">
						<div class="contacts-inner w-100 d-flex flex-column align-items-center">

						<img src="<?php echo $footer_logo['sizes']['thumbnail'] ?>"
							 data-src="<?php echo $footer_logo['sizes']['medium'] ?>"
							 class="footer-logo w-100 blur-up lazyload"
							 alt="logo"
							 loading="lazy" >

						<h3> <?php echo $footer_title ?> </h3>

						<div class="contacts-inner-info w-100">
							<?php if ( $footer_address ) : ?>
							<p class="d-flex">
								<span class="d-inline-block svg"> <?php echo $SVG['address'] ?></span>

								<?php if ( $footer_address_url ) : ?>
									<a href="<?php echo $footer_address_url ?>">
										<?php echo $footer_address ?>
									</a>
								<?php else: ?>
									<?php echo $footer_address ?>
								<?php endif; ?>
							</p>
							<?php endif; ?>

							<?php if ( $footer_phone ) : ?>
								<p class="d-flex">
									<span class="d-inline-block svg"><?php echo $SVG['phone'] ?></span>
									<a href="<?php echo tel_href($footer_phone) ?>">
										<?php echo $footer_phone ?>
									</a>
								</p>
							<?php endif; ?>

							<?php if ( $footer_email ) : ?>
								<p class="d-flex">
									<span class="d-inline-block svg"><?php echo $SVG['email'] ?></span>
									<a href="<?php echo mail_href($footer_email) ?>">
										<?php echo $footer_email ?>
									</a>
								</p>
							<?php endif; ?>

							<?php if ( $footer_work_time ) : ?>
							<div class="d-flex w-100">
								<span class="d-inline-block svg"><?php echo $SVG['worktime'] ?></span>

								<div class=" d-flex flex-column day_time_wrap w-100">
								<?php foreach ( $footer_work_time  as $footer_work_time_day) : ?>
								<div class="day_time d-flex ">
									<time class="days"> <?php echo $footer_work_time_day['days'] ?> </time>
									<time class="time"> <?php echo $footer_work_time_day['time'] ?> </time>
								</div>
								<?php endforeach; ?>
								</div>

							</div>
						<?php endif; ?>
						</div>

						<div class="social_buttons">
							<?php if ( $social_facebook ) : ?>
								<a href=" <?= $social_facebook ?>">
									<?= $SVG['facebook'] ?>
								</a>
							<?php endif; ?>

							<?php if ( $social_instagram ) : ?>
								<a href="<?= $social_instagram ?>">
									<?= $SVG['instagram'] ?>
								</a>
							<?php endif; ?>

							<?php if ( $social_linkedin ) : ?>
								<a href="<?= $social_linkedin ?>">
									<?= $SVG['linkedin'] ?>
								</a>
							<?php endif; ?>

							<?php if ( $social_google ) : ?>
								<a href="<?= $social_google ?>">
									<?= $SVG['googleplus'] ?>
								</a>
							<?php endif; ?>
						</div>

					</div>
					</div>

				</div>
			</div>

		</footer>


		<?php wp_footer(); ?>

	</body>
</html>

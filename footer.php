		<?php
		global $SVG;
		$cur_lang    = wpm_get_language();

		if ( function_exists('get_field') )
		{
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
		}

		?>



		<footer class="footer" role="contentinfo" id="contacts">

			<div class="container ">
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
								 data-src="<?php echo $footer_logo['url'] ?>"
								 class="footer-logo w-100 blur-up lazyload"
								 alt="logo"
								 loading="lazy" >

							<h3> <?php echo wpm_translate_string( $footer_title, $cur_lang ) ?> </h3>

							<div class="contacts-inner-info w-100">

								<!-- Address-->
								<?php if ( $footer_address ) : ?>
								<p class="d-flex">
									<span class="d-flex align-items-end justify-content-start svg"> <?php echo $SVG['address'] ?></span>
									<?php if ( $footer_address_url ) : ?>
										<a href="<?php echo $footer_address_url ?>" target="_blank">
											<?php echo wpm_translate_string( $footer_address, $cur_lang ) ?>
										</a>
									<?php else: ?>
										<?php echo wpm_translate_string( $footer_address, $cur_lang ) ?>
									<?php endif; ?>
								</p>
								<?php endif; ?>
								<!-- -->

								<!-- Phone -->
								<?php if ( $footer_phone ) : ?>
									<p class="d-flex">
										<span class="d-flex align-items-end justify-content-start svg"><?php echo $SVG['phone'] ?></span>
										<a href="<?php echo tel_href($footer_phone) ?>">
											<?php echo wpm_translate_string( $footer_phone, $cur_lang ) ?>
										</a>
									</p>
								<?php endif; ?>
								<!-- -->

								<!-- Social icons------------------------------ -->
								<!-- Instagramm -->
								<?php if ( $social_instagram ) : ?>
									<p class="d-flex">
										<span class="d-flex align-items-end justify-content-start svg"><?php echo $SVG['instagram_logo'] ?></span>
										<a href="<?php echo $social_instagram['url'] ?>">
											<?php echo wpm_translate_string( $social_instagram['title'], $cur_lang ) ?>
										</a>
									</p>
								<?php endif; ?>
								<!-- -->
								<!-- Facebook -->
								<?php if ( $social_facebook ) : ?>
									<p class="d-flex">
										<span class="d-flex align-items-end justify-content-start svg"><?php echo $SVG['facebook_logo'] ?></span>
										<a href="<?php echo $social_facebook['url'] ?>">
											<?php echo wpm_translate_string( $social_facebook['title'], $cur_lang ) ?>
										</a>
									</p>
								<?php endif; ?>
								<!-- -->
								<!-- Linkedin -->
								<?php if ( $social_linkedin ) : ?>
									<p class="d-flex">
										<span class="d-flex align-items-end justify-content-start svg"><?php echo $SVG['linkedin_logo'] ?></span>
										<a href="<?php echo $social_linkedin['url'] ?>">
											<?php echo wpm_translate_string( $social_linkedin['title'], $cur_lang ) ?>
										</a>
									</p>
								<?php endif; ?>
								<!-- -->
								<!-- GooglePlus -->
								<?php if ( $social_google ) : ?>
									<p class="d-flex">
										<span class="d-flex align-items-end justify-content-start svg"><?php echo $SVG['googleplus_logo'] ?></span>
										<a href="<?php echo $social_google['url'] ?>">
											<?php echo wpm_translate_string( $social_google['title'], $cur_lang ) ?>
										</a>
									</p>
								<?php endif; ?>
								<!-- -->
								<!-- ------------------------------------------ -->

								<!-- Email -->
								<?php if ( $footer_email ) : ?>
									<p class="d-flex">
										<span class="d-flex align-items-end justify-content-start svg"><?php echo $SVG['email'] ?></span>
										<a href="<?php echo mail_href($footer_email) ?>">
											<?php echo wpm_translate_string( $footer_email, $cur_lang ) ?>
										</a>
									</p>
								<?php endif; ?>
								<!-- -->

								<!-- Worktime -->
								<?php if ( $footer_work_time ) : ?>
								<div class="d-flex w-100">
									<span class="d-flex align-items-start justify-content-start svg"><?php echo $SVG['worktime'] ?></span>

									<div class=" d-flex flex-column day_time_wrap w-100">
									<?php foreach ( $footer_work_time  as $footer_work_time_day) : ?>
									<div class="day_time d-flex ">
										<time class="days"> <?php echo wpm_translate_string( $footer_work_time_day['days'], $cur_lang ) ?> </time>
										<time class="time"> <?php echo wpm_translate_string( $footer_work_time_day['time'], $cur_lang ) ?> </time>
									</div>
									<?php endforeach; ?>
									</div>

								</div>
								<?php endif; ?>
								<!-- -->

							</div>

							<?php
							$to_display = false;
							?>




						<?php if ( $to_display ) : ?>
						<div class="social_buttons">
							<?php if ( $social_facebook ) : ?>
								<a href=" <?= $social_facebook ?>">
									<?= $SVG['facebook_logo'] ?>
								</a>
							<?php endif; ?>

							<?php if ( $social_instagram ) : ?>
								<a href="<?= $social_instagram ?>">
									<?= $SVG['instagram_logo'] ?>
								</a>
							<?php endif; ?>

							<?php if ( $social_linkedin ) : ?>
								<a href="<?= $social_linkedin ?>">
									<?= $SVG['linkedin_logo'] ?>
								</a>
							<?php endif; ?>

							<?php if ( $social_google ) : ?>
								<a href="<?= $social_google ?>">
									<?= $SVG['googleplus_logo'] ?>
								</a>
							<?php endif; ?>
						</div>
						<?php endif ?>



						</div>
					</div>

				</div>
			</div>

		</footer>


		<div class="gototop-row container">
			<button id="gototop" class="gototop-row--btn">
				<i class="fas fa-angle-up"></i>
			</button>
		</div>


		<?php
		get_template_part( '/components/modal', 'review');

		get_template_part( '/components/modal', 'response' );
		?>



		<?php wp_footer(); ?>

	</body>
</html>

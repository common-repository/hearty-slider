<?php

class HeartySliderView {

	public static function generate_view($settings_instance) {

		$options = get_option('heartyslider_options');

		$options_i = array();

		$i = 1;

		if (empty($options)) { return '<p>Please save your settings and try again.</p>'; }

		foreach ($options as $k => $v) {

			if ($i > 3) {

				$k_arr = explode('_', $k);

				if (end($k_arr) == $settings_instance) {

					$options_i[str_replace('_'.$settings_instance, '', $k)] = $v;

				}

			}

			$i++;

		}

		$number_of_content_items = 10;

		// params

		$rows_arrays = array();

		$carousel_autorun                       = $options_i['carousel_autorun'];
		$cycling_speed                          = $options_i['cycling_speed'];

		$show_title                             = $options_i['show_title'];
		$show_description                       = $options_i['show_description'];

		$caption_color                          = $options_i['caption_color'];
		$show_caption_effect                    = $options_i['show_caption_effect'];

		$title_color                            = $options_i['title_color'];
		$title_font_size                        = $options_i['title_font_size'];
		$title_line_height                      = $options_i['title_line_height'];
		$title_font_weight                      = $options_i['title_font_weight'];
		$title_margin                           = $options_i['title_margin'];

		$description_text_color                 = $options_i['description_text_color'];
		$description_text_font_size             = $options_i['description_text_font_size'];
		$description_text_line_height           = $options_i['description_text_line_height'];
		$description_text_margin                = $options_i['description_text_margin'];

		$show_mobile_title                      = $options_i['show_mobile_title'];
		$show_mobile_description                = $options_i['show_mobile_description'];
		$caption_hide                           = $options_i['caption_hide'];

		$show_arrows                            = $options_i['show_arrows'];
		$arrows_color                           = $options_i['arrows_color'];
		$arrows_bg_color                        = $options_i['arrows_bg_color'];
		$arrows_border_radius                   = $options_i['arrows_border_radius'];

		$show_indicators                        = $options_i['show_indicators'];
		$indicators_color                       = $options_i['indicators_color'];
		$indicators_active_color                = $options_i['indicators_active_color'];

		for ($j=1;$j<=$number_of_content_items;$j++) {

			${'show_slide'.$j}                      = $options_i['show_slide'.$j];

			${'upload_image'.$j}                    = $options_i['upload_image'.$j];
			${'image_alt'.$j}                       = $options_i['image_alt'.$j];
			${'image_link'.$j}                      = $options_i['image_link'.$j];
			${'image_link_target'.$j}               = $options_i['image_link_target'.$j];

			${'title_text'.$j}                      = $options_i['title_text'.$j];
			${'description_text'.$j}                = str_replace("\n", '<br />', $options_i['description_text'.$j]);

			if (${'show_slide'.$j} == 1) {
			  $rows_arrays[] =  array($j);
			}

		}

		$custom_id = rand(10000,90000);

		// end params

		ob_start();

		// html

		?>

		  <style type="text/css">

			#heartyslider-container-<?php echo $custom_id; ?> .hrty-carousel-indicators li.hrty-active {
			  background-color: <?php echo $indicators_active_color; ?>;
			}
			<?php if($show_title == 0 && $show_description == 0) : ?>
			  #heartyslider-container-<?php echo $custom_id; ?> .heartyslider-carousel .hrty-carousel-caption {
				display: none;
			  }
			<?php endif; ?>
			/* hide caption on mobile */
			@media (max-width: 767px) {

			  <?php if($show_mobile_title == 0) : ?>
				#heartyslider-container-<?php echo $custom_id; ?> .heartyslider-caption-title {
				  display: none;
				}
			  <?php endif; ?>
			  <?php if($show_mobile_description == 0) : ?>
				#heartyslider-container-<?php echo $custom_id; ?> .heartyslider-caption-description {
				  display: none;
				}
			  <?php endif; ?>
			  <?php if($show_mobile_title == 0 && $show_mobile_description == 0) : ?>
				#heartyslider-container-<?php echo $custom_id; ?> .heartyslider-carousel .hrty-carousel-caption {
				  display: none;
				}
			  <?php endif; ?>

			}
			@media (max-width: <?php echo $caption_hide; ?>) {
			  #heartyslider-container-<?php echo $custom_id; ?> .heartyslider-carousel .hrty-carousel-caption {
				display: none;
			  }
			}

		  </style>

		<div id="heartyslider-container-<?php echo $custom_id; ?>" class="hrty-row heartyslider" >

			<div id="heartyslider-carousel-<?php echo $custom_id; ?>" class="heartyslider-carousel hrty-carousel hrty-slide" data-ride="hrty-carousel" data-interval="<?php echo (($carousel_autorun == 0) ? 'false': $cycling_speed); ?>">

			  <!-- Wrapper for slides -->
			  <div id="heartyslider-slides" class="hrty-carousel-inner" role="listbox">

				<?php $l = 1; foreach ($rows_arrays as $k => $v) {

					$order = $k+1;
					$col_class = 'hrty-col-lg-12 hrty-col-md-12 hrty-col-sm-12 hrty-col-xs-12';

				?>

					<div class="hrty-item<?php echo (($order == 1) ? ' hrty-active hrty-clearfix': ''); ?>" data-order="<?php echo $order; ?>">

					  <?php // output content
					  foreach ($v as $i) {
					  ?>

					  <div class="<?php echo $col_class; ?> heartyslider<?php echo $i; ?> hrty-clearfix">

						<div class="heartyslider">

						  <div class="heartyslider-images">

							<?php if (${'upload_image'.$i}) { ?>

							  <?php // Do not receive link if the link setting is empty
								if(empty(${'image_link'.$i})) { ?>

								  <img src="<?php echo ${'upload_image'.$i}; ?>"
									alt="<?php echo ${'image_alt'.$i}; ?>"/>

								<?php } else { ?>

								  <a href="<?php echo ${'image_link'.$i}; ?>" target="_<?php echo ${'image_link_target'.$i}; ?>" >

									<img src="<?php echo ${'upload_image'.$i}; ?>"
									  alt="<?php echo ${'image_alt'.$i}; ?>"/>

								  </a>

								<?php } ?>

							<?php } else { // Demo images

								if ($l > 5) { $l = 1; }
								$image_src = 'demo-image'.$l.'.jpg';

							?>

								<?php // Do not receive link if the link setting is empty
								if(empty(${'image_link'.$i})) { ?>

								  <img src="<?php echo plugins_url('/demo/'.$image_src, __DIR__); ?>"
									  alt="<?php echo ${'image_alt'.$i}; ?>" />

								<?php } else { ?>

								  <a href="<?php echo ${'image_link'.$i}; ?>" target="_<?php echo ${'image_link_target'.$i}; ?>" >

									<img src="<?php echo plugins_url('/demo/'.$image_src, __DIR__); ?>"
										alt="<?php echo ${'image_alt'.$i}; ?>" />

								  </a>

								<?php } ?>

							<?php } ?>

						  </div>

						  <div class="heartyslider-caption heartyshow <?php echo ($show_caption_effect == 0) ? 'heartyslider-caption-effect-none' : 'heartyslider-caption-effect'; ?> <?php echo $caption_color; ?>">

							<div class="hrty-carousel-caption">

							  <?php if ($show_title == 1) { ?>

								<h3 id="heartyslider-caption-title<?php echo $i; ?>" class="heartyslider-caption-title"
									style="color: <?php echo $title_color; ?>;
										font-size: <?php echo $title_font_size; ?>;
										line-height: <?php echo $title_line_height; ?>;
										margin: <?php echo $title_margin; ?>;">

									  <?php echo ${'title_text'.$i}; ?>

								</h3>

							  <?php } ?>

							  <?php if ($show_description == 1) { ?>

								<p class="heartyslider-caption-description"
								style="color: <?php echo $description_text_color; ?>;
								  font-size: <?php echo $description_text_font_size; ?>;
								  line-height: <?php echo $description_text_line_height; ?>;
								  margin: <?php echo $description_text_margin; ?> !important;">

								  <?php echo ${'description_text'.$i}; ?>

								</p>

							  <?php } ?>

							</div>

						  </div>

						</div>

					  </div>

					  <?php $l++; } // end output content
					  ?>

					</div>

				<?php } ?>

			  </div>

			  <!-- Controls -->
			  <?php if ($show_arrows == 1) { ?>

				<div id="heartyslider-arrows">

				  <a class="hrty-left hrty-carousel-control" href="#heartyslider-carousel-<?php echo $custom_id; ?>"
					  role="button"
					  data-slide="prev">
					<i class="fas fa-angle-left" aria-hidden="true"
					  style="color: <?php echo $arrows_color; ?>;
							background-color: <?php echo $arrows_bg_color; ?>;
							-webkit-border-radius: <?php echo $arrows_border_radius; ?>;
							-moz-border-radius: <?php echo $arrows_border_radius; ?>;
							border-radius: <?php echo $arrows_border_radius; ?>"></i>
					<span class="hrty-sr-only">Previous</span>
				  </a>
				  <a class="hrty-right hrty-carousel-control" href="#heartyslider-carousel-<?php echo $custom_id; ?>"
					  role="button"
					  data-slide="next">
					<i class="fas fa-angle-right" aria-hidden="true"
					  style="color: <?php echo $arrows_color; ?>;
							background-color: <?php echo $arrows_bg_color; ?>;
							-webkit-border-radius: <?php echo $arrows_border_radius; ?>;
							-moz-border-radius: <?php echo $arrows_border_radius; ?>;
							border-radius: <?php echo $arrows_border_radius; ?>"></i>
					<span class="hrty-sr-only">Next</span>
				  </a>

				</div>

			  <?php } ?>

			  <!-- Indicators -->
			  <?php if ($show_indicators == 1) { ?>

				<div id="heartyslider-indicators" class="hrty-clearfix">

				  <ol class="hrty-carousel-indicators">

					<?php $l = 1; foreach ($rows_arrays as $k => $v) { ?>

					  <li data-target="#heartyslider-carousel-<?php echo $custom_id; ?>" hrty-data-slide-to="<?php echo $k; ?>" class="<?php echo (($k == 0) ? 'hrty-active': ''); ?> <?php echo $indicators_color; ?>"></li>

					<?php } ?>

				  </ol>

				</div>

			  <?php } ?>

			</div>

		</div>

		<?php

		// end html

		$output = ob_get_contents();

		ob_end_clean();

		return $output;

	}

}


<?php
/**
 * The template for displaying the footer.
 */

				lorem_ipsum_books_media_store_close_wrapper();	// <!-- </.content> -->

				// Show main sidebar
				get_sidebar();

				if (lorem_ipsum_books_media_store_get_custom_option('body_style')!='fullscreen') lorem_ipsum_books_media_store_close_wrapper();	// <!-- </.content_wrap> -->
				?>
			
			</div>		<!-- </.page_content_wrap> -->
			
			<?php
			// Footer Testimonials stream
			if (lorem_ipsum_books_media_store_get_custom_option('show_testimonials_in_footer')=='yes') { 
				$count = max(1, lorem_ipsum_books_media_store_get_custom_option('testimonials_count'));
				$data = lorem_ipsum_books_media_store_sc_testimonials(array('count'=>$count));
				if ($data) {
					?>
					<footer class="testimonials_wrap sc_section scheme_<?php echo esc_attr(lorem_ipsum_books_media_store_get_custom_option('testimonials_scheme')); ?>">
						<div class="testimonials_wrap_inner sc_section_inner sc_section_overlay">
							<div class="content_wrap"><?php lorem_ipsum_books_media_store_show_layout($data); ?></div>
						</div>
					</footer>
					<?php
				}
			}
			
			// Footer sidebar
			$footer_show  = lorem_ipsum_books_media_store_get_custom_option('show_sidebar_footer');
			$sidebar_name = lorem_ipsum_books_media_store_get_custom_option('sidebar_footer');
			if (!lorem_ipsum_books_media_store_param_is_off($footer_show) && is_active_sidebar($sidebar_name)) { 
				lorem_ipsum_books_media_store_storage_set('current_sidebar', 'footer');
				?>
				<footer class="footer_wrap widget_area scheme_<?php echo esc_attr(lorem_ipsum_books_media_store_get_custom_option('sidebar_footer_scheme')); ?>">
					<div class="footer_wrap_inner widget_area_inner">
						<div class="content_wrap">
							<div class="columns_wrap"><?php
							ob_start();
							do_action( 'before_sidebar' );
							if ( !dynamic_sidebar($sidebar_name) ) {
								// Put here html if user no set widgets in sidebar
							}
							do_action( 'after_sidebar' );
							$out = ob_get_contents();
							ob_end_clean();
                            lorem_ipsum_books_media_store_show_layout(chop(preg_replace("/<\/aside>[\r\n\s]*<aside/", "</aside><aside", $out)));
							?></div>	<!-- /.columns_wrap -->
						</div>	<!-- /.content_wrap -->
					</div>	<!-- /.footer_wrap_inner -->
				</footer>	<!-- /.footer_wrap -->
				<?php
			}


			// Footer Twitter stream
			if (lorem_ipsum_books_media_store_get_custom_option('show_twitter_in_footer')=='yes' && function_exists('lorem_ipsum_books_media_store_sc_twitter')) {
				$count = max(1, lorem_ipsum_books_media_store_get_custom_option('twitter_count'));
				$data = lorem_ipsum_books_media_store_sc_twitter(array('count'=>$count));
				if ($data) {
					?>
					<footer class="twitter_wrap sc_section scheme_<?php echo esc_attr(lorem_ipsum_books_media_store_get_custom_option('twitter_scheme')); ?>">
						<div class="twitter_wrap_inner sc_section_inner sc_section_overlay">
							<div class="content_wrap"><?php lorem_ipsum_books_media_store_show_layout($data); ?></div>
						</div>
					</footer>
					<?php
				}
			}


			// Google map
			if ( lorem_ipsum_books_media_store_get_custom_option('show_googlemap')=='yes' ) { 
				$map_address = lorem_ipsum_books_media_store_get_custom_option('googlemap_address');
				$map_latlng  = lorem_ipsum_books_media_store_get_custom_option('googlemap_latlng');
				$map_zoom    = lorem_ipsum_books_media_store_get_custom_option('googlemap_zoom');
				$map_style   = lorem_ipsum_books_media_store_get_custom_option('googlemap_style');
				$map_height  = lorem_ipsum_books_media_store_get_custom_option('googlemap_height');
				if (!empty($map_address) || !empty($map_latlng)) {
					$args = array();
					if (!empty($map_style))		$args['style'] = esc_attr($map_style);
					if (!empty($map_zoom))		$args['zoom'] = esc_attr($map_zoom);
					if (!empty($map_height))	$args['height'] = esc_attr($map_height);
                    if(function_exists('lorem_ipsum_books_media_store_sc_googlemap')){
                        lorem_ipsum_books_media_store_show_layout(lorem_ipsum_books_media_store_sc_googlemap($args));
                    }

				}
			}

			// Footer contacts
			if (lorem_ipsum_books_media_store_get_custom_option('show_contacts_in_footer')=='yes') { 
				$address_1 = lorem_ipsum_books_media_store_get_theme_option('contact_address_1');
				$address_2 = lorem_ipsum_books_media_store_get_theme_option('contact_address_2');
				$phone = lorem_ipsum_books_media_store_get_theme_option('contact_phone');
				$fax = lorem_ipsum_books_media_store_get_theme_option('contact_fax');
				if (!empty($address_1) || !empty($address_2) || !empty($phone) || !empty($fax)) {
					?>
					<footer class="contacts_wrap scheme_<?php echo esc_attr(lorem_ipsum_books_media_store_get_custom_option('contacts_scheme')); ?>">
						<div class="contacts_wrap_inner">
							<div class="content_wrap">
								<?php lorem_ipsum_books_media_store_show_logo(false, false, true, false, true, false); ?>
								<?php if(function_exists('lorem_ipsum_books_media_store_sc_socials')) lorem_ipsum_books_media_store_show_layout(lorem_ipsum_books_media_store_sc_socials(array('size'=>"small"))); ?>
							</div>	<!-- /.content_wrap -->
						</div>	<!-- /.contacts_wrap_inner -->
					</footer>	<!-- /.contacts_wrap -->
					<?php
				}
			}

			// Copyright area
			$copyright_style = lorem_ipsum_books_media_store_get_custom_option('show_copyright_in_footer');
			if (!lorem_ipsum_books_media_store_param_is_off($copyright_style)) {
				?> 
				<div class="copyright_wrap copyright_style_<?php echo esc_attr($copyright_style); ?>  scheme_<?php echo esc_attr(lorem_ipsum_books_media_store_get_custom_option('copyright_scheme')); ?>">
					<div class="copyright_wrap_inner">
						<div class="content_wrap">
							<?php
							if ($copyright_style == 'menu') {
								if (($menu = lorem_ipsum_books_media_store_get_nav_menu('menu_footer'))!='') {
                                    lorem_ipsum_books_media_store_show_layout($menu);
								}
							} else if ($copyright_style == 'socials' && function_exists('lorem_ipsum_books_media_store_sc_socials')) {
                                lorem_ipsum_books_media_store_show_layout(lorem_ipsum_books_media_store_sc_socials(array('size'=>"tiny")));
							} else if ($copyright_style == 'payment') {
                                echo '<div class="footer_payment_options">' . (lorem_ipsum_books_media_store_get_custom_option('footer_payments')) . '</div>';
                            }
							?>
                            <div class="copyright_text"><?php lorem_ipsum_books_media_store_show_layout(do_shortcode(str_replace(array('{{Y}}', '{Y}'), date('Y'), lorem_ipsum_books_media_store_get_custom_option('footer_copyright')))); ?>
						</div>
					</div>
				</div>
				<?php
			}
			?>
			
		</div>	<!-- /.page_wrap -->

	</div>		<!-- /.body_wrap -->
	
	<?php if ( !lorem_ipsum_books_media_store_param_is_off(lorem_ipsum_books_media_store_get_custom_option('show_sidebar_outer')) ) { ?>
	</div>	<!-- /.outer_wrap -->
	<?php } ?>

	<?php wp_footer(); ?>

</body>
</html>
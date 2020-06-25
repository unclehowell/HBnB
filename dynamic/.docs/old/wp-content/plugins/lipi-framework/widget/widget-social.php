<?php 

/******************************************
 ***  SOCIAL ***
******************************************/
class lipi__social_header_widget_call extends WP_Widget {

	function __construct() {
		parent::__construct(
			'widget_header_social_icon',
			esc_html__( 'Lipi - Social Icons', 'lipi-framework' ),
			array( 'description' => esc_html__( 'Display social icons on the theme header', 'lipi-framework' ), )
		);

	}

	public function widget( $args, $instance ) {

		$options = lipi__widget_social_icon_call();
		$defaults = lipi__widget_social_icon_option_defaults();
		$unique_id = esc_attr( $args['widget_id'] );
		$output = '';

		echo wp_kses_post($args['before_widget']);

		$new_window = ( isset( $instance['new_window'] ) && '' !== $instance['new_window'] ) ? 'target="_blank"' : $defaults['new_window'];
		$font_size = ( isset( $instance['font_size'] ) && '' !== $instance['font_size'] ) ? $instance['font_size'] : $defaults['font_size'];
		$icon_padding = ( isset( $instance['icon_padding'] ) && '' !== $instance['icon_padding'] ) ? $instance['icon_padding'] : $defaults['icon_padding'];
		$icon_box_margin = ( isset( $instance['icon_box_margin'] ) && '' !== $instance['icon_box_margin'] ) ? $instance['icon_box_margin'] : $defaults['icon_box_margin'];
		$alignment = ( isset( $instance['alignment'] ) && '' !== $instance['alignment'] ) ? $instance['alignment'] : $defaults['alignment'];
		
		$count = 0;
		foreach ( $options as $option ) {

			$input = 'input' . $count++;
			$select = 'select' . $count++;

			$id = ( ! empty( $instance[$option['id']] ) ) ? $instance[$option['id']] : '';
			$name = ( ! empty( $instance[$select] ) ) ? $instance[$select] : '';
			$value = ( ! empty( $instance[$input] ) ) ? $instance[$input] : '';

			if ( ! empty( $value ) && ! empty( $name ) ) {
				if ( is_email( $value ) ) {
					$the_value = 'mailto:' . $value;
				} elseif ( 'phone' == $name ) {
					$the_value = 'tel:' . $value;
				} elseif ( 'skype' == $name ) {
					$the_value = 'skype:' . $value;
				} else {
					$the_value = esc_url( $value );
				}

				$show_tooltip = '';
				$rel_attribute = apply_filters( 'lsi_icon_rel_attribute','rel="nofollow"' );
				$title_attribute = '';
				$accessibility = ''; 

				$output .= sprintf(
					'<li><a class="%4$s" %5$s %6$s %7$s href="%1$s" style="padding:'.$icon_padding.';" %2$s><i class="%3$s" style="font-size:'.$font_size.'px;"></i></a></li>',
					$the_value,
					'email' == $name ? '' : $new_window,
					$name,
					$show_tooltip,
					$rel_attribute,
					$title_attribute,
					$accessibility
				);

			}
		}

		if ( $output ) {
			printf(
				'<ul class="theme-social-icons icon-set-%1$s" style="margin:'.$icon_box_margin.'!important;text-align: %3$s">%2$s</ul>',
				$unique_id,
				apply_filters( 'lsi_icon_output', $output ),
				$alignment
			);
		}

		echo wp_kses_post($args['after_widget']);
	}

	public function form( $instance ) {

		$options = lipi__widget_social_icon_call();

		$defaults = lipi__widget_social_icon_option_defaults();

		$icon_padding = ( isset( $instance[ 'icon_padding' ] ) && '' !== $instance[ 'icon_padding' ] ) ? $instance[ 'icon_padding' ] : $defaults['icon_padding'];
		$icon_box_margin = ( isset( $instance[ 'icon_box_margin' ] ) && '' !== $instance[ 'icon_box_margin' ] ) ? $instance[ 'icon_box_margin' ] : $defaults['icon_box_margin'];
		$font_size = ( isset( $instance[ 'font_size' ] ) && '' !== $instance[ 'font_size' ] ) ? $instance[ 'font_size' ] : $defaults['font_size'];
		$alignment = ( isset( $instance[ 'alignment' ] ) && '' !== $instance[ 'alignment' ] ) ? $instance[ 'alignment' ] : $defaults['alignment'];
		$new_window = ( isset( $instance[ 'new_window' ] ) && '' !== $instance[ 'new_window' ] ) ? $instance[ 'new_window' ] : $defaults['new_window'];

		$c = 0;
		foreach ( $options as $option ) {
			$defaults['input' . $c++] = '';
			$defaults['select' . $c++] = '';
		}

		$instance = wp_parse_args( (array) $instance, $defaults );

		$id = $this->id;

		?>

		<p>
			<label>
				<input class="widefat" style="max-width:65px;" id="<?php echo esc_attr($this->get_field_id( 'font_size' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'font_size' )); ?>" type="text" value="<?php echo intval( $font_size ); ?>">
				<span class="pixels" style="display: inline-block;background:#efefef;position:relative;margin-left: -33px;padding: 3px 7px;">px</span>
				<?php esc_html_e( 'Icon Size', 'lipi-framework' ); ?>
			</label>
		</p>
        
        <p>
			<label>
				<input class="widefat" style="max-width:145px;" id="<?php echo esc_attr($this->get_field_id( 'icon_box_margin' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'icon_box_margin' )); ?>" type="text" value="<?php echo esc_attr($icon_box_margin); ?>">
				<?php esc_html_e( 'Icon Box Margin', 'lipi-framework' ); ?> <br>(top, right, buttom, left)
			</label>
		</p>


		<p>
			<label>
				<input class="widefat" style="max-width:145px;" id="<?php echo esc_attr($this->get_field_id( 'icon_padding' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'icon_padding' )); ?>" type="text" value="<?php echo esc_attr($icon_padding); ?>">
				<?php esc_html_e( 'Icon Padding', 'lipi-framework' ); ?> <br>(top, right, buttom, left)
			</label>
		</p>

		<hr />

		<p>
			<label>
				<input id="<?php echo esc_attr($this->get_field_id( 'new_window' )); ?>" type="checkbox" name="<?php echo esc_attr($this->get_field_name( 'new_window' )); ?>" value="1" <?php checked( 1, $new_window ); ?>/>
				<?php esc_html_e( 'Open links in new window?', 'lipi-framework' ); ?>
			</label>
		</p>

		<p>
			<select name="<?php echo esc_attr($this->get_field_name( 'alignment' ));?>" id="<?php echo esc_attr($this->get_field_id( 'alignment' ));?>">
				<option value="left" <?php selected( $instance['alignment'], 'left' ); ?>><?php _e( 'Left', 'lipi-framework' );?></option>
				<option value="center" <?php selected( $instance['alignment'], 'center' ); ?>><?php _e( 'Center', 'lipi-framework' );?></option>
				<option value="right" <?php selected( $instance['alignment'], 'right' ); ?>><?php _e( 'Right', 'lipi-framework' );?></option>
			</select>
			<?php esc_html_e( 'Alignment', 'lipi-framework' ); ?>
		</p>

		<hr />

		<ul class="social-icon-fields" style="margin-left: 0;">
			<?php
			$count = 0;
			foreach ( $options as $option ) {

				$input = 'input' . $count++;
				$select = 'select' . $count++;
				?>
				<li class="lsi-container" style="display: flex;">
					<select class="left choose-icon" name="<?php echo esc_attr($this->get_field_name( $select ));?>" id="<?php echo esc_attr($this->get_field_id( $select ));?>">
						<option value=""></option>
						<?php foreach ( $options as $option ) {  ?>
							<option value="<?php echo esc_attr($option['id']); ?>" <?php selected( $instance[$select], $option['id'] ); ?>><?php echo esc_attr($option['name']); ?></option>
						<?php } ?>
					</select>
					<input class="widefat right social-item" id="<?php echo esc_attr($this->get_field_id( $input )); ?>" name="<?php echo esc_attr($this->get_field_name( $input )); ?>" type="text" value="<?php echo esc_attr( $instance[$input] ); ?>">

				</li>
			<?php } ?>

			<button onclick="event.preventDefault();lsiAddIcon(this)" class="button add-lsi-row <?php echo esc_attr($id);?>" data-id="<?php echo esc_attr($id);?>" style="margin-bottom:10px;"><?php _e( 'Add Icon', 'lipi-framework' ); ?></button>
		</ul>

		<script>
			jQuery(document).ready(function ($) {
					$( '.social-item' ).each( function( index ) {
						if( ! $(this).val() ) {
							$( this ).parent().hide();
						}
					});

					$('.lsi-container .choose-icon').each(function(){
						$(this).change(function() {
							var select = $(this);

							if ( $(this).attr('value') == 'fas fa-phone' ) {
								$(this).next('input').attr('placeholder', '<?php _e( '1 (123)-456-7890','lipi-framework'); ?>');
							} else if ( $(this).attr('value') == 'far fa-envelope' ) {
								$(this).next().attr('placeholder', '<?php _e( 'you@yourdomain.com or http://', 'lipi-framework' ); ?>');
							} else if ( $(this).attr('value') == 'fab fa-skype' ) {
								$(this).next().attr('placeholder', '<?php _e( 'Username', 'lipi-framework' ); ?>');
							}else if ( $(this).attr('value') == '' ) {
								$(this).next().attr('placeholder','');
							} else {
								$(this).next().attr('placeholder','http://');
							}
						});
					});
				});

				function lsiAddIcon(elem) {
				   jQuery( elem ).siblings('li:hidden:first').css( 'display', 'flex' );
			   }
		</script>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$options = lipi__widget_social_icon_call();

		$instance['icon_padding'] = $new_instance['icon_padding'];
		$instance['icon_box_margin'] = $new_instance['icon_box_margin'];
		$instance['font_size'] = intval( $new_instance['font_size'] );
		$instance['new_window'] = ( isset( $instance['new_window'] ) ) ? strip_tags( $new_instance['new_window'] ) : '';
		$instance['alignment'] = strip_tags( $new_instance['alignment'] );
		$count = 0;

		foreach ( $options as $option ) {

			$input = 'input' . $count++;
			$select = 'select' . $count++;

			$instance[$select] = strip_tags( $new_instance[$select] );

			if ( 'skype' == $new_instance[$select] ) {
				$instance[$input] = strip_tags( $new_instance[$input] );
			} elseif ( 'phone' == $new_instance[$select] ) {
				$instance[$input] = strip_tags( $new_instance[$input] );
			} elseif ( 'email' == $new_instance[$select] ) {
				if ( is_email( $new_instance[$input] ) ) {
					$instance[$input] = sanitize_email( $new_instance[$input] );
				} else {
					$instance[$input] = esc_url( $new_instance[$input] );
				}
			} else {
				$instance[$input] = esc_url( $new_instance[$input] );
			}

		}

		return $instance;
	}

} // end of class

function lipi__social_header_widget() { register_widget( 'lipi__social_header_widget_call' ); }
add_action( 'widgets_init', 'lipi__social_header_widget' );


/**************************
*** CALL DEFAULT VALUE ***
***************************/
function lipi__widget_social_icon_call( $options = '' ) {
	$options = array (
		'fivehundredpx' => array(
			'id' => 'fab fa-500px',
			'name' => __( '500px', 'lipi-framework' )
		),
		'angellist' => array(
			'id' => 'fab fa-angellist',
			'name' => __( 'AngelList', 'lipi-framework' )
		),
		'bandcamp' => array(
			'id' => 'fab fa-bandcamp',
			'name' => __( 'Bandcamp', 'lipi-framework' )
		),
		'behance' => array(
			'id' => 'fab fa-behance',
			'name' => __( 'Behance', 'lipi-framework' )
		),
		'bitbucket' => array(
			'id' => 'fab fa-bitbucket',
			'name' => __( 'BitBucket', 'lipi-framework' )
		),
		'bloglovin' => array(
			'id' => 'fas fa-sign-in-alt',
			'name' => __( "Blog Lovin", 'lipi-framework' )
		),
		'codepen' => array(
			'id' => 'fab fa-codepen',
			'name' => __( 'Codepen', 'lipi-framework' )
		),
		'email' => array(
			'id' => 'far fa-envelope',
			'name' => __( 'Contact', 'lipi-framework' )
		),
		'delicious' => array(
			'id' => 'fab fa-delicious',
			'name' => __( 'Delicious', 'lipi-framework' )
		),
		'deviantart' => array(
			'id' => 'fab fa-deviantart',
			'name' => __( 'DeviantArt', 'lipi-framework' )
		),
		'digg' => array(
			'id' => 'fab fa-digg',
			'name' => __( 'Digg', 'lipi-framework' )
		),
		'dribbble' => array(
			'id' => 'fab fa-dribbble',
			'name' => __( 'Dribbble', 'lipi-framework' )
		),
		'dropbox' => array(
			'id' => 'fab fa-dropbox',
			'name' => __( 'Dropbox', 'lipi-framework' )
		),
		'facebook' => array(
			'id' => 'fab fa-facebook-square',
			'name' => __( 'Facebook', 'lipi-framework' )
		),
		'flickr' => array(
			'id' => 'fab fa-flickr',
			'name' => __( 'Flickr', 'lipi-framework' )
		),
		'foursquare' => array(
			'id' => 'fab fa-foursquare',
			'name' => __( 'Foursquare', 'lipi-framework' )
		),
		'github' => array(
			'id' => 'fab fa-github',
			'name' => __( 'Github', 'lipi-framework' )
		),
		'gplus' => array(
			'id' => 'fab fa-google-plus-g',
			'name' => __( 'Google+', 'lipi-framework' )
		),
		'houzz' => array(
			'id' => 'fab fa-houzz',
			'name' => __( 'Houzz', 'lipi-framework' )
		),
		'instagram' => array(
			'id' => 'fab fa-instagram',
			'name' => __( 'Instagram', 'lipi-framework' )
		),
		'itunes' => array(
			'id' => 'fab fa-itunes-note',
			'name' => __( 'iTunes', 'lipi-framework' )
		),
		'jsfiddle' => array(
			'id' => 'fab fa-jsfiddle',
			'name' => __( 'JSFiddle', 'lipi-framework' )
		),
		'lastfm' => array(
			'id' => 'fab fa-lastfm',
			'name' => __( 'Last.fm', 'lipi-framework' )
		),
		'linkedin' => array(
			'id' => 'fab fa-linkedin-in',
			'name' => __( 'LinkedIn', 'lipi-framework' )
		),
		'mixcloud' => array(
			'id' => 'fab fa-mixcloud',
			'name' => __( 'Mixcloud', 'lipi-framework' )
		),
		'paper-plane' => array(
			'id' => 'far fa-paper-plane',
			'name' => __( "Newsletter", 'lipi-framework' )
		),
		'phone' => array(
			'id' => 'fas fa-phone',
			'name' => __( 'Phone', 'lipi-framework' )
		),
		'pinterest' => array(
			'id' => 'fab fa-pinterest',
			'name' => __( 'Pinterest', 'lipi-framework' )
		),
		'reddit' => array(
			'id' => 'fab fa-reddit-alien',
			'name' => __( 'Reddit', 'lipi-framework' )
		),
		'rss' => array(
			'id' => 'fas fa-rss',
			'name' => __( 'RSS', 'lipi-framework' )
		),
		'skype' => array(
			'id' => 'fab fa-skype',
			'name' => __( 'Skype', 'lipi-framework' )
		),
		'snapchat' => array(
			'id' => 'fab fa-snapchat-ghost',
			'name' => __( 'Snapchat', 'lipi-framework' )
		),
		'soundcloud' => array(
			'id' => 'fab fa-soundcloud',
			'name' => __( 'Soundcloud', 'lipi-framework' )
		),
		'spotify' => array(
			'id' => 'fab fa-spotify',
			'name' => __( 'Spotify', 'lipi-framework' )
		),
		'stackoverflow' => array(
			'id' => 'fab fa-stack-overflow',
			'name' => __( 'Stack Overflow', 'lipi-framework' )
		),
		'steam' => array(
			'id' => 'fab fa-steam-symbol',
			'name' => __( 'Steam', 'lipi-framework' )
		),
		'stumbleupon' => array(
			'id' => 'fab fa-stumbleupon',
			'name' => __( 'Stumbleupon', 'lipi-framework' )
		),
		'tripadvisor' => array(
			'id' => 'fab fa-tripadvisor',
			'name' => __( 'Trip Advisor', 'lipi-framework' )
		),
		'tumblr' => array(
			'id' => 'fab fa-tumblr',
			'name' => __( 'Tumblr', 'lipi-framework' )
		),
		'twitch' => array(
			'id' => 'fab fa-twitch',
			'name' => __( 'Twitch', 'lipi-framework' )
		),
		'twitter' => array(
			'id' => 'fab fa-twitter',
			'name' => __( 'Twitter', 'lipi-framework' )
		),
		'vimeo' => array(
			'id' => 'fab fa-vimeo-v',
			'name' => __( 'Vimeo', 'lipi-framework' )
		),
		'vine' => array(
			'id' => 'fab fa-vine',
			'name' => __( 'Vine', 'lipi-framework' )
		),
		'vkontakte' => array(
			'id' => 'fab fa-vk',
			'name' => __( "VK", 'lipi-framework' )
		),
		'wordpress' => array(
			'id' => 'fab fa-wordpress-simple',
			'name' => __( 'WordPress', 'lipi-framework' )
		),
		'xing' => array(
			'id' => 'fab fa-xing',
			'name' => __( 'Xing', 'lipi-framework' )
		),
		'yelp' => array(
			'id' => 'fab fa-yelp',
			'name' => __( 'Yelp', 'lipi-framework' )
		),
		'youtube' => array(
			'id' => 'fab fa-youtube',
			'name' => __( 'YouTube', 'lipi-framework' )
		),
		'yahoo' => array(
			'id' => 'fab fa-yahoo',
			'name' => __( 'Yahoo', 'lipi-framework' )
		)
	);
	return apply_filters( 'lipi__widget_social_icon_call_defaults', $options );
}

function lipi__widget_social_icon_option_defaults() {
	$defaults = array(
		'new_window' => '',
		'icon_padding' => '10px 10px 0px 10px',
		'icon_box_margin' => '0px 0px 0px 0px',
		'font_size' => 18,
		'alignment' => 'left'
	);
	return apply_filters( 'lipi__widget_social_icon_option_defaults', $defaults );
}
?>
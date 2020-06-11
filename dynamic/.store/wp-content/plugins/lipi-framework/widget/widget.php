<?php 

/******************************************
 ***  KNOWLEDGEBASE :: CUSTOM CATEGORY ***
******************************************/

class lipi__kbcategory_custom extends WP_Widget {
	
	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'widget_kb_custom_catategory',
		// Widget name will appear in UI
		esc_html__('KB Custom Category', 'lipi-framework'),
		// Widget description
		array( 'description' => esc_html__( 'Display custom knowledgebase category', 'lipi-framework' ), )
		);
	} // Eof __construct
	
	
	// This is where the action happens
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		// before and after widget arguments are defined by themes
		
		echo wp_kses_post($args['before_widget']);
			echo '<div class="widget_custom_kb_category">';
				if ( ! empty( $title ) ) echo wp_kses_post($args['before_title']).$title.wp_kses_post($args['after_title']);
				
					if( $instance['cat_list'] != '' ) {
					 echo '<ul>';
					   wp_list_categories( array(
						  'orderby' => 'name',
						  'pad_counts' => 0,
						  'hierarchical' => false,
						  'taxonomy' => 'lipikbcat',
						  'title_li' => '',
						  'include' => $instance['cat_list'],
						) );
					 echo '</ul>';
					}
				
			echo '<div style="clear:both"></div>';
			echo '</div>';
		echo wp_kses_post($args['after_widget']);
	}
	
	// Widget Backend
	public function form( $instance ) {
		
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = esc_html__( 'New title', 'lipi-framework' );
		}
		
		$select = array();
		if ( isset( $instance[ 'cat_list' ] ) ) {
			$select = $instance[ 'cat_list' ];
		}
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'lipi-framework' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		
        <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'cat_list' )); ?>"><?php esc_html_e( 'Select Category:', 'lipi-framework' ); ?></label>
		 <?php 
			 $cat_list = get_categories( array( 'taxonomy' => 'lipikbcat' ) );
			 
			printf (
                '<select multiple="multiple" name="%s[]" id="%s" class="widefat" size="15" style="margin:10px 0px">',
                $this->get_field_name('cat_list'),
                $this->get_field_id('cat_list')
            );

            // Each individual option
            foreach( $cat_list as $cat )
            {
                printf(
                    '<option value="%s" %s style="margin-bottom:3px;">%s</option>',
                    $cat->cat_ID,
                    in_array( $cat->cat_ID, $select) ? 'selected="selected"' : '',
                    $cat->cat_name
                );
            }

            echo '</select>';
			 
		 ?>
         </p>
         
         <?php 
		
	} // Eof public form
	
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['cat_list'] = ( ! empty( $new_instance['cat_list'] ) ) ? esc_sql( $new_instance['cat_list'] ) : '';
		return $instance;
	}
	
}


// Register and load the widget
function lipi__widget_custom_category() { register_widget( 'lipi__kbcategory_custom' ); }
add_action( 'widgets_init', 'lipi__widget_custom_category' );




/******************************************
 ***  KNOWLEDGEBASE :: DEFAULT CATEGORY ***
******************************************/
class lipi__kbdefault_category extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'widget_kb_default_category',
		// Widget name will appear in UI
		esc_html__('KB Categroy', 'lipi-framework'),
		// Widget description
		array( 'description' => esc_html__( 'KB records based on category', 'lipi-framework' ), )
		);
	}

	// This is where the action happens
	public function widget( $args, $instance ) {
		global $post;
		$title = apply_filters( 'widget_title', $instance['title'] );
		if( $instance['cat_count'] == 1 ) { $show_count = 1; } else { $show_count = 0; }
		if( $instance['cat_hierarchy'] == 1 ) { $cat_hierarchy = 1; } else { $cat_hierarchy = 0; }
		// before and after widget arguments are defined by themes
		
		echo wp_kses_post($args['before_widget']);
			echo '<div class="widget_kb_default_category">';
				if ( ! empty( $title ) ) echo wp_kses_post($args['before_title']).$title.wp_kses_post($args['after_title']);
				
				// Select current cat
				$currentKBID = '';
				$terms_kb_selectCatID = get_the_terms( $post->ID, 'lipikbcat' );
				//print_r($terms_kb_selectCatID); 
				if ( $terms_kb_selectCatID != null ){  
					$currentKBID = array();
					foreach( $terms_kb_selectCatID as $terms_kb_selectCatID ) {
						$currentKBID[] = $terms_kb_selectCatID->term_taxonomy_id;
						unset($terms_kb_selectCatID);
					}
					if( (array) !empty($currentKBID) ) {
						$kbcatID = implode(",",$currentKBID);
					} else {
						$kbcatID = 0;
					}
				} else {
					$kbcatID = 0;
				}
					 echo '<ul>';
						 wp_list_categories( array(
							  'orderby' => 'name',
							  'show_count' => $show_count,
							  'pad_counts' => 0,
							  'hierarchical' => $cat_hierarchy,
							  'taxonomy' => 'lipikbcat',
							  'current_category' => $kbcatID,
							  'title_li' => ''
							) );
					 echo '</ul>';
			echo '<div style="clear:both"></div>';
			echo '</div>';
		echo wp_kses_post($args['after_widget']);
	}
         
	// Widget Backend
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = esc_html__( 'New title', 'lipi-framework' );
		}
		
		$cat_count = (isset($instance[ 'cat_count' ])?$instance[ 'cat_count' ]:'');
		$cat_hierarchy = (isset($instance[ 'cat_hierarchy' ])?$instance[ 'cat_hierarchy' ]:'');
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'lipi-framework' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		
		<p>
			<input name="<?php echo esc_attr($this->get_field_name( 'cat_count' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'cat_count' )); ?>" type="checkbox" value="1" <?php if( $cat_count == 1 ){ echo 'checked'; } ?> />
			<label for="<?php echo esc_attr($this->get_field_id( 'cat_count' )); ?>"><?php esc_html_e( 'Show post counts', 'lipi-framework' ); ?></label>
		</p>

		<p>
			<input name="<?php echo esc_attr($this->get_field_name( 'cat_hierarchy' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'cat_hierarchy' )); ?>" type="checkbox" value="1" <?php if( $cat_hierarchy == 1 ){ echo 'checked'; } ?> />
			<label for="<?php echo esc_attr($this->get_field_id( 'cat_hierarchy' )); ?>"><?php esc_html_e( 'Show hierarchy', 'lipi-framework' ); ?></label>
		</p>


		<?php		
	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['cat_dropdown'] = ( ! empty( $new_instance['cat_dropdown'] ) ) ? strip_tags( $new_instance['cat_dropdown'] ) : '';
		$instance['cat_count'] = ( ! empty( $new_instance['cat_count'] ) ) ? strip_tags( $new_instance['cat_count'] ) : '';
		$instance['cat_hierarchy'] = ( ! empty( $new_instance['cat_hierarchy'] ) ) ? strip_tags( $new_instance['cat_hierarchy'] ) : '';
		return $instance;
	}

}
 
// Register and load the widget
function lipi__widget_default_category() { register_widget( 'lipi__kbdefault_category' ); }
add_action( 'widgets_init', 'lipi__widget_default_category' );





/******************************************
 ***  KNOWLEDGEBASE :: ARTICLES ***
******************************************/
class lipi__kbarticles_bytype extends WP_Widget {
	
	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'widget_kb_article_by_type',
		// Widget name will appear in UI
		esc_html__('KB Articles', 'lipi-framework'),
		// Widget description
		array( 'description' => esc_html__( 'KB articles (latest, popular, top rated and the most commented articles)', 'lipi-framework' ), )
		);
	}
	
	// This is where the action happens
	public function widget( $args, $instance ) {
		global $post;
		$title = apply_filters( 'widget_title', $instance['title'] );
		$knowledgebase_article_number = $instance['article_number'];
		$knowledgebase_article_order = $instance[ 'article_order' ];
		
		if(  isset($instance[ 'display_type' ]) && $instance[ 'display_type' ] == 1 ) { // Latest Article
			$kb_args = array( 
						'posts_per_page' => $knowledgebase_article_number, 
						'post_type'  => 'lipi_kb',
						'orderby' => 'date',
						'order'	=>	$knowledgebase_article_order,
					);
		} else if(  isset($instance[ 'display_type' ]) && $instance[ 'display_type' ] == 2 ) { // Popular Article
			$kb_args = array( 
							'posts_per_page' => $knowledgebase_article_number, 
							'post_type'  => 'lipi_kb',
							'orderby' => 'meta_value',
							'order'	=>	$knowledgebase_article_order,
							'meta_key' => 'display_post_impression'
						);
		} else if(  isset($instance[ 'display_type' ]) && $instance[ 'display_type' ] == 3 ) { // Top Rated Article
			$kb_args = array( 
							'posts_per_page' => $knowledgebase_article_number, 
							'post_type'  => 'lipi_kb',
							'orderby' => 'meta_value',
							'order'	=>	$knowledgebase_article_order,
							'meta_key' => 'rating_like_count_post'
						);
		} else if(  isset($instance[ 'display_type' ]) && $instance[ 'display_type' ] == 4 ) { // Most Commented Article
			$kb_args = array( 
							'posts_per_page' => $knowledgebase_article_number, 
							'post_type'  => 'lipi_kb',
							'orderby' => 'comment_count',
							'order'	=>	$knowledgebase_article_order,
						);
		}
		
		echo wp_kses_post($args['before_widget']);
		echo '<div class="kb_article_bytype">';
			if ( ! empty( $title ) ) echo wp_kses_post($args['before_title']).$title.wp_kses_post($args['after_title']);
			$query = new WP_Query($kb_args);
			echo '<ul class="clearfix">';
			if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
			echo '<li class="articles"><a href="'.get_permalink($query->post->ID).'" rel="bookmark">'.get_the_title($query->post->ID).'</a></li>';
			endwhile; endif;
			echo '</ul>'; 
		wp_reset_postdata();
		echo '</div>';
		echo wp_kses_post($args['after_widget']);
	}
	
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['display_type'] = ( ! empty( $new_instance['display_type'] ) ) ? strip_tags( $new_instance['display_type'] ) : '';
		$instance['article_number'] = ( ! empty( $new_instance['article_number'] ) ) ? strip_tags( $new_instance['article_number'] ) : '';
		$instance['article_order'] = ( ! empty( $new_instance['article_order'] ) ) ? strip_tags( $new_instance['article_order'] ) : '';
		return $instance;
	}
	
	// Widget Backend
	public function form( $instance ) {
		
		// title
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = esc_html__( 'New title', 'lipi-framework' );
		}
		
		// display
		$latest_article = $popular_article = $top_rated_article = $most_commented_article = '';
		if(  isset($instance[ 'display_type' ]) && $instance[ 'display_type' ] == 1 ) $latest_article = 'selected';
		else if(  isset($instance[ 'display_type' ]) && $instance[ 'display_type' ] == 2 ) $popular_article = 'selected';
		else if(  isset($instance[ 'display_type' ]) && $instance[ 'display_type' ] == 3 ) $top_rated_article = 'selected';
		else if(  isset($instance[ 'display_type' ]) && $instance[ 'display_type' ] == 4 ) $most_commented_article = 'selected';
		
		// article number
		if ( isset( $instance[ 'article_number' ] ) ) {
			$article_number = $instance[ 'article_number' ];
		} else {
			$article_number = 5;
		}
		
		// order
		$ascending_order = $descending_order = '';
		if(  isset($instance[ 'article_order' ]) && $instance[ 'article_order' ] == 'ASC' ) { $ascending_order = 'selected';  }
		else if(  isset($instance[ 'article_order' ]) && $instance[ 'article_order' ] == 'DESC' ) { $descending_order = 'selected';  }

		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'lipi-framework' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
        
        <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'Article Display Type' )); ?>"><?php esc_html_e( 'Article Display Type', 'lipi-framework' ); ?></label>
        <select id="<?php echo esc_attr($this->get_field_id( 'display_type' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'display_type' )); ?>">
            <option value="1" <?php echo esc_attr($latest_article); ?>>Latest Articles (using date)</option>
            <option value="2" <?php echo esc_attr($popular_article); ?>>Popular Article (using number of views)</option>
            <option value="3" <?php echo esc_attr($top_rated_article); ?>>Top Rated Article (using like)</option>
            <option value="4" <?php echo esc_attr($most_commented_article); ?>>Most Commented Article</option>
        </select>
        </p>
        
        <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'Number of Articles' )); ?>"><?php esc_html_e( 'Number of Articles:', 'lipi-framework' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'article_number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'article_number' )); ?>" type="text" value="<?php echo esc_attr( $article_number ); ?>" />
		</p>
        
        
         <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'Article Order' )); ?>"><?php esc_html_e( 'Article Order', 'lipi-framework' ); ?></label>
        <select id="<?php echo esc_attr($this->get_field_id( 'article_order' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'article_order' )); ?>">
            <option value="ASC" <?php echo esc_attr($ascending_order); ?>>Ascending Order</option>
            <option value="DESC" <?php echo esc_attr($descending_order); ?>>Descending Order</option>
        </select>
        </p>


		<?php		
	}
	
} // Class wpb_widget ends here
 
// Register and load the widget
function lipi__widget_kb_articles() { register_widget( 'lipi__kbarticles_bytype' ); }
add_action( 'widgets_init', 'lipi__widget_kb_articles' );





/******************************************
 ***  WOOCOMMERCE DROPDOWN CART ***
******************************************/
class lipi__woocommerce_menu_cart extends WP_Widget {

	public function __construct() {
		parent::__construct(
	 		'woocommerce-menu-cart', // Base ID
			'Woocommerce Nav Menu', // Name
			array( 'description' => __( 'Woocommerce Nav Menu', 'lipi-framework' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		extract( $args );
		global $post, $woocommerce, $lipi_theme_options;
		echo '<div class="shopping_cart_outer">
		<div class="shopping_cart_inner">
		<div class="shopping_cart_header">
		<a class="fa fa-shopping-basket header_cart" href="'.wc_get_cart_url().'"><span class="header_cart_span">'. $woocommerce->cart->cart_contents_count.'</span></a>
			<div class="shopping_cart_dropdown">
			<div class="shopping_cart_dropdown_inner">';
            
			$cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0;
			$list_class = array( 'cart_list', 'product_list_widget' );
					echo '<ul class="'. implode(' ', $list_class).'">';
						if ( !$cart_is_empty ) : 
							foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) :
								$_product = $cart_item['data'];
								// Only display if allowed
								if ( ! $_product->exists() || $cart_item['quantity'] == 0 ) {
									continue;
								}
								// Get price
								$product_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? ( function_exists( 'wc_get_price_excluding_tax' )? wc_get_price_excluding_tax( $_product ): $_product->get_price_excluding_tax() ) /*$_product->get_price_excluding_tax()*/ : $_product->get_price_including_tax();
								$product_price = apply_filters( 'woocommerce_cart_item_price_html', wc_price( $product_price ), $cart_item, $cart_item_key );
								echo '<li>';
								echo '<a href="'. get_permalink( $cart_item['product_id'] ) .'">';
								echo ''.$_product->get_image().''; 
								echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product );
								echo '</a>';
								echo wc_get_formatted_cart_item_data( $cart_item ); 
								echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); 
							    echo '</li>';
						endforeach;
						else :
					echo '<li>'. __( 'No products in the cart.', 'lipi-framework' ).'</li>';
				endif;
                echo '</ul></div>';
	         if ( sizeof( $woocommerce->cart->get_cart() ) <= 0 ) :
                endif; 
			 echo '<a href="'. wc_get_cart_url() .'" class="qbutton white view-cart">'. __( 'Cart', 'lipi-framework' ).'<i class="fa fa-shopping-basket"></i></a>';
			 echo '<span class="total">'. __( 'Total', 'lipi-framework' ).':<span>'. $woocommerce->cart->get_cart_subtotal() .'</span></span>';
			 if ( sizeof( $woocommerce->cart->get_cart() ) <= 0 ) : 
			 endif;
		echo '</div></div></div></div>';
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		return $instance;
	}
} 
add_action( 'widgets_init', function() { register_widget( 'lipi__woocommerce_menu_cart' ); } );





/******************************************
 ***  FAQ :: CATEGORY ***
******************************************/
class lipi__faq extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'faq_category_widget',
		// Widget name will appear in UI
		esc_html__('FAQ Categroy', 'lipi-framework'),
		// Widget description
		array( 'description' => esc_html__( 'Faq records based on category', 'lipi-framework' ), )
		);
	}

	// This is where the action happens
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		if( $instance['cat_count'] == 1 ) { $show_count = 1; } else { $show_count = 0; }
		if( $instance['cat_hierarchy'] == 1 ) { $cat_hierarchy = 1; } else { $cat_hierarchy = 0; }
		// before and after widget arguments are defined by themes
		
		echo wp_kses_post($args['before_widget']);
			echo '<div class="display-faq-section">';
				if ( ! empty( $title ) ) echo wp_kses_post($args['before_title']).$title.wp_kses_post($args['after_title']);
				
				$customPostTaxonomies = get_object_taxonomies('lipi_faq');
				if(count($customPostTaxonomies) > 0) {    
					 echo '<ul>';
					 foreach($customPostTaxonomies as $tax) {
						 wp_list_categories( array(
							  'orderby' => 'name',
							  'show_count' => $show_count,
							  'pad_counts' => 0,
							  'hierarchical' => $cat_hierarchy,
							  'taxonomy' => $tax,
							  'title_li' => ''
							) );
					 }	
					 echo '</ul>';
				}
			echo '<div style="clear:both"></div>';
			echo '</div>';
		echo wp_kses_post($args['after_widget']);
	}
         
	// Widget Backend
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = esc_html__( 'New title', 'lipi-framework' );
		}
		
		$cat_count = (isset($instance[ 'cat_count' ])?$instance[ 'cat_count' ]:'');
		$cat_hierarchy = (isset($instance[ 'cat_hierarchy' ])?$instance[ 'cat_hierarchy' ]:''); 
		?>
		<p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'lipi-framework' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>
		
		<p><input name="<?php echo esc_attr($this->get_field_name( 'cat_count' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'cat_count' )); ?>" type="checkbox" value="1" <?php if( $cat_count == 1 ){ echo 'checked'; } ?> />
			<label for="<?php echo esc_attr($this->get_field_id( 'cat_count' )); ?>"><?php esc_html_e( 'Show post counts', 'lipi-framework' ); ?></label></p>

		<p><input name="<?php echo esc_attr($this->get_field_name( 'cat_hierarchy' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'cat_hierarchy' )); ?>" type="checkbox" value="1" <?php if( $cat_hierarchy == 1 ){ echo 'checked'; } ?> />
			<label for="<?php echo esc_attr($this->get_field_id( 'cat_hierarchy' )); ?>"><?php esc_html_e( 'Show hierarchy', 'lipi-framework' ); ?></label></p>
		<?php		
	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['cat_dropdown'] = ( ! empty( $new_instance['cat_dropdown'] ) ) ? strip_tags( $new_instance['cat_dropdown'] ) : '';
		$instance['cat_count'] = ( ! empty( $new_instance['cat_count'] ) ) ? strip_tags( $new_instance['cat_count'] ) : '';
		$instance['cat_hierarchy'] = ( ! empty( $new_instance['cat_hierarchy'] ) ) ? strip_tags( $new_instance['cat_hierarchy'] ) : '';
		return $instance;
	}

} // Class wpb_widget ends here
 
// Register and load the widget
function lipi__load_faq_widget() { register_widget( 'lipi__faq' ); }
add_action( 'widgets_init', 'lipi__load_faq_widget' );


/******************************************
 ***  ICON WITH TEXT :: WIDGET ***
******************************************/
class lipi__icon_with_text_widget extends WP_Widget {
	
	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'icon_with_text_widget',
		// Widget name will appear in UI
		esc_html__('Lipi - Icon With Text', 'lipi-framework'),
		// Widget description
		array( 'description' => esc_html__( 'Display icon with text information on the menu header', 'lipi-framework' ), )
		);
		
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_footer-widgets.php', array( $this, 'print_scripts' ), 9999 );
	}
	
	public function enqueue_scripts( $hook_suffix ) {
		if ( 'widgets.php' !== $hook_suffix ) {
			return;
		}
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'underscore' );
	}
	
	public function print_scripts() {
		?>
		<script>
			( function( $ ){
				function initColorPicker( widget ) {
					widget.find( '.color-picker' ).wpColorPicker( {
						change: _.throttle( function() { // For Customizer
							$(this).trigger( 'change' );
						}, 3000 )
					});
				}

				function onFormUpdate( event, widget ) {
					initColorPicker( widget );
				}

				$( document ).on( 'widget-added widget-updated', onFormUpdate );

				$( document ).ready( function() {
					$( '#widgets-right .widget:has(.color-picker)' ).each( function () {
						initColorPicker( $( this ) );
					} );
				} );
			}( jQuery ) );
		</script>
		<?php
	}
	
	
	// This is where the action happens
	public function widget( $args, $instance ) {
		$icon_name = ( isset( $instance['icon_name'] ) ? $instance['icon_name'] : '' );
		$text_color = ( isset( $instance['text_color'] ) ? $instance['text_color'] : '' );
		$icon_name_color = ( isset( $instance['icon_name_color'] ) ? $instance['icon_name_color'] : '' );
		$text_size = ( isset( $instance['text_size'] ) ? $instance['text_size'] : '' );
		$icon_margin = ( isset( $instance['icon_margin'] ) ? $instance['icon_margin'] : '' );
		$box_margin = ( isset( $instance['box_margin'] ) ? $instance['box_margin'] : '' );
		$icon_font_size = ( isset( $instance['icon_font_size'] ) ? $instance['icon_font_size'] : '' );
		
		echo wp_kses_post($args['before_widget']);
			echo '<div class="icon_text clearfix" style="margin:'.$box_margin.';">
					<div class="icon" style="color:'.$icon_name_color.';font-size:'.$icon_font_size.';margin:'.$icon_margin.';"><i class="'.$icon_name.'"></i></div>
					<div class="text" style="color:'.$text_color.';font-size:'.$text_size.';">'.$instance['message'].'</div>
				  </div>';
		echo wp_kses_post($args['after_widget']);
	}
	
	// Widget Backend
	public function form( $instance ) {
		
		$icon_name = ( isset( $instance['icon_name'] ) ? $instance['icon_name'] : '' );
		$icon_name_color = ( isset( $instance['icon_name_color'] ) ? $instance['icon_name_color'] : '' );
		$message = ( isset( $instance['message'] ) ? $instance['message'] : '' );
		$text_size = ( isset( $instance['text_size'] ) ? $instance['text_size'] : '' );
		$icon_font_size = ( isset( $instance['icon_font_size'] ) ? $instance['icon_font_size'] : '' );
		$icon_margin = ( isset( $instance['icon_margin'] ) ? $instance['icon_margin'] : '' );
		$box_margin = ( isset( $instance['box_margin'] ) ? $instance['box_margin'] : '' );
		$text_color = ( isset( $instance['text_color'] ) ? $instance['text_color'] : '' );
		?>
        
        <p><label for="<?php echo esc_attr($this->get_field_id( 'box_margin' )); ?>"><?php esc_html_e( 'Icon With Text Box Margin:', 'lipi-framework' ); ?></label>
        <input type="text" id="<?php echo esc_attr($this->get_field_id( 'box_margin' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'box_margin' )); ?>" value="<?php echo esc_attr( $box_margin ); ?>" /><br><i><?php esc_html_e( 'Default: 0px 0px 0px 62px', 'lipi-framework' ); ?></i></p>  
        
        <p><label for="<?php echo esc_attr($this->get_field_id( 'icon_name_color' )); ?>"><?php esc_html_e( 'Icon Color:', 'lipi-framework' ); ?></label>
        <input class="color-picker" type="text" id="<?php echo esc_attr($this->get_field_id( 'icon_name_color' )); ?>" name="<?php echo esc_attr(esc_attr($this->get_field_name( 'icon_name_color' ))); ?>" value="<?php echo esc_attr( $icon_name_color ); ?>" /></p>
        
        <p><label for="<?php echo esc_attr($this->get_field_id( 'icon_font_size' )); ?>"><?php esc_html_e( 'Icon Font Size:', 'lipi-framework' ); ?></label>
        <input type="text" id="<?php echo esc_attr($this->get_field_id( 'icon_font_size' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'icon_font_size' )); ?>" value="<?php echo esc_attr( $icon_font_size ); ?>" /><br><i><?php esc_html_e( 'Default: 21px', 'lipi-framework' ); ?></i></p>  
        
        <p><label for="<?php echo esc_attr($this->get_field_id( 'icon_margin' )); ?>"><?php esc_html_e( 'Icon Margin:', 'lipi-framework' ); ?></label>
        <input type="text" id="<?php echo esc_attr($this->get_field_id( 'icon_margin' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'icon_margin' )); ?>" value="<?php echo esc_attr( $icon_margin ); ?>" /><br><i><?php esc_html_e( 'Default: 0px 14px 0px 0px', 'lipi-framework' ); ?></i></p>  

        
        <p><label for="<?php echo esc_attr($this->get_field_id( 'icon_name' )); ?>"><?php esc_html_e( 'Icon Name:', 'lipi-framework' ); ?></label>
        <input type="text" id="<?php echo esc_attr($this->get_field_id( 'icon_name' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'icon_name' )); ?>" value="<?php echo esc_attr( $icon_name ); ?>" /><br><i><?php esc_html_e( 'example: fa fa-youtube', 'lipi-framework' ); ?></i>, <br><br>Use fontawesome font Icon Name: <a href="http://fontawesome.io/icons/" target="_blank">http://fontawesome.io/icons/</a></p> 
        
        <p><br></p>

        <p><label for="<?php echo esc_attr($this->get_field_id( 'message' )); ?>"><?php esc_html_e( 'Text:', 'lipi-framework' ); ?></label>
        <textarea class="widefat" rows="2" cols="7" id="<?php echo esc_attr($this->get_field_id('message')); ?>" name="<?php echo esc_attr($this->get_field_name('message')); ?>"><?php echo ''.$message; ?></textarea></p> 
            
        <p><label for="<?php echo esc_attr($this->get_field_id( 'text_color' )); ?>"><?php esc_html_e( 'Text Color:', 'lipi-framework' ); ?></label>
        <input class="color-picker" type="text" id="<?php echo esc_attr($this->get_field_id( 'text_color' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'text_color' )); ?>" value="<?php echo esc_attr( $text_color ); ?>" /></p>
        
        <p><label for="<?php echo esc_attr($this->get_field_id( 'text_size' )); ?>"><?php esc_html_e( 'Text Size:', 'lipi-framework' ); ?></label>
        <input type="text" id="<?php echo esc_attr($this->get_field_id( 'text_size' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'text_size' )); ?>" value="<?php echo esc_attr( $text_size ); ?>" /><br><i><?php esc_html_e( 'Default: 13px', 'lipi-framework' ); ?></i></p>  
         
        <?php 
	}
	
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['icon_name'] = ( ! empty( $new_instance['icon_name'] ) ) ? strip_tags( $new_instance['icon_name'] ) : '';
		$instance['message'] = ( ! empty( $new_instance['message'] ) ) ? $new_instance['message'] : '';
		$instance['text_size'] = ( ! empty( $new_instance['text_size'] ) ) ? $new_instance['text_size'] : '';
		$instance['icon_font_size'] = ( ! empty( $new_instance['icon_font_size'] ) ) ? $new_instance['icon_font_size'] : '';
		$instance['icon_margin'] = ( ! empty( $new_instance['icon_margin'] ) ) ? $new_instance['icon_margin'] : '';
		$instance['box_margin'] = ( ! empty( $new_instance['box_margin'] ) ) ? $new_instance['box_margin'] : '';
		$instance['text_color'] = $new_instance['text_color'];
		$instance['icon_name_color'] = $new_instance['icon_name_color'];
		return $instance;
	}
	
} // Class wpb_widget ends here

// Register and load the widget
function lipi__load_icon_with_text_widget() { register_widget( 'lipi__icon_with_text_widget' ); }
add_action( 'widgets_init', 'lipi__load_icon_with_text_widget' );


/******************************************
 ***  DISPLAY ALL RECORDSS BASED ON CATEGORY FOR SINGLE KB POST ***
******************************************/
class lipi__kbcat_article_single_pg extends WP_Widget {
	
	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'kb_recods_related_to_cat_widget',
		// Widget name will appear in UI
		esc_html__('KB Records - ONLY for KB Page', 'lipi-framework'),
		// Widget description
		array( 'description' => esc_html__( 'Records related to category for the single KB page', 'lipi-framework' ), )
		);
		
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_footer-widgets.php', array( $this, 'print_scripts' ), 9999 );
	}
	
	public function enqueue_scripts( $hook_suffix ) {
		if ( 'widgets.php' !== $hook_suffix ) {
			return;
		}
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'underscore' );
	}
	
	public function print_scripts() {
		?>
		<script>
			( function( $ ){
				function initColorPicker( widget ) {
					widget.find( '.color-picker' ).wpColorPicker( {
						change: _.throttle( function() { // For Customizer
							$(this).trigger( 'change' );
						}, 3000 )
					});
				}

				function onFormUpdate( event, widget ) {
					initColorPicker( widget );
				}

				$( document ).on( 'widget-added widget-updated', onFormUpdate );

				$( document ).ready( function() {
					$( '#widgets-right .widget:has(.color-picker)' ).each( function () {
						initColorPicker( $( this ) );
					} );
				} );
			}( jQuery ) );
		</script>
		<?php
	}

	// This is where the action happens
	public function widget( $args, $instance ) {
		global $post, $lipi_theme_options;
		$post_per_page = ( isset( $instance['post_per_page'] ) ? $instance['post_per_page'] : '5' ); 
		$show_moretext = $instance['show_moretext'];
		$loading_text = $instance['loading_text'];
		$background_color = ( isset( $instance['background_color'] ) ? $instance['background_color'] : '' );
		$post_type = get_post_type();
		// check for single KB Page
		if( $post_type == 'lipi_kb' && is_single() ) {
		echo wp_kses_post($args['before_widget']);
			echo '<div class="kb_article_bytype">';
				$terms = get_the_terms( $post->ID , 'lipikbcat' );
				$check_if_login_call = get_option( 'kb_cat_check_login_'.$terms[0]->term_id );
				$check_user_role = get_option( 'kb_cat_user_role_'.$terms[0]->term_id );
				$custom_login_message = get_option( 'kb_cat_login_message_'.$terms[0]->term_id );
				$term = array_pop($terms);
				
				/**************************************
				** Check For ONLY Login ACCESS **
				***************************************/
				if( $check_if_login_call == 1 && !is_user_logged_in() ) {
					 echo wp_kses_post($args['before_title']).$term->name.wp_kses_post($args['after_title']);
					 echo esc_attr($custom_login_message);
				} else {
					
					/**************************************
					** Check USER ROLE AFTER USER LOGIN**
					***************************************/
					if( !empty($check_user_role) ) $access_status = lipi__useraccesslevel(($check_user_role));
					else  $access_status = true;
					
					if( $access_status == false ) {
						echo wp_kses_post($args['before_title']).$term->name.wp_kses_post($args['after_title']);
						echo esc_html($lipi_theme_options['kb-cat-page-access-control-message']);
					} else {
						
					/**************************************
					** Display Result **
					***************************************/
						$count_total_records = $add_css = '';
						if( isset($background_color) && $background_color != '' ) { 
							$background_CSS = 'background:'.$background_color.';padding: 20px 20px 10px 20px;border-radius: 10px;';
							$add_css = 'bgfix';
						}
						echo '<div class="kb_article_bytype" style="'.$background_CSS.'">';
						echo wp_kses_post($args['before_title']).$term->name.wp_kses_post($args['after_title']);
						echo '<ul>';
							  
							$pageID_current = $post->ID;  
							global $paged, $wp_query;
							if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
							elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
							else { $paged = 1; }  
						  
							$post_args = array( 
								'post_type'  => 'lipi_kb',
								'posts_per_page' => $post_per_page,
								'orderby' => 'date',
								'order'  => 'DESC',
								'post__not_in' => array($pageID_current),
								'paged' => $paged,
								'tax_query' => array(
									array(
										'taxonomy' => 'lipikbcat',
										'field' => 'term_id',
										'terms' => $term->term_id
									)
								)
							); 
							
							$wp_query = new WP_Query($post_args);
							if($wp_query->have_posts()) {
								echo '<div class="ajax_kb_recordwidgetcall"><span class="kbrecordssection">';
								if( $paged == 1 ) { 
									echo '<li class="articles bgfix active-wig-sidebar"><a href="'.get_permalink($pageID_current).'">'.get_the_title().'</a></li>';
								}
								while($wp_query->have_posts()) { $wp_query->the_post();
								if( $pageID_current == $wp_query->post->ID  ) {
									$current_post_active = 'current_active';
								} else {
									$current_post_active = ''; 
								}
									echo '<li class="articles '.$current_post_active.''.$add_css.'"  > <a href="'.get_permalink($wp_query->post->ID).'">';
									$org_title = get_the_title(); 
									echo html_entity_decode($org_title, ENT_QUOTES, "UTF-8");
									echo '</a></li>';
								}
								echo '</span></div>';
							}
							
							echo "<div class='filler'></div>";
							
							if( $wp_query->max_num_pages != 0 && ($wp_query->found_posts > $post_per_page) ) {  
								echo '<span class="kb_recordspaging_widget"><li rel="' . $wp_query->max_num_pages . '" class="load_more_kb_records_widget more-link"> <i class="fas fa-spinner"></i> &nbsp;' . get_next_posts_link( $show_moretext , $wp_query->max_num_pages) . ' &nbsp; <i class="fas fa-angle-double-right"></i></li></span>';
								echo '<li class="portfolio_paging_loading"> &nbsp; <i class="fas fa-spinner"></i> <a href="javascript: void(0)">'.$loading_text.'</a></li>';
							}
							// eof testing
							
						  echo '</ul>';
						  echo '</div>';
						  
						  wp_reset_postdata();
				
				} // eof user access
				} // eof only login access
				
			echo '<div style="clear:both"></div>';
			echo '</div>';
		echo wp_kses_post($args['after_widget']);
		}
	}
         
	// Widget Backend
	public function form( $instance ) {
		$post_per_page = (isset($instance[ 'post_per_page' ])?$instance[ 'post_per_page' ]:'5');
		$show_moretext = (isset($instance[ 'show_moretext' ])?$instance[ 'show_moretext' ]:'Show More');
		$loading_text = (isset($instance[ 'loading_text' ])?$instance[ 'loading_text' ]:'Loading...');
		$background_color = ( isset( $instance['background_color'] ) ? $instance['background_color'] : '' );
		?><p>
        <label for="<?php echo esc_attr($this->get_field_id( 'post_per_page' )); ?>"><?php esc_html_e( 'Post Per Page:', 'lipi-framework' ); ?></label>
		<input name="<?php echo esc_attr($this->get_field_name( 'post_per_page' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'post_per_page' )); ?>" type="text" value="<?php echo esc_attr( $post_per_page ); ?>" /><br><span style="background: #e1f8fe;padding: 1px 5px;"><?php esc_html_e( 'Note: -1 == display all records', 'lipi-framework' ); ?></span>
		</p>
        <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'show_moretext' )); ?>"><?php esc_html_e( 'Show More Text:', 'lipi-framework' ); ?></label>
		<input name="<?php echo esc_attr($this->get_field_name( 'show_moretext' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'show_moretext' )); ?>" type="text" value="<?php echo esc_attr( $show_moretext ); ?>" />
		</p>
		<p>
        <label for="<?php echo esc_attr($this->get_field_id( 'loading_text' )); ?>"><?php esc_html_e( 'Loading Text:', 'lipi-framework' ); ?></label>
		<input name="<?php echo esc_attr($this->get_field_name( 'loading_text' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'loading_text' )); ?>" type="text" value="<?php echo esc_attr( $loading_text ); ?>" />
		</p>
		<p><label for="<?php echo esc_attr($this->get_field_id( 'background_color' )); ?>"><?php esc_html_e( 'Background Color:', 'lipi-framework' ); ?></label>
        <input class="color-picker" type="text" id="<?php echo esc_attr($this->get_field_id( 'background_color' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'background_color' )); ?>" value="<?php echo esc_attr( $background_color ); ?>" /></p>
		<?php		
	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['post_per_page'] = ( ! empty( $new_instance['post_per_page'] ) ) ? strip_tags( $new_instance['post_per_page'] ) : '';
		$instance['show_moretext'] = ( ! empty( $new_instance['show_moretext'] ) ) ? strip_tags( $new_instance['show_moretext'] ) : '';
		$instance['loading_text'] = ( ! empty( $new_instance['loading_text'] ) ) ? strip_tags( $new_instance['loading_text'] ) : '';
		$instance['background_color'] = $new_instance['background_color'];
		return $instance;
	}
	
}

function lipi__kb_catarticle_single_pg_widget() { register_widget( 'lipi__kbcat_article_single_pg' ); }
add_action( 'widgets_init', 'lipi__kb_catarticle_single_pg_widget' );
?>
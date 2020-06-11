<?php

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }


/* Theme setup section
-------------------------------------------------------------------- */

if ( !function_exists( 'lorem_ipsum_books_media_store_template_portfolio_theme_setup' ) ) {
	add_action( 'lorem_ipsum_books_media_store_action_before_init_theme', 'lorem_ipsum_books_media_store_template_portfolio_theme_setup', 1 );
	function lorem_ipsum_books_media_store_template_portfolio_theme_setup() {
		/*lorem_ipsum_books_media_store_add_template(array(
			'layout' => 'portfolio_2',
			'template' => 'portfolio',
			'mode'   => 'blog',
			'need_isotope' => true,
			'title'  => esc_html__('Portfolio tile (with hovers, different height) /2 columns/', 'lorem-ipsum-books-media-store'),
			'thumb_title'  => esc_html__('Medium image', 'lorem-ipsum-books-media-store'),
			'w'		 => 370,
			'h_crop' => 209,
			'h'		 => null
		));
		lorem_ipsum_books_media_store_add_template(array(
			'layout' => 'portfolio_3',
			'template' => 'portfolio',
			'mode'   => 'blog',
			'need_isotope' => true,
			'title'  => esc_html__('Portfolio tile /3 columns/', 'lorem-ipsum-books-media-store'),
			'thumb_title'  => esc_html__('Medium image', 'lorem-ipsum-books-media-store'),
			'w'		 => 370,
			'h_crop' => 209,
			'h'		 => null
		));
		lorem_ipsum_books_media_store_add_template(array(
			'layout' => 'portfolio_4',
			'template' => 'portfolio',
			'mode'   => 'blog',
			'need_isotope' => true,
			'title'  => esc_html__('Portfolio tile /4 columns/', 'lorem-ipsum-books-media-store'),
			'thumb_title'  => esc_html__('Medium image', 'lorem-ipsum-books-media-store'),
			'w'		 => 370,
			'h_crop' => 209,
			'h'		 => null
		));*/
		/*lorem_ipsum_books_media_store_add_template(array(
			'layout' => 'grid_2',
			'template' => 'portfolio',
			'mode'   => 'blog',
			'need_isotope' => true,
			'container_classes' => 'no_margins',
			'title'  => esc_html__('Grid tile (with hovers, equal height) /2 columns/', 'lorem-ipsum-books-media-store'),
			'thumb_title'  => esc_html__('Medium image (crop)', 'lorem-ipsum-books-media-store'),
			'w'		 => 370,
			'h' 	 => 209
		));
		lorem_ipsum_books_media_store_add_template(array(
			'layout' => 'grid_3',
			'template' => 'portfolio',
			'mode'   => 'blog',
			'need_isotope' => true,
			'container_classes' => 'no_margins',
			'title'  => esc_html__('Grid tile /3 columns/', 'lorem-ipsum-books-media-store'),
			'thumb_title'  => esc_html__('Medium image (crop)', 'lorem-ipsum-books-media-store'),
			'w'		 => 370,
			'h'		 => 209
		));
		lorem_ipsum_books_media_store_add_template(array(
			'layout' => 'grid_4',
			'template' => 'portfolio',
			'mode'   => 'blog',
			'need_isotope' => true,
			'container_classes' => 'no_margins',
			'title'  => esc_html__('Grid tile /4 columns/', 'lorem-ipsum-books-media-store'),
			'thumb_title'  => esc_html__('Medium image (crop)', 'lorem-ipsum-books-media-store'),
			'w'		 => 370,
			'h'		 => 209
		));*/
		/*lorem_ipsum_books_media_store_add_template(array(
			'layout' => 'square_2',
			'template' => 'portfolio',
			'mode'   => 'blog',
			'need_isotope' => true,
			'container_classes' => 'no_margins',
			'title'  => esc_html__('Square tile (with hovers, width=height) /2 columns/', 'lorem-ipsum-books-media-store'),
			'thumb_title'  => esc_html__('Medium square image (crop)', 'lorem-ipsum-books-media-store'),
			'w'		 => 370,
			'h' 	 => 370
		));
		lorem_ipsum_books_media_store_add_template(array(
			'layout' => 'square_3',
			'template' => 'portfolio',
			'mode'   => 'blog',
			'need_isotope' => true,
			'container_classes' => 'no_margins',
			'title'  => esc_html__('Square tile /3 columns/', 'lorem-ipsum-books-media-store'),
			'thumb_title'  => esc_html__('Medium square image (crop)', 'lorem-ipsum-books-media-store'),
			'w'		 => 370,
			'h'		 => 370
		));
		lorem_ipsum_books_media_store_add_template(array(
			'layout' => 'square_4',
			'template' => 'portfolio',
			'mode'   => 'blog',
			'need_isotope' => true,
			'container_classes' => 'no_margins',
			'title'  => esc_html__('Square tile /4 columns/', 'lorem-ipsum-books-media-store'),
			'thumb_title'  => esc_html__('Medium square image (crop)', 'lorem-ipsum-books-media-store'),
			'w'		 => 370,
			'h'		 => 370
		));*/
		/*lorem_ipsum_books_media_store_add_template(array(
			'layout' => 'colored_1',
			'template' => 'portfolio',
			'mode'   => 'blog',
			'need_isotope' => true,
			'need_terms' => true,
			'title'  => esc_html__('Colored excerpt', 'lorem-ipsum-books-media-store'),
			'thumb_title'  => esc_html__('Medium square image (crop)', 'lorem-ipsum-books-media-store'),
			'w'		 => 370,
			'h'		 => 370
		));*/
		lorem_ipsum_books_media_store_add_template(array(
			'layout' => 'colored_2',
			'template' => 'portfolio',
			'mode'   => 'blog',
			'need_isotope' => true,
			'need_terms' => true,
			'title'  => esc_html__('Colored tile (with hovers, width=height) /2 columns/', 'lorem-ipsum-books-media-store'),
			'thumb_title'  => esc_html__('Medium course image (crop)', 'lorem-ipsum-books-media-store'),
			'w'		 => 370,
			'h' 	 => 330
		));
		lorem_ipsum_books_media_store_add_template(array(
			'layout' => 'colored_3',
			'template' => 'portfolio',
			'mode'   => 'blog',
			'need_isotope' => true,
			'need_terms' => true,
			'title'  => esc_html__('Colored tile /3 columns/', 'lorem-ipsum-books-media-store'),
			'thumb_title'  => esc_html__('Medium course image (crop)', 'lorem-ipsum-books-media-store'),
			'w'		 => 370,
			'h'		 => 330
		));
		/*lorem_ipsum_books_media_store_add_template(array(
			'layout' => 'colored_4',
			'template' => 'portfolio',
			'mode'   => 'blog',
			'need_isotope' => true,
			'need_terms' => true,
			'title'  => esc_html__('Colored tile /4 columns/', 'lorem-ipsum-books-media-store'),
			'thumb_title'  => esc_html__('Medium course image (crop)', 'lorem-ipsum-books-media-store'),
			'w'		 => 370,
			'h'		 => 330
		));
		lorem_ipsum_books_media_store_add_template(array(
			'layout' => 'short_2',
			'template' => 'portfolio',
			'mode'   => 'blog',
			'need_isotope' => true,
			'need_terms' => true,
			'container_classes' => 'no_margins',
			'title'  => esc_html__('Short info /2 columns/', 'lorem-ipsum-books-media-store'),
			'thumb_title'  => esc_html__('Medium square image (crop)', 'lorem-ipsum-books-media-store'),
			'w'		 => 370,
			'h' 	 => 370
		));
		lorem_ipsum_books_media_store_add_template(array(
			'layout' => 'short_3',
			'template' => 'portfolio',
			'mode'   => 'blog',
			'need_isotope' => true,
			'need_terms' => true,
			'container_classes' => 'no_margins',
			'title'  => esc_html__('Short info /3 columns/', 'lorem-ipsum-books-media-store'),
			'thumb_title'  => esc_html__('Medium square image (crop)', 'lorem-ipsum-books-media-store'),
			'w'		 => 370,
			'h'		 => 370
		));
		lorem_ipsum_books_media_store_add_template(array(
			'layout' => 'short_4',
			'template' => 'portfolio',
			'mode'   => 'blog',
			'need_isotope' => true,
			'need_terms' => true,
			'container_classes' => 'no_margins',
			'title'  => esc_html__('Short info /4 columns/', 'lorem-ipsum-books-media-store'),
			'thumb_title'  => esc_html__('Medium square image (crop)', 'lorem-ipsum-books-media-store'),
			'w'		 => 370,
			'h'		 => 370
		));
		lorem_ipsum_books_media_store_add_template(array(
			'layout' => 'alter_2',
			'template' => 'portfolio',
			'mode'   => 'blog',
			'need_isotope' => true,
			'container_classes' => 'small_margins',
			'title'  => esc_html__('Alternative grid (with hovers) /2 columns/', 'lorem-ipsum-books-media-store'),
			'thumb_title'  => esc_html__('Medium square image (crop)', 'lorem-ipsum-books-media-store'),
			'w'		 => 370,
			'h' 	 => 370
		));
		lorem_ipsum_books_media_store_add_template(array(
			'layout' => 'alter_3',
			'template' => 'portfolio',
			'mode'   => 'blog',
			'need_isotope' => true,
			'container_classes' => 'small_margins',
			'title'  => esc_html__('Alternative grid /3 columns/', 'lorem-ipsum-books-media-store'),
			'thumb_title'  => esc_html__('Medium square image (crop)', 'lorem-ipsum-books-media-store'),
			'w'		 => 370,
			'h'		 => 370
		));
		lorem_ipsum_books_media_store_add_template(array(
			'layout' => 'alter_4',
			'template' => 'portfolio',
			'mode'   => 'blog',
			'need_isotope' => true,
			'container_classes' => 'small_margins',
			'title'  => esc_html__('Alternative grid /4 columns/', 'lorem-ipsum-books-media-store'),
			'thumb_title'  => esc_html__('Medium square image (crop)', 'lorem-ipsum-books-media-store'),
			'w'		 => 370,
			'h'		 => 370
		));*/
		// Add template specific scripts
		add_action('lorem_ipsum_books_media_store_action_blog_scripts', 'lorem_ipsum_books_media_store_template_portfolio_add_scripts');
	}
}

// Add template specific scripts
if (!function_exists('lorem_ipsum_books_media_store_template_portfolio_add_scripts')) {
	//Handler of add_action('lorem_ipsum_books_media_store_action_blog_scripts', 'lorem_ipsum_books_media_store_template_portfolio_add_scripts');
	function lorem_ipsum_books_media_store_template_portfolio_add_scripts($style) {
		if (lorem_ipsum_books_media_store_substr($style, 0, 10) == 'portfolio_' 
			|| lorem_ipsum_books_media_store_substr($style, 0, 5) == 'grid_' 
			|| lorem_ipsum_books_media_store_substr($style, 0, 7) == 'square_' 
			|| lorem_ipsum_books_media_store_substr($style, 0, 6) == 'short_'
			|| lorem_ipsum_books_media_store_substr($style, 0, 6) == 'alter_' 
			|| lorem_ipsum_books_media_store_substr($style, 0, 8) == 'colored_') {
			wp_enqueue_script( 'isotope', lorem_ipsum_books_media_store_get_file_url('js/jquery.isotope.min.js'), array(), null, true );
			if ($style != 'colored_1')  {
				wp_enqueue_script( 'hoverdir', lorem_ipsum_books_media_store_get_file_url('js/hover/jquery.hoverdir.js'), array(), null, true );
				wp_enqueue_style( 'lorem-ipsum-books-media-store-portfolio-style', lorem_ipsum_books_media_store_get_file_url('css/core.portfolio.css'), array(), null );
			}
		}
	}
}

// Template output
if ( !function_exists( 'lorem_ipsum_books_media_store_template_portfolio_output' ) ) {
    function lorem_ipsum_books_media_store_template_portfolio_output($post_options, $post_data) {
        $show_title = !in_array($post_data['post_format'], array('aside', 'chat', 'status', 'link', 'quote'));
        $parts = explode('_', $post_options['layout']);
        $style = $parts[0];
        $columns = max(1, min(12, empty($post_options['columns_count'])
            ? (empty($parts[1]) ? 1 : (int) $parts[1])
            : $post_options['columns_count']
        ));
        $tag = lorem_ipsum_books_media_store_in_shortcode_blogger(true) ? 'div' : 'article';
        if ($post_options['hover']=='square effect4') $post_options['hover']='square effect5';
        $link_start = !isset($post_options['links']) || $post_options['links'] ? '<a href="'.esc_url($post_data['post_link']).'">' : '';
        $link_end = !isset($post_options['links']) || $post_options['links'] ? '</a>' : '';
            ?>


			<div class="isotope_item isotope_item_<?php echo esc_attr($style); ?> isotope_item_<?php echo esc_attr($post_options['layout']); ?> isotope_column_<?php echo esc_attr($columns); ?>
            <?php
            if ($post_options['filters'] != '') {
                if ($post_options['filters']=='categories' && !empty($post_data['post_terms'][$post_data['post_taxonomy']]->terms_ids))
                    echo ' flt_' . esc_attr(join(' flt_', $post_data['post_terms'][$post_data['post_taxonomy']]->terms_ids));
                else if ($post_options['filters']=='tags' && !empty($post_data['post_terms'][$post_data['post_taxonomy_tags']]->terms_ids))
                    echo ' flt_' . esc_attr(join(' flt_', $post_data['post_terms'][$post_data['post_taxonomy_tags']]->terms_ids));
            }
            ?>">
				<<?php lorem_ipsum_books_media_store_show_layout($tag); ?> class="post_item post_item_<?php echo esc_attr($style); ?> post_item_<?php echo esc_attr($post_options['layout']); ?>
            <?php echo 'post_format_'.esc_attr($post_data['post_format'])
                . ($post_options['number']%2==0 ? ' even' : ' odd')
                . ($post_options['number']==0 ? ' first' : '')
                . ($post_options['number']==$post_options['posts_on_page'] ? ' last' : '');
            ?>">
	
					<div class="post_content isotope_item_content">
						<div class="post_featured img">
						<?php
                        lorem_ipsum_books_media_store_show_layout($post_data['post_thumb'], $link_start, $link_end);

            if ($style=='colored') {
                require lorem_ipsum_books_media_store_get_file_dir('templates/_parts/reviews-summary.php');
                $new = lorem_ipsum_books_media_store_get_custom_option('mark_as_new', '', $post_data['post_id'], $post_data['post_type']);			// !!!!!! Get option from specified post
                if ($new && $new > date('Y-m-d')) {
                    ?><div class="post_mark_new"><?php esc_html_e('NEW', 'lorem-ipsum-books-media-store'); ?></div><?php
                }
            }
            ?>
			</div>
            <div class="course_hover">
                <div class="course_descr">
                    <?php
                        lorem_ipsum_books_media_store_show_layout(substr($post_data['post_excerpt'], 0, $post_options['descr']));
                    ?>
                </div>
                <div class="course_buttons">
                    <?php
                    if(function_exists('lorem_ipsum_books_media_store_sc_button')) lorem_ipsum_books_media_store_show_layout(lorem_ipsum_books_media_store_sc_button(array('size'=>'small', 'link'=>$post_data['post_link'], 'style'=> 'border', 'color_preset' => '6'), esc_html__('MORE', 'lorem-ipsum-books-media-store')));
                        if($post_data['post_type'] == 'courses') {
                            $course_product = get_permalink(lorem_ipsum_books_media_store_get_custom_option('product', '', $post_data['post_id'], $post_data['post_type']));
                            if(function_exists('lorem_ipsum_books_media_store_sc_button')){
                                echo (!empty($course_product) ? trim(lorem_ipsum_books_media_store_sc_button(array('size' => 'small', 'link' => $course_product, 'style' => 'border', 'color_preset' => '6'), esc_html__('Buy Now', 'lorem-ipsum-books-media-store'))) : '');
                            }
                        }
                    ?>
                </div>
            </div>

            <?php
            if ($style=='colored') {
                ?>
                <div class="post_inner">
                    <div class="post_inner_position">
                        <h5 class="post_title"><?php lorem_ipsum_books_media_store_show_layout($post_data['post_title'], $link_start, $link_end); ?></h5>
                        <div class="post_descr">
                            <?php
                            $category = !empty($post_data['post_terms'][$post_data['post_taxonomy']]->terms)
                                ? ($post_data['post_terms'][$post_data['post_taxonomy']]->terms[0]->link ? '<a href="'.esc_url($post_data['post_terms'][$post_data['post_taxonomy']]->terms[0]->link).'">' : '')
                                . ($post_data['post_terms'][$post_data['post_taxonomy']]->terms[0]->name)
                                . ($post_data['post_terms'][$post_data['post_taxonomy']]->terms[0]->link ? '</a>' : '')
                                : '';
                            ?>
                            <div class="post_category"><?php lorem_ipsum_books_media_store_show_layout($category); ?></div>
                        </div>
                    </div>
                </div>
            <?php
            }
             ?>
					</div>				<!-- /.post_content -->
				</<?php lorem_ipsum_books_media_store_show_layout($tag); ?>>	<!-- /.post_item -->
			</div>						<!-- /.isotope_item -->
			<?php
        }
}
?>
<?php
/**
 * The template for displaying archive pages
 */

get_header(); 

$container_call = lipi__website_global_full_width_design_control();  
?>
	<div class="<?php echo esc_html($container_call); ?> content-wrapper body-content">
    <div class="row margin-top-60">
        <div class="col-md-9 col-sm-12">  

		<?php if ( have_posts() ) : ?>

			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();
				get_template_part( 'template/content', get_post_format() );
			endwhile;

			// Previous/next page navigation.
			   echo '<div class="pagination-nav-links">';
				the_posts_pagination( array(
					'prev_text'          => '&lt;',
					'next_text'          => '&gt;',
				) );
			   echo '</div>';

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template/content', 'none' );

		endif;
		?>

		<div class="clearfix"></div>
        </div>
		<?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>
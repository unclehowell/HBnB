<?php 
/*
Template Name: Blank Page
*/ 
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<?php $global_website_presentation = lipi__website_global_design_control(); ?>
<body <?php body_class($global_website_presentation); ?>>

<?php $container_call = lipi__website_global_full_width_design_control(); ?>
<div class="<?php echo esc_html($container_call); ?> content-wrapper body-content">
    <div class="row margin-top-60 margin-bottom-60">
        <div class="col-md-12 col-sm-12"> 
			<?php
            // Start the loop.
            while ( have_posts() ) : the_post();
            
                // Include the single post content template.
                get_template_part( 'template/content', 'page' );
            
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) {
                    echo '<div class="page-comment">';
                    comments_template();
                    echo '</div>';
                }
            
                // End of the loop.
            endwhile;
            ?>	
        </div>
    </div>
</div>
</body>
</html>
<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package clp-theme
 */

get_header();
?>

	<?php do_action('clp_before_single_project'); ?>

	<main id="primary" class="site-main">
		<div class="entry-content">
			<section id="main" class="container-section">
				<div class="container">
			
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', get_post_type() );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							//comments_template();
						endif;

					endwhile; // End of the loop.
					?>
				
				</div>
			</section>
		</div>
	</main>
	
	<?php do_action('clp_after_single_project'); ?>

<?php

// Script single project
add_action( 'wp_footer', function(){
	wp_register_script( 'cpl-project', THEME_URI . '/js/cpl-project.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'cpl-project' );
	wp_register_script( 'cpl-project-comments', THEME_URI . '/js/cpl-project-comments.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'cpl-project-comments' );
	echo '<script type="text/javascript">
		var clp_ajax_url = "' . admin_url( "admin-ajax.php" ) . '"
		var clp_ajax_nonce = "' . wp_create_nonce( "secure_nonce_name" ) . '"
	</script>';
} );



get_footer();

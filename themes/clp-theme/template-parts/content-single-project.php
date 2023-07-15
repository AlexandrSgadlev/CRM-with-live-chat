<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package clp-theme
 */

if( !is_user_logged_in() ) {
	return;
}	



// Project
global $post;
$post_meta = get_post_meta( $post->ID );
	

?>

<tr>
	<td>
		<p class="cpl-project-val val-project_title">	
			<a href="<?php echo get_post_permalink( $post->ID ); ?>" class="cpl-project-link" target="_blank" ><?php echo 'Project-' . get_the_title(); ?></a>
		</p>
	</td>
	<td>
		<?php 
			$project_status = wp_get_post_terms( $post->ID, 'project-status' );
			if( isset($project_status) && !empty($project_status) ){
				foreach( $project_status as $term ){
					echo '<p class="cpl-project-val val-project_status">' . __($term->name, THEME_NAME) . '</p>';
				}
			}
		?>
	</td>
	<td>
		<?php 
			$project_type = wp_get_post_terms( $post->ID, 'project-type' );
			if( isset($project_type) && !empty($project_type) ){
				foreach( $project_type as $term ){
					echo '<p class="cpl-project-val val-project_type">' . __($term->name, THEME_NAME) . '</p>';
				}
			}
		?>
	</td>
	<td>
		<p class="cpl-project-val val-project_price_value">
		<?php 
			if( (empty($post_meta['project_price_value'][0])) ){ 
				_e('-//-', THEME_NAME);; 
			}else{
				echo number_format($post_meta['project_price_value'][0]);
				if($post_meta['project_price_currency'][0] == 'USD') echo ' $';
				if($post_meta['project_price_currency'][0] == 'EUR') echo ' €';
				if($post_meta['project_price_currency'][0] == 'RUB') echo ' ₽';													
			}
		?>
		</p>
	</td>
	<td>
		<p class="cpl-project-val val-project_date">
		<?php 
			echo get_the_date( 'd.m.Y', $post->ID );
		?>
		</p>
	</td>
	<td>
		<p class="cpl-project-val val-project_modified_date">
		<?php 
			echo get_the_modified_date( 'd.m.Y', $post->ID );
		?>
		</p>
	</td>
</tr>
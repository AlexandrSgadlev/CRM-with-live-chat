<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package clp-theme
 */

get_header();


if ( isset($_POST['order']) && $_POST['order'] == 'DESC' ){
	$project_sort = 'down';
}else{
	$project_sort = 'up';
}
if ( !isset($_POST['orderby']) ){
	$_POST['orderby'] = '';
}


?>

	<?php do_action('clp_before_archive_project'); ?>

	<main id="primary" class="site-main">
	
		<section id="main" class="container-section">
			<div class="container">

			<?php if ( have_posts() ) : ?>

				<div class="cpl-page-header"><i class="um-faicon-filter"></i><?php _e('Filter', THEME_NAME); ?></div>

				<div class="filter-projects">
					<form>
						<div class="cpl-filter-area">

							<div class="cpl-filter-section-left">
							<div class="cpl-filter-section">
								<div id="project_status" class="filter-element filter-status-project">						
									<h3 class="filter-title"><?php _e('Project Status', THEME_NAME); ?>:</h3>
									<div class="filter-items filter-items-checkbox">
									<?php 
										$terms = get_terms( 'project-status', array(
											'hide_empty' => false,
											'orderby' => 'term_order',
										) );
										if ( !empty( $terms ) ){
											foreach($terms as $term){
												if( isset($_POST['project-status']) && ( $term->slug == $_POST['project-status'] || in_array( $term->slug, $_POST['project-status'] ) ) ){
													$input_checked = 'checked';
												}else{
													$input_checked = '';
												}
												echo '<div class="filter-item">
													<label data-term-slug="analytics">' .  __($term->name, THEME_NAME) . '
														<input type="checkbox" name="project-status" value="' . $term->slug . '"' . $input_checked . ' />
														<span class="term-label"></span>
													</label>
												</div>';
											}
										}
									?>
									</div>
								</div>
							</div>
							</div>

							<div class="cpl-filter-section-right">
								<div class="cpl-filter-section">
									<div class="filter-element">
										<h3 class="filter-title"><?php _e('Project Type', THEME_NAME); ?>:</h3>
										<div class="filter-items filter-items-select">
											<select name="project-type" id="type-project" class="clp-filter">
												<?php
												$terms = get_terms( 'project-type', array(
													'hide_empty' => false,
													'orderby' => 'term_order',
												) );
												echo '<option value="">' . __('All Project Type', THEME_NAME) . '</option>';
												foreach($terms as $term){
													$selected = '';
													if( isset($_POST['project-type']) && $_POST['project-type'] == $term->slug ){ $selected = 'selected';}
													echo '<option value="' . $term->slug . '" ' . $selected . '>' . __($term->name, THEME_NAME) . '</option>';
												}
												?>
											</select>
										</div>
									</div>
									<div class="filter-element filter-input-checkbox">
										<h3 class="filter-title"><?php _e('Keep Project', THEME_NAME); ?>:</h3>
										<div class="filter-items filter-items-checkbox">
											<div class="filter-item">
												<label data-term-slug="analytics"><?php _e('Hold', THEME_NAME); ?>
													<input type="checkbox" id="keep_project" class="clp-filter" name="keep_project" value="on" <?php if( isset($_POST['keep_project']) && $_POST['keep_project'] == 'on' ){ echo 'checked'; } ?> />
													<span class="term-label"></span>
												</label>
											</div>
										</div>
									</div>
								</div>


								<div class="cpl-filter-section">
									<div class="filter-element">
										<h3 class="filter-title"><?php _e('Price Value', THEME_NAME); ?>:</h3>
										<div class="filter-items filter-items-select">
											<select name="project_price_currency" id="project_price_currency" class="clp-filter">
												<?php
												$arr_project_type = array(
													'USD'                =>	'$',
													'EUR'	 =>	'€',
													'RUB'			 =>	'₽'
												);
												echo '<option value="">' . __('All Currency', THEME_NAME) . '</option>';
												foreach($arr_project_type as $k => $val){
													$selected = '';
													if( isset($_POST['project_price_currency']) && $_POST['project_price_currency'] == $k ){ $selected = 'selected';}
													echo '<option value="' . $k . '" ' . $selected . '>' . __($val, THEME_NAME) . '</option>';
												}
												?>
											</select>
										</div>
									</div>
									<div class="filter-element filter-input-checkbox">
										<h3 class="filter-title"><?php _e('Unread Message', THEME_NAME); ?>:</h3>
										<div class="filter-items filter-items-checkbox">
											<div class="filter-item">
												<label data-term-slug="analytics"><?php _e('Customer', THEME_NAME); ?>
													<input type="checkbox" id="new_message_manager" class="clp-filter" name="new_message_manager" value="0" <?php if( isset($_POST['new_message_manager']) && $_POST['new_message_manager'] >= 0 ){ echo 'checked'; } ?> />
													<span class="term-label"></span>
												</label>
											</div>
										</div>
									</div>
								</div>
								
								<div class="cpl-filter-section">
									<div class="filter-element">
										<h3 class="filter-title"><?php _e('Project ID', THEME_NAME); ?>:</h3>
										<div class="filter-items filter-items-select">
											<input type="number" class="clp-filter" id="project_title" name="title" value="" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'" />
										</div>
									</div>
								</div>
								
							</div>
							<div class="clp-filter-btn">
								<div class="container-btn">
									<a href="/" id="clear-filter" type="sumbit" class="btn clear-filter"><?php _e('Clear', THEME_NAME); ?></a>
									<button id="search-filter" type="sumbit" class="btn search-filter"><?php _e('Search', THEME_NAME); ?></button>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="cpl-page-header"><i class="um-faicon-tasks"></i><?php _e('Projects', THEME_NAME); ?> (<span id="count-projects"><?php echo $wp_query->found_posts; ?></span>)</div>
				<table class="projects-list">
					<thead>
						<tr>
							<th class="title-project-val title-project-val-project_link"><?php _e('Name', THEME_NAME); ?></th>
							<th class="title-project-val title-project-val-project_status"><?php _e('Status', THEME_NAME); ?></th>
							<th class="title-project-val title-project-val-project_type"><?php _e('Project Type', THEME_NAME); ?></th>
							<th class="title-project-val title-project-val-project_price_value">
								<div class="cpl-filter-section">
									<label><?php _e('Cost', THEME_NAME); ?></label>
									<div class="cpl-filter-sort-item">
										<label>
											<input type="radio" class="cpl-filter-sort-btn" name="sort_project" data-orderby="project_price_value" value="DESC" <?php if( $_POST['orderby'] == 'project_price_value' && $project_sort == 'down' ){ echo 'checked'; } ?> />
											<span>&#9206;</span>
										</label>
										<div class="cpl-filter-sep"></div>
										<label>
											<input type="radio" class="cpl-filter-sort-btn" name="sort_project" data-orderby="project_price_value" value="ASC" <?php if( $_POST['orderby'] == 'project_price_value' && $project_sort == 'up' ){ echo 'checked'; } ?> />
											<span>&#9207;</span>
										</label>
									</div>
								</div>
							</th>
							<th class="title-project-val title-project-val-post_data">
								<div class="cpl-filter-section">
									<label><?php _e('Date', THEME_NAME); ?></label>
									<div class="cpl-filter-sort-item">
										<label>
											<input id="sort-projects-default" type="radio" class="cpl-filter-sort-btn" name="sort_project" data-orderby="post_data" value="DESC" <?php if( $_POST['orderby'] == 'post_data' && $project_sort == 'down' || empty($_POST['orderby']) ){ echo 'checked'; } ?> />
											<span>&#9206;</span>
										</label>
										<div class="cpl-filter-sep"></div>
										<label>
											<input type="radio" class="cpl-filter-sort-btn" name="sort_project" data-orderby="post_data" value="ASC" <?php if( $_POST['orderby'] == 'post_data' && $project_sort == 'up' ){ echo 'checked'; } ?>/>
											<span>&#9207;</span>
										</label>
									</div>
								</div>
							</th>
							<th class="title-project-val title-project-val-modified_date">
								<div class="cpl-filter-section">
									<label><?php _e('Update Date', THEME_NAME); ?></label>
									<div class="cpl-filter-sort-item">
										<label>
											<input type="radio" class="cpl-filter-sort-btn" name="sort_project" data-orderby="modified" value="DESC" <?php if( $_POST['orderby'] == 'modified' && $project_sort == 'down' ){ echo 'checked'; } ?>/>
											<span>&#9206;</span>
										</label>
										<div class="cpl-filter-sep"></div>
										<label>
											<input type="radio" class="cpl-filter-sort-btn" name="sort_project" data-orderby="modified" value="ASC" <?php if( $_POST['orderby'] == 'modified' && $project_sort == 'up' ){ echo 'checked'; } ?>/>
											<span>&#9207;</span>
										</label>
									</div>
								</div>
							</th>
						</tr>
					</thead>
					
					<tbody id="project_list">
					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						
						the_post();
						
						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content-single', get_post_type() );

					

					endwhile;
					
					

				?>
					</tbody>
					
				</table>

				<?php
					$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
					echo '<div id="cpl_posts_nav" class="cpl-posts_nav" data-page_projects="' . $paged . '">';
						wpbeginner_numeric_posts_nav();
					echo '</div>';

			else :

				echo '<p>' . __('No projects found', THEME_NAME) . '</p>';

			endif;
			?>
			
			</div>
			
		</section>

	</main>
	
	<?php do_action('clp_after_archive_project'); ?>
	
<?php

// Script archive project
add_action( 'wp_footer', function(){
	wp_register_script( 'cpl-projects', THEME_URI . '/js/cpl-projects.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'cpl-projects' );
	echo '<script type="text/javascript">
		var clp_ajax_url = "' . admin_url( "admin-ajax.php" ) . '"
		var clp_ajax_nonce = "' . wp_create_nonce( "secure_nonce_name" ) . '"
	</script>';
} );

get_footer();

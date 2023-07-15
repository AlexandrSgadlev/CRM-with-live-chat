<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package clp-theme
 */


// Current user
$current_user = wp_get_current_user();
$class = '';
if(is_user_logged_in()){
	if ( in_array( 'administrator', (array) $current_user->roles ) ) {
		$class = 'customer administrator';
		$update_project = true;
	}
	if ( in_array( 'um_project-manager', (array) $current_user->roles ) ) {
		$class = 'project-manager';
		$update_project = true;
	}
	if ( in_array( 'um_customer', (array) $current_user->roles ) ) {
		$class = 'customer';
		$update_project = false;
	}
}


// Project
global $post;
$post_meta = get_post_meta( $post->ID );
$project_id = '';
if(isset($post_meta['project_id'][0]) && !empty($post_meta['project_id'][0])){
	$project_id = ['project_id'][0];
}



if(	$update_project == false ){
	update_post_meta(  $post->ID, 'update_check_project', '0' );
}

// Author
if( isset($post_meta['customer_id'][0]) && !empty($post_meta['customer_id'][0]) ){
	$author = get_user_by('ID', $post_meta['customer_id'][0]);
}

if( isset($author) && !empty($author) ){
	if( isset($author->user_email) && !empty($author->user_email) ){
		$author_email = $author->user_email;
	}
	$author_name = get_user_meta( $post_meta['customer_id'][0], 'user_name', true );
	if( empty($author_name) ){
		$author_name = $author->user_login;
	}
	if($post_meta['customer_id'][0] == $current_user->ID ){
		$user_profil_url = '/account-page/';
		$author_email = '';
	}else{
		$author_email = $post_meta['customer_email'][0];
		$user_profil_url = um_user_profile_url( $post_meta['customer_id'][0] );
	}
	$author_name = '<a href="' . $user_profil_url . '">' . $author_name . '</a>';
}

							
// Tab active
$cur_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
$cur_tab = 'main-information';
if(strripos($cur_url, '/description/')){
	$cur_tab = 'description';
}
if(strripos($cur_url, '/payment/')){
	$cur_tab = 'payment';
}
if(strripos($cur_url, '/conversation/')){
	$cur_tab = 'conversation';
}

$new_messege = false;
$new_message_count = 0;

if( isset($post_meta['new_message_customer'][0]) ){
	if($cur_tab != 'conversation'){
		if ( $update_project == true ) {
			if($post_meta['new_message_customer'][0] >= 1){
				$new_messege = true;
				$new_message_count = $post_meta['new_message_customer'][0];
			}
		}else{
			if($post_meta['new_message_manager'][0] >= 1){
				$new_messege = true;
				$new_message_count = $post_meta['new_message_manager'][0];
			}
		}
	}else{
		if ( $update_project == true ) {
			if($post_meta['new_message_customer'][0] == 1){
				update_post_meta(  $post_id, 'new_message_customer', '0' );
			}
		}else{
			if($post_meta['new_message_manager'][0] == 1){
				update_post_meta(  $post_id, 'new_message_manager', '0' );
			}
		}
	}
}


						




?>


<article id="post-<?php the_ID(); ?>" <?php post_class($class); ?>>
	
	<div class="entry-content">
	
		<div id="project" class="project um um-account" <?php if($update_project == true){echo 'data_update_project="1"';}; ?> >
	
			<div class="um-account-bar">
				<div class="um-account-side">
					<header class="entry-header">
						<h1 class="entry-title">
							<?php echo __('Project', THEME_NAME) . '-' . $project_id; ?>
						</h1>
						<div class="um-meta-project">
							<?php if( isset($author_name) && !empty($author_name) ): ?>
							<div class="meta-project-author">
								<p class="text-meta-project">
									<span class="label-meta-project"><?php _e('Created by', THEME_NAME); ?></span>
									<span class="value-meta-project"><?php echo $author_name; ?></span>
								</p>
							</div>
							<?php endif; ?>
							<?php if( isset($author_email) && !empty($author_email) ): ?>
							<div class="meta-project-email">
								<p class="text-meta-project">
									<span class="label-meta-project"><?php _e('Email: ', THEME_NAME); ?></span>
									<span class="value-meta-project"><?php echo $author_email; ?></span>
								</p>
							</div>
							<?php endif; ?>
						</div>
					</header>
					<div class="um um-account um-editing um-um_account_id">
						<ul>
							<li>
								<a data-tab="main-information" href="<?php echo get_post_permalink( $post->ID ); ?>main-information/" class="um-account-link <?php if ( $cur_tab == 'main-information' ) echo 'current'; ?>">
									<span class="um-account-icon">
										<i class="um-faicon-cogs"></i>
									</span>
									<span class="um-account-title uimob800-hide"><?php echo __('Main Information', THEME_NAME); ?></span>
									<span class="um-account-arrow uimob800-hide">
										<i class="um-faicon-angle-right"></i>
									</span>
								</a>
							</li>
							<li>
								<a data-tab="description" href="<?php echo get_post_permalink( $post->ID ); ?>description/" class="um-account-link <?php if ( $cur_tab == 'description' ) echo 'current'; ?>">
									<span class="um-account-icon">
										<i class="um-faicon-pencil"></i>
									</span>
									<span class="um-account-title"><?php echo __('Description', THEME_NAME); ?></span>
									<span class="um-account-arrow">
										<i class="um-faicon-angle-right"></i>
									</span>
								</a>
							</li>
							<li>
								<a id="link-tab-conversation" data-tab="conversation" href="<?php echo get_post_permalink( $post->ID ); ?>conversation/" class="um-account-link link-tab-conversation <?php if ( $new_messege  ) echo 'new-messege'; ?> <?php if ( $cur_tab == 'conversation' ) echo 'current'; ?>">
									<span class="um-account-icon">
										<i class="um-faicon-comments"></i>
									</span>
									<span class="um-account-title"><?php echo __('Conversation', THEME_NAME); ?> <span class="new-message-count"><?php if ( $new_message_count >= 1  ) echo '(' . $new_message_count . ')'; ?></span></span>
									<span class="um-account-arrow">
										<i class="um-faicon-angle-right"></i>
									</span>
								</a>
							</li>
						</ul>
					</div>
					<?php if($update_project): ?>						
						<div class="container-btn project-btn">
							<button type="sumbit" id="btn-edit-project" class="btn">Edit</button>
							<button type="sumbit" id="btn-updata-project" class="btn btn-type-1">Update</button>
						</div>
						<div id="update-project-form-errore" class="response-output-errore-form server-errore" style="display: none" aria-hidden="true"></div>
					<?php endif; ?>			
				</div>
			</div>



			<div class="um-account-main" data-current_tab="<?php echo $cur_tab; ?>">

				<form id='updata-project-form' name="updata-project" method="post" action="" class="updata-project">
					<div class="updata-project-form-entry disable-form">
					
						<div class="um-account-tab clp-tab-main-information" data-tab="main-information">
							<div class="um-account-heading uimob340-hide uimob500-hide"><i class="um-faicon-cogs"></i>Main Information</div>
							<div id="tab-content-main-information" class="tab-content">
								<?php get_template_part( 'template-parts/tab/tab-main-information', null, [ 'post_meta' => $post_meta, 'update_project' => $update_project ] ); ?>
							</div>
						</div>
						
						<div class="um-account-tab clp-tab-description" data-tab="description">
							<div class="um-account-heading"><i class="um-faicon-pencil"></i>Description</div>
							<div id="tab-content-description" class="tab-content">
								<?php get_template_part( 'template-parts/tab/tab-description', null, [ 'post_meta' => $post_meta, 'update_project' => $update_project ] ); ?>	
							</div>
						</div>
						
						<input type="hidden" name="post_ID" value="<?php echo $post->ID; ?>" id="post_ID" class="clp-field-update" disabled>

					</div>
				</form>

				<div class="um-account-tab um-account-tab-conversation" data-tab="conversation">
							
					<div class="um-account-heading"><i class="um-faicon-comments"></i>Conversation</div>

					<div class="clp-comments-content">
						<?php
							comments_template('/template-parts/comments-project.php');
						?>
						<div class="um-clear"></div>
					</div>

				</div>

				
			</div>

		</div>
		
		<div class="um-clear"></div>
		
	</div>
</article><!-- #post-<?php the_ID(); ?> -->

<div class="um-clear"></div>
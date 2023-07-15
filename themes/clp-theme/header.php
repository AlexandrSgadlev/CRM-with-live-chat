<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package clp-theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<header class="site-header">
	
		<div class="background-header"></div>
		
		<div class="container">
	
			<div class="top-header">
				<p>
					<span class="header-email"></span>
					<span class="header-account">
					
						<?php 
							if( !is_user_logged_in() ):
						?>
					
						<a href="/login/" class="cpl-btn link-type-2">
							<span class="label-link"><?php echo __('Login', THEME_NAME); ?></span>
							<span class="um-account-icon uimob800-hide"><i class="um-faicon-sign-in" aria-hidden="true"></i></span>
						</a>
						
						<?php 
							endif;
						?>	
						
						<?php 
							if( is_user_logged_in() ):
						?>
					
						<a href="/account-page/" class="cpl-btn link-type-2">
							<span class="label-link"><?php echo __('Account', THEME_NAME); ?></span>
							<span class="um-account-icon uimob800-hide"><i class="um-faicon-user"></i></span>
						</a>
						
						<span class="um-link-alt-sep"></span>
						
						<a href="/logout/" class="cpl-btn link-type-2">
							<span class="label-link"><?php echo __('Logout', THEME_NAME); ?></span>
							<span class="um-account-icon uimob800-hide"><i class="um-faicon-sign-out" aria-hidden="true"></i></span></span>
						</a>
						
						<?php 
							endif;
						?>							
						
					</span>
				</p>
			</div>

		</div>
				
	</header>
	<?php do_action('after_vet_header'); ?>
		


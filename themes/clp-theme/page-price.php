<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package clp-theme
 */

get_header();
?>

<style>
#main .main-section{
	display: flex;
	flex-wrap: wrap;
	align-items: center;
}
#main .main-section .main-text-content{
	width: 50%;
	min-height: 400px;
}
#main .main-section .main-img-content{
	width: 50%;
	z-index: 10000;
}

.project-form .clp-col-row .clp-field-area{
	padding: 10px 0px;
}
.project-form .clp-row-form{
	padding: 0px;
	margin-bottom: 40px;
}
.project-form .container-btn{
	margin-bottom: 30px;
}
.project-form .clp-row-form .clp-block-label{
	margin-bottom: 10px;
	padding-bottom: 10px;
	border-bottom: 1px solid rgba(0,0,0,.2);
}
.project-form .clp-row-form .clp-block-label label{
	color: #091e50;
	font-weight: 700;
	font-size: 1.1rem;
	margin: 0px;
	line-height: 100%;
}
.project-form .clp-row-form .clp-col-row{
	width: 100%;
	display: flex;
	flex-wrap: wrap;
	align-items: stretch;
}
.project-form .clp-row-form .login-block{
	width: 50%;
	padding-right: 15px;
}

.project-form .login-block .clp-dield-user-name{
	width: 50%;
	padding-right: 15px;
}
.project-form .login-block .clp-dield-user-email{
	width: 50%;
	padding-left: 15px;
}
.project-form .selected-type-project{
	width: auto;
}
.project-form .clp-fields-section .clp-field-label{
	width: 100%;
	padding: 0px;
}




.create-projects-form{
	width: 100%;
	display: block;
	margin-top: 100px;
}
.create-projects-form .tab-div .clp-field-val, .create-projects-form .tab-div .clp-field-example{
	width: 50%;
}
.create-projects-form .tab-div .clp-field-example{
	padding-left: 15px;
}
.create-projects-form .tab-div .clp-field-val{
	padding-right: 15px;
}

.create-projects-form .clp-row-form .clp-fields-section{
	padding-top: 20px;	
}
.create-projects-form .clp-field-label label{
	margin-bottom: 10px;
	padding-bottom: 0px;
	color: #091e50;
	font-weight: 600;
}
.create-projects-form .clp-row-form .clp-fields-section .tab-div:first-child{
	display: block;
}
.create-projects-form .clp-fields-section .tab-div{
	display: none;
}
.create-projects-form .clp-fields-section .clp-col-row{
    padding: 10px 0px;
}
.create-projects-form .clp-fields-section .clp-textarea-area textarea{
	display: block;
}
.create-projects-form .btn{
	max-width: 341px;
}
.create-projects-form .clp-field-description{
	padding: 10px;
	background: #e7f2fa;
	margin: 0px;
	display: block;
	height: 100%;
	border: 1px solid #ebebeb;
	position: relative;
	-webkit-box-shadow: 4px 4px 8px -5px rgba(34, 60, 80, 0.2);
	-moz-box-shadow: 4px 4px 8px -5px rgba(34, 60, 80, 0.2);
	box-shadow: 4px 4px 8px -5px rgba(34, 60, 80, 0.2);
	cursor: default;
}
.create-projects-form .clp-field-description:after{
	font-family: "FontAwesome" !important;
	font-style: normal !important;
	font-weight: normal !important;
	font-variant: normal !important;
	text-transform: none !important;
	speak: none;
	line-height: 1;
	-webkit-font-smoothing: antialiased;
	top: calc(50% - 14px);
	left: -10px;
	position: absolute;
	z-index: 1;
	color: #ebebeb;
	font-size: 28px;
	line-height: 1em !important;
	content: "\f0d9";
}
.create-projects-form .clp-errore-field{
	width: 100%;
	display: flex;
	padding: 0px;
}
.create-projects-form .clp-errore-field .field-not-valid .cpl-btn .label-link{
    margin: 0px 5px;
    font-weight: 700;
    text-transform: uppercase;
}

.create-projects-form .clp-response-output{
	background-color: #f5f4f9;
	border: 0px;
	font-size: 1.2rem;
	padding: 10px 15px;
}
.create-projects-form .clp-response-output.server-errore{
	border-left: 4px solid #C74A4A;
}
.create-projects-form .clp-response-output.server-success{
	border-left: 4px solid #1ab300;
}


.create-projects-form select:disabled, .create-projects-form input:disabled,
.create-projects-form textarea:disabled{
	opacity: 0.6 !important;
	cursor: no-drop !important;
	background: #FAFAFF !important;
	border: 1px solid #cbcbcb !important;
}




</style>

	<?php do_action('clp_before_page_price'); ?>

	<main id="primary" class="site-main">
		<div class="entry-content">
			<section id="main" class="container-section">
				<div class="container">

					<div class="main-section">
						<div class="main-text-content">
							<header class="entry-header">
								<h1 class="entry-title"><?php _e('Estimate the cost of the project', THEME_NAME); ?></h1>
								<p class="text-after-title">
									<?php _e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ut pulvinar erat. Morbi volutpat risus at commodo feugiat. Cras quis purus a lorem congue fermentum et eget lectus. Suspendisse pellentesque, elit in sodales scelerisque, quam ex semper ex, ultrices condimentum urna diam eget nunc. Aliquam convallis ipsum et sem ultricies, quis condimentum sapien pellentesque. Morbi nibh magna, efficitur eget arcu dapibus, laoreet iaculis nisl. Maecenas efficitur dolor quis lacus ullamcorper aliquet.', THEME_NAME); ?>
								</p>			
							</header>
						</div>
						<div class="main-img-content">
							<picture>
								<img decoding="async" src="/wp-content/themes/clp-theme/images/project.png" alt="Estimate the cost of the project">
							</picture>	
						</div>
					</div>


					<div class="create-projects-form cf7">

						<form name="project" method="post" action="" class="project-form">
							
							<?php if( !is_user_logged_in() ): ?>
							<div class="clp-row-form">	
								<div class="clp-block-label">
									<label><?php _e('Contact Details', THEME_NAME); ?></label><div class="um-clear"></div>
								</div>
								<div class="clp-col-row login-block">
									
										<div id="um_field_user_name" class="clp-field-area clp-dield-user-name field-response " data-key="user_name">
											<div class="clp-field-label">
												<label><?php _e('Name', THEME_NAME); ?><span class="clp-req" title="Required">*</span></label>
											</div>
											<div class="clp-field-val">
												<input autocomplete="off" class="clp-form-field clp-form-field-input valid" maxlength="20" type="text" name="user_name-69" id="user_name" value="" placeholder="Name *" data-validate="unique_username" data-key="user_login" />
											</div>
											<div class="clp-errore-field"></div>
										</div>
										<div id="um_field_user_email" class="clp-field-area clp-dield-user-email field-response" data-key="user_email">
											<div class="clp-field-label">
												<label><?php _e('Email', THEME_NAME); ?><span class="clp-req" title="Required">*</span></label>
											</div>
											<div class="clp-field-val">
												<input autocomplete="off" class="clp-form-field clp-form-field-input valid" type="text" maxlength="30" name="user_email-69" id="user_email" value="" placeholder="E-mail Address *" data-validate="unique_email" data-key="user_email" />
											</div>
											<div class="clp-errore-field"></div>
										</div>
									
								</div>
							</div>
								
							<?php endif; ?>
							

							<div class="clp-row-form">	
								<div class="clp-block-label">
									<label><?php _e('Choose Project Type', THEME_NAME); ?></label><div class="um-clear"></div>
								</div>
								<div class="clp-col-row">
									<div class="clp-field-area selected-type-project">
										<?php 
											$terms = get_terms( 'project-type', array(
												'hide_empty' => false,
												'orderby' => 'term_order',
											) );
											if ( !empty( $terms ) ){
												echo '<select id="project-type" class="select-tab clp-form-field-select">';
												foreach ( $terms as $term ){
													echo '<option value="' . $term->slug . '">' . __($term->name, THEME_NAME) . '</option>';
												}
												echo '</select>';
											}
										?>
									</div>
								</div>
								
								<div class="clp-fields-section">	
								<?php
			
								
									foreach ( $terms as $term ){
										$fields = get_term_meta( $term->term_id, 'clp_custom_meta_fields', true );
										
										echo '<div id="tab-' . $term->slug . '" class="tab-div">';
										
										foreach ( $fields as $field => $v ){
											if( !empty($v) ){
											$label = ''; $description = ''; $placeholder = ''; $hide = ''; $required = '';
											if( isset( $v['label'] ) ){ $label = $v['label']; }
											if( isset( $v['description'] ) ){ $description = $v['description']; }
											if( isset( $v['placeholder'] ) ){ $placeholder = $v['placeholder']; }
											if( isset( $v['required'] ) && $v['required'] == 1 ){ $required = '<span class="um-req" title="Required">*</span>'; }
											
											?>

												<div class="clp-col-row field-response">
													<div class="clp-field-label">
														<label><?php _e($label, THEME_NAME); ?><?php echo $required; ?></label>
													</div>
													<div class="clp-field-val">
														<div class="clp-textarea-area">
															<textarea autocomplete="off" class="clp-form-field clp-form-field-textarea" type="text" name="<?php echo $term->slug . '-' . $field;  ?>" id="<?php echo $term->slug . '-' . $field;  ?>" value="" placeholder="<?php _e($placeholder, THEME_NAME); ?>" data-key="<?php echo $term->slug . '-' . $v;  ?>" rows="4" cols="50"></textarea>
														</div>
													</div>
													<div class="clp-field-example">			
														<div class="clp-field-description">
															<?php _e($description, THEME_NAME); ?>
														</div>
													</div>
													<div class="clp-errore-field"></div>
												</div>

											<?php
											}
										}
										
										echo '</div>';
										
									}
								
								?>
								</div>
							</div>
							
							<!--<p class="um_request_name">
								<label><?php //_e('Only fill in if you are not human', THEME_NAME); ?></label>
								<input type="hidden" name="um_request" id="um_request_69" class="input" value="" size="25" autocomplete="off">
							</p>-->
							
							<div class="container-btn">
								<button type="sumbit" id="add-project" class="btn btn-1 text-center align-middle"><?php _e('Get a Quote →', THEME_NAME); ?></button>
							</div>	
							
							<div id="clp-response-server-errore" class="clp-response-output server-errore" style="display: none" aria-hidden="true"><?php _e('An error occurred, please try again later', THEME_NAME); ?></div>

							<div id="clp-response-server-success" class="clp-response-output server-success" style="display: none" aria-hidden="true"><?php _e('Thank you for your message, it has been sent successfully.</br>Check your mail, if there is no letter, it may have ended up in your spam folder.', THEME_NAME); ?></div>
					
						</form>

					</div>

				</div>
			</section>	
		</div>
	</main><!-- #main -->
	
	<?php do_action('clp_after_page_price'); ?>


<?php

// Script page new project
add_action( 'wp_footer', function(){
	wp_register_script( 'clp-add-project', THEME_URI . '/js/clp-add-project.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'clp-add-project' );
	echo '<script type="text/javascript">
		var clp_ajax_url = "' . admin_url( "admin-ajax.php" ) . '"
		var clp_ajax_nonce = "' . wp_create_nonce( "secure_nonce_name" ) . '"
	</script>';
} );


get_footer();

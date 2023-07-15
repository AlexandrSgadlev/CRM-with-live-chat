<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="um <?php echo esc_attr( $this->get_class( $mode ) ); ?> um-<?php echo esc_attr( $form_id ); ?>">
	<div class="um-form">
			<form method="post" action="">
						<?php
			/**
			 * UM hook
			 *
			 * @type action
			 * @title um_account_page_hidden_fields
			 * @description Show hidden fields on account form
			 * @input_vars
			 * [{"var":"$args","type":"array","desc":"Account shortcode arguments"}]
			 * @change_log
			 * ["Since: 2.0"]
			 * @usage add_action( 'um_account_page_hidden_fields', 'function_name', 10, 1 );
			 * @example
			 * <?php
			 * add_action( 'um_account_page_hidden_fields', 'my_account_page_hidden_fields', 10, 1 );
			 * function my_account_page_hidden_fields( $args ) {
			 *     // your code here
			 * }
			 * ?>
			 */
			do_action( 'um_account_page_hidden_fields', $args ); 
			
			?>
			
			
			
			<div class="um-account-bar">

				<div class="um-account-meta radius-<?php echo esc_attr( UM()->options()->get( 'profile_photocorner' ) ); ?>">

<?php 

					$classes = null;

					if ( ! $args['cover_enabled'] ) {
						$classes .= ' no-cover';
					}

					$default_size = str_replace( 'px', '', $args['photosize'] );

					// Switch on/off the profile photo uploader
					$disable_photo_uploader = empty( $args['use_custom_settings'] ) ? UM()->options()->get( 'disable_profile_photo_upload' ) : $args['disable_photo_upload'];

					if ( ! empty( $disable_photo_uploader ) ) {
						$args['disable_photo_upload'] = 1;
						$overlay = '';
					} else {
						$overlay = '<span class="um-profile-photo-overlay">
							<span class="um-profile-photo-overlay-s">
								<ins>
									<i class="um-faicon-camera"></i>
								</ins>
							</span>
						</span>';
					} ?>

					<div class="um-header<?php echo esc_attr( $classes ); ?>">

						<?php
						/**
						 * UM hook
						 *
						 * @type action
						 * @title um_pre_header_editprofile
						 * @description Insert some content before edit profile header
						 * @input_vars
						 * [{"var":"$args","type":"array","desc":"Form Arguments"}]
						 * @change_log
						 * ["Since: 2.0"]
						 * @usage add_action( 'um_pre_header_editprofile', 'function_name', 10, 1 );
						 * @example
						 * <?php
						 * add_action( 'um_pre_header_editprofile', 'my_pre_header_editprofile', 10, 1 );
						 * function my_pre_header_editprofile( $args ) {
						 *     // your code here
						 * }
						 * ?>
						 */
						//do_action( 'um_pre_header_editprofile', $args ); ?>

						<div class="um-profile-photo" data-user_id="<?php echo esc_attr( um_profile_id() ); ?>">

							<a href="<?php echo esc_url( um_user_profile_url() ); ?>" class="um-profile-photo-img" title="<?php echo esc_attr( um_user( 'display_name' ) ); ?>">
								<?php if ( ! $default_size || $default_size == 'original' ) {
									$profile_photo = UM()->uploader()->get_upload_base_url() . um_user( 'ID' ) . "/" . um_profile( 'profile_photo' );

									$data = um_get_user_avatar_data( um_user( 'ID' ) );
									echo $overlay . sprintf( '<img src="%s" class="%s" alt="%s" data-default="%s" onerror="%s" />',
										esc_url( $profile_photo ),
										esc_attr( $data['class'] ),
										esc_attr( $data['alt'] ),
										esc_attr( $data['default'] ),
										'if ( ! this.getAttribute(\'data-load-error\') ){ this.setAttribute(\'data-load-error\', \'1\');this.setAttribute(\'src\', this.getAttribute(\'data-default\'));}'
									);
								} else {
									echo $overlay . get_avatar( um_user( 'ID' ), $default_size );
								} ?>
							</a>

							<?php if ( empty( $disable_photo_uploader ) && empty( UM()->user()->cannot_edit ) ) {

								UM()->fields()->add_hidden_field( 'profile_photo' );

								if ( ! um_profile( 'profile_photo' ) ) { // has profile photo

									$items = array(
										'<a href="javascript:void(0);" class="um-manual-trigger" data-parent=".um-profile-photo" data-child=".um-btn-auto-width">' . __( 'Upload photo', 'ultimate-member' ) . '</a>',
										'<a href="javascript:void(0);" class="um-dropdown-hide">' . __( 'Cancel', 'ultimate-member' ) . '</a>',
									);

									/**
									 * UM hook
									 *
									 * @type filter
									 * @title um_user_photo_menu_view
									 * @description Change user photo on menu view
									 * @input_vars
									 * [{"var":"$items","type":"array","desc":"User Photos"}]
									 * @change_log
									 * ["Since: 2.0"]
									 * @usage
									 * <?php add_filter( 'um_user_photo_menu_view', 'function_name', 10, 1 ); ?>
									 * @example
									 * <?php
									 * add_filter( 'um_user_photo_menu_view', 'my_user_photo_menu_view', 10, 1 );
									 * function my_user_photo_menu_view( $items ) {
									 *     // your code here
									 *     return $items;
									 * }
									 * ?>
									 */
									$items = apply_filters( 'um_user_photo_menu_view', $items );

									UM()->profile()->new_ui( 'bc', 'div.um-profile-photo', 'click', $items );

								} elseif ( UM()->fields()->editing == true ) {

									$items = array(
										'<a href="javascript:void(0);" class="um-manual-trigger" data-parent=".um-profile-photo" data-child=".um-btn-auto-width">' . __( 'Change photo', 'ultimate-member' ) . '</a>',
										'<a href="javascript:void(0);" class="um-reset-profile-photo" data-user_id="' . esc_attr( um_profile_id() ) . '" data-default_src="' . esc_url( um_get_default_avatar_uri() ) . '">' . __( 'Remove photo', 'ultimate-member' ) . '</a>',
										'<a href="javascript:void(0);" class="um-dropdown-hide">' . __( 'Cancel', 'ultimate-member' ) . '</a>',
									);

									/**
									 * UM hook
									 *
									 * @type filter
									 * @title um_user_photo_menu_edit
									 * @description Change user photo on menu edit
									 * @input_vars
									 * [{"var":"$items","type":"array","desc":"User Photos"}]
									 * @change_log
									 * ["Since: 2.0"]
									 * @usage
									 * <?php add_filter( 'um_user_photo_menu_edit', 'function_name', 10, 1 ); ?>
									 * @example
									 * <?php
									 * add_filter( 'um_user_photo_menu_edit', 'my_user_photo_menu_edit', 10, 1 );
									 * function my_user_photo_menu_edit( $items ) {
									 *     // your code here
									 *     return $items;
									 * }
									 * ?>
									 */
									$items = apply_filters( 'um_user_photo_menu_edit', $items );

									UM()->profile()->new_ui( 'bc', 'div.um-profile-photo', 'click', $items );

								}

							} ?>

						</div>
					
					</div>






	

			

	
					
					<a href="<?php echo esc_url( um_user_profile_url() ); ?>">
						<div class="um-account-meta-img">
							<?php //echo get_avatar( um_user( 'ID' ), 120 ); ?>
						</div>
					</a>
					<div class="um-account-name">
						<?php 
							$author_name = get_user_meta( um_user( 'ID' ), 'user_name', true );
							if( !empty($author_name) ){
								echo esc_html($author_name);
							}else{
								echo esc_html( um_user( 'display_name' ) );
							}
						?>
					</div>
				</div>

				
				<div class="um-account-side">
				
					<ul>
						<?php foreach ( UM()->account()->tabs as $id => $info ) {
							if ( isset( $info['custom'] ) || UM()->options()->get( "account_tab_{$id}" ) == 1 || $id == 'general' ) { ?>

								<li>
									<a data-tab="<?php echo esc_attr( $id )?>" href="<?php echo esc_url( UM()->account()->tab_link( $id ) ); ?>" class="um-account-link <?php if ( $id == UM()->account()->current_tab ) echo 'current'; ?>">
										<?php if ( UM()->mobile()->isMobile() ) { ?>
											<span class="um-account-icontip uimob800-show" title="<?php echo esc_attr( $info['title'] ); ?>">
												<i class="<?php echo esc_attr( $info['icon'] ); ?>"></i>
											</span>
										<?php } else { ?>
											<span class="um-account-icontip uimob800-show um-tip-<?php echo is_rtl() ? 'e' : 'w'; ?>" title="<?php echo esc_attr( $info['title'] ); ?>">
												<i class="<?php echo esc_attr( $info['icon'] ); ?>"></i>
											</span>
										<?php } ?>

										<span class="um-account-icon uimob800-hide">
											<i class="<?php echo esc_attr( $info['icon'] ); ?>"></i>
										</span>
										<span class="um-account-title uimob800-hide"><?php echo esc_html( $info['title'] ); ?></span>
										<span class="um-account-arrow uimob800-hide">
											<i class="<?php if ( is_rtl() ) { ?>um-faicon-angle-left<?php } else { ?>um-faicon-angle-right<?php } ?>"></i>
										</span>
									</a>
								</li>

							<?php }
						} ?>
					</ul>
				</div>
			</div>
			
			<div class="um-account-main" data-current_tab="<?php echo esc_attr( UM()->account()->current_tab ); ?>">
			
				<?php
				/**
				 * UM hook
				 *
				 * @type action
				 * @title um_before_form
				 * @description Show some content before account form
				 * @input_vars
				 * [{"var":"$args","type":"array","desc":"Account shortcode arguments"}]
				 * @change_log
				 * ["Since: 2.0"]
				 * @usage add_action( 'um_before_form', 'function_name', 10, 1 );
				 * @example
				 * <?php
				 * add_action( 'um_before_form', 'my_before_form', 10, 1 );
				 * function my_before_form( $args ) {
				 *     // your code here
				 * }
				 * ?>
				 */
				do_action( 'um_before_form', $args );

				foreach ( UM()->account()->tabs as $id => $info ) {

					$current_tab = UM()->account()->current_tab;

					if ( isset( $info['custom'] ) || UM()->options()->get( 'account_tab_' . $id ) == 1 || $id == 'general' ) { ?>

						<div class="um-account-nav uimob340-show uimob500-show">
							<a href="javascript:void(0);" data-tab="<?php echo esc_attr( $id ); ?>" class="<?php if ( $id == $current_tab ) echo 'current'; ?>">
								<?php echo esc_html( $info['title'] ); ?>
								<span class="ico"><i class="<?php echo esc_attr( $info['icon'] ); ?>"></i></span>
								<span class="arr"><i class="um-faicon-angle-down"></i></span>
							</a>
						</div>

						<div class="um-account-tab um-account-tab-<?php echo esc_attr( $id ); ?>" data-tab="<?php echo esc_attr( $id  )?>">
							<?php $info['with_header'] = true;
							UM()->account()->render_account_tab( $id, $info, $args ); ?>
						</div>

					<?php }
				} ?>
				
			</div>
			<div class="um-clear"></div>
		</form>
		
		<?php
		/**
		 * UM hook
		 *
		 * @type action
		 * @title um_after_account_page_load
		 * @description After account form
		 * @change_log
		 * ["Since: 2.0"]
		 * @usage add_action( 'um_after_account_page_load', 'function_name', 10 );
		 * @example
		 * <?php
		 * add_action( 'um_after_account_page_load', 'my_after_account_page_load', 10 );
		 * function my_after_account_page_load() {
		 *     // your code here
		 * }
		 * ?>
		 */
		do_action( 'um_after_account_page_load' ); ?>

	</div>

</div>
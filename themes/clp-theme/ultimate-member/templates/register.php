<?php if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! is_user_logged_in() ) {
	um_reset_user();
} ?>

<div class="um <?php echo esc_attr( $this->get_class( $mode ) ); ?> um-<?php echo esc_attr( $form_id ); ?>">

	<div class="um-form" data-mode="<?php echo esc_attr( $mode ) ?>">

		<p class="clp-form-title"><?php echo __('Registration', THEME_NAME); ?></p>

		<form method="post" action="">

			<?php
			/**
			 * UM hook
			 *
			 * @type action
			 * @title um_before_form
			 * @description Some actions before register form
			 * @input_vars
			 * [{"var":"$args","type":"array","desc":"Register form shortcode arguments"}]
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
			do_action( "um_before_form", $args );

			/**
			 * UM hook
			 *
			 * @type action
			 * @title um_before_{$mode}_fields
			 * @description Some actions before register form fields
			 * @input_vars
			 * [{"var":"$args","type":"array","desc":"Register form shortcode arguments"}]
			 * @change_log
			 * ["Since: 2.0"]
			 * @usage add_action( 'um_before_{$mode}_fields', 'function_name', 10, 1 );
			 * @example
			 * <?php
			 * add_action( 'um_before_{$mode}_fields', 'my_before_fields', 10, 1 );
			 * function my_before_form( $args ) {
			 *     // your code here
			 * }
			 * ?>
			 */
			do_action( "um_before_{$mode}_fields", $args );

			/**
			 * UM hook
			 *
			 * @type action
			 * @title um_before_{$mode}_fields
			 * @description Some actions before register form fields
			 * @input_vars
			 * [{"var":"$args","type":"array","desc":"Register form shortcode arguments"}]
			 * @change_log
			 * ["Since: 2.0"]
			 * @usage add_action( 'um_before_{$mode}_fields', 'function_name', 10, 1 );
			 * @example
			 * <?php
			 * add_action( 'um_before_{$mode}_fields', 'my_before_fields', 10, 1 );
			 * function my_before_form( $args ) {
			 *     // your code here
			 * }
			 * ?>
			 */
			do_action( "um_main_{$mode}_fields", $args );

			/**
			 * UM hook
			 *
			 * @type action
			 * @title um_after_form_fields
			 * @description Some actions after register form fields
			 * @input_vars
			 * [{"var":"$args","type":"array","desc":"Register form shortcode arguments"}]
			 * @change_log
			 * ["Since: 2.0"]
			 * @usage add_action( 'um_after_form_fields', 'function_name', 10, 1 );
			 * @example
			 * <?php
			 * add_action( 'um_after_form_fields', 'my_after_form_fields', 10, 1 );
			 * function my_after_form_fields( $args ) {
			 *     // your code here
			 * }
			 * ?>
			 */
			do_action( 'um_after_form_fields', $args );


			$privacy_text = '<div class="um-col-alt-b text-privacy-policy">';

			$privacy_text .= __('By submitting the registration you accept our ', THEME_NAME);

			$privacy_policy = get_option( 'wp_page_for_privacy_policy' );
			if( $privacy_policy ) {
				$privacy_text .= '<a href="' . esc_url( get_permalink( $privacy_policy ) ) . '" class="um-link-alt">' . __('Privacy Policy', THEME_NAME) . '</a>';
			}else{
				$privacy_text .= __('Privacy Policy', THEME_NAME);
			}
			
			$privacy_text .= __(' and Cookie Use.', THEME_NAME);
			
			$privacy_text .= '</div>';
			
			echo $privacy_text;


			/**
			 * UM hook
			 *
			 * @type action
			 * @title um_after_{$mode}_fields
			 * @description Some actions after register form fields
			 * @input_vars
			 * [{"var":"$args","type":"array","desc":"Register form shortcode arguments"}]
			 * @change_log
			 * ["Since: 2.0"]
			 * @usage add_action( 'um_after_{$mode}_fields', 'function_name', 10, 1 );
			 * @example
			 * <?php
			 * add_action( 'um_after_{$mode}_fields', 'my_after_form_fields', 10, 1 );
			 * function my_after_form_fields( $args ) {
			 *     // your code here
			 * }
			 * ?>
			 */
			do_action( "um_after_{$mode}_fields", $args );



			/**
			 * UM hook
			 *
			 * @type action
			 * @title um_after_form
			 * @description Some actions after register form fields
			 * @input_vars
			 * [{"var":"$args","type":"array","desc":"Register form shortcode arguments"}]
			 * @change_log
			 * ["Since: 2.0"]
			 * @usage add_action( 'um_after_form', 'function_name', 10, 1 );
			 * @example
			 * <?php
			 * add_action( 'um_after_form', 'my_after_form', 10, 1 );
			 * function my_after_form( $args ) {
			 *     // your code here
			 * }
			 * ?>
			 */
			do_action( 'um_after_form', $args ); ?>


			<div class="um-col-alt-b um-link">
			<?php
				echo '<a href="/login/" class="um-link-alt">' . __('Login', THEME_NAME) . '</a>';
				echo '<span class="um-link-alt-sep"> | </span>';
				echo '<a href="/resetpass/" class="um-link-alt">' . __('Forgot your password?', THEME_NAME) . '</a>';

			?>
			</div>

		
		</form>

	</div>

</div>
<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package clp-theme
 */
?>
<?php

$post_meta = $args['post_meta'];
$update_project = $args['update_project'];




?>


	
<div class="project-section status-section">						
	<div class="clp-field-area">
		<div class="clp-field-project-status field-response">	
			<label class="clp-field-label clp-field-flex-label clp-main-field-label"><?php _e('Status', THEME_NAME); ?>:</label>
			<div class="clp-field">
				<div class="clp-field-select selected-project-status">
					<?php
						$terms = get_terms( 'project-status', array(
							'hide_empty' => false,
							'orderby' => 'term_order',
						) );
						if ( !empty( $terms ) ){
							echo '<select id="project-status" name="project-status" class="select-tab clp-form-field clp-field-update" disabled>';
							foreach ( $terms as $term ){
								$selected = '';
								if( ($post_meta['project-status'][0]) == $term->slug ){
									$selected = 'selected';
								}
								echo '<option value="' . $term->slug . '" ' . $selected . ' > ' . __($term->name, THEME_NAME) . '</option>';
							}
							echo '</select>';
						}
						?>
				</div>
			</div>
			<div class="clp-description-block">			
				<div class="clp-project-status-description">
					<?php
					if ( !empty( $terms ) ){
						foreach ( $terms as $term ){
							$selected = '';
							if( $post_meta['project-status'][0] == $term->slug ){
								$selected = 'clp-description-text-selected';
							}
							echo '<p id="' . $term->slug . '" class="clp-description-text project-status ' . $selected . '">' . __($term->description, THEME_NAME) . '</p>';
							
							/*$selected = '';
							if( in_array($term->slug, $term_list_slug) ){
								$selected = 'selected';
							}*/
						}
					}
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="clp-clear"></div>
</div>
<div class="project-section payment-section">	
	<div class="clp-field-area field-area-price">	
		<div class="clp-field-payment clp-field-area-flex field-response">								
			<label class="clp-field-label clp-field-flex-label clp-main-field-label"><?php _e('Price', THEME_NAME); ?>:</label>
			<div class="clp-area-fields">
				<div class="clp-field-input clp-field-input-number input-project_price_value">
					<div class="textarea-field-block">
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
					</div>
					<input class="clp-field-hide clp-field-update" id="project_price_value" type="number" min="1" name="project_price_value" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'" value="<?php echo $post_meta['project_price_value'][0]; ?>" disabled />
				</div>
				<div class="clp-field-select select-project-price-currency clp-field-hide">
					<select name="project_price_currency" id="project_price_currency" class="clp-field-update" disabled>
						<option value=""><?php _e('Currency', THEME_NAME); ?></option>
						<option value="USD" <?php if($post_meta['project_price_currency'][0] == 'USD') echo 'selected'; ?>>$</option>
						<option value="EUR" <?php if($post_meta['project_price_currency'][0] == 'EUR') echo 'selected'; ?>>€</option>
						<option value="RUB" <?php if($post_meta['project_price_currency'][0] == 'RUB') echo 'selected'; ?>>₽</option>
					</select>
				</div>
			</div>
		</div>
		<div class="clp-field-payment-description clp-field-hide field-response">
			<label class="clp-field-label"><?php _e('Description of the price change', THEME_NAME); ?></label>
			<div class="clp-field clp-field-textarea">
				<textarea id="project_price_update_description" class="clp-field-update" placeholder="<?php _e('Description of the price change', THEME_NAME); ?>" name="project_price_update_description" rows="2" cols="20" disabled></textarea>
			</div>
		</div>
	</div>
	<div class="clp-clear"></div>
</div>
<div class="project-section additional-information-section <?php if( (empty($post_meta['additional_information'][0])) ){ echo 'clp-field-hide'; } ?>">
	<div class="clp-field-area">
		<div class="clp-field-additional-information field-response">
			<label class="clp-field-label"><?php _e('Additional Information', THEME_NAME); ?></label>
			<div class="clp-field clp-field-textarea">
				<div class="textarea-field-block"><?php echo nl2br( $post_meta['additional_information'][0] ); ?></div>
				<textarea id="additional_information" class="clp-field-update" placeholder="<?php _e('Additional Information...', THEME_NAME); ?>" name="additional_information" rows="4" cols="50" disabled><?php echo $post_meta['additional_information'][0]; ?></textarea>
			</div>
		</div>
	</div>
</div>
<?php if( $update_project ): ?>
	<div class="project-section administrator-section">	
		<div class="clp-field-area">	
			<div class="section-name"><label class="clp-field-label"><?php _e('Settings', THEME_NAME); ?></label></div>
			<div class="clp-field-area-section project-discussions field-response">
				<label class="clp-field-label clp-field-flex-label"><?php _e('Project Discussions', THEME_NAME); ?>:</label>
				<div class="clp-field">
					<div class="clp-field-select selected-choose-project-discussions">
						<select name="project_discussions" id="project_discussions" class="clp-field-update" disabled>
							<option value="default" <?php if($post_meta['project_discussions'][0] == 'default') echo 'selected'; ?>>Default</option>
							<option value="spam" <?php if($post_meta['project_discussions'][0] == 'spam') echo 'selected'; ?>>Spam</option>
							<option value="disable" <?php if($post_meta['project_discussions'][0] == 'disable') echo 'selected'; ?>>Disable</option>
							<option value="allow" <?php if($post_meta['project_discussions'][0] == 'allow') echo 'selected'; ?>>Allow</option>
						</select>
					</div>
				</div>
			</div>
			<?php if( isset($post_meta['project-status'][0]) && ( $post_meta['project-status'][0] == 'analytics' || $post_meta['project-status'][0] == 'awaiting-advance-payment' ) ): ?>			
			<div class="clp-field-area-section keep-project field-response">
				<label class="clp-field-label clp-field-flex-label"><?php _e('Keep Project', THEME_NAME); ?>:</label>
				<div class="clp-field">
					<div class="clp-field-input-checkbox input-checkbox-keep-project">
						<input type="checkbox" id="keep_project" class="clp-field-checkbox-update clp-field-update" name="keep_project" value="on" <?php if($post_meta['keep_project'][0] == 'on'){ echo 'checked'; }; ?> disabled />
					</div>
				</div>
			</div>
			<?php endif; ?>
		</div>		
	</div>
<?php endif; ?>							






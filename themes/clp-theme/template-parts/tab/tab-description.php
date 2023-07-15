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

<div class="project_type-section">
	<div class="clp-field-area">		
		<label class="clp-field-label clp-field-flex-label"><?php _e('Project Type', THEME_NAME); ?>:</label>
		<div class="clp-field">				
			<div class="clp-field-select selected-type-project field-response">
				<?php 
					$terms = get_terms( 'project-type', array(
						'hide_empty' => false,
						'orderby' => 'term_order',
					) );
					if ( !empty( $terms ) ){
						echo '<select id="project-type" name="project-type" class="select-tab cpl-form-field clp-field-update" disabled>';
						foreach ( $terms as $term ){
							$selected = '';
							if( ($post_meta['project-type'][0]) == $term->slug ){
								$selected = 'selected';
							}
							echo '<option value="' . $term->slug . '" ' . $selected . ' >' . __($term->name, THEME_NAME) . '</option>';
						}
						echo '</select>';
					}
				?>
			</div>
		</div>
	</div>
</div>
<div class="project_type-fields-section">

	<?php

	
		foreach ( $terms as $term ){
			
			$fields = get_term_meta( $term->term_id, 'clp_custom_meta_fields', true );
			
			?>

			<div id="<?php echo $term->slug; ?>" class="tab-div choose_project_type project-type <?php if($post_meta['project-type'][0] == $term->slug) echo 'active'; ?>">
				<div class="clp-field-area">
				<?php
				
				for ($i = 1; $i <= 2; $i++) {
					
					if( !empty($fields['field-' . $i]) ){
						
						$v = $fields['field-' . $i];
						$label = ''; $description = ''; $placeholder = ''; $hide = ''; $required = ''; $text = '';
						if( isset( $v['label'] ) ){ $label = $v['label']; }
						if( isset( $v['description'] ) ){ $description = $v['description']; }
						if( isset( $v['placeholder'] ) ){ $placeholder = $v['placeholder']; }
						if( isset( $v['required'] ) && $v['required'] == 1 ){ $required = '<span class="um-req" title="Required">*</span>'; }							
						if( isset( $post_meta[$term->slug . '-field-' . $i][0] ) && !empty( $post_meta[$term->slug . '-field-' . $i][0] ) ){ $text = $post_meta[$term->slug . '-field-' . $i][0]; }
						if( isset( $v['hide'] ) && $v['hide'] == 1 && empty($text) ){ $hide = 'clp-field-hide'; }
						
						?>
						<div class="clp-field-area-section field-response <?php echo $hide; ?>">
							<label class="clp-field-label"><?php _e($label, THEME_NAME); ?><?php echo $required; ?></label>
							<div class="cpl-field cpl-field-textarea field-response">
								<div class="textarea-field-block"><?php echo nl2br( $text ); ?></div>
								<textarea id="<?php echo $term->slug . '-field-' . $i; ?>" class="clp-field-update" placeholder="<?php _e($placeholder, THEME_NAME); ?>" name="<?php echo $term->slug . '-field-' . $i; ?>" rows="4" cols="50" disabled><?php echo $text; ?></textarea>
							</div>
						</div>				
						<?php
						
					}
					
				}

			?>	
				</div>	
			</div>
			
		<?php

		}

		?>				

			
</div>




















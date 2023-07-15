/**
 * Сontrol the construction of templates
 * @package WordPress
*/


jQuery(document).ready(function($) {


	// Select tab 
	$( "select.select-tab" ).change(function() {
		let tab = $( this ).find(":selected").val();
		if( tab ){
			$('.tab-div').each(function( index, value ) {
				$(this).hide();
			});
			$('#tab-' + tab).show();
		}
	})
	
	
	// Add new project
	$( 'form[name="project"]' ).on( 'submit', function(e) {

		e.preventDefault();

		var user_name = $(this).find('input[name=user_name-69]').val() || 0,
		user_email = $(this).find('input[name=user_email-69]').val() || 0,
		project_type = $( "#project-type" ).find(":selected").val();


        var data = {
            action: 'add_project',
            name: 'add_project',
			security: clp_ajax_nonce,
			'user_name': user_name,
			'user_email': user_email,
			'project-type': project_type,
        };


		$('.clp-form-field-textarea').each(function( index, value ) {
			let key = $(this).attr('name');
			let val = $(this).val() || 0;
			if(key && val != 0){
				data[key] = val;
			}
		});		


		$('.field-response .field-not-valid').each(function( index ) {
			$( this ).remove();
		});
		$(this).find('.wpcf7-response-output').hide();

		
		jQuery.ajax({
			url : clp_ajax_url,
			type : 'post',
			data : data,
			success : function( response ) {
				var response = JSON.parse(response);
				console.log(response);
				if(response.errore){
					if(response.errore.form_errore){
						$.each( response.errore.form_errore, function( key, value ) {
							var field = $('#' + key);
							if(field){
								console.log(key);
								$('.field-response').each(function() {
									if( ($( this ).find( '#' + key )).length > 0 ){
										if( ($( this ).find( '.clp-errore-field' )).length > 0 ){
											($( this ).find( '.clp-errore-field' )).append($('<span class="field-not-valid" aria-hidden="true">' + value + '</span>'));
										}
									}
								});	
							}
						});
					}
					if(response.errore.server_errore){
						$( '#clp-response-server-errore' ).text('');
						$.each( response.errore.server_errore, function( key, value ) {
							$( '#clp-response-server-errore' ).append('<p>' + value + '</p>');
						});
						$( '#clp-response-server-errore' ).show();
					}
				}else{
					$( '.clp-form-field-input' ).prop('disabled', true);
					$( '.clp-form-field-select' ).prop('disabled', true);
					$( '.clp-form-field-textarea' ).prop('disabled', true);
					$( '#add-project' ).remove();
					if(response.success){
						$( '#clp-response-server-success' ).text('');
						$( '#clp-response-server-success' ).append('<p>' + response.success + '</p>');
						$( '#clp-response-server-success' ).show();
					}
				}
			},
			fail : function( err ) {
				$( '.wpcf7-response-output.server-errore' ).show();
			}
		});
		 
		return false;
		
	});


});


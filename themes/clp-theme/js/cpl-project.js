/**
 * Сontrol the construction of templates
 * @package WordPress
*/


jQuery(document).ready(function($) {



	
class Update_Project{

	// List var
	static load_script = false;
	static btn_edit = $( "#btn-edit-project" );
	static btn_updata = $( "#btn-updata-project" );
	static project_form_errore = $( "#update-project-form-errore" );
	
	constructor(){
		Update_Project.Select_Tab_Form();
		
		Update_Project.btn_edit.click(function(event) {
			Update_Project.Btn_Edit_Function();
		});
		
		Update_Project.btn_updata.click(function(event) {
			Update_Project.load_script = true;
			Update_Project.Btn_Update_Function(event);
		});
		
		if( $( "#project" ).attr( "data_update_project") != 1 ){
			var loadingTimer = setInterval(function(){Update_Project.Project_Ref();}, 5000);
		}
	}


	// Btn Edit Function
	static Btn_Edit_Function(){
		$( "#updata-project-form .updata-project-form-entry" ).removeClass("disable-form");		
		$( "#updata-project-form .updata-project-form-entry" ).addClass("edit-form");
		$( ".updata-project .textarea-field-block" ).hide();
		$( ".updata-project .clp-field-update" ).prop( "disabled", false );
		$( "#btn-edit-project" ).hide();
		$( "#btn-updata-project" ).show();
	}


	static Project_Ref(e){
		
		
		
		// If init (Add Messege)
		if( Update_Project.load_script === true ){ return; }
		
		var form_data_Obj = {};
		form_data_Obj.action = 'ref_project';
		form_data_Obj.security = clp_ajax_nonce;	

		$('.clp-field-update').each(function( index ) {
			let field_name = ( $( this ).attr("name") );
			let val = ( $( this ).val() ) || '';
			if( val && field_name ){
				form_data_Obj[field_name] = val;
			}
		});
		
		jQuery.ajax({
			type : 'POST',
			url : clp_ajax_url,
			data : form_data_Obj,

			beforeSend: function(xhr){

			},
			success: function ( response ) {
				var response = JSON.parse(response);
				if(response.add_html){
					$.each( response.add_html, function( key, value ) {
						let el = $('#' + key);
						if( el ){
							el.css('opacity', '0');
							el.css('height','auto');
							$('#'+key).html( value )
							el.css('height','100%')
							el.animate({opacity: '100%'}, 200);
						}
					});
				}
				Update_Project.load_script = false;
				Update_Project.Select_Tab_Form();
			},
			complete: function(){
				Update_Project.load_script = false;
			},
		});		
	}




	// Btn Update Function
	static Btn_Update_Function(e){
		
		e.preventDefault();


		var form_data_Obj = {};
		form_data_Obj.action = 'update_project';
		form_data_Obj.security = clp_ajax_nonce;		
		
		
		$('.clp-field-update').each(function( index ) {
			let field_name = ( $( this ).attr("name") );
			let val = ( $( this ).val() ) || '';
			if( val && field_name ){
				form_data_Obj[field_name] = val;
			}
		});
		$('.clp-field-checkbox-update').each(function( index ) {
			let field_name = ( $( this ).attr("name") );
			let val = ( $( this ).val() ) || '';
			if( val && field_name ){
				if( $( this ).is(':checked') ){
					form_data_Obj[field_name] = val;
				}else{
					form_data_Obj[field_name] = 0;
				}
			}
		});


		jQuery.ajax({
			type : 'POST',
			url : clp_ajax_url,
			data : form_data_Obj,

			beforeSend: function(xhr){
				Update_Project.project_form_errore.hide();
				Update_Project.project_form_errore.html('');
				$('.field-response .field-not-valid').each(function( index ) {
					$( this ).remove();
				});
			},
			success: function ( response ) {
				var response = JSON.parse(response);
				console.log(response);
				if(response.errore){
					if(response.errore.form_errore){
						$.each( response.errore.form_errore, function( key, value ) {
							Update_Project.project_form_errore.append('<span>' + value + '</span>');	
						});
						Update_Project.project_form_errore.show();
					}
					if(response.errore.field_errore){
						$.each( response.errore.field_errore, function( key, value ) {
							let el = $('#' + key).closest('.field-response');
							$( '<span class="field-not-valid">' + value + '</span>' ).appendTo( el );
						});
					}
				}else{
					if(response.add_html){
						$( "#updata-project-form .updata-project-form-entry" ).removeClass("edit-form");		
						$( "#updata-project-form .updata-project-form-entry" ).addClass("disable-form");
						$.each( response.add_html, function( key, value ) {
							let el = $('#' + key);
							if( el ){
								el.css('opacity', '0');
								el.css('height','auto');
								$('#'+key).html( value )
								el.css('height','100%')
								el.animate({opacity: '100%'}, 200);
							}
	
						});
						$( "#btn-updata-project" ).hide();
						$( "#btn-edit-project" ).show();
						Update_Project.Select_Tab_Form();
					}
				}
				Update_Project.load_script = false;
			},
			complete: function(){
				Update_Project.load_script = false;
			},
		});
		
	}


	// Select tab form
	static Select_Tab_Form(){
		$( "select.select-tab" ).change(function() {
			let tab = $( this ).find(":selected").val();
			let select_id = ($( this ).attr("id"));

			if( tab && select_id){
				$('.' + select_id).each(function( index, value ) {
					$(this).hide();
				});
				$('#' + tab).show();
			}
		})
	}


}

const updata_project = new Update_Project();



});














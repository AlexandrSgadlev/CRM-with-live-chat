/**
 * Сontrol the construction of templates
 * @package WordPress
*/


jQuery(document).ready(function($) {

class Comments{

	// List var
	static load_script = false;
	static comment_form = document.querySelector("#commentform");
	static comments_area = $( "#comments" );
	static comment_textarea = $('#comment');
	//messege_counts = this.comments.attr( "data_messege_counts");
	static comment_list = $('#comments .comment-list');
	static server_errore = $( '.wpcf7-response-output.server-errore' );
	
	
    constructor(){
		if(Comments.comment_form){
			// Add Messege
			Comments.comment_form.addEventListener('submit', event => {
				event.preventDefault();
				Comments.load_script = true;
				Comments.Comment_sent(event, 'add_messege_to_project');
			});
			// Updata Messege
			var loadingTimer = setInterval(function(){Comments.Comment_Ref();}, 5000);
			// Comments List Show After Load
		}
		Comments.Comments_List_Show(Comments.comment_list, '');
    }


	static Comment_Ref(e){
		// If init (Add Messege)
		if( Comments.load_script === true ){ return; }
		//if( $('.um-account-tab[data-tab="conversation"]').is(':hidden') ){ return; }
		Comments.Comment_sent(event, 'updata_messege_to_project');
	}


	static New_messege(){
		const data = new FormData(Comments.comment_form);
		const form_data_Obj = {};
		data.forEach((value, key) => (form_data_Obj[key] = value));
		form_data_Obj.action = 'check_messege';
		form_data_Obj.security = clp_ajax_nonce;
		console.log(form_data_Obj);
		
		jQuery.ajax({
			type : 'POST',
			url : clp_ajax_url,
			data : form_data_Obj,

			beforeSend: function(xhr){

			},
			success: function ( response ) {
				var response = JSON.parse(response);
				if( response == 'success' ){
					$( ".link-tab-conversation" ).each(function( index ) {
						if($( this ).hasClass('current')){
							$( this ).removeClass('new-messege');
						}
						$( this ).find('.new-message-count').text('');
					});
				}
			},
			complete: function(){
				
			},
			fail : function( err ) {
				
			}
		});
	}


	static Comment_sent(event, action){

		
		if( action == 'add_messege_to_project' ){
			Comments.comment_textarea.removeClass( 'wpcf7-not-valid' );
			$('#comments .wpcf7 .wpcf7-not-valid-tip').hide();		
			$('#comments .wpcf7-not-valid-tip span').each(function( index ) {
				$( this ).remove();
			});
			Comments.server_errore.hide();
		}
		
		const form_data_Obj = {};
		$('#commentform input').each(function( index ) {
			let field_name = ( $( this ).attr("name") );
			let val = ( $( this ).val() ) || '';
			if( val && field_name ){
				form_data_Obj[field_name] = val;
			}
		});

		form_data_Obj.action = action;
		form_data_Obj.security = clp_ajax_nonce;
		form_data_Obj.messege_counts = Comments.comments_area.attr( "data_messege_counts") || -1;
		
		form_data_Obj.comment = Comments.comment_textarea.val()



		jQuery.ajax({
			type : 'POST',
			url : clp_ajax_url,
			data : form_data_Obj,

			beforeSend: function(xhr){

			},
			success: function ( response ) {
				
				var response = JSON.parse(response);
				
				if(response.errore){
					if(response.errore.form_errore){
						Comments.comment_textarea.addClass('wpcf7-not-valid');
						$.each( response.errore.form_errore, function( key, value ) {
							$('#comments .wpcf7 .wpcf7-not-valid-tip').append('<span>' + value + '</span>');						
						});
						$('#comments .wpcf7 .wpcf7-not-valid-tip').show();
					}
					if(response.errore.server_errore){
						Comments.server_errore.show();
					}
				}else{
					if(response.add_html){
						Comments.Comments_List_Show(Comments.comment_list , response.add_html);
						if( action == 'add_messege_to_project' ){
							Comments.comment_textarea.val('');
						}
					}
					if(response.messege_counts){
						if( Comments.comments_area.attr( "data_messege_counts") !== response.messege_counts && response.new_messege >= 1){
							$( ".link-tab-conversation" ).each(function( index ) {
								if(!$( this ).hasClass('current')){
									$( this ).addClass('new-messege');
									$( this ).find('.new-message-count').text('(' + response.new_messege + ')');
								}
							});
						}
						Comments.comments_area.attr( "data_messege_counts", response.messege_counts);
					}
					
				}
			},
			complete: function(){
				Comments.load_script = false;
			},
			fail : function( err ) {
				Comments.server_errore.show();
			}
		});
			
	}
	
	static Comments_List_Show(el, data_html){
		el.css('opacity', '0');
		el.css('height','auto');
		if(data_html){
			el.html( data_html );
		}
		let h = el.height();
		el.css('height','100%')
		el.scrollTop(h);
		el.animate({opacity: '100%'}, 200);		
	}
	
	
	
}


const comments = new Comments();

wp.hooks.addAction( 'um_after_account_tab_changed', 'tab_conversation', function(  ){
	if($('.um-account-tab[data-tab="conversation"]').is(':hidden')){
		Comments.comment_list.css('opacity', '0');
		Comments.comment_list.css('height','auto');
	}else{
		Comments.comment_list.css('opacity', '0');
		Comments.comment_list.css('height','auto');
		let h = Comments.comment_list.height();
		Comments.comment_list.css('height','100%')
		Comments.comment_list.scrollTop(h);
		Comments.comment_list.animate({opacity: '100%'}, 200);
		if($('#link-tab-conversation').hasClass('new-messege')){
			Comments.New_messege();
		}
	}
} );


});

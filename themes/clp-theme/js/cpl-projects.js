/**
 * Сontrol the construction of templates
 * @package WordPress
*/


jQuery(document).ready(function($) {

		class Filter_Projects{
			
			

			// List var
			static load_script = false;
			static btn_items_sort = $( '.cpl-filter-sort-btn' );			
			static btn_filter_input = $( '.filter-items input[type="checkbox"]' );
			static btn_filter_select = $( '.filter-items select' );
			static btn_navigation = $( '.navigation a' );
			static btn_search_filter = $( '#search-filter' );
			static btn_clear_filter = $( '#clear-filter' );
			static project_title = $( '#project_title' );
			static sort_default = $( '#sort-projects-default' );

			
			constructor(){
				
				Filter_Projects.btn_items_sort.change(function(event) {
					Filter_Projects.load_script = true;
					Filter_Projects.Filter_and_Sort_Projects_Function(event.target, 'sort');
				});
				Filter_Projects.btn_filter_input.change(function(event) {
					Filter_Projects.load_script = true;
					Filter_Projects.Filter_and_Sort_Projects_Function(event.target, 'filter');
				});
				Filter_Projects.btn_filter_select.change(function(event) {
					Filter_Projects.load_script = true;
					Filter_Projects.Filter_and_Sort_Projects_Function(event.target, 'filter');
				});
				Filter_Projects.btn_navigation.click(function(event) {
					event.preventDefault();
					Filter_Projects.load_script = true;
					Filter_Projects.Filter_and_Sort_Projects_Function(event.target, 'page');
				});
				Filter_Projects.btn_search_filter.click(function(event) {
					event.preventDefault();
					Filter_Projects.load_script = true;
					Filter_Projects.Filter_and_Sort_Projects_Function(event.target, 'filter');
				});
				
				Filter_Projects.btn_clear_filter.click(function(event) {
					event.preventDefault();
					Filter_Projects.btn_filter_input.each(function( index ) {
						if( $( this ).is(':checked') ){
							 $( this ).prop('checked', false);
						}
					});
					Filter_Projects.btn_filter_select.each(function( index ) {
						let elem = $( this ).find(":selected");
						elem.prop('selected', false);
					});
					Filter_Projects.project_title.val('');
					Filter_Projects.sort_default.prop( 'checked', true );
					
					Filter_Projects.load_script = true;
					Filter_Projects.Filter_and_Sort_Projects_Function(event.target, 'filter');
				});
				
			}
			
			static Filter_and_Sort_Projects_Function(el, type, clear_filter){
				

				var form_data_Obj = {};
				form_data_Obj.action = 'sort_list_projects';
				form_data_Obj.filter_type = type;
				
				var obj_terms = {};
				form_data_Obj.terms_key = [];
				
				Filter_Projects.btn_items_sort.each(function( index ) {
					if( $( this ).is(':checked') ){
						form_data_Obj.orderby = $( this ).attr("data-orderby");
						form_data_Obj.order = $( this ).attr("value");
					}
				});
				Filter_Projects.btn_filter_input.each(function( index ) {
					if( $( this ).is(':checked') ){
						let term_name = $( this ).attr("name");
						let term_val = $( this ).attr("value");
						if ( typeof(obj_terms[term_name]) !== "undefined" ) {
							obj_terms[term_name].push(term_val);
						}else{
							obj_terms[term_name] = [term_val];
							form_data_Obj['terms_key'].push(term_name);
						}
					}
				});
				Filter_Projects.btn_filter_select.each(function( index ) {
					let elem = $( this ).find(":selected");
					let term_name = $( this ).attr("name");
					if( elem && elem.attr("value") ){
						if ( typeof(obj_terms[term_name]) !== "undefined" ) {
							obj_terms[term_name].push(elem.attr("value"));
						}else{
							obj_terms[term_name] = [elem.attr("value")];
							form_data_Obj['terms_key'].push(term_name);
						}
					}
				});
				
				if( Filter_Projects.project_title.val() != '' ){
					form_data_Obj.project_name = Filter_Projects.project_title.val();
				}
				
				if( type == 'page' ){
					form_data_Obj.page_projects = $( el ).attr("data-page_projects");
					if($( el ).attr("data-page_projects") == $( '#cpl_posts_nav' ).attr("data-page_projects")){
						return;
					}
				}else{
					form_data_Obj.page_projects = $( '#cpl_posts_nav' ).attr("data-page_projects");
				}				

				
				if( form_data_Obj.terms_key.length === 0 ){
					delete form_data_Obj.terms_key;
				}
				
				const data_string = '?' + Object.keys(form_data_Obj).map(key => {
					return `${key}=${encodeURIComponent(form_data_Obj[key])}`;
				}).join('&');

				const terms_string = '&' + Object.keys(obj_terms).map(key => {
					return `${key}=${encodeURIComponent(obj_terms[key])}`;
				}).join('&');

				

				form_data_Obj.terms = obj_terms;
				form_data_Obj.security = clp_ajax_nonce;
				
				jQuery.ajax({
					type : 'POST',
					url : clp_ajax_url,
					data : form_data_Obj,

					beforeSend: function(xhr){

					},
					success: function ( response ) {
						
						
						var response = JSON.parse(response);
						if(response.project_list){
							let list = $( '#project_list' );
							list.css('opacity', '0');
							list.html( response.project_list );
							list.css('height','100%');
							list.animate({opacity: '100%'}, 200);	
						}
						if( response.project_nav || response.project_nav == '' ){
							let posts_nav = $( '#cpl_posts_nav' );
							posts_nav.css('opacity', '0');
							posts_nav.html( response.project_nav );
							posts_nav.css('height','100%');
							posts_nav.animate({opacity: '100%'}, 200);	
							
							$( '#cpl_posts_nav .navigation a' ).click(function(event) {
								event.preventDefault();
								Filter_Projects.load_script = true;
								Filter_Projects.Filter_and_Sort_Projects_Function(event.target, 'page');
							});

						}
						if( response.page_projects ){
							$( '#cpl_posts_nav' ).attr("data-page_projects", response.page_projects );
						}
						if( response.found_posts || response.project_nav == 0 ){
							$( '#count-projects' ).html( response.found_posts );
						}

						if( $( el ).attr( "id" ) == 'clear-filter' ){
							Filter_Projects.window_history(window.location.href.replace(window.location.search,''));
						}else{
							Filter_Projects.window_history(data_string + terms_string);
						}
						
						Filter_Projects.load_script = false;
					},
					complete: function(){
						Filter_Projects.load_script = false;
					},
				});				
				

			}
		
		
		static window_history(URL){
			window.history.pushState('', '', URL);
		}
			
			
		}
		

		const filter_projects = new Filter_Projects();

});














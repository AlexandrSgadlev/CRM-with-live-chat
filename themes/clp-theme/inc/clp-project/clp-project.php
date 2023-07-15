<?php
/*
CLP_Project

Author: CLP
Description: 
	CPT 'project'
	Save and update post


*/



// Проверка и обновление преоктов на странице заказчика.
global $REF_PROJECT;
$REF_PROJECT = true;
// Проверка и обновление коментариев на странице заказчика.
global $MESSEGE_PROJECT;
$MESSEGE_PROJECT = true;





class CLP_Project
{

	public $Post_Page = 50;

	/**
	 * Constructor
	 */
	function __construct()
	{
		// CPT
		add_action( 'init', array( $this, 'custom_post_type' ) );
		// Ajax
		add_action('wp_ajax_add_project' , array( $this, 'add_project' ) );
		add_action('wp_ajax_nopriv_add_project' , array( $this, 'add_project' ) );
		add_action('wp_ajax_update_project' , array( $this, 'update_project' ) );
		add_action('wp_ajax_nopriv_update_project' , array( $this, 'update_project' ) );	
		add_action('wp_ajax_ref_project' , array( $this, 'ref_project' ) );
		add_action('wp_ajax_nopriv_ref_project' , array( $this, 'ref_project' ) );
		add_action('wp_ajax_sort_list_projects' , array( $this, 'sort_list_projects' ) );
		add_action('wp_ajax_nopriv_sort_list_projects' , array( $this, 'sort_list_projects' ) );
		// Save and update post
		add_action( 'add_meta_boxes' , array( $this, 'global_notice_meta_box' ) );
		add_action( 'save_post', array( $this, 'diwp_save_multiple_fields_metabox' ) );
		// Rewrite
		add_action( 'init', array( $this, 'url_project_rewrite' ) );
		// Access
		add_action( 'clp_before_archive_project', array( $this, 'clp_project_access' ) );
		add_action( 'clp_before_single_project', array( $this, 'clp_project_access' ) );
		// Wp query
		add_action( 'pre_get_posts', array( $this, 'custom_query' ) );
		// Account
		add_filter('um_account_content_hook_projects', array( $this, 'um_account_content_hook_projects' ) );
		add_filter('um_account_page_default_tabs_hook', array( $this, 'my_custom_tab_in_um' ), 99 );
		add_filter('um_change_default_tab', array( $this, 'custom_um_change_default_tab' ), 10, 2);
	}
	

	/**
	 * CPT
	 */	
	public function custom_post_type() 
	{



		/* Tag */
		$labels = array(
			'name'                       => _x( 'Project Type', 'Taxonomy General Name', THEME_NAME ),
			'singular_name'              => _x( 'Project Type', 'Taxonomy Singular Name', THEME_NAME ),
			'menu_name'                  => __( 'Project Type', THEME_NAME ),
			'all_items'                  => __( 'All Project Type', THEME_NAME ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'new_item_name'              => __( 'Name tag', THEME_NAME ),
			'add_new_item'               => __( 'Add tag', THEME_NAME ),
			'edit_item'                  => __( 'Edit', THEME_NAME ),
			'update_item'                => __( 'Update', THEME_NAME ),
			'view_item'                  => __( 'View', THEME_NAME ),
			'separate_items_with_commas' => __( 'Separate tag', THEME_NAME ),
			'add_or_remove_items'        => __( 'Add or remove tag', THEME_NAME ),
			'choose_from_most_used'      => __( 'Choose from the list tag', THEME_NAME ),
			'popular_items'              => __( 'Tags', THEME_NAME ),
			'search_items'               => __( 'Search', THEME_NAME ),
			'not_found'                  => __( 'Not found', THEME_NAME ),
			'no_terms'                   => __( 'No tags', THEME_NAME ),
			'items_list'                 => __( 'List tags', THEME_NAME ),
			'items_list_navigation'      => __( 'Tags navigation', THEME_NAME ),
		);
		$rewrite = array(
			'slug'                       => 'project-type',
			'with_front'                 => true,
			'hierarchical'               => false,
		);

		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => false,
			'public'                     => true,
			'publicly_queryable'         => false,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'rewrite'                    => $rewrite,		
			'show_in_rest'               => true,
			'meta_box_cb'                => 'post_tags_meta_box',
			'sort'                       => true,
		);
		register_taxonomy( 'project-type', array( 'project' ), $args );		
	


	
		/* Tag */
		$labels = array(
			'name'                       => _x( 'Project Status', 'Taxonomy General Name', THEME_NAME ),
			'singular_name'              => _x( 'Project Status', 'Taxonomy Singular Name', THEME_NAME ),
			'menu_name'                  => __( 'Project Status', THEME_NAME ),
			'all_items'                  => __( 'All Project Status', THEME_NAME ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'new_item_name'              => __( 'Name tag', THEME_NAME ),
			'add_new_item'               => __( 'Add tag', THEME_NAME ),
			'edit_item'                  => __( 'Edit', THEME_NAME ),
			'update_item'                => __( 'Update', THEME_NAME ),
			'view_item'                  => __( 'View', THEME_NAME ),
			'separate_items_with_commas' => __( 'Separate tag', THEME_NAME ),
			'add_or_remove_items'        => __( 'Add or remove tag', THEME_NAME ),
			'choose_from_most_used'      => __( 'Choose from the list tag', THEME_NAME ),
			'popular_items'              => __( 'Tags', THEME_NAME ),
			'search_items'               => __( 'Search', THEME_NAME ),
			'not_found'                  => __( 'Not found', THEME_NAME ),
			'no_terms'                   => __( 'No tags', THEME_NAME ),
			'items_list'                 => __( 'List tags', THEME_NAME ),
			'items_list_navigation'      => __( 'Tags navigation', THEME_NAME ),
		);
		$rewrite = array(
			'slug'                       => 'project-status',
			'with_front'                 => true,
			'hierarchical'               => false,
		);

		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'rewrite'                    => $rewrite,		
			'show_in_rest'               => true,
			'meta_box_cb'                => 'post_tags_meta_box',
			'sort'                       => true,
		);
		register_taxonomy( 'project-status', array( 'project' ), $args );	
		

		$labels = array(
			'name'                => _x( 'Projects', 'Post Type General Name', THEME_NAME ),
			'singular_name'       => _x( 'Projects', 'Post Type Singular Name', THEME_NAME ),
			'menu_name'           => __( 'Projects', THEME_NAME ),
			'parent_item_colon'   => __( 'Parent Project', THEME_NAME ),
			'all_items'           => __( 'All Projects', THEME_NAME ),
			'view_item'           => __( 'View Project', THEME_NAME ),
			'add_new_item'        => __( 'Add New Project', THEME_NAME ),
			'add_new'             => __( 'Add New', THEME_NAME ),
			'edit_item'           => __( 'Edit Project', THEME_NAME ),
			'update_item'         => __( 'Update Project', THEME_NAME ),
			'search_items'        => __( 'Search Project', THEME_NAME ),
			'not_found'           => __( 'Not Found', THEME_NAME ),
			'not_found_in_trash'  => __( 'Not found in Trash', THEME_NAME ),
		);
		$args = array(
			'label'               => __( 'Project', THEME_NAME ),
			'description'         => __( 'Website development project', THEME_NAME ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'hierarchical' ),
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'menu_position'       => 24,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
			'show_in_rest' => true,
			'has_archive'         => 'projects',
		);
		register_post_type( 'project', $args );
	}


	public function queryToArray($qry)
	{
		$result = array();

		if(strpos($qry,'=')) {

		 if(strpos($qry,'?')!==false) {
		   $q = parse_url($qry);
		   $qry = $q['query'];
		  }
		}else {
				return false;
		}

		foreach (explode('&', $qry) as $couple) {
				list ($key, $val) = explode('=', $couple);
				
				if( (strpos($val, '%2C')) !== false ){
					$result[$key] = explode('%2C', $val);
				}else{
					$result[$key] = $val;
				}
		}

		return empty($result) ? false : $result;
	}

	/**
	 * Wp query
	 */		
	public function custom_query( $query ) 
	{
		
		if( is_archive() && is_post_type_archive('project') ){
			$query->set('posts_per_page', $this->Post_Page);
		}
		
		
		if( is_archive() && $query->is_main_query() && !is_admin() && !wp_doing_ajax() ) {

			$_POST = $this->queryToArray($_SERVER['REQUEST_URI']);
			
			if ( isset($_POST['action']) && $_POST['action'] == 'sort_list_projects' ){

				
				if($_POST){
					
					
					$update_nav = true;
					if( $_POST['filter_type'] == 'sort' ){
						$update_nav = false;
					}

					if( $_POST['filter_type'] == 'sort' || $_POST['filter_type'] == 'page' ){
						if( isset($_POST['page_projects']) && !empty($_POST['page_projects']) ){
							$args['paged'] = sanitize_text_field( $_POST['page_projects'] );
						}
					}else{
						$args['paged'] = 1;
					}

					$args['order'] = 'DESC';
					if( isset($_POST['order']) && !empty($_POST['order']) ){
						$args['order'] = sanitize_text_field( $_POST['order'] );
					}	
					
					if( isset($_POST['orderby']) && !empty($_POST['orderby']) ){
						if( $_POST['orderby'] == 'post_data' || $_POST['orderby'] == 'modified_date'){
							$args['orderby'] = sanitize_text_field( $_POST['orderby'] );
						}
						if( $_POST['orderby'] == 'project_price_value' ){
							$args['orderby'] = [
								'meta_value_num' => $args['order'],
								'date' => 'DESC'
							];
							$args['meta_query'] = [
								[
									'key'     => 'project_price_value',
									'value'     => array(),
									'compare' => 'NOT IN',
								],
							];
						}
					}	
					
				
					if( isset($_POST['terms_key']) && !empty($_POST['terms_key']) ){
						
						$args['meta_query']['relation'] = 'AND';
						
						if( is_string( $_POST['terms_key'] ) ){
							$term = $_POST['terms_key'];
							$_POST['terms_key'] = array( $term );
						}
						
						foreach( $_POST['terms_key'] as $key ){
							
							if( isset($_POST[$key]) && !empty($_POST[$key]) ){
							
							
								if( $key == 'project-status' || $key == 'project-type' ){

								
									$args['tax_query'][] = [ 
										'taxonomy' => $key ,
										'field'    => 'slug',
										'terms'    => $_POST[$key],
									];						
								
					
								}else{
									$compare = 'IN';
									if( $key == 'new_message_customer' ){
										$compare = '!=';
									}

									$args['meta_query'][] = [ 
										'key'     => $key, 
										'value'   => $_POST[$key],
										$compare => $compare,
									];										

								}
							
							}

							if( !in_array( 'project-completed', $_POST['terms_key'] ) ){
								$args['tax_query'][] = [ 
									'taxonomy' => 'project-status',
									'field'    => 'slug',
									'terms'    => array( 'project-completed' ),
									'operator' => 'NOT IN'
								];				
							}

							
							
						}
					
					
					}else{
			
						$args['tax_query'][] = [
							'taxonomy' => 'project-status',
							'field'    => 'slug',
							'terms'    => array( 'project-completed' ),
							'operator' => 'NOT IN'
						];			
			
					}					

					if($args['tax_query']){
						$query->set('tax_query', $args['tax_query'] );
					}					
					if($args['meta_query']){
						$query->set('meta_query', $args['meta_query'] );
					}
					if($args['orderby']){
						$query->set('orderby', $args['orderby']);
					}
					if($args['paged']){
						$query->set('paged', $args['paged']);
					}
					
				}

			}else{
				$args['tax_query'][] = [
					'taxonomy' => 'project-status',
					'field'    => 'slug',
					'terms'    => array( 'project-completed' ),
					'operator' => 'NOT IN'
				];				
				if($args['tax_query']){
					$query->set('tax_query', $args['tax_query'] );
				}
			}
		}
	}

	
	
	/**
	 * Ajax add project
	 */
	public function add_project()
	{
		check_ajax_referer( 'secure_nonce_name', 'security' );

		$errore = [];

		// User check
		if(!is_user_logged_in()){
			if ( empty( $_POST["user_name"] ) ) {
				$errore['form_errore']['user_name'] = __('This field is required.', THEME_NAME);
			}else{
				if ( mb_strlen( $_POST["user_name"] ) > 20 ) {
					$errore['form_errore']['user_name'] = __('This field is too long.', THEME_NAME);
				}
			}
			
			
			
			if ( empty( $_POST["user_email"] ) ) {
				$errore['form_errore']['user_email'] = __('Please enter your email', THEME_NAME);
			}else{
				if( is_email( $_POST["user_email"] ) ){
					if( email_exists( $_POST["user_email"] )){
						$errore['form_errore']['user_email'] =  __('You have a registered account.', THEME_NAME) . ' <a href="/login/" class="cpl-btn link-type-1">
							<span class="label-link">' . __('Login', THEME_NAME) . '</span> <span class="um-account-icon"><i class="um-faicon-sign-in" aria-hidden="true"></i></span></a>';
					}
				}else{
					$errore['form_errore']['user_email'] = __('The email you entered is incorrect.', THEME_NAME);
				}
				if ( mb_strlen( $_POST["user_email"] ) > 30 ) {
					$errore['form_errore']['user_email'] = __('This field is too long.', THEME_NAME);
				}
			}
		}else{
			$current_user = wp_get_current_user();
			$user_id = $current_user->ID;
			$user_email = $current_user->user_email;
			if( in_array( 'administrator', (array) $current_user->roles ) || in_array( 'um_project-manager', (array) $current_user->roles ) ) {
				$admin = true;
			}else{
				$admin = false;
			}
		}

		// Spam user and ip check	
		if($admin == false){
			if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
				$ip = $_SERVER['HTTP_CLIENT_IP'];
			} elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
				$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			}else{
				$ip = $_SERVER['REMOTE_ADDR'];
			}
			if(is_user_logged_in()){
					$query_k = 'customer_id';
					$query_v = $user_id;
			}else{
				if( $ip ){
					$query_k = 'customer_ip';
					$query_v = $ip;
				}			
			}
			if( isset($query_v) ){
				$args = array(
					'posts_per_page'   => 1,
					'post_type'        => 'project',
					'date_query' => array(
						'after' => '12 hours ago',
					),
					'meta_query' => array(
					   array(
						   'key' => $query_k,
						   'value' => sanitize_text_field( $query_v ),
						   'compare' => '=',
					   )
				   )
				);
				$query = new WP_Query($args);
				if($query->have_posts()){
					$errore['server_errore']['spam'] = __('You already did it! Please try again later.', THEME_NAME);
				}
				wp_reset_postdata();
			}
		}
		
		
		
		$terms = get_terms( 'project-type', array(
			'hide_empty' => false,
			'orderby' => 'term_order',
		) );
		if ( !empty( $terms ) ){
			foreach ( $terms as $term ){	
				if( $_POST["project-type"] == $term->slug ){
					$project_type_field_1 = ($term->slug . "-field-1");
					$project_type_field_2 = ($term->slug . "-field-2");
					if( !isset($_POST[$project_type_field_1]) || empty($_POST[$project_type_field_1]) ){
						$errore['form_errore'][$project_type_field_1] = __('This field is required', THEME_NAME);
					}
					$project_type_id = $term->term_id;
				}
			}
		}
		if( !isset($project_type_field_1) ){
			$errore['server_errore']['field'] = __('An error occurred, please try again later.', THEME_NAME);
		}
		

		// Errore
		if( !empty($errore) ){
			echo json_encode ( array('errore' => $errore) );
			wp_die();		
		}

		// User registretion
		if( !isset($user_id) ){
			$random_password = wp_generate_password( 12 );
			$user_id = wp_create_user( sanitize_text_field($_POST["user_name"]), $random_password, sanitize_text_field($_POST["user_email"]) );
			if( is_wp_error( $user_id ) ){
				
				$user_id = wp_create_user( (strstr(sanitize_text_field($_POST["user_email"]), '@', true)), $random_password, sanitize_text_field($_POST["user_email"]) );
				if( is_wp_error( $user_id ) ){
					$errore['server_errore']['server_errore'] = __('An error occurred, please try again later.', THEME_NAME);
				}else{
					update_user_meta( $user_id, array('user_name'), sanitize_text_field($_POST["user_name"]) );
					add_filter( 'wp_mail_content_type', function( $content_type ){
						return "text/html";
					} );
				}
			}else{
				// User mail login and password
				$message = '<p>Login:' . sanitize_text_field($_POST["user_name"]) . '</p>';
				$message .= '<p>Password:' . $random_password . '</p>';
				wp_mail( sanitize_text_field($_POST["user_email"]), 'The subject', $message );
			}
		}


		$args = array(
			'post_type' =>'project',
			'posts_per_page' => 1,
			'orderby'=>'post_date',
			'order' => 'DESC',
		);
		$project = get_posts($args);
		if($project){
			$project_id = get_post_meta( $project[0]->ID, 'project_id', true );
			if($project_id && $project_id >= 0){
				$project_id = $project_id + 1;
			}else{
				$project_id = 1700;
			}
		}else{
			$project_id = 1700;
		}


		// Add post
		$post_data = array(
			'post_title'    => $project_id,
			'post_name'  => 'project-' . $project_id,
			'post_content'  => '',
			'post_status'   => 'publish',
			'post_type'     => 'project',
		);
		$post_id = wp_insert_post( $post_data );


		if( is_wp_error($post_id) ){
			
			
			
		}else{
			
			// List post meta 
			$_POST['project-status'] = 'analytics';
			$_POST['project_discussions'] = 'default';
			$_POST['project_id'] = $project_id;
			$_POST['project_price_value'] = 0;
			$_POST['new_message_manager'] = 0;
			$_POST['new_message_customer'] = 0;
			
			
			$fields_to_post = array(
				'project-status',
				'project-type',
				'project_discussions',
				'project_id',
				$project_type_field_1,
				$project_type_field_2,
				'new_message_manager',
				'new_message_customer',
				'project_price_value'
			);
			foreach($fields_to_post as $field){
				if( isset($_POST[$field]) ){
					update_post_meta( $post_id, $field, sanitize_textarea_field($_POST[$field]) );
				}
			}

			wp_set_object_terms( $post_id, array($project_type_id), 'project-type', false );
			wp_set_object_terms( $post_id, array('analytics'), 'project-status', false );
			
			// List post meta customer
			if( $user_id ){
				update_post_meta( $post_id, 'customer_id', sanitize_textarea_field($user_id) );
			}
			if( $ip ){
				update_post_meta( $post_id, 'customer_ip', sanitize_textarea_field($ip) );
			}
			if( isset($_POST["user_email"]) && !empty($_POST["user_email"]) ){
				update_post_meta( $post_id, 'customer_email', sanitize_textarea_field($_POST["user_email"]) );
			}else{
				if( isset($user_email) && !empty($user_email) ){
					update_post_meta( $post_id, 'customer_email', sanitize_textarea_field($user_email) );
				}
			}
			
			// Project complited
			$message = '<p>Заявка создана</p>';
			//wp_mail( get_option('admin_email'), 'The subject', $message );	
			
		}


		echo json_encode ( array('success' => __('Thank you for your message, it has been sent successfully.</br>Check your mail, if there is no letter, it may have ended up in your spam folder.', THEME_NAME) ) );
			
		wp_die();

	}


	/**
	 * Ajax updata project
	 */
	public function update_project()
	{
		check_ajax_referer( 'secure_nonce_name', 'security' );

		// права пользователя
		$user_login = false;
		if(!is_user_logged_in()){
			$user_login = false;
		}else{
			$current_user = wp_get_current_user();
			if( $current_user ){
				if ( in_array( 'um_project-manager', (array) $current_user->roles ) || in_array( 'administrator', (array) $current_user->roles ) ) {
					$user_login = true;
				}
			}
		}
		if( $user_login !== true ){
			$errore['form_errore']['user_logged'] = __('An error occurred, please try again later.', THEME_NAME);
		}
		


		// Проверка проекта
		$post_id = sanitize_text_field($_POST['post_ID']);
		if(!get_post_status( $post_id )){
			$errore['form_errore']['post'] = __('Erorre project id.', THEME_NAME);
		}else{
			$post = get_post($post_id);
			if( ( strripos($_SERVER["HTTP_REFERER"], $post->post_name) ) === false ) {
				$errore['form_errore']['post'] = __('Erorre project id.', THEME_NAME);
			}
		}

		// Errore
		if( !empty($errore) ){
			echo json_encode ( array('errore' => $errore) );
			wp_die();
		}

		// проверка полей
		$post_meta = get_post_meta( $post_id );
		
		
		$terms = get_terms( 'project-type', array(
			'hide_empty' => false,
			'orderby' => 'term_order',
		) );
		if ( !empty( $terms ) ){
			foreach ( $terms as $term ){	
				if( $_POST["project-type"] == $term->slug ){
					$project_type_field_1 = ($term->slug . "-field-1");
					$project_type_field_2 = ($term->slug . "-field-2");
					if( !isset($_POST[$project_type_field_1]) || empty($_POST[$project_type_field_1]) ){
						$errore['field_errore'][$project_type_field_1] = __('This field is required', THEME_NAME);
					}
					$project_type_id = $term->term_id;
				}
			}
		}
		if( !isset($project_type_field_1) ){
			$errore['server_errore'] = __('An error occurred, please try again later.', THEME_NAME);
		}


		$terms = get_terms( 'project-status', array(
			'hide_empty' => false,
			'orderby' => 'term_order',
		) );
		if ( !empty( $terms ) ){
			foreach ( $terms as $term ){	
				if( $_POST["project-status"] == $term->slug ){
					$project_status_id = $term->term_id;
				}
			}
		}
		if( !isset($project_status_id) ){
			$errore['server_errore'] = __('An error occurred, please try again later.', THEME_NAME);
		}
		
		
		if( !empty($errore) ){
			echo json_encode ( array('errore' => $errore) );
			wp_die();
		}
	
	
		// обновление
		$array_meta_k = array(
			'project-status',
			'project-type',
			'project_price_value',
			'project_price_currency',
			'additional_information',
			'project_discussions',
			'keep_project',
			$project_type_field_1,
			$project_type_field_2,
		);
		$update_project_history = array();
		foreach($array_meta_k as $k ){
			if( $post_meta[$k][0] != sanitize_text_field($_POST[$k]) ){
				$update_project_history[$k] = sanitize_text_field($_POST[$k]);
				$post_meta[$k][0] = sanitize_text_field($_POST[$k]);
				update_post_meta(  $post_id, $k, sanitize_text_field($_POST[$k]) );
				if( $k == 'project-status' ){
					$project_history_html = array();
					$project_history_html['data'] = date("d.m.Y H:i");
					$project_history_html['type_project_change'] = 'project-status';
					$project_history_html[$k] = $update_project_history[$k];
					$post_meta['project_history_html'][] = $project_history_html;
				}
				if( $k == 'project_price_value' ){
					$project_history_html = array();
					$project_history_html['data'] = date("d.m.Y H:i");
					$project_history_html['type_project_change'] = 'price';
					$project_history_html[$k] = $update_project_history[$k];
					$project_history_html['project_price_currency'] = sanitize_text_field($_POST['project_price_currency']);
					if( !empty($_POST['project_price_update_description']) ){
						$project_history_html['description'] = sanitize_text_field($_POST['project_price_update_description']);
					}
					$post_meta['project_history_html'][] = $project_history_html;		
				}
			}
		}
		
		if( !( has_term( [$project_type_id], 'project-type', $post_id) ) ){
			wp_set_object_terms( $post_id, array($project_type_id), 'project-type', false );
		}
		if( !( has_term( [$project_status_id], 'project-status', $post_id) ) ){
			wp_set_object_terms( $post_id, array($project_status_id), 'project-status', false );
		}


		// история изменений полей
		if( !empty( $update_project_history ) ){
			
			global $wpdb;
			$date = current_time('mysql');
			$mysql_time_format= get_gmt_from_date($date);

			$wpdb->query("UPDATE $wpdb->posts SET post_modified = '{$date}', post_modified_gmt = '{$post_modified_gmt}'  WHERE ID = {$post_id}" );wp_update_post( $post_id );
			
			$update_project_history['data'] = date("d.m.Y H:i:s");
			$post_meta['update_project_history'][] = $update_project_history;
			$post_meta['update_check_project'][0] = 1;
			update_post_meta(  $post_id, 'update_project_history', $post_meta['update_project_history'] );
			update_post_meta(  $post_id, 'update_check_project', '1' );
		}



		$update_project = true;
		$output = array();
		
		ob_start();
		get_template_part( 'template-parts/tab/tab-main-information', null, [ 'post_meta' => $post_meta, 'update_project' => $update_project ] ); 
		$output['add_html']['tab-content-main-information'] = ob_get_contents();
		ob_end_clean();

		ob_start();
		get_template_part( 'template-parts/tab/tab-description', null, [ 'post_meta' => $post_meta, 'update_project' => $update_project ] ); 
		$output['add_html']['tab-content-description'] = ob_get_contents();
		ob_end_clean();

		echo json_encode ( $output );		

		wp_die();
	
	}
	

	/**
	 * Ajax ref project
	 */
	public function ref_project()
	{
		
		global $REF_PROJECT;
		if($REF_PROJECT == false){wp_die();};
			
		check_ajax_referer( 'secure_nonce_name', 'security' );

		$user_login = false;
		if(!is_user_logged_in()){
			$user_login = true;
		}
		if( $user_login ){
			$errore['form_errore']['user_logged'] = __('An error occurred, please try again later.', THEME_NAME);
		}
		
		// Проверка проекта
		$post_id = sanitize_text_field($_POST['post_ID']);
		if(!get_post_status( $post_id )){
			$errore['form_errore']['post'] = __('Erorre project id.', THEME_NAME);
		}else{
			$post = get_post($post_id);
			if( ( strripos($_SERVER["HTTP_REFERER"], $post->post_name) ) === false ) {
				$errore['form_errore']['post'] = __('Erorre project id.', THEME_NAME);
			}
		}

		// Errore
		if( !empty($errore) ){
			echo json_encode ( array('errore' => $errore) );
			wp_die();
		}

		// проверка полей
		$post_meta = get_post_meta( $post_id );
		


		if($post_meta['update_check_project'][0] == 1){
			update_post_meta(  $post_id, 'update_check_project', '0' );
		}else{
			echo json_encode ( '' );
			wp_die();			
		}


		$update_project = false;
		$output = array();
		
		ob_start();
		get_template_part( 'template-parts/tab/tab-main-information', null, [ 'post_meta' => $post_meta, 'update_project' => $update_project ] ); 
		$output['add_html']['tab-content-main-information'] = ob_get_contents();
		ob_end_clean();

		ob_start();
		get_template_part( 'template-parts/tab/tab-description', null, [ 'post_meta' => $post_meta, 'update_project' => $update_project ] ); 
		$output['add_html']['tab-content-description'] = ob_get_contents();
		ob_end_clean();

		echo json_encode ( $output );		

		wp_die();
	
	}


	/**
	 * Ajax sort project
	 */
	public function sort_list_projects()
	{
		
		check_ajax_referer( 'secure_nonce_name', 'security' );

		
		$args = array(
			'post_type' => 'project',
			'posts_per_page' => $this->Post_Page,
			'post_status' => 'publish',
			'meta_query' => array(),
		);


		$update_nav = true;
		if( $_POST['filter_type'] == 'sort' ){
			$update_nav = false;
		}

		if( $_POST['filter_type'] == 'sort' || $_POST['filter_type'] == 'page' ){
			if( isset($_POST['page_projects']) && !empty($_POST['page_projects']) ){
				$args['paged'] = sanitize_text_field( $_POST['page_projects'] );
			}
		}else{
			$args['paged'] = 1;
		}

		$args['order'] = 'DESC';
		if( isset($_POST['order']) && !empty($_POST['order']) ){
			$args['order'] = sanitize_text_field( $_POST['order'] );
		}	
		
		if( isset($_POST['orderby']) && !empty($_POST['orderby']) ){
			if( $_POST['orderby'] == 'post_data' || $_POST['orderby'] == 'modified'){
				$args['orderby'] = sanitize_text_field( $_POST['orderby'] );
			}
			if( $_POST['orderby'] == 'project_price_value' ){
				$args['orderby'] = [
					'meta_value_num' => $args['order'],
					'date' => 'DESC'
				];
				$args['meta_query'] = [
					[
						'key'     => 'project_price_value',
						'value'     => array(),
						'compare' => 'NOT IN',
					],
				];
			}
		}	
		
		
		//$args['tax_query']['relation'] = 'AND';

		if( isset($_POST['terms']) && !empty($_POST['terms']) ){
			$args['meta_query']['relation'] = 'AND';
			foreach( $_POST['terms'] as $key => $arr_val){
				$compare = 'IN';
				
				if( $key == 'project-status' || $key == 'project-type' ){

					//$args['tax_query']['relation'] = 'AND';
					$args['tax_query'][] = [ 
						'taxonomy' => $key ,
						'field'    => 'slug',
						'terms'    => $arr_val,
					];						
							
					
				}else{
				
				
					if( $key == 'new_message_customer' ){
						$compare = '!=';
					}
					
					$args['meta_query'][] = [ 
						'key'     => $key, 
						'value'   => $arr_val,
						$compare => $compare,
					];
					
				}
				
			}
			
			if( !in_array( 'project-completed', $_POST['terms']['project-status'] ) ){
				$args['tax_query'][] = [ 
					'taxonomy' => 'project-status',
					'field'    => 'slug',
					'terms'    => array( 'project-completed' ),
					'operator' => 'NOT IN'
				];			
			}
		
		}else{
			

			
			$args['tax_query'][] = [ 
				'taxonomy' => 'project-status',
				'field'    => 'slug',
				'terms'    => array( 'project-completed' ),
				'operator' => 'NOT IN'
			];	


			
			/*
			$args['meta_query'][] = [ 
				'key'     => 'project-status',
				'value'     => array('project_completed'),
				'compare' => 'NOT IN',
			];
			*/
			
		}

		if( isset($_POST['project_name']) && !empty($_POST['project_name']) ){
			$args['s'] = $_POST['project_name'];
		}
	
		


		
		global $wp_query;
		$wp_query = new WP_Query( $args );



		ob_start();

			if( $wp_query->have_posts() ):

				while( $wp_query->have_posts() ) : $wp_query->the_post();
					
					get_template_part( 'template-parts/content-single', get_post_type() );
					
				endwhile;

				

			else:
			
				echo '<tr class="not-fount"><td colspan="6" ><p>' . __('No projects found', THEME_NAME) . '</p></td></tr>';
			
			endif;


			$output['found_posts'] = $wp_query->found_posts;
			
			$output['project_list'] = ob_get_contents();
			
		ob_end_clean();

		if( $_POST['filter_type'] != 'sort' ){
			
			ob_start();
			
				wpbeginner_numeric_posts_nav();
				
				$output['project_nav'] = ob_get_contents();
				
				$output['page_projects'] = $args['paged'];
			
			ob_end_clean();
			
		}
		
		wp_reset_query();
		
		echo json_encode ( $output );
		wp_die();	
		
	}


	/**
	 * Add meta box to admin
	 */
	public function global_notice_meta_box()
	{
		$screens = array( 'project' );
		foreach ( $screens as $screen ) {
			add_meta_box(
				'project-details',
				__( 'Project Details', THEME_NAME ),
				array( $this, 'project_details_meta_box_callback' ),
				$screen
			);
		}
	}


	/**
	 * Add meta box html to admin
	 */
	public function project_details_meta_box_callback( $post )
	{

		// Add a nonce field so we can check for it later.
		wp_nonce_field( 'project_details_nonce', 'project_details_nonce' );
	   
		$user_id = get_post_field( 'post_author', $post->ID );
		$user_ip = get_user_meta( $user_id, 'user_ip', true);
		$user = get_user_by('id', $user_id);

		$post_meta = get_post_meta( $post->ID );


		?>
		
		<style>
			.project-details{
				display: flex;
				flex-wrap: wrap;
			}
			.project-details .project-filds-block{
				width: 50%
			}
			.project-details .project-filds-block .project-filds-block-row{		
				padding: 15px;
			}
			.project-details .text-block.project-filds-block{
				width: 100%
			}
			#poststuff .project-details .project-filds-block h2{
				padding: 20px 0px;
				font-weight: 700;
				font-size: 1rem;
				border-bottom: 1px solid rgba(0,0,0,.2);
				margin-bottom: 20px;
			}
			.project-details .project-filds-block .row{
				padding: 10px 0;
			}
			.project-details .project-filds-block .label{
				margin-bottom: 10px;
				font-size: 15px !important;
				line-height: 100%;
				font-weight: 600;
			}
			.project-details .project-filds-block .value{		
				font-size: 0.9rem !important;
				line-height: 100%;
				color: #101010 !important;
			}
			.project-details .project-filds-block textarea, .project-details .project-filds-block input{
				color: #101010 !important;
				border: 0px !important;
				font-size: 0.9rem !important;
				line-height: 120%;
				background: #FAFAFF !important;
				box-shadow: inset 0px -3px 0px #b6bfc8 !important;
				border-radius: 2px 2px 0px 0px;
				-webkit-transition: background-color .3s ease, box-shadow .3s ease;
				-ms-transition: background-color.3s ease, box-shadow .3s ease;
				transition: background-color.3s ease, box-shadow .3s ease;
				border: 1px solid #cbcbcb !important;
				width: 100%;
				padding: 0px 10px !important;
			}
			.project-details .project-filds-block select{
				transition: all .1s;
				color: #101010 !important;
				border: 0px !important;
				font-size: 0.9rem !important;
				line-height: 120%;
				background: #FAFAFF !important;
				border-radius: 2px 2px 0px 0px;
				-webkit-transition: background-color .3s ease, box-shadow .3s ease;
				-ms-transition: background-color.3s ease, box-shadow .3s ease;
				transition: background-color.3s ease, box-shadow .3s ease;
				border: 1px solid #cbcbcb !important;
				width: 100%;
				padding: 0px 10px !important;
				min-height: 42px;
				cursor: pointer;
			}
			.project-details .project-filds-block input:hover,
			.project-details .project-filds-block textarea:hover{
				border-color: #97989a !important;
				background: #FFFFFF !important;
				box-shadow: inset 0px -3px 0px #b6bfc8 !important;
				border-radius: 2px 2px 0px 0px !important;
			}
			.project-details .project-filds-block input:focus,
			.project-details .project-filds-block textarea:focus{
				outline: none;
				color: #111 !important;
				color: #585F66;
				background: #FFFFFF !important;
				border-color: #3c5b8d !important;
				box-shadow: inset 0px -3px 0px #3c5b8d !important;
				border-radius: 2px 2px 0px 0px;	
			}
			
			.project-details .project-filds-block select:hover{
				border-color: #97989a !important;
				background: #FFFFFF !important;
				box-shadow: none;
				border-radius: 2px 2px 0px 0px !important;
			}
			
			.project-details .project-filds-block select:focus{
				outline: none;
				color: #111 !important;
				color: #585F66;
				background: #FFFFFF !important;
				border-color: #3c5b8d !important;
				box-shadow: none;
				border-radius: 2px 2px 0px 0px;	
			}		
			
			
		</style>	
		
		<div class="project-details">
		
		<div class="user-block project-filds-block">
			<div class="project-filds-block-row">
				<h2><?php _e('User Block', THEME_NAME); ?></h2>
				<div class="row">
					<div class="label"><b><?php _e('User IP', THEME_NAME); ?></b></div>
					<div class="value"><?php echo esc_attr( $user_ip ); ?></div>		
				</div>
				<div class="row">
					<div class="label"><b><?php _e('User Name', THEME_NAME); ?></b></div>
					<div class="value"><?php echo esc_attr( $user->user_nicename ); ?></div>		
				</div>
				<div class="row">
					<div class="label"><b><?php _e('User Login', THEME_NAME); ?></b></div>
					<div class="value"><?php echo esc_attr( $user->user_login ); ?></div>		
				</div>
				<div class="row">
					<div class="label"><b><?php _e('User Email', THEME_NAME); ?></b></div>
					<div class="value"><?php echo esc_attr( $user->user_email ); ?></div>		
				</div>
			</div>
		</div>


		<div class="project-block project-filds-block">
			<div class="project-filds-block-row">
				<h2><?php _e('Project Block', THEME_NAME); ?></h2>
				<div class="row">
					<div class="label"><b><?php _e('Status', THEME_NAME); ?></b></div>
					<div class="fields">
						<?php 
						$terms = get_terms( 'project-status', array(
							'hide_empty' => false,
							'orderby' => 'term_order',
						) );
						if ( !empty( $terms ) ){
							echo '<select id="project-status" name="project-status" class="select-tab clp-form-field clp-field-update" >';
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
				<div class="row">
					<div class="label"><b><?php _e('Payment', THEME_NAME); ?></b></div>
					<div class="value">
						<input class="clp-field-hide clp-field-update" id="project_price_value" type="number" min="1" name="project_price_value" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'" value="<?php echo $post_meta['project_price_value'][0]; ?>" />
						<select name="project_price_currency" id="project_price_currency" class="clp-field-update" >
							<option value=""><?php _e('Currency', THEME_NAME); ?></option>
							<option value="USD" <?php if($post_meta['project_price_currency'][0] == 'USD') echo 'selected'; ?>>$</option>
							<option value="EUR" <?php if($post_meta['project_price_currency'][0] == 'EUR') echo 'selected'; ?>>€</option>
							<option value="RUB" <?php if($post_meta['project_price_currency'][0] == 'RUB') echo 'selected'; ?>>₽</option>
						</select>
					</div>		
				</div>
				<div class="row">
					<div class="label"><b><?php _e('Payment History', THEME_NAME); ?></b></div>
					<div class="value"></div>		
				</div>
				<div class="row">
					<div class="label"><b><?php _e('Project Discussions', THEME_NAME); ?></b></div>
					<div class="fields">
						<select name="project_discussions" id="choose_project_discussions" class="select-tab um-form-field">
							<option value="default" <?php if($post_meta['project_discussions'][0] == 'default') echo 'selected'; ?>>Default</option>
							<option value="spam" <?php if($post_meta['project_discussions'][0] == 'spam') echo 'selected'; ?>>Spam</option>
							<option value="disable" <?php if($post_meta['project_discussions'][0] == 'disable') echo 'selected'; ?>>Disable</option>
							<option value="allow" <?php if($post_meta['project_discussions'][0] == 'allow') echo 'selected'; ?>>Allow</option>
						</select>
					</div>	
				</div>
				<div class="row">
					<div class="label"><b><?php _e('Keep Project', THEME_NAME); ?></b></div>
					<div class="value"><input type="checkbox" id="keep_project" class="clp-field-checkbox-update clp-field-update" name="keep_project" value="on" <?php if($post_meta['keep_project'][0] == 'on'){ echo 'checked'; }; ?> /></div>
				</div>				
				
				<div class="row">
					<div class="label"><b><?php _e('Additional Information', THEME_NAME); ?></b></div>
					<div class="value"><textarea id="additional_information" class="clp-field-update" placeholder="<?php _e('Additional Information...', THEME_NAME); ?>" name="additional_information" rows="4" cols="50" >
					<?php if( isset($post_meta['additional_information'][0]) ) echo $post_meta['additional_information'][0]; ?>
					</textarea></div>		
				</div>
			</div>
		</div>


		<div class="text-block project-filds-block">
			<div class="project-filds-block-row">
				<h2><?php _e('Task Block', THEME_NAME); ?></h2>	
				<div class="row">
					<div class="label"><b><?php _e('Project Type', THEME_NAME); ?></b></div>
					<div class="fields">
					<?php 
						$terms = get_terms( 'project-type', array(
							'hide_empty' => false,
							'orderby' => 'term_order',
						) );
						if ( !empty( $terms ) ){
							echo '<select id="project-type" name="project-type" class="select-tab cpl-form-field clp-field-update">';
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
			
			
				<?php 
					
				foreach ( $terms as $term ){
				
					$fields = get_term_meta( $term->term_id, 'clp_custom_meta_fields', true );
				
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
							<div class="row">
								<div class="label"><?php _e($label, THEME_NAME); ?><?php echo $required; ?></div>		
								<div class="fields"><textarea id="<?php echo $term->slug . '-field-' . $i; ?>" class="clp-field-update" placeholder="<?php _e($placeholder, THEME_NAME); ?>" name="<?php echo $term->slug . '-field-' . $i; ?>" rows="4" cols="50"><?php echo $text; ?></textarea></div>
							</div>				
							<?php
							
						}

					}

				}
				
				?>
			
			</div>
		</div>



	</div>
		



		<?php

	}


	/**
	 * Save and update post
	 */
	public function diwp_save_multiple_fields_metabox()
	{
		global $post;
		
		if( !$post ){ return; }
		if( $post->post_type != 'project' ){
			return;
		}
		
		$project_updata_fields = [
			'project-status',
			'project-type',
			'project_discussions',
			'project_price_value',
			'project_price_currency',
			'additional_information',
			'project_discussions',
			'keep_project',
		];
		
		foreach($project_updata_fields as $field){
			if(isset($_POST[$field])) :
				update_post_meta($post->ID, $field, $_POST[$field]);
			endif;		
		}
		
		$terms = get_terms( 'project-type', array(
			'hide_empty' => false,
			'orderby' => 'term_order',
		) );
		if ( !empty( $terms ) ){
			foreach ( $terms as $term ){	
				if( $_POST["project-type"] == $term->slug ){
					$project_type_field_1 = ($term->slug . "-field-1");
					$project_type_field_2 = ($term->slug . "-field-2");
					if( isset($_POST[$project_type_field_1]) ){
						update_post_meta( $post->ID, $project_type_field_1, $_POST[$project_type_field_1] );
					}
					if( isset($_POST[$project_type_field_2]) ){
						update_post_meta( $post->ID, $project_type_field_2, $_POST[$project_type_field_2] );
					}
					$project_type_id = $term->term_id;
				}
			}
		}

	}

	
	/**
	 * um_account
	 */
	public function um_account_content_hook_projects( $output )
	{
		ob_start();

		$current_user = wp_get_current_user();
		$user_id = $current_user->ID;
		
		$args = array(
			'posts_per_page'   => -1,
			'post_type'        => 'project',
			'meta_query' => array(
			   array(
				   'key' => 'customer_id',
				   'value' => sanitize_text_field( $user_id ),
				   'compare' => '=',
			   )
		   )
		);
		$query = new WP_Query($args);
		
		
		?>
			
		<div class="um-field">
		
			<?php
				
				if($query->have_posts()){
					echo '<table class="projects-list">
						<thead><tr>
							<th class="title-project-val title-project-val-project_link">Name</th>
							<th class="title-project-val projects-list .title-project-val-project_status">Status</th>
							<th class="title-project-val title-project-val-project_type">Project Type</th>
							<th class="title-project-val title-project-val-project_price_value">Cost</th>
						</thead></tr><tbody>';			
					
					
					while ( $query->have_posts() ) {
						$query->the_post();
						global $post;
						$post_meta = get_post_meta( $post->ID );
						?>
						
						<tr>
							<td>
								<p class="cpl-project-val val-project_title">	
									<a href="<?php echo get_post_permalink( $post->ID ); ?>" class="cpl-project-link" ><?php echo 'Project-' . get_the_title(); ?></a>
								</p>
							</td>
							<td>
								<?php 
									$project_status = wp_get_post_terms( $post->ID, 'project-status' );
									if( isset($project_status) && !empty($project_status) ){
										foreach( $project_status as $term ){
											echo '<p class="cpl-project-val val-project_status">' . __($term->name, THEME_NAME) . '</p>';
										}
									}
								?>
							</td>
							<td>
								<?php 
									$project_type = wp_get_post_terms( $post->ID, 'project-type' );
									if( isset($project_type) && !empty($project_type) ){
										foreach( $project_type as $term ){
											echo '<p class="cpl-project-val val-project_type">' . __($term->name, THEME_NAME) . '</p>';
										}
									}
								?>
							</td>
							<td>
								<p class="cpl-project-val">
								<?php 
									if( (empty($post_meta['project_price_value'][0])) ){ 
										echo '<span>' . __('-//-', THEME_NAME) . '</span>';
									}else{
										echo '<span class="val-project_price_value">';
										echo number_format($post_meta['project_price_value'][0]);
										if($post_meta['project_price_currency'][0] == 'USD') echo ' $';
										if($post_meta['project_price_currency'][0] == 'EUR') echo ' €';
										if($post_meta['project_price_currency'][0] == 'RUB') echo ' ₽';	
										echo '</span>';
									}
								?>
								</p>
							</td>
						</tr>
						
						
						<?php
					}
					echo '</tbody></table>';
				}else{
					echo '<div class="not-fount"><p>' . __('No projects found', THEME_NAME) . '</p></div>';
				}
			?>

			
			
		</div>		
			
		<?php
			
		wp_reset_postdata();
			
		$output .= ob_get_contents();
		ob_end_clean();
		return $output;
	}


	/**
	 * um_account
	 */
	public function my_custom_tab_in_um( $tabs ) 
	{
		$tabs[50]['projects']['icon'] = 'um-faicon-pencil';
		$tabs[50]['projects']['title'] = 'Projects';
		$tabs[50]['projects']['custom'] = true;
		$tabs[50]['projects']['show_button'] = false;
		return $tabs;
	}


	/**
	 * um_account
	 */
	// define the um_change_default_tab callback 
	public function custom_um_change_default_tab( $current_tab, $args )
	{ 
		if( $_SERVER['REQUEST_URI'] == '/account-page/' ){
			$current_tab = 'projects';
			return $current_tab;
		}else{
			return $current_tab;
		}
	} 


	/**
	 * Project access
	 */
	function clp_project_access(){
		$current_user = wp_get_current_user();
		$update_project = false;
		if($current_user){
			if ( in_array( 'administrator', (array) $current_user->roles ) ) {
				$update_project = true;
			}
			if ( in_array( 'um_project-manager', (array) $current_user->roles ) ) {
				$update_project = true;
			}
		}
		
		if($update_project){return;}
		
		if( is_archive() ){
			wp_redirect(home_url(). '/404/');
			exit;
		}
		
		global $post;
		$customer_id = get_post_meta( $post->ID, 'customer_id', true );
		if( $customer_id != $current_user->id && is_single() ){
			wp_redirect(home_url(). '/404/');
			exit;
		}
		
	}


	/**
	 * Add rewrite rule
	 */
	public function url_project_rewrite(){
		add_rewrite_rule( 'project/(.+?)/main-information?$', 'index.php?post_type=project&name=$matches[1]', 'top' );
		add_rewrite_rule( 'project/(.+?)/description?$', 'index.php?post_type=project&name=$matches[1]', 'top' );
		add_rewrite_rule( 'project/(.+?)/payment?$', 'index.php?post_type=project&name=$matches[1]', 'top' );
		add_rewrite_rule( 'project/(.+?)/conversation?$', 'index.php?post_type=project&name=$matches[1]', 'top' );
	}


}
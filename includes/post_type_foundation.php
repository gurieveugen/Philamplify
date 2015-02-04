<?php

class Foundation{
	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  
	public function __construct()
	{		
		// =========================================================
		// HOOKS
		// =========================================================
		add_action('init', array($this, 'createPostTypeAssessment'));		
		add_image_size('foundation-image', 620, 414, true);	
	}

	/**
	 * Create GCEvents post type and his taxonomies
	 */
	public function createPostTypeAssessment()
	{

		$post_labels = array(
			'name'               => __('Foundations'),
			'singular_name'      => __('Foundation'),
			'add_new'            => __('Add new'),
			'add_new_item'       => __('Add new foundation'),
			'edit_item'          => __('Edit foundation'),
			'new_item'           => __('New foundation'),
			'all_items'          => __('Foundations'),
			'view_item'          => __('View foundation'),
			'search_items'       => __('Search foundation'),
			'not_found'          => __('Foundation not found'),
			'not_found_in_trash' => __('Foundation not found in trash'),
			'parent_item_colon'  => '',
			'menu_name'          => __('Foundations'));

		$post_args = array(
			'labels'             => $post_labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'foundation' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt'));

		register_post_type('foundation', $post_args);
	}
}
// =========================================================
// LAUNCH
// =========================================================
$GLOBALS['foundation'] = new Foundation();
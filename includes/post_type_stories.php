<?php

class Stories{
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
		add_action('init', array($this, 'createPostTypeStories'));		
		add_action('save_post', array($this, 'saveStories'), 0);	
		add_action('add_meta_boxes', array($this, 'metaBoxStories'));
		add_filter('manage_edit-story_columns', array($this, 'columnThumb'));	
		add_action('manage_posts_custom_column', array($this, 'columnthumbShow'), 10, 2);
		add_shortcode('sotries', array($this, 'displayStories'));
		add_image_size('story-thumb', 352, 9999, false);
		add_image_size('story-thumb-small', 100, 100, true);
	}

	/**
	 * Create GCEvents post type and his taxonomies
	 */
	public function createPostTypeStories()
	{

		$post_labels = array(
			'name'               => __('Stories'),
			'singular_name'      => __('Story'),
			'add_new'            => __('Add new'),
			'add_new_item'       => __('Add new story'),
			'edit_item'          => __('Edit story'),
			'new_item'           => __('New story'),
			'all_items'          => __('Stories'),
			'view_item'          => __('View story'),
			'search_items'       => __('Search story'),
			'not_found'          => __('Story not found'),
			'not_found_in_trash' => __('Story not found in trash'),
			'parent_item_colon'  => '',
			'menu_name'          => __('Stories'));

		$post_args = array(
			'labels'             => $post_labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'story' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'thumbnail'));

		register_post_type('story', $post_args);
	}

	/**
	 * Register new column
	 * @param  array $columns 
	 * @return array
	 */
	public function columnThumb($columns)
	{
		return array_merge($columns, array(
			'first_name'  => __('First name'),
			'last_name'   => __('Last name'),
			'email'       => __('Email address'),
			'story-thumb' => __('Image')));
	}

	/**
	 * Display new column
	 * @param  string  $column  
	 * @param  integer $post_id           
	 */
	public function columnThumbShow($column, $post_id)
	{		
		$meat = $this->getMeta($post_id);
		switch ($column) 
		{
			case 'first_name':				
				$learn_more = isset($meat['first_name']) ? $meat['first_name'] : '';
				echo $learn_more;
				break;
			case 'last_name':				
				$learn_more = isset($meat['last_name']) ? $meat['last_name'] : '';
				echo $learn_more;
				break;
			case 'email':				
				$learn_more = isset($meat['email']) ? sprintf('<a href="mailto:%s">%s</a>', $meat['email'], $meat['email']) : '';
				echo $learn_more;
				break;
			case 'story-thumb':
				if(has_post_thumbnail($post_id)) echo get_the_post_thumbnail($post_id, 'story-thumb-small');
				break;
		}			
	}

	/**
	 * Add GCEvents meata box
	 */
	public function metaBoxStories($post_type)
	{
		$post_types = array('story');
		if(in_array($post_type, $post_types))
		{
			add_meta_box('metaBoxStories', __('Stories settings'), array($this, 'metaBoxStoriesRender'), $post_type, 'side', 'high');	
		}
		
	}

	/**
	 * render Stories Meta box
	 */
	public function metaBoxStoriesRender($post)
	{
		$meta = $this->getMeta($post->ID);
		wp_nonce_field( 'sotries_box', 'sotries_box_nonce' );
		?>	
		<div class="gcsotries">
			<p>
				<label for="sotries_first_name"><?php _e('First name'); ?>:</label>
				<input type="text" name="meta[first_name]" id="sotries_first_name" value="<?php echo $meta['first_name']; ?>" class="w100">
			</p>			
			<p>
				<label for="sotries_last_name"><?php _e('Last name'); ?>:</label>
				<input type="text" name="meta[last_name]" id="sotries_last_name" value="<?php echo $meta['last_name']; ?>" class="w100">
			</p>			
			<p>
				<label for="sotries_email"><?php _e('Email'); ?>:</label>
				<input type="text" name="meta[email]" id="sotries_email" value="<?php echo $meta['email']; ?>" class="w100">
			</p>			
		</div>	
		<?php
	}

	/**
	 * Get meta array
	 * @param  integer $id
	 * @return array
	 */
	public function getMeta($id)
	{
		return get_post_meta($id, 'meta', true);
	}
	
	/**
	 * Save post
	 * @param  integer $post_id 
	 * @return integer
	 */
	public function saveStories($post_id)
	{
		// =========================================================
		// Check nonce
		// =========================================================
		if(!isset( $_POST['sotries_box_nonce'])) return $post_id;
		if(!wp_verify_nonce($_POST['sotries_box_nonce'], 'sotries_box')) return $post_id;
		if(defined( 'DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;

		// =========================================================
		// Check the user's permissions.
		// =========================================================
		if ( 'page' == $_POST['post_type'] ) 
		{			
			if (!current_user_can( 'edit_page', $post_id)) return $post_id;
		} 
		else 
		{
			if(!current_user_can( 'edit_post', $post_id)) return $post_id;
		}

		// =========================================================
		// Save
		// =========================================================		
		if(isset($_POST['meta']))
		{
			update_post_meta($post_id, 'meta', $_POST['meta']);
		}

		return $post_id;
	}

	/**
	 * Get post type imtes
	 * @param  integer $count
	 * @return array        
	 */
	public function getItems($args)
	{
		$def = array(
			'posts_per_page'   => 500,
			'offset'           => 0,			
			'orderby'          => 'post_date',
			'order'            => 'DESC',
			'post_type'        => 'story',
			'post_status'      => 'publish');
	
		if($args) $arr = array_merge($def, $args);
		else $arr = $def;

		$items = get_posts($arr);
		foreach ($items as &$item) 
		{
			$item->image = null;
			
			if(has_post_thumbnail($item->ID))
			{
				$thumbnail_id     = get_post_thumbnail_id($item->ID);
				$item->image_meta = $this->getAttachmentInfo($thumbnail_id);
				$image            = wp_get_attachment_image_src($thumbnail_id,'story-thumb', false);				
				$item->image      = $image[0];
			}
			
			$item->meta   = $this->getMeta($item->ID);
		}
		return $items;
	}	
	
	/**
	 * Get attachment info
	 * @param  integer $attachment_id 
	 * @return mixed
	 */
	public function getAttachmentInfo($attachment_id) 
	{
		$attachment = get_post($attachment_id);
		if($attachment)
		{
			return array(
				'ID'           => $attachment_id,
				'post_title'   => $attachment->post_title,
				'post_content' => $attachment->post_content);	
		}
		return false;
	}

	/**
	 * Wrap some items
	 * @param  array $items
	 * @return string
	 */
	public function wrapItems($items)
	{
		$out = '';
		if($items)
		{
			foreach ($items as &$item) 
			{	
				$type       = 'text';			
				$title      = '';
				$content    = $item->post_content;
				$img        = '';
				$first_name = $item->meta['first_name'];
				$last_name  = $item->meta['last_name'];
				$date       = $this->formatDate($item->post_date);

				if($item->image)
				{
					$type    = 'photo';
					$title   = $item->image_meta['post_title'];					
					$img    .= sprintf('<img src="%s" alt="%s">', $item->image, $title);
				}

				$out.= '<article class="box-story '.$type.'">';
				$out.= $img;
				$out.= '<div class="text-media">';
				$out.= (strlen($title)) ? sprintf('<h1>%s</h1>', $title) : '';
				$out.= (strlen($content)) ? sprintf('<p>%s</p>', $content) : '';
				$out.= sprintf('<em class="meta">Shared by %s %s on %s</em>', $first_name, $last_name, $date);
				$out.= '</div>';
				$out.= '</article>';
			}
		}
		return $out;
	}

	/**
	 * Format date
	 * @param  datetime $time
	 * @return datetime
	 */
	private function formatDate($time)
	{
		return date('j/n/y', $time);
	}
}
// =========================================================
// LAUNCH
// =========================================================
$GLOBALS['sotries'] = new Stories();
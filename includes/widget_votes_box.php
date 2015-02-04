<?php
/**
 * Register new widget
 */
add_action('widgets_init', create_function('', 'register_widget( "VotesBox" );'));


class VotesBox extends WP_Widget {
	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  
	public function __construct() 
	{
		$widget_ops = array(
			'classname' => '', 
			'description' => 'Votes box' 
		);		
		parent::__construct('votesbox', 'Votes box', $widget_ops);
	}

	function widget($args, $instance) 
	{
		extract($args);

		global $post;
		$votes = (int) get_post_meta($post->ID, 'votes', true);

		echo $before_widget;		
		
		if($title != '') echo $before_title.$title.$after_title;
		?>
		 	<ul class="meta-box cf">
				<li class="votes"><span id="votes-count-<?php echo $post->ID; ?>"><?php echo $votes; ?></span>votes</li>
				<li class="comments"><span id="comments-count-<?php echo $post->ID; ?>">0</span>comments</li>
			</ul>
			<a href="#" data-id="<?php echo $post->ID; ?>" class="btn-vote">vote for<br>this foundation <span>to be philamplified</span></a>
		<?php
		echo $after_widget;
	}

	function form($instance) 
	{	
		
	}

	/**
	 * Update all edits
	 * @param  array $new_instance 
	 * @param  array $old_instance 
	 * @return array               
	 */
	function update($new_instance, $old_instance) 
	{
		$instance              = $old_instance;			
		
		return $instance;
	}
}
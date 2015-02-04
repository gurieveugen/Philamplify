<?php
/**
 * Register new widget
 */
add_action('widgets_init', create_function('', 'register_widget( "FacebookFeed" );'));


class FacebookFeed extends WP_Widget {
	const FACEBOOK_APP_ID = '1423814364535515';
	const FACEBOOK_SECRET = 'bdeb449de6a7a8fb5d0cafa953446ed6';
	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  
	public function __construct() 
	{
		$widget_ops = array(
			'classname' => 'widget-social facebook', 
			'description' => 'Facebook feed widget' 
		);		
		parent::__construct(
			'facebookfeed', 
			'Facebook feed widget', 
			$widget_ops
		);
	}

	function widget($args, $instance) 
	{
		extract($args);
		$title     = strip_tags($instance['title']);
		$account   = strip_tags($instance['account']);
		$title_url = 'https://www.facebook.com/'.$account;


		$url = sprintf(
			'https://graph.facebook.com/v2.1/%s/posts?%s',
			$account,
			http_build_query(
				array(
					'access_token' => sprintf('%s|%s', self::FACEBOOK_APP_ID, self::FACEBOOK_SECRET),
					'fields'       => 'type,link,picture,from,message,created_time,comments.limit(1).summary(true),likes.limit(1).summary(true),shares,attachments',
					'limit'        => '1'
				)
			)
		);

		$wall = file_get_contents($url);
		if($wall !== false)
		{
			$wall = json_decode($wall);
			
			if(count($wall->data))
			{
				$el   = $wall->data[0];
				$msg  = isset($el->message) ? $el->message : '';
				$date = date('d/m/Y', strtotime($el->created_time));
				$time = date('g:ia', strtotime($el->created_time));

				echo $before_widget;	
				if($title != '') echo $before_title.$title.$after_title;	
				?>
				<header class="cf">
					<div class="ico"><img src="<?php echo TDU; ?>/images/ico-facebook-2.png" alt=""></div>
					<h4><?php echo $el->from->name; ?></h4>
					<span class="date"><?php echo $date; ?> at <?php echo $time;?></span>
				</header>
				<div class="content">
					<p><?php echo $msg; ?></p>
					<a href="<?php echo $title_url; ?>" class="link-arrow-darkblue">View on Facebook</a>
				</div>		
				<?php
				echo $after_widget;
				
			}
		}
	}

	function form($instance) 
	{	
		$title   = $instance['title'];     
		$account = $instance['account']; 
		
		?>		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title'); ?>: 
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
			</label>
		</p>		
		<p>
			<label for="<?php echo $this->get_field_id('account'); ?>"><?php _e('Account'); ?>: 
				<input class="widefat" id="<?php echo $this->get_field_id('account'); ?>" name="<?php echo $this->get_field_name('account'); ?>" type="text" value="<?php echo esc_attr($account); ?>" />
			</label>
		</p>				
		<?php
	}

	/**
	 * Update all edits
	 * @param  array $new_instance 
	 * @param  array $old_instance 
	 * @return array               
	 */
	function update($new_instance, $old_instance) 
	{
		$instance            = $old_instance;		
		$instance['title']   = strip_tags($new_instance['title']);	
		$instance['account'] = $new_instance['account'];
		
		return $instance;
	}
}
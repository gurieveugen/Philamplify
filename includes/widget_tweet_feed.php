<?php
/**
 * Register new widget
 */
add_action('widgets_init', create_function('', 'register_widget( "TweetFeed" );'));


class TweetFeed extends WP_Widget {
	const TWITTER_CONSUMER_KEY        = 'FoRJZBenKUFmIQFLDp2gQ';
	const TWITTER_CONSUMER_SECRET     = 'Kudk8D5ZAxb5tWAoXRO21T47gp6EXRplJ82MEUiqc';
	const TWITTER_ACCESS_TOKEN        = '532546390-23aT4nDlWpYLA543yUfmExBqFs0RDb9AZBRbNFTd';
	const TWITTER_ACCESS_TOKEN_SECRET = 'Mt9Hj9aocqQ7qSQGzowzUkFWpvJx8kyBoLAV9GGfV9kvL';

	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  
	public function __construct() 
	{
		$widget_ops     = array('classname' => 'widget-social tweet', 'description' => 'Tweet feed widget' );		
		parent::__construct('tweetfeed', 'Tweet feed widget', $widget_ops);
	}

	function widget($args, $instance) 
	{
		extract($args);
		$title     = strip_tags($instance['title']);
		$account   = strip_tags($instance['account']);
		$title_url = 'https://www.twitter.com/'.$account;

		$twitter   = new TwitterOAuth(
			self::TWITTER_CONSUMER_KEY, 
			self::TWITTER_CONSUMER_SECRET, 
			self::TWITTER_ACCESS_TOKEN, 
			self::TWITTER_ACCESS_TOKEN_SECRET
		);

		$tweet = $twitter->get('https://api.twitter.com/1.1/statuses/user_timeline.json?count=1&screen_name='.urlencode($account));
		echo $before_widget;		
		// =========================================================
		// Print featured widget
		// =========================================================
		
		if($title != '') echo $before_title.$title.$after_title;
	
		if(count($tweet))
		{
			$tweet = $tweet[0];
			$date = date('d/m/Y', strtotime($tweet->created_at));
			$time = date('g:ia', strtotime($tweet->created_at));
			?>
			<header class="cf">
				 <div class="ico"><img src="<?php echo TDU; ?>/images/ico-twitter-2.png" alt=""></div>
				 <h4><?php echo $tweet->user->name; ?></h4>
				 <span class="date"><?php echo $date; ?> at <?php echo $time;?></span>
			</header>
			<div class="content">
			  	<p><?php echo $tweet->text; ?></p>
				<a href="<?php echo $title_url; ?>" class="link-arrow-blue">View on Twitter</a>
			</div>	
			<?php
		}
		echo $after_widget;
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
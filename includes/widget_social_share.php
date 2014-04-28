<?php
/**
 * Register new widget
 */
add_action('widgets_init', create_function('', 'register_widget( "SocialShare" );'));


class SocialShare extends WP_Widget {
	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  
	public function __construct() 
	{
		$widget_ops     = array('classname' => 'socialshare', 'description' => 'SocialShare widget' );		
		parent::__construct('socialshare', 'SocialShare widget', $widget_ops);
	}

	function widget($args, $instance) 
	{
		global $post;
		extract($args);
		$url              = 'http://'.$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
		$title            = strip_tags($instance['title']);	
		
		$twitter          = (isset($instance['twitter']) && $instance['twitter'] != '') ? 'https://twitter.com/share?via='.$instance['twitter'].'&text='.$url : '';
		$facebook         = ($instance['facebook'] == true) ? 'https://www.facebook.com/sharer/sharer.php?u='.$url : '';		
		$google_plus      = ($instance['google_plus'] == true) ? 'https://plus.google.com/share?url='.$url : '';
		$linkedin         = ($instance['linkedin'] == true) ? 'http://www.linkedin.com/shareArticle?mini=true&url='.$url : '';	
		$twitter_btn      = ($twitter != '') ? sprintf('<li><a href="%s"><img alt="" src="'.TDU.'/images/ico-twitter-1.png"></a></li>', $twitter) : '';
		$facebook_btn     = ($facebook != '') ? sprintf('<li><a href="%s"><img alt="" src="'.TDU.'/images/ico-facebook-1.png"></a></li>', $facebook) : '';
		$google_plus_btn  = ($google_plus != '') ? sprintf('<li><a href="%s"><img alt="" src="'.TDU.'/images/ico-google-1.png"></a></li>', $google_plus) : '';
		$linkedin_btn     = ($linkedin != '') ? sprintf('<li><a href="%s"><img alt="" src="'.TDU.'/images/ico-in-1.png"></a></li>', $linkedin) : '';		
		$twitter_accounts = get_post_meta($post->ID, 'twitter_accounts', true);	
		$email_accounts   = get_post_meta($post->ID, 'email_accounts', true);	

		echo $before_widget;		
		// =========================================================
		// Print featured widget
		// =========================================================				
		?>
		<div class="w-block">			
			<?php if($title != '') echo $before_title.$title.$after_title; ?>
			<ul class="social-list social-share-buttons">
				<?php
				echo $twitter_btn;
				echo $facebook_btn;
				echo $google_plus_btn;
				echo $linkedin_btn;
				?>
				<!-- <li><a href="<?php echo $twitter; ?>"><img alt="" src="<?php echo TDU; ?>/images/ico-twitter-1.png"></a></li>
				<li><a href="<?php echo $facebook; ?>"><img alt="" src="<?php echo TDU; ?>/images/ico-facebook-1.png"></a></li>
				<li><a href="<?php echo $google_plus; ?>"><img alt="" src="<?php echo TDU; ?>/images/ico-google-1.png"></a></li>
				<li><a href="<?php echo $linkedin; ?>"><img alt="" src="<?php echo TDU; ?>/images/ico-in-1.png"></a></li> -->
			</ul>
		</div>
		<?php
		if($twitter_accounts)
		{
			?>
			<div class="w-block">
				<h3>Tweet At Foundation Leadership</h3>
				<ul class="social-feed">
					<?php 
					foreach ($twitter_accounts as $t_account) 
					{
						?>
						<li>
							<div class="cell">
								<a href="#" class="just-tweet" data-account="<?php echo $t_account['account']; ?>"><img alt="" src="<?php echo $t_account['picture_name']; ?>"></a>
							</div>
							<div class="cell">
								<strong class="name"><a href="#" class="just-tweet" data-account="<?php echo $t_account['account']; ?>">@<?php echo $t_account['account']; ?></a></strong>
								<p><?php echo $t_account['first_name']; ?> <?php echo $t_account['last_name']; ?></p>
							</div>
						</li>
						<?php
					}
					?>
				</ul>
			</div>
			<?php
		}
		?>
		<?php
		if($email_accounts)
		{			
			?>
			<div class="w-block">
				<h3>Tweet At Foundation Leadership</h3>
				<ul class="social-feed">
					<?php 
					foreach ($email_accounts as $e_account) 
					{
						$mail = sprintf('mailto:%s', $e_account['account']);
						?>
						<li>
							<div class="cell">
								<a href="<?php echo $mail; ?>"><img alt="" src="<?php echo $e_account['picture_name']; ?>"></a>
							</div>
							<div class="cell">
								<strong class="name"><a href="<?php echo $mail; ?>"><?php echo $e_account['account']; ?></a></strong>
								<p><?php echo $e_account['first_name']; ?> <?php echo $e_account['last_name']; ?></p>
							</div>
						</li>
						<?php
					}
					?>
				</ul>
			</div>
			<?php
		}
		?>
		<!-- <div class="w-block">

			<h3>Tweet At Foundation Leadership</h3>
			<ul class="social-feed">

				<li>
					<div class="cell">
						<a href="#"><img alt="" src="<?php echo TDU; ?>/images/temp-avatar.png"></a>
					</div>
					<div class="cell">
						<strong class="name"><a href="#">@UserName</a></strong>
						<p>Firstname Lastname</p>
					</div>
				</li>
				<li>
					<div class="cell">
						<a href="#"><img alt="" src="<?php echo TDU; ?>/images/temp-avatar.png"></a>
					</div>
					<div class="cell">
						<strong class="name"><a href="#">@UserName</a></strong>
						<p>Firstname Lastname</p>
					</div>
				</li>
				<li>
					<div class="cell">
						<a href="#"><img alt="" src="<?php echo TDU; ?>/images/temp-avatar.png"></a>
					</div>
					<div class="cell">
						<strong class="name"><a href="#">@UserName</a></strong>
						<p>Firstname Lastname</p>
					</div>
				</li>
			</ul>
		</div> -->
		<!-- <div class="w-block">
			<h3>Email Foundation Leadership</h3>
			<ul class="social-feed">
				<li>
					<div class="cell">
						<a href="#"><img alt="" src="<?php echo TDU; ?>/images/temp-avatar.png"></a>
					</div>
					<div class="cell">
						<strong class="name"><a href="#">name@website.com</a></strong>
						<p>Firstname Lastname,  CEO</p>
					</div>
				</li>
				<li>
					<div class="cell">
						<a href="#"><img alt="" src="<?php echo TDU; ?>/images/temp-avatar.png"></a>
					</div>
					<div class="cell">
						<strong class="name"><a href="#">name@website.com</a></strong>
						<p>Board of Trustees</p>
					</div>
				</li>
				<li>
					<div class="cell">
						<a href="#"><img alt="" src="<?php echo TDU; ?>/images/temp-avatar.png"></a>
					</div>
					<div class="cell">
						<strong class="name"><a href="#">name@website.com</a></strong>
						<p>Firstname Lastname</p>
					</div>
				</li>
			</ul>
		</div> -->
		<?php
		echo $after_widget;
	}

	function form($instance) 
	{		
		$title            = $instance['title'];     		
		$twitter          = $instance['twitter'];
		$facebook         = $instance['facebook'];
		$google_plus      = $instance['google_plus'];
		$linkedin         = $instance['linkedin'];		

		?>		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title'); ?>: 
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
			</label>
		</p>	
		<p>
			<label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter account'); ?>: 
				<input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo esc_attr($twitter); ?>" />
			</label>
		</p>				
		<p>
			<label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook show'); ?>: 
				<input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="checkbox" <?php echo $this->checked($facebook); ?> />
			</label>
		</p>				
		<p>
			<label for="<?php echo $this->get_field_id('google_plus'); ?>"><?php _e('Google plus show'); ?>: 
				<input class="widefat" id="<?php echo $this->get_field_id('google_plus'); ?>" name="<?php echo $this->get_field_name('google_plus'); ?>" type="checkbox" <?php echo $this->checked($google_plus); ?> />
			</label>
		</p>				
		<p>
			<label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('Linkedin show'); ?>: 
				<input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="checkbox" <?php echo $this->checked($linkedin); ?> />
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
		$instance                     = $old_instance;		
		$instance['title']            = strip_tags($new_instance['title']);				
		$instance['twitter']          = strip_tags($new_instance['twitter']);
		$instance['facebook']         = ($new_instance['facebook'] == 'on') ? true : false;
		$instance['google_plus']      = ($new_instance['google_plus'] == 'on') ? true : false;
		$instance['linkedin']         = ($new_instance['linkedin'] == 'on') ? true : false;
		$instance['twitter_accounts'] = $this->clearEmptyAccounts($new_instance['twitter_accounts']);
		$instance['email_accounts']   = $this->clearEmptyAccounts($new_instance['email_accounts']);

		return $instance;
	}

	/**
	 * Clear empty array accounts
	 * @param  array $arr
	 * @return array     
	 */
	function clearEmptyAccounts($arr)
	{
		$new_arr = array();
		if($arr)
		{
			foreach ($arr as &$el) 
			{
				if($el['account'] != '') $new_arr[] = $el;
			}
		}
		return $new_arr;
	}

	/**
	 * Helper function for checkbox control
	 * @param  boolean $yes 
	 * @return string       
	 */
	function checked($yes = true)
	{
		return ($yes) ? 'checked' : '';
	}
}
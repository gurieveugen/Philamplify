<?php
// =========================================================
// REQUIRE
// =========================================================
require($_SERVER["DOCUMENT_ROOT"].'/wp-blog-header.php');
header("HTTP/1.1 200 OK");


class AJAX{
	//                          __              __      
	//   _________  ____  _____/ /_____ _____  / /______
	//  / ___/ __ \/ __ \/ ___/ __/ __ `/ __ \/ __/ ___/
	// / /__/ /_/ / / / (__  ) /_/ /_/ / / / / /_(__  ) 
	// \___/\____/_/ /_/____/\__/\__,_/_/ /_/\__/____/  
	const SUBSCRIBE_NONCE    = 'subscribe-nonce';
	const SUBSCRIBE_OPTION   = 'subscribers';	                                                 
	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  
	public function __construct($action)
	{			
		if(method_exists($this, $action))
		{
			$this->$action();
		}		
	}

	/**
	 * Subscribe new user
	 */
	public function subscribe()
	{
		check_ajax_referer(self::SUBSCRIBE_NONCE, 'security');

		$email       = trim(strtolower($_POST['email']));
		$subscribers = get_option(self::SUBSCRIBE_OPTION);

		if(!is_array($subscribers))
		{
			$subscribers[]          = $email;
			update_option(self::SUBSCRIBE_OPTION, $subscribers);
			$json['add_subscriber'] = true;
			$json['msg']            = __('Subscriber successfully added!');
			echo json_encode($json);
			exit;
		}

		if(!in_array($email, $subscribers))
		{
			$subscribers[]          = $email;
			update_option(self::SUBSCRIBE_OPTION, $subscribers);
			$json['add_subscriber'] = true;
			$json['msg']            = __('Subscriber successfully added!');
		}
		else
		{
			$json['add_subscriber'] = false;
			$json['msg']            = __('Subscriber with this email already exists!');	
		}

		echo json_encode($json);
	}

	/**
	 * Delete all subscribers
	 */
	public function resetSubscribers()
	{
		delete_option(self::SUBSCRIBE_OPTION);

		echo json_encode(array('empty' => true));
	}

	/**
	 * Get more stories
	 */
	public function moreStories()
	{
		$options = $GLOBALS['gcoptions']->getAll();
		$items   = $GLOBALS['sotries']->getItems(array(
			'posts_per_page' => intval($options['stories_count']),
			'offset'         => intval($_POST['offset']))); 
		if($items)
		{
			$json['html']   = $GLOBALS['sotries']->wrapItems($items);
			$json['result'] = TRUE;
		}
		else
		{			
			$json['result'] = FALSE;	
		}
		echo json_encode($json);
	}

	/**
	 * Agree/Disagree recomendation
	 */
	public function agreeDisagree()
	{
		$post_id                    = $_POST['post_id'];
		$id                         = $_POST['recommendation_id'];
		$type                       = $_POST['type'];
		$types                      = array('agree', 'disagree');
		$recommendations            = get_post_meta($post_id, 'recommendations', true);
		$key                        = in_array(strtolower($type), $types) ? $type : 'agree';
		$count                      = isset($recommendations[$id][$key]) ? intval($recommendations[$id][$key]) : 0;
		$recommendations[$id][$key] = $count + 1;
		$agree                      = intval($recommendations[$id]['agree']);
		$disagree                   = intval($recommendations[$id]['disagree']);
		$sum                        = $agree + $disagree;
		$percent                    = ($agree > 0 && $sum > 0) ? intval($agree/($sum/100)) : 0;
		$res                        = array(
			'msg'      => sprintf('Thank\'s for %s!', $key),
			'agree'    => $agree,
			'disagree' => $disagree,
			'sum'      => $sum,
			'percent'  => $percent);

		update_post_meta($post_id, 'recommendations', $recommendations);

		echo json_encode($res);
	}

	public function disqusCounts()
	{	
		$url = 'https://disqus.com/api/3.0/threads/set.json?'.http_build_query($_POST);
		$url = preg_replace('/%5B.*?%5D/', '[]', $url);		
		$json_string = $this->file_get_contents_curl($url);
		echo $json_string;
	}

	/**
	 * Get contents 
	 * @param  string $url
	 * @return string
	 */
	public function file_get_contents_curl($url) 
	{
	    $ch = curl_init();

	    curl_setopt($ch, CURLOPT_HEADER, 0);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	    curl_setopt($ch, CURLOPT_URL, $url);

	    $data = curl_exec($ch);
	    curl_close($ch);

	    return $data;
	}


	// =========================================================
	// OLD! MAYBE IN FUTURE I WILL REMOVE THIS CODE
	// =========================================================
	/**
	 * Sign up
	 */
	public function login()
	{		
		check_ajax_referer('signin_form-nonce', 'security');
		
		$info = array(
			'log'      => $_POST['log'],
			'pwd'      => $_POST['pwd'],
			'remember' => isset($_POST['remember']));
		
		$user_signon           = wp_signon($info, false);

		if(is_wp_error($user_signon))
		{
			$json['loggedin'] = false;
			$json['message']  = sprintf('%s <br><a href="#" id="lostpassword_a">%s</a>', __('The password you entered is incorrect.'), __('Lost your password?'));
		} 
		else 
		{
			$json['loggedin']    = true;
			$json['message']     = __('Login successful, redirecting...');	  
			$json['redirect_to'] = get_user_meta($user_signon->ID, 'default_url', true);  
		}

		echo json_encode($json);
	}

	/**
	 * Sign in
	 */
	public function registration()
	{
		$json['registered'] = false;
		$json['message']    = '';
		
		if(!strlen($_POST['fullname']))
		{
			$json['message'] = __('You must include a full name.');				
		} 
		if(!strlen($_POST['employment']) || $_POST['employment'] == 'Affiliation')
		{
			$json['message'] = __('Please select affiliation.');				
		} 
		if(strlen($_POST['pwd']) < 8)
		{
			$json['message'] = __('Password must be at least eight characters.');			
		} 	

		if(strlen($json['message']) == 0)
		{			
			$user_id = wp_create_user($_POST['log'], $_POST['pwd'], $_POST['email']); 
			if(is_wp_error($user_id))
			{			
				$json['message'] = $user_id->get_error_message();
			}
			else
			{
				update_user_meta($user_id, 'fullname', $_POST['fullname']);
		    	update_user_meta($user_id, 'employment', $_POST['employment']);

		    	wp_set_current_user($user_id);
		    	wp_set_auth_cookie($user_id, false, is_ssl());
		    	
		    	// =========================================================
		    	// SEND NOTIFICATION
		    	// =========================================================
				$user 	  = get_userdata($user_id);
				$blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);
				$message  = sprintf(__('New user registration on your site %s:'), $blogname) . "\r\n\r\n";
				$message .= sprintf(__('Username: %s'), $user->user_login) . "\r\n\r\n";
				$message .= sprintf(__('E-mail: %s'), $user->user_email) . "\r\n";

				@wp_mail(get_option('admin_email'), sprintf(__('[%s] New User Registration'), $blogname), $message);
				
				$message      = '<img src="'.get_bloginfo('template_url').'/images/email_logo.png" alt="Badge green"><br>';
				$message     .= 'Thank you for signing up for the Role Models Matter toolkit.  This toolkit provides fun, online training and resources for role models to develop the skills to engage youth in STEM (science, technology, engineering, and math).  Please be sure to sign in each time you visit the site so that you can save and share responses to questions within each tool.'."<br><br>\r\n\n";
				$message     .= sprintf('Username: %s', $user->user_login)."<br>\r\n";
				$message     .= sprintf('Link to Role Models Matter Toolkit: %s', get_bloginfo('url'))."<br>\r\n";

		    	wp_mail($user->user_email, sprintf(__('[%s] Your username and password'), $blogname), $message);

		    	$json['registered'] = true;
				$json['message']    = __('Registration successful, redirecting...');	


			}
		}

		echo json_encode($json);
	}



	/**
	 * Recovery own password
	 */
	public function lostpassword()
	{
		global $wpdb;
		
		$error   = '';
		$success = '';

		$email = trim($_POST['email']);

		if(empty($email)) 
		{
			$error = 'Enter a e-mail address..';
		} 
		else if(!is_email($email)) 
		{
			$error = 'Invalid e-mail address.';
		} 
		else if(!email_exists($email))
		{
			$error = 'There is no user registered with that email address.';
		} 
		else 
		{	
			$random_password = wp_generate_password( 12, false );
			$user            = get_user_by( 'email', $email );
			$update_user     = wp_update_user( array (
				'ID'        => $user->ID, 
				'user_pass' => $random_password
			));

			
			if($update_user) 
			{
				$to        = $email;
				$subject   = 'Your new password';
				$sender    = get_option('name');
				$message   = 'Login: '.$user->user_login."\r\n<br>";
				$message  .= 'Your new password is: '.$random_password;
				$headers[] = 'MIME-Version: 1.0' . "\r\n";
				$headers[] = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers[] = "X-Mailer: PHP \r\n";
				$headers[] = 'From: '.$sender.' < '.$email.'>' . "\r\n";
				$mail      = wp_mail( $to, $subject, $message, $headers );

				if($mail) $success = 'Thank you - you have been sent an email to update your password';

			} 
			else 
			{
				$error = 'Oops something went wrong updaing your account.';
			}
		}

		if(!empty($error)) 
		{
			$json['renewpassword'] = false;
			$json['message']       = $error;
		}
		else
		{
			$json['renewpassword'] = true;
			$json['message']       = $success;		
		}

		echo json_encode($json);
	}

	/**
	 * Send mail
	 */
	public function sendResponse()
	{
		global $current_user;

		$msg     = '<img src="'.get_bloginfo('template_url').'/images/email_logo.png" alt="Badge green"><br>';
		$subject = 'Role Models Matter Training Responses.';

		if(intval($_POST['all']))
		{
			foreach ($_POST['items'] as $post) 
			{
				$msg.= sprintf('<h1>%s</h1><br>', $post['title']);
				foreach ($post['items'] as $el) 
				{
					$msg.= sprintf('<h4>%s</h4><p>%s</p>', $el['question'], $el['answer']);
				}		
				$msg.= '<br><br>';
			}
		}
		else
		{
			$subject = $_POST['items']['title'];			
			$msg.= sprintf('<h1>%s</h1><br>', $_POST['items']['title']);
			foreach ($_POST['items']['items'] as $el) 
			{
				$msg.= sprintf('<h4>%s</h4><p>%s</p>', $el['question'], $el['answer']);
			}		
			$msg.= '<br><br>';
		}
		$json['sended']  = false;
		$json['message'] = 'Email not sent!';
		if(wp_mail($current_user->user_email, $subject, $msg))
		{
			$json['sended']  = true;
			$json['message'] = 'Your Role Models Matter training responses have been sent to you by email.';
		}
		echo json_encode($json);
	}
}

// =========================================================
// LAUNCH
// =========================================================
$GLOBALS['AJAX'] = new AJAX($_GET['action']);
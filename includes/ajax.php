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
		check_ajax_referer(self::SUBSCRIBE_NONCE, 'security_subscribe');

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
		$ip                         = $_POST['ip'];
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

		if(is_array($recommendations[$id]['ips']) && in_array($ip, $recommendations[$id]['ips']))
		{
			$res = array(
				'msg'     => sprintf('You have already agree/disagree this recommendation!', $key),
				'success' => false);
		}
		else
		{
			$recommendations[$id]['ips'][] = $ip;
			$res = array(
				'msg'      => sprintf('Thank\'s for %s!', $key),
				'agree'    => $agree,
				'disagree' => $disagree,
				'sum'      => $sum,
				'percent'  => $percent,
				'success'  => true);

			update_post_meta($post_id, 'recommendations', $recommendations);
		}
		

		echo json_encode($res);
	}

	/**
	 * Get counts for Assessment page
	 */
	public function disqusCounts()
	{	
		$url = 'https://disqus.com/api/3.0/threads/set.json?'.http_build_query($_POST);
		$url = preg_replace('/%5B.*?%5D/', '[]', $url);		
		$json_string = $this->file_get_contents_curl($url);
		echo $json_string;
	}
	
	/**
	 * Show user information Lightbox only once 
	 */
	public function showUserInformation()
	{
		$all_ips = get_option('user_information_ips');
		if(is_array($all_ips) && in_array($_POST['ip'], $all_ips))
		{
			$json['show'] = false;
		}
		else
		{
			$json['show'] = true;
			$all_ips[]    = $_POST['ip'];
		}
		update_option('user_information_ips', $all_ips);
		
		echo json_encode($json);
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
}

// =========================================================
// LAUNCH
// =========================================================
$GLOBALS['AJAX'] = new AJAX($_GET['action']);
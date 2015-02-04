<?php

class ShareFoundation{
	//                                       __  _          
	//     ____  _________  ____  ___  _____/ /_(_)__  _____
	//    / __ \/ ___/ __ \/ __ \/ _ \/ ___/ __/ / _ \/ ___/
	//   / /_/ / /  / /_/ / /_/ /  __/ /  / /_/ /  __(__  ) 
	//  / .___/_/   \____/ .___/\___/_/   \__/_/\___/____/  
	// /_/              /_/                                 
	private $response;

	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  
	                                             
	public function __construct($response)
	{
		$this->response = $response;
	}

	public function share()
	{
		$post = $this->getPostFromResponse();
		$meta = $this->getPostMetaFromResopnse();

		$p = (int) wp_insert_post( 
			array(
				'post_title'   => wp_strip_all_tags( $post['name'] ),
				'post_content' => $post['txt'],
				'post_type'    => 'foundation',
				'post_status'  => 'publish'
			) 
		);

		if($p > 0)
		{
			foreach ($meta as $key => $value) 
			{
				update_post_meta($p, $key, $value);
			}
			wp_redirect($this->response['page']);
			exit;
		}
	}

	public function getPostFromResponse()
	{
		$result   = array();
		$defaults = array(
			'name' => '',
			'txt'  => ''
		);

		foreach ($defaults as $key => $value) 
		{
			$result[$key] = isset($this->response[$key]) ? $this->response[$key] : '';
		}
		return array_merge($defaults, $result);
	}

	public function getPostMetaFromResopnse()
	{
		$result   = array();
		$defaults = array(
			'website'    => '',
			'type'       => '',
			'state'      => '',
			'first_name' => '',
			'last_name'  => '',
			'email'      => ''
		);

		foreach ($defaults as $key => $value) 
		{
			$result[$key] = isset($this->response[$key]) ? $this->response[$key] : '';
		}

		return array_merge($defaults, $result);
	}
}
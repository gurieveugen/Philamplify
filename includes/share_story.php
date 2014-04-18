<?php
// =========================================================
// REQUIRE
// =========================================================
require($_SERVER["DOCUMENT_ROOT"].'/wp-blog-header.php');
header("HTTP/1.1 200 OK");

class ShareStory{
	//                __  _                 
	//   ____  ____  / /_(_)___  ____  _____
	//  / __ \/ __ \/ __/ / __ \/ __ \/ ___/
	// / /_/ / /_/ / /_/ / /_/ / / / (__  ) 
	// \____/ .___/\__/_/\____/_/ /_/____/  
	//     /_/                              
	private $post;
	private $files;
	private $errors;
	
	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  
	public function __construct($post, $files)
	{
		var_dump($errors);
		var_dump($post);
		var_dump($files);
		$this->post  = $post;
		$this->files = $files;

		$this->checkPostErrors(array('first_name', 'last_name', 'email', 'story'));
		$this->checkFilesErrors(array('video', 'photo'));
	}

	/**
	 * Check text fields errors
	 */
	private function checkPostErrors($fields)
	{
		foreach ($fields as &$field) 
		{
			if(!strlen($this->post[$field]))
			{
				$this->errors[] = $fields.' is empty. This field must necessarily be filled!';
			}
		}
	}

	/**
	 * Check files error
	 */
	private function checkFilesErrors($fields)
	{
		foreach ($fields as &$field) 
		{
			if(!isset($this->files[$field]))
			{
				$this->errors[] = 'Problems uploading a file!';
			}
			else
			{
				if($this->files[$field]['error'] != 0 && $this->files[$field]['error'] != 4)
				{
					$this->errors[] = 'Problems uploading a file!';
				}
			}
		}
	}	
}
// =========================================================
// LAUNCH
// =========================================================
$GLOBALS['share_story'] = new ShareStory($_POST, $_FILES);


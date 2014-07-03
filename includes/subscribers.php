<?php

require($_SERVER["DOCUMENT_ROOT"].'/wp-blog-header.php');

$upload_dir = wp_upload_dir();
$path       = $upload_dir['path'].'/list.txt';
$list       = get_option(AJAX::SUBSCRIBE_OPTION);
$f          = '';
if($list)
{
	foreach ($list as $item) 
	{
		if($item != '') $f .= "$item\n";
	}
}
file_put_contents($path, $f);

wp_redirect($upload_dir['url'].'/list.txt');
<?php

	function get_http_response_code($url) {
    	$headers = get_headers($url);
    	return substr($headers[0], 9, 3);
	}

	function get_controllers_names()
	{
		$files = array();
		
		if (function_exists('get_files_in')) {
			$files =  get_files_in(APPPATH.'controllers');	
		}

		$names = array();
		if ($files) {
			foreach ($files as $key => $name) {
				$names[] = removeFromEnd($name,'.php');
			}
		}
		return $names;
	}

	function set_module_name($text='',$length=3)
	{
		$text 	= str_replace('_', ' ', $text);
		$size 	= strlen($text);
		$len 	= $size-$length;
		$text 	= substr($text, $length,$len);
		return ucwords($text);
	}
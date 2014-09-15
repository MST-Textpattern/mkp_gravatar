	function mkp_gravatar($atts)
	{
	
		global $thiscomment;
	
		extract(lAtts(array(
			'email'   => '',	
			'size'   => '80',
			'default'   => '',
			'rating'   => 'g',
			'secure'   => '0',	
			'image'   => '1',	
			'class'   => '',		
			'alt'  => ''
		),$atts));
		
		$http = ($secure=='1') ? 'https://' : 'http://';
		
		$email 	= (!empty($email)) ? md5(strtolower(trim(parse($email)))) : md5(strtolower(trim($thiscomment['email'])));
 
		$url = $http.'www.gravatar.com/avatar/';
		$url .= $email;
		$url .= '?s='.$size;
		$url .= '&d='.$default;
		$url .= '&r='.$rating;
		
		if (isset($image)) {
			$url = '<img src="' . $url . '" ';
			if (!empty($class)) {		
				$url .= 'class="' . $class . '" ';
			}
			if (!empty($alt)) {		
				$url .= 'alt="' . $alt . '" ';
			}
			$url .= '/>';
		}
 
		return $url;
	}

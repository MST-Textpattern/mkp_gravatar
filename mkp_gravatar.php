	function mkp_gravatar($atts)
	{
	
		global $thiscomment;
	
		extract(lAtts(array(
			'email'   => '',	
			'size'   => '80',
			'rating'   => 'g',
			'default'   => '',
			'force'   => '',
			'secure'   => '0',	
			'image'   => '1',	
			'class'   => '',		
			'alt'  => '',
			'disable'  => '',
		),$atts));
		
		$http = ($secure=='1' || $secure=='y' || $secure=='true') ? 'https://' : 'http://';
		
		$email 	= (!empty($email)) ? md5(strtolower(trim(parse($email)))) : md5(strtolower(trim($thiscomment['email'])));
 
		$url = $http.'www.gravatar.com/avatar/';
		$url .= $email;
		$url .= '?s='.$size;
		$url .= '&r='.$rating;

		if (!empty($default)) {
			$url .= '&d='.$default;
			$force = ($force=='1' || $force=='y' || $force=='true') ? '&f=y' : '';
			$url .= $force;
		}
		
		if ($image=='1' || $image=='y' || $secure=='true') {
			$url = '<img src="' . $url . '" ';
			if (!empty($class)) {		
				$url .= 'class="' . $class . '" ';
			}
			if (!empty($alt)) {		
				$url .= 'alt="' . $alt . '" ';
			}
			$url .= '/>';
		}

		$url = ($disable=='1' || $disable=='y' || $disable=='true') ? '' : $url;
 
		return $url;
	}

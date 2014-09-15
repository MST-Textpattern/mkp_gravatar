	function mkp_gravatar($atts)
	{
	
		global $thiscomment;
	
		extract(lAtts(array(
			'email'   => '',	
			'size'   => '80',
			'default'   => 'mm',
			'rating'   => 'g',
			'secure'   => '0',	
			'image'   => '1',				
			'class'  => ''
		),$atts));
		
		$http = (isset($secure)) ? 'https://' : 'http://';
		
		$email 	= (!empty($email)) ? md5(strtolower(trim(parse($email)))) : md5(strtolower(trim($thiscomment['email'])));
 
		$url = $http.'www.gravatar.com/avatar/'.$email.'?s='.$size.'&d='.$default.'&r='.$rating ;
		
		if (isset($image)) {
			if (isset($class)) {		
				$url = '<img src="' . $url . '" />';
			} else {
				$url = '<img class="'.$class.'". src="' . $url . '" />';
			}
		}
 
		return $url;
	}

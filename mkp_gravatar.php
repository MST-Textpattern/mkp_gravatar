	function mkp_gravatar($atts)
	{
	
		global $thiscomment;
	
		extract(lAtts(array(
			'secure'   => '0',
			'email'   => '',	
			'size'   => '80',
			'rating'   => 'g',
			'default'   => '',
			'force'   => '',	
			'image'   => '1',
			'alt'  => '',
			'class'   => '',		
			'id'  => '',
			'style'  => '',
			'title'  => '',
			'disable'  => '',
		),$atts));
		
		$url = ($secure=='1' || $secure=='y' || $secure=='true') ? 'https://secure.gravatar.com/avatar/' : 'http://www.gravatar.com/avatar/';
		
		$url .= (!empty($email)) ? md5(strtolower(trim(parse($email)))) : md5(strtolower(trim($thiscomment['email'])));

		$url .= '?s='. $size . '&r=' . $rating;

		if (!empty($default)) {
			$url .= '&d='.$default;
			$url .= ($force=='1' || $force=='y' || $force=='true') ? '&f=y' : '';
		}
		
		if ($image=='1' || $image=='y' || $image=='true') {
			$url = '<img src="' . $url . '" height="' . $size . '" width="' . $size . '" ';
			if (!empty($alt)) {		
				$url .= 'alt="' . $alt . '" ';
			}
			if (!empty($class)) {		
				$url .= 'class="' . $class . '" ';
			}
			if (!empty($id)) {		
				$url .= 'id="' . $id . '" ';
			}
			if (!empty($style)) {		
				$url .= 'style="' . $style . '" ';
			}
			if (!empty($title)) {		
				$url .= 'title="' . $title . '" ';
			}
			$url .= '/>';
		}

		$url = ($disable=='1' || $disable=='y' || $disable=='true') ? '' : $url;
 
		return $url;
	}

<?php
	function auth($login, $passwd) {
		$pass = hash('whirlpool', $passwd);
		if (file_exists("../private/passwd")) :
			$arr = file_get_contents("../private/passwd");
			$arr = unserialize($arr);
			foreach ($arr as $elem) :
				if ($elem['login'] == $login && $elem['passwd'] == $pass) :
					return (TRUE);
				endif;
			endforeach;
		endif;
		return (FALSE);
	}
?>
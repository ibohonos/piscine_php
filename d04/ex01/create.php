<?php
	if ($_POST['submit'] == "OK") :
		if ($_POST['login'] != "" && $_POST['passwd'] != "") :
			$pass = hash('whirlpool', $_POST['passwd']);
			if (file_exists("../private") == FALSE) :
				mkdir("../private", 0777, true);
			endif;
			if (file_exists("../private/passwd") == FALSE) :
				$arr[] = [
					'login' => $_POST['login'],
					'passwd' => $pass
				];
				$arr = serialize($arr);
				file_put_contents("../private/passwd", $arr);
				echo "OK\n";
			else :
				$isset = FALSE;
				$arr = file_get_contents("../private/passwd");
				$arr = unserialize($arr);
				foreach ($arr as $elem) :
					if ($elem['login'] == $_POST['login'] && !$isset) :
						$isset = TRUE;
					endif;
				endforeach;
				if (!$isset) :
					$arr[] = [
						'login' => $_POST['login'],
						'passwd' => $pass
					];
					$arr = serialize($arr);
					file_put_contents("../private/passwd", $arr);
					echo "OK\n";
				else :
					echo "ERROR\n";
				endif;
			endif;
		else :
			echo "ERROR\n";
		endif;
	else :
		echo "ERROR\n";
	endif;
?>

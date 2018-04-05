<?php
	if ($_POST['submit'] == "OK") :
		if ($_POST['login'] != "" && $_POST['oldpw'] != "" && $_POST['newpw'] != "") :
			$oldpw = hash('whirlpool', $_POST['oldpw']);
			$newpw = hash('whirlpool', $_POST['newpw']);
			if (file_exists("../private/passwd")) :
				$arr = file_get_contents("../private/passwd");
				$arr = unserialize($arr);
				$modif = FALSE;
				$i = 0;
				foreach ($arr as $elem) :
					if ($elem['login'] == $_POST['login'] && $elem['passwd'] == $oldpw && !$modif) :
						$arr[$i]['passwd'] = $newpw;
						$modif = TRUE;
					endif;
					$i++;
				endforeach;
				if ($modif) :
					$array = serialize($arr);
					file_put_contents("../private/passwd", $array);
					echo "OK\n";
				else :
					echo "ERROR\n";
				endif;
			else :
				echo "ERROR\n";
			endif;
		else :
			echo "ERROR\n";
		endif;
	else :
		echo "ERROR\n";
	endif;
?>

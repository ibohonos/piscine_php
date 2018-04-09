#!/usr/bin/php
<?php
	if ($argc == 2) :
		$str = sscanf($argv[1], "%d %c %d %s");

		if (isset($str[0]) && isset($str[1]) && isset($str[2]) && !isset($str[3])) :
			$nb1 = $str[0];
			$op = $str[1];
			$nb2 = $str[2];

			if ($op == '+') :
				$res = $nb1 + $nb2;
			elseif ($op == '-') :
				$res = $nb1 - $nb2;
			elseif ($op == '/') :
				$res = $nb1 / $nb2;
			elseif ($op == '*') :
				$res = $nb1 * $nb2;
			elseif ($op == '%') :
				$res = $nb1 % $nb2;
			endif;
			echo $res . "\n";
		else :
			echo "Syntax Error\n";
		endif;
	else :
		echo "Incorrect Parameters\n";
	endif;
?>
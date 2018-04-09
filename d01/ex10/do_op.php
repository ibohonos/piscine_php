#!/usr/bin/php
<?php
	if ($argc == 4) :
		$nb1 = trim($argv[1]);
		$op = trim($argv[2]);
		$nb2 = trim($argv[3]);

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
		echo "Incorrect Parameters\n";
	endif;
?>
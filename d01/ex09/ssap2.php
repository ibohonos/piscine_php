#!/usr/bin/php
<?php
	function ft_split($s)
	{
		$s = trim($s);
		$s = preg_replace("/\s{2,}/", " ", $s);
		$arr = explode(" ", $s);
		return($arr);
	}

	function ft_ccmp($c1, $c2)
	{
		$c1 = strtolower($c1);
		$c2 = strtolower($c2);
		
		if (ctype_alpha($c2)) :
			$g2 = 1;
		elseif (ctype_digit($c2)) :
			$g2 = 2;
		else :
			$g2 = 3;
		endif;

		if (ctype_alpha($c1)) :
			$g1 = 1;
		elseif (ctype_digit($c1)) :
			$g1 = 2;
		else :
			$g1 = 3;
		endif;
		
		if ($g1 == $g2) :
			return (strcmp($c1, $c2));
		endif;

		return ($g1 - $g2);
	}

	function ft_scmp($s1, $s2)
	{
		$i = 0;
		$length = strlen($s1) < strlen($s2) ? strlen($s1) : strlen($s2);
		
		while ($i < $length) :
			if (ft_ccmp($s1[$i], $s2[$i]) > 0)
				return (1);
			if (ft_ccmp($s1[$i], $s2[$i]) < 0)
				return (-1);
			$i++;
		endwhile;
		
		if ($i < strlen($s1)) :
			return (1);
		elseif ($i < strlen($s2)) :
			return (-1);
		endif;

		return (0);
	}

	$arr = array();
	foreach ($argv as $arg) :
		if ($arg != $argv[0]) :
			$tab = ft_split($arg);
			$arr = array_merge($arr, $tab);
		endif;
	endforeach;
	usort($arr, "ft_scmp");
	foreach ($arr as $element) :
		echo $element . "\n";
	endforeach;
?>
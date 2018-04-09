#!/usr/bin/php
<?php
	function ft_split($s)
	{
		$s = trim($s);
		$s = preg_replace("/\s{2,}/", " ", $s);
		$arr = explode(" ", $s);
		if ($s != NULL)
			sort($arr);
		return($arr);
	}

	$arr = array();
	foreach ($argv as $arg) :
		if ($arg != $argv[0]) :
			$tab = ft_split($arg);
			$arr = array_merge($arr, $tab);
		endif;
	endforeach;
	sort($arr);
	foreach ($arr as $element) :
		echo $element . "\n";
	endforeach;
?>
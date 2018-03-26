#!/usr/bin/php
<?php
	function ft_split_no_sort($s)
	{
		$s = trim($s);
		$s = preg_replace("/\s{2,}/", " ", $s);
		$arr = explode(" ", $s);
		return($arr);
	}

	$tab = ft_split_no_sort($argv[1]);
	$first = array_shift($tab);
	foreach ($tab as $element) :
		echo $element . " ";
	endforeach;
	echo $first;
	if ($argc > 1)
		echo "\n";
?>
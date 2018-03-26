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
?>
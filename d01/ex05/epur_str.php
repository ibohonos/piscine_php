#!/usr/bin/php
<?php
	if ($argc == 2) :
		$s = trim($argv[1]);
		$s = preg_replace("/\s{2,}/", " ", $s);
		echo $s . "\n";
	endif;
?>
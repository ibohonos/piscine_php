#!/usr/bin/php
<?php
	foreach ($argv as $param) :
		if ($param != $argv[0])
			echo $param . "\n";
	endforeach;
?>
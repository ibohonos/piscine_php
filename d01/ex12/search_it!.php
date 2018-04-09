#!/usr/bin/php
<?php
	if ($argc > 2) :
		unset($argv[0]);
		foreach ($argv as $val) :
			if ($val != $argv[1]) :
				$search = explode(':', $val);
				if ($search[0] == $argv[1])
					$res = $search[1];
			endif;
		endforeach;
		if (!empty($res)) :
			echo $res . "\n";
		endif;
	else :
		echo "\n";
	endif;
?>
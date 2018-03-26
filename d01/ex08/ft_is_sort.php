#!/usr/bin/php
<?php
	function ft_is_sort($tab)
	{
		$i = 0;
		$count = count($tab);
		$arr = $tab;
		sort($tab);
		while ($i < $count) :
			if ($tab[$i] != $arr[$i])
				return (FALSE);
			$i++;
		endwhile;
		return (TRUE);
	}
?>
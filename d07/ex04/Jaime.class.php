<?php

class Jaime
{
	public function sleepWith($who)
	{
		if ($who instanceof Tyrion)
			print("Not even if I'm drunk !". PHP_EOL);
		elseif ($who instanceof Sansa)
			print("Let's do this." . PHP_EOL);
		elseif ($who instanceof Cersei)
			print("With pleasure, but only in a tower in Winterfell, then." . PHP_EOL);
	}
}
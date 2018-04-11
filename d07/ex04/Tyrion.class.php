<?php

class Tyrion
{
	public function sleepWith($who)
	{
		if ($who instanceof Jaime)
			print("Not even if I'm drunk !". PHP_EOL);
		elseif ($who instanceof Sansa)
			print("Let's do this." . PHP_EOL);
		elseif ($who instanceof Cersei)
			print("Not even if I'm drunk !". PHP_EOL);
	}
}
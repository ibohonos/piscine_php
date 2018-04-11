<?php

class NightsWatch implements IFighter
{
	private $sold = [];

	public function recruit($rec)
	{
		if ($rec instanceof IFighter)
			$this->sold[] = $rec;
	}

	public function fight()
	{
		foreach ($this->sold as $val) {
			$val->fight();
		}
	}
}
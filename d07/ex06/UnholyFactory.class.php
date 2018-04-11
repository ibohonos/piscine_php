<?php

class UnholyFactory
{
	private $sold = [];

	public function absorb($who)
	{
		if ($who instanceof Fighter) {
			if (isset($this->sold[$who->getName()])) {
				print("(Factory already absorbed a fighter of type " . $who->getName() . ")" . PHP_EOL);
			} else {
				print("(Factory absorbed a fighter of type " . $who->getName() . ")" . PHP_EOL);
				$this->sold[$who->getName()] = $who;
			}
		} else {
			print("(Factory can't absorb this, it's not a fighter)" . PHP_EOL);
		}
	}

	public function fabricate($who)
	{
		if (array_key_exists($who, $this->sold)) {
			print("(Factory fabricates a fighter of type " . $who . ")" . PHP_EOL);
			return (clone $this->sold[$who]);
		}
		print("(Factory hasn't absorbed any fighter of type " . $who . ")" . PHP_EOL);
		return NULL;
	}
}
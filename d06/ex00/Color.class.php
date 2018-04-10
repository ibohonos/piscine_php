<?php

class Color
{
	public static $verbose = FALSE;
	public $red;
	public $green;
	public $blue;
	public $rgb;

	function __construct($color)
	{
		if (isset($color['red']) && isset($color['green']) && isset($color['blue'])) :
			$this->red = $color['red'];
			$this->green = $color['green'];
			$this->blue = $color['blue'];
		else :
			$this->rgb = $color['rgb'];
		endif;
	}


}
?>
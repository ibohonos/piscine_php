<?php

class Color
{
	public static $verbose = FALSE;
	public $red;
	public $green;
	public $blue;

	function __construct($color)
	{
		if (isset($color['red']) && isset($color['green']) && isset($color['blue'])) :
			$this->red = round($color['red'] < 0 ? 0 : ($color['red'] > 255 ? 255 : $color['red']));
			$this->green = round($color['green'] < 0 ? 0 : ($color['green'] > 255 ? 255 : $color['green']));
			$this->blue = round($color['blue'] < 0 ? 0 : ($color['blue'] > 255 ? 255 : $color['blue']));
		else :
			$rgb = self::ft_hexToRgb($color['rgb']);
			$this->red = $rgb['r'];
			$this->green = $rgb['g'];
			$this->blue = $rgb['b'];
		endif;
		if (self::$verbose === TRUE)
			printf("Color( red: %3d, green: %3d, blue: %3d ) constructed.\n", $this->red, $this->green, $this->blue);
	}

	function __destruct()
	{
		if (self::$verbose === TRUE)
			printf("Color( red: %3d, green: %3d, blue: %3d ) destructed.\n", $this->red, $this->green, $this->blue);
	}

	function __toString()
	{
		return (sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue));
	}

	private function ft_hexToRgb($hex)
	{
		if (((int)$hex) !== $hex ) :
			if(ctype_xdigit($hex) && strlen($hex) === 6) :
				$hex  = ( int ) hexdec( $hex );
			else :
				return false;
			endif;
		endif;

		$color['r'] = ($hex >> 16) & 0xFF;
		$color['g'] = ($hex >> 8) & 0xFF;
		$color['b'] = $hex & 0xFF;
		$color['r'] = $color['r'] < 0 ? 0 : ($color['r'] > 255 ? 255 : $color['r']);
		$color['g'] = $color['g'] < 0 ? 0 : ($color['g'] > 255 ? 255 : $color['g']);
		$color['b'] = $color['b'] < 0 ? 0 : ($color['b'] > 255 ? 255 : $color['b']);

		return $color;
	}

	public function add(Color $color)
	{
		return (new Color( array( 'red' => $color->red + $this->red, 'green' => $color->green + $this->green, 'blue' => $color->blue + $this->blue )));
	}

	public function sub(Color $color)
	{
		return (new Color( array( 'red' => $this->red - $color->red, 'green' => $this->green - $color->green, 'blue' => $$this->blue - $color->blue)));
	}

	public function mult($color)
	{
		return (new Color( array( 'red' => $color * $this->red, 'green' => $color * $this->green, 'blue' => $color * $this->blue)));
	}

	public static function doc()
	{
		return (file_get_contents('Color.doc.txt'));
	}
}

?>
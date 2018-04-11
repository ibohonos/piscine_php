<?php

require_once "Color.class.php";

class Vertex
{

	public static $verbose = FALSE;
	private $_x;
	private $_y;
	private $_z;
	private $_w;
	private $_color;

	public function __construct(array $arr)
	{
		$this->_x = $arr['x'];
		$this->_y = $arr['y'];
		$this->_z = $arr['z'];

		if (isset($arr['w']) && !empty($arr['w'])) :
			$this->_w = $arr['w'];
		else :
			$this->_w = 1.0;
		endif;
		if (isset($arr['color']) && !empty($arr['color']) && $arr['color'] instanceof Color) :
			$this->_color = $arr['color'];
		else :
			$this->_color = new COLOR(['rgb' => 'ffffff']);
		endif;

		if (self::$verbose)
			print($this . " constructed\n");
	}

	function __destruct()
	{
		if (self::$verbose)
			print($this . " destructed\n");
	}

	function __toString()
	{
		$str = sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f", $this->_x, $this->_y, $this->_z, $this->_w);
		if (self::$verbose)
			$str = $str . ", " . $this->_color;
		return ($str . " )");
	}

	public static function doc()
	{
		return (file_get_contents('Vertex.doc.txt'));
	}

	public function getX()
	{
		return ($this->_x);
	}

	public function getY()
	{
		return ($this->_y);
	}

	public function getZ()
	{
		return ($this->_z);
	}

	public function getW()
	{
		return ($this->_w);
	}

	public function getColor()
	{
		return $this->_color;
	}

	public function setX($x)
	{
		$this->_x = $x;
	}

	public function setY($y)
	{
		$this->_y = $y;
	}

	public function setZ($z)
	{
		$this->_z = $z;
	}

	public function setW($w)
	{
		$this->_w = $w;
	}

	public function setColor($color)
	{
		$this->_color = $color;
	}
}

?>
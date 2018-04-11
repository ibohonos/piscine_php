<?php

require_once "Vertex.class.php";

class Vector
{
	public static $verbose = FALSE;
	private $_x;
	private $_y;
	private $_z;
	private $_w;

	function __construct($arr)
	{
		if (isset($arr['dest']) && $arr['dest'] instanceof Vertex) :
			if (isset($arr['orig']) && $arr['orig'] instanceof Vertex) {
				$orig = new Vertex(array('x' => $arr['orig']->getX(), 'y' => $arr['orig']->getY(), 'z' => $arr['orig']->getZ()));
			} else {
				$orig = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0));
			}
			$this->_x = $arr['dest']->getX() - $orig->getX();
			$this->_y = $arr['dest']->getY() - $orig->getY();
			$this->_z = $arr['dest']->getZ() - $orig->getZ();
			$this->_w = 0;
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
		return (sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )", $this->_x, $this->_y, $this->_z, $this->_w));
	}

	public static function doc()
	{
		return (file_get_contents('Vector.doc.txt'));
	}

	public function magnitude()
	{
		return ((float)sqrt(($this->_x * $this->_x) + ($this->_y * $this->_y) + ($this->_z * $this->_z)));
	}

	public function normalize()
	{
		$magnitude = $this->magnitude();
		if ($magnitude == 1)
			return clone $this;
		return new Vector(array('dest' => new Vertex(array('x' => $this->_x / $magnitude, 'y' => $this->_y / $magnitude, 'z' => $this->_z / $magnitude))));
	}

	public function add(Vector $rhs)
	{
		return new Vector(array('dest' => new Vertex(array('x' => $this->_x + $rhs->_x, 'y' => $this->_y + $rhs->_y, 'z' => $this->_z + $rhs->_z))));
	}

	public function sub(Vector $rhs)
	{
		return new Vector(array('dest' => new Vertex(array('x' => $this->_x - $rhs->_x, 'y' => $this->_y - $rhs->_y, 'z' => $this->_z - $rhs->_z))));
	}

	public function opposite()
	{
		return new Vector(array('dest' => new Vertex(array('x' => $this->_x * -1, 'y' => $this->_y * -1, 'z' => $this->_z * -1))));
	}

	public function scalarProduct($k)
	{
		return new Vector(array('dest' => new Vertex(array('x' => $this->_x * $k, 'y' => $this->_y * $k, 'z' => $this->_z * $k))));
	}

	public function dotProduct(Vector $rhs)
	{
		return ((float)(($this->_x * $rhs->_x) + ($this->_y * $rhs->_y) + ($this->_z * $rhs->_z)));
	}

	public function crossProduct(Vector $rhs)
	{
		return new Vector(array('dest' => new Vertex(array(
			'x' => $this->_y * $rhs->getZ() - $this->_z * $rhs->getY(),
			'y' => $this->_z * $rhs->getX() - $this->_x * $rhs->getZ(),
			'z' => $this->_x * $rhs->getY() - $this->_y * $rhs->getX()
		))));
	}

	public function cos(Vector $rhs)
	{
		$ths_m = $this->magnitude();
		$rhs_m = $rhs->magnitude();
		$dot = $this->dotProduct($rhs);

		return ($dot / $ths_m / $rhs_m);
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
}

?>
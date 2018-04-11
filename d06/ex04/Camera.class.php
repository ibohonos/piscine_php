<?php

require_once "Matrix.class.php";

class Camera
{
	public static $verbose = FALSE;
	private $_origin;
	private $_orientation;
	private $_width;
	private $_height;
	private $_ratio;
	private $_tT;
	private $_tR;
	private $_matr;

	function __construct(array $arr)
	{
		$this->_origin = $arr['origin'];
		$this->_orientation = $arr['orientation'];
		$this->_width = (float)$arr['width'] / 2;
		$this->_height = (float)$arr['height'] / 2;
		$this->_ratio = $this->_width / $this->_height;;
		$this->_tT = new Matrix(array('preset' => Matrix::TRANSLATION, 'vtc' => $this->_origin->opposite()));
		$this->_tR = $this->transpose($arr['orientation']);
		$this->_matr = new Matrix(array(
			'preset' => Matrix::PROJECTION,
			'fov' => $arr['fov'],
			'ratio' => $this->_ratio,
			'near' => $arr['near'],
			'far' => $arr['far']
		));
		if (self::$verbose)
			echo "Camera instance constructed\n";
	}

	function __destruct()
	{
		if (self::$verbose)
			printf("Camera instance destructed\n");
	}

	function __toString()
	{
		$tmp = "Camera( \n";
		$tmp .= "+ Origine: ".$this->_origin."\n";
		$tmp .= "+ tT:\n".$this->_tT."\n";
		$tmp .= "+ tR:\n".$this->_tR."\n";
		$tmp .= "+ tR->mult( tT ):\n".$this->_tR->mult($this->_tT)."\n";
		$tmp .= "+ Proj:\n".$this->_matr."\n)";
		return ($tmp);
	}

	public function watchVertex(Vertex $worldVertex){
		$vtx = $this->_matr->transformVertex($this->_tR->transformVertex($worldVertex));
		$vtx->setX($vtx->getX() * $this->_ratio);
		$vtx->setY($vtx->getY());
		$vtx->setColor($worldVertex->getColor());
		return ($vtx);
	}

	private function transpose(Matrix $m){
		$tmp[0] = $m->matrix[0];
		$tmp[1] = $m->matrix[4];
		$tmp[2] = $m->matrix[8];
		$tmp[3] = $m->matrix[12];
		$tmp[4] = $m->matrix[1];
		$tmp[5] = $m->matrix[5];
		$tmp[6] = $m->matrix[9];
		$tmp[7] = $m->matrix[13];
		$tmp[8] = $m->matrix[2];
		$tmp[9] = $m->matrix[6];
		$tmp[10] = $m->matrix[10];
		$tmp[11] = $m->matrix[14];
		$tmp[12] = $m->matrix[3];
		$tmp[13] = $m->matrix[7];
		$tmp[14] = $m->matrix[11];
		$tmp[15] = $m->matrix[15];
		$m->matrix = $tmp;
		return ($m);
	}

	public static function doc()
	{
		return (file_get_contents('Camera.doc.txt'));
	}
}

?>
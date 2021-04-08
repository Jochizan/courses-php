<?php
class Cylinder {
	public $radius;
	public $height;
	function __construct($radio, $altura) {
		$this->radius = $radio;
		$this->height = $altura;
	}
	function surface():float {
		return round($this->height * 2 * pi() * $this->radius + 2 * (pi() * pow($this->radius, 2)), 2);
	}
}
?>

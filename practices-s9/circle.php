<?php
class Circle {
	public $radius;
	function __construct(int $radio) {
		$this->radius = $radio;
	}
	public function surface():float {
		return round(pow($this->radius, 2) * pi(), 2);
	}
}
?>

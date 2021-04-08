<?php
require_once("classPerson.php");

class Empleader extends Person {

	protected $strPuesto;

	function __construct(int $dpi, string $nombre, int $edad) {
		parent::__construct($dpi, $nombre, $edad);
	}
	public function setPuesto(string $puesto) {
		$this->strPuesto = $puesto;
	}
	public function getPuesto():string {
		return $this->strPuesto;
	}
}// end class empleado
?>
<?php
class Person {

	public $intDpi;
	public $strName;
	public $intEdad;

	function __construct(int $dpi, string $name, int $edad) {
		$this->intDpi = $dpi;
		$this->strName = $name;
		$this->intEdad = $edad;
	}

	public function getDatePersonal () {
		$datos = "
		<h2>Datos Personales</h2>
		DPI: {$this->intDpi}<br>
		Name: {$this->strName}<br>
		Edad: {$this->intEdad}<br>
		";
		return $datos;
	}
}
?>

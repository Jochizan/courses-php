<?php
require_once("classPerson.php");
class Client extends Person {

	protected $fltCredito;

	function __construct(int $dpi, string $nombre, int $edad) {
		parent::__construct($dpi, $nombre, $edad);
	}
	public function setCredito(string $credito) {
		$this->fltCredito = $credito;
	}
	public function getCredito():string {
		return $this->fltCredito;
	}
}
?>

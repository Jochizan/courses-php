<?php
	class Operacion {
		
		public $cantidadUno = 0;
		public $cantidadDos = 0;
		public $resultado = 0;

		function __construct($intCant1, $intCant2) {
			$this->CantidadUno = $intCant1;
			$this->CantidadDos = $intCant2;
		}

		public function getSuma() {
			$this->resultado = $this->CantidadUno + $this->CantidadDos;
			return $this->resultado;
		}

		public function getResta() {
			$this->resultado = $this->CantidadUno - $this->CantidadDos;
			return $this->resultado;
		}
		
		public function getMultiplicar() {
			$this->resultado = $this->CantidadUno * $this->CantidadDos;
			return $this->resultado;
		}

		public function getDivision() {
			$this->resultado = $this->CantidadUno / $this->CantidadDos;
			return $this->resultado;
		}
	}// End Class Operation
?>
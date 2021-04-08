<?php
	class User {

		private $strName;
		private $strEmail;
		private $strTipe;
		private $strPassword;
		protected $strDateRegister;
		static $strEstado = "Activo";

		function __construct(string $nombre, string $email, string $tipo) {
			$this->strName = $nombre;
			$this->strEmail = $email;
			$this->strTipe = $tipo;
			$this->strPassword = rand();
			$this->strDateRegister = date('Y-M-D H:m:s');
		}

		public function getName():string {
			return $this->strName;
		}

		public function getEmail():string {
			return $this->strEmail;
		}

		public function getTipe():string {
			return $this->strTipe;
		}

		public function getPerfil() {
			echo "Datos del usuario <BR>";
			echo "Nombre: " . $this->strName . "<BR>";
			echo "Email: " . $this->strEmail . "<BR>";
			echo "Clave: " . $this->strPassword . "<BR>";
			echo "Fecha Registro: " . $this->strDateRegister . "<BR>";
			echo "Estado: " . self::$strEstado . "<BR>";
		}

		public  function setChangePassword(string $pass) {
			$this->strPassword = $pass;
		}
	} // End class User
?>	
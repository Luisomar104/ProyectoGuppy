<?php
class Rol
	{
		private $idRol;
		private $Rol2;
		private $EstadoRol;

		public function __GET($k){return $this->$k;}
		public function __SET($k, $v){return $this->$k = $v;}
	}
?>
<?php

class ciudad
{
    private $idCiudad;
    private $NombreCiudad;

    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}

?>

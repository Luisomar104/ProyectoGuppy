<?php

class conteo_visitas
{
    private $IdConteoVisitas;
    private $Visitas;
    Private $FKUsuario;



    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}

?>
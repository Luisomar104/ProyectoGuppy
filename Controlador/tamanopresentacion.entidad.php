<?php

class tamanopresentacion
{
    private $IdTamanoPresentacion;
    private $DescripcionTP;

   


    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}

?>

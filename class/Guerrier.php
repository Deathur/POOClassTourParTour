<?php
include_once 'Personnage.php';

class Guerrier extends Personnage{
    public function __construct() {
        $this->Nom = "Guerrier";
        $this->Vie = "120";
        $this->Force = "15";
    }
}
?>
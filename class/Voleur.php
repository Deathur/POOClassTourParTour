<?php
include_once 'Personnage.php';
class Voleur extends Personnage{
    public function __construct() {
        $this->Nom = "Voleur";
        $this->Vie = "100";
        $this->Force = "12";
    }
}
?>
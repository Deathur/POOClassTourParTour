<?php
include_once 'Personnage.php';
class Magicien extends Personnage{
    public function __construct() {
        $this->Nom = "Magicien";
        $this->Vie = "90";
        $this->Force = "8";
    }
}
?>
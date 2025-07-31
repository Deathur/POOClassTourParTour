<?php
include_once 'Personnage.php';
class Magicien extends Personnage{
    public function __construct() {
        $this->Nom = "Magicien";
        $this->Vie = "90";
        $this->Force = "8";
    }
    public function skill(){
        $randMagicien = rand(1, 100);
        if ($randMagicien <= 50){
            return true;
        }
        else {
            return false;
        }
    }
    public function attaquer(){
        if ($this->skill()){
            echo 'Boule de feu';
            echo '<br>';
            return $this->Force * 2;
        }
        else {
            echo '<br>';
            return $this->Force;
        }
    }
}
?>
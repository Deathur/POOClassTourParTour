<?php
include_once 'Personnage.php';

class Pistolero extends Personnage
{
    public function __construct() {
        $this->Nom = "Pistolero";
        $this->Vie = "90";
        $this->Force = "20";
    }
    public function skill(){
        $chancePistolero = rand(1, 100);
        if ($chancePistolero <= 10){
            return true;
        }
        else{
            return false;
        }
    }
    public function attaquer(){
        if ($this->skill()){
            echo 'Loupé';
            echo '<br>';
            return 0;
        }
        else{
            echo '<br>';
            return $this->Force;
        }
    }
}
?>
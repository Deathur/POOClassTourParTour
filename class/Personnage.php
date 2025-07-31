<?php

class Personnage{
    public $Nom;
    public $Vie;
    public $Force;

    //GETTER
    public function getNom(){
        $this->Nom;
    }
    public function getVie(){
        $this->Vie;
    }
    public function getForce(){
        $this->Force;
    }
    //SETTER
    public function setNom($Nom){
        $this->Nom = $Nom;
    }
    public function setVie($Vie){
        $this->Vie = $Vie;
    }
    public function setForce($Force){
        $this->Force = $Force;
    }
    //METHOD
    public function attaquer(){
        if ($this->Nom == 'Magicien'){
            $randMagicien = rand(1, 100);
            if ($randMagicien <= 50){
                $degats = $this->Force;
                $degats = $degats*2;
                echo 'Boule de feu !';
                echo '<br>';
                return $degats;
            }
            else {
                echo '<br>';
            }
        }
        else {
        }
        $degats = $this->Force;
        return $degats;
    }
    public function recevoirDegats(int $degats){
        if ($this->Nom == 'Voleur'){
            $randVoleur = rand(1, 100);
            if ($randVoleur <= 30){
                echo 'Esquive';
                echo '<br>';
                return;
            }
            else {
                echo '<br>';
            }
        }
        $VieActuel = $this->Vie - $degats;
        if ($VieActuel < 0){
            $VieActuel = 0;
        }
        $this->Vie = $VieActuel;
        return;
    }
    public function afficherEtat(){

    }
}

?>
<?php
include_once 'Personnage.php';
class Voleur extends Personnage
{
    public function __construct() {
        $this->Nom = "Voleur";
        $this->Vie = "100";
        $this->Force = "12";
    }
    public function skill(){
        $randMagicien = rand(1, 100);
        if ($randMagicien <= 30){
            return true;
        }
        else {
            return false;
        }
    }
    public function recevoirDegats(int $degats) {
        if ($this->skill()){
            echo 'Esquive';
            echo '<br>';
            return;
        }
        else{
            $VieActuel = $this->Vie - $degats;
            if ($VieActuel < 0){
                $VieActuel = 0;
            }
            $this->setVie($VieActuel);
            echo '<br>';
            return;
        }
    }
}
?>
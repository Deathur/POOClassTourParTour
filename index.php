<?php
session_start();

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
    public function attaquer(Personnage $adversaire){
        if ($this->Nom == 'Magicien'){
            $randMagicien = rand(1, 100);
            if ($randMagicien <= 50){
                $degats = $this->Force;
                $degats = $degats*2;
                echo 'Boule de feu !';
                echo '<br>';
            }
            else {
                $degats = $this->Force;
                echo '<br>';
            }
        }
        else {
            $degats = $this->Force;
        }
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
class Guerrier extends Personnage{
    public function __construct() {
        $this->Nom = "Guerrier";
        $this->Vie = "120";
        $this->Force = "15";
    }

}
class Voleur extends Personnage{
    public function __construct() {
        $this->Nom = "Voleur";
        $this->Vie = "100";
        $this->Force = "12";
    }
}
class Magicien extends Personnage{
    public function __construct() {
        $this->Nom = "Magicien";
        $this->Vie = "90";
        $this->Force = "8";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="Viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
             
        
        <?php
        echo '
        <form method="POST">
            <input type="submit" name="chooseWarrior" value="Guerrier">
            <input type="submit" name="chooseThief" value="Voleur">
            <input type="submit" name="chooseMagician" value="Mage">
        </form>     
            ';
        if(isset($_POST['chooseWarrior'])) {
            $_SESSION['player1'] = serialize(new Guerrier());
            $randomAdversaire = rand(1,2);
            if ($randomAdversaire == 1){
                $_SESSION['player2'] = serialize(new Voleur());
                echo '<br>';
            }
            else {
                $_SESSION['player2'] = serialize(new Magicien());
                echo '<br>';
            }
        } 
        if(isset($_POST['chooseThief'])) {
            $_SESSION['player1'] = serialize(new Voleur());
            echo '<br>';
            $randomAdversaire = rand(1,2);
            if ($randomAdversaire == 1){
                $_SESSION['player2'] = serialize(new Magicien());
                echo '<br>';
            }
            else {
                $_SESSION['player2'] = serialize(new Guerrier());
            }
        }
        if(isset($_POST['chooseMagician'])){
            $_SESSION['player1'] = serialize(new Magicien());
            echo '<br>';
            $randomAdversaire = rand(1,2);
            if ($randomAdversaire == 1){
                $_SESSION['player2'] = serialize(new Guerrier());
            }
            else {
                $_SESSION['player2'] = serialize(new Voleur());
                echo '<br>';
            }
        }
        if (isset($_POST['chooseWarrior']) || isset($_POST['chooseThief']) || isset($_POST['chooseMagician'])){
            $Joueur1 = unserialize($_SESSION['player1']);
            foreach ($Joueur1 as $key=>$value){
                echo '<p class="info">'.$key. ": " .$value.'</p>';
            }
            echo '<br>';
            $adversaire = unserialize($_SESSION['player2']);
            foreach ($adversaire as $key=>$value){
                echo '<p class="info">'.$key. ": " .$value.'</p>';
            }
            echo '
            <form method="POST">
                <input type="submit" name="attack" value = Attaquer ennemi>
            </form>
            ';
        }
        if(isset($_POST['attack'])){
            $Joueur1 = unserialize($_SESSION['player1']);
            $adversaire = unserialize($_SESSION['player2']);
            $degats = $Joueur1->attaquer($adversaire);
            $adversaire->recevoirDegats($degats);
            $degats = $adversaire->attaquer($Joueur1);
            $Joueur1->recevoirDegats($degats);
            $_SESSION['player1'] = serialize($Joueur1);
            $_SESSION['player2'] = serialize($adversaire);
            foreach ($Joueur1 as $key=>$value){
                echo '<p class="info">'.$key. ": " .$value.'</p>';
            }
            echo '<br>';
            foreach ($adversaire as $key=>$value){
                echo '<p class="info">'.$key. ": " .$value.'</p>';
            }
            if ($adversaire->Vie <= 0){
                echo "Le ".$Joueur1->Nom." à gagné<br>";  
            }
            if ($Joueur1->Vie <= 0){
                echo "Le ".$adversaire->Nom." à gagné";
            }
            if ($adversaire->Vie > 0 && $Joueur1->Vie > 0){
                echo'
                <form method="POST">
                    <input type="submit" name="attack" value = Attaquer ennemi>
                </form>
                ';
            }
            
        }
        if (isset($POST_['reset'])){
            header("Location: index.php");
        }
            ?>
            <br>
            <form method="POST">
                <input type="submit" name="reset" value = Reset>
            </form>
    </body>
    </html>

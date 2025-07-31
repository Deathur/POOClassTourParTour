<?php
session_start();
include_once 'class/Personnage.php';
include_once 'class/Guerrier.php';
include_once 'class/Voleur.php';
include_once 'class/Magicien.php';
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

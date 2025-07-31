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
        include_once 'ChoixClasse.php';
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

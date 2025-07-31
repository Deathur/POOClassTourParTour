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
        if(isset($_POST['attack'])){
            $Joueur1 = unserialize($_SESSION['player1']);
            $adversaire = unserialize($_SESSION['player2']);
            $degats = $Joueur1->attaquer($adversaire);
            $adversaire->recevoirDegats($degats);
            $degats = $adversaire->attaquer($Joueur1);
            $Joueur1->recevoirDegats($degats);
            $_SESSION['player1'] = serialize($Joueur1);
            $_SESSION['player2'] = serialize($adversaire);
            include 'AffichageStats.php';
            if ($adversaire->Vie <= 0){
                echo "Le ".$Joueur1->Nom." à gagné<br>";  
            }
            if ($Joueur1->Vie <= 0){
                echo "Le ".$adversaire->Nom." à gagné";
            }
            
        }
        if (isset($POST_['reset'])){
            header("Location: index.php");
        }
        echo '<br>
            <form method="POST">
                <input type="submit" name="reset" value = Reset>
            </form>'
            ?>
    </body>
</html>
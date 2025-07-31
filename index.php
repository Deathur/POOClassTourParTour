<?php
session_start();
include_once 'class/Personnage.php';
include_once 'class/Guerrier.php';
include_once 'class/Voleur.php';
include_once 'class/Magicien.php';
include_once 'class/Pistolero.php';
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
            echo '<h1>Particularité des classes</h1>
            <p>Guerrier: Aucune</p>
            <p>Voleur: 30% de chances d\'esquiver</p>
            <p>Magicien: 50% de doubliuer l\'attaque</p>
            <p>Pistolero: 10% de chances de louper</p>
            ';
            include_once 'ChoixClasse.php';
            include 'Combat.php';
            include 'Reset.php';
        ?>
    </body>
</html>
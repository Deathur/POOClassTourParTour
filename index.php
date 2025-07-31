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
        include_once 'ChoixClasse.php';
        include 'Combat.php';
        include 'Reset.php';
            ?>
    </body>
</html>
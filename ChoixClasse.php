<?php
    echo '<h1>Particularité des classes</h1>
    <p>Guerrier: Aucune</p>
    <p>Voleur: 30% de chances d\'esquiver</p>
    <p>Magicien: 50% de doubliuer l\'attaque</p>
    <p>Pistolero: 5% de chances de louper</p>
    ';
    $class = ['Guerrier', 'Voleur', 'Magicien', 'Pistolero'];
    
    echo '<form method="POST">';
    foreach ($class as $key => $value){
        echo '
            <input type="submit" name='.$value.' value='.$value.'>
            ';
        if(isset($_POST[$value])) {
            $_SESSION['player1'] = serialize(new $value());
            $length = count($class);
            $randomAdversaire = rand(0, $length - 1);
            for ($i = 1; $i <= $length; $i++){
                if ($i == $randomAdversaire){
                    $_SESSION['player2'] = serialize(new $class[$i]());
                }
            }
        } 
        $Joueur1 = unserialize($_SESSION['player1']);
        $adversaire = unserialize($_SESSION['player2']);
    }
    foreach ($class as $key=>$value){
        if (isset($_POST[$value])){
            include 'AffichageStats.php';
        }
    }
    /*
    echo '</form>';
    if(isset($_POST['Guerrier'])) {
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
    if(isset($_POST['Voleur'])) {
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
    if(isset($_POST['Magicien'])){
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
    */
    
?>
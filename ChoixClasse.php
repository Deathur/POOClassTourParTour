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
?>
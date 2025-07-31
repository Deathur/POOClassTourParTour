<?php
foreach ($Joueur1 as $key=>$value){
    echo '<p class="info">'.$key. ": " .$value.'</p>';
}
echo '<br>';
foreach ($adversaire as $key=>$value){
    echo '<p class="info">'.$key. ": " .$value.'</p>';
}
if ($adversaire->Vie > 0 && $Joueur1->Vie > 0){
    echo'
    <form method="POST">
        <input type="submit" name="attack" value = Attaquer ennemi>
    </form>
    ';
}
?>
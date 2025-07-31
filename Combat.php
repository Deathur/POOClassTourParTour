<?php
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
?>
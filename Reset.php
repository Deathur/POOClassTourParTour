<?php
if (isset($POST_['reset'])){
    $_SESSION['player1']='';
    $_SESSION['player2']='';
    header("Location: index.php");
}
echo '<br><br>
    <form method="POST">
        <input type="submit" name="reset" value = Reset>
    </form>';
?>
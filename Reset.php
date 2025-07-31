<?php
if (isset($POST_['reset'])){
    header("Location: index.php");
}
echo '<br>
    <form method="POST">
        <input type="submit" name="reset" value = Reset>
    </form>';
?>
<?php

session_start();

$_SESSION['regName'] = $regValue;

?>

<form method="get" action="pass.php">
    <input type="text" name="display1" value="123">
    <input type="submit">
</form>

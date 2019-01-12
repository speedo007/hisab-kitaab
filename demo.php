<?php
session_start();
if(isset($_SESSION['xyz'])) echo $_SESSION['xyz'];
$_SESSION['xyz']="fdgvbn";
print_r($_SESSION);

?>

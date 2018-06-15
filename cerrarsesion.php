<?php 
session_start(); 
ob_start();
$_SESSION=array(); 
session_destroy(); 
//lo redirecciono a la página anterior 
?>
<?php
header('Location: index.php');?>


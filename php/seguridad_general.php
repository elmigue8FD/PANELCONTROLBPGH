<?php session_start(); ?>
<?php ob_start(); ?>
<?php 
if(!isset($_SESSION['sesion_activa1']))
{
 header("Location: ./php/cerrarSession.php");
}
ob_end_flush();
?>
<?php session_start(); ?>
<?php ob_start(); ?>
<?php 
if(!isset($_SESSION['nick']))
{
 header("Location: ../php/cerrarSessionP.php");
}  
ob_end_flush();
?>
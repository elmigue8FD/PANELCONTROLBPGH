<?php ob_start(); ?>
<?php
if($_SESSION['nivel']!=1)
{
	header("Location: ./php/cerrarSession.php");
}
ob_end_flush();
?>
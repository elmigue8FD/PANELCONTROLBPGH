<?php
ob_start();
session_start(); 
session_destroy();
header("Location: ../superPanel/index.php");
ob_end_flush();
?>
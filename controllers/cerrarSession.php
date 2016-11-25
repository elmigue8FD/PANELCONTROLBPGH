<?php
ob_start();
session_start(); 
session_destroy();
ob_end_flush();
?>
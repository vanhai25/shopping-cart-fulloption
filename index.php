<?php 
ob_start();
require"view/header.php";
require"app/controller/mainController.php";
require"view/footer.php";
ob_end_flush(); 
?>
<?php 
session_start();
if(isset($_POST['coin'])){
	$coin = $_POST['coin'];
 	$_SESSION['useCoin'] = $coin;

}
?>
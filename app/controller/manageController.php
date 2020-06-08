<?php 
session_start();
if(empty($_SESSION['iduser']) || empty($_SESSION['idshop'])){
	header("location:login.php");
}

require_once"../view/manage/_header.php";
$a = $manaModel->getIdUser($_SESSION['iduser']);

require_once"../view/manage/header.php";

if(isset($_GET['pg'])){
	$page = $_GET['pg'];
}
else{
	$page = "home";
}
switch ($page) {

	case 'home':
		
		require"../view/manage/home.php";
		break;
	case 'product':

		require"../app/controller/manage/product.php";
		break;
	case 'bill':

		require"../app/controller/manage/bill.php";
		break;

	
	default:
		require"view/home.php";
		break;
}


require_once"../view/manage/footer.php";



?>

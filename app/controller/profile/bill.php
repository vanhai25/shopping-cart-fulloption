
<?php 
if(isset($_GET['act'])){
	$act = $_GET['act'];
}
else{
	$act = 'all';
}

switch ($act) {
	case 'all':
		$all = $proModel->getProductByUser($_SESSION['iduser']);
		require_once"view/profile/bill/all.php";
		break;
	case 'waitcheck':
		$waitcheck = $proModel->getProductWaitCheck($_SESSION['iduser'],0);
		require_once"view/profile/bill/waitcheck.php";
		break;
	case 'waitproduct':
		$waitproduct = $proModel->getProductWaitCheck($_SESSION['iduser'],1);
		require_once"view/profile/bill/waitproduct.php";
		break;
	case 'danggiao':
		$danggiao = $proModel->getProductWaitCheck($_SESSION['iduser'],2);
		require_once"view/profile/bill/danggiao.php";
		break;
	case 'dagiao':
		$dagiao = $proModel->getProductWaitCheck($_SESSION['iduser'],3);
		require_once"view/profile/bill/dagiao.php";
		break;
	case 'dahuy':
		$dahuy = $proModel->getProductWaitCheck($_SESSION['iduser'],4);
		require_once"view/profile/bill/dahuy.php";
		break;

	default:
		# code...
		break;
}
?>
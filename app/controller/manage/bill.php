<?php 
if(isset($_GET['act'])){
	$act = $_GET['act'];
}
else{
	$act = 'home';
}
switch ($act) {
	case 'home':
		$bill = $manaModel->getBillByShop($_SESSION['iduser']);
		require"../view/manage/bill/home.php";
		break;
	case 'all':
		$all = $manaModel->getProductByShop($_SESSION['iduser']);
		require"../view/manage/bill/all.php";
		break;
	case 'waitcheck':
		$waitcheck = $manaModel->getProductWaitCheck($_SESSION['iduser'],0);
		if(isset($_GET['next'])){
			$id = $_GET['next'];
			$a = $manaModel->aceptBill($id,1);
			if($a){
				header("location:?pg=bill&act=waitcheck");
				return;
			}
		}
		require"../view/manage/bill/waitcheck.php";
		break;
	case 'waitproduct':
		$waitproduct = $manaModel->getProductWaitCheck($_SESSION['iduser'],1);
		if(isset($_GET['next'])){
			$id = $_GET['next'];
			$b = $manaModel->aceptBill($id,2);
			if($b){
				header("location:?pg=bill&act=waitproduct");
				return;
			}
		}
		require"../view/manage/bill/waitproduct.php";
		break;
	case 'danggiao':
		$danggiao = $manaModel->getProductWaitCheck($_SESSION['iduser'],2);

		if(isset($_GET['next']) && isset($_GET['idU']) && isset($_GET['idP'])){
			$id = $_GET['next'];
			$c = $manaModel->aceptBill($id,3);
			$a = $manaModel-> getProductByIdGet($id);
			$user = $manaModel->getUserById($_GET['idU']);
			$product = $manaModel->getProductByIdGet($_GET['idP']);
			$_SESSION['coin'] = $user->coinTotal;
			$totalCoin = $_SESSION['coin'] + ($product->coin * $_GET['quan']);
			if($totalCoin){
				$_SESSION['coin'] = $totalCoin;
				$total = $manaModel->updateCoin($_GET['idU'],$_SESSION['coin']);
				if($total){
					unset($_SESSION['coin']);
				}
			}
			
			if($c){
				header("location:?pg=bill&act=danggiao");
				return;
			}

				
			
		}
		require"../view/manage/bill/danggiao.php";
		break;
	case 'dagiao':
		$dagiao = $manaModel->getProductWaitCheck($_SESSION['iduser'],3);
		require"../view/manage/bill/dagiao.php";
		break;
	case 'dahuy':
		$dahuy = $manaModel->getProductWaitCheck($_SESSION['iduser'],4);
		require"../view/manage/bill/dahuy.php";
		break;
	
	default:
		require"../view/manage/bill/all.php";
		break;
}
?>
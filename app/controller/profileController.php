<?php
if(empty($_SESSION['iduser'])){
	header("location:dang-nhap");
}
$acc = $model->getAccount($_SESSION['iduser']);

?>


<section class="tong">
	<div class="container">
		<div class="row tong1" >
<?php require_once"view/profile/sidebar.php" ?>
			<div class="col-md-9 right" >
			<div class="titilecon">
<?php 
if(isset($_GET['com'])){
	$com = $_GET['com'];
}
else{
	$com = 'home';
}
switch ($com) {
	case 'home':
		
		require_once"app/controller/profile/home.php";
		break;

	case 'bill':
		
		require_once"app/controller/profile/bill.php";
		break;
	case 'coin':

		require_once"app/controller/profile/coin.php";
		break;
	case 'manage':

		require_once"app/controller/manageController.php";
		break;
	
	default:
		require_once"app/controller/profile/home.php";
		break;
}


?>




			</div>
		</div>
	</div>
</section>


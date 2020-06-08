<?php 
session_start();
require"../../view/config.php";
require"../../app/model/mainModel.php";
$model = new mainModel;
if(isset($_POST['username'])){
	$kq = $model-> loginAccount($_POST['username'],$_POST['password']);
	if($kq){
		$_SESSION['iduser'] = $kq->id;
		$_SESSION['nameu'] = $kq->name;
		echo "yes";
	}
	else{
		echo "no";
	}
}

?>
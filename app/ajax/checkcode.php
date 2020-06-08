<?php 
session_start();
require"../../view/config.php";
require"../../app/model/mainModel.php";
require"../../lib/PHPMailer/sendmail.php";
$model = new mainModel;
if(isset($_POST['code'])){
	if($_POST['code'] == $_SESSION['acc']['token']){
		$kq = $model->register($_SESSION['acc']['name'], $_SESSION['acc']['mail'], $_SESSION['acc']['pass']);
		$ac = $model->loginAccount($_SESSION['acc']['mail'], $_SESSION['acc']['pass']);
		$_SESSION['iduser'] = $ac->id;
		$_SESSION['nameu'] = $ac->name;
		unset($_SESSION['acc']);
		echo 'ok';
	}
	else{
		echo 'not';
	}
	
}





?>
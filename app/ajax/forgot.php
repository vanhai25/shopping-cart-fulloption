<?php 
session_start();
require"../../view/config.php";
require"../../app/model/mainModel.php";
require"../../lib/PHPMailer/sendmail.php";
$model = new mainModel;
if(isset($_POST['rpmail'])){
	$a = $model->checkMail($_POST['rpmail']));
	if($a){
		$b = sendMail($_POST['rpmail'],$a->pass);
		if($b){
			echo 'yes';
		}
		
	}
	else{
		echo 'no';
	}
}



?>
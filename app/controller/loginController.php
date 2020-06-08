<?php 
require "lib/facebook/config.php";
if(isset($_SESSION['iduser'])){
	header("location:ca-nhan");
}


$facebook_helper = $facebook->getRedirectLoginHelper();



if(isset($_GET['code']))
{
 if(isset($_SESSION['access_token']))
 {
  $access_token = $_SESSION['access_token'];
 }
 else
 {
  $access_token = $facebook_helper->getAccessToken();

  $_SESSION['access_token'] = $access_token;

  $facebook->setDefaultAccessToken($_SESSION['access_token']);
 }

 $graph_response = $facebook->get("/me?fields=name,email", $access_token);

 $facebook_user_info = $graph_response->getGraphUser();

 if(!empty($facebook_user_info['id']))
 {
  $_SESSION['loginfb']['user_image'] = 'http://graph.facebook.com/'.$facebook_user_info['id'].'/picture';
  $_SESSION['user_id'] = $facebook_user_info['id'];
 }

 if(!empty($facebook_user_info['name']))
 {
  $_SESSION['loginfb']['user_name'] = $facebook_user_info['name'];
 }

 if(!empty($facebook_user_info['email']))
 {
  $_SESSION['loginfb']['user_email_address'] = $facebook_user_info['email'];
 }
 
}
else
{
 // Get login url
    $facebook_permissions = ['email']; // Optional permissions

    $facebook_login_url = $facebook_helper->getLoginUrl('<?=BASE_URL?>/dang-nhap', $facebook_permissions);
    
    // Render Facebook login button
    $facebook_login_url = '<div align="center"><a href="'.$facebook_login_url.'"><img src="upload/loginfb.png" width="100%" /></a></div>';
}

if(isset($_GET['login'])){
	$login = $_GET['login'];
}
else{
	$login = 'normal';
}
switch ($login) {
	case 'normal':
	require_once "view/header.php";
	if(isset($_POST['sm'])){
	    $mail = $_POST['mail'];
	    $pass = $_POST['pass'];
	    $check = $model->checkMail($mail);
	    if($check){
		    $data = $model->loginAccount($mail,$pass);
		    if($data){
		        $_SESSION['nameu']=$data->name;
		        $_SESSION['iduser']=$data->id;
		        $idshop = $model->getIdShop($data->id);
		        if($idshop){
		        	$_SESSION['idshop'] = $idshop->id;
		        }
		        header("location:ca-nhan");
		        return;
		    }
		    else{
		        $err = 'Tài khoản không đúng';
		    }	
	    }
	    else{
	    	$err = 'Tài khoản chưa đăng kí';
	    }
	    
	}
		require"view/login/normal.php";
		break;

	case 'loginfb':
	session_start();
	require_once"app/model/mainModel.php";
	$model = new mainModel;
	if(isset($_SESSION['user_id'])){
	    $check = $model->loginFacebook($_SESSION['user_id']);
	    if($check){
	       unset($_SESSION['loginfb']);
				 $_SESSION['iduser'] = $check->id;
				 $_SESSION['nameu'] = $check->name;
				 $idshop = $model->getIdShop($check->id);
			        if($idshop){
			        	$_SESSION['idshop'] = $idshop->id;
			        }
				header("location:ca-nhan");
				return;
	    }
	}
	if(isset($_POST['loginfb'])){
		$name = $_POST['namefb'];
		$mail = $_POST['mailfb'];
		$fb = $_POST['passfb'];
		$idUser = $model->registerFacebook($name,$mail,$fb,1);
		if($idUser){
			
			 $_SESSION['iduser'] = $idUser;
			 $_SESSION['nameu'] = $name;
			 $idshop = $model->getIdShop($idUser);
		        if($idshop){
		        	$_SESSION['idshop'] = $idshop->id;
		        }
			header("location:ca-nhan");
			return;
		}
	}
		require"view/login/facebook.php";
		break;
	
	default:
		require"view/login/normal.php";
		break;
}




?>



	
	

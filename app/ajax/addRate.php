<?php 
require"../../view/config.php";
require_once "../../app/model/mainModel.php";
$model = new mainModel;
session_start();
$error = '';
if(!empty($_POST['comment']) && !empty($_POST['rating'])){
	$comment = strip_tags($_POST['comment']);
	$star = $_POST['rating'];
	$idProduct = $_POST['idProduct'];
	$idUser = $_SESSION['iduser'];
	$checkUser = $model->checkUserRating($idUser,$idProduct);
	$checkByed = $model->checkUserProductRating($idUser,$idProduct);
	if($checkByed){
		if($checkUser){
			$error .='Bạn đã đánh giá sản phẩm này';
		}
		else{
			if(strlen($comment) <= 10 ){
				$error .= 'Xin vui lòng bình luận nhiều ký tự';
			}
		}
	}
	else{
		$error .= 'Bạn cần mua sản phẩm này để được đánh giá';
	}
	
	
	
}
else{
	$error .= "Bạn cần nhập đầy đủ bình luận và đánh giá";
}
if($error == ''){

	$add = $model->setRating($idUser,$idProduct,$star,$comment);
	$avg = $model->avgStar($idProduct);
	$updateRate = $model->updateRate($avg->star,$idProduct);
	$error = "Cảm ơn bạn đã đánh giá sản phẩm này";
}

$data = array(
	'error' => $error
);
echo json_encode($data);
?>
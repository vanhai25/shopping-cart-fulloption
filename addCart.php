<?php 

require"view/_header.php";


if(isset($_POST['sm'])){
	$idProduct = $_POST['idProduct'];
	
	$qty = $_POST['qty'];
	$o = $model->getOptionByCatalog($_POST['idCatalog']);
	$option='';
		foreach($o as $vl){
		$option .= $vl->name.': '.$_POST['option'.$vl->id].' ' ; 

	}


	$product = $DB->query('SELECT id FROM product WHERE id=:id', array('id' => $idProduct));
	$cart->add($product[0]->id,$qty,$option);	
	if(empty($product)){                                     // Nếu sản phẩm có 
		$json['message'] = 'Sản phẩm không tồn tại'; // thì phần từ message được gắn trong mảng jsson 
	}
	
	$json['error'] = false;    //Nếu sản phẩm id tồn tại thì gắn  error = false
	$json['total'] = number_format($cart->total())."đ";
	$json['count'] = $cart->countProduct();
	$json['message'] = 'Sản phẩm được thêm thành công '; // và gắn phần từ message 
	header('location:gio-hang');
}

if(isset($_POST['productid'])){
	$pid = $_POST['productid'];
	if($_POST['qty'] == null){
		$qty = 1;
	}
	elseif($_POST['qty'] >= 10){
		$qty = 10;
	}
	elseif($_POST['qty'] == 0){
		header('location:gio-hang?delCart='.$pid.'');
		return;
	}
	else{
		$qty = $_POST['qty'];
	}
	
	$_SESSION['cart'][$pid]['qty'] = $qty;

	
}




// if(isset($_GET['id'])){
// 	$product = $DB->query('SELECT id FROM product WHERE id=:id', array('id' => $_GET['id']));
// 	if(empty($product)){                                     // Nếu sản phẩm có 
// 		$json['message'] = 'Sản phẩm không tồn tại'; // thì phần từ message được gắn trong mảng jsson 
// 	}
// 	$cart->add($product[0]->id);
// 	$json['error'] =false;    //Nếu sản phẩm id tồn tại thì gắn  error = false
// 	$json['total'] = number_format($cart->total())."đ";
// 	$json['count'] = $cart->countProduct();
// 	$json['message'] = 'Sản phẩm được thêm thành công '; // và gắn phần từ message 
// }
// else{
// 	$json['message'] = 'Sản phẩm không tồn tại';
// }
// echo json_encode($json);

?>
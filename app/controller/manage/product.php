<?php 
if(isset($_GET['act'])){
 $act = $_GET['act'];
}
else{
	$act = 'list';
}
switch ($act) {
	case 'list':

		$product = $manaModel->getProductById($_SESSION['iduser']);
		require_once"../view/manage/product/list.php";
		break;
	case 'insert':
		$type = $manaModel->getAllCatalog();
		$shopid = $manaModel->getIdShop($_SESSION['iduser']);
		// Lấy các option liên quan đến sản phẩm
		$size = $manaModel->getTable('sizep');
		$color = $manaModel->getTable('colorp');
		if(isset($_POST['sm'])){
			if(!empty($_POST['color'])) $colorp = $_POST['color'];
			if(!empty($_POST['size'])) $sizep = $_POST['size'];
			$idType = $_POST['type'];
			$idShop = $shopid->id;
			$error = array();
	    		if(($_FILES['img']['type']!="image/png")
					&& ($_FILES['img']['type']!="image/gif")
					&& ($_FILES['img']['type']!="image/jpeg")
					&& ($_FILES['img']['type']!="image/jpg")
				){
					echo "File không đúng định dạng";
				}
				elseif($_FILES['img']['size'] > 5000000){
					echo "Ảnh phải nhỏ hơn 1MB";
				}
				elseif($_FILES['img']['size'] =""){
					echo "Bạn chọn phải chọn ảnh";
				}
				else{
					$files=$_FILES['img'];
					$img=$files['name'];
					$imgname = time()."-".$img;

					$link_img="../upload/product/".$imgname;
					move_uploaded_file($files['tmp_name'],"../upload/product/".$imgname);
				}

			if(empty($_POST['title'])) $error[]='title'; else $title = $_POST['title'];
			if(isset($title)){
	        $titleKo = convert_vi_to_en($title);
			}
			if(empty($_POST['price'])) $error[]='price'; else $price = $_POST['price'];
			if(empty($_POST['promotionPrice'])){ 
				$coin = coin($price);
			} 
			else{ 
				$promotionPrice = $_POST['promotionPrice'];
				$coin = coin($promotionPrice);
			}

			
			$limitAmount = $_POST['limit'];	
			$promotion = $_POST['desc'];	
			$detail = $_POST['detail'];			
			$status = $_POST['status'];

			if(empty($error)){
				$post = $manaModel->setProduct($idType,$idShop,$title,$titleKo,$detail,$price,$promotionPrice,$promotion,$coin,$imgname,$limitAmount,$status);
				// upload thumbnail
				if(isset($_FILES['avatar'])){
					$file = $_FILES['avatar'];
					$arrMimeType =['image/png', 'image/gif','image/jpg','image/jpeg'];
					foreach ($file['type'] as $key => $type) {
						$name = $file['name'][$key];
						if(!in_array($type, $arrMimeType)){
							
							$errImg = "Ảnh liên quan không đúng định dạng";
						}
						$size = $file['size'][$key];
						if($size > 5024000){
							$errImg = " ảnh liên quan file quá lớn   ";
						}
					}

					foreach ($file['tmp_name'] as $key => $value) {
						$newName = time().$file['name'][$key];
						move_uploaded_file($value, '../upload/product/'.$newName);
						
						if($file['name'][$key]){
							$a = $manaModel->setThumbnail($post,$newName);
						}
						
						
					}
				}
				// Xử lí về thêm các select option của sản phẩm như màu sắc, với kích cỡ
				if(!empty($colorp)){
					foreach($colorp as $value => $item){
						$cl = $manaModel->setProductColor($post,$item);
					}
				}
				if(!empty($sizep)){
					foreach($sizep as $value => $item){
						$sz = $manaModel->setProductSize($post,$item);
					}
				}
				if($post){
					header("location:index.php?pg=product&act=list");
					return;
				}
			}
			else{
				$message = "Bạn cần điển đủ thông tin";
			}
		}
		require_once"../view/manage/product/insert.php";
		break;
	
	default:
		require_once"../view/product/list.php";
		break;
}
?>
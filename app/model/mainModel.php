<?php 
require_once "DBConnect.php";


class mainModel extends DBConnect{
	function limitAmount(){
		$sql = "UPDATE product 
				SET deleted = 1
				WHERE limitAmount - buyed = 0
		";
		return $this->executeQuery($sql);
	}
// lấy thông tin bảng dựa vào điều kiện
	function getTableByWhere($table,$where){
		$sql = "SELECT *
				FROM $table 
				WHERE nameKo = '$where'
		";
		return $this->getOneRow($sql);
	}

// Lấy slide
	function getSlide(){
		$sql = "SELECT *
				FROM slide 
		";
	}
// Lấy danh mục sản phẩm
	function getListHome(){
		$sql = "SELECT * 
				FROM catalog
				WHERE status = 0
				AND parentId !=0
		";
	return $this->getMoreRows($sql);
	}
// lấy danh sách sản phẩm sale trong 1 ngày hiện tại
	function getSaleOfDay($date){
		$sql = "SELECT p.*,cc.name,cc.nameKo
				FROM product p  
				INNER JOIN catalogChild cc ON cc.id = idCatalogChild
				WHERE promotionPrice != 0
				-- AND $date - DATE_FORMAT(updateAt,'%Y%m%d') <= 1
		";
		return $this->getMoreRows($sql);
	}
// lấy danh sách sản phẩm hot nhất trong tuần 
	function careProduct(){
		$sql = "SELECT *, p.img as imgp, p.id as idp
				FROM product p  
				INNER JOIN catalogChild cc ON cc.id = idCatalogChild
				ORDER BY view DESC
				LIMIT 0,10
				
		";
		return $this->getMoreRows($sql);
	}

// Lấy danh sách thể loại level1
	function getCatalog1(){
		$sql = "SELECT *
				FROM catalog c 
				WHERE parentId = 0
		";
		return $this->getMoreRows($sql);
	}
//  lấy danh sách thể loại level2
	function getCatalog2($id){
		$sql = "SELECT *
				FROM catalog 
				WHERE parentId = $id 
		";
		return $this->getMoreRows($sql);
	}
// lấy danh sách thể loại 3 
	function getCatalog3($idc){
		$sql = "SELECT cc.* 
				FROM catalogChild cc 
				INNER JOIN catalog c ON c.id = idCatalog 
				WHERE idCatalog = $idc
		";
		return $this->getMoreRows($sql);
	}
// Lấy sản phẩm theo từng thể loại
	function getProductByCatalog($url,$position = -1, $quantity = -1){
		$sql = "SELECT p.* , cc.nameKo as nameKocc
				FROM catalogChild cc
				INNER JOIN product p ON idCatalogChild = cc.id 
				INNER JOIN catalog c ON c.id = idCatalog
				WHERE cc.nameKo = '$url'
				OR c.nameKo = '$url'
				ORDER BY p.id DESC
		";
		if($position != -1 && $quantity != -1){
			$sql .="LIMIT $position,$quantity";
		}
		return $this->getMoreRows($sql);
	} 


// Lấy chi tiết tin
	function getProductDetail($id,$url,$title){
		$sql = "SELECT p.*, t.name, t.nameKo, s.nameKo as nameKoShop, s.name as nameShop, t.idCatalog
				FROM product p 
				INNER JOIN catalogChild t ON t.id = idCatalogChild
				INNER JOIN shop s ON s.id = idShop
				WHERE p.id = $id
				AND t.nameKo = '$url'
				OR s.nameKo = '$url'
				AND titleKo = '$title'
		";
		return $this->getOneRow($sql);
	}

// Lấy ảnh thumbnail 
	function getThumbnail($idP){
		$sql = "SELECT * 
				FROM thumbnail
				WHERE idProduct = $idP
		";
		return $this->getMoreRows($sql);
	}
// lấy các option theo mỗi  catalog
	function getOptionByCatalog($idCatalog){
		$sql = "SELECT o.*
				FROM option_catalog oc 
				INNER JOIN option o ON o.id = oc.id_option
				INNER JOIN catalog c ON c.id = oc.id_catalog
				WHERE id_catalog = $idCatalog 
		";
		return $this->getMoreRows($sql);
	}
// lấy các giá trị của option theo sản phẩm
	function getValueOptionByProduct($idoption,$idproduct){
		$sql = "SELECT vo.*
				FROM value_option_product vop 
				INNER JOIN value_option vo ON vo.id = vop.idValueoption
				WHERE vo.idOption = $idoption
				AND vop.idProduct = $idproduct
		";
		return $this->getMoreRows($sql);
	}  

//  Đăng ký tài khoản người dùng
	function register($name,$mail,$pass){
		$sql = "INSERT INTO user(name,mail,pass)
				VALUES('$name','$mail','$pass')
	
		";
		return $this->executeQuery($sql);
	}
	function registerFacebook($name,$mail,$fb,$status){
		$sql = "INSERT INTO user(name,mail,fb,status)
				VALUES('$name','$mail','$fb',$status);
		";
		$check = $this->executeQuery($sql);
		if($check) return $this->getRecentIdInsert();
        return false;
	}
// Đăng ký đầy đủ thông tin
	function registerAll($name,$mail,$pass,$gender,$address,$tel){
		$sql = "INSERT INTO user(name,mail,pass,gender,address,phone)
				VALUES('$name','$mail','$pass',$gender,'$address','$tel')
		";
		return $this->executeQuery($sql);
	}
//  Đăng nhập vào tài khoản
	function loginAccount($mail,$pass){
		$sql = "SELECT *
				FROM user
				WHERE mail = '$mail'
				AND pass = '$pass'
		";
		return $this->getOneRow($sql);
	}
// Đăng nhập vào tài khoản fb
	function loginFacebook($idfb){
		$sql = "SELECT *
				FROM user 
				WHERE fb = '$idfb'
				AND status = 1
		";
		return $this->getOneRow($sql);
	} 
//  check idshop gắn vào session 
	function getIdShop($idUser){
		$sql = "SELECT *
				FROM shop 
				WHERE idUser = $idUser
		";
		return $this->getOneRow($sql);
	}
//  lấy thông tin từ tài khoản
	function getAccount($iduser){
		$sql = "SELECT * 
				FROM user 
				WHERE id = $iduser

		";
		return $this->getOneRow($sql);
	}
//  Kiểm tra mail tồn tại hay chưa
	function checkMail($mail){
		$sql = "SELECT *
				FROM user 
				WHERE mail = '$mail'
		";
		return $this->getOneRow($sql);
	}
// Lấy thông tin sản phẩm từ shop gian hàng
	function getProductByShop($url,$position = -1,$quantity = -1){
		$sql = "SELECT *, s.id as ids, p.img as imgp
				FROM product p 
				INNER JOIN shop s ON s.id = p.idShop
				WHERE nameKo = '$url'
				ORDER BY s.id DESC
		";
		if($position != -1 && $quantity != -1){
			$sql .="LIMIT $position,$quantity";
		}
		return $this->getMoreRows($sql);
	}
// Hàm đếm số lượng sản phẩm dựa vào shop
	function count($table,$id){
		$sql = "SELECT count(id) as soSp
				FROM $table
				WHERE idShop = $id
		";
		return $this->getOneRow($sql);
	}
// Hàm tính tổng sản phẩm đã mua của shop
	function sum($table,$id){
		$sql = "SELECT sum(buyed) as tongMua
				FROM $table 
				WHERE idShop = $id
		";
		return $this->getOneRow($sql);
	}
// cập nhật coin sau khi mua hàng
	function  updateCoin($id,$coin){
		$sql = "UPDATE user
				SET coinTotal = $coin
				WHERE id = $id
		";
		return $this->executeQuery($sql);
	} 
// cập nhật view sau khi xem sản phẩm
	function updateView($add,$id){
		$sql = "UPDATE product 
				SET view = $add
				WHERE id = $id
		";
		return $this->executeQuery($sql);
	}


// Hàm tăng sản phẩm khi mua 
	function addBuyed($add,$id){
		$sql = "UPDATE product
				SET buyed = $add
				WHERE id = '$id'
		";
		return $this->executeQuery($sql);
	} 

// Thông tin khách hàng
	function setCustomer($name, $gender, $mail, $tel, $address, $pass){
		$sql = "INSERT INTO customer(name, gender, mail, tel, address, password) 
				VALUES('$name', $gender, '$mail', '$tel', '$address', '$pass')
		";
		$check = $this->executeQuery($sql);
		if($check) return $this->getRecentIdInsert();
        return false;
	}
// Thêm hoá đơn
	function setBill($idUser, $total,$useCoin = 0, $note){
		$sql = "INSERT INTO bill(idUser, total, useCoin, note)
				VALUES($idUser, '$total','$useCoin', '$note')
		";
		$check = $this->executeQuery($sql);
		if($check) return $this->getRecentIdInsert();
        return false;
	}
// Thêm hoá đơn chi tiết
	function setBillDetail($idProduct,$idBill,$quantity,$price,$discountPrice,$selected = null){
		$sql = "INSERT INTO billdetail(idProduct,idBill,quantity,price,discountPrice,selected)
				VALUES($idProduct,$idBill,'$quantity','$price','$discountPrice','$selected')
		";
		return $this->executeQuery($sql);
	}
// Lấy thể loại của mỗi cửa hàng
	function getCatalogByShop($idShop){
		$sql = "SELECT DISTINCT name, nameKo
				FROM product p 
				INNER JOIN catalogChild cc ON cc.id = idCatalogChild
				WHERE idShop = $idShop
		";
		return $this->getMoreRows($sql);
	}
// Lấy chi tiết sản phẩm của từng thê loại ở gian hàng
	function getProductCatalogOfShop($url, $idShop, $position = -1, $quantity = -1){
		$sql = "SELECT p.*, p.img as imgp, nameKo, name
				FROM product p
				INNER JOIN catalogChild cc ON cc.id = p.idCatalogChild
				WHERE nameKo = '$url'
				AND idShop = $idShop
				
		";
		if($position != -1 && $quantity != -1){
			$sql .="LIMIT $position,$quantity";
		}
		return $this->getMoreRows($sql);
	}
// lấy tin người dùng đã xem sản phẩm
	function setViewProduct($idUser, $idProduct){
		$sql = "INSERT INTO viewed(idUser,idProduct)
				VALUES($idUser,$idProduct) 
		";
		return $this->executeQuery($sql);
	}
//  kiểm tra để ko thêm vào
	function checkViewed($idUser,$idProduct){
		$sql = "SELECT *
				FROM viewed 
				WHERE idUser = $idUser
				AND idProduct = $idProduct
		";
		return $this->getOneRow($sql);
	}

//  Lấy sản phẩm đã xem của bạn
	function getProductByView($idUser){
		$sql = "SELECT p.*, nameKo
				FROM product p 
				INNER JOIN viewed v ON v.idProduct = p.id 
				INNER JOIN catalogChild cc ON cc.id = idCatalogChild
				WHERE v.idUser = $idUser
				ORDER BY v.id DESC
				LIMIT 0,8
		";
		return $this->getMoreRows($sql);
	}
// Lấy thể loại chứa nhiều sản phẩm đã xem
	function getIdBest($iduser){
		$sql = "SELECT cc.id as id, COUNT(*) as count
				FROM product p
				INNER JOIN viewed v 
				ON idProduct = p.id 
				INNER JOIN catalogChild cc 
				ON cc.id = idCatalogChild 
				WHERE idUser = $iduser
				GROUP BY name
				ORDER BY count DESC 
				LIMIT 0,1
		";
		return $this->getOneRow($sql);
	}
//  Lấy sản phẩm theo id catalogchild
	function getProductByIdCatalog($id){
		$sql = "SELECT p.*, nameKo
				FROM product p 
				INNER JOIN catalogChild cc ON cc.id = idCatalogChild
				WHERE cc.id = $id
				ORDER BY view DESC
				LIMIT 12
		";
		return $this->getMoreRows($sql);
	}

// Lấy sản phẩm mua nhiều 
	function getProductByBuyed(){
		$sql = "SELECT p.*, nameKo 
				FROM product p
				INNER JOIN  catalogChild cc ON cc.id = idCatalogChild
				ORDER BY buyed DESC 
				LIMIT 0,12

		";
		return $this->getMoreRows($sql);
	}
// hiện list sản phẩm o input search
	function search($inpText){
		$sql = "SELECT name,nameKo
				FROM catalogChild
				WHERE name LIKE '%$inpText%'
		";
		return $this->getMoreRows($sql);
	}
// them rating
	function setRating($idUser,$idProduct,$star,$comment){
		$sql = "INSERT INTO rating(idUser,idProduct,star,comment)
				VALUES($idUser,$idProduct,$star,'$comment')
		";
		return $this->executeQuery($sql);
	}
// Lay rating comment
	function getRating($idProduct){
		$sql = "SELECT *, r.updateAt as updateAtr
				FROM rating r 
				INNER JOIN user u ON u.id = idUser   
				WHERE idProduct = $idProduct
				ORDER BY r.id DESC
		";
		return $this->getMoreRows($sql);
	}
// Check người mua chi đánh giá 1 lần
	function checkUserRating($idUser,$idProduct){
		$sql = "SELECT *
				FROM rating 
				WHERE idProduct = $idProduct
				AND idUser = $idUser
		";
		return $this->getOneRow($sql);
	}
// check bạn đã mua sản phẩm đó để đánh giá
	function checkUserProductRating($idUser,$idProduct){
		$sql = "SELECT *
				FROM billdetail bd 
				INNER JOIN bill b ON b.id = idBill
				WHERE idProduct = $idProduct
				AND idUser = $idUser
		";

		return $this->getOneRow($sql);
	}
// hàm tính trung bình sao của mỗi sản phẩm
	function avgStar($idProduct){
		$sql = "SELECT AVG(star) as star, idProduct
				FROM rating 
				WHERE idProduct = $idProduct
				GROUP BY idProduct
		";
		return $this->getOneRow($sql);
	}
// Hàm đếm số lượt đánh giá của mỗi sản phẩm
	function countRate($idProduct){
		$sql = "SELECT COUNT(id) as count
				FROM rating 
				WHERE idProduct = $idProduct
				GROUP BY idProduct
		";
		return $this->getOneRow($sql);
	}
// // Hàm update rating vào product
// 	function updateRate($rate,$idProduct){
// 		$sql = "UPDATE product
// 				SET rate = '$rate'
// 				WHERE id = $idProduct
// 		";
// 		return $this->executeQuery($sql);
// 	}
	//  hàm đếm số đánh giá trừng sản phẩm
	// function countRate($idProduct){
	// 	$sql = "SELECT count(*) as sl
	// 			FROM rating 
	// 			WHERE idProduct = $idProduct
	// 	";
	// 	return $this->getOneRow($sql);
	// }


}
?>
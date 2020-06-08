<?php 


	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}
	else{
		$page='home';
	}

	switch ($page) {
		// Xử lí ở trang chủ
		case 'home':

			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$date = date('Ymd',time());

			$list = $model->getListHome();
			$sale = $model->getSaleOfDay($date);
			$care = $model->careProduct();



			if(isset($_SESSION['iduser'])){
				$viewed = $model->getProductByView($_SESSION['iduser']);

				// Lấy sản phẩm cùng 1 thể loại dựa vào khách hàng xem thể loại sarn phẩm nhiều nhất 
				$idcc = $model->getIdBest($_SESSION['iduser']);
				
				if($idcc){
					$lq = $model->getProductByIdCatalog($idcc->id);
					$_SESSION['idBest'] = $idcc->id;
				}
				else{
					$lq = $model->getProductByIdCatalog(1);
				}


			}
			else{
				$viewed = null;
				$lq = $model->getProductByBuyed();
			}
			$productID = '';


            require"view/main/home.php";

			break;


		// Xử lí trang thể loại
		case 'catalog':
			
			if(isset($_GET['url'])){
				$url = $_GET['url'];
			}

			$quantity = 9;
			$pagi = 1;
			if(isset($_GET['pagi'])){
				$pagi = $_GET['pagi'];
			}

			$position = ($pagi-1)*$quantity;
			$pro = $model->getProductByCatalog($url,$position,$quantity);
			$totalProduct = count($model->getProductByCatalog($url));

			$pager = new Pager($totalProduct,$pagi,$quantity, 3);
			$showPagination = $pager->showPagination();

			$a = $model->getTableByWhere('catalog',$url);
			$b = $model->getTableByWhere('catalogChild',$url);

			require"view/main/catalog.php";
			break;

		// Xử lí trang chi tiết sản phẩm
		case 'product':

			$ssname = '';
			if(isset($_GET['id']) && isset($_GET['url']) && isset($_GET['title'])){
				$id = $_GET['id'];
				$url = $_GET['url'];
				$title = $_GET['title'];
					
			}

			$pro = $model->getProductDetail($id,$url,$title);
			$thumb = $model->getThumbnail($pro->id);
			// lấy các option 
			$op=$model->getOptionByCatalog($pro->idCatalog);
			// lấy giá trị option
			
			

			// Tính view

			
			$ssname .='sanpham-'.$pro->id;


			if(!$_SESSION[$ssname]){
				$_SESSION[$ssname] = 1;
				$add = $pro->view + 1;
				$addView = $model->updateView($add,$pro->id);
			}

			// Thêm view	
			if(isset($_SESSION['iduser'])){
				$checkViewed = $model->checkViewed($_SESSION['iduser'],$pro->id);
				if(!$checkViewed){
					$setView = $model->setViewProduct($_SESSION['iduser'],$pro->id);
				}
			}

			$_SESSION['idProduct'] = $pro->id;

			$avg = $model->avgStar($_SESSION['idProduct']);
			$count = $model->countRate($_SESSION['idProduct']);
			

			require"view/main/product.php";
			break;

		// xử lí ở trang cửa hàng
		case 'shop':
			
			if(isset($_GET['shop'])){
				$shop = $_GET['shop'];
			}
			$idShop = $model->getTableByWhere('shop',$shop);
				
		
			$count = $model->count('product',$idShop->id);
			$sum = $model->sum('product',$idShop->id);
			// Lấy danh sách menu
			$menu = $model->getCatalogByShop($idShop->id);
			// Lấy sản phẩm nếu có request còn không thì default
			if(isset($_GET['menu'])){
				$quantity = 9;
				$pagi = 1;
				if(isset($_GET['pagi'])){
					$pagi = $_GET['pagi'];
				}
				$position = ($pagi-1)*$quantity;
				
				$m = $_GET['menu'];
				$s = $model->getProductCatalogOfShop($m,$idShop->id,$position,$quantity);
				$totalProduct = count($model->getProductByShop($shop));

				$pager = new Pager($totalProduct,$pagi,$quantity, 3);
				$showPagination = $pager->showPagination();
			}
			else{
				$quantity = 9;
				$pagi = 1;
				if(isset($_GET['pagi'])){
					$pagi = $_GET['pagi'];
				}
				$position = ($pagi-1)*$quantity;
				$s = $model->getProductByShop($shop,$position,$quantity);
				$totalProduct = count($model->getProductByShop($shop));

				$pager = new Pager($totalProduct,$pagi,$quantity, 3);
				$showPagination = $pager->showPagination();
			}

			require"view/main/shop.php";
			break;
		// Xử lí trang giỏ hàng
		case 'cart':

			$ids = array_keys($_SESSION['cart']); //trả khoá của mảng trong session cart
			if(empty($_SESSION['useCoin'])){
				unset($_SESSION['useCoin']);
			}

			require"view/main/cart.php";
			break;

		// Xử lí trang thanh toán
		case 'checkout':
			
			$acc = $model->getAccount($_SESSION['iduser']);
			$ids = array_keys($_SESSION['cart']); //trả khoá của mảng trong session cart
			if(isset($_POST['sm'])){
				if(empty($_SESSION['cart'])){
					header('location:trang-chu');
					return;
				}
				else{
					$note = "Xin chào";
					$idUser = $_SESSION['iduser'];
					$total = $cart->total()['total'];
					if(isset($_SESSION['useCoin'])) $useCoin = $_SESSION['useCoin']; else $useCoin = 0; 
					$idBill = $model->setBill($idUser,$total,$useCoin,$note);


					
					$ids = array_keys($_SESSION['cart']);
					if(isset($ids)){

						$product = $DB->query('SELECT * FROM product WHERE id IN('.implode(',',$ids).')');
						foreach($product as $cartDetail){
						
							$color = $model->getOptionById('colorp',$_SESSION['cart'][$cartDetail->id]['color'])->color;
							$size = $model->getOptionById('sizep',$_SESSION['cart'][$cartDetail->id]['size'])->size;
							$selected = $size." ".$color;

							$idProduct = $cartDetail->id;
							$quantity =$_SESSION['cart'][$cartDetail->id]['qty'];
							$price = $cartDetail->price;
							$discountPrice = $cartDetail->promotionPrice;
							$billDetail = $model->setBillDetail($idProduct,$idBill,$quantity,$price,$discountPrice,$selected);
							$a = $model->addBuyed($cartDetail->buyed + $quantity,$cartDetail->id); // tính lượt mua sản phẩm

							

						}
						$body = '
							<h3>Hoá đơn chi tiết của khách hàng có mã là: '.$idUser.' </h3>
							<h2>Tổng tiền: '.number_format($cart->total()['total']).'đ </h2>
						';	
						$send = sendMail('kkokjun98@gmail.com',$body);
						if($send){
							$mess = "Đặt Hàng thành công! Xin cảm ơn quý khách.";
							if(isset($_SESSION['useCoin'])) $set = $model->updateCoin($idUser,$cart->total()['coin']);
							unset($_SESSION['cart']);
							unset($_SESSION['useCoin']);
							header("location:/?page=profile?com=bill&act=waitcheck");
						}		
					}

				}
						
						
						

			}

			require"view/main/checkout.php";
			break;

		// Xử lí trang đăng nhập
		case 'login':

			require"view/main/login.php";
			break;
		// Xử lí trang đăng ký
		case 'register':

			$error = array();
			$output = '<button type="submit" name="sm" class="primary-btn" style="width: 100%">Đăng ký</button>';

			if(isset($_POST['sm'])){
				if(empty($_POST['name'])) $error[] = 'name'; else $_SESSION['acc']['name'] = $_POST['name'];
				if(empty($_POST['mail'])) $error[] = 'mail'; else $_SESSION['acc']['mail'] = $_POST['mail'];
				if(empty($_POST['pass'])) $error[] = 'pass'; else $_SESSION['acc']['pass'] = $_POST['pass'];
				if(empty($_POST['rpass'])) $error[] = 'rpass'; else $_SESSION['acc']['rpass'] = $_POST['rpass'];

				if(empty($error)){
					if($_SESSION['acc']['pass'] == $_SESSION['acc']['rpass']){
						$checkMail = $model->checkMail($_SESSION['acc']['mail']);
						if($checkMail){
							$mess = "Email đã tồn tại";
							$output = '<button type="submit" name="sm" class="primary-btn" style="width: 100%">Đăng ký</button>';
						}
						else{
							$_SESSION['acc']['token'] = createToken(6);
							$send = sendMail($_SESSION['acc']['mail'],$_SESSION['acc']['token']);
							$output = '<button type="button" name="login" id="login" data-toggle="modal" data-target="#loginModal" class="primary-btn" style="width: 100%">Tiếp tục</button>';
						}
					}
					else{
						$mess = "* Mật không nhập lại không trùng khớp";
						$output = '<button type="submit" name="sm" class="primary-btn" style="width: 100%">Đăng ký</button>';
					}
				}
				else{
					$mess = "* Xin vui lòng điền đủ thông tin";
					$output = '<button type="submit" name="sm" class="primary-btn" style="width: 100%">Đăng ký</button>';
				}

			}


			require"view/main/register.php";
			break;
		// xử lí trang cá nhân
		case 'profile':

		
			require"view/main/profile.php";
			break;

		
		default:
			require"view/main/error404.php";
			break;
	}

?>
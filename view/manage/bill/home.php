<style type="text/css">
	.bill{
		background: white;
		width: 100%;
		height:auto;
		padding: 10px;
		margin-top: 10px;
	}
</style>
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
        	<?php foreach($bill as $item): 
        		$product = $manaModel->getProductByBillShop($item->idBill,$_SESSION['iduser']);
        		$user = $manaModel->getUserByBill($item->idBill);
        	?>
			<div class="bill">
				<div class="row">
					<div class="col-md-2">
						--------------------
					</div>
					<div class="col-md-8" align="center">
						<span style="font-size: 24px">HOÁ ĐƠN</span> #<?=$item->idBill?>
					</div>
					<div class="col-md-2" align="right">
						--------------------
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<ul>
							<li>Mã hoá đơn: <?=$item->idBill?></li>
							<li>Tên khách hàng: <?=$user->name?></li>
							<li>Số điện thoại: <?=$user->phone?></li>
							<li>Địa chỉ khách hàng: <?=$user->address?></li>
							<li>Ngày mua: <?=$item->dateOrder?></li>
						</ul>
					</div>
					<div class="col-md-6" align="right">
						Tổng tiền:<span> 123.000đ</span>
					</div>
				</div>
				<div class="row" style="padding: 20px">
					<h2>Sản phẩm</h2>          
					  <table class="table table-bordered">
					    <thead>
					      <tr>
					        <th>Mã</th>
					        <th>Tên sp</th>
					        <th>Hình ảnh</th>
					        <th>Số lượng</th>
					        <th>Giá</th>
					        <th>Giá KM</th>
					        <th>Thành tiền</th>
					        <th>Tình trạng</th>
					      </tr>
					    </thead>
					    <tbody>
					    	<?php foreach($product as $p): ?>
					      <tr>
					        <td><?=$p->idp?></td>
					        <td><?=$p->title?></td>
					        <td><img src="../upload/product/<?=$p->img?>" width="100px"></td>
					        <td><?=$p->quantity?></td>
					        <td><?=number_format($p->price)?>đ</td>
					        <td><?=number_format($p->promotionPrice)?>đ</td>
					        <td>
								<?php if($p->promotionPrice == 0) echo number_format($p->price * $p->quantity);
									  else echo number_format($p->promotionPrice * $p->quantity);
								 ?>đ
	
					        </td>
					        <td><?php 
					        $status = $p->bdstatus;
					        switch ($status) {
					          case '0':
					            echo "Chờ thanh toán";
					            break;
					          case '1':
					            echo "Chờ lấy hàng";
					            break;
					          case '2':
					            echo "Đang giao";
					            break;
					          case '3':
					            echo "Đã giao";
					            break;
					          default:
					            echo "Đã huỷ";
					            break;
					        }
					        ?></td>
					      </tr>
					      <?php endforeach ?>

					    </tbody>
					  </table>
					  <?php if(empty($product)) echo "ĐÃ HUỶ ĐƠN" ?>
				</div>
			</div>
		<?php endforeach ?>


		</div>
	</div>
</div>
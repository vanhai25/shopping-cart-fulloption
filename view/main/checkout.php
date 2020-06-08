
<style type="text/css">
	.kshop-border{
		height: .1875rem;
    width: 100%;
    background-position-x: -1.875rem;
    background-size: 7.25rem .1875rem;
    background-image: repeating-linear-gradient(45deg,#6fa6d6,#6fa6d6 33px,transparent 0,transparent 41px,#f18d9b 0,#f18d9b 74px,transparent 0,transparent 82px);
	}
</style>
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="trang-chu">Trang chủ</a></li>
				<li class="active">Thanh toán</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->
	<section style="background:#f5f5f5; padding-top: 50px">
		<div class="container" >
			<div class="row" style="background: white; padding-bottom: 30px">
				<div class="kshop-border"></div>
				<div class="adr" style="padding: 25px; font-size: 20px; color:#F8694A"><i class="fa fa-map-marker"></i> Địa chỉ nhận hàng</div>
				<div class="row" align="center">
					<span class="col-md-3" style="font-size: 18px; font-weight: bold"><?=$acc->name?> <br> <?=$acc->phone?></span>
					<span class="col-md-7" style="font-size: 18px;"><?=$acc->address?> </span>
					<span class="col-md-2"> THAY ĐỔI</span>
				</div>
			</div>
			<div class="row" style="margin-top: 20px; background: white;">
				<div class="col-md-12">
					<form method="POST">
					<div class="order-summary clearfix">
						<table class="shopping-cart-table table">
							<thead>
								<tr>
									<th>Sản phẩm</th>
									<th></th>
									<th class="text-center">Giá</th>
									<th class="text-center">Số lượng</th>
									<th class="text-center">Thành tiền</th>
									
								</tr>
							</thead>
							<tbody>
								<?php 
									if(empty($ids)){
										$products = array();
									}
									else{
										$products=$DB->query('SELECT * FROM product WHERE id IN('.implode(',',$ids).')'); // nối các key thành chuỗi cách nhau dấu ,
									}
									foreach($products as $pro): ?>
								<tr>
									<td class="thumb"><img src="upload/product/<?=$pro->img?>" width="100px"></td>
									<td class="details">
										<a href="#"><?=$pro->title?></a>
								
									(
									<?php if(!empty($_SESSION['cart'][$pro->id]['option'])) 

										echo $_SESSION['cart'][$pro->id]['option'];
									?>
							

							
									)
								
									</td>
									<td class="price text-center">
										<?php 
											if($pro->promotionPrice == 0){
												echo "<strong>".number_format($pro->price)."đ </strong>";
											}
											else{
												echo "<strong>".number_format($pro->promotionPrice)."đ </strong> <br>";
												echo "<del class='font-weak'>".number_format($pro->price)."đ </del>";
											}	

										 ?>
										 
										 </td>
									<td class="qty text-center"><?=$_SESSION['cart'][$pro->id]['qty']?></td>
									<td class="total text-center">
										<?php 
											if($pro->promotionPrice == 0){
												echo "<strong>".number_format($pro->price * $_SESSION['cart'][$pro->id]['qty'])."đ </strong>";
											}
											else{
												echo "<strong>".number_format($pro->promotionPrice * $_SESSION['cart'][$pro->id]['qty'])."đ </strong> <br>";
												echo "<del class='font-weak'>".number_format($pro->price * $_SESSION['cart'][$pro->id]['qty'])."đ </del>";
											}	

										 ?>
									</td>

								</tr>
								<?php endforeach ?>
							</tbody>
							<tfoot>
								<tr>
									<th class="empty" colspan="3"></th>
									<th>Đã dùng xu</th>
									<th colspan="2"> -
										<?php if(isset($_SESSION['useCoin'])) echo $_SESSION['useCoin'] ;
											  else echo 0;
										?>
										Xu
									</th>
								</tr>
								<tr>
									<th class="empty" colspan="3"></th>
									<th>Phí vận chuyển</th>
									<td colspan="2">Free Shipping</td>
								</tr>
								<tr>
									<th class="empty" colspan="3"></th>
									<th>TỔNG TIỀN </th>
									<th colspan="2" class="total"><?=number_format($cart->total()['total'])?>đ</th>
								</tr>
							</tfoot>
						</table>
						<div class="pull-right">
							<button type="submit" name="sm" class="primary-btn">Đặt hàng</button>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>	
	</section>

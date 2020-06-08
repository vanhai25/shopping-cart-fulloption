
<style type="text/css">
	.bg-image {
  /* Add the blur effect */
  filter: blur(3px);
  -webkit-filter: blur(3px);

  /* Full height */
  height: 300px;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
.bg-box {
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;

  left: 10;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 150px;
  height: 150px;
  margin-left: 100px; 
  text-align: center;
}
.bg-text{
  position: absolute;
  left: 270px;
  transform: translate(-50%, -50%);
  z-index: 2;
}
.menucc {
	width: 100%;
	height: auto;
	border: 0.5px solid #DADADA;
}
.menucc ul{
	margin: 10px 0;
}
.menucc ul li{
	display: inline-block;
	list-style: none;
	margin:5px 0;
	padding:8px 15px;
	font-size: 16px;
	background: #F8694A;
	
}
.menucc ul li a{
	color: white;
}
.menucc ul li:hover  {
	background: #30323A;
	transition: 1s;
	color: white;

}


</style>
<section>

		<div class="bg-image" style="background-image: url('upload/pkienttrang.jpg')"></div>

		<div class="bg-box">
			<img src="upload/avatar.jpg" width="100%" height="100%">
		</div>
		<div class="bg-text">
			<p style="font-size: 24px; color:white"><?=$idShop->name?> </p>
		</div>

</section>

<section style="padding-top: 100px; background: #f5f5f5">
	<div class="container" style="background: white">
		<div class="row" style="font-size:20px; color:#F8694A; background: #f5f5f5; padding-bottom: 20px ">
			<div class="col-md-3"><i class="fa fa-shopping-bag"></i> Sản phẩm : <?=tinh($count->soSp)?></div>
			<div class="col-md-3"><i class="fa fa-star"></i> Đánh giá: 4.8</div>
			<div class="col-md-3"><i class="fa fa-user-plus"> Ngày tham gia: 20/11/2012</i></div>
			<div class="col-md-3"><i class="fa fa-shopping-cart"></i> Đã bán: <?=tinh($sum->tongMua)?></div>
		</div>
		<div class="row" style="padding: 15px; ">
			<p style="font-size: 21px">THÔNG TIN SHOP</p>
			<div class="col-md-6" style="margin-top: 5px">
				<img src="upload/tnu.jpg" width="100%">
			</div>
			<div class="col-md-6" style="margin-top: 5px; font-size:18px ">
					Bluewind
	Chào Mừng Bạn Đến Với Giày Thể Thao BlueWind 
	MIỄN PHÍ SHIP với đơn hàng từ 99k TRÊN TOÀN QUỐC khi áp mã Free vận chuyển (Áp dụng từ 10/08/2019 đến 14/09/2019)
	Sản phẩm tại BlueWind đang SALE UP TO 50% lận.Anh Chị em rinh ngay nhé✌
	Trường hợp Hàng bị lỗi =>Bluewind MIỄN PHÍ đổi/trả. 
	Địa chỉ 1: Số 10 Trần Thái Tông, Câu Giấy
	Địa chỉ 2: Số 23 Giáp Nhất, Thanh Xuân 
	Địa chỉ 3: Số 39, Ngõ 115 Nguyễn Khang 
			</div>
		</div>
	</div>

</section>
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- section title -->
			<div class="col-md-12">
				<div class="section-title">
					<h2 class="title">Sản phẩm nổi bật</h2>
				</div>
			</div>
			<!-- section title -->

			<!-- Product Single -->
			<div class="col-md-3 col-sm-6 col-xs-6">
				<div class="product product-single">
					<div class="product-thumb">
						<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
						<img src="public/template/img/product01.jpg" alt="">
					</div>
					<div class="product-body">
						<h3 class="product-price">$32.50</h3>
						<div class="product-rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-o empty"></i>
						</div>
						<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
		
					</div>
				</div>
			</div>
			<!-- /Product Single -->

			<!-- Product Single -->
			<div class="col-md-3 col-sm-6 col-xs-6">
				<div class="product product-single">
					<div class="product-thumb">
						<div class="product-label">
							<span>New</span>
							<span class="sale">-20%</span>
						</div>
						<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
						<img src="public/template/img/product02.jpg" alt="">
					</div>
					<div class="product-body">
						<h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
						<div class="product-rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-o empty"></i>
						</div>
						<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
	
					</div>
				</div>
			</div>
			<!-- /Product Single -->

			<!-- Product Single -->
			<div class="col-md-3 col-sm-6 col-xs-6">
				<div class="product product-single">
					<div class="product-thumb">
						<div class="product-label">
							<span>New</span>
							<span class="sale">-20%</span>
						</div>
						<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
						<img src="public/template/img/product03.jpg" alt="">
					</div>
					<div class="product-body">
						<h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
						<div class="product-rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-o empty"></i>
						</div>
						<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
			
					</div>
				</div>
			</div>
			<!-- /Product Single -->

			<!-- Product Single -->
			<div class="col-md-3 col-sm-6 col-xs-6">
				<div class="product product-single">
					<div class="product-thumb">
						<div class="product-label">
							<span>New</span>
						</div>
						<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
						<img src="public/template/img/product04.jpg" alt="">
					</div>
					<div class="product-body">
						<h3 class="product-price">$32.50</h3>
						<div class="product-rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-o empty"></i>
						</div>
						<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
		
					</div>
				</div>
			</div>
			<!-- /Product Single -->
		</div>
		<!-- /row -->

		<!-- row -->

		<!-- /row -->
		<!-- Menu -->

		<!-- row -->
			<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">

						<!-- aside widget -->
						<div class="aside">
							<h3 class="aside-title"><i class="fa fa-list"></i> Danh mục</h3>
						</div>
						<!-- aside widget -->

						<!-- aside widget -->
						<div class="aside">
							<ul>
								<li><a href="">Tất cả sản phẩm</a></li>
								<?php foreach($menu as $mn): ?>
								<li id='<?=$mn->id?>'><a href="<?=$idShop->nameKo?>.shop/<?=$mn->nameKo?>"><?=$mn->name?></a></li>
								<?php endforeach ?>
								
								
							</ul>
						</div>
						<!-- /aside widget -->


					</div>
					<!-- /ASIDE -->

					<!-- MAIN -->
					<div id="main" class="col-md-9">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="pull-left"><h3>SẢN PHẨM: <?php if(isset($_GET['menu'])) echo $s[0]->name ?></h3></div>
							<div class="pull-right">
								<div class="page-filter">
									<span class="text-uppercase">Hiển thị:</span>
									<select class="input">
											<option value="0">10</option>
											<option value="1">20</option>
											<option value="2">30</option>
										</select>
								</div>
									Trang: <?=$showPagination?>
							</div>
						</div>
						<!-- /store top filter -->

						<!-- STORE -->
						<div id="store">
							<!-- row -->
							<div class="row" id='page-details'>
							<?php foreach($s as $p): ?>
								<!-- Product Single -->
								<div class="col-md-4 col-sm-6 col-xs-6">
									<div class="product product-single">
										<div class="product-thumb">
											<div class="product-label">
												<span>New</span>
												<?php if($p->promotionPrice != 0): ?>
												<span class="sale">
													-<?= 
													ceil(100-(($p->promotionPrice/$p->price)*100)); // Cách tính giảm bao nhiêu %
													?>%
												</span>
												<?php else: ?>
												<?php endif ?>
											</div>
											<a class="main-btn quick-view" href="<?=$p->nameKo?>/<?=$p->titleKo?>-<?=$p->id?>.html"><i class="fa fa-search-plus"></i> Chi tiết</a>
											<img src="upload/product/<?=$p->imgp?>" height ="300px"alt="">
										</div>
										<div class="product-body">
											<?php if($p->promotionPrice != 0): ?>
											<h3 class="product-price"><?=number_format($p->promotionPrice)?>đ <del class="product-old-price"><?=number_format($p->price)?>đ</del></h3>
											<?php else: ?>
											<h3 class="product-price"><?=number_format($p->price)?>đ </h3>
											<?php endif ?>
											<div class="product-rating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o empty"></i>
											</div>
											<h2 class="product-name"><a href="#"><?=$p->title?></a></h2>
		
										</div>
									</div>
								</div>
								<!-- /Product Single -->
							<?php endforeach ?>

							</div>
							<!-- /row -->
						</div>
						<!-- /STORE -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<div class="pull-right">
								Trang: <?=$showPagination?>
							</div>
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /MAIN -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
	</div>
	
	<div id="user_model_details"></div>
</div>
	<div id="user_model_details"></div>
	

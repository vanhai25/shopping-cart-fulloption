


	<!-- HOME -->
	<div id="home">
		<!-- container -->
		<div class="container-fuild">
			<!-- home wrap -->
			<div class="home-wrap">
				<!-- home slick -->
				<div id="home-slick">
					<!-- banner -->
					<div class="banner banner-1">
						<img src="public/template/img/banner01.jpg" alt="">
						<div class="banner-caption text-center">
							<h1>Bags sale</h1>
							<h3 class="white-color font-weak">Up to 50% Discount</h3>
							<button class="primary-btn">Shop Now</button>
						</div>
					</div>
					<!-- /banner -->

					<!-- banner -->
					<div class="banner banner-1">
						<img src="public/template/img/banner02.jpg" alt="">
						<div class="banner-caption">
							<h1 class="primary-color">HOT DEAL<br><span class="white-color font-weak">Up to 50% OFF</span></h1>
							<button class="primary-btn">Shop Now</button>
						</div>
					</div>
					<!-- /banner -->

					<!-- banner -->
					<div class="banner banner-1">
						<img src="public/template/img/banner03.jpg"  alt="">
						<div class="banner-caption">
							<h1 class="white-color">New Product <span>Collection</span></h1>
							<button class="primary-btn">Shop Now</button>
						</div>
					</div>
					<!-- /banner -->
				</div>
				<!-- /home slick -->
			</div>
			<!-- /home wrap -->
		</div>
		<!-- /container -->
	</div>
	<!-- /HOME -->
<div class="container" style="margin-top:20px ">
	<div class="row">
			<div class="col-md-12">
		<div class="section-title">
			<h2 class="title">Danh mục</h2>
		</div>
	</div>
	</div>
</div>

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">

			<!-- row -->
			<div class="row">


				<div class="owl-carousel owl-theme">
				<?php foreach($list as $l): ?>
					<div class="item">
					<!-- banner -->
						<a class="banner banner-1" href="<?=$l->nameKo?>">
							<img class="img-fluid" src="upload/<?=$l->img?>" width="200px" alt="">
							<div class="banner-caption text-center">
								<h4 class="white-color" style="color: white"><?=$l->name?></h4>
							</div>
						</a>

					<!-- /banner -->
					</div>
				<?php endforeach ?>

				</div>

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section-title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Sản phẩm mới được giảm giá trong ngày</h2>
						<div class="pull-right">
							<div class="product-slick-dots-1 custom-dots"></div>
						</div>
					</div>
				</div>
				<!-- /section-title -->

				<!-- banner -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="banner banner-2">
						<img src="public/template/img/banner14.jpg" alt="">
						<div class="banner-caption">
							<h2 class="white-color">NEW<br>COLLECTION</h2>
							<button class="primary-btn">Shop Now</button>
						</div>
					</div>
				</div>
				<!-- /banner -->

				<!-- Product Slick -->
				<div class="col-md-9 col-sm-6 col-xs-6">
					<div class="row">
						<div id="product-slick-1" class="product-slick">
							<!-- Product Single -->
							<?php foreach($sale as $sl): 
								$avg = $model->avgStar($sl->id);
								?>

							<div class="product product-single">
								<div class="product-thumb">
									<div class="product-label">
										<span>New</span>
										<span class="sale">
											-<?= 
											ceil(100-(($sl->promotionPrice/$sl->price)*100)); // Cách tính giảm bao nhiêu %
											?>%
										</span>
									</div>
									<a class="main-btn quick-view" href="<?=$sl->nameKo?>/<?=$sl->titleKo?>-<?=$sl->id?>.html"><i class="fa fa-search-plus"></i> Chi tiết</a>
									<img src="upload/product/<?=$sl->img?>" height="300px"alt="">
								</div>
								<div class="product-body">
									<h3 class="product-price"><?=number_format($sl->promotionPrice)?>đ <del class="product-old-price"><?=number_format($sl->price)?>đ</del></h3>

								<?php if(!empty($avg)): ?>
								<div class="product-rating">
									<a data-toggle="tooltip" title="Sản phẩm được đánh giá <?=$avg->star?>/5"><?=star($avg->star)?></a>
								</div>
								
								<?php else: ?>
								<?php endif ?>
									<h2 class="product-name"><a href="#"><?=$sl->title?></a></h2>
		
								</div>
							</div>
							<?php endforeach ?>
							<!-- /Product Single -->

						</div>
					</div>
				</div>
				<!-- /Product Slick -->
			</div>
			<!-- /row -->

			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Sản phẩm được quan tâm</h2>
						<div class="pull-right">
							<div class="product-slick-dots-2 custom-dots">
							</div>
						</div>
					</div>
				</div>
				<!-- section title -->

				<!-- Product Single -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single product-hot">
						<div class="product-thumb">
							<div class="product-label">
								<span class="sale">-20%</span>
							</div>
							<ul class="product-countdown">
								<li><span>00 H</span></li>
								<li><span>00 M</span></li>
								<li><span>00 S</span></li>
							</ul>
							<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
							<img src="public/template/img/product01.jpg" alt="">
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
							<div class="product-btns">
								<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
								<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
								<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
							</div>
						</div>
					</div>
				</div>
				<!-- /Product Single -->

				<!-- Product Slick -->
				<div class="col-md-9 col-sm-6 col-xs-6">
					<div class="row">
						<div id="product-slick-2" class="product-slick">
							<?php foreach($care as $h): 
								$avg = $model->avgStar($h->idp);
								?>
							<!-- Product Single -->
							<div class="product product-single">
								<div class="product-thumb">
									<div class="product-label">
										<span>New</span>
										<?php if($h->promotionPrice != 0): ?>
										<span class="sale">
											-<?= 
											ceil(100-(($h->promotionPrice/$h->price)*100)); // Cách tính giảm bao nhiêu %
											?>%
										</span>
										<?php else: ?>
										<?php endif ?>
									</div>
									<a class="main-btn quick-view" href="<?=$h->nameKo?>/<?=$h->titleKo?>-<?=$h->idp?>.html"><i class="fa fa-search-plus"></i> Chi tiết</a>
									<img src="upload/product/<?=$h->imgp?>" height="300px" alt="">
								</div>
								<div class="product-body">
									<?php if($h->promotionPrice != 0): ?>
									<h3 class="product-price"><?=number_format($h->promotionPrice)?>đ <del class="product-old-price"><?=number_format($h->price)?>đ</del></h3>
									<?php else: ?>
									<h3 class="product-price"><?=number_format($h->price)?>đ </h3>
									<?php endif ?>
									<?php if(!empty($avg)): ?>
								<div class="product-rating">
									<a data-toggle="tooltip" title="Sản phẩm được đánh giá <?=$avg->star?>/5"><?=star($avg->star)?></a>
								</div>
								
								<?php else: ?>
								<?php endif ?>
									<h2 class="product-name"><a href="#"><?=$h->title?></a></h2>
		
								</div>
							</div>

							<!-- /Product Single -->
							<?php endforeach ?>

						</div>
					</div>
				</div>
				<!-- /Product Slick -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- section -->
	<div class="section section-grey">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- banner -->
				<div class="col-md-6">
					<div class="banner banner-1">
						<img src="public/template/img/banner13.jpg" alt="">
						<div class="banner-caption text-center">
							<h1 class="primary-color">HOT DEAL<br><span class="white-color font-weak">Up to 50% OFF</span></h1>
							<button class="primary-btn">Shop Now</button>
						</div>
					</div>
				</div>
				<!-- /banner -->
				<!-- banner -->
				<div class="col-md-3 col-sm-6">
					<a class="banner banner-1" href="#">
						<img src="public/template/img/banner11.jpg" alt="">
						<div class="banner-caption text-center">
							<h2 class="white-color">NEW COLLECTION</h2>
						</div>
					</a>
				</div>
				<!-- /banner -->

				<!-- banner -->
				<div class="col-md-3 col-sm-6">
					<a class="banner banner-1" href="#">
						<img src="public/template/img/banner12.jpg" alt="">
						<div class="banner-caption text-center">
							<h2 class="white-color">NEW COLLECTION</h2>
						</div>
					</a>
				</div>
				<!-- /banner -->

				<!-- banner -->
				<div class="col-md-3 col-sm-6">
					<a class="banner banner-1" href="#">
						<img src="public/template/img/banner11.jpg" alt="">
						<div class="banner-caption text-center">
							<h2 class="white-color">NEW COLLECTION</h2>
						</div>
					</a>
				</div>
				<!-- /banner -->

				<!-- banner -->
				<div class="col-md-3 col-sm-6">
					<a class="banner banner-1" href="#">
						<img src="public/template/img/banner12.jpg" alt="">
						<div class="banner-caption text-center">
							<h2 class="white-color">NEW COLLECTION</h2>
						</div>
					</a>
				</div>
				<!-- /banner -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->


	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row" id="list_product">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Sản phẩm dành cho bạn</h2>
					</div>
				</div>
				<!-- section title -->

				<!-- Product Single -->
			<?php foreach($lq as $h):
				?>
				<a href="<?=$h->nameKo?>/<?=$h->titleKo?>-<?=$h->id?>.html">
				<div class="col-md-2 col-sm-3 col-xs-4">
					<div class="product product-single">
								<div class="product-thumb">
									<div class="product-label">
										<?php if($h->promotionPrice != 0): 
											$id =$h->id;
										?>
										<span class="sale">
											-<?= 
											ceil(100-(($h->promotionPrice/$h->price)*100)); // Cách tính giảm bao nhiêu %
											?>%
										</span>
										<?php else: ?>
										<?php endif ?>
									</div>
						
									<img src="upload/product/<?=$h->img?>"width="100%" height="200px" alt="">
								</div>
								<div class="product-body">
									<?php if($h->promotionPrice != 0): ?>
									<h4 class="product-price"><?=number_format($h->promotionPrice)?>đ </h4> <span style="font-size: 10px"> Đã bán <?=tinh($h->buyed)?></span>
									<?php else: ?>
									<h4 class="product-price"><?=number_format($h->price)?>đ </h4> <span style="font-size: 10px"> Đã bán <?=tinh($h->buyed)?></span> 
									<?php endif ?>
									<h2 class="product-name"><a href="#"><?=$h->title?></a></h2>
								</div>
					</div>
				</div>
				</a>
			<?php endforeach ?>
				<!-- /Product Single -->

			</div>
			<div class="row" id="remove_row" align="center"><button type="button" data-id="<?=$id?>" class="primary-btn" name="btn-more" id="btn-more">Xem thêm</button></div>


			<!-- load more -->

			<!-- endloadmore -->
			
			<!-- /row -->

			<!-- row -->
			<?php if(isset($_SESSION['iduser'])): ?>
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Sản phẩm bạn đã xem</h2>
					</div>
				</div>
				<!-- section title -->

				<!-- Product Single -->
				<?php foreach($viewed as $h): ?>
					<a href="<?=$h->nameKo?>/<?=$h->titleKo?>-<?=$h->id?>.html">
				<div class="col-md-2 col-sm-3 col-xs-4">
					<div class="product product-single">
								<div class="product-thumb">
									<div class="product-label">
										<?php if($h->promotionPrice != 0): ?>
										<span class="sale">
											-<?= 
											ceil(100-(($h->promotionPrice/$h->price)*100)); // Cách tính giảm bao nhiêu %
											?>%
										</span>
										<?php else: ?>
										<?php endif ?>
									</div>
						
									<img src="upload/product/<?=$h->img?>"width="100%" height="200px" alt="">
								</div>
								<div class="product-body">
									<?php if($h->promotionPrice != 0): ?>
									<h4 class="product-price"><?=number_format($h->promotionPrice)?>đ </h4> <span style="font-size: 10px"> Đã bán <?=tinh($h->buyed)?></span>
									<?php else: ?>
									<h4 class="product-price"><?=number_format($h->price)?>đ </h4> <span style="font-size: 10px"> Đã bán <?=tinh($h->buyed)?></span> 
									<?php endif ?>
									<h2 class="product-name"><a href="#"><?=$h->title?></a></h2>
								</div>
					</div>
				</div>
				</a>
				<?php endforeach ?>
				<!-- /Product Single -->


			</div>
			<div class="row" align="center"><a href="" class="primary-btn">Xem thêm<a></div>
			<?php endif ?>
			
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->


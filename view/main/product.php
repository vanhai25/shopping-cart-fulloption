

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Trang chủ</a></li>
				<li><a href="#">Products</a></li>
				<li><a href="#"><?=$pro->name?></a></li>
				<li class="active"><?=$pro->title?></li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!--  Product Details -->
				<div class="product product-details clearfix">
					<div class="col-md-6">
					<?php if($thumb == false):?>
						<div id="product-main-view">
							<div class="product-view">
								<img src="upload/product/<?=$pro->img?>" height="600px" alt="">
							</div>
						</div>
					<?php else: ?>
					
						<div id="product-main-view">
							<div class="product-view">
								<img src="upload/product/<?=$pro->img?>" height="600px" alt="">
							</div>
							<?php foreach($thumb as $tm): ?>
							<div class="product-view">
								<img src="upload/product/<?=$tm->img?>" height="600px" alt="">
							</div>
							<?php endforeach ?>

						</div>
						<div id="product-view">
							<div class="product-view">
								<img src="upload/product/<?=$pro->img?>" width="50px" height="140px" alt="">
							</div>
							<?php foreach($thumb as $tm): ?>
							<div class="product-view">
								<img src="upload/product/<?=$tm->img?>" width="50px" height="140px" alt="">
							</div>
							<?php endforeach ?>
							</div>
					<?php endif ?>
					</div>
					<div class="col-md-6">
						<form method="POST" action="addCart.php">
						<div class="product-body">
							<div class="product-label">
								<span>New</span>
								<?php if($pro->promotionPrice != 0): ?>
								<span class="sale">
									-<?= 
									ceil(100-(($pro->promotionPrice/$pro->price)*100)); // Cách tính giảm bao nhiêu %
									?>%
								</span>
								<?php else: ?>
								<?php endif ?>
							</div>
							<h2 class="product-name"><?=$pro->title?></h2>
							<?php if($pro->promotionPrice != 0): ?>
									<h3 class="product-price"><?=number_format($pro->promotionPrice)?>đ <del class="product-old-price"><?=number_format($pro->price)?>đ</del></h3>
									<?php else: ?>
									<h3 class="product-price"><?=number_format($pro->price)?>đ </h3>
									<?php endif ?>
							<div>
								<?php if(!empty($avg) && !empty($count) ): ?>
								<div class="product-rating">
									<a data-toggle="tooltip" title="Sản phẩm được đánh giá <?=round($avg->star,2)?>/5"><?=star($avg->star)?></a>
								</div>
								<?=tinh($count->count)?> lượt đánh giá
								<?php else: ?>
								<?php endif ?>
							</div>
							<p><strong>Thương hiệu:</strong> In Stock</p>
							<p><strong>Shop:</strong> <a href="<?=$pro->nameKoShop?>.shop"><?=$pro->nameShop?></a></p>
							<p><?=$pro->detail?></p>
							
							<?php if($op): ?>
									<?php foreach($op as $o): 
										$vl=$model->getValueOptionByProduct($o->id,$pro->id)
									?>
							<div class="radio-toolbar">
								
								<span class="text-uppercase"><?=$o->name?>: </span>
									<?php foreach($vl as $v): ?>	
								    <input checked="checked" type="radio" id="radio<?=$o->id?><?=$v->id?>" name="option<?=$o->id?>" value="<?=$v->name?>">
								    <label for="radio<?=$o->id?><?=$v->id?>"><?=$v->name?></label>
							    	<?php endforeach ?>
							</div>
							<?php endforeach ?>
								
								<?php endif ?>
	
								<p>Còn <?=tinh($pro->limitAmount - $pro->buyed)?> sản phẩm ở kho</p>
							</div>
								<input type="hidden" name="idCatalog" value="<?=$pro->idCatalog?>">
								<input type="hidden" name="idProduct" value="<?=$pro->id?>">
							<div class="product-btns">
								<div class="qty-input">
									<span class="text-uppercase">QTY: </span>
									<input class="input" type="number" name="qty" value="1" min="1" max="10">
								</div>
								<?php if($pro->limitAmount - $pro->buyed <= 0) $none = "pointer-events: none";?>
								<button class="primary-btn" style="<?php if($none) echo $none; ?>" name="sm" type="submit"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</button>
								<div class="pull-right">
									<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
									<button class="main-btn icon-btn" onclick=""><i class="fa fa-share-alt"></i></button>
								</div>
							</div>
						</form>
						</div>
					</div>
					<div class="col-md-12">
						<div class="product-tab">
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Mô tả</a></li>
								<li><a data-toggle="tab" href="#tab3">Chi tiết </a></li>
								<li><a data-toggle="tab" href="#tab2">Đánh giá (<?php if($count) echo $count->count; else echo 0;?>)</a></li>
							</ul>
							<div class="tab-content">
								<div id="tab1" class="tab-pane fade in active">
									<p><?=$pro->promotion?></p>
								</div>
								<div id="tab3" class="tab-pane fade in">
									<p><?=$pro->detail?></p>
								</div>
								<div id="tab2" class="tab-pane fade in">

									<div class="row">
										<div class="col-md-6" style=" height: 400px; overflow: scroll;" >
											
											<div class="product-reviews" id="display_comment">




												<ul class="reviews-pages">
													<li class="active">1</li>
													<li><a href="#">2</a></li>
													<li><a href="#">3</a></li>
													<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
												</ul>
											</div>

										</div>
										<div class="col-md-6">
											<?php if(isset($_SESSION['iduser'])): ?>
											<h4 class="text-uppercase">Viết ý kiến</h4>
											<p>Khi bạn đã mua sản phẩm này</p>
											<form class="review-form" method="POST" id="comment_form" action="">
												<div class="form-group">
													<textarea class="input" name="comment" id="comment" placeholder="Your review"></textarea>
													<input type="hidden" name="idProduct" value="<?=$pro->id?>">
												</div>
												<div class="form-group">
													<div class="input-rating">
														<strong class="text-uppercase">Đánh giá: </strong>
														<div class="stars">
															<input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
															<input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
															<input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
															<input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
															<input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
														</div>
													</div>
												</div>
												<button class="primary-btn" type="submit" name="submit" id="submit">Gửi</button>
											</form>
											<span id="comment_message" style="padding-top: 20px; font-size: 16px"></span>
											<?php else: ?>
												<span>Bạn mua sản phẩm này mới được đánh giá <a href="dang-nhap"> Đăng nhập</a></span>
											<?php endif ?>
										</div>
									</div>

									<script>
								$(document).ready(function(){
								 
								 $('#comment_form').on('submit', function(event){
								  event.preventDefault();
								  var form_data = $(this).serialize();
								  $.ajax({
								   url:"app/ajax/addRate.php",
								   method:"POST",
								   data:form_data,
								   dataType:"JSON",
								   success:function(data){
								    if(data.error != ''){
								     $('#comment_form')[0].reset();
								     $('#comment_message').html(data.error);
								     load_comment();
								    }
								   }
								  })
								 });

								 load_comment();

								 function load_comment(){
								  $.ajax({
								   url:"app/ajax/fetchRate.php",
								   method:"POST",
								   success:function(data){
								    $('#display_comment').html(data);
								   }
								  })
								 }
								 
								});
								</script>



								</div>
							</div>
						</div>
					</div>

				</div>
				<!-- /Product Details -->
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
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Picked For You</h2>
					</div>
				</div>
				<!-- section title -->

				<!-- Product Single -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
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
							<div class="product-btns">
								<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
								<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
								<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
							</div>
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
							<img src="public/template/img/product03.jpg" alt="">
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
							<div class="product-btns">
								<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
								<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
								<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
							</div>
						</div>
					</div>
				</div>
				<!-- /Product Single -->

				<!-- Product Single -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
							<div class="product-label">
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
							<div class="product-btns">
								<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
								<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
								<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
							</div>
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
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->



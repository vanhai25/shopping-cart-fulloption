<style type="text/css">

	.all ul{
		margin: 0;
		padding: 0;
		height: 35px;
		width: 100%;
		background: white;
		padding-left: 20px; 
	}
	.all ul li{
		list-style:none;
	    width: auto;
	    float: left;
	    line-height: 35px; /*Cho text canh giữa menu*/
	    padding: 0;
	    margin-right:30px;


	}
	.all ul li:hover{
		border-bottom: 2px solid #007bff;
	}
	.showall{
		height: auto;
		background: white;
	}
	.active{
		border-bottom: 2px solid #007bff;
	}
	a:hover{
		color:#007bff;
	}
</style>
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
			<div class="all">
				<ul>
				  <li><a href="?pg=bill&act=all">Tất cả</a></li>
				  <li><a href="?pg=bill&act=waitcheck">Chờ xác nhận</a></li>
				  <li><a href="?pg=bill&act=waitproduct">Chờ lấy hàng</a></li>
				  <li><a href="?pg=bill&act=danggiao">Đang giao</a></li>
				  <li><a href="?pg=bill&act=dagiao">Đã giao</a></li>
				  <li class="active"><a href="?pg=bill&act=dahuy">Đã huỷ</a></li>
				</ul>
			</div>
			<?php foreach($dahuy as $item): ?>
			<div class="showall" style="margin-top: 10px">
				<div class="row" style="padding: 10px; border-bottom: 0.5px solid #cccccccc">
					<div class="col-md-6"><span><i class="far fa-clipboard"></i> Mã đơn hàng: <?=$item->idb?></span></div>
				</div>
				
				<div class="row" style="padding: 10px;">
					<div class="col-md-2">
						<img src="../upload/product/<?=$item->img?>" width="100%">
					</div>
					<div class="col-md-8">
						<h3><?=$item->title?></h3>
						Ngày mua: <?=$item->dateOrder?> <br>
						Giá: 
						<?php if($item->promotionPrice == 0): ?>
					      <span style="font-size: 18px; color: #007bff"><?=number_format($item->price)?>đ</span> x <?=$item->quantity?>
					      <?php else: ?>
					      <del><?=number_format($item->price)?>đ</del>
					      <span style="font-size: 18px; color: #007bff"><?=number_format($item->promotionPrice)?>đ</span> x <?=$item->quantity?>
					     <?php endif ?>

						<p style="font-size: 20px; color:#007bff">Tổng tiền: 
							<?php if($item->promotionPrice == 0) echo number_format($item->price * $item->quantity) ;
							    else echo number_format($item->promotionPrice * $item->quantity) ;
							?>đ					
						</p>
					</div>
				</div>
				
			</div>
			<?php endforeach ?>
		</div>
	</div>
</div>
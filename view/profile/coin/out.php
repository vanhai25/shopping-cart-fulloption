
<ul class="nav nav-pills c">
  <li ><a href="?page=profile&com=coin">Tất cả</a></li>
  <li><a href="?page=profile&com=coin&act=in">Đã nhận</a></li>
  <li class="active"><a href="?page=profile&com=coin&act=out">Đã dùng</a></li>
</ul>
<?php foreach($show as $s): ?>
<div class="item" style="margin-top: 20px">
	<div class="row" style="margin-top: 20px">
		<div class="col-md-2">
			<img src="upload/bill.jpg" width="100%">
		</div>
		<div class="col-md-8">
			<p style="font-size: 20px">Mã hoá đơn #000<?=$s->id?></p>
			<p style="color: #666">Đã dùng sau khi mua sản phẩm</p>
			<p style="color: #666">Ngày dùng: <?=$s->dateOrder?></p>
		</div>
		<div class="col-md-2">
			<span style="font-size: 30px; color:orangered">- <?=$s->useCoin?></span>
		</div>
	</div>
</div>
<?php endforeach ?>
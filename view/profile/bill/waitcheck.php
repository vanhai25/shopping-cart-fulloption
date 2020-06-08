<ul class="nav nav-pills">
  <li><a href="?page=profile&com=bill">Tất cả</a></li>
  <li class="active" ><a href="?page=profile&com=bill&act=waitcheck">Chờ thanh toán</a></li>
  <li><a href="?page=profile&com=bill&act=waitproduct">Chờ lấy hàng</a></li>
  <li><a href="?page=profile&com=bill&act=danggiao">Đang giao</a></li>
  <li><a href="?page=profile&com=bill&act=dagiao">Đã giao</a></li>
  <li><a href="?page=profile&com=bill&act=dahuy">Đã huỷ</a></li>
</ul>
<?php foreach($waitcheck as $item): 
$shop = $proModel->getShopbyProduct($item->idShop);
  if(isset($_POST['sm'])){
    $cancel = $pmodel->cancel($item->idbd);
    if($cancel){
      header("location:?com=bill&act=waitcheck");
      return;
    }
  }
?>
<div class="itemall" style="margin-top: 50px;">
  <div class="row" style=" padding-bottom: 10px; border-bottom: 0.5px solid #cccccccc">
    <div class="col-md-6" align="left">
        <img src="upload/avatar.jpg"  class="avatarshop"><span> <?=$shop->name?></span>
        <a href="<?=$shop->nameKo?>.shop"><button><i class="fa fa-home"></i> xem shop</button></a>
    </div>
    <div class="col-md-6" align="right">

    </div>
  </div>
  <div class="row" style="padding-top: 10px">
    <div class="col-md-2">
      <img src="upload/product/<?=$item->img?>" width="100%">
    </div>
    <div class="col-md-8">
      <h5><?=$item->title?></h5>
      <p>Ngày Mua: <?=$item->dateOrder?></p>
      <p>x<?=$item->quantity?></p>
    </div>
    <div class="col-md-2" align="center">
      <?php if($item->promotionPrice == 0): ?>
      <p style="font-size: 18px;color:#F8694A "><?=number_format($item->price)?>đ</p>
      <?php else: ?>
      <del><?=number_format($item->price)?>đ</del>
      <p style="font-size: 18px;color:#F8694A "><?=number_format($item->promotionPrice)?>đ</p>
      <?php endif ?>
    </div>
  </div>
  <div class="row" align="right" style="border-bottom: 1px solid #ccc; padding-bottom: 20px">
    <form method="post">
    <button type="submit" name="sm" style="border:1px solid #F8694A; background: #F8694A;color:white; padding: 10px 30px">HUỶ ĐƠN HÀNG</button>
    </form>
   <span style="color: #F8694A; font-size: 18px">  Tổng tiền : 
  <?php if($item->promotionPrice == 0) echo number_format($item->price * $item->quantity) ;
        else echo number_format($item->promotionPrice * $item->quantity) ;
  ?>
đ

   </span>
  </div>
</div>
<?php endforeach ?>

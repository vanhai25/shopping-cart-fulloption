
	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="trang-chu">Trang chủ</a></li>
				<li class="active">Giỏ hàng</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

<div class="session">
	<div class="container">
		<?php if(!empty($_SESSION['cart'])): ?>
		<div class="row">
			<div class="col-md-12">
				<form method="POST" action="gio-hang">
				<div class="order-summary clearfix">
					<div class="section-title">
						<h3 class="title">Giỏ hàng</h3>
					</div>
					<table class="shopping-cart-table table">
						<thead>
							<tr>
								<th>Sản phẩm</th>
								<th></th>
								<th class="text-center">Giá</th>
								<th class="text-center">Số lượng</th>
								<th class="text-center">Thành tiền</th>
								<th class="text-right"></th>
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
									<a><?=$pro->title?> </a>
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
									 <input type="hidden" name="pid" class="pid" value="<?=$pro->id?>">
								<td class="qty text-center"><input class="input itemQty" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="itemQty" type="number" value="<?=$_SESSION['cart'][$pro->id]['qty']?>"></td>
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
								<td class="text-right"><a href="?page=cart&del=<?=$pro->id?>"><i class="fa fa-close"></i></a></td>
							</tr>
							<?php endforeach ?>
						</tbody>
						<tfoot>
							<tr>
								<th class="empty" colspan="3"></th>
								<th>TẠM TÍNH</th>
								<th colspan="2" class="sub-total"><?=number_format($cart->total()['total'])?>đ</th>
							</tr>
							<?php if(isset($_SESSION['iduser']) && !isset($_SESSION['useCoin'])): ?>
															<tr>
								<th class="empty" colspan="3"></th>
								<td colspan="3"> <input type="checkbox" id="coin" value="<?=$model->getAccount($_SESSION['iduser'])->coinTotal?>" name="coin"> Kshop xu | Dùng xu <span style="font-size: 18px; color: orangered"><?=$model->getAccount($_SESSION['iduser'])->coinTotal?> xu</span></td>
							</tr>

							<?php else: ?>

							<?php endif ?>
	
						</tfoot>
					</table>
					<div class="pull-left">
						<button class="primary-btn" onclick="window.history.go(-1); return false;">Tiếp tục mua hàng</button>
					</div>
					<div class="pull-right">
						
						<?php if(isset($_SESSION['iduser'])): ?>
							<button type="button" id="btncheck" onclick="location.href='thanh-toan'" class="primary-btn">Thanh toán</button>
						<?php else: ?>
							<button type="button" name="login" id="login" data-toggle="modal" data-target="#loginModal" class="primary-btn">Thanh toán</button>
						<?php endif ?>

					</div>

				</div>
				</form>
				<!-- The Modal -->
					<div id="loginModal" class="modal fade" role="dialog">  
				      <div class="modal-dialog">  
				   <!-- Modal content-->  
				           <div class="modal-content">  
				                <div class="modal-header">  
				                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
				                     <h4 class="modal-title">Đăng nhập </h4>  <span><a href="dang-ky">Đăng ký tài khoản tại đây</a></span>
				                </div>  
				                <div class="modal-body">  
				                     <label>Mail đăng ký</label>  
				                     <input type="text" name="username" id="username" class="form-control" />  
				                     <br />  
				                     <label>Mật khẩu</label>  
				                     <input type="password" name="password" id="password" class="form-control" />  
				                     <br />

				                     <button type="button" name="login_button" id="login_button" class="primary-btn add-to-cart">Đăng nhập</button>  
				                </div>  
				           </div>  
				      </div>  
				 </div>  
			</div>
		</div>
		<?php else: ?>
			<h3 style="margin-top: 20px;">Giỏ hàng của bạn rỗng</h3>
		<?php endif ?>
	</div>
</div>


<script>
// Get the modal
$(document).ready(function(){
	// Update qty by ajax
	$('.itemQty').on('change',function(){
		      location.reload('true');
      var $el = $(this).closest('tr');

      var productid = $el.find('.pid').val();
      var qty = $el.find('.itemQty').val();
     
   


      $.ajax({
        url:'addCart.php',
        method:'POST',
        cache:'false',
        data:{qty:qty,productid:productid},
        success:function(response){
          console.log(response);
        }
      })
    })
	$('#login_button').click(function(){  
           var username = $('#username').val();  
           var password = $('#password').val();  
           if(username != '' && password != '')  
           {  
                $.ajax({  
                     url:"app/ajax/action.php",  
                     method:"POST",  
                     data: {username:username, password:password},  
                     success:function(data)  
                     {  
                          //alert(data);  
                          if(data == 'no')  
                          {  
                               alert("Tài khoản không tồn tại");  
                          }  
                          else  
                          {  
                               $('#loginModal').hide();  
                               location.reload();  
                          }  
                     }  
                });  
           }  
           else  
           {  
                alert("Vui lòng điền đủ thông tin");  
           }  
      }); 
	$('#btncheck').click(function(){
		var coin = $('#coin').val();
		if(this.form.coin.checked){
			$.ajax({
				url:"app/ajax/useCoin.php",
				method:"POST",
				data:{coin:coin}
		
			});
		}
		else{
			
		}
	});
});
</script>

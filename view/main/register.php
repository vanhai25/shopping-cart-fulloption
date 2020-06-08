

<section style="background: #f5f5f5">
	<div class="container">
		<div class="row" style="padding:50px 0px">
			<div class="col-md-8"><span style="font-size: 28px">Tạo tài khoản Kshop<span></div>
			<div class="col-md-4">Bạn đã là thành viên ? <a href="dang-nhap">Đăng nhập</a> tại đây</div>
		</div>
		<div class="row" style="background: white; padding: 50px 220px;">
			<p style="color:red"><?php if(isset($mess)) echo $mess ?></p>
		<form method="POST">
			<div class="col-md-7">
				
				<div class="form-group">
				    <label for="exampleInputEmail1">Email*</label>
				    <input width="70%" type="email" name="mail" value="<?php if(isset($_SESSION['acc']['mail'])) echo $_SESSION['acc']['mail']?>" placeholder="Vui lòng nhập email của bạn" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
				</div>
				<div class="form-group">
				    <label for="exampleInputEmail1">Mật khẩu</label>
				    <input type="password" name="pass" value="<?php if(isset($_SESSION['acc']['pass'])) echo $_SESSION['acc']['pass']?>" placeholder="Vui lòng nhập họ tên của bạn" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
				</div>
				<div class="form-group">
				    <label for="exampleInputEmail1">Nhập lại mật khẩu</label>
				    <input type="password" name="rpass" value="<?php if(isset($_SESSION['acc']['rpass'])) echo $_SESSION['acc']['rpass']?>" placeholder="Vui lòng nhập họ tên của bạn" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
				</div>


				

				
			</div>

			<div class="col-md-5">
				<div class="form-group">
				    <label for="exampleInputEmail1">Họ tên*</label>
				    <input width="70%" type="text" name="name" value="<?php if(isset($_SESSION['acc']['name'])) echo $_SESSION['acc']['name']?>" placeholder="Vui lòng nhập email của bạn" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
				</div>
				<?php if(isset($output)) echo $output; ?>

				<p style="font-size: 12px; padding-top: 5px">Hoặc đăng ký bằng</p>
				
          		    <img src="upload/loginfb.png" width="100%">

			</div>
		</form>
		</div>
	</div>
</section>
<!-- The Modal -->
					<div id="loginModal" class="modal fade" role="dialog">  
				      <div class="modal-dialog">  
				   <!-- Modal content-->  
				           <div class="modal-content">  
				                <div class="modal-header">  
				                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
				                     <h4 class="modal-title">Vui lòng xác nhận Mail</h4>  
				                </div>  
				                <div class="modal-body"> 
				                	 <p>Đã gửi tới: <?=$_SESSION['acc']['mail']?></p> 
				                     <label>Mã code</label>  
				                     <input type="text" name="code" id="code" class="form-control" />  
				                     <br />   
				                     <button type="button" name="login_button" id="login_button" class="primary-btn add-to-cart">Xác nhận</button>  
				                </div>  
				           </div>  
				      </div>  
				 </div> 

<script>
// Get the modal
$(document).ready(function(){
	$('#login_button').click(function(){  
           var code = $('#code').val();   
           if(code != '')  
           {  
                $.ajax({  
                     url:"app/ajax/checkcode.php",  
                     method:"POST",  
                     data: {code:code},  
                     success:function(data)  
                     {  
                          //alert(data);  
                          if(data == 'not')  
                          {  
                               alert("Mã không trùng khớp");  
                          }  
                          else  
                          {  
                               $('#loginModal').hide();  
                               window.location = 'ca-nhan';  
                          }  
                     }  
                });  
           }  
           else  
           {  
                alert("Vui lòng điền đủ thông tin");  
           }  
      }); 
});
</script>


	

	
	

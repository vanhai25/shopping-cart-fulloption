			<div class="col-md-3 left" >
				<?php 
					if($acc->fb != null):
				?>
				<img src="http://graph.facebook.com/<?=$acc->fb?>/picture" alt="Avatar" class="avatar">
				<?php else: ?>
					<img src="upload/<?=$acc->avatar?>" alt="Avatar" class="avatar">
				<?php endif ?>
				<div class="name">
						<?=$acc->name?>
					<p class="editname">
						<a href=""><i class="fa fa-edit"></i> Sửa Hồ Sơ</a>
					</p>
				</div>

				<div class="menubar">
					<ul>
						<li><h4><i style="color:#F8694A " class="fa fa-user"></i> Tài khoản của tôi</h4></li>
						<li><a href="ca-nhan">Hồ sơ</a></li>
						<li><a href="#">Sảm phẩm bạn đã xem</a></li>
						<li><a href="#">Thông báo của tôi</a></li>
						<li><a href="#">Nhận xét của tôi</a></li>
						<li><a href="#">Địa chỉ</a></li>
						<li><a href="#">Thêm mật khẩu</a></li>
						<li><h4><a href="?page=profile&com=bill"><i style="color:#F8694A " class="fa fa-clipboard"></i> Đơn Mua</a></h4></li>
						<li><h4><a href="?page=profile&com=coin"><i style="color:#F8694A " class="fa fa-bitcoin"></i> Tiền Xu</a></h4></li>
						<li><h4><a href="manage/" ><i style="color:#F8694A " class="fa fa-home"></i> Kênh người bán</a></h4></li>
					</ul>
				</div>
			</div>
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
        	                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Tất cả sản phẩm</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">Mã SP</th>
                                                        <th class="border-0">Hình ảnh</th>
                                                        <th class="border-0">Tên sản phẩm</th>
                                                        <th class="border-0">Giá</th>
                                                        <th class="border-0">Giá KM</th>
                                                        <th class="border-0">Hạnh động</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                	<?php foreach($product as $p): ?>
                                                    <tr>
                                                        <td><?=$p->id?></td>
                                                        <td>
                                                            <div class="m-r-10"><img src="../upload/product/<?=$p->img?>" alt="user" class="rounded" width="45"></div>
                                                        </td>
                                                        <td><?=$p->title?></td>
                                                        <td><?=number_format($p->price)?>đ</td>
                                                        <td><?=number_format($p->promotionPrice)?>đ</td>
                                                        <td><a href=""><i class="fas fa-edit"></i></a><a href=""><i class="far fa-trash-alt"></i></a></td>
														
                                                    </tr>
                                                    <?php endforeach ?>
                                                    <tr>
                                                        <td colspan="9"><a href="#" class="btn btn-outline-light float-right">View Details</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
			
		</div>
	</div>
</div>
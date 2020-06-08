<?php
require"../../view/config.php";
require_once"../../lib/functions.php";
require_once"../../app/model/mainModel.php";
session_start();
$model = new mainModel;
$fetch = $model->getRating($_SESSION['idProduct']);
$output = '';
foreach($fetch as $row){
	$output .= '<div class="single-review">
													<div class="review-heading">
														<div style="color:#F8694A"><i class="fa fa-user-o"></i> '.$row->name.'</div>
														<div><i class="fa fa-clock-o"></i> '.$row->updateAtr.'</div>
														<div class="review-rating pull-right">
																	'.$row->star.' <i class="fa fa-star"></i>
																	
															
														</div>
													</div>
													<div class="review-body">
													<span style="color:rgb(0, 153, 0);"><i class="fa fa-shield"></i> Đã mua sản phẩm này tại Kshop</span>
														 <p><i class="fa fa-comment"></i> '.trashText($row->comment).'</p>
													</div>
												</div>';
}

echo $output;

?>
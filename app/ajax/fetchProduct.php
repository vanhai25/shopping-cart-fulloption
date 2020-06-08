<?php 
session_start();
require"../../model/mainModel.php";
$model = new mainModel;
$idShop
if(isset($_POST['url'])){
	$url = $_POST['url'];
	$idShop = $_POST['idshop'];
	$result=$model->getProductCatalogOfShop($url, $idShop);
	$output ='';
	foreach($result as $row){
		$output .= '
			<div class="col-md-4 col-sm-6 col-xs-6">
									'.$row->title.'
								</div>

		';
	}
	echo $output;

}
?>
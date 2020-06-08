<?php 
require"../../view/config.php";
require"../../app/model/mainModel.php";
$model = new mainModel;
if(isset($_POST['query'])){
	$inpText = $_POST['query'];
	$list = $model->search($inpText);
	if($list){
		foreach($list as $l){
			echo "<a href='".$l->nameKo."' class='list-group-item list-group-item-action border-1'>".$l->name."</a>";
		}
	}
	else{
		echo "<a class='list-group-item list-group-item-action border-1'> Không có kết quả</a>";
	}
}
?>
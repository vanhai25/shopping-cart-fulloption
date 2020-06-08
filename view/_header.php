<?php 
require"config.php";
require"app/model/DBConnect.php";
require"app/controller/cartController.php";
require"app/model/mainModel.php";
require"app/model/profileModel.php";
require"app/model/manageModel.php";
require"lib/PHPMailer/sendmail.php";
require"lib/functions.php";
require"lib/Pager.php";

$model = new mainModel();
$proModel = new profileModel();
$manaModel = new manageModel();
$DB = new DBConnect();
$cart = new cart($DB);
// Tính trung bình rate

$typeP = $model->getCatalog1();

?>
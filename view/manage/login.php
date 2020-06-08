<?php
require"../app/model/manageModel.php";
require"../lib/functions.php";
$manaModel = new manageModel;
session_start(); 
if(!isset($_SESSION['iduser'])){
    header("location:../dang-nhap");
}
if(isset($_POST['sm'])){
    if(empty($_POST['txt'])) $mess = 'Bạn không được bỏ trống!';
    else $name = $_POST['txt'];
    $check = $manaModel->checkNameShop($name);
    if(strlen($name) < 6){
        $mess = 'Tên shop trên 6 kí tự';
    }
    elseif($check){
        $mess = 'Tên shop đã có người sử dụng. Vui lòng chọn tên khác';
    }
    else{
        $nameKo = convert_vi_to_en($name);
        $a = $manaModel->insertShop($_SESSION['iduser'],$name,$nameKo);
        if($a){
            $_SESSION['idshop'] = $manaModel->getIdShop($_SESSION['iduser'])->id;
            header("location:index.php");
        }
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kênh Người Bán</title>

    <link rel="stylesheet" href="../public/profile/css/style.css">
</head>

<body>

    <div class="iko-grid">

        <!-- Header -->
        <div class="iko-header">
            <!-- logo -->
            <div class="iko-logo">
                <a href="#">
                    <!-- <img src="img/iko-logo.png" alt=""> -->
                </a>
            </div>
            <div class="iko-breadcrums">
                <h3 class="breadcrums-text">Kênh Người Bán</h3>
            </div>
            <div class="iko-home"></div>
        </div>
        <div class="iko-main">
            <div class="main-intro">
                <p class="title">Bán hàng chuyên nghiệp</p>
                <p class="subtitle">Quản lý shop của bạn hiệu quả hơn trên Ikotech với Iko - Kênh Người Bán</p>
                <div class="image"></div>
            </div>

            <div class="login-box">
                <div class="signin-title">Iko - Kênh Người Bán</div>
                <form method="POST">
                    <input type="text" name="txt" placeholder="Tên gian hàng của bạn" required>
                    <span style="font-size: 12px; color: red;"><?php if(isset($mess)) echo $mess; ?></span>
                    <input type="submit" name="sm" value="Tạo gian hàng">
                </form>
            </div>
        </div>
        <div class="iko-footer"></div>
    </div>

</body>

</html>
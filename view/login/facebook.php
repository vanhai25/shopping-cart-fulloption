

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="public/template/css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="public/template/css/slick.css" />
    <link type="text/css" rel="stylesheet" href="public/template/css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="public/template/css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="public/template/css/font-awesome.min.css">
</head>
<style type="text/css">
    body{
        margin: 0 auto;
        padding: 0;
    }
    .container-fluid{
        margin: 0;
        padding: 0;
    }
    .header{
        margin:0;
        width: 100%;
        height: 80px;
        line-height: 80px;
        box-shadow: 0px 0px 5px 5px #cccccccc;
    }
    .img-logo{
        height: 100%;
        padding-left:20px ; 
        
    }
    .main-box{
        box-shadow: 0px 0px 5px 2px #cccccccc;
        width: 450px;
        margin: 60px 0; 
        padding: 30px;
    }
    .main-box input{
        margin :10px 0;
        width: 100%;
        height: 38px;
        padding-left: 10px;
        outline: none;
        border: 1px solid #cccccccc;
        border-radius: 2px;
    }
    .avatar {
        vertical-align: middle;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        margin: 30px 0px 20px; 

    }
    p{
        margin: 20px 0px 20px 0px;
        font-size: 12px; 
    }
    button{
        border: none;
        padding: 10px 20px;
        margin-left: 10px;
    }
    .dky{
        background:#F8694A ;
        color: white;
    }
    .dky:hover{
        background: #30323A;
        color:white;
        transition: 1s;
    }
    span{
        font-size: 24px;

    }

</style>
<body>
    <div class="container-fluid" align="center">
        <div class="header" align="left">
            <div class="img-logo">
                <a href="trang-chu"><img src="upload/logo.png" height="80%"></a>
                <span>Đăng ký</span>
            </div>
        </div>
        <div class="main-box" align="left">
            <span>Đăng ký qua Facebook</span>
            <div class="box-img" align="center">
                <img src="<?=$_SESSION['loginfb']['user_image'];?>" alt="Avatar" class="avatar">
            </div>
            <form method="post">
                <input type="text" name="namefb" placeholder="Tên người dùng" value="<?=$_SESSION['loginfb']['user_name']?>">
                <input type="text" name="mailfb" value="<?=$_SESSION['loginfb']['user_email_address']?>">
                <input type="hidden" name="passfb" value="<?=$_SESSION['user_id']?>">

                <p>Bằng việc đăng kí, bạn đã đồng ý với Shopee về Điều khoản dịch vụ & Chính sách bảo mật</p>
                <div class="btn-box" align="right">
                    
                    <button>TRỞ LẠI</button><button class="dky" type="submit" name="loginfb">ĐĂNG KÝ</button>
                </div>
            </form>
        
        </div>
    </div>
</body>
</html>
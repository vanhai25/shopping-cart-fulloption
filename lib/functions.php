<?php
// Hàm chọn chuỗi chữ cái, số ngẫu nhiên 
function createToken($length = 40){
    $token = '';
    $initString = '0123456789qwertyuioplkjhgfdsazxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';
    for($i = 1; $i <= $length; $i++){
        $position = rand(0, strlen($initString)-1);
        $token .= $initString[$position];

    }
    return $token;
}
// Hàm chuyển kí tự 

  function convert_vi_to_en($str) {
      $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
      $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
      $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
      $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
      $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
      $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
      $str = preg_replace("/(đ)/", "d", $str);
      $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
      $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
      $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
      $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
      $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
      $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
      $str = preg_replace("/(Đ)/", "D", $str);
      $str = str_replace(".", "", str_replace("&*#39;","",$str));
      $str = str_replace(",", "", str_replace("&*#39;","",$str));
      $str = str_replace("'", "", str_replace("&*#39;","",$str));
      $str = str_replace(".", "", str_replace("&*#39;","",$str));
      $str = str_replace(" ", "-", str_replace("&*#39;","",$str));
      $str = str_replace(":","", str_replace("&*#39;","",$str));
      $str = str_replace("%","", str_replace("&*#39;","",$str));
      $str = str_replace("&","va", str_replace("&*#39;","",$str));
      return $str;
}
// Hàm tính thời gian trôi qua
function time_elapsed_string($datetime, $full = false) {
  date_default_timezone_set("Asia/Ho_Chi_Minh");
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'năm',
        'm' => 'tháng',
        'w' => 'tuần',
        'd' => 'ngày',
        'h' => 'giờ',
        'i' => 'phút',
        's' => 'giây',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' trước' : 'Bây giờ';
}
// Hàm tính tiền coin 
function coin($price){
  $coin = $price / 1000;
  return $coin;
}
// Hàm chuyển đổi 1000 = k
function tinh($so){
  $x = (string)$so;
  $a = substr($x,0,1);
  $b = substr($x,1,1);
  $c = substr($x,2,1);
  $bb = (int)$b;
  if($so >= 1000 && $so < 10000){
    if($bb > 0){
      return $a.','.$b.'k';
    }
    else{
      return $a.'k';
    }

  }
  elseif($so >= 10000 && $so < 100000){
    return $a.$b.'k'; 
  }
  elseif($so >= 100000 && $so < 1000000){
    return $a.$b.$c.'k';
  }
  elseif($so >= 1000000 && $so < 10000000){
    if($bb > 0){
      return $a.','.$b.'M';
    }
    else{
      return $a.'M';
    }
  }
  else{
    return $so;
  }
}
// Hàm hiển thị sao đánh giá
function star($so){
  $x = (float)$so;
  if($x == 1){
    return '<i class="fa fa-star"></i>
            <i class="fa fa-star-o empty"></i>
            <i class="fa fa-star-o empty"></i>
            <i class="fa fa-star-o empty"></i>
            <i class="fa fa-star-o empty"></i>
            ';
  }
  elseif($x > 1 && $x < 2){ 
    return '<i class="fa fa-star"></i>
            <i class="fa fa-star-half"></i>
            <i class="fa fa-star-o empty"></i>
            <i class="fa fa-star-o empty"></i>
            <i class="fa fa-star-o empty"></i>
            ';
  }
  elseif($x == 2){
    return '<i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o empty"></i>
            <i class="fa fa-star-o empty"></i>
            <i class="fa fa-star-o empty"></i>
            ';
  }
  elseif($x > 2 && $x < 3){
    return '<i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half"></i>
            <i class="fa fa-star-o empty"></i>
            <i class="fa fa-star-o empty"></i>
            ';
  }
  elseif($x == 3){
    return '<i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o empty"></i>
            <i class="fa fa-star-o empty"></i>
            ';
  }
  elseif($x > 3 && $x < 4){
    return '<i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half"></i>
            <i class="fa fa-star-o empty"></i>
            ';
  }
  elseif($x == 4){
    return '<i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o empty"></i>
            ';
  }
  elseif ($x > 4 && $x < 5) {
    return '<i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half"></i>
            ';
  }
  else{
    return '<i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            ';
  }
}
function trashText($string){
  $trash = ['đụ', 'mẹ', 'cặc', 'lồn', 'ngu', 'địt', 'đĩ', 'điếm', 'phò', 'djt', 'loz', 'cak', 'má'];
  $x = explode(' ',$string);

  for($i=0;$i<count($x);$i++){
    if(in_array($x[$i], $trash)){
        $x[$i] = '***';  
    }  
  }
  return $x = implode(' ',$x);

}


// Hàm cắt ảnh
// $filenameImage: đường dẫn hình ban đầu
// $filenameThumb: đường dẫn chứa hình sau khi cắt
// $ext: đuôi mở rộng của file hình ban đầu
// $thumb_width: chiều rộng hình sau khi cắt
// $thumb_height: chiều cao hình sau khi cắt
function CreateThumbImage($filenameImage, $filenameThumb, $ext, $thumb_width, $thumb_height)
    {
  if($ext == "jpeg" || $ext == "jpg")
  {
   $image = imagecreatefromjpeg($filenameImage);
  }
  if($ext == "png")
  {
   $image = imagecreatefrompng($filenameImage);
  }
  $filename = $filenameThumb;

  // $thumb_width = 300;
  // $thumb_height = 300;

  $width = imagesx($image);
  $height = imagesy($image);

  $original_aspect = $width / $height;
  $thumb_aspect = $thumb_width / $thumb_height;

  if ( $original_aspect >= $thumb_aspect )
  {
     // If image is wider than thumbnail (in aspect ratio sense)
     $new_height = $thumb_height;
     $new_width = $width / ($height / $thumb_height);
  }
  else
  {
     // If the thumbnail is wider than the image
     $new_width = $thumb_width;
     $new_height = $height / ($width / $thumb_width);
  }

  $thumb = imagecreatetruecolor( $thumb_width, $thumb_height );

  switch ($ext) {
      case 'png':
          // integer representation of the color black (rgb: 0,0,0)
          $background = imagecolorallocate($thumb , 0, 0, 0);
          // removing the black from the placeholder
          imagecolortransparent($thumb, $background);

          // turning off alpha blending (to ensure alpha channel information
          // is preserved, rather than removed (blending with the rest of the
          // image in the form of black))
          imagealphablending($thumb, false);

          // turning on alpha channel information saving (to ensure the full range
          // of transparency is preserved)
          imagesavealpha($thumb, true);
          break;

      default:
          break;
  }

  // Resize and crop
  imagecopyresampled($thumb,
                     $image,
                     0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
                     0 - ($new_height - $thumb_height) / 2, // Center the image vertically
                     0, 0,
                     $new_width, $new_height,
                     $width, $height);
  switch ($ext) {
   case 'jpg':
   case 'jpeg':
   {
    imagejpeg($thumb, $filename, 100);break;
   }
   case 'png':
   {
    imagepng($thumb,$filename,1);break;
   }
   default:
   {
    imagejpeg($thumb, $filename, 100);
   }
  }
 }

?>
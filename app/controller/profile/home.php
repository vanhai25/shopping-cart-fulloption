<?php 
if(isset($_GET['act'])){
	$act = $_GET['act'];
}
else{
	$act = 'home';
}
switch ($act) {
	case 'home':
		require_once"view/profile/home.php";
		break;
	
	default:
		# code...
		break;
}
?>
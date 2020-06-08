<?php 
session_start();
require"../../view/config.php";
require"../../app/model/mainModel.php";
$model = new mainModel;
if(isset($_SESSION['idBest'] )){
	$idb = $_SESSION['idBest'];

}
else{
	$idb =1;
}
$output = '';

if(!empty($_POST["id"])){
	$idLast = $_POST['id'];

    // Include the database configuration file
    $totalRowCount = $model->getCountProductByIdCatalog($idb);
    
   
    $showLimit = 2;
    
    // Get records from the database
    $query = $model->getProductByIdCatalogLast($idb,$idLast,$showLimit);

    if($query){
    	foreach($query as $h){
    		$postID = $h->id;
    		echo $h->id;
    	}
    	if($totalRowCount > $showLimit){?>
			<div class="show_more_main" id="show_more_main<?php echo $postID; ?>">
            <span id="<?php echo $postID; ?>" class="show_more" title="Load more posts">Show more</span>
            <span class="loding" style="display: none;"><span class="loding_txt">Loading...</span></span>
        </div>

    	<?php }
    }

}
?>



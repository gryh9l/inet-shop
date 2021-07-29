<div class='profile'>
<?php 
foreach($check->file_content[$_SESSION['account']] as $key => $value){
	if($key !== $_SERVER['REMOTE_ADDR']){
	echo "<p>$value</p>";
		if($key == 'order'){
			foreach($value as $products){
				echo "<p>$products</p>";
			}
		}
	}
}
?>
</div>
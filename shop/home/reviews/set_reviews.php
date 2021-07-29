<?php
session_start();
include '../../account/autor_registr/set/valid.php';

class insert_masseg{
	public function insert(){
		$this->content[$_POST['number']] = $_POST['text'];
		$this->content = serialize($this->content);
		$this->fopen = fopen($this->file,'w');
		fwrite($this->fopen,$this->content);
		fclose($this->file);
	}
}

$input_valid = new verify_input();
$input_valid->error = $input_valid->select_valid();
if($input_valid->select_valid() !== false){
	var_dump($input_valid->select_valid());
}else{
	if($input_valid->verify_captcha() !== false){
		$input_valid->error = $input_valid->verify_captcha();
	}else{
		$input_valid->error = false;
	}
}
if($input_valid->error !== false){
	$_SESSION['error'] = $input_valid->error;
	header("location:http://shop.loc/?go=reviews#form_reviews");
}else{
$insert_masseg = new insert_masseg();
$insert_masseg->file = 'reviews.txt';
$insert_masseg->content = unserialize(file_get_contents($insert_masseg->file));
$insert_masseg->insert();
header("location:http://shop.loc/?go=reviews#form_reviews");
}
?>
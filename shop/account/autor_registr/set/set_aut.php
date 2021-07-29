<?php
session_start();
if(isset($_POST['aut_but'])){
	include 'valid.php';
	class aut_user {
		public function check_user(){
			if(array_key_exists($_POST['number'], $this->file_content)){
				return true;
			}else{
				$_SESSION['error_reg'] = 'Неверный логин или пароль';
				return false;
			}		
		}
		public function autor_user(){
			if($this->file_content[$_POST['number']]['pass'] !== $_POST['pass']){
				$_SESSION['error_reg'] = 'Неверный логин или пароль';
				return false;
			}else{
				$_SESSION['account'] = $_POST['number']; 
				$_SESSION['id'] = rand(0,10000);
				return true;
			}
		}
	}

	$valid = new verify_input();

	if($valid->select_valid() !== false){
        $valid->error = $valid->select_valid();
    }else{
        $valid->error = $valid->verify_captcha();
    }

	if($valid->error == false){
		$autor = new aut_user();
		$autor->file_content = unserialize(file_get_contents('users.txt'));
		if($autor->check_user()==true){
			if($autor->autor_user()==false){
				header("location: http://shop.loc?go=aut");
			}else{
				$autor->file_content[$_POST['number']][$_SERVER['REMOTE_ADDR']] = ['exit'=>0];
				$autor->file_content = serialize($autor->file_content);
				$file = fopen('users.txt', 'w'); 
				fwrite($file,$autor->file_content);
				fclose($file);
				header("location: http://shop.loc");
			}
		}else{
			header("location: http://shop.loc?go=aut");
		}
	}else{
		$_SESSION['error_reg'] = $valid->error;
		header("location: http://shop.loc?go=aut");
	}
}
		// echo $_POST['kap4a'];
?>

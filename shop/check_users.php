<?php
class check_user {
	private function insert_priveleges(){
		// здесь будут привилегии конкретного аккаунта
	}
	public function check(){	
		foreach($this->file_content as $num => $array){
			$number = $num;
			foreach ($array as $key => $value){
				if($_SERVER['REMOTE_ADDR'] == $key){
					if($value['exit'] == 0){
						$_SESSION['id'] = rand(1,50000);
						$_SESSION['account'] = $number;
						break 2;
					}else{
						unset($_SESSION['account']);
						unset($_SESSION['id']);
					}
				}
			}
		}
		if($this->file_content[$_SESSION['account']][$_SERVER['REMOTE_ADDR']] == false){
			unset($_SESSION['account']);
			unset($_SESSION['id']);
		}
	}
}
$check = new check_user();
$check->file_content = unserialize(file_get_contents('account/autor_registr/set/users.txt'));
$check->check();
?>
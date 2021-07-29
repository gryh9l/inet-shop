<?php 
session_start();
if(isset($_POST['reg_but'])){
    include 'valid.php';
    class verify_pass extends verify_input{
        public function __construct($valid_input){
            $this->status = $valid_input;
        }
        public function check_status_error(){
            if($this->status !== false){
                return $this->error = $this->status;
            }else{
                if($_POST['pass'] !== $_POST['verify_pass']){
                    return $this->error = 'пароли не совпадают';
                }else{
                    return $this->error = true;
                }
            }
        }
    }
 
    class reg_set{
        public function check_user(){
            if(array_key_exists($_POST['number'], $this->file_content)){
                return true;
            }else{
                return false;
            }
        }
        public function reg_user(){
            $this->fopen = fopen($this->file,'w');
            $this->file_content[$_POST['number']] = $this->content; 
            $this->file_content = serialize($this->file_content);
            fwrite($this->fopen,$this->file_content);
            fclose($this->file);
        }
    }

    $valid_error = new verify_input();
    if($valid_error->select_valid() !== false){
        $valid_pass = new verify_pass($valid_error->select_valid());
    }else{
        $valid_pass = new verify_pass($valid_error->verify_captcha());
    }

    if($valid_pass->check_status_error() !== true){
        $_SESSION['error_reg'] = $valid_pass->check_status_error();
        header("location: ../../../?go=reg");
    }else{
        $string = new reg_set();
        $string->file = 'users.txt'; // для fopen внутри объекта reg_user
        $string->file_content = unserialize(file_get_contents($string->file));
        if($string->check_user() == true){
            $_SESSION['error_reg'] = 'такой номер телефона зарегистрирован';
            header("location: ../../../?go=reg");
        }else{
            $string->content = ['pass'=>$_POST['pass'],'us_name'=>$_POST['Name'],'grandname'=>$_POST['grandname'],'gor_ray'=>$_POST['gor_ray'],'adress'=>$_POST['adress'],$_SERVER['REMOTE_ADDR']=>['exit'=>0]];
            $string->reg_user();
            $_SESSION['account'] = $_POST['number'];
            $_SESSION['id'] = rand(0,10000);
            header("location: http://shop.loc");
        }
    }
}


?>
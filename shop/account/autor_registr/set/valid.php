<?php 
    class verify_input {        
        public function select_valid(){
            if(count($_POST) <= 2){
                $error = 'все поля пусты';
            }else{
                $coll_input = 0;
                foreach($_POST as $value){
                $coll_input++;
                trim($value);
                    if(ctype_space($value)){
                        $error_space[] = $coll_input;
                    }else{
                        // найти символы ('/[БуквыБуквыЦифрыБуквыБуквы\пробельные символы] /u,$где_искать,куда отдавать найденное.') 
                        preg_match('/[^a-zA-Z0-9а-яА-Я@.\s]{1,90}/u', $value,$error_check);
                        if(!empty($error_check)){
                            $error[] = $coll_input;
                        }
                    }
                }
                if($error == true || $error_space == true){
                    if($error == true){
                    	$error = implode(",",$error);
                        $error = "В поле '$error' есть недопустимые символы<br>";
                    }
                    if($error_space == true){
                    	$error_space = implode(",",$error_space);
                        $error_space = "В '$error_space' поле только пробелы<br>";
                    }
                    $error = "$error$error_space$error_empty";
                }else{
                    $error = false;
                }
            }
            return $error;
        }

        public function verify_captcha(){
            session_start();
            if(md5(md5($_POST['kap4a'])) !== $_SESSION['kap4a']){
                $error = 'Неверно ввели капчу';
            }else{
                $error = false;
            }
            unset($_SESSION['kap4a']);
            return $error;
        }
    }
?>
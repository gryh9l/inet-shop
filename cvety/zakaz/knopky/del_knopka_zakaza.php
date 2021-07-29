<?php 
session_start();
include '/home/paha/Site/cvety/connectdb.php';
if(!isset($_POST['tovar_id'])){
    echo '<h3>не происходит</h3>';
}else{
    echo'<h3>есть1</h3>';
    if(empty($_POST['id_tovars'])){
        echo'<h3>потерялось</h3>';
    }else{
        echo'<h3>есть2</h3>';
        $tov_d = $_POST['id_tovars'];
        if(empty($tov_d)){
            echo'<h3>нету</h3>';
        }else{
            echo'<h3>есть3</h3>';
            $t_id = mysqli_query($link, "DELETE FROM zakaz WHERE id_zakaz = ($tov_d)");
                     
            
            if(!isset($t_id))                                                                                              /*            Если(Пустая(Переменная[имя столбца из БД]))                */
            {                                                                                                                /*            {                                                          */
                echo 'Чёто с бд';
            }else{
                echo 'вроде нормально';
                header("location: /index.php?go=orders");
            }
            
            
        }
    }
}
include '/home/paha/Site/cvety/scripts/script.php';

?>



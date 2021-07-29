<?php  
session_start();
include "/home/paha/Site/cvety/connectdb.php";

    if (isset($_POST["del"]))                                                 /*Если(Выполняется(Пост["Название объекта"]))*/
    {       
        $id = $_SESSION["id"];                                                  /*Переменная = Сессия[Название объекта]*/
        
        $de = $link->query("DELETE FROM zakaz WHERE orders_registr_id = ($id)");
        
        $de1 = $link->query("DELETE FROM orders WHERE registr_id = ($id)");
        
        $de2 = $link->query("DELETE FROM registr WHERE id = ($id)");
        
            if(!isset($de, $de1, $de2))
        {
            $er = ('Код ошибки: '.$link->errno.' - '.$link->error);
            $_SESSION['er'] = $er;
            header("location: /index.php?go=account");
        }
        else
        {
        header("location: /index.php");                                   /*Колонтитул ("Перемещение на: /выбронную ссылку")*/
        unset($_SESSION['id']);                                           /*Уничтожение(Сессия[Название объекта])*/
        session_destroy();
        }
    }
                                                            /*Уничтожение сессии*/
?>
<?php
session_start();
include "/home/paha/Site/cvety/connectdb.php";   
if (isset($_POST['autorized']))                                                                                          /* Если(Выполняется(Метод ПОСТ[name 'значение' у кнопки]))               */
{                                                                                                                        /*  {                                                                    */
    if (empty($_POST['login']))                                                                                          /*       Если(Пустой(Метод ПОСТ[name 'значение' у строки]))              */
    {                                                                                                                    /*       {                                                               */           
        $info_input = 'Вы не ввели логин';                                                                               /*       Присвоение переменной = определённой надписи                    */
    }                                                                                                                    /*       }                                                               */   
    elseif (empty($_POST['password']))                                                                                   /*       и Если(Пустой(Метод ПОСТ[name 'значение' у строки]))            */
    {                                                                                                                    /*       {                                                               */                                           
        $info_input = 'Вы не ввели пароль';                                                                              /*        присвоение переменной = определённой надписи                   */
    }                                                                                                                    /*       }                                                               */                                           
    else                                                                                                                 /*       иначе                                                           */
    {                                                                                                                    /*       {                                                               */                                               
        $login = $_POST['login'];                                                                                        /*            Метод пост[name 'значение' у строки] = переменная          */
        $password = $_POST['password'];                                                                                  /*            Метод пост[name 'значение' у строки] = переменная          */ 
        $user = mysqli_query($link, "SELECT `id` FROM `registr` WHERE `Login` = '$login' AND `Password` = '$password'"); /*            Переменная = запрос к бд(Переменная с подключением, Выбрать 'id' Из 'Таблицы' Где Логин=переменная И Пароль=переменная ) */                         
        $id_user = mysqli_fetch_array($user);                                                                            /*            Вывод переменной в матричный массив = переменная           */

        
        if (!$id_user['id'])                                                                                      /*            Если(Пустая(Переменная[имя столбца из БД]))                */
        {                                                                                                                /*            {                                                          */        
           $info_input = ('Неизвестный пользователь: Код ошибки: '.$link->errno.' - '.$link->error);                                                                   /*            Переменная = определённая надпись                          */            

           header("location: /index.php?go=autoriz");
        }                                                                                                                /*            }                                                          */
        else                                                                                                             /*            иначе                                                      */
        {                                                                                                                /*            {                                                          */                 
        $_SESSION['id'] = $id_user['id'];                                                                                /*            сохранение сессии[id] = переменной[имя столбца из БД]      */   
        }                                                                                                                /*            }                                                          */               
    }                                                                                                                    /*         }                                                             */           
}                                                                                                                        /*  }                                                                    */
$info_input = isset($info_input) ? $info_input : NULL;    /* Переменная = Выполняется(переменная) Выбор Переменная:нулевое значение*/
$_SESSION['messeg'] = $info_input;                        /* запись в сессию['messeg'] = переменная                                */

if (isset($id_user['id']))                               /* Если(не Выполнен(сессия['id']))                                       */
{                                                         /* {                                                                     */   
    header("location: /index.php?go=account");            /* перевод на страницу с инфо.                                           */
}else{
    header("location: /index.php?go=autoriz");
}
include '/home/paha/Site/cvety/scripts/script.php';
?>
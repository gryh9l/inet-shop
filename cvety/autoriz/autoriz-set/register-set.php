<?php
session_start();
include "/home/paha/Site/cvety/connectdb.php";

if (isset($_POST['Nam']) && isset($_POST['family']) && isset($_POST['login']) && isset($_POST['password'])) 
/*Если(Выполняется(Пост[Имя])) и Если(Выполняется(Пост[Имя])) и Если(Выполняется(Пост[Имя])) и Если(Выполняется(Пост[Имя]))*/
{
    if (empty($_POST['Nam'])) /* Если(Пустой(Пост[Имя])) */
    {
        $iinfo_input = 'Вы не ввели имя'; /* Переменная = Текст */
    }
    
    elseif (empty($_POST['family'])) /* и если(Пустой(Пост[Имя])) */
    {
        $iinfo_input = 'Вы не ввели фамилию'; /* Переменная = Текст */
    }
    
    elseif (empty($_POST['login'])) /* и если(Пустой(Пост[Имя])) */
    {
        $iinfo_input = 'Вы не ввели логин'; /* Переменная = Текст */
    }
    
    elseif (empty($_POST['password'])) /* и если(Пустой(Пост[Имя])) */
    {
        $iinfo_input = 'Вы не ввели пароль'; /* Переменная = Текст */
    }
    else /* Иначе */
    {   
       
       $Nam = $_POST['Nam']; /* Переменная = Пост[Имя] */
       $family = $_POST['family']; /* Переменная = Пост[Имя] */
       $login = $_POST['login']; /* Переменная = Пост[Имя] */
       $password = $_POST['password']; /* Переменная = Пост[Имя] */
   
       
            
           $stroka = mysqli_query($link, "INSERT INTO ".registr."
                     (Name,Familiya,Login,Password)
                     VALUES 
                     ('$Nam','$family','$login','$password')");

           
       if(!isset($stroka))                                                                                              /*            Если(Пустая(Переменная[имя столбца из БД]))                */
       {                                                                                                                /*            {                                                          */
           $iinfo_input = die('Запись не выполнена: Код ошибки: '.$link->errno.' - '.$link->error);
       }                            
    }
}  


$iinfo_input = isset($iinfo_input) ? $iinfo_input : NULL;  /* Переменная = Выполняется(переменная) Выбор Переменная:нулевое значение*/

$_SESSION['messeg'] = $iinfo_input;                        /* запись в сессию['messeg'] = переменная                                */

if (!isset($stroka))                                      /* Если(не Выполнен(переменная))                                       */
{                                                         /* {                                                                     */
    header("location: /index.php?go=register");             /* перевод на страницу с авторизацией                                    */
}                                                         /* }                                                                     */
else                                                      /* иначе                                                                 */
{                                                         /* {                                                                     */
    header("location: /index.php?go=autoriz");             /* перевод на страницу с инфо.                                           */
}                                                         /* }                                                                     */   
?>

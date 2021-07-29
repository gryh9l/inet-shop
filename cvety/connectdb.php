<?php 

$link = mysqli_connect('localhost','paha','123','test'); /*Переменная = Функция бд_подключение('Хост','Логин','Пароль','Имя бд')*/           
                                                                                                        
/*проверка соединения:                                                                                                          */
if ($link->connect_error) {
    die('Error : ('. $link->connect_errno .') '. $link->connect_error);
}
mysqli_set_charset($link, 'utf8');/* Функция бд_Текст_Русификатор(Переменная, 'Язык')                    */

?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="/menu/menu.css" type="text/css"/>
<link rel="stylesheet" href="/autoriz/autoriz.css" type="text/css"/>
<link rel="stylesheet" href="/tovar/tovar.css" type="text/css"/>
<title>Цветы</title>
<style>
body {
background: url(/jpg/fon.jpg); /* Фоновая картинка */
background-repeat: no-repeat; /* фон не повторяется */
background-attachment: fixed;    /* фон background-attachment: fixed ; фон стоит */
background-position: center;
background-size: cover; /* фоновая картинка на весь экран */
} 
</style>
</head>
<body>
<?php
session_start();  
include 'connectdb.php';
include '/home/paha/Site/cvety/menu/menu.php';
$id = $_SESSION['id'];
$action = $_GET['go']; /*Принимаем значение переменной для адресной строки с подчисткой(!clear_string)*/
switch ($action) {      /* говорим, с чем мы будем сравнивать */
    
    case 'forum': /* ключевое слово для выполнения этого кода */
        include '/home/paha/Site/cvety/forum/forum.php';
        break;
        
    case 'account':
        include '/home/paha/Site/cvety/account/account.php';
        break;
        
    case 'register':
        include '/home/paha/Site/cvety/autoriz/register.php';
        break;
        
    case 'autoriz':
        include '/home/paha/Site/cvety/autoriz/autoriz.php';
        break;
        
    case 'orders':
        include '/home/paha/Site/cvety/zakaz/orders.php';
        break;
        
    case 'tovar':
        include '/home/paha/Site/cvety/tovar/tovar.php';
        break;
        

};
?>
</body>
</html>
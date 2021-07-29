<?php 
session_start();
include 'check_users.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/aut_reg.css">
<!--     <link rel="stylesheet" href="css/home.css"> -->
    <link rel="stylesheet" href="css/compl_suggest.css">
    <title>Магазин цветов и шаров</title>
</head>
<body>
    <glob_div class="glob_div">
        <menu class="menu">
            <ul class="menu_ul_1">
                <li class="menu_ul_li_1"><a href="http://shop.loc">Возврат на главную</a>
                    <ul class="menu_ul_2">
                        <li class="menu_ul_li_ul_li_2"><a href="http://shop.loc?go=def">Защита покупателя</a></li>
                        <li class="menu_ul_li_ul_li_2"><a href="http://shop.loc?go=complaints_and_suggestions">Жалобы и <small>предложения</small></a></li>
                        <li class="menu_ul_li_ul_li_2"><a href="http://shop.loc?go=reviews"><big>Отзывы</big></a></li>
                        <li class="menu_ul_li_ul_li_2"><a href="http://shop.loc?go=support">Тех-поддержка</a></li>
                        <li class="menu_ul_li_ul_li_2"><a href="http://shop.loc?go=contact"><big>Контакты</big></a></li>
                    </ul>
                </li>
                <li class="menu_ul_li_1"><a href="">Цветы и изделия из них</a>
                    <ul class="menu_ul_2">
                        <li class="menu_ul_li_ul_li_2"><a href="">Срезка</a></li>
                        <li class="menu_ul_li_ul_li_2"><a href="">Букеты</a></li>
                        <li class="menu_ul_li_ul_li_2"><a href="">Композиции</a></li>
                    </ul>
                </li>
                <li class="menu_ul_li_1"><a href="">Шары и изделия из них</a>
                    <ul class="menu_ul_2">
                        <li class="menu_ul_li_ul_li_2"><a href="">Латексные</a></li>
                        <li class="menu_ul_li_ul_li_2"><a href="">Фольги- рованные</a></li>
                        <li class="menu_ul_li_ul_li_2"><a href="">Фонтаны из шаров</a></li>
                        <li class="menu_ul_li_ul_li_2"><a href="">Ходячие шары</a></li>
                        <li class="menu_ul_li_ul_li_2"><a href="">Шары бобо</a></li>
                    </ul>
                </li>
                <li class="menu_ul_li_1"><a href="">изделия из цветов и шаров</a></li>
                <li class="menu_ul_li_1"><a href="?go=order">Корзина товаров</a></li>
                <?php
                if(!isset($_SESSION['id']) && !isset($_SESSION['account'])){
                echo '
                <li class="menu_ul_li_1"><a href="?go=aut">Авторизация и регистрация</a>
                    <ul class="menu_ul_2">
                        <li class="menu_ul_li_ul_li_2"><a href="http://shop.loc?go=aut">Авторизация</a></li>
                        <li class="menu_ul_li_ul_li_2"><a href="http://shop.loc?go=reg">Регистрация</a></li>
                    </ul>
                </li>';
                }else{
                echo '<li class="menu_ul_li_1"><a href="http://shop.loc?go=profile">Мой профиль</a>
                    <ul class="menu_ul_2">
                        <li class="menu_ul_li_ul_li_2"><a href="">Информация обо мне</a></li>
                        <li class="menu_ul_li_ul_li_2"><a href="">Вопрос магазину</a></li>
                        <li class="menu_ul_li_ul_li_2"><a href=""><small>Персональные</small> скидки</a></li>
                        <li class="menu_ul_li_ul_li_2"><a href="">Мои <small>предпочтения</small></a></li>
                        <li class="menu_ul_li_ul_li_2"><a href="http://shop.loc?go=exit">Выход из аккаунта</a></li>
                    </ul>
                </li>
                ';}?>
            </ul>
        </menu>
        <div_center class="div_center">
            <div>
            <?php 
            switch ($_GET['go']){
                default:
                    include 'home/home.html';
                break;
                case 'def': 
                    include 'home/def_client.html';
                break;
                case 'complaints_and_suggestions': 
                    include 'home/complaints_and_suggestion/complaints_and_suggestions.php';
                break;
                case 'reviews': 
                    include 'home/reviews/reviews.php';
                break;
                case 'support': 
                    include 'home/support/support.html';
                break;
                case 'contact': 
                    include 'home/contact.html';
                break;
                case 'order': 
                    include 'order/order.php';
                break;
                case 'aut': 
                    include 'account/autor_registr/autor.php';
                break;
                case 'reg': 
                    include 'account/autor_registr/reg.php';
                break;
                case '#': 
                    include '#';
                break;
                case '#': 
                    include '#';
                break;
                case '#': 
                    include '#';
                break;
                case 'profile': 
                    include 'account/profile/account.php';
                break;
                case 'exit':
                    include 'account/exit.php';
                break;
            }
            ?>
            </div>
        </div_center>
    </glob_div>
</body>
</html>
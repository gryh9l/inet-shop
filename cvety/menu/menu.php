<?php 
$id = $_SESSION["id"];
$order = "SELECT * FROM registr r,zakaz z,tovar t WHERE
r.id = z.registr_id AND z.registr_id = ($id)
AND z.tovar_tovar_id=t.tovar_id";
$ord = mysqli_query($link,$order);
$_SESSION['row'] = $ord->num_rows;


$summ = mysqli_query($link ,"SELECT SUM(cena_z) FROM `zakaz` WHERE registr_id=($id)");
$sum = mysqli_fetch_array($summ);
$_SESSION['summ'] = $sum[0];

$summ = mysqli_query($link ,"SELECT SUM(count_tovar) FROM `zakaz` WHERE registr_id=($id)");
$sum = mysqli_fetch_array($summ);
$_SESSION['count'] = $sum[0];

if(empty($_SESSION['summ'])){
    $_SESSION['summ'] = 0;
}
if(empty($_SESSION['count'])){
    $_SESSION['count'] = 0;
}
?>
<nav class="menu1">
 <ul>
  <li><a href="index.php"><br>Главная</a></li>
  <?php
  if(isset($_SESSION['id']))
  {
      echo '<li><a href="/index.php?go=account"><br>аккаунт</a></li>';
  }
  ?>
  <li><a href="index.php?go=forum"><br>Форум</a></li>
  <li><a href="index.php?go=tovar"><br>Товары</a>
    <ul>
    <li><a href="index.php?go=cvety">Цветы</a></li>
    <li><a href="index.php?go=#m3_2">Композиции</a></li>
    <li><a href="index.php?go=#m3_3">Наша услуга №3</a></li>
    <li><a href="index.php?go=#m3_4">Наша услуга №4</a></li>
    <li><a href="index.php?go=#m3_5">Услуга 5</a></li>
   </ul>
  </li>
<li><a href="index.php?go=#m4"><br>Новости</a></li>

<?php

if (!isset($_SESSION['id']))
{
    echo '<li class="zakaz1"><a href="index.php?go=autoriz">Регистрация<br>и<br>вход</a></li>';
}

else
{

    echo '<li class="zakaz2"><a href="index.php?go=orders">Товаров:'.$_SESSION['row'].'<br>Колл. :'.$_SESSION['count'].'<br>Сумма:'.$_SESSION['summ'].'</a></li>
          <li class="zakaz"><a href="/autoriz/autoriz-set/exit.php">Выход<br>из<br>аккаунта</a></li>';
}
?>

 </ul>
</nav>

<?php
if($_GET['go'] == 'tovar')
echo '
<div id="block-tovars">
 <ul>
 <li><a href="">Цветы</a></li>
 <li><a href="">Латексные шары</a></li>
 <li><a href="">Фольгированые шары</a></li>
 <li><a href="">Шары бобо</a></li>
 </ul>
</div>
';
?>






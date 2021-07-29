<div id="autoriz"> 
<?php 
$id = $_SESSION["id"];

$notovar = mysqli_query($link ,"SELECT tovar_tovar_id FROM zakaz WHERE registr_id = ($id) ");

if(empty($notovar))
{
    echo '<p>'.$notovar.'</p>';
echo 'нет товаров в корзине';
}
else
{
    
$order = "SELECT * FROM registr r,zakaz z,tovar t WHERE
r.id = z.registr_id AND z.registr_id = ($id) AND z.tovar_tovar_id=t.tovar_id";/* Запрос по строке id из бд,  в (переменной=$id) */

if(!isset($order)){
    echo'<h3>вы ничего не заказали</h3>';
}else{
    $ord = mysqli_query($link,$order);                  /* Переменная = соединение запроса и подключения */

    if(empty($ord)){
        echo'<h3>нет2</h3>';
    }else{
    while ($raw = mysqli_fetch_array($ord))              /* Показать (переменная = ассоциативный массив(переменной)) */
        {
        echo '<div class="zakaz2">
              <ul>
              <li>'.$raw["Name_t"].'</li>
              <li><img src="/jpg/ball/falg_obychn/'.$raw["Foto_t"].'"
                             width="200px" height="200px"/></li>
              <li>
              <li>
               <p>Колличество:</p> 
               <form method="POST" action="/zakaz/knopky/del_count.php">
               <input type="submit" value="-" name="count_minus"/>
               <input type="hidden" value='.$raw["id_zakaz"].' name="id"/>
               <p>'.$raw["count_tovar"].'</p>
               <input type="hidden" value='.$raw["cena_t"].' name="cena"/>
               <input type="hidden" value='.$raw["count_tovar"].' name="count"/>
               <input type="submit" value="+" name="count_plus"/>
               </form>
              </li>
              <li>Цена за шт:'.$raw["cena_t"].'</li>
              <li>'.$raw["cena_z"].'</li>
              <li>
              <form action="/zakaz/knopky/del_knopka_zakaza.php" method="POST">
              <input type="text" value="'.$raw["id_zakaz"].'" name="id_tovars" hidden/>
              <input type="submit" value="удалить товар" name="tovar_id" />
              </form>
              </li>
              </ul>
              </div>';
        }
    }
}



$count = $_SESSION['count1'];
echo $count;
unset($_SESSION['count1']);
}
?>
</div>



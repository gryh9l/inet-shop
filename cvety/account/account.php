<?php 
    $id = $_SESSION["id"];                               /* вывод переменной сохранённой в сессию заранее */
    
    $Query = "SELECT * FROM `registr` WHERE id IN ($id)";/* Запрос по строке id из бд,  в (переменной=$id) */
    
    $res = mysqli_query($link, $Query);                  /* Переменная = соединение запроса и подключения */
    
    while ($row = mysqli_fetch_assoc($res))              /* Показать (переменная = ассоциативный массив(переменной)) */
    {
        echo '<div id="autoriz"><div>                     
              <ul>
              <li>Здравствуйте<li>
              <li>'.$row["Familiya"].'</li>           
              <li>'.$row["Name"].'</li>
              </ul>
              </div>';
    }     

    echo 
    '<form action="/account/delete_acc.php" method="POST">                                      
    <input type="submit" name="del" value="Удаление аккаунта">        
    </form>';                                                        
     /*
     открытие формы
     активируем файл "del_acc.php, метод ПОСТ"
     строка тип="кнопка",  имя(сохраняется с сессией и методом ПОСТ)="del", надпись(на кнопке)="Удаление аккаунта"  
     закрытие формы
     */    


    $err1 = $_SESSION['er'];
    echo $err1;
    unset($_SESSION['er']);
    
    ?>

</body>
</html>

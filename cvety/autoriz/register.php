<div id="autoriz">
<h1>Регистрация</h1>
<form action="/autoriz/autoriz-set/register-set.php" method="POST">
Имя: <input type="text" name="Nam"><br>
Фамилия: <input type="text" name="family"><br>
Логин: <input type="text" name="login"><br>
Пароль: <input type="password" placeholder="Пароль" name="password"><br>
<input type="submit" value="Отправка данных">
</form>
</div>

<?php
    $autoString = $_SESSION['messeg'];
    echo $autoString;
    unset($_SESSION['messeg']);
?>
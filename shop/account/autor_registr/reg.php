<?php 
if(isset($_SESSION['id'])){
	header("location: http://test.loc");
}
?>
<h2 class="aut_reg_h2">Регистрация</h2>
<form class="aut_reg_form" action="account/autor_registr/set/set_reg.php" method="POST">
<input class="aut_reg_form_input" type="text" name="number" placeholder="1. Номер телефона" required>
<input class="aut_reg_form_input" type="password" name="pass" placeholder="2. Пароль" required>
<input class="aut_reg_form_input" type="password" name="verify_pass" placeholder="3. Повторите пароль" required>
<input class="aut_reg_form_input" type="text" name="Name" placeholder="4. Имя" required>
<input class="aut_reg_form_input" type="text" name="grandname" placeholder="5. Фамилия" required>
<input class="aut_reg_form_input" type="text" name="gor_ray" placeholder="6. Город и район" required>
<input class="aut_reg_form_input" type="text" name="adress" placeholder="7. Улица, дом ,квартира" required>
<input class="aut_reg_form_input" type="text" name="kap4a" placeholder="8. Введите капчу" required>
<img class="aut_reg_form_img" src="account/autor_registr/set/captcha.php" alt="kapcha">
<button class="aut_reg_form_button" name="reg_but">Зарегистрироваться</button>
<p class="aut_reg_form_error">
<?php
print_r($_SESSION['error_reg']);
unset($_SESSION['error_reg']);
?>
</p>
</form>
<!-- эксперементальные функции -->


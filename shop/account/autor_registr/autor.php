<?php 
if(isset($_SESSION['id'])){
	header("location: http://test.loc");
}
?>
<h2 class="aut_reg_h2">Авторизация</h2>
<form class="aut_reg_form" action="account/autor_registr/set/set_aut.php" method="POST">
<input class="aut_reg_form_input" name="number" type="text" placeholder="номер телефона" required>
<input class="aut_reg_form_input" name="pass" type="password" placeholder="пароль" required>
<input class="aut_reg_form_input" name="kap4a" type="text" placeholder="введите капчу" required>
<img class="aut_reg_form_img" src="account/autor_registr/set/captcha.php" alt="captcha">
<button class="aut_reg_form_button" name="aut_but">Зайти в аккаунт</button>
<p class="aut_reg_form_error">
<?php
print_r($_SESSION['error_reg']);
unset($_SESSION['error_reg']);
?>
</p>
</form>
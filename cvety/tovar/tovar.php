
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.down').click(function () {
		var $input = $(this).parent().find('input');
		var count = parseInt($input.val()) - 1;
		count = count < 1 ? 1 : count;
		$input.val(count);
		$input.change();
		return false;
	});
	$('.up').click(function () {
		var $input = $(this).parent().find('input');
		$input.val(parseInt($input.val()) + 1);
		$input.change();
		return false;
	});
});
</script>


<div id="autoriz">

<?php 
$Tovar = "SELECT * FROM `tovar`";/* Запрос по строке id из бд,  в (переменной=$id) */
    
        $res = mysqli_query($link, $Tovar);                  /* Переменная = соединение запроса и подключения */
        
        while ($stroka = mysqli_fetch_array($res))   /* Показать (переменная = ассоциативный массив(переменной)) */
        {

            echo '
<div id="block">
     <div id="image">
      <p>'.$stroka["Name_t"].'</p>
      <img src="/jpg/ball/falg_obychn/'.$stroka["Foto_t"].'" width="100px" height="100px"/>
     </div>
      <p>'.$stroka["cena_t"].'р.</p>';
            if(isset($_SESSION['id'])){
        echo '
          <form method="POST" action="/tovar/knopky/zakaz.php">
            <div class="amount">
              <span class="up">+</span>
              <input type="text" value="1" name="col"/>
              <span class="down">-</span>
            </div>

            <div id="knopka">
              <ul>
                <input type="hidden" value="'.$stroka['tovar_id'].'" name="id_tov"/>
                <input type="hidden" value="'.$stroka['cena_t'].'" name="cena_t"/>
                <input type="submit" name="knopka" value="" style="background:url(/jpg/home/korzina1.jpg);
                height: 50px; width: 50px; background-size: cover; border: 15px;"/>
              </ul>
            </div>';
            };
        echo '
           </form>
</div>
';
};

?>
</div>

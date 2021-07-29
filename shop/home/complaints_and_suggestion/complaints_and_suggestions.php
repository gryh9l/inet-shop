<?php 
$select_file = 'home/complaints_and_suggestion/complaints_and_suggestions.txt';
$select_content = unserialize(file_get_contents($select_file));
?>
<div class="div_compl_sugg">
<h2>Жалобы и предложения</h2>
<ul>
<?php
foreach($select_content as $key => $value){
	echo "<li>$key -> $value</li>";
}
?>
</ul>
<form id="form_compl_suggest" class="form_compl_sugg" action="home/complaints_and_suggestion/set_comp_sugg.php" method="POST">
	<input type="text" name="number" placeholder="Номер" required>
	<textarea name="text" rows="5" cols="26" placeholder="Текст жалобы или предложения" required></textarea>
	<input type="text" name="kap4a" placeholder="капча" required>
	<img src="account/autor_registr/set/captcha.php" alt="captcha">
	<button name="butt_sugg_compl">Добавить</button>
</form>
<p><?php 
printf($_SESSION['error']); 
unset($_SESSION['error']);?></p>
</div>

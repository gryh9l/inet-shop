<?php 
$check->file_content[$_SESSION['account']][$_SERVER['REMOTE_ADDR']]=['exit'=>1];
$check->file_content = serialize($check->file_content);
$file = fopen('account/autor_registr/set/users.txt', 'w'); 
fwrite($file,$check->file_content);
fclose($file);
unset($_SESSION['account']);
unset($_SESSION['id']);
header("location: http://shop.loc");
?>
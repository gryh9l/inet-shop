<?php 
session_start();
if(isset($_SESSION['id']))
{
    if (isset($_GET['close'])); 
    {       
        unset($_SESSION['id']);
    }
}
session_destroy();
header("Location: /index.php");
?>
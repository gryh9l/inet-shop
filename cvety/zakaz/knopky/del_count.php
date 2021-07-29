<?php 
session_start();
include '/home/paha/Site/cvety/connectdb.php';
$id_tov = $_POST['id'];
$count = $_POST['count'];
$cena = $_POST['cena'];

if(isset($_POST['count_minus'])){
       if($count > 1)
       {
       $count_minus = $count-1;
       $_SESSION['count1'] = $count_minus;
       $cena1=$cena*$count_minus;
       $link->query('UPDATE zakaz SET count_tovar='.$count_minus.' ,cena_z='.$cena1.' WHERE id_zakaz='.$id_tov.'');
       }
};

if(isset($_POST['count_plus']))
{
    $count_plus = $count+1;
    $cena1=$cena*$count_plus;
    $link->query('UPDATE zakaz SET count_tovar='.$count_plus.' ,cena_z='.$cena1.' WHERE id_zakaz='.$id_tov.'');
};
header("location:/index.php?go=orders");
?>
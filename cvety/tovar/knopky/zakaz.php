<?php 
session_start();
include '/home/paha/Site/cvety/connectdb.php';

if(isset($_POST['knopka']) || ($_SESSION['id'])) 
{

            $col = $_POST['col'];
            $cena = $_POST['cena_t'];
            $id_tov = $_POST['id_tov'];
            $id = $_SESSION['id'];
            
            $cena1=$cena*$col;
            
            $select = mysqli_query($link ,"SELECT * FROM `zakaz` WHERE
                 `tovar_tovar_id`='$id_tov' AND registr_id='$id'");
            $select1 = mysqli_fetch_array($select);
            if(empty($select1['id_zakaz']))
            {
                $link->query("INSERT INTO zakaz
                     (registr_id ,tovar_tovar_id ,cena_z ,count_tovar)
                     VALUES
                     ('$id','$id_tov','$cena1','$col')");
            }
            else 
            {
                $col1 = $select1['count_tovar']+$col;
                $cena1 = $select1['cena_z']+$cena1;
                
                $link->query('UPDATE zakaz SET cena_z='.$cena1.' ,count_tovar='.$col1.' WHERE
                     registr_id = '.$id.' AND tovar_tovar_id = '.$id_tov.'');
            }
}
header("location: /index.php?go=tovar");
?>


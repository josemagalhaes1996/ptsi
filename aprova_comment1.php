<?php
 include_once 'Funcoes_bd.php';
include_once 'mysql.connect.php';
ligar_base_dados();
 session_start();
 
    if(isset( $_SESSION['login'])){
    $login = $_SESSION['login'];
    $id=$_REQUEST['id'];
 
$query="UPDATE `gardencorporation`.`comentarios` SET `estado_comm` = 'Comentario Aprovado' WHERE `comentarios`.`num_comm` =$id;";
mysql_query($query);
     
header("location:aprova_comment.php");
//}else{
   echo "<script>history.go(-1)</script>";
    
}
?>
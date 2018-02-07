<?php
session_start();
include_once 'Funcoes_bd.php';
ligar_base_dados();
if (isset($_SESSION['login'])) {
    $login = $_SESSION['login'];
if(isset($_REQUEST['id'])){
    $numero = $_REQUEST['id'];
    if($numero==1){
    $query_update_moeda="UPDATE `gardencorporation`.`moeda` SET `tipo` = 'euro' WHERE `moeda`.`login_Uti` = '$login'; ";
    $sql_moeda=  mysql_query($query_update_moeda);
    
    }
    
    if($numero==2){
        $query_update_moeda="UPDATE `gardencorporation`.`moeda` SET `tipo` = 'dollar' WHERE `moeda`.`login_Uti` = '$login'; ";
    $sql_moeda=  mysql_query($query_update_moeda);
    }
            
}
  echo "<script>window.history.go(-1);</script>";
}
  ?>


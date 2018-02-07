<?php

include_once 'mysql.connect.php';
include_once 'funcoes_bd.php';
ligar_base_dados();
$id = $_REQUEST['id'];
$query = "DELETE FROM `gardencorporation`.`cliente` WHERE `cliente`.`login_Uti` ='$id'";
mysql_query($query);
$query2 = "DELETE FROM `gardencorporation`.`utilizador` WHERE `utilizador`.`login_Uti` ='$id'";
mysql_query($query2);
header("location:EditaCliente.php");
?>
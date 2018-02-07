<?php
        include_once 'mysql.connect.php';
        include_once 'Funcoes_bd.php';
        ligar_base_dados();
$id=$_REQUEST['id'];
echo "foi aqui";
$query="DELETE FROM `gardencorporation`.`funcionario` WHERE `funcionario`.`login_Uti` = '$id'";
mysql_query($query);
header('location:Edita_funcionario.php');
?>
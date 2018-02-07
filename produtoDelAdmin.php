<?php
        include_once 'mysql.connect.php';
        include_once 'Funcoes_bd.php';
        ligar_base_dados();
$id=$_REQUEST['id'];
$query="DELETE FROM `gardencorporation`.`produto` WHERE `produto`.`numero_produto` = $id";
mysql_query($query);
header("location:Edita_Produto_admin.php");
?>
<?php
include_once 'mysql.connect.php';
include_once 'Funcoes_bd.php';
 ligar_base_dados();
 session_start();

 $id=$_REQUEST['id'];
 $login = $_SESSION['login'];

$query="DELETE FROM carrinho_compras WHERE login_Uti = '$login' and numero_produto='$id'";
mysql_query($query);
header('location:carrinho.php');

?>
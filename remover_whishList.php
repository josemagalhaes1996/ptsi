<?php
include_once 'mysql.connect.php';
include_once 'Funcoes_bd.php';
 ligar_base_dados();

 $id=$_REQUEST['id'];
 $login = $_REQUEST['login'];

$query="DELETE FROM whishlist WHERE login_Uti = '$login' and numero_produto='$id'";
mysql_query($query);
header('location: http://localhost:9080/PhpProject3/wishList.php ');

?>
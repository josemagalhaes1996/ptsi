<?php
 include_once 'mysql.connect.php';
 include_once 'Funcoes_bd.php';
 ligar_base_dados();
$id=$_REQUEST['id'];

$query0 ="select * from devolucoes where numero_compra=$id";
$sql = mysql_query($query0);
if(mysql_num_rows($sql)>0){
   echo "<script>alert('Esta compra ja se encontra na devolucao. Aguarde aprovaçao, Obrigado')</script>";
   echo "<script>history.back(-1);</script>";
}else{

$query="INSERT INTO `gardencorporation`.`devolucoes` (`numero_compra`, `data`, `estado`) VALUES ($id, CURRENT_TIMESTAMP, 'Aguarda Aprovacao');";
$sql1 =mysql_query($query);
echo "<script>history.back(-1);</script>";
}
?>
<?php


 include_once 'mysql.connect.php';
 include_once 'Funcoes_bd.php';
 ligar_base_dados();
 session_start();
 $login = $_SESSION['login'];
$id=$_REQUEST['id'];
$query="UPDATE `gardencorporation`.`devolucoes` SET `estado` = 'Nao Aprovada' WHERE `devolucoes`.`numero_devolucao` = $id";
mysql_query($query);
//seleciona o numero de venda nesta devolucao
$query1 = "Select * from devolucoes where numero_devolucao='$id'";
$sql1 = mysql_query($query1);
while ($dado = mysql_fetch_array($sql1)) {
    $numero_venda = $dado['numero_compra'];
}
$query_busca = "Select * from compra where numero_compra = '$numero_venda'";
$sql_busca = mysql_query($query_busca);
$dado = mysql_fetch_array($sql_busca);
$cliente = $dado['login_Uti'];

$query_cli = "select * from cliente where login_Uti='$cliente'";
$sql_cli = mysql_query($query_cli);
$clientes = mysql_fetch_array($sql_cli);
$email = $clientes['email'];
$nome = $clientes['nome_cliente'];
$mensagem="A Empresa Garden Corporation vem por este meio informar o senhor/a "."$nome"."  que a devoluçao relativa à compra numero ".$id." foi Rejeitada.."."\r\n";

$mensagem.="Melhores Cumprimentos "."\r\n";
$mensagem.="Garden Corporation SA";


$header = 'MIME- Version: 1.1'."/r/n";
  $header .= 'Content-type: text/plain; charset=iso-8859-1'."\r\n";
 $header .= 'From:gardencorporationpw@gmail.com'."\r\n";//remetente
 $header .= 'Return-Path:a75409@alunos.uminho.pt'."\r\n";//recetor
 $envio = mail($email,'Devoluçao Rejeitada',$mensagem,$header);
 
 if($envio){
     echo "Mensagem enviada com sucesso";
 }else{
     echo "Mensagem nao pode ser enviada!";
 }



$query457="INSERT INTO `gardencorporation`.`auxiliar_compra` (`numero_compra`, `estado`, `login_func`, `data`) VALUES ('$numero_venda', 'devolucao rejeitada ', '$login', CURRENT_TIMESTAMP);";
$sql992=  mysql_query($query457);

header("location:aprova_devolucao.php");

?>
<?php
 include_once 'mysql.connect.php';
 include_once 'Funcoes_bd.php';
 ligar_base_dados();
  session_start();
if(isset( $_SESSION['login'])){
    $login = $_SESSION['login'];
$id=$_REQUEST['id'];
$query="UPDATE `gardencorporation`.`compra` SET `estado` = 'Em Tratamento' WHERE `compra`.`numero_compra` =$id;";
mysql_query($query);

$query2="INSERT INTO `gardencorporation`.`auxiliar_compra` (`numero_compra`, `estado`, `login_func`, `data`) VALUES ('$id', 'Compra Iniciada ', '$login', CURRENT_TIMESTAMP);";
$sql2=  mysql_query($query2);

$query_busca = "Select * from compra where numero_compra = '$id'";
$sql_busca = mysql_query($query_busca);
$dado = mysql_fetch_array($sql_busca);
$cliente = $dado['login_Uti'];

$query_cli = "select * from cliente where login_Uti='$cliente'";
$sql_cli = mysql_query($query_cli);
$clientes = mysql_fetch_array($sql_cli);
$email = $clientes['email'];
$nome = $clientes['nome_cliente'];
$mensagem="A Empresa Garden Corporation vem por este meio informar o senhor/a "."$nome"."  que se iniciou o tratamento da compra numero ".$id."\r\n";
$query_prod = " select * from linha_compra where n_compra ='$id'";
$sql_prod = mysql_query($query_prod);
while($prod = mysql_fetch_array($sql_prod)){
    $id_pro= $prod['numero_produto'];
    $quantidade =$prod['quantidade'];
$query_nome_pro="select * from produto where numero_produto='$id_pro' ";
$sql_busca_pro = mysql_query($query_nome_pro);
$nomepro= mysql_fetch_array($sql_busca_pro);
$nomeprod= $nomepro['nome_produto'];

$mensagem.="Nome Produto:"."$nomeprod"." com uma quantidade de ".$quantidade.","."\r\n" ;
        
}
$mensagem.="Melhores Cumprimentos "."\r\n";
$mensagem.="Garden Corporation SA";
$header = 'MIME- Version: 1.1'."/r/n";
 $header .= 'Content-type: text/plain; charset=iso-8859-1'."\r\n";
 $header .= 'From:gardencorporationpw@gmail.com'."\r\n";//remetente
 $header .= 'Return-Path:a75409@alunos.uminho.pt'."\r\n";//recetor
 $envio = mail($email,'Inicio Tratamento',$mensagem,$header);
 
 if($envio){
     echo "Mensagem enviada com sucesso";
 }else{
     echo "Mensagem nao pode ser enviada!";
 }





header("location:comecar_compra.php");
}else{
    echo "<script>history.go(-1)</script>";
    
}
?>
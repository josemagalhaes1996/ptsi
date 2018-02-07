<?php

include_once 'mysql.connect.php';
include_once 'Funcoes_bd.php';
session_start();
$login12 = $_SESSION['login'];
ligar_base_dados();

$id = $_REQUEST['id'];


//muda do estado da devolucao para aprovada
$query = "UPDATE `gardencorporation`.`devolucoes` SET `estado` = 'Aprovada' WHERE `devolucoes`.`numero_devolucao` = $id";
$sql = mysql_query($query);

//seleciona o numero de venda nesta devolucao
$query1 = "Select * from devolucoes where numero_devolucao='$id'";
$sql1 = mysql_query($query1);
while ($dado = mysql_fetch_array($sql1)) {
    $numero_venda = $dado['numero_compra'];
}
$query457 = "INSERT INTO `gardencorporation`.`auxiliar_compra` (`numero_compra`, `estado`, `login_func`, `data`) VALUES ('$numero_venda', 'Devolucao Aprovada', '$login12', CURRENT_TIMESTAMP);";
$sql992 = mysql_query($query457);
//seleciona a linha de compra de uma determinada venda
//para depois poder aumentar a qu
//antidade de produto
$query2 = "SELECT * from linha_compra where n_compra ='$numero_venda' ";
$sql2 = mysql_query($query2);
while ($dado1 = mysql_fetch_array($sql2)) {
    $numero_produto = $dado1['numero_produto'];
    $quantidade = $dado1['quantidade'];
    $query99 = "select * from produto where numero_produto='$numero_produto' ";
    $sql99 = mysql_query($query99);
    if (mysql_num_rows($sql99) > 0) {
        $dado3 = mysql_fetch_array($sql99);
        $quantidade_stock = $dado3['quantidade_produto'];
        $quantidade_final = $quantidade + $quantidade_stock;
        echo $quantidade_final;
        echo $numero_produto;
        $query3 = "UPDATE `gardencorporation`.`produto` SET `quantidade_produto` = '$quantidade_final' WHERE `produto`.`numero_produto` ='$numero_produto' ";
        $sql3 = mysql_query($query3);
    }
}

//seleciona a compra de um determinado cliente 
// sabe o login do cliente e o total da compra
$query4 = "select * from compra where numero_compra ='$numero_venda'";
$sql4 = mysql_query($query4);
$dado4 = mysql_fetch_array($sql4);
$cliente = $dado4['login_Uti'];
$total = $dado4['total_compra'];
$bonus_na_compra = $dado4['bonus_dev'];

//manda mail a dizer que aprovou a devoluçao 

$query_cli = "select * from cliente where login_Uti='$cliente'";
$sql_cli = mysql_query($query_cli);
$clientes = mysql_fetch_array($sql_cli);
$email = $clientes['email'];
$nome = $clientes['nome_cliente'];
$mensagem="A Empresa Garden Corporation vem por este meio informar o senhor/a "."$nome"."  que a devoluçao relativa à compra numero ".$id." foi aprovada."."\r\n";
$mensagem.="Detalhes:"."\r\n";
$query_prod = " select * from linha_compra where n_compra ='$numero_venda'";
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
 $envio = mail($email,'Devoluçao Aprovada',$mensagem,$header);
 
 if($envio){
     echo "Mensagem enviada com sucesso";
 }else{
     echo "Mensagem nao pode ser enviada!";
 }






//ve o bonus da empresa para depois poder retirar bonus ao cliente

$query5 = "select * from estatistica";
$sql5 = mysql_query($query5);
$dado5 = mysql_fetch_array($sql5);
$numero_bonus = $dado5['numero_bonus'];


$bonus_tirar = ($bonus_na_compra * $total) / 100;


$query6 = "select * from cliente where login_Uti= '$cliente'";
$sql6 = mysql_query($query6);
$dado6 = mysql_fetch_array($sql6);
$bonus = $dado6['bonus'];

$bonus_alterar = $bonus - $bonus_tirar;

$query7 = "UPDATE `gardencorporation`.`cliente` SET `bonus` = '$bonus_alterar' WHERE `cliente`.`login_Uti` = '$cliente'";
$sql7 = mysql_query($query7);


//agora vai adicionar o valor da compra a devolver a ficha de funcionario para creditar la 

$query10 = "select * from cliente where login_Uti= '$cliente'";
$sql10 = mysql_query($query10);
$dado7 = mysql_fetch_array($sql10);
$bonus1 = $dado7['bonus'];

//aqui ele vai debitar o total da compra, adicionando  o total da compra ao bonus
$bonus_debitar = $bonus1 + $total;

$query11 = "UPDATE `gardencorporation`.`cliente` SET `bonus` = '$bonus_debitar' WHERE `cliente`.`login_Uti` = '$cliente'";
$sql11 = mysql_query($query11);


$query12 = "UPDATE `gardencorporation`.`compra` SET `estado` = 'Devolvida' WHERE `compra`.`numero_compra` ='$numero_venda';";
$sql12 = mysql_query($query12);




header("location:aprova_devolucao.php");
?>
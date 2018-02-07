<?php

include_once 'mysql.connect.php';
include_once 'funcoes_bd.php';
ligar_base_dados();

$id = $_REQUEST['id'];
$query3 = "SELECT * FROM compra WHERE `compra`.`numero_compra` = '$id'";
$sql = mysql_query($query3);
$linha = mysql_fetch_array($sql);
$numero_compra = $linha['numero_compra'];
$tipoPagamento = $linha['tipo_pagamento'];
$estado = $linha['estado'];
$data = $linha['data'];

$query4 = "SELECT * FROM linha_compra WHERE `linha_compra`.`n_compra` = '$id'";
$sql2 = mysql_query($query4);
$row = mysql_num_rows($sql2);
if ($row > 0) {
    while ($linha2 = mysql_fetch_array($sql2)) {
        $n_compra = $linha2['n_compra'];
        $numero_produto = $linha2['numero_produto'];
        $quantidade = $linha2['quantidade'];

        $query5 = "SELECT* FROM `gardencorporation`.`produto` WHERE `produto`.`numero_produto` = '$numero_produto'";
        $sql3 = mysql_query($query5);
        $linha3 = mysql_fetch_array($sql3);
        $quantidade_atual = $linha3['quantidade_produto'];
        $quantidade_atualizada = $quantidade_atual + $quantidade;
        insere_quantidade($numero_produto, $quantidade_atualizada);
    }
}

$query = "DELETE FROM `gardencorporation`.`compra` WHERE `compra`.`numero_compra` = '$id'";
mysql_query($query);
$query2 = "DELETE FROM `gardencorporation`.`linha_compra` WHERE `linha_compra`.`n_compra` = '$id'";
mysql_query($query2);

header("location:ListarCompras_AguardaPagamento.php");
?>
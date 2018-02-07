<?php

include_once 'Funcoes_bd.php';
include_once 'mysql.connect.php';
ligar_base_dados();
if (isset($_REQUEST['acao'])) {
    $numero = $_REQUEST['numero_produto'];
    $quantidade_introduzida = $_REQUEST['quantidade'];
    $query = "SELECT* FROM `gardencorporation`.`produto` WHERE `produto`.`numero_produto` = $numero";
    $sql = mysql_query($query);
    while ($linha = mysql_fetch_array($sql)) {
        $quantidade = $linha['quantidade_produto'];
        $quantidade_total = $quantidade + $quantidade_introduzida;
        $nproduto = $linha['nome_produto'];
        insere_quantidade($numero, $quantidade_total);


        $query1 = "SELECT * from whishlist where numero_produto='$numero'";
        $sql1 = mysql_query($query1);
        if (mysql_num_rows($sql1) > 0) {
            while ($dado = mysql_fetch_array($sql1)) {
                $cliente = $dado['login_Uti'];

                $query_cli = "select * from cliente where login_Uti='$cliente'";
                $sql_cli = mysql_query($query_cli);
                $clientes = mysql_fetch_array($sql_cli);
                $email = $clientes['email'];
                $nome = $clientes['nome_cliente'];
                $mensagem = "A Empresa Garden Corporation vem por este meio informar o senhor/a " . "$nome" . "  que o produto " . $nproduto . " ja se encontra em stock" . "\r\n";
                
                $mensagem.="Melhores Cumprimentos " . "\r\n";
                $mensagem.="Garden Corporation SA";




                $header = 'MIME- Version: 1.1' . "/r/n";
                $header .= 'Content-type: text/plain; charset=iso-8859-1' . "\r\n";
                $header .= 'From:gardencorporationpw@gmail.com' . "\r\n"; //remetente
                $header .= 'Return-Path:a75409@alunos.uminho.pt' . "\r\n"; //recetor
                $envio = mail($email, 'Produto Disponivel', $mensagem, $header);

                if ($envio) {
                    echo "Mensagem enviada com sucesso";
                } else {
                    echo "Mensagem nao pode ser enviada!";
                }
            }
        }
    }
}
echo "<script> history.go(-1)</script>";
?>

<?php
include_once 'Funcoes_bd.php';
include_once 'mysql.connect.php';
ligar_base_dados();
include_once 'headerCli.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Resumo de Compras</title>
 <?php
                 $query_css="select * from css where login_Uti='$login'";
                 $sql_css = mysql_query($query_css);
                 if(mysql_num_rows($sql_css)>0){
                     $css=  mysql_fetch_array($sql_css);
                     $mainPage=$css['Rproduto'];
                 
                     ?><link rel="stylesheet" type="text/css" href="<?php echo $mainPage; ?>" /><?php
                 }else{
                 $css_insert ="INSERT INTO `gardencorporation`.`css` (`mainPage`, `Rproduto`, `Ines`, `login_Uti`) VALUES ('css_original/MainPage.css', 'css_original/Rproduto.css', 'css_original/Ines.css', '$login');";
               $sql_insert=  mysql_query($css_insert);
?>
            <link rel="stylesheet" type="text/css" href="css_original/mainPage.css" />   
           <?php             
}
                 
            
            ?>
        <script type="text/javascript" src="RegistoProduto.js"></script>
        <meta charset="UTF-8">
    </head>

    <body>
        <div id="mainbody">
        <div id="novosprodutosbar">
            <h3 class="bar-title" style="padding:0.5%;">Resumo de Compra</h3>
        </div>
            <div id="abaixo_pag">
               
                <div>
                    <table id="tabela_carrinho1" >
                        <tr>
                            <th width="36%" ><div align="center">PRODUTO</div></th>
                        <th width="22%" scope="col"><div>PREÇO</div></th>
                        <th width="13%" scope="col"><div>QUANTIDADE</div></th>
                        <th width="14%" scope="col"><div>SUBTOTAL</div></th>


                        </tr>

                        <?php
//seleciona o carrinho do utilizador logado
                        $query4 = "SELECT * FROM carrinho_compras WHERE  login_Uti='$login'";
//executa a query
                        $sql4 = mysql_query($query4);
                        $qtd_meu_carrinho = mysql_num_rows($sql4);

                        if ($qtd_meu_carrinho > 0) {
                            $soma_carrinho = 0;
                            while ($dados = mysql_fetch_assoc($sql4)) {
                                //ir buscar o preco do produto
                                $numero_produto = $dados['numero_produto'];
                                //vai a tabela de produtos e seleciona o produto que contem na tabela

                                $query5 = "SELECT * FROM `produto` WHERE numero_produto = '$numero_produto'";
                                $sql5 = mysql_query($query5);
                                $linha = mysql_fetch_array($sql5);
                                //tira o preco e a quantidade em stock
                                $preco = $linha['preco'];
                                $quantidade_stock = $linha['quantidade_produto'];

                                $nome_produto = $linha['nome_produto'];
                                $quantidade = $dados['quantidade'];
                                $soma_carrinho += ($preco * $quantidade);
                                $subtotal = $preco * $quantidade;
                                ?>
                                <tr>

                                    <td><span style="font-weight: bold;">
                                            <?php echo $nome_produto; ?>
                                        </span></td>
                                    <?php
                                    ?>
                                    <td><div align="center" ><?= $preco ?></div></td>
                                    <td><div align="center" ><?php echo $quantidade ?></div></td>
                                    <td><div align="center" ><?php echo $subtotal; ?></div></td>
                                </tr>
        <?php
    }
}else{
     echo "<script>window.open('mainPageCli.php')</script>";
                    echo "<script>window.close()</script>"; 
}
?>


                    </table>
                    <p style="color:red">AVISO:</p> Se o valor do cheque oferta for maior que o valor da compra a Garden Corporation nao efectua devoluçao de dinheiro
                    <br>

                    <strong>Forma de Pagamento :</strong> Cheque Oferta:<br>
                    <strong> Cliente :</strong> <?php echo $login ?>
                    <br><br><br>
                    <form method="post" action="confirm_compra_CO.php" >
                        <label> <strong>Introduza o codigo do Cheque Oferta:</strong></label> <br>
                        <input type="text" required name="codigo">
                        <input  type="submit" value="Confirmar Compra">
                        <input type="button" onclick="window.open('carrinho.php'); window.close();"  value="Voltar">
                        </form>
                </div>
<?php
if (isset($_REQUEST['codigo'])) {
    $codigo = $_REQUEST['codigo'];
   

    $query675 = "SELECT * from chequeoferta where cod_cheque='$codigo' ";
    $sql1 = mysql_query($query675);
    if (mysql_num_rows($sql1) > 0) {
       
        $dado1 = mysql_fetch_array($sql1);
        $estado = $dado1['estado'];
        $valor = $dado1['valor'];
        $numero_cheque = $dado1['numero_cheque'];
       
        if ($estado == "disponivel") {

            $query43 = "SELECT * FROM cliente where login_Uti='$login'";

            $sql43 = mysql_query($query43);
            if (mysql_num_rows($sql43) > 0) {
                $cli = mysql_fetch_array($sql43);
                $bonus_cli = $cli['bonus'];
            }

            $query4 = "SELECT * FROM carrinho_compras WHERE  login_Uti='$login'";
//executa a query
            $sql4 = mysql_query($query4);
            $qtd_meu_carrinho = mysql_num_rows($sql4);

            if ($qtd_meu_carrinho > 0) {
                $soma_carrinho = 0;
                // dados  e referente ao carrinho
                while ($dados = mysql_fetch_assoc($sql4)) {
                    //ir buscar o preco do produto
                    $numero_produto = $dados['numero_produto'];
                    //vai a tabela de produtos e seleciona o produto que contem na tabela

                    $query5 = "SELECT * FROM `produto` WHERE numero_produto = '$numero_produto'";
                    $sql5 = mysql_query($query5);
                    $linha = mysql_fetch_array($sql5);
                    //tira o preco e a quantidade em stock
                    //linha e referente ao produto
                    $preco = $linha['preco'];
                    //quantidade de stock que tem um produto do carrinho
                    $quantidade_stock = $linha['quantidade_produto'];

                    $nome_produto = $linha['nome_produto'];
                    //quabtidade que queremos comprar
                    $quantidade = $dados['quantidade'];

                    $soma_carrinho += ($preco * $quantidade);
                    $subtotal = $preco * $quantidade;
                }
            } else {


                echo "<script>alert('Nao tem nenhum produto para comprar')</script>";
                echo "<script>window.open('mainPageCli.php')</script>";
                    echo "<script>window.close()</script>"; 
            }

            if ($valor < $soma_carrinho) {
                echo "<script>alert('Cheque Nao cobre a totalidade da compra')</script>";
            } else {

                $cliente = $login;
                $pagamento = 3;
$query34 = "SELECT * from estatistica";
                $sql45 = mysql_query($query34);
                if (mysql_num_rows($sql45) > 0) {
                    while ($dado1 = mysql_fetch_array($sql45)) {
                        $bonus_compra = $dado1['numero_bonus'];
                    }
                }
                //insere compra
                $query6 = "INSERT INTO `gardencorporation`.`compra` (`numero_compra`, `login_Uti`, `tipo_pagamento`, `estado`, `data`, `total_compra`,`bonus_dev` ) VALUES (NULL, '$login', '$pagamento', 'Aguarda Pagamento', CURRENT_TIMESTAMP, '$soma_carrinho', '$bonus_compra');";
                $sql6 = mysql_query($query6);

                //tira o numeo da ultima compra inserida
                $query7 = "SELECT * FROM compra ORDER BY numero_compra DESC LIMIT 1";
                $sql7 = mysql_query($query7);
                $dado = mysql_fetch_array($sql7);
                $numero = $dado['numero_compra'];


                //parte de acrescentar na linha de fatura
                $query4 = "SELECT * FROM carrinho_compras WHERE  login_Uti='$login'";
                //executa a query
                $sql4 = mysql_query($query4);
                $qtd_meu_carrinho = mysql_num_rows($sql4);

                if ($qtd_meu_carrinho > 0) {

                    //produtos todo no carrinho
                    while ($dados = mysql_fetch_assoc($sql4)) {
                        //ir buscar o preco do produto
                        $numero_produto = $dados['numero_produto'];
                        //vai a tabela de produtos e seleciona o produto que contem na tabela
                        $query5 = "SELECT * FROM `produto` WHERE numero_produto = '$numero_produto'";
                        $sql5 = mysql_query($query5);
                        $linha = mysql_fetch_array($sql5);
                        //quantidade de stock que o produto tem
                        $quantidade_stock = $linha['quantidade_produto']; //stock que tem
                        //quantidades que compraste
                        $quantidade = $dados['quantidade']; //que comprou

                        $quantidade_final = $quantidade_stock - $quantidade;
                        //update a tabela do produto
                        $query8 = "UPDATE `gardencorporation`.`produto` SET `quantidade_produto` = '$quantidade_final' WHERE `produto`.`numero_produto` = '$numero_produto';";
                        $sql8 = mysql_query($query8);


                        $query10 = "INSERT INTO `gardencorporation`.`linha_compra` (`n_compra`, `numero_produto`, `quantidade`) VALUES ('$numero', '$numero_produto', '$quantidade');";
                        $sql10 = mysql_query($query10);

                        //vai apagar o carrinho agora
                    }

                    $query22 = "SELECT * FROM carrinho_compras WHERE  login_Uti='$login'";
                    //executa a query
                    $sql44 = mysql_query($query22);


                    //produtos todo no carrinho

                    while ($da = mysql_fetch_assoc($sql44)) {
                        $rows = mysql_num_rows($sql44);
                        if ($rows > 0) {
                            $num = $da['numero_produto'];
                            $query_ultima = "DELETE FROM `gardencorporation`.`carrinho_compras` WHERE numero_produto = '$num' ";
                            $sql_ultima = mysql_query($query_ultima);
                        }
                    }
                }

                // saber qual a percentagem de bonus
                $query34 = "SELECT * from estatistica";
                $sql45 = mysql_query($query34);
                if (mysql_num_rows($sql45) > 0) {
                    while ($dado1 = mysql_fetch_array($sql45)) {
                        $bonus_compra = $dado1['numero_bonus'];
                    }
                }

                //bonus a adicionar
                //ja tiramos o bonus la em cima
                $bonus_adicionar = ($bonus_compra * $soma_carrinho) / 100;
                $bonus_total = $bonus_adicionar + $bonus_cli;

                $query65 = "UPDATE `gardencorporation`.`cliente` SET `bonus` = '$bonus_total' WHERE `cliente`.`login_Uti` = '$login'";
                $sql65 = mysql_query($query65);

                $query22 = "UPDATE `gardencorporation`.`chequeoferta` SET `estado` = 'indisponivel' WHERE `chequeoferta`.`numero_cheque` ='$numero_cheque' ;";
                $sql22 = mysql_query($query22);

                echo "<script>alert('Compra realizada com  sucesso')</script>";
                echo "<script>window.open('mainPageCli.php')</script>";
                    echo "<script>window.close()</script>"; 
                
                    }
        } else {
            echo "<script>alert('Este codigo ja foi utilizado')</script>";
        }
    }else{
         echo "<script>alert('Nao existe este codigo!')</script>";
    }
}
?>
            </div>
        </div>
        <br> 
        <?php 
include 'footer.php';
include 'footersimple.php';

?>

    </body>
</html>
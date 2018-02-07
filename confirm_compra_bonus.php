<?php
include_once 'Funcoes_bd.php';
include_once 'mysql.connect.php';
ligar_base_dados();
include_once 'headerCli.php';
if (isset($_REQUEST['cod']) || isset($_REQUEST['enviado'])) {
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>Confirmaçao compra</title>
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

                    <h3 class="bar-title" style="padding: 0.5%;">Resumo de Compra</h3>
                </div>
                <!--Quando clicar em submter vai fazer a inserçao da venda -->
                <div id="abaixo_pag">
                    <p style="margin-left: 5%; color: red;"> Confirme os produtos e as quantidades que realmente deseja comprar </p>
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
                            // a partir daqui vai fazer codigo para ele ver o que comprou como uma confirmaçao
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
                                        <?php ?>
                                        <td><div align="center" ><?= $preco ?></div></td>
                                        <td><div align="center" ><?php echo $quantidade ?></div></td>
                                        <td><div align="center" ><?php echo $subtotal; ?></div></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>



                        </table>
                        <form action="confirm_compra_bonus.php" method="post">
                            <input type="hidden" name ="enviado" value="enviado" >
                            <input id="tentativa_button" type="submit" value="Confirmar Venda">
                        </form>
                        <button id="button_referencia1" type="button" onclick="window.open('compra.php');
                                    window.close();"> Voltar Escolher Metodo</button>    
                        <br>

                        <strong>Forma de Pagamento :</strong> Bonus do Cliente <br>
                        <strong> Cliente :</strong> <?php echo $login ?>
                        <br>

                        <?php
                        if (isset($_REQUEST['enviado'])) {

                            $cliente = $login;
                            $pagamento = 2;
                            $query34 = "SELECT * from estatistica";
                            $sql45 = mysql_query($query34);
                            if (mysql_num_rows($sql45) > 0) {
                                while ($dado1 = mysql_fetch_array($sql45)) {
                                    $bonus_compra = $dado1['numero_bonus'];
                                }
                            }

                            $query6 = "INSERT INTO `gardencorporation`.`compra` (`numero_compra`, `login_Uti`, `tipo_pagamento`, `estado`, `data`, `total_compra`, `bonus_dev`) VALUES (NULL, '$login', '$pagamento', 'Em Tratamento', CURRENT_TIMESTAMP, '$soma_carrinho' , '$bonus_compra');";
                            $sql6 = mysql_query($query6);

                            //vai buscar a ultima venda adicionada para inserir na linha de compra
                            $query7 = "SELECT * FROM compra ORDER BY numero_compra DESC LIMIT 1";
                            $sql7 = mysql_query($query7);
                            $dado = mysql_fetch_array($sql7);
                            $numero = $dado['numero_compra'];



                            //parte de acrescentar na linha de fatura
                            //passa todos os produtos que tem no carrinho desse cliente para a linha de compra
                            $query4 = "SELECT * FROM carrinho_compras WHERE  login_Uti='$login'";
                            //executa a query
                            $sql4 = mysql_query($query4);
                            $qtd_meu_carrinho = mysql_num_rows($sql4);
                            if ($qtd_meu_carrinho > 0) {

                                //produtos todo no carrinho
                                while ($dados = mysql_fetch_assoc($sql4)) {
                                    //ir buscar o preco do produto
                                    $numero_produtoa = $dados['numero_produto'];
                                    //vai a tabela de produtos e seleciona o produto que contem na tabela

                                    $query5 = "SELECT * FROM `produto` WHERE numero_produto = '$numero_produtoa'";
                                    $sql5 = mysql_query($query5);
                                    $linha = mysql_fetch_array($sql5);
                                    $quantidade_stock = $linha['quantidade_produto']; //stock que tem
                                    $quantidade1 = $dados['quantidade']; //que comprou
                                    $quantidade_final = $quantidade_stock - $quantidade1;


                                    //update a tabela do produto para por as quantidades direitas 
                                    $query8 = "UPDATE `gardencorporation`.`produto` SET `quantidade_produto` = '$quantidade_final' WHERE `produto`.`numero_produto` = '$numero_produto';";
                                    $sql8 = mysql_query($query8);


                                    $query10 = "INSERT INTO `gardencorporation`.`linha_compra` (`n_compra`, `numero_produto`, `quantidade`) VALUES ('$numero', '$numero_produtoa', '$quantidade1');";
                                    $sql10 = mysql_query($query10);
                                }
                                //vai apagar o carrinho agora porque ja passou todos os produtos para a linha de fatura
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
                            //vai tirar ao bonus o valor da compra como vai pagar pelo bonus
                            $query77 = "SELECT * from cliente where login_Uti='$login'";
                            $sql77 = mysql_query($query77);
                            if (mysql_num_rows($sql77) > 0) {
                                while ($dado77 = mysql_fetch_array($sql77)) {
                                    $bonus = $dado77['bonus'];
                                    $bonus_final = $bonus - $soma_carrinho;

                                    $query78 = "UPDATE `gardencorporation`.`cliente` SET `bonus` = '$bonus_final' WHERE `cliente`.`login_Uti` = '$login'";
                                    $sql78 = mysql_query($query78);
                                }
                            }



                            echo "<script>alert('Compra realizada com sucesso')</script>";
                            echo "<script>window.open('mainPageCli.php');window.close();</script>";
                        }
                        ?>
                    </div>

                </div>
            </div><br>
            <?php
                        include 'footer.php';
                                                include 'footersimple.php';

                        } else {
            echo "<script>alert('Escolha o metodo de pagamento')</script>";
            header('location:carrinho.php');
        }
        ?>

    </body>
</html>
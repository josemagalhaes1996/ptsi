<?php
include 'headerCli.php';
include_once 'Funcoes_bd.php';
include_once 'mysql.connect.php';
ligar_base_dados();
if(isset($_GET['id'])){
 
            $query43 = "SELECT * FROM cliente where login_Uti='$login'";
            $sql43 = mysql_query($query43);
            if (mysql_num_rows($sql43) > 0) {
                $cli = mysql_fetch_array($sql43);
                $morada = $cli['morada'];
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
                
            $cliente = $login;
            $pagamento = 4;


            $query6 = "INSERT INTO `gardencorporation`.`compra` (`numero_compra`, `login_Uti`, `tipo_pagamento`, `estado`, `data`, `total_compra` ,`bonus_dev`) VALUES (NULL, '$login', '$pagamento', 'Em Tratamento', CURRENT_TIMESTAMP, '$soma_carrinho' , '$bonus_compra');";
            $sql6 = mysql_query($query6);

            $query7 = "SELECT * FROM compra ORDER BY numero_compra DESC LIMIT 1";
            $sql7 = mysql_query($query7);

            
            $dado = mysql_fetch_array($sql7);
            $numero = $dado['numero_compra'];
            
            // echo $numero;
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
           // echo "<script>alert('Compra realizada com  sucesso')</script>";

           // echo "<script>window.open('mainPageCli.php');window.close();</script>";
        }else {

            header('location:mainPageCli.php');
            }
            ?>

     


<html>
    <head> 
        <title> Garden Corporation </title>
        <link rel="stylesheet" type="text/css" href="mainPage.css" />
        <meta charset="UTF-8"/>
        <link rel="shortcut icon" href="gardenlogo.png" type="image/x-icon"/>
    </head>

    <body>

        <div id="mainbodymp">
            <!-- <div id="slider">
             </div> -->
            <div id="novosprodutosbar">
                <h3 class="bar-title">Pagamento Com sucesso</h3>
                  
                    
            </div>
            <div id="abaixo_pag">
                Parabens senhor/a <?= $login ?> pela compra efectuada !!!<br>
                  <a href="mainPageCli.php"> Voltar Pagina Principal </a>
                
            </div>
        
        </div>
        <?php 
        include 'footer.php';
        ?>
    </body>
</html>
<?php }else{
    header('location:mainPageCli.php');
    
    }?>
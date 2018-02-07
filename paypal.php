<?php
include 'headerCli.php';
include_once 'Funcoes_bd.php';
include_once 'mysql.connect.php';
ligar_base_dados();

$query4 = "SELECT * FROM carrinho_compras WHERE  login_Uti='$login'";
//executa a query
$sql4 = mysql_query($query4);
$qtd_meu_carrinho = mysql_num_rows($sql4);

if ($qtd_meu_carrinho > 0) {
   
?>







<html>
    <head> 
        <title> Garden Corporation </title>
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
        <meta charset="UTF-8"/>
        <link rel="shortcut icon" href="gardenlogo.png" type="image/x-icon"/>
    </head>

    <body>

        <div id="mainbodymp">
            <!-- <div id="slider">
             </div> -->
            <div id="novosprodutosbar">
                <h3 class="bar-title" style="padding: 0.5%;">Pagamento Paypal</h3>
            </div>
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
                        }
                        ?>



                    </table>
                    <br>
                    <br>
                    <!-- Specify details about the item that buyers will purchase. -->

                    <div style="margin-left: 30%;">
                        <form   target="paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" onsubmit="setTimeout('window.close()',10000); ">

                        <!-- Identify your business so that you can collect the payments. -->
                        <input type="hidden" name="business" value="josemagalhaes1996@gmail.com">

                        <!-- Specify a PayPal Shopping Cart Add to Cart button. -->
                        <input type="hidden" name="cmd" value="_cart">
                        
                        <input type="hidden" name="upload" value="1">
                        <?php
                        
                        $query4 = "SELECT * FROM carrinho_compras WHERE  login_Uti='$login'";
                        $sql4 = mysql_query($query4);
                        $qtd_meu_carrinho = mysql_num_rows($sql4);

                        if ($qtd_meu_carrinho > 0) {
                            $soma_carrinho = 0;
                            $total = 1 ;
                            while ($dados = mysql_fetch_assoc($sql4)) {
                                //ir buscar o preco do produto
                                $numero_produto = $dados['numero_produto'];
                                //vai a tabela de produtos e seleciona o produto que contem na tabela
                                $query5 = "SELECT * FROM `produto` WHERE numero_produto = '$numero_produto'";
                                $sql5 = mysql_query($query5);
                                $linha = mysql_fetch_array($sql5);
                                //tira o preco e a quantidade em stock
                                $preco = $linha['preco'];
                                $quantidade =$dados['quantidade'];
                                $nome_produto = $linha['nome_produto'];
                                $subtotal = $preco * $quantidade;
                                ?>
                               
                                <input type="hidden" name="item_number_<?php echo $total ?>" value="<?= $numero_produto ?>">
                                <input type="hidden" name="item_name_<?php echo $total ?>" value="<?= $nome_produto ?>">
                                <input type="hidden" name="amount_<?php echo $total ?>" value="<?= $preco ?>" >
                                <input type="hidden" name="quantity_<?php echo $total ?>" value="<?= $quantidade ?>"
                                <input type="hidden" name="currency_code" value="EUR">
                                    <?php 
                        $total++;
                            }
                        
                            }?>


                               <input type="hidden" name="return" value="http://localhost:9080/PhpProject3/success.php?id=2" >
                               <input type="hidden" name="cancel_return" value="http://localhost:9080/PhpProject3/paypal_cancel.php"/>
                                


                                <!-- Display the payment button. -->
                                
                                <input type="image" name="submit" 
                                       <img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/buy-logo-large.png" alt="Buy now with PayPal" 
                                        width="600" height="125" >
                                <img alt="" border="0" width="1" height="1"
                                     src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif"  style="text-align: center;">
                            </form>
                    </div>
                </div>

            </div>
        </div>
            <?php 
            
include 'footer.php';
include 'footersimple.php';


                            }else{
    
    header('location:mainPageCli.php');
}
            ?>
    </body>
</html>




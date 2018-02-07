<?php
include_once 'Funcoes_bd.php';
include_once 'mysql.connect.php';
ligar_base_dados();
include_once 'headerCli.php';
if(isset($_REQUEST['cod'])){
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
                     <button id="button_referencia" type="submit" onclick="window.open('ultima_multibanco.php'); window.close();">Gerar Referencia</button>       
                    </div>
                   
                    <strong>Forma de Pagamento :</strong> Multibanco <br>
                    <strong> Cliente :</strong> <?php echo $login ?>
                </div>

            </div>
        <br>
        
       
    <?php
                    include 'footer.php';
                                        include 'footersimple.php';

                    
                            }else{
     echo "<script>alert('Escolha o metodo de pagamento')</script>";
     header('location:carrinho.php');
}
    ?>
</body>
</html>
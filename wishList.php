<?php
// Iniciamos nossa sessão que vai indicar o usuário pela session_id

include_once 'Funcoes_bd.php';
ligar_base_dados();
include_once 'headerCli.php';
// Recuperamos os valores passados por parametros
//temos de ter quem esta logado
if (isset($_GET['cod'])) {
    $cod = $_GET['cod'];

    if (isset($_GET['acao'])) {
        $acao = $_GET['acao'];
    }

    // Verificamos se o produto referente ao $cod já está no carrinho para o session id correnpondente

    $query1 = "SELECT * FROM whishlist WHERE numero_produto= $cod  AND login_Uti= '$login'";
    $carrinho = mysql_query($query1);
    $linha_carrinho = mysql_fetch_assoc($carrinho);

    $total_produto = mysql_num_rows($carrinho);

    //se for 0, e porque este produto ainda nao esta no carrinho
    if ($total_produto == 0) {
        // pomos o produto no carrinho , verificar se existe na tabela de produtos

        $query2 = "select * from produto where numero_produto=$cod";
        $produto = mysql_query($query2);

        $numero_linhas = mysql_num_rows($produto);


        // Se total for maior que zero esse produto existe e então podemos incluir no carrinho
        if ($numero_linhas > 0) {
            $linha = mysql_fetch_assoc($produto);

            // Incluimos o produto selecionado no carrinho de compras
            // passamos os parametros do produto
            $numero = $linha['numero_produto'];

            $cliente = $login;
            $query3 = "INSERT INTO whishlist VALUES ('$login', $cod, '1','indisponivel' );";
            $sql3 = mysql_query($query3);
        }
     
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Whish List</title>
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
        <div id="mainbodymp">
        <div id="novosprodutosbar" >
            <h3 class="bar-title" style="padding: 0.5%;">WishList</h3>
        </div>
        
            <div id="abaixo_pag"></div>
            <p style="color:red ; text-align: center;">AVISO:</p>
            <p style="margin-left: 10%;">Aqui encontram-se todos os produtos  que deseja que nao contêm stock na GardenCorporation, uma vez que passarem a disponiveis , recebera um email e podera inseri-los no carrinho </p> 
               
            <?php 
              $query4 = "SELECT * FROM whishlist WHERE  login_Uti='$login'";
//executa a query
                        $sql4 = mysql_query($query4);
                        $qtd_meu_carrinho = mysql_num_rows($sql4);

                        if ($qtd_meu_carrinho > 0) {  
                ?>
                <form action="wishList.php" method="post">
                    <input type="hidden" name ="wish" value="enviado">
                    <div id="scroll_tabela_ines">
                    <table id="tabela_carrinho1" >
                        <tr>
                            <th>IMAGEM </th>
                            <th width="36%" ><div align="center">PRODUTO</div></th>
                        <th width="22%" scope="col"><div>PREÇO</div></th>
                        <th width="13%" scope="col"><div>QUANTIDADE</div></th>

                        <th width="36%" scope="col"><div>REMOVER</div></th>
                        <th width="36%" scope="col"><div>ESTADO</div></th>

                        </tr>

                        <?php
//seleciona o carrinho do utilizador logado
                        $query4 = "SELECT * FROM whishlist WHERE  login_Uti='$login'";
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
                                $nome_produto = $linha['nome_produto'];
                                $quantidade_stock = $linha['quantidade_produto'];
                                $imagem = $linha['imagem'];

                                if ($quantidade_stock <= 0) {
                                    $disponibildiade = "indisponivel";
                                } else {
                                    $disponibildiade = "disponivel";
                                    $query10="UPDATE `gardencorporation`.`whishlist` SET `estado` = 'disponivel' WHERE `whishlist`.`login_Uti` = '$login' AND `whishlist`.`numero_produto` = $numero_produto;";
                                    $sql10= mysql_query($query10);
                                    
                                }
                                ?>
                                <tr>
                                        <td><div align="center" ><img src="<?php echo $imagem ?>" width="80" height="60"  alt="Imagem produto"></div></td>

                                    <td><span style="font-weight: bold;">
                                            <?php echo $nome_produto; ?>
                                        </span></td>
                                    <?php
                                    /*
                                      o name igual a qtd que é um array de todas as quantidades , associadas ao numero de produto
                                      com os valores da quantidades dos produtos que iremos modificar e como esse campo  é comum a todos os produtos
                                      então  usamos um array com os campos  chave dos produtos.
                                     */
                                    ?>
                                    <td><div align="center" ><?= $preco ?> €</div></td>
                                    <td><div align="center" ><input type="text" style="text-align: center;" name="qtd[<?php echo $numero_produto ?>]" value="<?php echo "1"; ?> " disabled /></div></td>

                                    <?php //remove da whishList ?>
                                    <td ><div align="center"><a style="color:red;"  href="remover_whishList.php?id=<?php echo $numero_produto ?>&login=<?php echo $login ?>">Remover da wishList</a></div></td>
                                    <td ><div align="center"><?php echo $disponibildiade; ?></div></td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo"Nao tem nenhum produto na Whish List";
                        }
                       
                        ?>


                    </table>
                    </div>
                    

            <div id='Voltar_comprar_whish'>
                <input type="submit" name ="continua_compra" onclick="window.close();" value ="Continuar a Comprar" >
            </div>
             <div id='Submit_whish'>
                <input type="submit" name ="submeter_carrinho"  value ="Introduzir no carrinho" >
            </div>     
        
        
                    <br>
                    <br>
                    <br>
                    
</form>
               
        <?php
         }else{
            echo"Nao tem nenhum produto na Whish List";
                        }
        if (isset($_REQUEST['wish'])) {
           
            $query4 = "SELECT * FROM whishlist WHERE  login_Uti='$login'";
//executa a query
            $sql4 = mysql_query($query4);
            $qtd_meu_carrinho = mysql_num_rows($sql4);
            
            if ($qtd_meu_carrinho > 0) {
               
                while ($dados = mysql_fetch_assoc($sql4)) {
                    
                    $numero_produto = $dados['numero_produto'];
                    
                    $estado = $dados['estado'];
                    
                    if ($estado == "disponivel") {
                       
                        
            $query1 = "SELECT * FROM carrinho_compras WHERE numero_produto= '$numero_produto'  AND login_Uti= '$login'";
            $carrinho = mysql_query($query1);
            $linha_carrinho = mysql_fetch_assoc($carrinho);
            $total_produto = mysql_num_rows($carrinho);

    //se for 0, e porque este produto ainda nao esta no carrinho
    if ($total_produto == 0) {
        // pomos o produto no carrinho , verificar se existe na tabela de produtos

        $query2 = "select * from produto where numero_produto='$numero_produto'";
        $produto = mysql_query($query2);

        $numero_linhas = mysql_num_rows($produto);


        // Se total for maior que zero esse produto existe e então podemos incluir no carrinho
        if ($numero_linhas > 0) {
            $linha = mysql_fetch_assoc($produto);

            // Incluimos o produto selecionado no carrinho de compras
            // passamos os parametros do produto
            $numero = $linha['numero_produto'];
            
            $cliente = $login;
            $query3 = "INSERT INTO `gardencorporation`.`carrinho_compras` (`login_Uti`, `numero_produto`, `quantidade`) VALUES ('$login', $numero, '1')";
            $sql3 = mysql_query($query3);
        }
        //se o produto ja existir , aumenta 1 quantidade ao produto que adicionou ao carrinho
    } else {
        $quantidade = $linha_carrinho['quantidade'];
       $quantidade= $quantidade + 1 ; //adiciona uma quantidade
       
       $query7 ="UPDATE `gardencorporation`.`carrinho_compras` SET `quantidade` = '$quantidade' WHERE `carrinho_compras`.`login_Uti` = '$login' AND `carrinho_compras`.`numero_produto` = $cod; ";
      $rs_modifica = mysql_query($query7);
        
       
        }
                $query_ultima = "DELETE FROM whishlist WHERE numero_produto = '$numero_produto' ";
                            $sql_ultima = mysql_query($query_ultima);
                        
                    }
                }
            }
        }
        ?>
            </div>
            </div>
    
        <?php
        include_once 'footer.php';
        include_once 'footersimple.php';
        ?>
 
</body>
</html>

<?php
include_once 'headerCli.php';
include_once 'Funcoes_bd.php';
include_once 'mysql.connect.php';
ligar_base_dados();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Escolha de Pagamento</title>
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
                     <link rel="stylesheet" type="text/css" href="css_original/Rproduto.css" />   
           <?php             
}
                 
            
            ?>
        <script type="text/javascript" src="RegistoProduto.js"></script>
        <meta charset="UTF-8">
    </head>

    <body>
        <div id="mainbody">
        <div id="novosprodutosbar">
            <h3 class="bar-title" style="padding: 0.5%;">Confirmaçao de Venda</h3>
        </div>
            <div id="abaixo_pag">
                <div id="esc_pagamento">
                    <marquee> Escolha o pagamento </marquee>
                    
                </div>
                <br>
                <div>
                    <p style="text-align: center; color:red;">***** A escolha realizada terá de cobrir a totalidade de compra****</p>
                </div>
                <div id="Escolha_radio">

                    <form action="compra.php" method="Post">
                        <input type="radio" name="escolha"  checked="checked" value="multibanco"><strong>Multibanco</strong><br>
                        <input type="radio" name="escolha" value="chequeO"><strong>Cheque Oferta</strong><br>
                        <input type="radio" name="escolha" value="bonus"><strong>Bonus</strong><br>
                        <input type="radio" name="escolha"   value="payPal"><strong>Paypal</strong> 
                        <input id="proximo_input" type="submit" value="PROXIMO" >
                    </form>    
                </div>  



            </div> 
            <br>
            <br>
        </div>
        <?php
        if (isset($_REQUEST['escolha'])) {
            $escolha = $_REQUEST['escolha'];
            
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
                    $nome_produto = $linha['nome_produto'];
                    $quantidade = $dados['quantidade'];
                    $soma_carrinho += ($preco * $quantidade);
                }
                if ($escolha == "multibanco") {

                   echo "<script>window.open('confirm_compra_multi.php?cod=1 ')</script>";
                   echo "<script>window.close()</script>";
                   
                }
                if ($escolha == "chequeO") {
                 echo "<script>window.open('confirm_compra_CO.php?cod=3 ')</script>";
                   echo "<script>window.close()</script>";
                    
                }
                if ($escolha == "bonus"){
                   
                    $query1 = "SELECT * FROM cliente where login_Uti ='$login'";
                    $sql = mysql_query($query1);
                    $dados = mysql_fetch_array($sql);
                        $bonus = $dados['bonus'];
                        
                    if ($bonus < $soma_carrinho) {
                        echo "<script>alert('Nao tem bonus suficiente para pagamento')</script>";
                        
                        
                    } else {
                    echo "<script>window.open('confirm_compra_bonus.php?cod=2 ')</script>";
                    echo "<script>window.close()</script>";
                    }
                }
                if ($escolha == "payPal"){
                  echo "<script>window.open('paypal.php')</script>";
                    echo "<script>window.close()</script>";  
                }
                
            } else {
                echo "<script>alert('Nao tem nenhum produto para comprar')</script>";
                header('location:mainPageCli.php');
            }
        }
        ?> 
        <br>
        <?php 
        include 'footer.php';
                include 'footersimple.php';

        ?>
    </body>
</html>
<!DOCTYPE html>

<?php
include 'headerCli.php';
include_once 'Funcoes_bd.php';
include_once 'mysql.connect.php';
ligar_base_dados();
$query_moeda = "select * from moeda where login_Uti ='$login'";
$sql_moeda = mysql_query($query_moeda);
if (mysql_num_rows($sql_moeda) > 0) {
    $moeda = mysql_fetch_array($sql_moeda);
    $tipo = $moeda['tipo'];
    $dollar = 'dollar';
    $euro = 'euro';
} else {
    $dollar = 'dollar';
    $euro = 'euro';
    $tipo = "euro";
    $moeda_insere = "INSERT INTO `gardencorporation`.`moeda` (`login_Uti`, `tipo`) VALUES ('$login', 'euro'); ";
}
?>


<html>
    <head> 
        <title> Garden Corporation </title>
  <?php
                 $query_css="select * from css where login_Uti='$login'";
                 $sql_css = mysql_query($query_css);
                 if(mysql_num_rows($sql_css)>0){
                     $css=  mysql_fetch_array($sql_css);
                     $mainPage=$css['mainPage'];
                 
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
                <h3 class="bar-title" style="padding:0.5%;">Em Venda</h3>
            </div>
            <?php
            $query = "SELECT * FROM produto";
            $sql = mysql_query($query);
            while ($dados = mysql_fetch_array($sql)) {
                $verifica = $dados['numero_produto'];
                ?>
                <ul class="produtos">
                    <li class="item">
                        <div id="listagem" style="margin-left: 8%;">
                            <div class="wrapper">
                                <a class="imagemprod" title="<?= $dados['nome_produto'] ?>">
                                    <img src="<?= $dados ['imagem'] ?>" width="125" height="100">
                                </a>
                                <div class="infoproduto" id="infoprod">
                                    <h3><a title="<?= $dados['nome_produto'] ?>"><?= $dados ['nome_produto'] ?></a></h3>
                                       <?php
                                    if ($tipo == $euro) {
                                        $preco = $dados ['preco'];
                                        ?>
                                        <h4><a title="<?= $dados['nome_produto'] ?>"><?= $preco ?></a> €</h4>
                                        <?php
                                    }
                                    if ($tipo == $dollar) {
                                        $preco = $dados ['preco'];
                                        $valor = $preco * 1.08313;
                                        ?>    <h4><a title="<?= $dados['nome_produto'] ?>"><?= $valor ?></a> $</h4>
                                        <?php
                                    }
                                    ?>

                                    <?php 
                                    $query2="SELECT * FROM produto where numero_produto='$verifica'";
                                    $sql2 = mysql_query($query2);
                                    while($linha = mysql_fetch_array($sql2)){
                                        $quantidade= $linha['quantidade_produto'];
                                    }
                                    if($quantidade<=0){ ?>
                                    <button onclick="window.open('Intermedio_carrinho.php?cod=<?php echo $verifica ?>')" id="compracarr" type="Submit" ><a title="Wishlist"><img src="star_PNG1597.png" width="20" height="20"></a></button>
                                    <?php }else{ ?>

                                    <button onclick="window.open('Intermedio_carrinho.php?cod=<?php echo $verifica ?>')" id="compracarr" type="Submit" ><a title="Carrinho de Compras"><img src="carrinho.png" width="20" height="20"></a></button>
                                   <?php  } ?>  
                                   
                          
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            <?php } ?>
        </div>
    </body>

    <?php
    include 'footer.php';
    include 'footersimple.php';
    ?>

</html> 
<!DOCTYPE html>

<?php
include 'headerAdmin.php';
include_once 'Funcoes_bd.php';
include_once 'mysql.connect.php';
ligar_base_dados();
?>

<html>
    <head> 
        <title> Garden Corporation </title>
        <link rel="stylesheet" type="text/css" href="mainPage.css" />
        <meta charset="UTF-8"/>
        <script type="text/javascript" src="RegistoProduto.js"></script>
        <link rel="shortcut icon" href="gardenlogo.png" type="image/x-icon"/>
    </head>

    <body>

        <div id="mainbodymp">
            <!-- <div id="slider">
             </div> -->
            <div id="novosprodutosbar">
                <h3 class="bar-title" style="padding: 0.5%;">Editar Produto</h3>
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
                                    <h4><a title="<?= $dados['nome_produto'] ?>"><?= $dados ['preco'] ?></a> €</h4>
                                    <?php 
                                    $query2="SELECT * FROM produto where numero_produto='$verifica'";
                                    $sql2 = mysql_query($query2);
                                    while($linha = mysql_fetch_array($sql2)){
                                        $quantidade= $linha['quantidade_produto'];
                                    }
                                   ?>
                                    <a title="Wishlist" href="produtoEditAdmin.php?id=<?= $dados['numero_produto'] ?>"><img src="editpro.png" width="60" height="20"></a>
                                    <a title="Wishlist" href="produtoDelAdmin.php?id=<?= $dados['numero_produto'] ?>" onclick="return eliminar()"><img src="lixo.png" width="30" height="20"></a>
                                   
                             
                             
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            <?php } ?>
        </div>
    </body>

    <?php
  
    include 'footersimple.php';
    ?>

</html>  
<!DOCTYPE html
 <?php
  
include 'headerAnon.php';
include_once 'Funcoes_bd.php';
include_once 'mysql.connect.php';
$con = ligar_base_dados();
if (isset($_COOKIE['moeda'])) {
    $dollar = "dollar";
    $euro = "euro";
    $moeda = $_COOKIE['moeda'];
} else {
    $name = "moeda";
    $value = "euro";
    $time = time() + (86400);
    setcookie($name, $value, $time, "/");
}

if (isset($login)) {

    echo "<script>window.history.go(-1);</script>";
} else {
    ?>

    <html>
        <head>
            <title> Garden Corporation </title>
            <?php
            if (isset($_COOKIE["css"])) {
                ?>  <link rel="stylesheet" type="text/css" href="<?php echo $_COOKIE["css"]; ?>" />
                <?php
            } else {
                //css original
                $name = "css";
                $value = "css_original/MainPage.css";
                $time = time() + (3 * 24 * 3600);
                setcookie($name, $value, $time, "/");

                //agora criar uma cookie para o Rproduto.css
                $name = "cssP";
                $value = "css_original/Rproduto.css";
                $time = time() + (3 * 24 * 3600);
                setcookie($name, $value, $time, "/");

                //agora criar cookie para Ines.css
                $name = "cssI";
                $value = "css_original/Ines.css";
                $time = time() + (3 * 24 * 3600);
                setcookie($name, $value, $time, "/");
                ?>
                <link rel="stylesheet" type="text/css" href="css_original/mainPage.css" />
                <?php
            }
            ?>



            <meta charset="UTF-8"/>
            <link rel="shortcut icon" href="gardenlogo.png" type="image/x-icon"/>
            <script type="text/javascript" src="RegistoCF.js"></script>
        </head>

        <body>

            <div id="mainbodymp">
                <!-- <div id="slider">
                 </div> -->
                <div id="novosprodutosbar">
                    <h3 class="bar-title" style="padding: 0.5%;">Novos Produtos</h3>
                </div>
                <?php
                $query = "SELECT * FROM produto ORDER BY numero_produto DESC LIMIT 7";
                $sql = mysqli_query($con,$query);
                while ($dados = mysqli_fetch_array($sql)) {
                    ?>
                    <ul class="produtos">
                        <li class="item">
                            <div id="listagem" style="margin-left: 8%;">
                                <div class="wrapper">
                                    <a class="imagemprod" title="<?= $dados['nome_produto'] ?>">
                                        <img src="<?= $dados ['imagem'] ?>" width="125" height="100" onMouseOver="aumenta(this)" onMouseOut="diminui(this)">
                                    </a>
                                    <div class="infoproduto" id="infoprod">
                                        <h3><a title="<?= $dados['nome_produto'] ?>"><?= $dados ['nome_produto'] ?></a></h3>
                                        <?php
                                        if ($moeda == $dollar) {
                                            $preco = $dados['preco'];
                                            $valor = $preco * 1.08313;
                                            ?>
                                            <h4><a title="<?= $dados['nome_produto'] ?>"><?php echo $valor ?></a>$</h4>
                                            <?php
                                        } else {
                                            ?>  <h4><a title="<?= $dados['nome_produto'] ?>"><?php echo $dados['preco'] ?></a>€</h4>
                                        <?php }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                <?php } ?>

                <div id="novosprodutosbar">
                    <h3 class="bar-title" style="padding: 0.5%;">Promoções</h3>
                </div>
                <?php
                $query = "SELECT * FROM promocao";
                $sql = mysql_query($query);
                while ($dados = mysql_fetch_array($sql)) {
                    $verifica = $dados['numero_produto'];
                    $query2 = "SELECT * FROM produto where numero_produto = '$verifica'";
                    $sql2 = mysql_query($query2);
                    $dados2 = mysql_fetch_array($sql2);
                    $query87 = "SELECT * from promocao where numero_produto ='$verifica'";
                    $sql97 = mysql_query($query87);
                    $dados4 = mysql_fetch_array($sql97);
                    $preco_real = $dados4['preco_real'];
                    ?>
                    <ul class="produtos">
                        <li class="item">
                            <div id="listagem" style="margin-left: 8%;">
                                <div class="wrapper">
                                    <a class="imagemprod" title="<?= $dados2['nome_produto'] ?>">
                                        <img src="<?= $dados2 ['imagem'] ?>" width="125" height="100" onMouseOver="aumenta(this)" onMouseOut="diminui(this)">
                                    </a>
                                    <div class="infoproduto" id="infoprod">
                                        <h3><a title="<?= $dados2['nome_produto'] ?>"><?= $dados2 ['nome_produto'] ?></a></h3>


                                        <?php
                                        if ($moeda == $dollar) {
                                            $preco = $dados4 ['preco_real'];
                                            $valor2 = $preco * 1.083;
                                            ?>
                                            <h4 style=" text-decoration:  line-through red;">Antes:<a   title="<?= $dados2['nome_produto'] ?>"><?php echo $valor2 ?></a> $</h4>
                                            <?php
                                        } else {
                                            ?>  <h4 style=" text-decoration:  line-through red;">Antes:<a   title="<?= $dados2['nome_produto'] ?>"><?= $dados4 ['preco_real'] ?></a> €</h4>
                                        <?php }
                                        ?>

                                        <?php
                                        if ($moeda == $dollar) {
                                            $preco = $dados ['preco_promocao'];
                                            $valor1 = $preco * 1.08313;
                                            ?>
                                            <h4><a title="<?= $dados2['nome_produto'] ?>">Agora: <?php echo $valor1 ?></a>$</h4>
                                            <?php
                                        } else {
                                            ?>  <h4><a title="<?= $dados2['nome_produto'] ?>">Agora:<?php echo $dados['preco_promocao'] ?></a>€</h4>
                                        <?php }
                                        ?>


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
    }
    ?>

</html>
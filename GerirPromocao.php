<!DOCTYPE html>

<?php
include_once 'funcoes_bd.php';
include_once 'mysql.connect.php';
include_once 'headerFunc.php';
ligar_base_dados();
?>
<html>
    <head>
        <title> Registo Promoção </title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" type="text/css" href="Ines.css" />
    </head>

    <body id="Body_Cliente">  
        <div id="mainbodymp">

            <div id="novosprodutosbar">
                <h3 class="bar-title" style="padding: 0.5%;">Gerir Promoções</h3>
            </div>

            <div id="apagapromo">
                <div id="CaixaPromoapaga" style="margin-left:50%;position: absolute;height: 40%; margin-top: 1%; overflow: auto;">
                    <form name="form2" method="post" action="GerirPromocao.php" enctype="multipart/form-data">
                        <fieldset id="BordaRegistoPromo">
                            <legend id="Registopromo">Apagar Promoção</legend>
                            <br/>
                            <div id="apagaradio">
                                <label class="heading" for="name">Produto a apagar:</label>

                                <?php
                                $query3 = "SELECT * FROM promocao";
                                $sql15 = mysql_query($query3);
                                $row2 = mysql_num_rows($sql15);
                                if ($row2 == 0) {
                                    ?> <p> Não há promoções a apagar! </p>     
                                <?php } else { ?>
                                    <?php
                                    $query = "SELECT * FROM promocao";
                                    $sql = mysql_query($query);
                                    while ($dados = mysql_fetch_array($sql)) {
                                        $numero = $dados['numero_produto'];

                                        $query90 = "SELECT * FROM produto  WHERE numero_produto= '$numero'";
                                        $sql13 = mysql_query($query90);
                                        $linha = mysql_fetch_array($sql13);
                                        $nome = $linha['nome_produto'];
                                        ?>
                                        <ul>
                                            <li><label><input type="radio" name="deletepromo" required value="<?= $dados['numero_produto'] ?>" > <?= $dados['numero_produto'] ?> - <?php echo $nome ?> </label></li>          
                                        </ul>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            <p>
                                <button id="button-registarpromo" type="Submit">Apagar</button>
                            </p>
                        </fieldset>
                    </form>

                    <?php
                    if (isset($_POST['deletepromo'])) {

                        $selecao2 = ($_POST['deletepromo']);

                        $query9 = "SELECT * FROM promocao where numero_produto ='$selecao2'";
                        $sql10 = mysql_query($query9);
                        $num_linhas = mysql_num_rows($sql10);
                        if ($num_linhas > 0) {
                            while ($dados5 = mysql_fetch_array($sql10)) {
                                if ($dados5['numero_produto'] == $selecao2) {

                                    $query11 = "DELETE FROM `gardencorporation`.`promocao` WHERE `promocao`.`numero_produto` = '$selecao2';";
                                    $sql11 = mysql_query($query11);
                             echo "<script>location.reload()</script>";

                                } else {
                                    echo "<script>alert('Erro!')</script>";
                                    echo "<script> window.history.go(-1)</script>";
                                }
                            }
                        }
                    }
                    ?>   

                </div>
            </div>

            <div id="registapromo">
                <div id="CaixaPromo" style="margin-left:13%; height: 45%; margin-top: 3%; background-color: whitesmoke;">
                    <form name="form" method="post" action="GerirPromocao.php" enctype="multipart/form-data">
                        <fieldset id="BordaRegistoPromo">
                            <legend id="Registopromo">Registo Promoção</legend>

                            <p> <label id="nome" for="nome">Nome:</label> </p>
                            <div id="dropdownmenupromo">
                                <select name="menupromo" required placeholder="XXXX">
                                    <option value="">Escolher produto </option>
                                    <?php
                                    $query = "SELECT * FROM `produto` WHERE numero_produto not in(SELECT numero_produto from promocao)  ";
                                    $sql = mysql_query($query);
                                    while ($dadosY = mysql_fetch_array($sql)) {
                                        ?>
                                        <option value="<?= $dadosY['numero_produto'] ?>"> <?php echo $dadosY['numero_produto'] . "-" . $dadosY['nome_produto'] . " " . $dadosY['preco'] . "€"; ?> </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <p>
                                <label id="promocaopreco" >Promoção:</label>
                                <input type="number" min="1" name="promop" id="promoprice" required placeholder="Preço da Promoção">
                            </p>
                            <p>
                                <button id="button-registarpromo" type="Submit">Registar</button>
                            </p>
                        </fieldset>
                    </form>


                    <?php
                    if (isset($_POST['menupromo'])) {
                        $selecao = ($_POST['menupromo']);
                        $preco = $_POST['promop'];


                        $query10 = "SELECT * FROM produto where numero_produto ='$selecao'";
                        $sql10 = mysql_query($query10);
                        $dadosX = mysql_fetch_array($sql10);
                        $precoreal = $dadosX['preco'];
                        ?>   

                        <?php
                        $query5 = "SELECT * FROM promocao WHERE numero_produto= '$selecao'";
                        $sql5 = mysql_query($query5);
                        $row = mysql_num_rows($sql5);
                        if ($row > 0) {
                            echo "<script>alert('Produto ja existente em promoção!')</script>";
                            echo "<script> window.history.go(-1)</script>";
                        } else {
                            if ($precoreal < $preco) {
                                echo "<script>alert('O produto selecionado encontra-se a um preço de venda menor que o inserido, por favor insira um preço menor para a promoção!')</script>";
                                echo "<script> window.history.go(-1)</script>";
                            } else {
                                $query4 = "INSERT INTO `gardencorporation`.`promocao` (`numero_promocao`, `numero_produto`, `preco_promocao`, `preco_real`) VALUES (NULL, '$selecao', '$preco', '$precoreal');";
                                $sql6 = mysql_query($query4);
                                $queryupdate = "UPDATE `gardencorporation`.`produto` SET `preco` = '$preco' WHERE `produto`.`numero_produto` = '$selecao'";
                                $sqlupdate = mysql_query($queryupdate);
                          echo "<script>location.reload()</script>";

                                
                            }
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </body>

    <?php
    include_once 'footersimple.php';
    ?>

</html>
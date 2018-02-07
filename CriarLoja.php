<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title> Registo Loja </title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" type="text/css" href="Ines.css" />
        <script type="text/javascript" src="RegistoCF.js"></script>
    </head>

    <body id="Body_Cliente">  

        <?php
        include_once 'funcoes_bd.php';
        include_once 'mysql.connect.php';
        include_once 'headerAdmin.php';
        ligar_base_dados();
        ?>


        <div id="mainbodymp">
            <div id="novosprodutosbar">
                <h3 class="bar-title" style="padding: 0.5%;">Criar Loja</h3>
            </div>            
            <form name="form" method="post" action="CriarLoja.php" onsubmit="return validacao_cliente();" enctype="multipart/form-data">

                <p>
                    <label id="nome" for="nome">Morada:</label>
                    <input type="text" name="nome" id="nome" required placeholder="Insira uma morada">
                </p>

                <p>
                    <label id="login" for="login">Código-postal:</label>
                    <input type="text" name="login"  id="login" required placeholder="Insira um código-postal">
                </p>

                <p>
                    <label id="telefone" for="telefone">Telefone:</label>
                    <input type="text" name="telefone" id="telefone"  pattern=".{9,}"   required title="insira 9 dígitos" maxlength="9" required placeholder="Insira o telefone">
                </p>

                <p>
                    <label id="telefone" for="telefone">Fax:</label>
                    <input type="text" name="telefone2" id="telefone"  pattern=".{9,}"   required title="insira 9 dígitos" maxlength="9" required placeholder="Insira o fax">
                </p>

                <pre>
                
                
                
                </pre>

                <div id="botoes">
                    <p>
                        <input type="hidden" value="enviado" name="acao">

                        <button id="button-registar" type="Submit"   >Registar</button>
                        <input id="button-registar" type="button" value="Voltar" onclick="window.history.go(-1);">
                    </p>
                </div>

            </form>

        </div>



        <?php
        if (isset($_REQUEST['acao'])) {
            $morada = $_REQUEST['nome'];
            $codigo = $_REQUEST['login'];
            $telefone = $_REQUEST['telefone'];
            $telefone2 = $_REQUEST['telefone2'];

            if (preg_match('/[0-9]{4}\-[0-9]{3}/', $codigo)) {

                $pesquisar = mysql_query("SELECT * FROM loja WHERE codigo_postal = '$codigo'");
                $contagem = mysql_num_rows($pesquisar);
                if ($contagem == 1) {
                    echo "<script>alert('Código postal já existente!')</script>";
                    echo "<script>history.go(-1)</script>";
                } else {
                    $pesquisar2 = mysql_query("SELECT * FROM loja WHERE telefone = '$telefone'");
                    $contagem2 = mysql_num_rows($pesquisar2);
                    if ($contagem2 == 1) {
                        echo "<script>alert('Telefone já existente!')</script>";
                        echo "<script>history.go(-1)</script>";
                    } else {
                        $pesquisar3 = mysql_query("SELECT * FROM loja WHERE fax = '$telefone2'");
                        $contagem3 = mysql_num_rows($pesquisar3);
                        if ($contagem3 == 1) {
                            echo "<script>alert('Fax já existente!')</script>";
                            echo "<script>history.go(-1)</script>";
                        } else {
                            echo "<script>alert('Loja registada com sucesso!')</script>";
                            $query = "INSERT INTO `gardencorporation`.`loja` (`numero`, `Morada`, `codigo_postal`, `telefone`, `fax`) VALUES (NULL, '$morada', '$codigo', '$telefone', '$telefone2');";
                            $sql = mysql_query($query);
                        }
                    }
                }
            } else {
                echo "<script>alert('Insira um código-postal válido, insira um formato correto! ')</script>";
            }
        }
        ?>

        <?php
        include_once 'footersimple.php';
        ?>

    </body>
</html>
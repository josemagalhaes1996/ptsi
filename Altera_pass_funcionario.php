<html>
    <head>
        <title>Alteraçao Password</title>
        <link rel="stylesheet" type="text/css" href="Ines.css"/>
        <script type="text/javascript" src="RegistoProduto.js"></script>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
        include_once 'mysql.connect.php';
        include_once 'Funcoes_bd.php';
        ligar_base_dados();
        include_once 'headerFunc.php'
        ?> 

        <div id="mainbodymp">
            <div id="Pesquisa">

                <div id="novosprodutosbar">
                    <h3 class="bar-title" style="padding: 0.5%;">Altere a sua Password</h3>
                </div>

                <div align="center" id="busca_func" >

                    <form name="form" id="altera_pass_func" action="Altera_pass_funcionario.php" method="post" onsubmit="return valida_pass();" enctype="multipart/form-data">

                        <p>
                            <label id="login">Funcionário:</label>
                            <input name="login" id="login" type="text" value="<?php echo $login; ?>" name="Login" disabled > <!-- Este login e o login da sessao-->
                            <input type="hidden" value="<?php echo $login; ?>" name="logo">
                        </p>

                        <p>
                            <label id="login">Password atual:</label>
                            <input type="hidden" name="acao">
                            <input id="login" type="password" name="pass1" required  placeholder="Passoword atual" maxlength="50"><br>
                        </p>

                        <p>
                            <label id="login">Nova Password:</label>
                            <input id="login" type="password" name="pass2" required placeholder="Nova password" maxlength="50"><br>
                        </p>
                        <pre>
                                


                        </pre> 

                        <div id="botoes">
                            <p>
                                <input id="button-registar" type="button" value="Voltar" onclick="window.history.go(-1);">
                                <input id="button-registar" type="submit" name="enviar" value="Submeter">    
                            </p>
                        </div>

                    </form>
                </div> 
            </div> 
        </div>

        <?php
        if (isset($_REQUEST['pass1'])) {
            $login1 = $_REQUEST['logo'];
            $pass1 = $_REQUEST['pass1'];
            $pass2 = $_REQUEST['pass2'];

            $query1 = "SELECT * FROM utilizador where login_Uti='$login1';";
            $sql1 = mysql_query($query1);
            $linha = mysql_fetch_array($sql1);
            $pw1 = $linha['password'];
            if (!($pw1 == $pass1)) {
                echo "<script>alert('A password actual esta incorreta')</script>";
                echo "<script> window.history.go(-1)</script>";
            } else {


                $query = "SELECT * FROM funcionario where login_Uti ='$login1'";
                $sql = mysql_query($query);
                $dados = mysql_fetch_array($sql);
                $data_mysql = $dados['data_password']; //data em mysql
                $timestamp = strtotime($data_mysql);   //gerar timestamp de uma data em mysql
                $data_prevista = date('Y/d/m', $timestamp); //transformar data
                $data_atual = date('Y/d/m'); //data atual

                if ($data_atual > $data_prevista) {


                    $query2 = "UPDATE `gardencorporation`.`utilizador` SET `password` = '$pass2' WHERE `utilizador`.`login_Uti` = '$login1';";
                    mysql_query($query2); //altera a palavra passs

                    $data = date('Y-m-d G:i:s', strtotime("+ 1 year")); //
                    $query5 = "UPDATE `gardencorporation`.`funcionario` SET `data_password` = '$data' WHERE `funcionario`.`login_Uti` = '$login1';";
                    $sql2 = mysql_query($query5);
                    echo "<script>alert('A password foi alterada com sucesso')</script>";
                } else {
                    echo "<script>alert('Ainda nao cumpriu o prazo de alteraçao (365 dias)')</script>";
                }
            }
        }
        ?>

        <div>
            <?php
            include_once 'footersimple.php';
            ?>
        </div>
    </body>

</html>




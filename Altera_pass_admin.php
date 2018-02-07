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
        include_once 'headerAdmin.php';
        ?> 


        <div id="mainbodymp">
            <div id="novosprodutosbar">
                <h3 class="bar-title" style="padding: 0.5%; "> teste testes eteste Altere a sua Password:</h3>
            </div>


            <div>

                <form name="form" id="altera_pass_func" action="Altera_pass_admin.php" method="post" onsubmit="return valida_pass();" enctype="multipart/form-data">
                    <div style="">
                    <p>
                        <label id="login">Admnistrador:</label>
                        <input id="login" type="text" value="<?php echo $login; ?>" name="Login" disabled ><br> <!-- Este login e o login da sessao-->
                        <input type="hidden" value="<?php echo $login; ?>" name="logo">
                    </p>  

                    <p>
                        <label id="password">Password atual:</label>
                        <input type="hidden" name="acao">
                        <input id="password" type="password" name="pass1" required  placeholder="Passoword atual" maxlength="50"><br>
                    </p>

                    <p>
                        <label id="password">Nova Password:</label>
                        <input id="password" type="password" name="pass2" required placeholder="Nova password" maxlength="50"><br>
                    </p>

                    <div id="botoes" style="margin-top: -2%;">
                        <p>
                            <input type="hidden" value="enviado" name="acao">
                            <input id="button-registar" type="button" value="Voltar" onclick="window.history.go('-1');">
                            <input id="button-registar" type="submit" name="enviar" value="Submeter ">    

                        </p>
                    </div>
                    
                    <pre>
                        


                    </pre>
                    
                    </div>
                </form>
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


                $query2 = "UPDATE `gardencorporation`.`utilizador` SET `password` = '$pass2' WHERE `utilizador`.`login_Uti` = '$login1';";
                mysql_query($query2); //altera a palavra passs

                echo "<script>alert('A password foi alterada com sucesso')</script>";
            }
        }
        ?>


        <div id="foesta">
            <?php
            include_once 'footersimple.php';
            ?>
        </div>
    </body>

</html>




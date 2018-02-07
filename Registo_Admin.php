
<html>

    <head>
        <title>Registar Admnistrador</title>
        <link rel="stylesheet" type="text/css" href="Ines.css"/>
        <script type="text/javascript" src="RegistoCF.js"></script>
        <meta charset="UTF-8">
    </head>
    <body id="body_funcionario">

        <?php
        include_once 'funcoes_bd.php';
        include_once 'mysql.connect.php';
        include_once 'headerAdmin.php';
        ligar_base_dados();
        ?>

        <div id="mainbodymp">
            <div id="novosprodutosbar">
                <h3 class="bar-title" style="padding: 0.5%;">Registar Administradores</h3>
            </div>

            <div style="margin-top: 2%;">

                <form name="form" action="Registo_Admin.php" method="post" onsubmit="return validacao_funcionario();" enctype="multipart/form-data">

                    <p>
                        <label id="login">Login:</label>
                        <input id="login" type="text" name="login" required placeholder="Login Admin" maxlength="50"/>
                    </p>

                    <p>
                        <label id="password">Senha:</label>
                        <input id="password" type="password" name="password2" required placeholder="Insira a senha" />
                    </p>

                    <p>
                        <label id="password">Senha:</label>
                        <input id="password" type="password" name="password3" required placeholder="Novamente a senha" />
                    </p>

                    <pre>




                    </pre>


                    <div id="botoes" >
                        <p>
                            <input type="hidden" name="acao" value="enviado"/>
                            <input id="button-registar" type="button" value="Cancelar" onclick="history.go(-1)">
                            <button id="button-registar" type="submit">Registar</button>
                        </p>
                    </div>

                </form> 

            </div>

        </div>


        <?php
        if (isset($_REQUEST['acao'])) {
            $login_uti = $_REQUEST['login'];

            $password1 = $_REQUEST['password2'];
            $password = $_REQUEST['password3'];
            $erro = false;

            $pesquisar = mysql_query("SELECT * FROM utilizador WHERE login_Uti = '$login_uti'");
            $contagem = mysql_num_rows($pesquisar);
            if ($contagem == 1) {
                echo "<script>alert('Login já existente!')</script>";
                echo "<script> window.history.go(-1)</script>";
            } else {
                insere_admin($login_uti, $password);
                echo "<script>alert('Admnistrador registado com sucesso!')</script>";
            }
        }
        ?>    

        <?php
        include_once 'footersimple.php';
        ?>

    </body>
</html>

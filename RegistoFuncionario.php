<!DOCTYPE html>

<html>

    <head>
        <title>Registar Funcionário</title>
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
                <h3 class="bar-title" style="padding: 0.5%;">Registar Funcionário</h3>
            </div>

            <form name="form" action="RegistoFuncionario.php" method="post" onsubmit="return validacao_funcionario();" enctype="multipart/form-data">

                <p>
                    <label id="nome">Nome:</label>
                    <input id="nome" type="text" name="nome" required placeholder="Nome funcinário" maxlength="50"/>
                </p>

                <p>
                    <label id="login">Login:</label>
                    <input id="login" type="nome" name="login" required placeholder="Nome de utilizador" >
                </p>

                <p>
                    <label id="email">Email:</label>
                    <input id="email" type="email" name="email" required placeholder="exemplo@gmail.com"/>
                </p>

                <p>
                    <label id="password">Senha:</label>
                    <input id="password1" type="password" name="password3" required placeholder="Insira a senha" />
                </p>

                <p>
                    <label id="password">Senha:</label>
                    <input id="password" type="password" name="password2" required placeholder="Novamente a senha" />
                </p>

                <pre>
                
                
                
                </pre>

                <div id="botoes">
                    <p>
                        <input type="hidden" value="enviado" name="acao">
                        <input id="button-registar" type="button" value="Voltar" onclick="window.history.go(-1);">
                        <button id="button-registar" type="Submit" >Registar</button>
                    </p>
                </div>


            </form> 


        </div>


        <?php
        if (isset($_REQUEST['acao'])) {
            $login = $_REQUEST['login'];
            $nome = $_REQUEST['nome'];
            $email = $_REQUEST['email'];
            $password1 = $_REQUEST['password3'];
            $password = $_REQUEST['password2'];
            $erro = false;

            $pesquisar = mysql_query("SELECT * FROM funcionario WHERE login_Uti = '$login'");
            $contagem = mysql_num_rows($pesquisar);
            if ($contagem == 1) {
                echo "<script>alert('Login já existente!')</script>";
                echo "<script> window.history.go(-1)</script>";
            } else {
                $pesquisar2 = mysql_query("SELECT * FROM funcionario WHERE email = '$email'");
                $contagem2 = mysql_num_rows($pesquisar2);
                if ($contagem2 == 1) {
                    echo "<script>alert('Email já existente!')</script>";
                    echo "<script> window.history.go(-1)</script>";
                }

                $data = date('Y-m-d G:i:s', strtotime("+ 1 year")); //esta e a proxima data em que ele pode alterar pasword



                insere_funcionario($login, $password, $email, $data, $nome);
                echo "<script>alert('Funcionário registado com sucesso!')</script>";
            }
        }
        ?>    
        <div id="foesta1">
            <?php
            include 'footersimple.php';
            ?>
        </div>
    </body>
</html>

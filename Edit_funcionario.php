<html>
    <head>
        <title>Editar Funcionario</title>
        <link rel="stylesheet" type="text/css" href="Ines.css"/>
        <script type="text/javascript" src="RegistoProduto.js"></script>
        <meta charset="UTF-8">
    </head>
    <?php
    include_once 'Funcoes_bd.php';
    include_once 'mysql.connect.php';
    ligar_base_dados();
    $id = $_REQUEST['id'];
    $query = "SELECT* FROM `gardencorporation`.`funcionario` WHERE login_Uti = '$id'";
    $sql = mysql_query($query);
    $linha = mysql_fetch_array($sql);
    $login_2 = $linha['login_Uti'];
    $email = $linha['email'];
    $nome = $linha['nome_funcionario'];
    include_once 'headerAdmin.php';
    ?>
    <body>
        <div>
            <div id="mainbodymp">

                <div id="novosprodutosbar">    
                    <h3 style="padding: 0.5%;"> Edição de Funcionários</h3>
                </div>


                <form name="form" action="FuncionarioEdit1.php" method="post" enctype="multipart/form-data">

                    <p>
                        <label id="login">Login: </label>
                        <input id="login" type="text" name="nome" disabled="" value="<?php echo $login_2; ?>" >
                        <input id="login" type="hidden" name="login"  value="<?php echo $login_2 ?>"/>
                    </p>

                    <p>
                        <label id="nome">Nome do Funcionario:</label>
                        <input type="hidden" value="<?php echo $nome; ?>" name="numero" />
                        <input id="nome" type="text" name="nome" required value="<?php echo $nome; ?>" maxlength="50"/>
                    </p>

                    <p>
                        <label id="email">Email Funcionario:</label>
                        <input id="email" type="email" name="email" required  value="<?php echo $email ?>" />
                    </p>

                    <div id="botoes" style="margin-top: -2%;">
                        <p>
                            <input type="hidden" name="acao" value="enviado"/>

                            <button id="button-registar" type="submit" onclick="return editar_funcionario()">Editar</button>
                            <input id="button-registar" type="button" value="Voltar" onclick="window.history.go(-1);">
                        </p>
                    </div>
                </form> 


                <pre>
                

                </pre>


            </div>
        </div>
        <div id="foesta1">
            <?php
            include 'footersimple.php';
            ?>
        </div>


    </body>
</html>
<!DOCTYPE html>

<html>
    <head>
        <title> Edita Cliente </title>
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

        $id = $_REQUEST['id'];
        $query = "SELECT * FROM cliente WHERE `cliente`.`login_Uti` = '$id'";
        $sql = mysql_query($query);
        $linha = mysql_fetch_array($sql);
        $nome = $linha['nome_cliente'];
        $login1 = $linha['login_Uti'];
        $nif = $linha['NIF'];
        $email = $linha['email'];
        $telefone = $linha['telefone'];
        $morada = $linha['morada'];
        ?>


        <div id="mainbodymp">
            <div id="novosprodutosbar">
                <h3 class="bar-title" style="padding: 0.5%;">Editar Cliente</h3>
            </div>
            <form name="form" method="post" action="ClienteEdit2.php" onsubmit="return validacao_edita_cliente1();" enctype="multipart/form-data">

                <input type="hidden" value="<?php echo $id; ?>" name="login1" >
                <p>
                    <label id="login" for="login">Login:</label>
                    <input type="text" name="login" id="login" required placeholder="Insira o nome de utilizador" value=" <?php echo $login1; ?>" disabled>
                </p>

                <p>
                    <label id="nome" for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" required value="<?php echo $nome; ?>" placeholder="Insira o nome do cliente">
                </p>

                <input type="hidden" value="<?php echo $nif; ?>" name="nif1" >
                <p>
                    <label id="nif" for="nif">NIF:</label>
                    <input type="text" name="NIF" id="nif" pattern=".{9,}"  required title="insira 9 dígitos" maxlength="9"  required placeholder="Insira o NIF" value="<?php echo $nif; ?>" disabled>
                </p>

                <p>
                    <label id="email" for="email">Email:</label>
                    <input type="email" name="email" id="email"  required value="<?php echo $email; ?>" placeholder="exemplo@gmail.com">
                </p>

                <p>
                    <label id="telefone" for="telefone">Telefone:</label>
                    <input type="text" name="telefone" id="telefone"  pattern=".{9,}"   required value="<?php echo $telefone; ?>" title="insira 9 dígitos" maxlength="9" required placeholder="Insira telefone">
                </p>

                <p>
                    <label id="morada" for="morada">Morada:</label>
                    <input type="text" name="morada" id="morada" required value="<?php echo $morada; ?>" placeholder="Insira a morada">
                </p>

                <br>
                <br>
                <br>
                <br>
                
                <div id="botoes">
                <p>
                    <input type="hidden" value="enviado" name="acao">

                    <button id="button-registar" type="Submit" onclick="return editar_cliente() && validacao_edita_cliente1()" >Editar</button>
                    <input id="button-registar" type="button" value="Voltar" onclick="window.history.go(-1);">
                </p>
                </div>

            </form>
        </div>





        <?php
        include_once 'footersimple.php';
        ?>

    </body>
</html>
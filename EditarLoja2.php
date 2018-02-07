<!DOCTYPE html>

<html>
    <head>
        <title> Edita Loja </title>
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
        
        if(isset($_REQUEST['id'])){
          
        $lol = $_REQUEST['id'];
        $query = "SELECT * FROM loja WHERE `loja`.`numero` = '$lol'";
        $sql = mysql_query($query);
        $linha = mysql_fetch_array($sql);
        $numero = $linha['numero'];
        $morada = $linha['Morada'];
        $codigo = $linha['codigo_postal'];
        $telefone = $linha['telefone'];
        $fax = $linha['fax'];
        ?>


        <div id="mainbodymp">
            <div id="novosprodutosbar">
                <h3 class="bar-title" style="padding: 0.5%;">Editar Loja</h3>
            </div>
            <form name="form" method="post" action="EditarLoja3.php" onsubmit="return validacao_edita_cliente1();" enctype="multipart/form-data">

                <input type="hidden" value="<?php echo $lol; ?>" name="login1" >
                <p>
                    <label id="login" for="login">Numero:</label>
                    <input type="text" name="numero" id="login" required placeholder="Insira o numero" value=" <?php echo $lol; ?>" disabled>
                </p>

                <p>
                    <label id="nome" for="nome">Morada:</label>
                    <input type="text" name="Morada" id="nome" required value="<?php echo $morada; ?>" placeholder="Insira a morada">
                </p>

                <p>
                    <label id="nif" for="nif">Código-Postal:</label>
                    <input type="text" name="codigo_postal" id="nif"    required placeholder="Insira o código-postal" value="<?php echo $codigo; ?>" >
                </p>

                <p>
                    <label id="telefone" for="telefone">Telefone:</label>
                    <input type="text" name="telefone" id="telefone"  pattern=".{9,}"   required value="<?php echo $telefone; ?>" title="insira 9 dígitos" maxlength="9" required placeholder="Insira telefone">
                </p>

                <p>
                    <label id="telefone" for="telefone">Fax:</label>
                    <input type="text" name="fax" id="telefone"  pattern=".{9,}"   required value="<?php echo $fax; ?>" title="insira 9 dígitos" maxlength="9" required placeholder="Insira o fax">
                </p>

                <br>
                <br>
                <br>
                <br>

                <div id="botoes">
                    <p>
                        <input type="hidden" value="enviado" name="acao">

                        <button id="button-registar" type="Submit" onclick="return editar_loja()" >Editar</button>
                        <input id="button-registar" type="button" value="Voltar" onclick="window.history.go(-1);">
                    </p>
                </div>

            </form>
        </div>





        <?php
        include_once 'footersimple.php';

}?>

    </body>
</html>
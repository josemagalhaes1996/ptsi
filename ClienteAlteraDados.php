<!DOCTYPE html>
   <?php
        include_once 'funcoes_bd.php';
        include_once 'mysql.connect.php';
        include_once 'headerCli.php';
        ligar_base_dados();?>
<html>
    <head>
        <title> Alterar Dados </title>
        <meta charset="UTF-8"/>
         <?php
                 $query_css="select * from css where login_Uti='$login'";
                 $sql_css = mysql_query($query_css);
                 if(mysql_num_rows($sql_css)>0){
                     $css=  mysql_fetch_array($sql_css);
                     $mainPage=$css['Ines'];
                 
                     ?><link rel="stylesheet" type="text/css" href="<?php echo $mainPage; ?>" /><?php
                 }else{
                 $css_insert ="INSERT INTO `gardencorporation`.`css` (`mainPage`, `Rproduto`, `Ines`, `login_Uti`) VALUES ('css_original/MainPage.css', 'css_original/Rproduto.css', 'css_original/Ines.css', '$login');";
               $sql_insert=  mysql_query($css_insert);
?>
            <link rel="stylesheet" type="text/css" href="css_original/Ines.css" />   
           <?php             
                 }
                 
            
            ?>

        <script type="text/javascript" src="RegistoCF.js"></script>
    </head>

    <body id="Body_Cliente">  

        <?php
        

        $query = "SELECT * FROM cliente WHERE `cliente`.`login_Uti` = '$login'";
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
                <h3 class="bar-title" style="padding:0.5%;">Editar dados</h3>
            </div>
            <form  target='iframe' name="form" method="post" action="ClienteAlteraDados2.php" onsubmit="return validacao_edita_cliente1();" enctype="multipart/form-data">
                <!--a página vai executar escondida, fazer o procedimento e retornar o Alert que embora o iframe esteja invisível o Alert vai aparecer, eassim a página nao precisa de carregar duas vezes para fazer o fazer --> 
               <!-- <iframe name='iframe' style='display:none;'></iframe> -->
                <legend id="Registo"></legend>

                <p>
                    <label id="login" for="login">Login:</label>
                    <input type="text" name="login" id="login" value="<?php echo $login1; ?>" disabled required placeholder="Nome de utilizador">
                    <input type="hidden" name="login2" value="<?php echo $login ?>" >  
                </p>

                <p>
                    <label id="nome" for="nome">Nome:</label>
                    <input type="text" name="nome" value="<?php echo $nome; ?>" id="nome" required placeholder="Insira o seu nome">
                </p>

                <p>
                    <label id="nif" for="nif">NIF:</label>
                    <input type="text" name="nif" value="<?php echo $nif; ?>" id="nif" pattern=".{9,}"  required title="insira 9 dígitos" maxlength="9"  required placeholder="Insira o seu NIF">
                </p>


                <p>
                    <label id="email" for="email">Email:</label>
                    <input type="email" name="email" value="<?php echo $email; ?>" id="email"  required placeholder="exemplo@gmail.com">
                </p>

                <p>
                    <label id="telefone" for="telefone">Telefone:</label>
                    <input type="text" name="telefone" value="<?php echo $telefone; ?>" id="telefone"  pattern=".{9,}"   required title="insira 9 dígitos" maxlength="9" required placeholder="Insira o seu telefone">
                </p>

                <p>
                    <label id="morada" for="morada">Morada:</label>
                    <input type="text" name="morada" id="morada" value="<?php echo $morada; ?>" required placeholder="Insira a sua morada">
                </p>

                <p>
                    <label id="password" for="password">Senha atual:</label>
                    <input type="password" name="passantiga" id="password"  required placeholder="Insira a senha atual">
                </p>
                <p>
                    <label id="password" for="password">Nova senha:</label>
                    <input type="password" name="password1" id="password" required placeholder="Insira a nova senha">
                </p>

                <p>
                    <label id="password" for="password">Nova senha:</label>
                    <input type="password" name="passnova" id="password1"  required placeholder="Insira novamente a nova senha">
                </p>
                <br>
                <br>
                <br>
                <br>
                <div id="botoes">
                    <p>
                        <input type="hidden" value="enviado" name="acao">

                        <button id="button-registar" type="Submit" onclick="return editar_cliente2()" >Editar</button>
                        <input id="button-registar" type="button" value="Voltar" onclick="window.history.go('-1');">

                    </p>
                </div>

            </form>
        </div>

        <?php
        include_once 'footer.php';
        include_once 'footersimple.php';
        ?>

    </body>
</html>
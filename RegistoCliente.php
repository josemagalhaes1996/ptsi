 <?php
        include_once 'funcoes_bd.php';
        include_once 'mysql.connect.php';
       
        ligar_base_dados();
        ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
if(isset($_REQUEST['q']) || isset($_REQUEST['e']) || isset($_REQUEST['n'])){
    if(isset($_REQUEST['q'])){
    $q = $_REQUEST['q'];
        $query= "select * from cliente where login_Uti='$q'";
    $sql = mysql_query($query);
    if(mysql_num_rows($sql)>0){
?> ****LOGIN EXISTENTE**** 
    <?php
    }
    
    }
    if(isset($_REQUEST['n'])){
    $q = $_REQUEST['n'];
        $query= "select * from cliente where nif='$q'";
    $sql = mysql_query($query);
    if(mysql_num_rows($sql)>0){
?> ****NIF EXISTENTE**** 
    <?php
    }
    
    }
    
if(isset($_REQUEST['e'])){
    $q = $_REQUEST['e'];
        $query= "select * from cliente where email='$q'";
    $sql = mysql_query($query);
    if(mysql_num_rows($sql)>0){
?> ****EMAIL JA EXISTENTE**** 
    <?php
    }
    
    }
}else{
 include_once 'headerAnon.php';
    ?>

<html>
    <head>
        <title> Registo Cliente </title>
        <meta charset="UTF-8"/>
         <?php
                if (isset($_COOKIE["cssI"])) {
                 

                    ?>  <link rel="stylesheet" type="text/css" href="<?php echo $_COOKIE["cssI"]; ?>" />
                    <?php
                } else {
                    //css original 
                    $name = "css";
                    $value = "css_original/MainPage.css";
                    $time = time() + (3 * 24 * 3600);
                    setcookie($name, $value, $time, "/");
                    
                    //agora criar uma cookie para o Rproduto.css
                    $name = "cssP";
                    $value = "css_original/Rproduto.css";
                    $time = time() + (3 * 24 * 3600);
                    setcookie($name, $value, $time, "/");
                    
                    //agora criar cookie para Ines.css 
                    $name = "cssI";
                    $value = "css_original/Ines.css";
                    $time = time() + (3 * 24 * 3600);
                    setcookie($name, $value, $time, "/");
                    ?>
                    <link rel="stylesheet" type="text/css" href="css_original/Ines.css" />   
                    <?php
                }
                ?>

            
        <script type="text/javascript" src="RegistoCF.js"></script>
    </head>

    <body id="Body_Cliente">  

       
        


        <div id="mainbodymp">
            <div id="novosprodutosbar">
                <h3 class="bar-title" style="padding: 0.5%;">Criar Conta Cliente</h3>
            </div>            
            <form name="form" method="post" action="RegistoCliente.php" onsubmit="return validacao_cliente();" enctype="multipart/form-data">

                <p>
                    <label id="nome" for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" required placeholder="Insira o seu nome">
              
                </p>

                <p>
                    <label id="login" for="login">Login:</label>
                    <input type="text" name="login" id="login" onkeyup="showHint(this.value);" required placeholder="Nome de utilizador">
                      <div id="nombre" style="margin-left: 20%; color:RED;"></div>
                </p>


                <p>
                    <label id="nif" for="nif">NIF:</label>
                    <input type="text" name="nif" id="nif" pattern=".{9,}" onkeyup="shownif(this.value);" required title="insira 9 dígitos" maxlength="9"  required placeholder="Insira o seu NIF">
                     <div id="nife" style="margin-left: 20%; color:RED;"></div>
                </p>


                <p>
                    <label id="email" for="email">Email:</label>
                    <input type="email" name="email" id="email"  required placeholder="exemplo@gmail.com" onkeyup="showEmail(this.value);">
                  <div id="emaile" style="margin-left: 20%; color:RED;"></div>
                </p>

                <p>
                    <label id="telefone" for="telefone">Telefone:</label>
                    <input type="text" name="telefone" id="telefone"  pattern=".{9,}"   required title="insira 9 dígitos" maxlength="9" required placeholder="Insira o seu telefone">
                </p>

                <p>
                    <label id="morada" for="morada">Morada:</label>
                    <input type="text" name="morada" id="morada" required placeholder="Insira a sua morada">
                </p>

                <p>
                    <label id="password" for="password">Senha:</label>
                    <input type="password" name="password1" id="password1"  pattern=".{6,16}"   required title="insira pelo menos 6 digitios" required placeholder="Insira a senha">
                </p>

                <p>
                    <label id="password" for="password">Senha:</label>
                    <input type="password"  pattern=".{6,16}"   required title="insira pelo menos 6 digitios" name="password" id="password" required placeholder="Insira novamente a senha">
                </p>

                <pre>
                
                
                
                </pre>

                <div id="botoes">
                    <p>
                        <input type="hidden" value="enviado" name="acao">

                        <button id="button-registar" type="Submit"  href="Login.php" >Registar</button>
                        <input id="button-registar" type="button" value="Voltar" onclick="window.history.go(-1);">
                    </p>
                </div>

            </form>
            <div id="teste">
                
            </div>
                
        </div>



        <?php
        if (isset($_REQUEST['acao'])) {
            $nome = $_REQUEST['nome'];
            $login = $_REQUEST['login'];
            $nif = $_REQUEST['nif'];
            $email = $_REQUEST['email'];
            $telefone = $_REQUEST['telefone'];
            $morada = $_REQUEST['morada'];
            $password1 = $_REQUEST['password1'];
            $password = $_REQUEST['password'];

            $pesquisar = mysql_query("SELECT * FROM cliente WHERE login_Uti = '$login'");
            $contagem = mysql_num_rows($pesquisar);
            if ($contagem == 1) {
                echo "<script>alert('Login já existente!')</script>";
                echo "<script>history.go(-1)</script>";
            } else {
                $pesquisar2 = mysql_query("SELECT * FROM cliente WHERE NIF = '$nif'");
                $contagem2 = mysql_num_rows($pesquisar2);
                if ($contagem2 == 1) {
                    echo "<script>alert('NIF já existente!')</script>";
                    echo "<script>history.go(-1)</script>";
                } else {
                    $pesquisar3 = mysql_query("SELECT * FROM cliente WHERE email = '$email'");
                    $contagem3 = mysql_num_rows($pesquisar3);
                    if ($contagem3 == 1) {
                        echo "<script>alert('Email já existente!')</script>";
                        echo "<script>history.go(-1)</script>";
                    } else {
                        echo "<script>alert('Cliente registado com sucesso!')</script>";
                        insere_cliente($login, $password, $email, $morada, $telefone, $nome, $nif);
                        
                      
                         $data = date('Y-m-d G:i:s', strtotime("+ 1 year"));
                        $query_data="INSERT INTO `gardencorporation`.`data_password` (`login_Uti`, `data`) VALUES ('$login', '$data');";
                        $sql_data= mysql_query($query_data);
                        
                    }
                }
            }
        }
        
        ?>

        <?php
        include_once 'footer.php';
        include 'footersimple.php';
}
        ?>

    </body>
</html>
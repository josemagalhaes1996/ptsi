
<!DOCTYPE html>

<html>
    <head>
        <title> Login </title>
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

            
        
      

    </head>

    <body id="Body_Cliente">

        <?php
        include_once 'funcoes_bd.php';
        include_once 'mysql.connect.php';
        ligar_base_dados();
        session_start();
        if(isset($_SESSION['login'])){
            echo "<script>window.history.back(-1)</script>";
        }else{
        ?>

        <div id="CaixaGardencorporation">
            <div id="img_gardenlogo"><img src="gardenlogo.png" alt="gardenlogo"></div>
            <div id="img_gardenlogo5"><img id="gardenlogo" src="gardenlogo5.png" alt="gardenlogo"></div>
        </div>

        <div id="CaixaCliente1">
            <form method="post" action="Login.php">

                <p id="Login">Login

                </p>

                <p>
                    <label id="login" for="login">Login:</label>
                    <input type="text" name="login" id="login" required placeholder="Nome de utilizador">
                </p>

                <p>
                    <label id="password" for="password">Senha:</label>
                    <input type="password" name="password" required id="password" placeholder="*********">
                </p>

                <p>
                    <button id="button-entrar" type="submit" onclick="document.form.action = 'teste.php'" >Entrar </button>


                    <a id="button-entrar"  value="Registar" href="RegistoCliente.php">Registar</a>


                    <a id="button-entrar"  value="Cancelar" href="mainPage.php">Cancelar</a>
                </p>



            </form>
        </div>

        <?php
        if(isset($_REQUEST['login'])){
        $login = $_REQUEST['login'];
        $password = $_REQUEST['password'];

        $ligacao = ligar_base_dados();

        $expressao = "SELECT * FROM utilizador WHERE login_Uti='$login' AND password='$password'";
        $resultado = mysql_query($expressao);
        if (mysql_num_rows($resultado) > 0) {
            session_start();
            $dados = mysql_fetch_assoc($resultado);
            $tipo = $dados['tipo'];
            if ($tipo == 1) {
                header('location:mainPageCli.php');
                $_SESSION['login'] = $login;
                $_SESSION['password'] = $password;
            } else {
                if ($tipo == 2) {
                    header('location:mainPageFunc.php');
                    $_SESSION['login'] = $login;
                    $_SESSION['password'] = $password;
                } else {
                    if ($tipo == 3) {
                        header('location:mainPageAdmin.php');
                        $_SESSION['login'] = $login;
                        $_SESSION['password'] = $password;
                    }
                }
            }
        } else {
            echo "<script>alert('Login ou password podem estar errados')</script>";
            echo "<script> window.history.go(-1)</script>";
        }
        }
        }
        ?>

    </body>
</html>



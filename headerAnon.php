<?php
include_once 'funcoes_bd.php';
include_once 'mysql.connect.php';

ligar_base_dados();
session_start();

 if(isset($_REQUEST['q'])){
   
    $q = $_REQUEST['q'];
  
    }
    
    
    ?>

<?php

if (isset($_SESSION['login'])) {
    $login = $_SESSION['login'];
    $pass = $_SESSION['password'];

} else {
   ?>
    <!DOCTYPE html>
    <html>

        <head> 
            <title> Garden Corporation </title>
           <?php
            if (isset($_COOKIE["css"])) {
          
            ?>  <link rel="stylesheet" type="text/css" href="<?php echo $_COOKIE["css"]; ?>" />
              <?php  
            } else {
                 $name = "css";
                $value = "css_original/MainPage.css";
                $time = time() + (86400);
                setcookie($name, $value, $time, "/");
               
?>
            <link rel="stylesheet" type="text/css" href="css_original/mainPage.css" />   
           <?php             
            }
            ?>
             <script type="text/javascript" src="RegistoCF.js"></script>
            <meta charset="UTF-8"/>
            <link rel="shortcut icon" href="gardenlogo.png" type="image/x-icon"/>

        </head>

        <body>
            <header>
                <div id="boxhead" class="header">
                    <div class="topbarhead">
                        <div id="level2">
                            <ul> <li> <a href="login.php">Login</a> | <a href="RegistoCliente.php">Registar</a></li></ul>
                        </div>
                        <div id="level1">
                            <ul> <li> <P> BEM-VINDO À NOSSA LOJA ONLINE! </p> </li> <li></ul>        
                        </div>
                    </div>

                    <div id="logo">
                        <marquee behavior="alternate"><img src="gardenlogo6.png"></marquee>
                        

                    </div> 

                    <div class="menubar">
                
                       <div id="colorcss">
                    <div  id="colorcssbig">
                        <div id="csscolor0"><a href="alteracss.php?id=1"><img src="azul.png"  width="15" height="15" ></a></div>
                        <!-- <div id="colorspace"></div> -->
                        <div id="csscolor1"><a href="alteracss.php?id=2"><img src="verde.png"  width="15" height="15" ></a></div>
                    </div>
                    <div>
                        <div id="csscolor2"><a href="alteracss.php?id=3"><img src="vermhlo.png"  width="16" height="15" ></a></div>
                        
                        <div id="csscolor3"><a href="alteracss.php?id=4"><img src="preto.png"  width="16" height="16" ></a></div>
                    </div>
                </div>
                        <ul>
                            <li><a href="mainPage.php"> Home </a></li>

                            <li><a href="#">Produtos</a>
                                <ul>
                                    <li><a href="ListaProdutos.php">Lista de Produtos</a></li></ul>
                            </li>
                            <li><a href="newsletter.php">Newsletter</a></li>         
                            <li><a href="comment.php">Comentário</a></li>
                            <li><a href="LocalizacaoAno.php">Lojas</a>

                            </li>
                            <li><a href="conversorAnon.php">Conversor</a></li>
                            <li>  
                                <form  method="post" action="inf_prod_anon.php"  id="searchform"> 
                                    <input  type="text" required name="name"> 
                                    <input  type="submit" name="submit" value="Search"> 
                                </form> 
                            </li>
                            <li style="float:right"><a href="#">€ <img src="triangulo.png" width="10" height="10"></a>
                                <ul>
                                    <li> <a href="alteramoeda.php?id=1">€</a></li>
                                    <li> <a href="alteramoeda.php?id=2"> $</a></li>
                                </ul>
                            </li>
                           
                        </ul>
                    </div>
                </div>

            </header>
    <?php
}
?>
    </body>

</html> 


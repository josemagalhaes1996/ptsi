<?php
include_once 'Funcoes_bd.php';
include_once 'mysql.connect.php';
ligar_base_dados();
session_start();

   
if (isset($_SESSION['login'])) {
    $login = $_SESSION['login'];
    $pass = $_SESSION['password'];



    $query = "SELECT * from utilizador WHERE login_Uti='$login'";
    $sql = mysql_query($query);
    $dado = mysql_fetch_array($sql);
    $tipo = $dado['tipo'];




    if ($tipo == 3) {
        ?>
        <!DOCTYPE html>
        <html>

            <head> 
                <title> Garden Corporation </title>
<?php
                 $query_css="select * from css where login_Uti='$login'";
                 $sql_css = mysql_query($query_css);
                 if(mysql_num_rows($sql_css)>0){
                     $css=  mysql_fetch_array($sql_css);
                     $mainPage=$css['mainPage'];
                 
                     ?><link rel="stylesheet" type="text/css" href="<?php echo $mainPage; ?>" /><?php
                 }else{
                 $css_insert ="INSERT INTO `gardencorporation`.`css` (`mainPage`, `Rproduto`, `Ines`, `login_Uti`) VALUES ('css_original/MainPage.css', 'css_original/Rproduto.css', 'css_original/Ines.css', '$login');";
               $sql_insert=  mysql_query($css_insert);
?>
            <link rel="stylesheet" type="text/css" href="css_original/mainPage.css" />   
           <?php             
                 }
                 ?>
                <meta charset="UTF-8"/>
                <link rel="shortcut icon" href="gardenlogo.png" type="image/x-icon"/>

            </head>

            <body>
                <header>
                    <div id="boxhead" class="header">
                        <div class="topbarhead">
                            <div id="level2">
                                <ul> <li> <a href="sair.php">Logout</a> </li></ul>
                            </div>
                            <div id="level1">
                                <ul> <li> <p> Área Administrador </p> </li> <li></ul>        
                            </div>
                        </div>

                        <div id="logo">
                            <img src="gardenlogo6.png" alt="gardenlogo">
                        </div>                  
                        <div class="menubar">
                             <div id="colorcss">
                    <div  id="colorcssbig">
                        <div id="csscolor0"><a href="alteracssCli.php?id=1"><img src="azul.png"  width="15" height="15" ></a></div>
                        <!-- <div id="colorspace"></div> -->
                        <div id="csscolor1"><a href="alteracssCli.php?id=2"><img src="verde.png"  width="15" height="15" ></a></div>
                    </div>
                    <div>
                        <div id="csscolor2"><a href="alteracssCli.php?id=3"><img src="vermhlo.png"  width="15" height="15" ></a></div>
                        
                       <div id="csscolor3"><a href="alteracssCli.php?id=4"><img src="preto.png"  width="15" height="15" ></a></div>
                    </div>
                </div>
                            <ul>
                                <li><a href="mainPageAdmin.php"> Home </a></li>
                                <li><a href="#">Produtos</a>
                                    <ul>
                                        <li><a href="Edita_produto_admin.php">Editar</a></li>
                                        <li><a href="PesquisaProdAdmin.php">Listar</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Clientes</a>
                                    <ul>
                                        <li><a href="ListarCliente.php">Listar clientes</a></li>
                                        <li><a href="EditaCliente.php">Edita cliente</a></li>
                                    </ul> 
                                </li>
                                <li><a href="#">Funcionários</a>
                                    <ul>
                                        <li><a href="RegistoFuncionario.php">Registar</a></li>
                                        <li><a href="Edita_funcionario.php">Editar</a></li>
                                        <li><a href="Pesquisa_func.php">Listar</a></li>
                                        <li><a href="Registo_Admin.php">Registar Admin</a></li>
                                    </ul> 
                                </li>
                                <li><a href="#">Compras</a>
                                    <ul>
                                        <li><a href="estadoComprasAdmin.php">Estados de compra</a></li>
                                    </ul> 
                                </li>
                                <li><a href="#">Alterar Dados</a>
                                    <ul>
                                        <li><a href="Altera_pass_admin.php">Alterar Password</a></li>
                                        <li><a href="Altera_bonus.php">Alterar Bónus</a></li>
                                        <li><a href="Altera_devolucao.php">Alterar dias devoluções</a></li>
                                     
                                    </ul> 
                                </li> 
                                <li><a href="#">Lojas</a>
                                      <ul>
                                          <li><a href="CriarLoja.php">Registar Loja</a></li>
                                          <li><a href="EditarLoja.php">Editar Loja</a></li>
                                      </ul> 
                                      </li>
                                     <li><a href="#">Comentários</a>
                                    <ul>
                                        <li><a href="aprova_comment.php">Aprovar Comentários</a></li>
                                        <li><a href="Rcomment.php">Comentários Rejeitados</a></li>
                                    </ul> 
                                </li>
                            </ul>
                        </div>
                    </div>

                </header>
                <?php
            } else {
                echo "<script>alert('Este acesso e restrito a Admnistradores')</script>";
                echo "<script> window.history.go(-1)</script>";
            }
        } else {
                echo "<script>alert('Este acesso e restrito a Admnistradores')</script>";
                echo "<script> window.history.go(-1)</script>";
            }
        ?>
    </body>

</html> 
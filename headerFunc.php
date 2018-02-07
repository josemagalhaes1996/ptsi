<?php
include_once 'Funcoes_bd.php';
include_once 'mysql.connect.php';
ligar_base_dados();
session_start();

if(isset($_SESSION['login'])){
      $login= $_SESSION['login'];
      $pass = $_SESSION['password'];
      


$query ="SELECT * from utilizador WHERE login_Uti='$login'";
$sql = mysql_query($query);
$dado= mysql_fetch_array($sql);       
       $tipo = $dado['tipo'];
       
            
    

if($tipo == 2){
    
   
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
                <?php $login = $_SESSION['login']; ?>
                <?php
                    $query = "SELECT * FROM funcionario";
                    $sql = mysql_query($query);
                    while ($dados = mysql_fetch_array($sql)) {                       
                        if ($login == $dados['login_Uti']){ ?>
                        <ul> 
                            <li>Olá Sr(a). <?= $dados['nome_funcionario'] ?> | <a href="sair.php">Logout</a></li>
                        </ul>
                <?php }} ?>
                    </div>
                    <div id="level1">
                        <ul> <li> <p> Área Funcionário </p> </li> <li></ul>        
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
                    <li><a href="mainPageFunc.php"> Home </a></li>
                    <li><a href="#">Produtos</a>
                    <ul>
                        <li><a href="RegistarProduto.php">Registar</a></li>
                        <li><a href="Edita_produto.php">Editar</a></li>
                        <li><a href="Atualizar_Stock.php">Atualizar/Abate</a></li>
                        <li><a href="Pesquisa.php">Listar</a></li>
                        <li><a href="GerirPromocao.php">Gerir Promoções</a></li>
                    </ul>
                    </li>
                    <li><a href="#">Clientes</a>
                    <ul>
                        <li><a href="ListarCliente_Func.php">Listar</a></li>
                        <li><a href="Pesquisa_Cliente.php">Pesquisa</a></li>
                        <li><a href="enviarpromo.php">Enviar Promoção</a></li>
                    </ul> 
                    </li>
                    <li><a href="#">Devoluções</a>
                    <ul>
                        <li><a href="lista_dev_func.php">Listar</a></li>
                        <li><a href="Aprova_dev.php">Aprovar/Rejeitar</a></li>
                    </ul> 
                    </li>
                    <li><a href="#">Compras</a>
                    <ul>
                        <li><a href="Aprova_Pagamento.php">Aprova pagamento</a></li>
                        <li><a href="comecar_compra.php">Alterar estado de compra</a></li>
                       <li><a href="ListarComprasFunc.php">Listar compras</a></li>
                    </ul> 
                    </li>
                    <li><a href="#">Estatísticas</a>
                    <ul>
                        <li><a href="melhor_cliente.php">Melhor Cliente</a></li>
                        <li><a href="Est_Stock.php">Produtos sem Stock</a></li>
                       <li><a href="melhor_produto.php">Produto Mais Vendido</a></li>
                    </ul> 
                    </li>
                    <li><a href="#">Alterar Dados</a>
                    <ul>
                        <li><a href="Altera_pass_funcionario.php">Alterar Password</a></li>
                    </ul> 
                    </li>  
                   
                </ul>
            </div>
            </div>

            </header>
	<?php 
}else{
     echo "<script>alert('Este acesso e restrito a Funcionarios')</script>";
            echo "<script> window.history.go(-1)</script>";
    
}
}
        ?>
        </body>
	
</html> 
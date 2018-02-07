<?php
include_once 'Funcoes_bd.php';
include_once 'mysql.connect.php';
ligar_base_dados();
session_start();

if(isset($_SESSION['login'])){
      $login= $_SESSION['login'];
      $pass = $_SESSION['password'];
      

   $query_pass = "select * from data_password where login_Uti = '$login'";
   $sql = mysql_query($query_pass);
   if(mysql_num_rows($sql)>0){
      $dado= mysql_fetch_array($sql);
        $data_mysql = $dado['data'];
        $timestamp = strtotime($data_mysql);   //gerar timestamp de uma data em mysql
        $data_prevista = date('Y/d/m', $timestamp);
        $data_atual = date('Y/d/m');
        if($data_atual> $data_prevista){
        header('location:obrigapw.php'); 
            
        }
     
   
   
        }
      

$query ="SELECT * from utilizador WHERE login_Uti='$login'";
$sql = mysql_query($query);
$dado= mysql_fetch_array($sql);       
       $tipo = $dado['tipo'];
       
            
    

if($tipo == 1){
    
    

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

                        <?php
                            $query1 = "SELECT * FROM cliente";
                            $sql1 = mysql_query($query1);
                            while ($dados1 = mysql_fetch_array($sql1)) {                       
                                if ($login == $dados1['login_Uti']){ ?>
                                    <ul> 
                                        <li>Olá Sr(a). <?= $dados1['nome_cliente'] ?> | <a href="sair.php">Logout</a></li>
                                    </ul>
                        <?php }} ?>
                    </div>
                    <div id="level1">
                        <ul> <li> <p> BEM-VINDO À NOSSA LOJA ONLINE! </p> </li> <li></ul>        
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
                <div id='carrinhoComp'>
                     <a id="carrinho" title="carrinho" href='carrinho.php'>
                    <img src="carrinho2.png" width="60" height="60">
                    
                     </a>
                </div>  
                <div>
                <ul>
                    <li><a href="mainPageCli.php"> Home </a></li>
                    <li><a href="#">Produtos</a>
                    <ul>
                        <li><a href="ListaProdutosCli.php">Lista de Produtos</a></li>
                        <li><a href="chequeOferta.php">Cheque Oferta</a></li>
                    </ul></li>
                    <li><a href="#">Área do Cliente</a>
                    <ul>
                        <li><a href="wishList.php">Wishlist</a></li>
                        <li><a href="PerfilCliente.php">Perfil</a></li>
                        <li><a href="ListarCompras.php">Histórico de Compras</a></li>
                        <li><a href="ListarCompras_AguardaPagamento.php">Cancelar Compras</a></li>
                        <li><a href="devolucao.php">Devoluções</a></li>
                        <li><a href="verificaCheque.php">Verificar Cheques Oferta</a><li>
                        <li><a href="ClienteAlteraDados.php">Alterar Dados</a></li>
                    </ul>
                    </li>
                    <li><a href="newsletterCli.php">Newsletter</a></li>
                    <li><a href="commentCli.php">Comentário</a></li>
                    <li><a href="conversorCli.php">Conversor</a></li>
                    <li><a href="###">Ajuda</a>
                        <ul>
                            <li><a href="Ajuda.php">Questoes</a></li>
                            <li><a href="Localizacao.php">Lojas Fisicas</a></li>
                        </ul>
                    
                    </li>
                    <li>  
                         <form  method="post" action="inf_prod_cli.php"  id="searchform"> 
                             <input  type="text" required name="name"> 
                        <input  type="submit" name="submit" value="Search"> 
                        </form> 
                    </li>
                    <li style="float:right"><a href="#">€ <img src="triangulo.png" width="10" height="10"></a>
                                <ul>
                                    <li> <a href="altera_moedaCli.php?id=1">€</a></li>
                                    <li> <a href="altera_moedaCli.php?id=2"> $</a></li>
                                </ul>
                            </li>
                </ul>
                </div>
            </div>
                
            </div>

            </header>
<?php 
}else{
     echo "<script>alert('Este acesso e restrito ')</script>";
            echo "<script> window.history.go(-1)</script>";
    
}
}else{
    echo "<script>alert('Este acesso e restrito ')</script>";
            echo "<script> window.history.go(-1)</script>";
}
?>
        </body>
	
</html> 

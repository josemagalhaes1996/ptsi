<html>
    <head>
        <script type="text/javascript" src="RegistoProduto.js"></script>
    </head>
    <body>
<?php

include_once 'Funcoes_bd.php';
include_once 'mysql.connect.php';
ligar_base_dados();

if (isset($_REQUEST['acao'])) {
    $numero = $_REQUEST['numero_produto'];
    $quantidade_introduzida=$_REQUEST['quantidade'];
    $query = "SELECT* FROM `gardencorporation`.`produto` WHERE `produto`.`numero_produto` = $numero";
    $sql = mysql_query($query);
    $linha = mysql_fetch_array($sql);
    $quantidade= $linha['quantidade_produto'];
    if($quantidade_introduzida > $quantidade){
         header("location:stock_1.php?id=$numero");
    }else{
    $quantidade_total=$quantidade - $quantidade_introduzida;
    insere_quantidade($numero, $quantidade_total);
echo "<script> history.go(-1)</script>";
    }
    

    
    }
 
?>
    </body>
</html>

<?php
session_start();
include_once 'Funcoes_bd.php';
ligar_base_dados();
if (isset($_GET['cod'])) {
  $cod = $_GET['cod'];
 
    $query="SELECT * FROM produto where numero_produto='$cod'";
    $sql = mysql_query($query);
    while($linha = mysql_fetch_array($sql)){
       $quantidade= $linha['quantidade_produto'];
       
    }

  if($quantidade<=0){
      
      echo "<script>	if (confirm('Este produto de momento nao contem quantidade de stock, deseja adicionar a whishList?')){ 
      	window.open('wishList.php?cod=$cod') 
   	}else{ history.go.back(-1)}</script>";
      
     // echo "<script>window.open('wishList.php?cod=$cod ')</script>";
      echo "<script>window.close()</script>";
             
      
        
 }else{

     header("location: carrinho.php?cod='$cod'");
      
  }
  

  
 }

?>
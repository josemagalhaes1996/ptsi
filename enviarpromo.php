<?php
 include_once 'mysql.connect.php';
 include_once 'Funcoes_bd.php';
 ligar_base_dados();
 session_start();
if(isset( $_SESSION['login'])){
    $login = $_SESSION['login'];

$query_busca = "Select * from newsletter";
$sql_busca = mysql_query($query_busca);
while($dado = mysql_fetch_array($sql_busca)){
$emailnewletter = $dado['email'];
$mensagem="A Empresa Garden Corporation vem por este meio informar todos os nossos subcritores sobre as nossas promoçoes, APOVEITE!!!"."\r\n";

$produtos_Promo = "select * from promocao";
$sql_cli = mysql_query($produtos_Promo);
if(mysql_num_rows($sql_cli)> 0){
while($clientes = mysql_fetch_array($sql_cli)){
$numero_produto = $clientes['numero_produto'];
$preco_promo = $clientes['preco_promocao'];
$preco_real=$clientes['preco_real'];

//saber nome do produto 
$query_nome="select * from produto where numero_produto = '$numero_produto'";
$sql_nome_p = mysql_query($query_nome);
if(mysql_num_rows($sql_nome_p)>0){
    while ($produto = mysql_fetch_array($sql_nome_p)){
$nome= $produto['nome_produto'];
    

$mensagem.="Nome Produto: "."$nome"." ,ANTES ".$preco_real."€ "." AGORA ".$preco_promo."€ ".","."\r\n" ;
}
}
}


$mensagem.="\r\n";
$mensagem.="Veja tambem os nossos produtos recentes!!! "."\r\n";

 $query = "SELECT * FROM produto ORDER BY numero_produto DESC LIMIT 7";
    $sql = mysql_query($query);
      while ($dados = mysql_fetch_array($sql)) {
    $nomeprodt= $dados['nome_produto'] ;
    $mensagem.="Nome Produto: "."$nomeprodt"."\r\n" ;                             
      
    
    }
                     
$mensagem.="Melhores Cumprimentos "."\r\n";
$mensagem.="Garden Corporation SA";

$header = 'MIME- Version: 1.1'."/r/n";
  $header .= 'Content-type: text/plain; charset=iso-8859-1'."\r\n";
 $header .= 'From:gardencorporationpw@gmail.com'."\r\n";//remetente
 $header .= 'Return-Path:a75409@alunos.uminho.pt'."\r\n";//recetor
 $envio = mail($emailnewletter,'NEWSLETTER',$mensagem,$header);
 
 

 }else{
 echo "<script>alert('Nao existem promoçoes de momento para enviar')</script>";    
}
 echo "<script>history.go(-1)</script>";
}
}else{
     echo "<script>history.go(-1)</script>";
}
?>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'Funcoes_bd.php';
ligar_base_dados();

if(isset($_GET['total'])){

   $total = $_GET['total'];
   $referencia =$_GET['referencia'];
   $morada=$_GET['destino'];
   $cliente=$_GET['cliente'];

   $query ="select * from cliente where login_Uti='$cliente' ";
   $sql = mysql_query($query);
   if(mysql_num_rows($sql)>0){
       while( $dados = mysql_fetch_array($sql)){
      
           $nome = $dados['nome_cliente'];
           $nif = $dados['NIF'];
          
       }
       
   }
   
require_once("dompdf/dompdf_config.inc.php");

$data =date("Y-m-d h:m");
$html="
<html>
    <body style='background-color:#CCFFCC; '>



<div style='margin-top:35%;'>
<div style='margin-top:0%;'><strong>Login:</strong><p>$cliente</p></div>
   <div style='margin-top:0%;'><strong>Nome::</strong><p>$nome</p></div>
     <p><strong>NIF:</strong>$nif</p>
<h1 style='color:green;text-align: center;'> Garden Coorporation </h1>
    <hr>
    <div align='center' style='font-size:15px;'><strong> Data de emissao da referencia:</strong></div> 
    <div align='center'><p>$data</p></div>
    
    <div align='center'> <strong> Entidade:</strong> 91562</div>
    <div align='center'><strong>Total  Pagamento:</strong><p>$total euros</p></div>
    <div align='center'><strong>Referencia :</strong><p>$referencia</p></div>
    <div align='center'><strong>Morada:</strong><p>$morada</p></div>
    
    <hr>
    
    <div align='center'> Obrigado pela sua preferencia!! <em>Garden Corportarion </em></div>
    <div>
</body></html>
";



$dompdf = new Dompdf();
$dompdf->load_html($html);


$dompdf->render();
$dompdf->stream(pdf_rel.php);
       
}
?>


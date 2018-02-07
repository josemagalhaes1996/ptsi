<!DOCTYPE html>
<html>
<?php
include_once 'Funcoes_bd.php';
include_once 'mysql.connect.php';
ligar_base_dados();
 session_start();

 
    if(isset( $_SESSION['login'])){
    $login = $_SESSION['login'];
 
    if(isset($_REQUEST['id'])){
   $id=$_REQUEST['id'];
   
   
   }
   
if(isset($_REQUEST['comment1'])){
    $resposta2 = $_REQUEST['comment1'];
    $id2 = $_REQUEST['acao'];
    
    $query= "select * from comentarios where 	num_comm='$id2'";
    $sql=  mysql_query($query);
    if(mysql_num_rows($sql)>0){
    $dados = mysql_fetch_array($sql);
    $email = $dados['email_comm'];
    $nome = $dados['name'];
$mensagem.="Boa tarde:"."$nome´"." $resposta2".","."\r\n" ;

$mensagem.="Melhores Cumprimentos "."\r\n";
$mensagem.="Garden Corporation SA";
$header = 'MIME- Version: 1.1'."/r/n";
 $header .= 'Content-type: text/plain; charset=iso-8859-1'."\r\n";
 $header .= 'From:gardencorporationpw@gmail.com'."\r\n";//remetente
 $header .= 'Return-Path:a75409@alunos.uminho.pt'."\r\n";//recetor
 $envio = mail($email,'Resposta Comentarios Garden Corporation',$mensagem,$header);
 
 if($envio){
     echo "Mensagem enviada com sucesso";
 }else{
     echo "Mensagem nao pode ser enviada!";
 }

    
        
    
    
    
    

$query="UPDATE `gardencorporation`.`comentarios` SET `resposta_comm` = '$resposta2' WHERE `comentarios`.`num_comm` =$id2;";
mysql_query($query);




echo "<script>window.opener.location.href='aprova_comment.php'; </script>";
echo"<script>window.close()</script>";

}

 }?>
                        
	<head> 
		<title> Resposta ao Cliente </title>
		<link rel="stylesheet" type="text/css" href="mainPage.css" />
		<meta charset="UTF-8"/>
                <link rel="shortcut icon" href="gardenlogo.png" type="image/x-icon"/>
	</head>
        
	<body>
            <div id="commentbody">
                
                <div id="commentzone" class="commentbox">
                    <form action="responder_comment.php" method='post'>
                        <label>Resposta:<br/>
                        <input type="hidden" name="acao" value="<?php echo $id ?>">
                        <textarea name="comment1" class="comm2" cols="45" rows="5" required id="comment" ></textarea></label> <br/>
                        
                        <input type='submit' value='Submit' name="cmt" >
                    </form>
                </div>                             
            </div>
        </body>
        

</html> 
<?php 
include 'footersimple.php';

    }
?>
	
<!DOCTYPE html>
<html>
<?php
include 'headerAdmin.php';
include_once 'Funcoes_bd.php';
include_once 'mysql.connect.php';
ligar_base_dados();
?>
    
	<head> 
		<title> Garden Corporation </title>
		<link rel="stylesheet" type="text/css" href="mainPage.css" />
		<meta charset="UTF-8"/>
                <link rel="shortcut icon" href="gardenlogo.png" type="image/x-icon"/>
	</head>
        
	<body>
            <div id="mainbodymp">
                
                <div >
                    <div id="novosprodutosbar">
                        <h3 class="bar-title" style="padding: 0.5%;">Comentários Rejeitado</h3>
                    </div>
                    <?php 
                    $query="SELECT * FROM comentarios where estado_comm='Comentario Rejeitado'";
                    $sql=  mysql_query($query);
                    $row= mysql_num_rows($sql);
                    if($row > 0){
                        while($linha= mysql_fetch_array($sql)){
                            $nome = $linha['name'];
                            $comentario = $linha['texto'];
                            $emailcomm = $linha['email_comm'];
                            $estado = $linha ['estado_comm'];
                            
                         ?>
                    <b style="padding: 0.5%;"> <?php echo $nome ?> </b><br>
                    <strong>Email </strong> <?php echo $emailcomm ?> <br>
                    <strong>Comentario </strong>    <?php echo  $comentario ?> <br>
                        <hr>
                    <?php }} ?>
                </div>
                
              
                
            </div>
          
        </body>
        
<?php 
include 'footersimple.php';
?>
	
</html> 
<!DOCTYPE html>
 
<?php
include 'headerAdmin.php';
include_once 'Funcoes_bd.php';
include_once 'mysql.connect.php';
ligar_base_dados();
?>

<html>
	<head> 
		<title> Garden Corporation </title>
		<link rel="stylesheet" type="text/css" href="mainPage.css" />
		<meta charset="UTF-8"/>
                <link rel="shortcut icon" href="gardenlogo.png" type="image/x-icon"/>
	</head>
        
	<body>
            
            <div id="mainbodymp">
               <!-- <div id="slider">
                </div> -->
               <div id="novosprodutosbar">
                   <h3 class="bar-title" style="padding: 0.5%;">Administrador</h3>
               </div>
                <div id='perfil' style="padding: 0.5%;">
                   <p>Aqui é onde pode consultar e configurar alguns dados gerais da página.</p>
               </div>
            </div>
            <br>
	</body>
        
<?php 

include 'footersimple.php';
?>
	
</html> 
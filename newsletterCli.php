<!DOCTYPE html>
 
<?php
include 'headerCli.php';
include_once 'Funcoes_bd.php';
include_once 'mysql.connect.php';
ligar_base_dados();
?>

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
            
            <div id="mainbodymp">
                <div id="novosprodutosbar">
                    <h3 class="bar-title" style="padding: 0.5%;">Newsletter</h3>
                </div>
                
                <div id="newsletterdiv">
                    <div id="textonews">
                        <marquee>       <p style="font-size: 22px"> Esteja atento às novas novidades da loja! Subscreva já a sua newsletter mensal! </p></marquee>
                    </div>
                    <form method="post" action="newsletterCli.php" enctype="multipart/form-data">
                        <p> <br/>
                        <label id="login" for="login">Subscrição:</label>
                        <input type="email" name="subscricao" required id="login" placeholder="Insira o seu email">
                        </p>
                        <input type="hidden" value="enviado" name="acao">
                        <p> <button id="button-sub" type="Submit" >Submeter</button> </p>
                    </form>
                    
                        <?php
                        if(isset($_POST['acao'])){                                              
                        $selecao = ($_POST['subscricao']);
                       
                        $query = "SELECT * FROM newsletter where email='$selecao'";
                        $sql = mysql_query($query);
                        $row = mysql_num_rows($sql);
                        if($row > 0){   
                        while ($dados = mysql_fetch_array($sql)){
                           if ($dados['email'] == $selecao){
                               echo "<script>alert('Email já existente!')</script>";
                               echo "<script> window.history.go(-1)</script>";
                           }else{
                               $query2="INSERT INTO `gardencorporation`.`newsletter` (`email`) VALUES ('$selecao');";
                               $sql2= mysql_query($query2);
                               echo "<script>alert('Submetido com sucesso!')</script>";
                               echo "<script> window.history.go(-1)</script>";
                                 }                         
                        }
                        }else {
                       $query3="INSERT INTO `gardencorporation`.`newsletter` (`email`) VALUES ('$selecao');";
                       $sql2= mysql_query($query3);
                       echo "<script>alert('Submetido com sucesso!')</script>";
                       echo "<script> window.history.go(-1)</script>";
                       } 
                       }
                       ?>
                    
                    
                </div>
            </div>
	</body>
        
<?php 
include 'footer.php';
include 'footersimple.php';
?>
	
</html> 
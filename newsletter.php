<!DOCTYPE html>
 
<?php
include 'headerAnon.php';
include_once 'Funcoes_bd.php';
include_once 'mysql.connect.php';
ligar_base_dados();
?>

<html>
	<head> 
		<title> Garden Corporation </title>
		    <?php
           
            
            if (isset($_COOKIE["css"])) {
           
          
            ?>  <link rel="stylesheet" type="text/css" href="<?php echo $_COOKIE["css"]; ?>" />
              <?php  
            } else {
               
                 $name = "css";
                $value = "css_original/MainPage.css";
                $time = time() + (3 * 24 * 3600);
                setcookie($name, $value, $time, "/");
               
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
                    <form method="post" action="newsletter.php" enctype="multipart/form-data">
                        <p> <br/>
                            <label id="login"  style=" padding: 0.5%;"for="login">Subscrição:</label>
                        <input type="email" name="subscricao" required id="login" placeholder="Insira o seu email">
                        </p>
                        <input type="hidden" value="enviado" name="acao">
                        <p> <button  style="margin-left: 1%;"id="button-sub"  type="Submit" >Submeter</button> </p>
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
                        }
                       else {
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
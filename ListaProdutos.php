<!DOCTYPE html>
 
<?php
include 'headerAnon.php';
include_once 'Funcoes_bd.php';
include_once 'mysql.connect.php';
ligar_base_dados();

 if(isset($_COOKIE['moeda'])){
                $dollar ="dollar";
                $euro="euro";
                $moeda = $_COOKIE['moeda'];
             
                
            }else{
                  $name = "moeda";
                $value = "euro";
                $time = time() + (86400);
                setcookie($name, $value, $time, "/");
            }
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
               <!-- <div id="slider">
                </div> -->
               <div id="novosprodutosbar">
                   <h3 class="bar-title" style="padding: 0.5%;">Em Venda</h3>
               </div>
               <?php
                $query = "SELECT * FROM produto";
                $sql = mysql_query($query);
                while ($dados = mysql_fetch_array($sql)) {
                    $verifica = $dados['numero_produto'];
                ?>
                    <ul class="produtos">
                        <li class="item">
                            <div id="listagem" style="margin-left: 8%;">
                            <div class="wrapper">
                                    <a class="imagemprod" title="<?= $dados['nome_produto'] ?>">
                                    <img src="<?= $dados ['imagem'] ?>" width="125" height="100">
                                        </a>
                                <div class="infoproduto" id="infoprod">
                                        <h3><a title="<?= $dados['nome_produto'] ?>"><?= $dados ['nome_produto']?></a></h3>
                                          <?php 
                                       if($moeda==$dollar){
                                       $preco= $dados['preco']; 
                                       $valor = $preco * 1.08313; 
                                       
                                           ?>
                                        <h4><a title="<?= $dados['nome_produto'] ?>"><?php echo  $valor ?></a>$</h4>
                                        <?php
                                                    
                                    
                                         
                                           
                                       }else{
                                          ?>  <h4><a title="<?= $dados['nome_produto'] ?>"><?php echo  $dados['preco'] ?></a>€</h4> 
                                       <?php }
                                       
                                       ?>
                                </div>
                            </div>
                            </div>
                        </li>
                    </ul>
                <?php } ?>
            </div>
	</body>
        
<?php 
include 'footer.php';
include 'footersimple.php';
?>
	
</html> 
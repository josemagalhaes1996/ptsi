<?php
include 'headerCli.php';
include_once 'Funcoes_bd.php';
include_once 'mysql.connect.php';
ligar_base_dados();
?><html>
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
            <!-- <div id="slider">
             </div> -->
            <div id="novosprodutosbar">
                <h3 class="bar-title">Pagamento Sem sucesso</h3>
                  
                    
            </div>
            <div id="abaixo_pag">
                Senhor/a <?= $login ?> , a compra foi cancelada.Tente novamente. Obrigado<br>
                Garden Corporation SA<br>
                  <a href="mainPageCli.php"> Voltar Pagina Principal </a>
                
            </div>
        
        </div>
        <?php 
        include 'footer.php';
        ?>
    </body>
</html>

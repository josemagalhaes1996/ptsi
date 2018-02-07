<?php
include_once 'mysql.connect.php';
include 'Funcoes_bd.php';
include_once 'headerCli.php';
ligar_base_dados();
?>
<html>
    <header>
 <?php
                 $query_css="select * from css where login_Uti='$login'";
                 $sql_css = mysql_query($query_css);
                 if(mysql_num_rows($sql_css)>0){
                     $css=  mysql_fetch_array($sql_css);
                     $mainPage=$css['Rproduto'];
                 
                     ?><link rel="stylesheet" type="text/css" href="<?php echo $mainPage; ?>" /><?php
                 }else{
                 $css_insert ="INSERT INTO `gardencorporation`.`css` (`mainPage`, `Rproduto`, `Ines`, `login_Uti`) VALUES ('css_original/MainPage.css', 'css_original/Rproduto.css', 'css_original/Ines.css', '$login');";
               $sql_insert=  mysql_query($css_insert);
?>
            <link rel="stylesheet" type="text/css" href="css_original/mainPage.css" />   
           <?php             
                 }
                 
            
            ?>
        <script type="text/javascript" src="RegistoProduto.js"></script>
        <meta charset="UTF-8">
    </header>
    <body>
        <div id="mainbody">
            <div id="novosprodutosbar">
                <h1 id="-titulo_bonus" style="padding: 0.5%;"<em>Garden Corporation Lojas</em></h1> 
            </div>
            <div id="abaixo_pag">
            <h2 id="titulo_2">Localizaçao:</h2>
            <div id="google">
                <iframe id="google_java" src="https://www.google.com/maps/embed?pb=!1m0!3m2!1spt-PT!2spt!4v1447811354906!6m8!1m7!1s99SLXFBKpJly20ymWYvYcA!2m2!1d41.5513233!2d-8.4287833!3f90.0957251735838!4f-9.02778980233613!5f0.7820865974627469" width="625" height="415" frameborder="0" style="border:0; margin-left: 4%;" allowfullscreen></iframe>
                
            </div>
            <div id="par1">
                <p > A Garden Corporation devido a sua evolucao constante , contem de momento duas lojas, ambas localizadas na regiao de Braga: </p>
                <br>
                <hr>
                <div>
                 
                    <?php 
                    $query1 = "select * from Loja";
                            $sql = mysql_query($query1);
                    while ( $dado = mysql_fetch_array($sql)){
                        $numero = $dado['numero'];
                        $morada = $dado['Morada'];
                        $codigo_psotal = $dado['codigo_postal'];
                        $tel = $dado['telefone'];
                        $fax =$dado['fax'];
                        
                    
                    ?>
                    <a id="muda_loca"  onclick="mudar_google1()" style="color:red ; margin-left: 5%;" ><strong>Loja <?php echo $numero ?>:</strong>  </a>   
                    <p><strong>Morada:</strong><?php echo $morada ?></p>
                    <p><strong>Codigo Postal:</strong><?php echo $codigo_psotal ?></p>
                    <hr size="1" style="border:1px dashed gray;">
                    <p><strong>Telefone:</strong><?php echo $tel ?></p>
                    <p><strong>Fax:</strong><?php echo $fax ?></p>
                    <hr size="1" style="border:1px dashed gray;">
                    <br>
                    <br>
                    <hr>
                    
                <?php 
                    }
                  
                ?>
                </div>
            </div>
            </div>
       
        </div>
        <br>
        <?php 
                    
                    include 'footer.php';
                    include 'footersimple.php';
                ?>
    </body>
</html>
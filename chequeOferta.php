<?php
include_once 'mysql.connect.php';
include_once 'Funcoes_bd.php';
ligar_base_dados();
include_once 'headerCli.php';
?> 
<html>
    <head>
        <title>Cheque Oferta</title>
         <?php
                 $query_css="select * from css where login_Uti='$login'";
                 $sql_css = mysql_query($query_css);
                 if(mysql_num_rows($sql_css)>0){
                     $css=  mysql_fetch_array($sql_css);
                     $mainPage=$css['Ines'];
                 
                     ?><link rel="stylesheet" type="text/css" href="<?php echo $mainPage; ?>" /><?php
                 }else{
                 $css_insert ="INSERT INTO `gardencorporation`.`css` (`mainPage`, `Rproduto`, `Ines`, `login_Uti`) VALUES ('css_original/MainPage.css', 'css_original/Rproduto.css', 'css_original/Ines.css', '$login');";
               $sql_insert=  mysql_query($css_insert);
?>
            <link rel="stylesheet" type="text/css" href="css_original/Ines.css" />   
           <?php             
}
                 
            
            ?>
        <meta charset="UTF-8">
    </head>

    <body>
        <div id="mainbodymp">
            <div id="novosprodutosbar">
                <h3 class="bar-title" style="padding :0.5%;"> Cheque Oferta</h3>
                
            </div>
                       <div id="montantecheque">
                <form method="post" action="chequeOferta.php">
                    <strong> Escolha o montante pretendido:</strong> <br><br>
                    <label><input type="radio" name="montantechque" required value="5" > 5€ </label><br>
                    <label><input type="radio" name="montantechque"  value="10" > 10€ </label><br>
                    <label><input type="radio" name="montantechque" required value="15" > 15€ </label><br>
                    <label><input type="radio" name="montantechque" required value="20" > 20€ </label><br>
                    <label><input type="radio" name="montantechque" required value="50" > 50€ </label><br>
                    <label><input type="radio" name="montantechque" required value="100" > 100€ </label><br>
                    <input id="confirmachequebutton" type="submit" value="Confirmar codigo">
                </form>

                <?php
                //quando carregar em gerar cheque
                $nao_tem = true;
                while (($nao_tem)) {

                    $rand = rand(00000000, 99999999);
                    $query55 = "select * from chequeoferta where cod_cheque='$rand'";
                    $sql55 = mysql_query($query55);
                    if (mysql_num_rows($sql55) > 0) {
                        
                    } else {

                        $nao_tem = false;
                    }
                }
                ?>



                <?php
                //quando carrega em confirmar cheque
                if (isset($_POST['montantechque'])) {

                    $montanteescolhido = ($_POST['montantechque']);
                    //quando carregar em gerar cheque
                        $nao_tem = true;
                        while (($nao_tem)) {

                            $rand = rand(00000000, 99999999);
                            $query55 = "select * from chequeoferta where cod_cheque='$rand'";
                            $sql55 = mysql_query($query55);
                            if (mysql_num_rows($sql55) > 0) {
                                
                            } else {

                                $nao_tem = false;
                            }
                        }                   
                 echo "<script>window.open('compra_chequeO.php?valor=$montanteescolhido&ref=$rand  ')</script>";
                    echo "<script>window.close()</script>";    
                   
                    
                    
                    
                    
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
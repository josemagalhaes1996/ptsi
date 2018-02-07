<?php
include_once 'Funcoes_bd.php';
include_once 'mysql.connect.php';
ligar_base_dados();
include_once 'headerCli.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Gerar multibanco</title>
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
    </head>

    <body>
        <div id="mainbodymp">
        <div id="novosprodutosbar">
            <h3 class="bar-title" style="padding:0.5%;">Referencia Multibanco</h3>
        </div>
        <div id="abaixo_pag">

           

            <div style="margin-left: 41%;">
                <?php
                $query43 = "SELECT * FROM cliente where login_Uti='$login'";
                 $sql43 = mysql_query($query43);
                if (mysql_num_rows($sql43) > 0) {
                $cli = mysql_fetch_array($sql43);
                $morada = $cli['morada'];
                 $bonus_cli = $cli['bonus'];
                
            
            }
             
                
                $query7 = "SELECT * FROM chequeoferta ORDER BY numero_cheque DESC LIMIT 1";
                $sql7= mysql_query($query7);
                $dado = mysql_fetch_array($sql7);
                $valor = $dado['valor'];
                $numero = $dado['numero_cheque'];
                $cod = $dado['cod_cheque'];
                
                $query8 = "SELECT * FROM compra ORDER BY numero_compra DESC LIMIT 1";
                $sql8= mysql_query($query8);
                $dado = mysql_fetch_array($sql8);
                
                $numeroc = $dado['numero_compra'];
                
                $rand = rand(1111111, 99999999);
                ?>
                
                Remetente: GardenCoorporantion <br>
                Entidade : 91562 <br>
                Total da Compra : <?php echo $valor ?> <br>
                Referencia : <?php echo $rand ?> <br>
                Destino : <?php echo $morada ?>

                
                <?php
                   // ver qual e a percentagem de bonus
              $query34 = "SELECT * from estatistica";
                $sql45 = mysql_query($query34);
                if (mysql_num_rows($sql45) > 0) {
                    while ($dado1 = mysql_fetch_array($sql45)) {
                        $bonus_compra = $dado1['numero_bonus'];
                    }
                }
                
                //bonus a adicionar
                //ja tiramos o bonus la em cima
                $bonus_adicionar = ($bonus_compra * $valor) / 100;
                $bonus_total = $bonus_adicionar + $bonus_cli;

                $query65 = "UPDATE `gardencorporation`.`cliente` SET `bonus` = '$bonus_total' WHERE `cliente`.`login_Uti` = '$login'";
                $sql65 = mysql_query($query65);
            
                ?>
                
                
                
                
                
            </div>
            <form action="multibancoCO.php" method="post">
                <input type="hidden" name ="enviado" value="enviado" >
                <input style="margin-left: 90%;" id="button_referencia_mul" type="submit" onclick="window.open('pdf_rel.php?total=<?php echo $valor ?>&referencia=<?php echo $rand ?>&destino=<?php echo $morada ?>&cliente=<?php echo $login ?>')" value="Confirmar">

            </form>


        <?php
        if (isset($_REQUEST['enviado'])) {

            echo "<script>alert('Compra realizada com  sucesso')</script>";

            echo "<script>window.open('mainPageCli.php');window.close();</script>";
        }
        ?>
        </div>
                    </div>

        <?php 
        include 'footer.php';
        include 'footersimple.php';
        ?>
    </body>
</html>
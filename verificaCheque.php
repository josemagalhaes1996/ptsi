<!DOCTYPE html>

<?php
include 'headerCli.php';
include_once 'Funcoes_bd.php';
include_once 'mysql.connect.php';
ligar_base_dados();

                if(isset($_SESSION['login'])){
                $login= $_SESSION['login'];
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
                <h3 class="bar-title" style="padding: 0.5%;">Lista Cheques Oferta</h3>            </div>
            <div id="scroll_tabela" style="margin-left: 1%;">
                 <?php
                            $sql = "SELECT * FROM chequeoferta where login_comprador = '$login'; ";
                            $query = mysql_query($sql);
                            $row = mysql_num_rows($query);
                            if ($row > 0) {
                                ?>
                            
                        <table id="table_editar_produto">
                            <caption></caption>
                            <th> Código Cheque Oferta </th>
                            <th> Valor </th>
                            <th> Estado </th>
                            <?php
                            $sql = "SELECT * FROM chequeoferta where login_comprador = '$login'; ";
                            $query = mysql_query($sql);
                            $row = mysql_num_rows($query);
                            if ($row > 0) {
                                while ($linha = mysql_fetch_array($query)) {
                                    $valor = $linha ['valor'];
                                    $cod_cheque = $linha['cod_cheque'];
                                    $estado = $linha['estado'];
                                    ?>

                                    <tr><td><?php echo $cod_cheque; ?></td>
                                        <td><?php echo $valor; ?></td>
                                        <td><?php echo $estado; ?></td>
                                   </tr>
                                <?php
                                }
                            }
                                ?>
                            
                             <?php } else {
                            ?>
                                    <div>
                                        <p style="color:red; text-align: center">Nao existem registos na base de dados</p>
                                    </div>
                                    <?php
                                    }
                                    ?>
                <?php } ?>  
                                   </table>
                        </div>
        </div>
        <div >
            <?php 
            include'footer.php';
                        include'footersimple.php';

            ?>
        </div>
    </body>
    

</html> 
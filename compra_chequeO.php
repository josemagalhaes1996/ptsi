<?php
include_once 'Funcoes_bd.php';
include_once 'mysql.connect.php';
ligar_base_dados();
include_once 'headerCli.php';


if (isset($_GET['valor'])) {
    $valor = $_GET['valor'];
    $rand = $_GET['ref'];
    $query6 = "INSERT INTO `gardencorporation`.`compra` (`numero_compra`, `login_Uti`, `tipo_pagamento`, `estado`, `data`, `total_compra`, `tipo`) VALUES (NULL, '$login', '', 'Expedida', CURRENT_TIMESTAMP, '$valor', 'Cheque Oferta');";
    $sql6 = mysql_query($query6);


    $query7 = " INSERT INTO `gardencorporation`.`chequeoferta` (`numero_cheque`, `valor`, `cod_cheque`, `estado`, `login_comprador`) VALUES (NULL, '$valor', '$rand', 'disponivel', '$login');";
    $sql7 = mysql_query($query7);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Escolha de Pagamento</title>
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
                     <link rel="stylesheet" type="text/css" href="css_original/Rproduto.css" />   
           <?php             
}
                 
            
            ?>
        <script type="text/javascript" src="RegistoProduto.js"></script>
        <meta charset="UTF-8">
    </head>

    <body>
        <div id="mainbodymp">
        <div id="novosprodutosbar">
            <h3 class="bar-title" style="padding:0.5%;">Confirmaçao de Venda</h3>
        </div>
            <div id="abaixo_pag">
                <div id="esc_pagamento">
                    <h3> Escolha o pagamento </h3>
                </div>
                <br>
                <div>
                    <p style="margin-left: 2%;">***** A escolha realizada terá de cobrir a totalidade de compra****</p>
                </div>
                <div id="Escolha_radio">

                    <form action="compra_chequeO.php" method="Post">
                        <input type="radio" name="escolha"  checked="checked" value="multibanco"><strong>Multibanco</strong><br>
                        <input type="radio" disabled name="escolha" value="chequeO"><strong>Cheque Oferta</strong><br>
                        <input type="radio" name="escolha" value="bonus"><strong>Bonus</strong><br>
                        <input type="radio" name="escolha"  disabled value="payPal"><strong>Paypal - </strong> <em>Brevemente</em>
                        <input id="proximo_input" type="submit" value="PROXIMO" >
                    </form>    
                </div>  

                <br>
                <br>

            </div>       

        </div><br>
<?php
        include 'footer.php';
if (isset($_REQUEST['escolha'])) {
    $query7 = "SELECT * FROM chequeoferta ORDER BY numero_cheque DESC LIMIT 1";
    $sql7 = mysql_query($query7);
    $dado = mysql_fetch_array($sql7);
    $valor = $dado['valor'];
    $numero = $dado['numero_cheque'];
    $cod = $dado['cod_cheque'];

    $query8 = "SELECT * FROM compra ORDER BY numero_compra DESC LIMIT 1";
    $sql8 = mysql_query($query8);
    $dado = mysql_fetch_array($sql8);

    $numeroc = $dado['numero_compra'];




    $escolha = $_REQUEST['escolha'];


    if ($escolha == "multibanco") {
        $query12 = "UPDATE `gardencorporation`.`compra` SET `tipo_pagamento` = '1' WHERE `compra`.`numero_compra` = $numeroc;";
        $sql12 = mysql_query($query12);
        echo "<script>alert('compra realizada com sucesso , cheque ja se encontra disponivel , codigo $cod')</script>";
        echo "<script>window.open('multibancoCO.php')</script>";

        echo "<script>window.close()</script>";
    }

    if ($escolha == "bonus") {

        $query1 = "SELECT * FROM cliente where login_Uti ='$login'";
        $sql = mysql_query($query1);
        $dados = mysql_fetch_array($sql);
        $bonus = $dados['bonus'];

        if ($bonus < $valor) {
            echo "<script>alert('Nao tem bonus suficiente para pagamento')</script>";
            $query2 = "DELETE FROM `gardencorporation`.`chequeoferta` WHERE `chequeoferta`.`numero_cheque` = $numero";
            $sql2 = mysql_query($query2);

            $query3 = "DELETE FROM `gardencorporation`.`compra` WHERE numero_compra='$numeroc'";
            $sql3 = mysql_query($query3);
        } else {

            $bonus_final = $bonus - $valor;
            $query78 = "UPDATE `gardencorporation`.`cliente` SET `bonus` = '$bonus_final' WHERE `cliente`.`login_Uti` = '$login'";
            $sql78 = mysql_query($query78);




            $query13 = "UPDATE `gardencorporation`.`compra` SET `tipo_pagamento` = '2' WHERE `compra`.`numero_compra` = $numeroc;";
            $sql13 = mysql_query($query13);
            echo "<script>alert('compra realizada com sucesso , cheque ja se encontra disponivel , codigo $cod')</script>";
             echo "<script>window.open('mainPageCli.php')</script>";
                    echo "<script>window.close()</script>";
        }
    }
}
?> 
        <button type="button" id="voltar_car" onclick="window.close();
                window.open('chequeOferta.php');">Voltar </button>
       
    </body>
</html>
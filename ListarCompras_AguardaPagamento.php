<!DOCTYPE html>
 <?php
        include_once 'funcoes_bd.php';
        include_once 'mysql.connect.php';
        include_once 'headerCli.php';
        ligar_base_dados();
        ?>
<html>
    <head>
        <title> Cancelar Compras </title>
        <meta charset="UTF-8"/>
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
            <link rel="stylesheet" type="text/css" href="css_original/mainPage.css" />   
           <?php             
                 }
                 
            
            ?>
        <script type="text/javascript" src="RegistoCF.js"></script>
    </head>

    <body id="Body_Cliente">

       

        <div>
            <div id="mainbodymp">
                <div id="novosprodutosbar">
                    <h3 class="bar-title" style="padding:0.5%;">Cancelar Compra</h3>
                </div>
                <form name="form" method="post" action="ListarCompras.php" enctype="multipart/form-data">
                    <pre>
                
                








                    </pre>
                    <div id="botoes">
                        <p>
                            <input type="hidden" value="enviado" name="acao">
                            <input id="button-registar" type="button" value="Voltar" onclick="window.history.go('-1');">

                        </p>
                    </div>
                </form>
           
        
        <div id="scroll_tabela_ines">
            <table id="table_editar_cliente">
                <th> Numero da compra </th>
                <th> Tipo de Pagamento </th>
                <th> Total </th>
                <th> Estado </th>
                <th> Data </th>
                <th> Cancelar </th>
                <th>Informaçoes</th>

                <?php
                $query = "SELECT * FROM compra WHERE `compra`.`login_Uti` = '$login'";
                $sql = mysql_query($query);
                $row = mysql_num_rows($sql);
                if ($row > 0) {
                    while ($linha = mysql_fetch_array($sql)) {
                        $numero_compra = $linha['numero_compra'];
                        $tipoPagamento = $linha['tipo_pagamento'];
                        $estado = $linha['estado'];
                        $data = $linha['data'];
                        $total = $linha['total_compra'];
                        
                        $query55 ="select * from pagamento where tipo_pagamento='$tipoPagamento'";
                            $sql55 = mysql_query($query55);
                            while($paga = mysql_fetch_array($sql55)){
                            $nome = $paga['descricao'];
                            }
                        ?>

                        <?php
                        if ($estado == "Aguarda Pagamento") {
                            ?>
                            <tr><td><?php echo $numero_compra; ?></td>
                                <td><?php echo $nome; ?></td>
                                <td><?php echo $total; ?> €</td>
                                <td><?php echo $estado; ?></td>
                                <td><?php echo $data; ?></td>

                                <td><a href="CancelarCompra.php?id=<?php echo $numero_compra ?>" onclick="return eliminar_compra();">Cancelar Compra</a></td>
                                <td><a  onclick="window.open('InformacoesCompra.php?id=<?php echo $numero_compra ?>')"  style="color:green" >Detalhes</a></td>
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
                            </table>
</div>
</div>
             </div>
        <?php
        include_once 'footer.php';
        include_once 'footersimple.php';
        ?>
 
    </body>

</html>
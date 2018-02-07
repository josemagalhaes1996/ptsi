<!DOCTYPE html>
<?php
        include_once 'funcoes_bd.php';
        include_once 'mysql.connect.php';
        include_once 'headerCli.php';
        ligar_base_dados();
        ?>

<html>
    <head>
        <title> Listar Compras </title>
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
                    <h3 class="bar-title" style="padding:0.5%;">Histórico de Compras</h3>
                </div>
                <form name="form" method="post" action="ListarCompras.php" enctype="multipart/form-data">
                    <div id="opcoes">
                        <p>****Aqui poderá visualizar todas as compras realizadas na GardenCorporation****</p>

                        <select name="opcao">
                            <option value="Todas">Todas</option>
                            <option value="Expedida">Expedida</option>
                            <option value="Em Tratamento">Em Tratamento</option>
                            <option value="Aguarda Pagamento">Aguarda Pagamento</option>
                              <option value="Devolvida">Devolvidas</option>
                        </select>    
                        <input type="submit" value="Mostrar Compras">
                    </div>
                    <div style="margin-top: 17%;">
                <?php
if( isset($_REQUEST['opcao'])){
    $_SESSION['compra_cliente'] = $_REQUEST['opcao'];

    
}
?>
                








                    </div>
                    
                </form>
         
        <?php
        if (!(isset($_SESSION['compra_cliente'])) || ($_SESSION['compra_cliente'] == "Todas")) {
            ?>
            <div id="scroll_tabela_ines">
                <table id="table_editar_cliente" style="margin-top: 1%;">
                    <th> Numero da compra </th>
                    <th> Tipo de Pagamento </th>
                    <th> Total </th>
                    <th> Estado </th>
                    <th> Data </th>
                    <th> Informações </th>

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
                            <tr><td><?php echo $numero_compra; ?></td>
                                <td><?php echo $nome; ?></td>
                                <td><?php echo $total; ?> €</td>
                                <td><?php echo $estado; ?></td>
                                <td><?php echo $data; ?></td>
                               <td><a  onclick="window.open('InformacoesCompra.php?id=<?php echo $numero_compra ?>')">Informações</a></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
            </div>
            <?php
        } else {
            ?>  
            <div id="scroll_tabela_ines">
                <table id="table_editar_cliente"  style="margin-top: 1%;">
                    <caption></caption>
                    <th> Numero Compra </th>
                    <th> Tipo Pagamento </th>
                    <th> Total </th>
                    <th> Estado </th>
                    <th> Data </th>
                    <th> Informações </th>

                    <?php
                    if ($_SESSION['compra_cliente']== "Aguarda Pagamento") {
                        $query = "SELECT * FROM compra WHERE `login_Uti` = '$login' AND estado='Aguarda Pagamento'";
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
                                <tr><td><?php echo $numero_compra; ?></td>
                                    <td><?php echo $nome; ?></td>
                                    <td><?php echo $total; ?> €</td>
                                    <td><?php echo $estado; ?></td>
                                    <td><?php echo $data; ?></td>
                                     <td><a  onclick="window.open('InformacoesCompra.php?id=<?php echo $numero_compra ?>')">Informações</a></td>
                                </tr>
                                <?php
                            }
                        }
                    }

                    if ($_SESSION['compra_cliente'] == "Expedida") {
                        $query = "SELECT * FROM compra WHERE `login_Uti` = '$login' AND estado='Expedida' and tipo=''";
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
                                <tr><td><?php echo $numero_compra; ?></td>
                                    <td><?php echo $nome; ?></td>
                                    <td><?php echo $total; ?> €</td>
                                    <td><?php echo $estado; ?></td>
                                    <td><?php echo $data; ?></td>
                                     <td><a  onclick="window.open('InformacoesCompra.php?id=<?php echo $numero_compra ?>')">Informações</a></td>
                                </tr>
                                <?php
                            }
                        }
                    }

                    if ($_SESSION['compra_cliente'] == "Em Tratamento") {
                        $query = "SELECT * FROM compra WHERE `login_Uti` = '$login' AND estado='Em Tratamento'";
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
                                <tr><td><?php echo $numero_compra; ?></td>
                                    <td><?php echo $nome; ?></td>
                                    <td><?php echo $total; ?> €</td>
                                    <td><?php echo $estado; ?></td>
                                    <td><?php echo $data; ?></td>
 <td><a  onclick="window.open('InformacoesCompra.php?id=<?php echo $numero_compra ?>')">Informações</a></td>                                </tr>
                                <?php
                            }
                        }
                    }
                    ?>
               
                <?php
                
                 if ($_SESSION['compra_cliente'] == "Devolvida") {
                    
                        $query2 = "select * from compra where login_Uti='$login'  and numero_compra in(select numero_compra from devolucoes)";
                        $sql2 = mysql_query($query2);
                        $row = mysql_num_rows($sql2);
                        if ($row > 0) {
                            while ($linha = mysql_fetch_array($sql2)) {
                                $numero_compra = $linha['numero_compra'];
                                $quere="SELECT * from devolucoes where numero_compra= '$numero_compra'";
                                $sqle=  mysql_query($quere);
                                $dado  = mysql_fetch_array($sqle);
                                $estado_devolucao = $dado['estado'];
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
                                <tr><td><?php echo $numero_compra; ?></td>
                                    <td><?php echo $nome; ?></td>
                                    <td><?php echo $total; ?> €</td>
                                    <td><?php echo $estado_devolucao; ?></td>
                                    <td><?php echo $data; ?></td>
                                    <td><a  onclick="window.open('InformacoesCompra.php?id=<?php echo $numero_compra ?>')">Informações</a></td>
                                </tr>
                                <?php
                            }
                        }
                    }
                    ?>
                </table>
            </div>
                <br><br>
        
            <?php
        }
        ?>

   </div>
        </div>

        <br>
        <br>
        <?php
        include_once 'footer.php';
        include_once 'footersimple.php';
        ?>

    </body>
</html>
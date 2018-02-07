<!DOCTYPE html>
<html>
    <head>
        <title>Alteraçao estado compra </title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" type="text/css" href="Ines.css"/>
        <script type="text/javascript" src="RegistoCF.js"></script>
    </head>

    <body id="Body_Cliente">

        <?php
        include_once 'funcoes_bd.php';
        include_once 'mysql.connect.php';
        include_once 'headerFunc.php';
        ligar_base_dados();
        ?>

        <div>
            <div id="mainbodymp">
                <div id="novosprodutosbar">
                    <h3 class="bar-title" style="padding: 0.5%;">Alteraçao Estado compra</h3>
                </div>
                <div>
                <form name="form" method="post" action="comecar_compra.php" enctype="multipart/form-data">
                    <div id="opcoes">
                        <marquee> Aqui poderá visualizar todas as compras realizadas na GardenCorporation****</marquee>

                        <select name="opcao">

                            <option value="Em tratamento">Em tratamento</option>
                            <option value="Expedida">Expedida</option>
                            <option value="Pagamento Efectuado">Pagamento Efectuado</option>
                        </select>    
                        <input type="submit" value="Mostrar Compras">
                    </div>
                    <pre>
            


                




</form>

                    </pre>
                </div>

            </div>
        </div>
        <?php
        if (isset($_REQUEST['opcao'])) {
            $_SESSION['escolha'] = $_REQUEST['opcao'];
        }
        ?>

        <?php
        if (!(isset($_SESSION['escolha'])) || ($_SESSION['escolha'] == "Pagamento Efectuado")) {
            //se nao tiver nenhuma tabela aparece as compras paga
            ?>
        <div id="scroll_tabela_ines" style="padding: 1%;">
                <table id="table_editar_cliente">
                    <pre>
                    </pre>
                    <th> Numero da compra </th>
                    <th>Cliente</th>
                    <th> Tipo de Pagamento </th>
                    <th> Total </th>
                    <th> Estado </th>
                    <th> Data </th>
                    <th> Tratamento</th>
                    <th> Informações </th>

                    <?php
                    $sql = "SELECT * FROM compra where estado='Pagamento Efectuado' and tipo = ''";
                    $query = mysql_query($sql);
                    $row = mysql_num_rows($query);
                    if ($row > 0) {
                        while ($linha = mysql_fetch_array($query)) {
                            $numero = $linha ['numero_compra'];
                            $nome = $linha['login_Uti'];
                            $pagamento = $linha['tipo_pagamento'];
                            $estado = $linha['estado'];
                            $data = $linha ['data'];
                            $total = $linha['total_compra'];

                            $query55 = "select * from pagamento where tipo_pagamento='$pagamento'";
                            $sql55 = mysql_query($query55);
                            while ($paga = mysql_fetch_array($sql55)) {
                                $nome1 = $paga['descricao'];
                            }
                            ?>
                            <tr><td><?php echo $numero; ?></td>
                                <td><?php echo $nome ?></td>
                                <td><?php echo $nome1; ?></td>
                                <td><?php echo $total; ?> €</td>
                                <td><?php echo $estado; ?></td>
                                <td><?php echo $data; ?></td>
                                <td><a class="apazul"  style="color:blue" href="inicia_tratamento.php?id=<?php echo $numero ?>">Iniciar tratamento</a></td>
                                <td><a onclick="window.open('InformacoesCompraFunc.php?id=<?php echo $numero ?>')">Informações</a></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
            </div>
            <?php
        } else {
            if ($_SESSION['escolha'] == 'Em tratamento') {
                ?>  
                <div id="scroll_tabela_ines" style="padding: 1%; ">
                    <table id="table_editar_cliente">
                        <caption></caption>
                        <th> Numero da compra </th>
                        <th>Cliente</th>
                        <th> Tipo de Pagamento </th>
                        <th> Total </th>
                        <th> Estado </th>
                        <th> Data </th>
                        <th> Tratamento</th>
                        <th> Informações </th>
                        <?php
                        $sql = "SELECT * FROM compra where estado='Em Tratamento' and tipo='' ";
                        $query = mysql_query($sql);
                        $row = mysql_num_rows($query);
                        if ($row > 0) {
                            while ($linha = mysql_fetch_array($query)) {
                                $numero = $linha ['numero_compra'];
                                $nome = $linha['login_Uti'];
                                $pagamento = $linha['tipo_pagamento'];
                                $estado = $linha['estado'];
                                $data = $linha ['data'];
                                $total = $linha['total_compra'];

                                $query55 = "select * from pagamento where tipo_pagamento='$pagamento'";
                                $sql55 = mysql_query($query55);
                                while ($paga = mysql_fetch_array($sql55)) {
                                    $nome1 = $paga['descricao'];
                                }
                                ?>
                                <tr><td><?php echo $numero; ?></td>
                                    <td><?php echo $nome ?></td>
                                    <td><?php echo $nome1; ?></td>
                                    <td><?php echo $total; ?> €</td>
                                    <td><?php echo $estado; ?></td>
                                    <td><?php echo $data; ?></td>
                                    <td><a style="color:blue" class="apazul"  href="finaliza_tratamento.php?id=<?php echo $numero ?>">Expedir Compra</a></td>
                                    <td><a onclick="window.open('InformacoesCompraFunc.php?id=<?php echo $numero ?>')">Informações</a></td>
                                </tr>
                                
                                <?php
                            }
                        }
                    } else {
                        ?>

                        <div id="scroll_tabela_ines" style="padding: 1%; ">
                            <table id="table_editar_cliente">
                                <caption></caption>
                                <th> Numero da compra </th>
                                <th>Cliente</th>
                                <th> Tipo de Pagamento </th>
                                <th> Total </th>
                                <th> Estado </th>
                                <th> Data </th>
                                <th> Informaçoes </th>            

        <?php
        $sql = "SELECT * FROM compra where estado='Expedida' and tipo=''";
        $query = mysql_query($sql);
        $row = mysql_num_rows($query);
        if ($row > 0) {
            while ($linha = mysql_fetch_array($query)) {
                $numero = $linha ['numero_compra'];
                $nome = $linha['login_Uti'];
                $pagamento = $linha['tipo_pagamento'];
                $estado = $linha['estado'];
                $data = $linha ['data'];
                $total = $linha['total_compra'];

                $query55 = "select * from pagamento where tipo_pagamento='$pagamento'";
                $sql55 = mysql_query($query55);
                while ($paga = mysql_fetch_array($sql55)) {
                    $nome1 = $paga['descricao'];
                }
                ?>
                                        <tr><td><?php echo $numero; ?></td>
                                            <td><?php echo $nome ?></td>
                                            <td><?php echo $nome1; ?></td>
                                            <td><?php echo $total; ?> €</td>
                                            <td><?php echo $estado; ?></td>
                                            <td><?php echo $data; ?></td>

                                            <td><a onclick="window.open('InformacoesCompraFunc.php?id=<?php echo $numero ?>')">Informações</a></td>
                                        </tr>
                <?php
            }
        }
    }
}
?>


                    </table>
                </div>
                <br><br>
                        <?php
                        include_once 'footersimple.php';
                        ?>

                </body>
                </html>
<?php
include_once 'mysql.connect.php';
include_once 'Funcoes_bd.php';
ligar_base_dados();
include_once 'headerAdmin.php';
?>
<!DOCTYPE HTML>
<html>

    <head>
        <title>Compras por estado</title>
        <link rel="stylesheet" type="text/css" href="Ines.css"/>
        <script type="text/javascript" src="RegistoProduto.js"></script>
        <meta charset="UTF-8">
    </head>
    <body>


        <div id="mainbodymp">

            <div id="novosprodutosbar">
                <h3 class="bar-title" style="padding: 0.5%;">Estado das Compras</h3>
            </div>

            <div id="form_mostrar">

                <form   method="post" action="estadoComprasAdmin.php">
                    <div id="opcoes">
                        <marquee> Aqui poderá visualizar todas as compras realizadas na GardenCorporation****</marquee>

                        <select name="opcao">
                            <option value="Em tratamento">Em tratamento</option>
                            <option value="Expedida">Expedida</option>
                            <option value="Pagamento Efectuado" selected>Pagamento efectuado</option>
                            <option value="Aguarda Pagamento" selected>Aguarda  Pagamento</option>


                        </select>

                        <input type="submit" value="Mostrar Compra">
                    </div>
                    <pre>
            
                






                    </pre>
                    <div id="botoes" style="margin-top: -7%;">
                        <p>
                            <input type="hidden" value="enviado" name="acao">
                            <input id="button-registar" type="button" value="Voltar" onclick="window.history.go('-1');">

                        </p>
                    </div>
                </form>
            </div>

        </div>
        <?php
        if (!(isset($_REQUEST['opcao'])) || ($_REQUEST['opcao'] == "Pagamento Efectuado")) {
            //se nao tiver nenhuma tabela aparece as compras paga
            ?>


            <div id="scroll_tabela_pagamento" style="margin-top: -13%; width: 70%; margin-left: 10%;">

                <table id="table_editar_produto_compra1" style="margin-top:1%">
                    <caption></caption>
                    <th> Numero Compra </th>
                    <th> Login Cliente </th>
                    <th> Data</th>
                    <th>Tipo pagamento</th>
                    <th> Total compra </th>
                    <th> Estado </th>
                    <th> Informações </th>

                    <?php
                    $sql = "SELECT * FROM compra where estado='Pagamento Efectuado'";
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
                            ?>

                            <tr><td><?php echo $numero; ?></td>
                                <td><?php echo $nome; ?></td>
                                <td><?php echo $data; ?></td>
                                <td><?php echo $pagamento; ?> </td>
                                <td><?php echo $total; ?> </td>
                                <td><?php echo $estado; ?> </td>
                                <td><a style="color:blue;"  onclick="window.open('InformacoesCompraAdmin.php?id=<?php echo $numero ?>')">Informações</a></td>

                            </tr>

                            <?php
                        }
                    }
                    ?>
                </table>
            </div>

            <?php
        } else {
            $opcao = $_REQUEST['opcao'];

            if ($opcao == "Em tratamento") {
                ?>


                <div id="scroll_tabela_pagamento" style="margin-top: -13%;">

                    <table id="table_editar_produto_compra1" style="margin-top:1%">
                        <caption></caption>
                        <th> Numero Compra </th>
                        <th> Login Cliente </th>
                        <th> Data</th>
                        <th>Tipo pagamento</th>
                        <th> Total compra </th>
                        <th> Estado </th>
                        <th> Informações </th>

                        <?php
                        $sql = "SELECT * FROM compra where estado='Em Tratamento'";
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
                                ?>

                                <tr><td><?php echo $numero; ?></td>
                                    <td><?php echo $nome; ?></td>
                                    <td><?php echo $data; ?></td>
                                    <td><?php echo $pagamento; ?> </td>
                                    <td><?php echo $total; ?> </td>
                                    <td><?php echo $estado; ?> </td>
                                    <td><a style="color:blue;"  onclick="window.open('InformacoesCompraAdmin.php?id=<?php echo $numero ?>')">Informações</a></td>


                                </tr>

                                <?php
                            }
                        }
                        ?>
                    </table>
                </div>


                <?php
            } else {

                $opcao = $_REQUEST['opcao'];

                if ($opcao == "Expedida") {
                    ?>



                    <div id="scroll_tabela_pagamento" style="margin-top: -13%;">

                        <table id="table_editar_produto_compra" style="margin-top:1%">
                            <caption></caption>
                            <th> Numero Compra </th>
                            <th> Login Cliente </th>
                            <th> Data</th>
                            <th>Tipo pagamento</th>
                            <th> Total compra </th>
                            <th> Estado </th>
                            <th> Informações </th>


                            <?php
                            $sql = "SELECT * FROM compra where estado='Expedida'";
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
                                    ?>

                                    <tr><td><?php echo $numero; ?></td>
                                        <td><?php echo $nome; ?></td>
                                        <td><?php echo $data; ?></td>
                                        <td><?php echo $pagamento; ?> </td>
                                        <td><?php echo $total; ?> </td>
                                        <td><?php echo $estado; ?> </td>
                    <td><a style="color:blue;"  onclick="window.open('InformacoesCompraAdmin.php?id=<?php echo $numero ?>')">Informações</a></td>


                                    </tr>

                                    <?php
                                }
                            }
                        } else {
                            ?>



                            <div id="scroll_tabela_pagamento" style="margin-top: -13%;">

                                <table id="table_editar_produto_compra" style="margin-top:1%">
                                    <caption></caption>
                                    <th> Numero Compra </th>
                                    <th> Login Cliente </th>
                                    <th> Data</th>
                                    <th>Tipo pagamento</th>
                                    <th> Total compra </th>
                                    <th> Estado </th>
                                    <th> Informações </th>


                                    <?php
                                    $sql = "SELECT * FROM compra where estado='Aguarda Pagamento'";
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
                                            ?>

                                            <tr><td><?php echo $numero; ?></td>
                                                <td><?php echo $nome; ?></td>
                                                <td><?php echo $data; ?></td>
                                                <td><?php echo $pagamento; ?> </td>
                                                <td><?php echo $total; ?> </td>
                                                <td><?php echo $estado; ?> </td>
<td><a style="color:blue;"  onclick="window.open('InformacoesCompraAdmin.php?id=<?php echo $numero ?>')">Informações</a></td>
                                            </tr>

                                            <?php
                                        }
                                    }
                                }
                            }
                        }
                        ?>
                    </table>

                </div>


                <div id="foesta1" style="margin-top: 2%;">
                    <?php
                    include 'footersimple.php';
                    ?>
                </div>



                </body>
                </html>


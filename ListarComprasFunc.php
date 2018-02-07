<!DOCTYPE html>
<html>
    <head>
        <title> Listar Compras </title>
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
                    <h3 class="bar-title" style="padding: 0.5%;">Histórico de Compras</h3>
                </div>
                <form name="form" method="post" action="ListarComprasFunc.php" enctype="multipart/form-data">
                    <div id="opcoes">
                        <marquee>****Aqui poderá visualizar todas as compras realizadas na GardenCorporation****</marquee>

                        <select name="opcao">
                            <option value="Todas">Todas</option>
                            <option value="Expedida">Expedida</option>
                            <option value="Em Tratamento">Em Tratamento</option>
                            <option value="Aguarda Pagamento">Aguarda Pagamento</option>
                        </select>    
                        <input type="submit" value="Mostrar Compras">
                    </div>
                    <pre>
                        <?php
                        if (isset($_REQUEST['opcao'])) {
                            $_SESSION['compra_escolha'] = $_REQUEST['opcao'];
                        }
                        ?>
                
                








                    </pre>

                </form>
            </div>
        </div>

        <?php
        if (!(isset($_SESSION['compra_escolha'])) || ($_SESSION['compra_escolha'] == "Todas")) {
            ?>
            <div id="scroll_tabela_ines">
                <table id="table_editar_cliente">
                    <pre>
                    </pre>
                    <th> Numero da compra </th>
                    <th>Cliente</th>
                    <th> Tipo de Pagamento </th>
                    <th> Total </th>
                    <th> Estado </th>
                    <th> Data </th>
                    <th> Informações </th>

                    <?php
                    $query = "SELECT * FROM compra";
                    $sql = mysql_query($query);
                    $row = mysql_num_rows($sql);
                    if ($row > 0) {
                        while ($linha = mysql_fetch_array($sql)) {
                            $numero_compra = $linha['numero_compra'];
                            $cliente = $linha['login_Uti'];
                            $tipoPagamento = $linha['tipo_pagamento'];
                            $estado = $linha['estado'];
                            $data = $linha['data'];
                            $total = $linha['total_compra'];


                            $query55 = "select * from pagamento where tipo_pagamento='$tipoPagamento'";
                            $sql55 = mysql_query($query55);
                            while ($paga = mysql_fetch_array($sql55)) {
                                $nome1 = $paga['descricao'];
                            }
                            ?>
                            <tr><td><?php echo $numero_compra; ?></td>
                                <td><?php echo $cliente ?></td>
                                <td><?php echo $nome1; ?></td>
                                <td><?php echo $total; ?> €</td>
                                <td><?php echo $estado; ?></td>
                                <td><?php echo $data; ?></td>
                              <td><a onclick="window.open('InformacoesCompraFunc.php?id=<?php echo $numero_compra ?>')">Informações</a></td>
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
                <table id="table_editar_cliente">
                    <caption></caption>
                    <pre>
                    </pre>
                    <th> Numero Compra </th>
                    <th>Cliente</th>
                    <th> Tipo Pagamento </th>
                    <th> Total </th>
                    <th> Estado </th>
                    <th> Data </th>
                    <th> Informações </th>

                    <?php
                    if ($_SESSION['compra_escolha'] == "Aguarda Pagamento") {
                        $query = "SELECT * FROM compra WHERE estado='Aguarda Pagamento'";
                        $sql = mysql_query($query);
                        $row = mysql_num_rows($sql);
                        if ($row > 0) {
                            while ($linha = mysql_fetch_array($sql)) {
                                $numero_compra = $linha['numero_compra'];
                                $cliente = $linha['login_Uti'];
                                $tipoPagamento = $linha['tipo_pagamento'];
                                $estado = $linha['estado'];
                                $data = $linha['data'];
                                $total = $linha['total_compra'];
                                ?>
                                <tr><td><?php echo $numero_compra; ?></td>
                                    <td><?php echo $cliente ?></td>
                                    <td><?php echo $tipoPagamento; ?></td>
                                    <td><?php echo $total; ?> €</td>
                                    <td><?php echo $estado; ?></td>
                                    <td><?php echo $data; ?></td>
                                    <td><a onclick="window.open('InformacoesCompraFunc.php?id=<?php echo $numero_compra ?>')">Informações</a></td>                                </tr>
                                <?php
                            }
                        }
                    }

                    if ($_SESSION['compra_escolha'] == "Expedida") {
                        $query = "SELECT * FROM compra WHERE estado='Expedida'";
                        $sql = mysql_query($query);
                        $row = mysql_num_rows($sql);
                        if ($row > 0) {
                            while ($linha = mysql_fetch_array($sql)) {
                                $numero_compra = $linha['numero_compra'];
                                $tipoPagamento = $linha['tipo_pagamento'];
                                $cliente = $linha['login_Uti'];
                                $estado = $linha['estado'];
                                $data = $linha['data'];
                                $total = $linha['total_compra'];
                                ?>
                                <tr><td><?php echo $numero_compra; ?></td>
                                    <td><?php echo $cliente ?></td>
                                    <td><?php echo $tipoPagamento; ?></td>
                                    <td><?php echo $total; ?> €</td>
                                    <td><?php echo $estado; ?></td>
                                    <td><?php echo $data; ?></td>
                                      <td><a onclick="window.open('InformacoesCompraFunc.php?id=<?php echo $numero_compra ?>')">Informações</a></td>
                                </tr>
                                <?php
                            }
                        }
                    }

                    if ($_SESSION['compra_escolha'] == "Em Tratamento") {
                        $query = "SELECT * FROM compra WHERE  estado='Em Tratamento'";
                        $sql = mysql_query($query);
                        $row = mysql_num_rows($sql);
                        if ($row > 0) {
                            while ($linha = mysql_fetch_array($sql)) {
                                $numero_compra = $linha['numero_compra'];
                                $cliente = $linha['login_Uti'];
                                $tipoPagamento = $linha['tipo_pagamento'];
                                $estado = $linha['estado'];
                                $data = $linha['data'];
                                $total = $linha['total_compra'];
                                ?>
                                <tr><td><?php echo $numero_compra; ?></td>
                                    <td><?php echo $cliente; ?></td>
                                    <td><?php echo $tipoPagamento; ?></td>
                                    <td><?php echo $total; ?> €</td>
                                    <td><?php echo $estado; ?></td>
                                    <td><?php echo $data; ?></td>
                                     <td><a onclick="window.open('InformacoesCompraFunc.php?id=<?php echo $numero_compra ?>')">Informações</a></td>
                                </tr>
                                <?php
                            }
                        }
                    }
                    ?>
                </table>
            </div>
            <?php
        }
        ?>
        
        <pre>
        </pre>


        <?php
        include_once 'footersimple.php';
        ?>

    </body>
</html>
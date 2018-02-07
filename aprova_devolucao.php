<!DOCTYPE HTML>
<html>

    <head>
        <title>Aprovação Devoluçoes</title>
        <link rel="stylesheet" type="text/css" href="Ines.css"/>
        <script type="text/javascript" src="RegistoProduto.js"></script>
        <meta charset="UTF-8">
    </head>
    <body id="Body_Cliente">
        <?php
        include_once 'mysql.connect.php';
        include_once 'Funcoes_bd.php';
        ligar_base_dados();
        include_once 'headerFunc.php';
        ?>

        <div id="mainbodymp">

            <div id="novosprodutosbar">    
                <h3 class="bar-title" style="padding: 0.5%;"> Aprovação de Devoluções</h3>
            </div>

            <marquee>****Aqui poderá aprovar todas as devoluções para realizar na GardenCorporation****</marquee>


            <div id="botoes" style="margin-top: 10%;">
                <p>
                    <input type="hidden" value="enviado" name="acao">
                    <input id="button-registar" type="button" value="Voltar" onclick="history.go(-2);">

                </p>
            </div>

            <div id="scroll_tabela_ines" style="margin-top: 4%; ">

                <table id="table_editar_cliente" >
                    <caption></caption>
                    <pre>
                    </pre>
                    <th> Numero Devoluçao </th>
                    <th> Numero de compra </th>
                    <th> Data</th>

                    <th> Estado </th>
                    <th> Aprovar </th>
                    <th> Rejeitar </th>
                    <th>Informaçao Compra</th>
                    <?php
                    $sql = "SELECT * FROM devolucoes where estado='Aguarda Aprovacao'";
                    $query = mysql_query($sql);
                    $row = mysql_num_rows($query);
                    if ($row > 0) {
                        while ($linha = mysql_fetch_array($query)) {
                            $numero = $linha ['numero_devolucao'];
                            $nome = $linha['numero_compra'];
                            $data = $linha['data'];
                            $estado = $linha['estado'];
                            ?>

                            <tr><td><?php echo $numero; ?></td>
                                <td><?php echo $nome; ?></td>
                                <td><?php echo $data; ?></td>
                                <td><?php echo $estado; ?> </td>
                                <td><a style="color:red; " href="Aprova_dev.php?id=<?php echo $numero ?>">Aprovar Devolucao</a></td>
                                <td><a style="color:red; " href="Rejeita_dev.php?id=<?php echo $numero ?>">Rejeitar Devolucao</a></td>
                                <td><a style="color:blue"  onclick="window.open('InformacoesCompraFunc.php?id=<?php echo $nome ?>')"  >Informações</a></td> 
                            </tr>

                            <?php
                        }
                    } else {
                        ?> <p style="margin-left: 15%;">Nao existem compras para aprovar pagamento</p>
                        <?php
                    }
                    ?>
                </table>

            </div>
            <pre>
            
            </pre>
        </div>


        <div id="foesta1">
            <?php
            include 'footersimple.php';
            ?>
        </div>

    </body>
</html>


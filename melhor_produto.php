<!DOCTYPE HTML>
<html>

    <head>
        <title>Melhores Clientes </title>
        <link rel="stylesheet" type="text/css" href="Ines.css"/>
        <script type="text/javascript" src="RegistoProduto.js"></script>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
        include_once 'mysql.connect.php';
        include_once 'Funcoes_bd.php';
        ligar_base_dados();
        include_once 'headerFunc.php';
        ?>

        <div>
            <div id="mainbodymp">

                <div id="novosprodutosbar">
                    <h3 class="bar-title" style="padding: 0.5%;">Produtos mais vendidos</h3>
                </div>
                <div><marquee>Neste momento, são estes os produtos mais vendidos na GardenCorporation:</marquee></div>    

                <div style="">

                    <div id="scroll_tabela_pagamento" style="margin-bottom: -6%">

                        <table id="table_editar_produto_compra_melhor">
                            <caption></caption>
                            <th> Numero Produto </th>
                            <th> Nome Produto</th>
                            <th> Preco</th>
                            <th> Quantidade vendida</th>

                            <?php
                            $sql = "SELECT SUM(quantidade) AS quantidade, numero_produto FROM linha_compra GROUP BY numero_produto order by quantidade desc limit 5";
                            $query = mysql_query($sql);
                            $row = mysql_num_rows($query);
                            if ($row > 0) {
                                while ($linha = mysql_fetch_array($query)) {
                                    $numero = $linha ['quantidade'];
                                    $nome = $linha['numero_produto'];
                                    $query4 = "SELECT * FROM produto where numero_produto='$nome'";
                                    $sql4 = mysql_query($query4);
                                    if (mysql_num_rows($sql4) > 0) {
                                        $dadoCli = mysql_fetch_array($sql4);
                                        $nome_c = $dadoCli['nome_produto'];
                                        $preco = $dadoCli['preco'];
                                    }
                                    ?>

                                    <tr><td><?php echo $nome; ?></td>
                                        <td><?php echo $nome_c; ?></td>

                                        <td><?php echo $preco; ?> </td>
                                        <td><?php echo $numero; ?> </td>



                                    </tr>

                                    <?php
                                }
                            }
                            ?>
                        </table>
                    </div>
                </div>
                <div style=" margin-left: -3%;">
                    <?php
                    include't2.php';
                    ?>
                </div>
            </div>    
        </div>
        <div >
            <input id="buttonvoltar" type="button" value="Voltar" onclick="window.history.go(-1);">
            <pre>
            </pre>
        </div>
        <div id="foesta">
            <?php
            include 'footersimple.php';
            ?>
        </div>
    </body>
</html>

<!DOCTYPE html>

<html>
    <head>
        <title> Aprovaçao de Pagamentos </title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" type="text/css" href="Ines.css" />
        <script type="text/javascript" src="RegistoCF.js"></script>
    </head>

    <body id="Body_Cliente">

        <?php
        include_once 'funcoes_bd.php';
        include_once 'mysql.connect.php';
        include_once 'headerFunc.php';
        ligar_base_dados();
        ?>


        <div id="mainbodymp">
            <div id="novosprodutosbar">
                <h3 class="bar-title" style="padding: 0.5%;">Aprovação de pagamentos</h3>
            </div>

            <marquee>****Aqui poderá aprovar os pagamentos das compras realizadas na GardenCorporation****</marquee>
            <div style="margin-top: 15%;">

                <div id="scroll_tabela_ines" style="margin-left: 10%; ">

                    <table id="table_listar_cliente">
                        <pre>
                        </pre>
                        <th> Numero Compra </th>
                        <th> Login cliente </th>
                        <th> Data </th>
                        <th> Tipo pagamento </th>
                        <th> Total compra </th>
                        <th> Estado </th>
                        <th> Aprova pagamento </th>
                        <th> Informaçoes compra </th>
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
                                $query55 = "select * from pagamento where tipo_pagamento='$pagamento'";
                                $sql55 = mysql_query($query55);
                                while ($paga = mysql_fetch_array($sql55)) {
                                    $nome1 = $paga['descricao'];
                                }
                                ?>

                                <tr><td><?php echo $numero; ?></td>
                                    <td><?php echo $nome; ?></td>
                                    <td><?php echo $data; ?></td>
                                    <td><?php echo $pagamento; ?></td>
                                    <td><?php echo $total; ?></td>
                                    <td><?php echo $estado ?></td>
                                    <td><a style="color:red" href="Aprova_Pagamento1.php?id=<?php echo $numero ?>">Aprovar Pagamento</a></td>
                                    <td><a style="color:blue"  onclick="window.open('InformacoesCompraFunc.php?id=<?php echo $numero ?>')">Informações</a></td>
                                </tr>   

                                <?php
                            }
                            ?>
                        </table>

                    </div>
                    <br>
                    <br>
                    <br>
                    <?php
                } else {
                    ?> 
                    <div>
                        <p style="color:red; text-align: center">Nao existem registos na base de dados</p>

                    </div>
                    <?php
                }
                ?>
               
                </form>
            </div>
        </div> 
    </div>

    <?php
    include_once 'footersimple.php';
    ?>

</body>
</html>
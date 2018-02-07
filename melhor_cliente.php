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

        <div id="mainbodymp" >

            <div id="novosprodutosbar">
                <h3 class="bar-title" style="padding: 0.5%;">Quadro dos melhores Clientes</h3>
            </div>
            <div><marquee>Neste momento, são estes os melhores clientes da GardenCorporation:</marquee></div>    

            <div> 
                <div id="scroll_melhor_cliente" >

                    <table id="table_melhor_cliente" >
                        <pre>
                        </pre>
                        <th> Login Cliente </th>
                        <th> Nome</th>
                        <th> Morada</th>
                        <th> telefone</th>
                        <th>  Total Vendido</th>

                        <?php
                        $sql = "SELECT SUM(total_compra) AS total_compra, login_Uti FROM compra GROUP BY login_Uti order by total_compra desc limit 5 ";
                        $query = mysql_query($sql);
                        $row = mysql_num_rows($query);
                        if ($row > 0) {
                            while ($linha = mysql_fetch_array($query)) {
                                $numero = $linha ['total_compra'];
                                $nome = $linha['login_Uti'];
                                $query4 = "SELECT * FROM cliente where login_Uti='$nome'";
                                $sql4 = mysql_query($query4);
                                if (mysql_num_rows($sql4) > 0) {
                                    $dadoCli = mysql_fetch_array($sql4);
                                    $nome_c = $dadoCli['nome_cliente'];
                                    $morada = $dadoCli['morada'];
                                    $telefone = $dadoCli['telefone'];
                                }
                                ?>

                                <tr><td><?php echo $nome; ?></td>
                                    <td><?php echo $nome_c; ?></td>
                                    <td><?php echo $morada; ?></td>
                                    <td><?php echo $telefone; ?> </td>
                                    <td><?php echo $numero; ?> </td>
                                </tr>

                                <?php
                            }
                        }
                        ?>
                    </table>



                </div>
            </div>

            <div style="margin-top: -15%; margin-left: -6%;">

                <?php
                include't1.php';
                ?>
            </div>

        </div>
        <div >
            <input id="buttonvoltar" type="button" value="Voltar" onclick="window.history.go(-1);">
            <pre>
            </pre>
        </div>
    </div>

    <div id='foesta'>
        <?php
        include 'footersimple.php';
        ?>
    </div> </div>
</div>

</body>
</html>


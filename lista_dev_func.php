<!DOCTYPE html>

<html>
    <head>
        <title> Listar Devoluções </title>
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
                    <h3 class="bar-title" style="padding: 0.5%;">Histórico de Devoluções</h3>
                </div>
                <form name="form" method="post" action="lista_dev_func.php" enctype="multipart/form-data">
                    
                    <div id="opcoes">                      
                        <marquee>****Aqui poderá visualizar todas as devoluções realizadas na GardenCorporation****</marquee>


                        <select name="opcao">
                            <option value="Todas">Todas</option>
                            <option value="Aprovada">Aprovadas</option>
                            <option value="Nao Aprovada">Não Aprovadas</option>                       

                        </select> 
                        <input type="submit" value="Mostrar Devoluções">
                    </div>
                    <pre>
                
                









                    </pre>
                    <div id="botoes">
                        <p>
                            <input type="hidden" value="enviado" name="acao">
                            <input id="button-registar" type="button" value="Voltar" onclick="window.history.go('-1');">

                        </p>
                    </div>
                </form>
            </div>
        </div>

        <?php
        if (!(isset($_REQUEST['opcao'])) || ($_REQUEST['opcao'] == "Todas")) {
            ?>
            <div id="scroll_tabela_ines" >
                <table id="table_editar_cliente">
                    <pre>
                    </pre>
                    <caption></caption>
                    <th> Login </th>
                    <th> Numero Devolução </th>
                    <th> Número compra </th>
                    <th> Data</th>
                    <th> Estado </th>
                    <?php
                    $sql2 = "SELECT * FROM `devolucoes`";
                    $query = mysql_query($sql2);
                    $row = mysql_num_rows($query);
                    if ($row > 0) {
                        while ($linha = mysql_fetch_array($query)) {
                            $numero = $linha ['numero_devolucao'];
                            $numero_compra = $linha['numero_compra'];
                            $data = $linha['data'];
                            $estado = $linha['estado'];
                            $sql3 = "SELECT * FROM compra WHERE numero_compra = '$numero_compra'";
                            $query2 = mysql_query($sql3);
                            while ($linha2 = mysql_fetch_array($query2)) {
                                $login = $linha2 ['login_Uti'];
                            }
                            ?>

                            <tr>
                                <td><?php echo $login; ?></td>
                                <td><?php echo $numero; ?></td>
                                <td><?php echo $numero_compra; ?></td>
                                <td><?php echo $data; ?></td>
                                <td><?php echo $estado; ?> </td>
                            </tr>

                            <?php
                        }
                    }
                    ?>
                </table>
            </div>
            <pre>
            </pre>

            <?php
        } else {
            ?>
            <div id="scroll_tabela_ines">
                <table id="table_editar_cliente">
                    <caption></caption>
                    <pre>  
                    </pre>
                    <th> Login </th>
                    <th> Número Devolução </th>
                    <th> Número compra </th>
                    <th> Data</th>
                    <th> Estado </th>
                    <?php
                    if ($_REQUEST['opcao'] == "Aprovada") {
                        $sql2 = "SELECT * FROM `devolucoes` WHERE estado='Aprovada'";
                        $query = mysql_query($sql2);
                        $row = mysql_num_rows($query);
                        if ($row > 0) {
                            while ($linha = mysql_fetch_array($query)) {
                                $numero = $linha ['numero_devolucao'];
                                $numero_compra = $linha['numero_compra'];
                                $data = $linha['data'];
                                $estado = $linha['estado'];
                                $sql4 = "SELECT * FROM compra WHERE numero_compra = '$numero_compra'";
                                $query3 = mysql_query($sql4);
                                while ($linha3 = mysql_fetch_array($query3)) {
                                    $login2 = $linha3 ['login_Uti'];
                                }
                                ?>

                                <tr>
                                    <td><?php echo $login2; ?></td>
                                    <td><?php echo $numero; ?></td>
                                    <td><?php echo $numero_compra; ?></td>
                                    <td><?php echo $data; ?></td>
                                    <td><?php echo $estado; ?> </td>
                                </tr>

                                <?php
                            }
                        }
                    }

                    if ($_REQUEST['opcao'] == "Nao Aprovada") {
                        $sql2 = "SELECT * FROM `devolucoes` WHERE estado='Nao Aprovada'";
                        $query = mysql_query($sql2);
                        $row = mysql_num_rows($query);
                        if ($row > 0) {
                            while ($linha = mysql_fetch_array($query)) {
                                $numero = $linha ['numero_devolucao'];
                                $numero_compra = $linha['numero_compra'];
                                $data = $linha['data'];
                                $estado = $linha['estado'];
                                $sql4 = "SELECT * FROM compra WHERE numero_compra = '$numero_compra'";
                                $query3 = mysql_query($sql4);
                                while ($linha3 = mysql_fetch_array($query3)) {
                                    $login2 = $linha3 ['login_Uti'];
                                }
                                ?>

                                <tr>
                                    <td><?php echo $login2; ?></td>
                                    <td><?php echo $numero; ?></td>
                                    <td><?php echo $numero_compra; ?></td>
                                    <td><?php echo $data; ?></td>
                                    <td><?php echo $estado; ?> </td>
                                </tr>

                                <?php
                            }
                        }
                    }
                    ?>
                </table>
            </div>
            <pre>
            </pre>


            <?php
        }
        include_once 'footersimple.php';
        ?>

    </body>

</html>

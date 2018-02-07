<?php
include_once 'Funcoes_bd.php';
include_once 'mysql.connect.php';
ligar_base_dados();
include_once 'headerCli.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Devoluçoes</title>
        <link rel="stylesheet" type="text/css" href="Rproduto.css"/>
        <script type="text/javascript" src="RegistoProduto.js"></script>
        <meta charset="UTF-8">
    </head>

    <body>
        <div id="novosprodutosbar">
            <h3 class="bar-title">Devoluçoes de Compras</h3>
            <div id="abaixo_pag">



                <div>
                    <p>*****Aqui poderá visualizar todas as devoluçoes (Aprovadas e Nao aprovadas) realizadas de na GardenCorporation****</p>
                </div>
                <div id="form_mostrar">
                    <div>

                    </div>
                    <form   method="post" action="lista_dev_cli.php">
                        <select name="opcao">
                            <option value="Aprovada">Aprovadas</option>
                            <option value="NAprovada">Nao Aprovadas</option>



                        </select> 
                        <input type="submit" value="Mostrar Devoluçoes">
                    </form>
                </div>
                <?php
                if (!(isset($_REQUEST['opcao'])) || ($_REQUEST['opcao'] == "Aprovada")) {
                    //se nao tiver nenhuma tabela aparece as devoluçoes     
                    ?>

                    <div id="scroll_tabela_pagamento2">

                        <table id="table_editar_produto_dev">
                            <caption></caption>
                            <th> Numero Devoluçao </th>
                            <th> Numero compra </th>
                            <th> Data</th>
                            <th> Estado </th>
                            <?php
                            //query vai selecionar todas as devolucoes onde o numero de compra estao na tabela de compras onde o login e quem esta logado
                            $sql2 = "SELECT * FROM `devolucoes` WHERE estado='Aprovada' and numero_compra in ( SELECT numero_compra from compra where login_Uti='$login')";
                            $query = mysql_query($sql2);
                            $row = mysql_num_rows($query);
                            if ($row > 0) {
                                while ($linha = mysql_fetch_array($query)) {
                                    $numero = $linha ['numero_devolucao'];
                                    $numero_compra = $linha['numero_compra'];
                                    $data = $linha['data'];
                                    $estado = $linha['estado'];
                                    ?>
                                    <tr>
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
                    <?php
                } else {
                    ?>
<div id="scroll_tabela_pagamento2">

                        <table id="table_editar_produto_dev">
                            <caption></caption>
                            <th> Numero Devoluçao </th>
                            <th> Numero compra </th>
                            <th> Data</th>
                            <th> Estado </th>
                            <?php
                            //query vai selecionar todas as devolucoes onde o numero de compra estao na tabela de compras onde o login e quem esta logado
                            $sql2 = "SELECT * FROM `devolucoes` WHERE estado='Nao Aprovada' and numero_compra in ( SELECT numero_compra from compra where login_Uti='$login')";
                            $query = mysql_query($sql2);
                            $row = mysql_num_rows($query);
                            if ($row > 0) {
                                while ($linha = mysql_fetch_array($query)) {
                                    $numero = $linha ['numero_devolucao'];
                                    $numero_compra = $linha['numero_compra'];
                                    $data = $linha['data'];
                                    $estado = $linha['estado'];
                                    ?>
                                    <tr>
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

                    <?php
                }
                ?>

            
            </div>
        
    </div>
        </body>
            
</html>




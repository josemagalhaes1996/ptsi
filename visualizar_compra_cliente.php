<?php
include_once 'Funcoes_bd.php';
include_once 'mysql.connect.php';
ligar_base_dados();
include_once 'headerCli.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Escolha de Pagamento</title>
        <link rel="stylesheet" type="text/css" href="Rproduto.css"/>
        <script type="text/javascript" src="RegistoProduto.js"></script>
        <meta charset="UTF-8">
    </head>

    <body>
        <div id="novosprodutosbar">
            <h3 class="bar-title">Historico de Vendas</h3>
            <div id="abaixo_pag">
                
                <div>
                    <p>*****Aqui poderá realizar a visualizaçao de todas as compras que efectuou , assim como o estado das mesmas****</p>
                </div>
                <form   method="post" action="visualizar_compra_cliente.php">
                        <select name="opcao">
                            <option value="Em tratamento">Em tratamento</option>
                            <option value="Expedida">Expedida</option>
                            <option value="Pagamento Efectuado" selected>Pagamento efectuado</option>


                        </select> 
                        <input type="submit" value="Mostrar Compra">
                </form>
                 <div id="Edita_produto2">               
                <?php
                if (!(isset($_REQUEST['opcao'])) || ($_REQUEST['opcao']=="Pagamento Efectuado")) {
                    //se nao tiver nenhuma tabela aparece as compras paga    
                
                ?>
                <div id="tabela_produto2_compra">Tabela Compras Pagas</div>

                <div id="scroll_tabela_pagamento">

                    <table id="table_editar_produto_compra">
                        <caption></caption>
                        <th> Numero Compra </th>
                        <th> Login Cliente </th>
                        <th> Data</th>
                        <th>Tipo pagamento</th>
                        <th> Total compra </th>
                        <th> Estado </th>
                        

<?php
$sql = "SELECT * FROM compra WHERE estado='Pagamento Efectuado' AND login_Uti='$login'";
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
                        

                                </tr>

        <?php
    }
}
?>
                    </table>
                </div>
            </div>

                <?php 
                }else{
                
                    $opcao= $_REQUEST['opcao'];
                          
                    if($opcao=="Em tratamento"){
                        
                    
                
                ?>

            <div id="Edita_produto2">

                
                
                <div id="scroll_tabela_pagamento1">

                    <table id="table_editar_produto_compra">
                        <caption></caption>
                        <th> Numero Compra </th>
                        <th> Login Cliente </th>
                        <th> Data</th>
                        <th>Tipo pagamento</th>
                        <th> Total compra </th>
                        <th> Estado </th>
                        

<?php
$sql = "SELECT * FROM compra WHERE estado='Em Tratamento' AND login_Uti='$login'";
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
                                    

                                </tr>

        <?php
    }
}
?>
                    </table>
                </div>
            </div>


            <?php
                    }else{
            ?>


            <div id="Edita_produto2">

                
            
                <div id="scroll_tabela_pagamento1">

                    <table id="table_editar_produto_compra">
                        <caption></caption>
                        <th> Numero Compra </th>
                        <th> Login Cliente </th>
                        <th> Data</th>
                        <th>Tipo pagamento</th>
                        <th> Total compra </th>
                        <th> Estado </th>


<?php   
$sql = "SELECT * FROM compra WHERE estado='Expedida' AND login_Uti='$login' ";
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


                                </tr>

        <?php
    }
}
                    }
                }
                
?>
                    </table>
                </div>
            </div>



        </div>
        </div>
        <div id="footer_vi">
            <?php
include_once 'footersimple.php';
    ?>
        </div>
    </body>
</html>



<!DOCTYPE html>

<html>
    <head>
        <title> Informações de Compras </title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" type="text/css" href="Ines.css"/>
        <script type="text/javascript" src="RegistoCF.js"></script>
    </head>

    <body id="Body_Cliente">

        <?php
        include_once 'funcoes_bd.php';
        include_once 'mysql.connect.php';
        include_once 'headerAdmin.php';
        ligar_base_dados();
        $id = $_REQUEST['id'];
        ?>

        <div>
            <div id="mainbodymp">
                <div id="novosprodutosbar">
                    <h3 class="bar-title" style="padding: 0.5%;">Informações de Compras</h3>
                </div>
                <form name="form" method="post" action="ListarCompras.php" enctype="multipart/form-data">
                    <div id="opcoes">
                        <marquee>****Aqui poderá visualizar todas as informações ralativas a uma dada compra realizada na GardenCorporation**** </marquee>
                    </div>
                    <p>
                    <h4 style="padding: 0.5%;"> Processos da Compra :</h4> <br>
                    <?php
                    $query2 = "SELECT * From auxiliar_compra where numero_compra ='$id'";
                    $sql2 = mysql_query($query2);
                    if (mysql_num_rows($sql2) > 0) {
                        while ($dados = mysql_fetch_array($sql2)) {
                            $numero_compra = $dados ['numero_compra'];
                            $estado = $dados['estado'];
                            $funcionario = $dados['login_func'];
                            $data = $dados['data'];

                            if ($estado == "Pagamento Aprovado") {
                                ?>
                                <div id="negrito"> 
                                    <strong>  <p>  Aprovação de Pagamento :</p></strong>
                                    Data:<?php echo $data ?><br>
                                    Funcionario: <?php echo $funcionario ?>
                                </div>
                                <?php
                            }
                            if ($estado == "Compra Iniciada ") {
                                ?>
                                <div id="iniciar_c">
                                    <strong>  <p> Inicialização da compra:</p></strong>
                                    Data:<?php echo $data ?><br>
                                    Funcionario: <?php echo $funcionario ?>
                                </div>
                                <?php
                            }
                            if ($estado == "Compra Finalizada ") {
                                ?>

                                <div id="iniciar_c1" style="margin-bottom: -6%;"> 
                                    <strong>  <p> Finalização da compra:</p></strong>
                                    Data: <?php echo $data ?><br>
                                    Funcionario: <?php echo $funcionario ?>
                                </div>
                                <?php
                            }

                            if ($estado == "Devolucao Aprovada ") {
                                ?>
                                <strong>  <p> Aprovaçao da Devoluçao:</p></strong>
                                Data: <?php echo $data ?> <br>
                                Funcionario: <?php echo $funcionario ?>

                                <?php
                            }
                        }
                    }
                    ?>

                    </p>
                    <pre>
                
                








                    </pre>
                    <div id="botoes">
                        <p>
                            <input type="hidden" value="enviado" name="acao">
                            <input id="button-registar" type="button" value="Voltar" onclick="window.close()">

                        </p>
                    </div>
                </form>
            </div>
        </div>


        <div id="scroll_tabela_ines">
            <table id="table_editar_cliente">
                <pre>
                </pre>
                <th> Numero Compra </th>
                <th> Numero Produto </th>
                <th> Nome do Produto </th>
                <th> Quantidade </th>
                <th> Preço Unidade </th>
                <th> Preço Total do Produto </th>
                <th> Imagem </th>

                <?php
                $query = "SELECT * FROM linha_compra WHERE `linha_compra`.`n_compra` = '$id'";
                $sql = mysql_query($query);
                $row = mysql_num_rows($sql);
                if ($row > 0) {
                    while ($linha = mysql_fetch_array($sql)) {
                        $n_compra = $linha['n_compra'];
                        $numero_produto = $linha['numero_produto'];
                        $quantidade = $linha['quantidade'];

                        $query2 = "SELECT* FROM `gardencorporation`.`produto` WHERE `produto`.`numero_produto` = '$numero_produto'";
                        $sql2 = mysql_query($query2);
                        $linha2 = mysql_fetch_array($sql2);
                        $nome_produto = $linha2['nome_produto'];
                        $precoUnidade = $linha2['preco'];
                        $imagem = $linha2['imagem'];

                        $subTotal = $quantidade * $precoUnidade;
                        ?>
                        <tr><td><?php echo $n_compra; ?></td>
                            <td><?php echo $numero_produto; ?></td>
                            <td><?php echo $nome_produto; ?></td>
                            <td><?php echo $quantidade; ?></td>
                            <td><?php echo $precoUnidade; ?></td>
                            <td><?php echo $subTotal; ?> € </td>
                            <td><img src="<?php echo $imagem; ?>" alt="imagem produto " width="90" height="70"> </td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
        </div>



        <br>
        <br>
        <?php
        include_once 'footersimple.php';
        ?>

    </body>
</html>
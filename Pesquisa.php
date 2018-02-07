<html>
    <head>
        <title>Pesquisar Produto</title>
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
        #echo ("<script>alert('Wrong Username or Password');</script>");
        ?> 
        <div id="mainbodymp">
            <div id="novosprodutosbar">
                <h3 class="bar-title" style="padding: 0.5%;">Pesquisar produto</h3>
            </div> 

            <form action="Pesquisa.php" method="post" enctype="multipart/form-data">

                <p>
                    <label id="login" for="login">Pesquisa Produto: </label>
                    <input type="hidden" name="acao">
                    <input type="text" name="name" id="login"  placeholder="Insira nome ou Numero"  >
                </p>

                <pre>
                    



                </pre>

                <div id="botoes">
                    <p>
                        <input type="hidden" name="acao">
                        <input  id="button-entrar" type="button" value="Voltar" onclick="history.go(-1)">
                        <button id="button-registar" type="Submit" onclick="" >Procurar</button>
                    </p>
                </div>

            </form>

            <?php
            if (isset($_REQUEST['acao'])) {
                ?>
                <div id="Tabela_scroll_stock">
                    <table id="table_listar_cliente">
                        <caption></caption>
                        <th> Numero produto </th>
                        <th> Nome Produto </th>
                        <th> Quantidade disponivel </th>
                        <th> Preço </th>
                        <th>Foto </th>

                        <?php
                        global $row;
                        if (isset($_REQUEST['acao'])) {
                            $buscar_produto = $_REQUEST["name"];
                            $sql = "SELECT * FROM produto WHERE nome_produto LIKE'%$buscar_produto%' or numero_produto='$buscar_produto' ";
                            $query = mysql_query($sql);
                            $row = mysql_num_rows($query);
                            if ($row > 0) {
                                while ($linha = mysql_fetch_array($query)) {
                                    $numero = $linha ['numero_produto'];
                                    $nome = $linha['nome_produto'];
                                    $quantidade = $linha['quantidade_produto'];
                                    $preco = $linha['preco'];
                                    $foto = $linha ['imagem'];
                                    ?>

                                    <tr><td><?php echo $numero; ?></td>
                                        <td><?php echo $nome; ?></td>
                                        <td><?php echo $quantidade; ?></td>
                                        <td><?php echo $preco; ?> </td>
                                        <td><img src="<?php echo $foto; ?>" alt="imagem do produto" width="100" height="50"></td>
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

                <div id="total_registo" style="margin-left: 47%">
                    Total Registos: <?php
                    echo $row;
                }
                ?>
            </div>

        </div>

        <?php
        include_once 'footersimple.php';
        ?>

    </body>

</html>




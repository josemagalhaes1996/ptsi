<html>
    <head>
        <title>Editar Produto</title>
        <link rel="stylesheet" type="text/css" href="Ines.css"/>
        <script type="text/javascript" src="RegistoProduto.js"></script>
        <meta charset="UTF-8">
    </head>

    <body id="Body_Cliente">

        <?php
        include_once 'Funcoes_bd.php';
        include_once 'mysql.connect.php';
        include_once 'headerFunc.php';

        ligar_base_dados();
        $id = $_REQUEST['id'];
        $query = "SELECT* FROM `gardencorporation`.`produto` WHERE `produto`.`numero_produto` = $id";
        $sql = mysql_query($query);
        $linha = mysql_fetch_array($sql);
        $nome = $linha['nome_produto'];
        $preco = $linha['preco'];
        $foto = $linha['imagem'];
        ?>

        <div id="mainbodymp">
            <div id="novosprodutosbar">    
                <h3 style="padding: 0.5%;"> Edição de Produtos</h3>
            </div>

            <form name="form" action="produtoEdit1.php" method="post" enctype="multipart/form-data" onclick="return valida_edita();">
                <div style="margin-bottom: 8%;">
                    <p>
                        <label id="nome" for="nome">Nome do produto:</label>
                        <input type="hidden" value="<?php echo $id; ?>" name="numero" />
                        <input id="nome" type="text" name="nome" required value="<?php echo $nome; ?>" maxlength="50">
                    </p>

                    <p>
                        <label id="nome" for="nome">Preço produto:</label>
                        <input id="preço" type="text" name="preco" required value="<?php echo $preco ?>">
                    </p>

                    <p>
                        <label id="nome" for="nome">Imagem produto:</label>
                        <input id="fotogragia" type="text" name="fotografia" required  value="<?php echo $foto ?>">
                    </p>
                </div>

                <div id="botoes">
                    <p>
                        <input type="hidden" value="enviado" name="acao">

                        <input id="button-registar" type="button" value="Voltar" onclick="window.history.go(-1);">
                        <button id="button-registar" type="Submit" onclick="return editar() && valida_edita()">Editar</button>
                    </p>
                </div>

            </form> 



            <div id="Tabela_scroll_stock">

                <table id="table_listar_cliente">
                    <caption></caption>
                    <th> Numero produto </th>
                    <th> Nome Produto </th>
                    <th> Quantidade disponivel </th>
                    <th> Preço </th>
                    <th>Foto </th>

                    <?php
                    $sql = "SELECT * FROM produto";
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


                                <?php
                            }
                            ?>
                    </table>

                </div>
                <pre>
                                
                </pre>
            </div>
        <?php } else {
            ?>
            <div>
                <p style="color:red; text-align: center">Nao existem registos na base de dados</p>
            </div>


            <?php
        }
        include_once 'footersimple.php';
        ?>


    </body>
</html>




<html>

    <head> 
        <title>Alteraçao Stock</title>
        <link rel="stylesheet" type="text/css" href="Ines.css" />
        <meta charset="UTF-8"/>
        <script type="text/javascript" src="RegistoProduto.js"></script>

    </head>

    <body id="Body_Cliente">
        <?php
        include 'headerFunc.php';
        include_once 'Funcoes_bd.php';
        include_once 'mysql.connect.php';
        ligar_base_dados();
        $id = $_REQUEST['id'];
        $query = "SELECT* FROM `gardencorporation`.`produto` WHERE `produto`.`numero_produto` = $id";
        $sql = mysql_query($query);
        $linha = mysql_fetch_array($sql);
        $nome = $linha['nome_produto'];
        $preco = $linha['preco'];
        $foto = $linha['imagem'];
        $quantidade_produto = $linha['quantidade_produto'];
        ?>

        <div id="mainbodymp">

            <div id="novosprodutosbar">
                <h3 class="bar-title" style="padding: 0.5%;">Atualizar Stock</h3>

            </div>
            <form name="form" action="#" method="post" onsubmit="" enctype="multipart/form-data">
                <div style="margin-bottom: 8%;">
                    <p>
                        <label id="nome" for="nome">Numero do produto:</label>
                        <input type="text" name="nome" id="nome" value="<?php echo $id ?>" disabled=""  maxlength="50">
                    </p>

                    <p>
                        <label id="nome" for="nome">Nome do produto:</label>
                        <input type="text" name="nome" id="nome" value="<?php echo $nome ?>" disabled=""  maxlength="50">
                    </p>

                    <p>
                        <label id="nome" for="nome">Quantidade:</label>
                        <input id="nome"  min="0" type="number" name="quantidade" required  placeholder="Quantidade ex: 5">
                    </p>

                    <input type="hidden" name="numero_produto"  value="<?php echo $id ?>">
                    <input type="hidden" name="acao" value="enviado"/>
                    <input type="hidden" name="quantidade1" value="<?php echo $quantidade_produto ?>" >

                </div>


                <div id="botoes" style="margin-left: 70%;">
                    <p>
                        <input type="hidden" value="enviado" name="acao">

                        <input id="button-entrar" type="button" value="Voltar" onclick="history.go(-1)">
                        <button id="button-entrar" type="submit" onclick="document.form.action = 'Diminui_stock.php';
                                quantidade_stock();
                                quantidade_stock_possivel(<?php echo $quantidade_produto ?>)">Diminuir</button>
                        <button id="button-registar" name="but1" type="submit" onclick="document.form.action = 'Aumenta_stock.php';
                                quantidade_stock();">Aumentar</button>
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
                    <th>Selecionar</th>

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
                                <td><img src="<?php echo $foto; ?>" alt="imagem do produto" width="100" height="50"> </td>
                                <td><a href="stock_1.php?id=<?php echo $numero ?>" id="a_stock">Selecionar Produto</a></td>

                            </tr>

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
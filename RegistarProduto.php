<html>

    <head>
        <title>Registar Produto</title>
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
        ?>

        <div id="mainbodymp">
            <div id="novosprodutosbar">
                <h3 class="bar-title" style="padding: 0.5%;">Registar Produto</h3>
            </div>     

            <form name="form" action="RegistarProduto.php" method="post" onsubmit="return validacao();" enctype="multipart/form-data">
                <div style="margin-bottom: 8%;">
                <p>
                    <label id="nome" for="nome">Nome do produto:</label>
                    <input type="text" name="nome" id="nome" required placeholder="Nome produto" maxlength="50">
                </p>

                <p>
                    <label id="nome" for="nome">Quantidade inicial:</label>
                    <input id="quantidade" type="number" min="0" name="quantidade" required value="" placeholder="Quantidade ex:10" maxlength="11">
                </p>

                <p>
                    <label id="nome" for="nome">Preço produto:</label>
                    <input id="preço" type="text" name="preco" required placeholder="preço em €">
                </p>

                <p>
                    <label id="nome" for="nome">Imagem produto:</label>
                    <input id="fotogragia" type="text"  required name="fotografia"  placeholder=" ex: image.jpg/png">
                </p>
                </div>
                


                <div id="botoes">
                    <p>
                        <input type="hidden" value="enviado" name="acao">

                        <input id="button-registar" type="Submit"  value="Registar">
                        <input id="button-registar" type="button" value="Voltar" onclick="window.history.go(-1);">
                    </p>
                </div>    

            </form> 

            <?php
            if (isset($_POST['acao']) && $_POST["acao"] == "enviado") {
                $nome_produto = $_POST["nome"];
                $quantidade_produto = $_POST["quantidade"];
                $preco = $_POST["preco"];
                $foto = $_POST["fotografia"];
                if (empty($foto) || empty($nome_produto) || empty($quantidade_produto) || empty($preco)) {
                    
                } else {
                    insere_produto($nome_produto, $quantidade_produto, $preco, $foto);
                    echo "<script language='javascript'> alert('Produto registado com sucesso.')</script>";
                }
            }
            ?>

            <div id="Tabela_scroll_stock" > 
                <table id="table_listar_cliente" >
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

                            <tr><td><?php echo $numero; ?></td> <td><?php echo $nome; ?></td>
                                <td><?php echo $quantidade; ?></td>
                                <td><?php echo $preco; ?> </td>


                                <td><img src="<?php echo $foto ?>" alt="imagem do produto" width="100" height="50">  </td></tr>

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

                <p style="color:red; text-align: center"> Desculpe nao existe registos na base de dados</p>
            </div>

            <?php
        }
        include_once 'footersimple.php';
        ?>



    </body>
</html>
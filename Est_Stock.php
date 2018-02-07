<html>

    <head>
        <title>Produtos sem Stock </title>
        <link rel="stylesheet" type="text/css" href="Ines.css"/>
        <script type="text/javascript" src="RegistoProduto.js"></script>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
        include_once 'mysql.connect.php';
        include_once 'Funcoes_bd.php';
        include_once 'headerFunc.php';
        ligar_base_dados();
        ?>
        <div>
            <div id="mainbodymp">
                <div id="novosprodutosbar">
                    <h3 class="bar-title" style="padding: 0.5%;">Produtos sem stock</h3>
                </div>

                <?php
                $sql = "SELECT * FROM `produto` WHERE quantidade_produto =0 ";
                $query = mysql_query($sql);
                $row = mysql_num_rows($query);
                if ($row > 0) {
                    ?>
                    <div><marquee>Neste momento, o(s) seguinte(s) artigo(s) encontra(m)-se sem stock disponível:</marquee></div>    
                    <pre>
                                
                    </pre>
                    <div id="scroll_tabela_ines" style="margin-left: 3%; margin-top: 1%;"> 
                        <table id="table_listar_cliente" style="margin-left: 50%; margin-top: 1%">
                            <th> Numero produto </th>
                            <th> Nome Produto </th>
                            <th> Quantidade disponivel </th>
                            <th> Preço </th>
                            <th>Foto </th>

                            <?php
                            $sql = "SELECT * FROM `produto` WHERE quantidade_produto =0 ";
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


                                        <td><img src="<?php echo $foto ?>" alt="imagem do produto" width="100" height="50">  </td></tr>

                                    <?php
                                }
                                ?>
                            </table>
                        </div>
                    <?php } else {
                        ?>
                        <div>

                            <p style="color:red; text-align: center"> Desculpa nao existe registos na base de dados</p>
                        </div>
                        <?php
                    }
                    ?>
                    <div id="sem_stock" style="margin-left: 45%;">Caso queira adicionar clique<a href="Atualizar_Stock.php"> aqui</a></div>
                </div>

            </div>
            <div >
                <input id="buttonvoltar" type="button" value="Voltar" onclick="window.history.go(-1);">
                
            </div>
            <?php
        } else {
            ?>
            <p>De momento todos os produtos existem na tabela</p>
            <?php
        }
        ?>
    </div>
    <div id="foesta1">
        <?php
        include 'footersimple.php';
        ?>
    </div>
</body>
</html>


 <html>
	
	<head> 
		<title>Alteraçao Stock</title>
		<link rel="stylesheet" type="text/css" href="Rproduto.css" />
		<meta charset="UTF-8"/>
                <script type="text/javascript" src="RegistoProduto.js"></script>

	</head>

	<body>
        <?php
        include 'headerFunc.php';
        include_once 'Funcoes_bd.php';
        include_once 'mysql.connect.php';
        ligar_base_dados();
        ?>
            <div id="corpo_stock">
                
                    <div>
                        <h1 style="text-align: center; font-family: Comic Sans MS"> Alteraçao Stock</h1>
                    </div>
                <div id="form_stok">
                 <form name="form" action="RegistarProduto.php" method="post" onsubmit="return valida_edita_produto();" enctype="multipart/form-data">
                        <fieldset>
                            <legend>Produto:</legend>
                            <div id="fielset_aju">
                            <label >Nome do produto:</label>
                            <br>
                            <input id="nome" type="text" name="nome"  placeholder="Nome produto" maxlength="50"/>
                            <br>
                            <label>Quantidade</label>
                            <br>
                            <input id="quantidade" type="text" name="quantidade"  placeholder="Quantidade ex: 5" />
                            
                            <input type="hidden" name="acao" value="enviado"/>

                            <button id="submit_stock" type="submit">Aumentar Stock</button>
                            <button id="submit_stock" type="submit">Diminuir Stock</button>
                            <input id="voltar_editar_stock" type="button" value="Voltar" onclick="history.go(-1)">
                            </div>
                            </fieldset>


                    </form> 
                </div>
                <div id="tabela_produtos_stock">Tabela Produtos:</div>
                
                <div id="Tabela_scroll_stock">
	<table id="table_produto_stock">
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
                <div id="acerto_footer">
                      <?php 
            include_once 'footersimple.php';
                ?> 
                </div>
              
    <?php } else {
        ?>
        <div>
            <p style="color:red; text-align: center">Nao existem registos na base de dados</p>
        </div>
        <?php
    }
    ?>
                 
                </div>
        </body>
        
</html> 
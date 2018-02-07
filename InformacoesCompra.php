<!DOCTYPE html>
  <?php
        include_once 'funcoes_bd.php';
        include_once 'mysql.connect.php';
        include_once 'headerCli.php';
        ligar_base_dados();
       
        if(isset($_SESSION['login'])){
            $login=$_SESSION['login'];
        
        $id = $_REQUEST['id'];

        ?>


<html>
    <head>
        <title> Informações de Compras </title>
        <meta charset="UTF-8"/>
        <?php
                 $query_css="select * from css where login_Uti='$login'";
                 $sql_css = mysql_query($query_css);
                 if(mysql_num_rows($sql_css)>0){
                     $css=  mysql_fetch_array($sql_css);
                     $mainPage=$css['Ines'];
                 
                     ?><link rel="stylesheet" type="text/css" href="<?php echo $mainPage; ?>" /><?php
                 }else{
                 $css_insert ="INSERT INTO `gardencorporation`.`css` (`mainPage`, `Rproduto`, `Ines`, `login_Uti`) VALUES ('css_original/MainPage.css', 'css_original/Rproduto.css', 'css_original/Ines.css', '$login');";
               $sql_insert=  mysql_query($css_insert);
?>
            <link rel="stylesheet" type="text/css" href="css_original/Ines.css" />   
           <?php             
                 }
                 
            
            ?>
        <script type="text/javascript" src="RegistoCF.js"></script>
    </head>

    <body id="Body_Cliente">

        <?php
        include_once 'funcoes_bd.php';
        include_once 'mysql.connect.php';
        include_once 'headerCli.php';
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
                        <marquee>****Aqui poderá visualizar todas as informações ralativas a uma dada compra realizada na GardenCorporation****</marquee>
                    </div>
                    <p>
                    <div style="margin-top: 2%;">
                        <h4 style="padding: 0.5%"> Processos da Compra :</h4> <br>
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
                                    <div id="negrito" style="margin-left: 20%;"> 
                                        <strong>  <p>  Aprovação de Pagamento :</p></strong>
                                        Data:<?php echo $data ?><br>
                                        Funcionario: <?php echo $funcionario ?>
                                    </div>
                                    <?php
                                }
                                if ($estado == "Compra Iniciada ") {
                                    ?>
                                    <div id="iniciar_c" style="margin-left: 40%;">
                                        <strong>  <p> Inicialização da compra:</p></strong>
                                        Data:<?php echo $data ?><br>
                                        Funcionario: <?php echo $funcionario ?>
                                    </div>
                                    <?php
                                }
                                if ($estado == "Compra Finalizada ") {
                                    ?>
                                    <div id="iniciar_c1" style="margin-left: 60%;"> <strong>  <p> Finalizaçao da compra:</p></strong>
                                        Data: <?php echo $data ?><br>
                                        Funcionario: <?php echo $funcionario ?></div>
                                    <?php
                                }

                                if ($estado == "Devolucao Aprovada ") {
                                    ?>
                                    <div style="margin-left: 80%;">
                                        <strong>  <p> Aprovação da Devoluçao:</p></strong>
                                        Data: <?php echo $data ?> <br>
                                        Funcionario: <?php echo $funcionario ?></div>

                                    <?php
                                }
                            }
                        }
                        ?>
                    </div>
                    </p>

                    <div id="botoes" style="margin-top: 10%;">
                        <p>
                            <input type="hidden" value="enviado" name="acao">
                            <input id="button-registar" type="button" value="Voltar" onclick="window.close()">

                        </p>
                    </div>
                </form>



                <div id="scroll_tabela_ines" style="margin-top: 5%;">
                    <table id="table_editar_cliente" style="margin-top: 1%;">
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

            </div>
        </div>
        <br>

        <?php
        include_once 'footer.php';
        include_once 'footersimple.php';
        }
        ?>

    </body>
</html>
<html>
    <head>
        <title>Pesquisar Cliente</title>
        <link rel="stylesheet" type="text/css" href="Ines.css"/>
        <script type="text/javascript" src="RegistoCF.js"></script>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
        include_once 'mysql.connect.php';
        include_once 'Funcoes_bd.php';
        include_once 'headerFunc.php';
        ligar_base_dados();
        ?> 
        <div id="mainbodymp">
            <div id="novosprodutosbar">
                <h3 class="bar-title" style="padding: 0.5%;">Pesquisar Cliente</h3>
            </div>
        
            <form name="form" method="post" action="Pesquisa_Cliente.php" onsubmit="" enctype="multipart/form-data"> 
                <p>
                    <label id="login" for="login">Pesquisa pelo Nome ou Telefone:</label>
                    <input type="hidden" name="acao">
                    <input type="text" name="name" id="login" required placeholder="Insira nome ou telefone"  >
                </p>

                <br>
                <br>
                <br>
                <br>

                <div id="botoes">
                    <p>
                        <input type="hidden" name="acao">

                        <button id="button-registar" type="Submit" onclick="" >Procurar</button>
                        
                    </p>
                </div>

            </form>
            <br>
            <br>



            <?php if (isset($_REQUEST['acao'])) {
                ?>
                <?php
                        global $row;
                        if (isset($_REQUEST['acao'])) {
                            $buscar_cliente = $_REQUEST["name"];
                            $sql = "SELECT * FROM cliente WHERE nome_cliente LIKE'%$buscar_cliente%' or telefone = '$buscar_cliente'";
                            $query = mysql_query($sql);
                            $row = mysql_num_rows($query);
                            if ($row > 0) {
                               ?>
                <div id="scroll_tabela_pesquisar">
                    <table id="table_pesquisar_cliente">
                        <caption></caption>
                        <th> Nome Cliente </th>
                        <th> Login  </th>
                        <th> Telefone </th>
                        <th> NIF </th>
                        <th> Morada</th>
                        <th> Email</th>

                        <?php
                        global $row;
                        if (isset($_REQUEST['acao'])) {
                            $buscar_cliente = $_REQUEST["name"];
                            $sql = "SELECT * FROM cliente WHERE nome_cliente LIKE'%$buscar_cliente%' or telefone = '$buscar_cliente'";
                            $query = mysql_query($sql);
                            $row = mysql_num_rows($query);
                            if ($row > 0) {
                                while ($linha = mysql_fetch_array($query)) {
                                    $login = $linha ['login_Uti'];
                                    $email = $linha['email'];
                                    $morada = $linha['morada'];
                                    $telefone = $linha['telefone'];
                                    $nif = $linha ['NIF'];
                                    $nome = $linha ['nome_cliente'];
                                    ?>

                                    <tr><td><?php echo $nome; ?></td>
                                        <td><?php echo $login; ?></td>
                                        <td><?php echo $telefone; ?></td>
                                        <td><?php echo $nif; ?> </td>
                                        <td><?php echo $morada ?> </td>
                                        <td><?php echo $email; ?> </td>

                                    </tr>

                                    <?php
                                }
                            }
                        }
                        }else{
                            echo "<script>alert('Sem Dados')</script>";
                            
                        }
                        
            }
            
                                }
                        ?>

                    </table>
                    
                    
                </div>
            <br>
            <br>
            <br>
            <br>

        </div> 
        <?php
        include_once 'footersimple.php';
        ?>

    </body>

</html>





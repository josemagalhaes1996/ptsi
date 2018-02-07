<html>

    <head>
        <title>Editar Funcionario</title>
        <link rel="stylesheet" type="text/css" href="Ines.css"/>
        <script type="text/javascript" src="RegistoProduto.js"></script>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
        include_once 'mysql.connect.php';
        include_once 'Funcoes_bd.php';
        ligar_base_dados();
        include_once 'headerAdmin.php';
        ?>

        <div id="mainbodymp">

            <div id="novosprodutosbar" >
                <h3 class="bar-title"style=" padding: 0.5%; ">Editar Funcionário</h3>
            </div>
            <marquee>Aqui poderá proceder à alteração de informações relativas a todos os funcionários</marquee>






            <div style="margin-top: 15%;">
                <div id="scroll_tabela_ines">

                    <table id="table_editar_cliente">
                        <pre>                       
                        </pre>
                        <th> Login Funcionario </th>
                        <th> Nome Funcionario </th>

                        <th> Email </th>
                        <th>Editar</th>
                        <th>Apagar</th>
                        <?php
                        $sql = "SELECT * FROM funcionario";
                        $query = mysql_query($sql);
                        $row = mysql_num_rows($query);
                        if ($row > 0) {
                            while ($linha = mysql_fetch_array($query)) {
                                $login_utilizador = $linha['login_Uti'];
                                $email = $linha['email'];
                                $nome = $linha['nome_funcionario'];
                                ?>

                                <tr><td><?php echo $login_utilizador; ?></td>
                                    <td><?php echo $nome; ?></td>

                                    <td><?php echo $email; ?> </td>
                                    <td><a href="Edit_funcionario.php?id=<?php echo $login_utilizador ?>">Editar Funcionario</a></td>
                                    <td><a href="Apaga_funcionario.php?id=<?php echo $login_utilizador ?>" onclick="return eliminar_funcionario()">Apagar Funcionario</a></td>
                                </tr>

                                <?php
                            }
                            ?>
                        </table>
                    </div>

                <?php } else {
                    ?>
                    <div>
                        <p style="color:red; text-align: center">Nao existem registos na base de dados</p>
                    </div>
                    <?php
                }
                ?>

                <div id="botoes">
                    <input type="hidden" value="enviado" name="acao">
                    <p>
                        <input id="button-registar" type="button" value="Voltar" onclick="window.history.go(-1);">
                        <br>
                    </p>
                </div>
            </div>
            <pre>
            </pre>
        </div>


        <div id="foesta1">
            <?php
            include 'footersimple.php';
            ?>
        </div>
    </body>
</html>
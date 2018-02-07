<!DOCTYPE html>

<html>
    <head>
        <title> Listar Funcionario </title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" type="text/css" href="Ines.css" />
        <script type="text/javascript" src="RegistoCF.js"></script>
    </head>

    <body id="Body_Cliente">

        <?php
        include_once 'funcoes_bd.php';
        include_once 'mysql.connect.php';
        include_once 'headerAdmin.php';
        ligar_base_dados();
        ?>


        <div id="mainbodymp">
            <div id="novosprodutosbar">
                <h3 class="bar-title" style="padding: 0.5%;">Lista de Funcionario</h3>
            </div>
            <marquee>Aqui poderá ver a lista de todos os funcionários da GardenCorporation</marquee>

            <div style="margin-top: 15%; margin-right: 10%; margin-left: 25%;">
                <form name="form" method="post" action="Pesquisa_func.php" enctype="multipart/form-data">

                    <div id="scroll_tabela_ines">

                        <table id="table_listar_cliente" style="margin-top: -1%;">
                           
                            <th> Login </th>
                            <th> Nome </th>
                            <th> Email </th>

                            <?php
                            $sql = "SELECT * FROM funcionario";
                            $query = mysql_query($sql);
                            $row = mysql_num_rows($query);
                            if ($row > 0) {
                                while ($linha = mysql_fetch_array($query)) {
                                    $nome = $linha['nome_funcionario'];
                                    $login1 = $linha['login_Uti'];

                                    $email = $linha['email'];
                                    ?>

                                    <tr><td><?php echo $login1; ?></td>
                                        <td><?php echo $nome; ?></td>
                                        <td><?php echo $email; ?></td>
                                    </tr>


                                    <?php
                                }
                                ?>
                            </table>
                            
                        <div id="botoes" style="margin-left: 50%;">
                                <p>
                                    <input id="button-registar" type="button" value="Voltar" onclick="window.history.go(-1);">
                                </p>
                            </div>
                        </div>
                        <?php
                    } else {
                        ?> 
                        <div>
                            <p style="color:red; text-align: center">Nao existem registos na base de dados</p>

                        </div>
                        <?php
                    }
                    ?>

                </form>

            </div> 
        </div>

        <?php
        include_once 'footersimple.php';
        ?>

    </body>
</html>
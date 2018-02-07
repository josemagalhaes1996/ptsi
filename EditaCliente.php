<!DOCTYPE html>

<html>
    <head>
        <title> Edita Cliente </title>
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

        <div>
            <div id="mainbodymp" >
                <div id="novosprodutosbar" >
                    <h3 class="bar-title" style="padding: 0.5%;">Editar Cliente</h3>
                </div>
                <marquee>Aqui poderá proceder à alteração de informações relativas a todos os clientes</marquee>

                <div style="margin-top: 15%;">

                    <form name="form" method="post" action="EditaCliente.php"  enctype="multipart/form-data">

                        <pre>
                        </pre>


                        <div id="botoes">
                            <input type="hidden" value="enviado" name="acao">
                            <p>
                                <input id="button-registar" type="button" value="Voltar" onclick="window.history.go(-1);">
                                <br>
                            </p>
                        </div>

                    </form>

                </div>

            </div>
        </div>

        <div id="scroll_tabela_ines" style="width: 75%;" >
            <table id="table_editar_cliente">
                <pre>
                </pre>
                <th> Nome </th>
                <th> Login </th>
                <th> NIF </th>
                <th> Email </th>
                <th> Telefone </th>
                <th> Morada </th>
                <th>Editar</th>
                <th>Apagar</th>

                <?php
                $sql = "SELECT * FROM cliente";
                $query = mysql_query($sql);
                $row = mysql_num_rows($query);
                if ($row > 0) {
                    while ($linha = mysql_fetch_array($query)) {
                        $nome = $linha['nome_cliente'];
                        $login = $linha['login_Uti'];
                        $nif = $linha['NIF'];
                        $email = $linha['email'];
                        $telefone = $linha['telefone'];
                        $morada = $linha['morada'];
                        ?>

                        <tr><td><?php echo $nome; ?></td>
                            <td><?php echo $login; ?></td>
                            <td><?php echo $nif; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $telefone; ?></td>
                            <td><?php echo $morada; ?></td>

                            <td><a href="ClienteEdit.php?id=<?php echo $login ?>">Editar Cliente</a></td>
                            <td><a href="ApagarCliente.php?id=<?php echo $login ?>" onclick="return eliminar_cliente();">Apagar Cliente</a></td>
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





        <pre>
        </pre>
        <?php
        include_once 'footersimple.php';
        ?>



    </body>
</html>



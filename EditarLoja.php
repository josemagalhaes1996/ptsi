<!DOCTYPE html>

<html>
    <head>
        <title> Edita Loja </title>
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
                    <h3 class="bar-title" style="padding: 0.5%;">Editar Loja</h3>
                </div>
                <marquee>Aqui poderá proceder à alteração de informações relativas a todas as lojas!</marquee>

                <div style="margin-top: 15%;">

                    <form name="form" method="post" action="EditarLoja.php"  enctype="multipart/form-data">

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

        <div id="scroll_tabela_ines" >
            <table id="table_editar_cliente">
                <pre>
                </pre>
                <th> Número </th>
                <th> Morada </th>
                <th> Código-Postal </th>
                <th> Telefone </th>
                <th> Fax </th>
                <th>Editar</th>
                <th>Apagar</th>

                <?php
                $sql = "SELECT * FROM loja";
                $query = mysql_query($sql);
                $row = mysql_num_rows($query);
                if ($row > 0) {
                    while ($linha = mysql_fetch_array($query)) {
                        $numero = $linha['numero'];
                        $morada = $linha['Morada'];
                        $codigo = $linha['codigo_postal'];
                        $telefone = $linha['telefone'];
                        $fax = $linha['fax'];
                        ?>

                        <tr><td><?php echo $numero; ?></td>
                            <td><?php echo $morada; ?></td>
                            <td><?php echo $codigo; ?></td>
                            <td><?php echo $telefone; ?></td>
                            <td><?php echo $fax; ?></td>

                            <td><a href="EditarLoja2.php?id=<?php echo $numero ?>">Editar Loja</a></td>
                            <td><a href="Apaga_loja.php?id=<?php echo $numero ?>" onclick="return eliminar_loja();">Apagar Loja</a></td>
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



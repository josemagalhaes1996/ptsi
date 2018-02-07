<!DOCTYPE html>

<html>
    <head>
        <title> Listar Clientes </title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" type="text/css" href="Ines.css" />
        <script type="text/javascript" src="RegistoCF.js"></script>
    </head>

    <body id="Body_Cliente">

        <?php
        include_once 'funcoes_bd.php';
        include_once 'mysql.connect.php';
        include_once 'headerFunc.php';
        ligar_base_dados();
        ?>


        <div id="mainbodymp">



            <div id="novosprodutosbar">
                <h3 class="bar-title" style="padding: 0.5%;">Lista de Clientes</h3>
            </div>

            <marquee>****Aqui poderá visualizar as informações relativas a todos os clientes da GardenCorporation****</marquee>
            <div style="margin-top: 17%;">


                <div id="scroll_tabela_ines" style=" width:70%;  overflow-y: scroll;">

                    <table id="table_editar_cliente">
                        <pre>
                        </pre>
                        <th> Nome </th>
                        <th> Login </th>
                        <th> NIF </th>
                        <th> Email </th>
                        <th> Telefone </th>
                        <th> Morada </th>

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
                                    <td><?php echo $morada ?></td>
                                </tr>   

                                <?php
                            }
                            ?>
                        </table>

                    </div>
                    <br>
                    <br>
                    <br>
                    <?php
                } else {
                    ?> 
                    <div>
                        <p style="color:red; text-align: center">Nao existem registos na base de dados</p>

                    </div>
                    <?php
                }
                ?>
                <p>
                    <input id="buttonvoltar" type="button" value="Voltar" onclick="window.history.go(-1);">

                </p>
            </div>
        </div> 
    </div>

    <?php
    include_once 'footersimple.php';
    ?>

</body>
</html>
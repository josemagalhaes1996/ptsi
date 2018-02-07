<?php
include_once 'mysql.connect.php';
include 'Funcoes_bd.php';
include_once 'headerAdmin.php';
ligar_base_dados();
?>
<html>
    <header>
        <title>Alteraçao Dias Devolucao</title>
        <link rel="stylesheet" type="text/css" href="Ines.css"/>
        <script type="text/javascript" src="RegistoProduto.js"></script>
        <meta charset="UTF-8">
    </header>
    <body id="body_bonus">
        <div id="mainbodymp">
            <div id="novosprodutosbar">
                <h3 class="bar-title" style="padding: 0.5%; ">Alteração dos dias de devolução: </h3>
            </div>
            <?php
            $query = "SELECT * from estatistica";
            $sql = mysql_query($query);
            $row = mysql_num_rows($sql);
            if ($row > 0) {
                while ($linha = mysql_fetch_array($sql)) {
                    $dias = $linha['numero_dias'];
                }
            }
            ?>
            <p style="padding: 0.5%;">O número de dias que são permitidos para efectuar uma devolucao,  na empresa <em>Garden Corporation</em>:<strong> <?php echo $dias ?>  dias</strong>
                em todas as vendas.
            </p>

            <form method="post" action="Altera_devolucao.php" onsubmit="" id="altera_bonus">
                <label style="padding: 0.5%;">Nova alteração de Dias Devolucão</label>
                <input type="number" name="dias"  required min="0"  >
                <button id="button-entrar" type="submit" >Alterar </button>

            </form>
            <pre>
                
            </pre>
        </div>
        <?php
        if (isset($_REQUEST['dias'])) {
            if (!($_REQUEST == 0)) {
                $novo_dia = $_REQUEST['dias'];
                altera_dias($novo_dia);
                echo "<script>alert('Alteraçao efectuado com sucesso')</script>";
                              echo "<script>location.reload()</script>";
                   

            }
        }
        ?>

    </div>
    <div id="foesta">
        <?php
        include_once 'footersimple.php';
        ?>
    </div>

</body>



</html>
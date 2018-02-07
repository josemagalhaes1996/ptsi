<?php
include_once 'mysql.connect.php';
include 'Funcoes_bd.php';
include_once 'headerAdmin.php';
ligar_base_dados();
?>
<html>
    <header>
        <link rel="stylesheet" type="text/css" href="Ines.css"/>
        <script type="text/javascript" src="RegistoProduto.js"></script>
        <meta charset="UTF-8">
    </header>
    <body id="body_bonus">
        <div id="mainbodymp">
            <div id="novosprodutosbar">
                <h3 class="bar-title" style="padding: 0.5%; ">Alteração da percentagem de bónus</h3>
            </div>
            <?php
            $query = "SELECT * from estatistica";
            $sql = mysql_query($query);
            $row = mysql_num_rows($sql);
            if ($row > 0) {
                while ($linha = mysql_fetch_array($sql)) {
                    $percentagem = $linha['numero_bonus'];
                }
            }
            ?>
            <p style="padding: 0.5%;">Bonus actual em vigor na empresa <em>Garden Corporation</em>:<strong> <?php echo $percentagem ?> %</strong>
            em todas as vendas.
            </p>
            
            <form method="post" action="Altera_bonus.php" onsubmit="" id="altera_bonus">
                <label style="padding: 0.5%;">Nova alteração de bonus</label>
                <input type="number" name="bonus"  required min="0"  >
                <button id="button-entrar" type="submit" >Alterar </button>
                
                <pre>
                    
                </pre>
        <?php
        if(isset($_REQUEST['bonus'])){
            $novo_bonus = $_REQUEST['bonus'];
            altera_bonus($novo_bonus);  
               echo "<script>alert('Alteraçao efectuado com sucesso')</script>";
               echo "<script>location.reload()</script>";
            
            
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

<!DOCTYPE html>
<html>
    <?php
    include 'headerCli.php';
    include_once 'Funcoes_bd.php';
    include_once 'mysql.connect.php';
    ligar_base_dados();


    if (isset($_REQUEST['acao']) && isset($_REQUEST['cmt'])) {
        $nome = $_REQUEST['name'];
        $comentario = $_REQUEST['comment'];
        $emailcomm = $_REQUEST['emailcomm'];

        insere_comment($nome, $comentario, $emailcomm, 'Aguarda Aprovacao', '');
    }
    ?>

    <head> 
        <title> Garden Corporation </title>
        <?php
                 $query_css="select * from css where login_Uti='$login'";
                 $sql_css = mysql_query($query_css);
                 if(mysql_num_rows($sql_css)>0){
                     $css=  mysql_fetch_array($sql_css);
                     $mainPage=$css['mainPage'];
                 
                     ?><link rel="stylesheet" type="text/css" href="<?php echo $mainPage; ?>" /><?php
                 }else{
                 $css_insert ="INSERT INTO `gardencorporation`.`css` (`mainPage`, `Rproduto`, `Ines`, `login_Uti`) VALUES ('css_original/MainPage.css', 'css_original/Rproduto.css', 'css_original/Ines.css', '$login');";
               $sql_insert=  mysql_query($css_insert);
?>
            <link rel="stylesheet" type="text/css" href="css_original/mainPage.css" />   
           <?php             
                 }
                 
            
            ?>
        <meta charset="UTF-8"/>
        <link rel="shortcut icon" href="gardenlogo.png" type="image/x-icon"/>
    </head>

    <body>
        <div id="mainbodymp">
            <div id="novosprodutosbar">
                <h3 class="bar-title" style="padding: 0.5%;">Fazer Comentário</h3>
            </div>

            <div id="showcomment" style="height: -10%;">
                <?php
                $query = "SELECT * FROM comentarios where estado_comm='Comentario Aprovado'";
                $sql = mysql_query($query);
                $row = mysql_num_rows($sql);
                if ($row > 0) {
                    while ($linha = mysql_fetch_array($sql)) {
                        $nome = $linha['name'];
                        $comentario = $linha['texto'];
                        $estado = $linha ['estado_comm'];
                        $resposta = $linha ['resposta_comm'];
                        ?>
                        <b> <?php echo $nome ?> </b><br>
                        <?php echo $comentario ?> <br>
                        <?php if ($resposta != NULL) { ?>
                            <b style='color: #006400'> Resposta: </b> <?php echo $resposta ?> <br> <?php } else {
                
            } ?>
                        <hr>
                    <?php }
                } ?>
            </div>
            <pre>
            </pre>



            <div id="commentzone" class="commentbox">
                <form action="commentCli.php" method='post' >
                    <label style="margin-left: 5%;" class="comm" for="nome">Nome: <input type='text' name='name' placeholder="Opcional" id='namecomm' /></label> <br/>
                    <label style="margin-left: 5%;" class="comm" for="nome">Email: <input type='text' name='emailcomm' placeholder="Introduzir email para obter resposta" id='namecomm' /></label> <br/>
                    <label style="margin-left: 5%;">Comentário:<br/>
                        <input style="margin-left: 5%;" type="hidden" name="acao" value="enviado">
                        <textarea style="margin-left: 5%;" name="comment" class="comm2" cols="45" rows="5" required id="comment" ></textarea></label> <br/>
                    <input style="margin-left: 5%;" type='submit' value='Submit' name="cmt"> 
                </form>
            </div>                

        </div>

    </body>

    <?php
    include 'footer.php';
       include 'footersimple.php';

    ?>

</html> 
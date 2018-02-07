<!DOCTYPE html>
<?php
include 'headerCli.php';
include_once 'Funcoes_bd.php';
include_once 'mysql.connect.php';
ligar_base_dados();
?>

<html>
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
            <!-- <div id="slider">
             </div> -->
            <div id="novosprodutosbar">
                <h3 class="bar-title" style="padding:0.5%;">Dados Cliente</h3>
            </div>
            <div id='perfil'>
                <?php $login = $_SESSION['login']; ?>
                <?php
                $query = "SELECT * FROM cliente";
                $sql = mysql_query($query);
                while ($dados = mysql_fetch_array($sql)) {
                    if ($login == $dados['login_Uti']) {
                        ?>
                        <div>
                            <p  style="padding:0.5%;"> <strong>Login:</strong>  <?= $dados['login_Uti'] ?> </p>
                            <p style="padding:0.5%;"> <strong>Nome:</strong> <?= $dados['nome_cliente'] ?> </p>
                            <p style="padding:0.5%;"> <strong>Email:</strong>  <?= $dados['email'] ?> </p>
                            <p style="padding:0.5%;"> <strong>Morada:</strong>  <?= $dados['morada'] ?> </p>
                            <p style="padding:0.5%;"> <strong>Telefone:</strong>  <?= $dados['telefone'] ?> </p>
                            <p style="padding:0.5%;"> <strong>Bónus:</strong>  <?= $dados['bonus'] ?>  €</p>
                            <p style="padding:0.5%;"> <strong>NIF:</strong> <?= $dados['NIF'] ?> </p>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </body>

    <?php
    include 'footer.php';
    include 'footersimple.php';
    ?>

</html> 
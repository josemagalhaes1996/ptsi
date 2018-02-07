<!DOCTYPE html>

<html>
    <head>
        <title>Editar Loja</title>
        <link rel="stylesheet" type="text/css" href="Ines.css"/>
        <script type="text/javascript" src="RegistoCF.js"></script>
        <meta charset="UTF-8">
    </head>

    <?php
    include_once 'funcoes_bd.php';
    include_once 'mysql.connect.php';
    ligar_base_dados();
    ?>

    <?php
    if (isset($_POST['acao']) && $_POST["acao"] == "enviado") {
        $lol = $_POST['login1'];
        $morada = $_POST['Morada'];
        $codigo = $_POST['codigo_postal'];
        $telefone = $_POST['telefone'];
        $fax = $_POST['fax'];
        
        $query99 = "UPDATE `gardencorporation`.`loja` SET `Morada` = '$morada', `codigo_postal` = '$codigo', `telefone` = '$telefone', `fax` = '$fax' WHERE `loja`.`numero` ='$lol'";
        $sql99 = mysql_query($query99);
    }


    header("location: EditarLoja.php");
    ?> 
</html>

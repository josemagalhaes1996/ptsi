<!DOCTYPE html>

<html>
    <head>
        <title>Editar Cliente</title>
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
        $id = $_POST['login1'];
        $nome = $_POST['nome'];

        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $morada = $_POST['morada'];


        edita_cliente($id, $email, $morada, $telefone, $nome);
    }

    header("location: EditaCliente.php");
    ?> 
</html>
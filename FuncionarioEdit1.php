<html>
<head>
    <title>Editar Produto</title>
    <link rel="stylesheet" type="text/css" href="Rproduto.css"/>
    <script type="text/javascript" src="RegistoProduto.js"></script>
    <meta charset="UTF-8">
</head>
<?php
include_once 'Funcoes_bd.php';
include_once 'mysql.connect.php';
ligar_base_dados();
?>
<?php
if (isset($_POST['acao']) && $_POST["acao"] == "enviado") {
    $utilizador = $_POST['login'];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    edita_funcionario($utilizador, $email, $nome);
header("location: Edita_funcionario.php");    
}
?> 
</html>


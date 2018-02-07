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
  
   $id = $_POST['numero'];
    $nome_produto = $_POST['nome'];
    $preco1 = $_POST['preco'];
    $foto1 = $_POST["fotografia"];
    edita_produto($id, $nome_produto, $preco1, $foto1);
}

header("location: Edita_produto.php");
?> 
</html>

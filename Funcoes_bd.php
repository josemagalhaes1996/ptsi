<?php

include 'mysql.connect.php';

function ligar_base_dados() {    #faz a ligacao , e depois e que seleciona uma base de dados, neste caso gardencoorporation
    $ligacao = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD,'Teste') or die('Erro ao ligar ao servidor...' . mysql_error());
    //$sql = mysqli_select_db('Teste', $ligacao) or die('Erro ao selecionar a base de dados...');
 
    return $ligacao;
}

function insere_comment($nome, $comentario,$emailcomm) {
    $query = "INSERT INTO `gardencorporation`.`comentarios` (`name`, `texto`, `email_comm`,`estado_comm`, `resposta_comm`) VALUES ('$nome', '$comentario', '$emailcomm', 'Aguarda Aprovacao', '');";
    $sql = mysql_query($query);
}

function insere_produto($nome, $quantidade, $preco, $foto) {
    $insereDados = "INSERT INTO produto (nome_produto, quantidade_produto, preco, imagem) VALUES ('$nome', '$quantidade', '$preco' , '$foto')";
    $sql = mysql_query($insereDados);
}

function edita_produto($id, $nome, $preco, $foto) {
    $query = "UPDATE `gardencorporation`.`produto` SET `nome_produto` = '$nome', `preco` = '$preco', `imagem` = '$foto' WHERE `produto`.`numero_produto` = '$id';";
    $sql = mysql_query($query);
}


function edita_funcionario($utilizador, $email , $nome){
    $query = "UPDATE `gardencorporation`.`funcionario` SET `email` = '$email', `nome_funcionario` = '$nome' WHERE `funcionario`.`login_Uti` = '$utilizador';";
    $sql = mysql_query($query); 
}

function insere_funcionario($login, $password, $email, $data ,$nome){
    $insereFunc = "INSERT INTO `gardencorporation`.`utilizador` (`login_Uti`, `password`, `tipo`) VALUES ('$login', '$password', '2')";
    $sql1 = mysql_query($insereFunc);
    $query ="INSERT INTO `gardencorporation`.`funcionario` (`login_Uti`, `email`, `nome_funcionario`, `data_password`) VALUES ('$login', '$email', '$nome', '$data');";
    $sql = mysql_query($query);
    
}

function insere_quantidade($id, $quantidade){
    $query = "UPDATE `gardencorporation`.`produto` SET `quantidade_produto` = '$quantidade' WHERE `produto`.`numero_produto` = '$id';";
    $sql = mysql_query($query);
}

function insere_cliente($login, $password, $email, $morada, $telefone, $nome, $nif) {
    $insereUtilizador = "INSERT INTO `gardencorporation`.`utilizador` (`login_Uti`, `password`, `tipo`) VALUES ('$login', '$password', '1')";
    $sql = mysql_query($insereUtilizador);
    $insereCliente = "INSERT INTO `gardencorporation`.`cliente` (`login_Uti`, `email`, `morada`, `telefone`, `bonus`, `nome_cliente`, `NIF`) VALUES ('$login', '$email', '$morada', '$telefone', '0', '$nome', '$nif');";
    $sql2 = mysql_query($insereCliente);
}

function insere_admin($utilizador, $password) {
    $query="INSERT INTO `gardencorporation`.`utilizador` (`login_Uti`, `password`, `tipo`) VALUES ('$utilizador', '$password', '3');";
    $sql = mysql_query($query);
    
}
 

function altera_bonus($bonus){
    $query="UPDATE `gardencorporation`.`estatistica` SET `numero_bonus` = '$bonus' WHERE `estatistica`.`id_config` = 1;";
    $sql=  mysql_query($query);
}

function altera_dias($dias){
    $query="UPDATE `gardencorporation`.`estatistica` SET `numero_dias` = '$dias' WHERE `estatistica`.`id_config` = 1;";
    $sql=  mysql_query($query);
}

function utilizador_valido($login, $password) {
    $ligacao = ligar_base_dados();
    $expressao = "SELECT * FROM utilizador WHERE login_Uti='$login' AND password='$password'";
    $resultado = mysql_query($expressao);
    $valor_retorno = false;

    if (mysql_num_rows($resultado) > 0) {
        $dados = mysql_fetch_assoc($resultado);
        if ($dados['password'] == $password) {
            $valor_retorno = $dados;
        }
    }
    mysql_free_result($resultado);
    mysql_close();
    return $valor_retorno;
}


function edita_cliente($id, $email, $morada, $telefone, $nome) {
    $query2 = "UPDATE `gardencorporation`.`cliente` SET `email` = '$email', `morada` = '$morada', `telefone` = '$telefone', `nome_cliente` = '$nome' WHERE `cliente`.`login_Uti` = '$id';";
    $sql2 = mysql_query($query2);
}

function edita_cliente2($login, $email, $morada, $telefone, $nome, $password) {
    $query7 = "UPDATE `gardencorporation`.`utilizador` SET `password` = '$password' WHERE `utilizador`.`login_Uti` = '$login';";
    $sql7 = mysql_query($query7);
    $query2 = "UPDATE `gardencorporation`.`cliente` SET `email` = '$email', `morada` = '$morada', `telefone` = '$telefone', `nome_cliente` = '$nome' WHERE `cliente`.`login_Uti` = '$login';";
    $sql2 = mysql_query($query2);
}


?>

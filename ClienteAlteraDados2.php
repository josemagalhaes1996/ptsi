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
        $login = $_POST['login2'];
        $nome = $_POST['nome'];
        $nif = $_POST['nif'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $morada = $_POST['morada'];
        $passantiga = $_POST['passantiga'];
        $password1 = $_POST['password1'];
        $passnova = $_POST['passnova'];


        $query2 = "SELECT * FROM utilizador WHERE login_Uti='$login'";
        $sql2 = mysql_query($query2);
        $num = mysql_num_rows($sql2);
        $linha2 = mysql_fetch_array($sql2);
        $password = $linha2['password'];

        if ($passantiga == $password) {
            if ($passnova == $password1) {
                edita_cliente2($login, $email, $morada, $telefone, $nome, $passnova);
                $data = date('Y-m-d G:i:s', strtotime("+ 1 year"));
            
            $query_update = "UPDATE `gardencorporation`.`data_password` SET `data` = '$data' WHERE `data_password`.`login_Uti` = '$login';";
            $sql_update = mysql_query($query_update);
             echo "<script>alert('Dados alterados com sucesso')</script>";
               echo "<script>window.close()</script>";
                echo "<script>window.open('ClienteAlteraDados.php')</script>";
                   echo "<script>window.close()</script>";   
               
            } else {
                echo "<script>alert('Os campos Nova Senha não coincidem, por favor introduza novamente todos os dados que pretende alterar!')";
             echo "<script>window.open('ClienteAlteraDados.php')</script>";
                   echo "<script>window.close()</script>";
            }
        } else {
            echo "<script>alert('O campo Senha Atual não corresponde à senha atual, por favor introduza novamente todos os dados que pretende alterar!')</script>";
             
                   echo "<script>window.close()</script>";
        }
    }
    ?> 
</html>
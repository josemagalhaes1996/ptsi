<?php

session_start();
include_once 'Funcoes_bd.php';
ligar_base_dados();
if (isset($_SESSION['login'])) {
    $login = $_SESSION['login'];
    if (isset($_REQUEST['id'])) {
        $numero = $_REQUEST['id'];

        if ($numero == 1) {
            $query_update = "UPDATE `gardencorporation`.`css` SET `mainPage` = 'css_azul/MainPage_azul.css', `Rproduto` = 'css_azul/Rproduto_azul.css', `Ines` = 'css_azul/Ines_azul.css' WHERE `css`.`login_Uti` = '$login';";
            $sql_query = mysql_query($query_update);
        }


        if ($numero == 2) {
            $query_update = "UPDATE `gardencorporation`.`css` SET `mainPage` = 'css_original/MainPage.css', `Rproduto` = 'css_original/Rproduto.css', `Ines` = 'css_original/Ines.css' WHERE `css`.`login_Uti` = '$login';";
            $sql_query = mysql_query($query_update);
        }



        if ($numero == 3) {
            $query_update = "UPDATE `gardencorporation`.`css` SET `mainPage` = 'css_vermelho/MainPage_vermelho.css', `Rproduto` = 'css_vermelho/Rproduto_vermelho.css', `Ines` = 'css_vermelho/Ines_vermelho.css' WHERE `css`.`login_Uti` = '$login';";
            $sql_query = mysql_query($query_update);
        }


        if ($numero == 4) {
            $query_update = "UPDATE `gardencorporation`.`css` SET `mainPage` = 'css_preto/MainPage_preto.css', `Rproduto` = 'css_preto/Rproduto_preto.css', `Ines` = 'css_preto/Ines_preto.css' WHERE `css`.`login_Uti` = '$login';";
            $sql_query = mysql_query($query_update);
        }
        echo "<script>window.history.go(-1);</script>";
    }
}
?>


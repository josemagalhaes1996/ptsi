<?php

if (isset($_REQUEST['id'])) {
    $numero = $_REQUEST['id'];

    if ($numero == 1) {
        //parte do original 
        $cookie_name = 'css';
        unset($_COOKIE[$cookie_name]);
        $res = setcookie($cookie_name, '', time() - 3600);
        $cookie_name = 'css';
        $cookie_value = 'css_azul/mainPage_azul.css';
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/');
        
        //parte do Rproduto 
        $cookie_name = 'cssP';
        unset($_COOKIE[$cookie_name]);
        $res = setcookie($cookie_name, '', time() - 3600);
        $cookie_name = 'cssP';
        $cookie_value = 'css_azul/Rproduto_azul.css';
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/');
        
        //parte da css da ines 
        $cookie_name = 'cssI';
        unset($_COOKIE[$cookie_name]);
        $res = setcookie($cookie_name, '', time() - 3600);
        $cookie_name = 'cssI';
        $cookie_value = 'css_azul/Ines_azul.css';
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/');
        
        
    }


    if ($numero == 2) {
        $cookie_name = 'css';
        unset($_COOKIE[$cookie_name]);
        $res = setcookie($cookie_name, '', time() - 3600);
        $cookie_name = 'css';
        $cookie_value = 'css_original/mainPage.css';
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/');
        
         //parte do Rproduto 
        $cookie_name = 'cssP';
        unset($_COOKIE[$cookie_name]);
        $res = setcookie($cookie_name, '', time() - 3600);
        $cookie_name = 'cssP';
        $cookie_value = 'css_original/Rproduto.css';
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/');
        
        //parte da css da ines 
        $cookie_name = 'cssI';
        unset($_COOKIE[$cookie_name]);
        $res = setcookie($cookie_name, '', time() - 3600);
        $cookie_name = 'cssI';
        $cookie_value = 'css_original/Ines.css';
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/');
        
    }
if ($numero == 3) {
        $cookie_name = 'css';
        unset($_COOKIE[$cookie_name]);
// empty value and expiration one hour before
        $res = setcookie($cookie_name, '', time() - 3600);
        $cookie_name = 'css';
        $cookie_value = 'css_vermelho/mainPage_vermelho.css';
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/');
        
         //parte do Rproduto 
        $cookie_name = 'cssP';
        unset($_COOKIE[$cookie_name]);
        $res = setcookie($cookie_name, '', time() - 3600);
        $cookie_name = 'cssP';
        $cookie_value = 'css_vermelho/Rproduto_vermelho.css';
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/');
        
        //parte da css da ines 
        $cookie_name = 'cssI';
        unset($_COOKIE[$cookie_name]);
        $res = setcookie($cookie_name, '', time() - 3600);
        $cookie_name = 'cssI';
        $cookie_value = 'css_vermelho/Ines_vermelho.css';
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/');
    }
    
    
    if ($numero == 4) {
        $cookie_name = 'css';
        unset($_COOKIE[$cookie_name]);
// empty value and expiration one hour before
        $res = setcookie($cookie_name, '', time() - 3600);
        $cookie_name = 'css';
        $cookie_value = 'css_preto/mainPage_preto.css';
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/');
        
        //parte do Rproduto 
        $cookie_name = 'cssP';
        unset($_COOKIE[$cookie_name]);
        $res = setcookie($cookie_name, '', time() - 3600);
        $cookie_name = 'cssP';
        $cookie_value = 'css_preto/Rproduto_preto.css';
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/');
        
        //parte da css da ines 
        $cookie_name = 'cssI';
        unset($_COOKIE[$cookie_name]);
        $res = setcookie($cookie_name, '', time() - 3600);
        $cookie_name = 'cssI';
        $cookie_value = 'css_preto/Ines_preto.css';
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/');
    }
}
echo "<script>window.history.go(-1);</script>";
?>


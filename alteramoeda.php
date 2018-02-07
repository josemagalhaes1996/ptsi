<?php
if(isset($_REQUEST['id'])){
    $numero = $_REQUEST['id'];
    
    if($numero==1){
          $cookie_name = 'moeda';
unset($_COOKIE[$cookie_name]);
// empty value and expiration one hour before
$res = setcookie($cookie_name, '', time() - 3600);
      $cookie_name = 'moeda';
$cookie_value = 'euro';
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/'); 
      
    }
    
    if($numero==2){
             $cookie_name = 'moeda';
unset($_COOKIE[$cookie_name]);
// empty value and expiration one hour before
$res = setcookie($cookie_name, '', time() - 3600);
      $cookie_name = 'moeda';
$cookie_value = 'dollar';
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/'); 
    }
}
  echo "<script>window.history.go(-1);</script>";
?>


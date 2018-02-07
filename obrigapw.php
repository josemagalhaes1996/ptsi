<!DOCTYPE html>
<?php
include_once 'funcoes_bd.php';
        include_once 'mysql.connect.php';
        
        session_start();
        ligar_base_dados();
if(isset($_SESSION['login'])){
      $login= $_SESSION['login'];
      $pass = $_SESSION['password'];

$query = "SELECT * FROM cliente WHERE `cliente`.`login_Uti` = '$login'";
        $sql = mysql_query($query);
        $linha = mysql_fetch_array($sql);
        $nome = $linha['nome_cliente'];
        $login1 = $linha['login_Uti'];
      

    if(isset($_REQUEST['pw']) || isset($_REQUEST['pwi'])){
            if(isset($_REQUEST['pwi'])){
   $verpw = "select * from utilizador where login_Uti ='$login'";
   $sqlpw = mysql_query($verpw);
   $dado = mysql_fetch_array($sqlpw);
   $pw = $dado['password'];
   if($pw == $_REQUEST['pwi']){
       echo "***PASSWORD TEM DE SER DIFERENTE DA ACTUAL****";
   }
                
            }
   if(isset($_REQUEST['pw'])){
       $verpw = "select * from utilizador where login_Uti ='$login'";
   $sqlpw = mysql_query($verpw);
   $dado = mysql_fetch_array($sqlpw);
   $pw = $dado['password'];
   
   if(!($pw== $_REQUEST['pw'])){
       
   
      echo " ***PASSWORD NAO CORRESPONDE***";
 
   }
   }
    
}else{
      include_once 'header.php';  
        

   
        
        ?>

        <html>
    <head>
        <title> Alterar Password </title>
         <?php
                 $query_css="select * from css where login_Uti='$login'";
                 $sql_css = mysql_query($query_css);
                 if(mysql_num_rows($sql_css)>0){
                     $css=  mysql_fetch_array($sql_css);
                     $mainPage=$css['Ines'];
                 
                     ?><link rel="stylesheet" type="text/css" href="<?php echo $mainPage; ?>" /><?php
                 }else{
                 $css_insert ="INSERT INTO `gardencorporation`.`css` (`mainPage`, `Rproduto`, `Ines`, `login_Uti`) VALUES ('css_original/MainPage.css', 'css_original/Rproduto.css', 'css_original/Ines.css', '$login');";
               $sql_insert=  mysql_query($css_insert);
?>
            <link rel="stylesheet" type="text/css" href="css_original/Ines.css" />   
           <?php             
                 }
                 
            
            ?>
        
        <meta charset="UTF-8"/>
      
        <script type="text/javascript" src="RegistoCF.js"></script>
    </head>

    
    <body id="Body_Cliente">  

        


        <div id="mainbodymp">
            <div id="novosprodutosbar">
                <h3 class="bar-title">Editar Password</h3>
            </div>
            <p> É politica da Garden Corporation, um cliente alterar senha pelo menos uma vez durante um ano </p>
            <form  name="form" method="post" action="obrigapw.php">
                <!--a página vai executar escondida, fazer o procedimento e retornar o Alert que embora o iframe esteja invisível o Alert vai aparecer, eassim a página nao precisa de carregar duas vezes para fazer o fazer --> 
               <!-- <iframe name='iframe' style='display:none;'></iframe> -->
               
                 <p>
                    <label id="nome" for="nome">Nome:</label>
                    <input type="text" name="nome" value="<?php echo $nome; ?>" id="nome" required placeholder="Insira o seu nome">
                </p>

                
                <p>
                    <label id="password" for="password">Senha atual:</label>
                    <input type="password" name="passantiga" id="password" onkeyup="showpw(this.value)" required placeholder="Insira a senha atual">
               <div id="pww" style="margin-left: 20%; color:RED;"></div>
                   
                </p>
                <p>
                    <label id="password" for="password">Nova senha:</label>
                    <input type="password" name="password1" id="password" pattern=".{6,16}"  onkeyup="pwigual(this.value)"  required title="insira pelo menos 6 digitios" required placeholder="Insira a senha">
                <div id="pwigual" style="margin-left: 20%; color:RED;"></div>
                </p>

                <p>
                    <label id="password" for="password">Nova senha:</label>
                    <input type="password" name="passnova" id="password1" pattern=".{6,16}"   required title="insira pelo menos 6 digitios" required placeholder="Insira a senha">
                </p>
                <br>
                <br>
                <br>
                <br>
                <div id="botoes">
                    <p>
                        <input type="hidden" value="enviado" name="acao">

                        <button id="button-registar" type="Submit" onclick="return editar_cliente2()" >Confirmar</button>
                       

                    </p>
                </div>

            </form>
        </div>
   <?php
        if (isset($_POST['acao'])) {
        $passantiga = $_POST['passantiga'];
        $password1 = $_POST['password1'];
        $passnova = $_POST['passnova'];


        $query2 = "SELECT * FROM utilizador WHERE login_Uti='$login'";
        $sql2 = mysql_query($query2);
        $num = mysql_num_rows($sql2);
        $linha2 = mysql_fetch_array($sql2);
        $password = $linha2['password'];
if( $passantiga== $passnova){
     echo "<script>alert('Tem de modificar a senha, essa era utilizada anteriormente')</script>";
}else{
        
        if ($passantiga == $password) {
            if ($passnova == $password1) {
            $query_p= "UPDATE `gardencorporation`.`utilizador` SET `password` = '$passnova' WHERE `utilizador`.`login_Uti` = '$login';";        
            $sqlp=  mysql_query($query_p);
             $data = date('Y-m-d G:i:s', strtotime("+ 1 year"));
            
            $query_update = "UPDATE `gardencorporation`.`data_password` SET `data` = '$data' WHERE `data_password`.`login_Uti` = '$login';";
            $sql_update = mysql_query($query_update);
            //query para alterar a data
             echo "<script>alert('Password alterada com sucesso')</script>";
           echo "<script>window.open('MainPageCli.php')</script>";
                   echo "<script>window.close()</script>";
               
            } else {
                echo "<script>alert('Os campos Nova Senha não coincidem, por favor introduza novamente todos os dados que pretende alterar!')</script>";
                echo "<script>window.history.go(-1);</script>";
            }
        } else {
            echo "<script>alert('O campo Senha Atual não corresponde à senha atual, por favor introduza novamente todos os dados que pretende alterar!')</script>";
            echo "<script>window.history.go(-1);</script>";
        }
        }       
        
        }

     
        include_once 'footer.php';
    

}
        }else{
      echo "<script>alert('Restrito')</script>";
            echo "<script>window.history.go(-1);</script>";
    
}

        ?>

    </body>
</html>
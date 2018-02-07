<?php
// Iniciamos nossa sessão que vai indicar o usuário pela session_id

include_once 'Funcoes_bd.php';
ligar_base_dados();
include_once 'headerCli.php';

$query="select * from estatistica ";
$sql = mysql_query($query);
while($linha=mysql_fetch_array($sql)){
    $bonus = $linha['numero_bonus'];
    $devolucao = $linha['numero_dias'];
    
    
}
?>
<html>  
    <head>
     
<title>Insert title here</title>
 <?php
                 $query_css="select * from css where login_Uti='$login'";
                 $sql_css = mysql_query($query_css);
                 if(mysql_num_rows($sql_css)>0){
                     $css=  mysql_fetch_array($sql_css);
                     $mainPage=$css['Rproduto'];
                 
                     ?><link rel="stylesheet" type="text/css" href="<?php echo $mainPage; ?>" /><?php
                 }else{
                 $css_insert ="INSERT INTO `gardencorporation`.`css` (`mainPage`, `Rproduto`, `Ines`, `login_Uti`) VALUES ('css_original/MainPage.css', 'css_original/Rproduto.css', 'css_original/Ines.css', '$login');";
               $sql_insert=  mysql_query($css_insert);
?>
            <link rel="stylesheet" type="text/css" href="css_original/mainPage.css" />   
           <?php             
                 }
                 
            
            ?>
<script type="text/javascript" src="RegistoProduto.js"></script>
   
    </head>
    <body>
        <div id="mainbody">
        <div id="novosprodutosbar">
        <h3 class="bar-title">Ajuda Sobre Garden Corporation</h3>
        </div>
        <div id="abaixo_pag">
            <div>
            ´<div id="Perguntas" >
                <ol>
                    <li><a style="color:red"  onclick="document.getElementById('divTeste').innerHTML = 'Na Garden Coorporation voce tem a oportunidadade de poder devolver os prudutos, \n\
                        actualmente o prazo de dias  é <?php echo $devolucao ?> dias depois de efectuar a compra.'  "  > Quantos dias de devoluçao?</a><br/></li>
                    <li><a  style="color:red" onclick="document.getElementById('divTeste').innerHTML = 'Na Garden Coorporation voce tem a oportunidadade receber na ficha de cliente, \n\
                       um bonus de <?php echo $bonus ?> % em cada compra, podendo depois serem reutilizados numa futura compra .'  ">Quantidade de bonus em pecentagem dado numa compra?</a><br/></li>
                    <li><a  style="color:red" onclick="document.getElementById('divTeste').innerHTML = 'Na Garden Coorporation voce tem a oportunidadade de armazenar produtos \n\
                         na whishList, esses produtos serao todos os produtos que nao tem stock atualmente na empresa, uma vez que passem a disponivel recebera um e-mail a avisar do mesmo.'" >Como funciona a whishList?</a><br/></li>
                     <li><a style="color:red"  onclick="document.getElementById('divTeste').innerHTML = 'Na Garden Coorporation voce tem a oportunidadade de poder cancelar uma compra \n\
                       embora isso so seja possivel enquanto a compra estiver no estado Aguarda Pagamento. '  "  >Como funciona o cancelamento de compras?</a><br/></li>
                      <li><a style="color:red"  onclick="document.getElementById('divTeste').innerHTML = 'Na Garden Coorporation voce tem a oportunidadade de poder pagar uma compra \n\
                       com cheque oferta,multibanco , bonus do cliente, e futuramente PayPal. '  "  >Metodos de pagamento existentes na GardenCorporation?</a><br/></li>
                    
                </ol>
                
            

        </div>
            <br>
            <br>
        </div>
        <div id="divTeste"> </div>
        </div>
            </div>
        <br><br><br>
        <?php 
include 'footer.php';
include 'footersimple.php';
        ?>
       
    
        
        
</body>
</html>
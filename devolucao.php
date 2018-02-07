<?php
include_once 'Funcoes_bd.php';
include_once 'mysql.connect.php';
ligar_base_dados();
include_once 'headerCli.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Escolha de Pagamento</title>
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
        <meta charset="UTF-8">
    </head>

    <body>
         <div id="mainbodymp">
             
             <div id="novosprodutosbar">
                 <h3 class="bar-title" style="padding:0.5%;">Historico de Vendas</h3>
               </div>
             
           
            <div id="abaixo_pag">
                <?php
                $query1 = "SELECT * from estatistica";
                $sql = mysql_query($query1);
                $dado = mysql_fetch_array($sql);
                $dias_devolucao = $dado['numero_dias'];
                ?>

                <div>
                    <p><p style="color:red;text-align: center">AVISO:</p>O prazo de devoluçao de uma compra , na empresa Garden Corporation , de momento é de <?php echo ": $dias_devolucao" ?> dias de devoluçao.
                    Em baixo encontram-se ja todas as compras possiveis de devolver, ou seja, dentro desse prazo. </p>
                </div>

                <div id="scroll_tabela_pagamento2">
                    
                    <?php
                    $sql2 = "SELECT * FROM compra WHERE estado='Expedida' AND login_Uti='$login' AND numero_compra not in (SELECT numero_compra from devolucoes) ";
                        $query = mysql_query($sql2);
                        $row = mysql_num_rows($query);
                        if ($row > 0) {
                           
                         ?>
                    <table id="table_editar_produto_compra">
                        <caption></caption>
                        <th> Numero Compra </th>
                        <th> Login Cliente </th>
                        <th> Data</th>
                        <th>Tipo pagamento</th>
                        <th> Total compra </th>
                        <th> Estado </th>
                        <th> Devolver</th>
                        <th> Detalhes compra </th>


                        <?php
                        //query vai selecionar todos os produtos que estao espedidos de um determinado cleinte e que nao perteçam a devolucoes
                        $sql2 = "SELECT * FROM compra WHERE estado='Expedida' AND login_Uti='$login' AND numero_compra not in (SELECT numero_compra from devolucoes) ";
                        $query = mysql_query($sql2);
                        $row = mysql_num_rows($query);
                        if ($row > 0) {
                            while ($linha = mysql_fetch_array($query)) {
                                $numero = $linha ['numero_compra'];
                                $nome = $linha['login_Uti'];
                                $pagamento = $linha['tipo_pagamento'];
                                $estado = $linha['estado'];
                                $data_mysql = $linha ['data'];
                                $total = $linha['total_compra'];
                                
                                
                                  $query55 ="select * from pagamento where tipo_pagamento='$pagamento'";
                            $sql55 = mysql_query($query55);
                            while($paga = mysql_fetch_array($sql55)){
                            $nome1 = $paga['descricao'];
                          
                            }


                                $data_atual = date("Y/d/m"); //data_atual
                                $menos5atual = date('Y/d/m', strtotime("+ $dias_devolucao days", strtotime($data_mysql)));

                                
                                //se a data que pode ser devolvido for maior que a data atual e sinal que pode ser devolvido
                                if ($data_atual < $menos5atual) {
                                
                                    
                                    ?>
                                      
                        <tr>
                             
                            <td><?php echo $numero; ?></td>
                                        <td><?php echo $nome; ?></td>
                                        <td><?php echo $data_mysql; ?></td>
                                        <td><?php echo $nome1; ?> </td>
                                        <td><?php echo $total; ?> </td>
                                        <td><?php echo $estado; ?> </td>
                                        <td><a style="color:blue;font-weight: bold;" href="insere_devolucao.php?id='<?php echo $numero?>'" >Devolver</a>
                                       <td><a href="InformacoesCompra.php?id=<?php echo $numero ?> "  style="color:green" >Detalhes</a></td>
                                    </tr>

                                    <?php
                                }
                            }
                        }
                        
                                }
                      
                        
                        
                                    
                        
                        ?>
                    </table>
                    <br>
                    <br>
                    <br>




                </div>
            </div>
        </div>
            
                <?php 
            include 'footer.php';
            include 'footersimple.php';

            ?>
            
    </body>
</html>


<!DOCTYPE HTML>
<html>

        <?php
        include_once 'mysql.connect.php';
        include_once 'Funcoes_bd.php';
        ligar_base_dados();
        include 'headerAdmin.php';
        ?>
    
 <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
    function avacar() {
        decisao = confirm("Deseja avançar? O comentário pode necessitar de resposta.");
        if (decisao){
            return true;
        } else {
            return false;
        }
    }   
</SCRIPT>
    
    
    <head>
        <title>Aprovaçao Comentário</title>
        <link rel="stylesheet" type="text/css" href="Ines.css"/>
        <script type="text/javascript" src="RegistoProduto.js"></script> 
        <meta charset="UTF-8">
        
    </head>
    
    <body>


        <div >
            <div id="mainbodymp">

                <div id="novosprodutosbar">
                    <h3 class="bar-title" style="padding: 0.5%;">Aprovar Comentários</h3>
                </div>
                
                <div id="scroll_tabela_pagamento" style="width: 65%;margin-left: 7%;">
        <?php
                        $sql = "SELECT * FROM comentarios where estado_comm ='Aguarda Aprovacao'";
                        $query = mysql_query($sql);
                        $row = mysql_num_rows($query);
                        if ($row > 0) {
                            
                                
                             
                                ?>
                    
                    <table id="table_editar_produto_compra">
                        <caption></caption>
                        <th> Num Comentario </th>
                        <th> Nome </th>
                        <th> Email </th>
                        <th> Comentário</th>
                        <th>Estado</th>
                        <th>Aprovação</th>
                        <th>Resposta </th>

                        <?php
                        $sql = "SELECT * FROM comentarios where estado_comm ='Aguarda Aprovacao'";
                        $query = mysql_query($sql);
                        $row = mysql_num_rows($query);
                        if ($row > 0) {
                            while ($linha = mysql_fetch_array($query)) {
                                $num_comm = $linha ['num_comm'];
                                $nome = $linha ['name'];
                                $comentario = $linha['texto'];
                                $emailcomm = $linha['email_comm'];
                                $estado = $linha['estado_comm'];
                                $resposta1 = $linha['resposta_comm'];
                                
                             
                                ?>

                                <tr>
                                    <td><?php echo $num_comm; ?></td>
                                    <td><?php echo $nome; ?></td>
                                    <td><?php echo $emailcomm; ?></td>
                                    <td><?php echo $comentario; ?></td>
                                    <td><?php echo $estado; ?> </td>
                                    <?php if ($emailcomm != '' && $resposta1 == ''){ ?>
                                        <td><a onclick="return avacar()" style="color:red" href="aprova_comment1.php?id=<?php echo $num_comm ?>">Aprovar</a> / 
                                            <a onclick="return avacar()" style="color:red" href="rejeita_comment.php?id=<?php echo $num_comm ?>">Rejeitar</a> </td>
                                    <?php } else {?>
                                    <td><a style="color:red" href="aprova_comment1.php?id=<?php echo $num_comm ?>">Aprovar</a> / 
                                    <a style="color:red" href="rejeita_comment.php?id=<?php echo $num_comm ?>">Rejeitar</a> </td> <?php }?>
                                    <?php if ($emailcomm != '' && $resposta1 == ''){ ?>
                                        <th><a style="color:blue" href="responder_comment.php?id=<?php echo $num_comm ?>" onclick="window.open(this.href,'Resposta','width=680,height=470'); return false;" title="Resposta ao Cliente" id="" >Responder</a> </td>
                                    <?php } elseif($resposta1 != '' && $emailcomm != '') {?> <th>Respondido</th>
                                    <?php} else {} ?>
                                </tr>

                            <?php
                        }}}
                            }else{
                            ?> 
                                <p style="margin-left: 15%;">Nao existem comentarios a ser aprovados</p>
                            <?php 
                        }
                        ?>
                    </table>
                </div>
            </div>
                
            </div>      
    </body>
    <?php 
include 'footersimple.php';
?>
</html>


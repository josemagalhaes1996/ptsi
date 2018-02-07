<?php 
include 'libchart/libchart/libchart.php';
include_once 'Funcoes_bd.php';
ligar_base_dados();
$chart = new VerticalBarChart(500, 250);

	$dataSet = new XYDataSet();
        
                        $sql = "SELECT SUM(quantidade) AS quantidade, numero_produto FROM linha_compra GROUP BY numero_produto order by quantidade desc limit 5";
                        $query = mysql_query($sql);
                        $row = mysql_num_rows($query);
                        if ($row > 0) {
                            while ($linha = mysql_fetch_array($query)) {
                                $numero = $linha ['quantidade'];
                                $nome = $linha['numero_produto'];
                             $query4="SELECT * FROM produto where numero_produto='$nome'";
                             $sql4 = mysql_query($query4);
                             if(mysql_num_rows($sql4) > 0){
                                 $dadoCli=  mysql_fetch_array($sql4);
                                 $nome_c = $dadoCli['nome_produto'];
                                 $preco = $dadoCli['preco'];
                           
                                 
                                 
                             
                                 
                                 $dataSet->addPoint(new Point($nome_c, $numero));
                             }
                            }
                        }
        
        
        $chart->setDataSet($dataSet);
        $chart->setTitle("Produtos mais Vendidos na Garden Corporation");
	$chart->render("teste1.png");

?>

<html>
    <body>
        <img src="teste1.png" style="border:2px solid gray; margin-top:22%;margin-left: 36%;">    
        
        
       
    </body>
    
    
</h
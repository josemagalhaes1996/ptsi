<?php 
include 'libchart/libchart/libchart.php';

$chart = new VerticalBarChart(500, 250);

	$dataSet = new XYDataSet();
         $sql = "SELECT SUM(total_compra) AS total_compra, login_Uti FROM compra GROUP BY login_Uti order by total_compra desc limit 5 ";
                        $query = mysql_query($sql);
                        $row = mysql_num_rows($query);
                        if ($row > 0) {
                            while ($linha = mysql_fetch_array($query)) {
                                $numero = $linha ['total_compra'];
                                $nome = $linha['login_Uti'];
                             $query4="SELECT * FROM cliente where login_Uti='$nome'";
                             $sql4 = mysql_query($query4);
                             if(mysql_num_rows($sql4) > 0){
                                 $dadoCli=  mysql_fetch_array($sql4);
                                 $nome_c = $dadoCli['nome_cliente'];
                                 $morada = $dadoCli['morada'];
                                 $telefone = $dadoCli['telefone'];
                             
                                 
                                 $dataSet->addPoint(new Point($nome_c, $numero));
                             }
                            }
                        }
        
        
        $chart->setDataSet($dataSet);
        $chart->setTitle("Melhores Clientes Garden Corporation ");
	$chart->render("teste.png");

?>

<html>
    <body>
        <img src="teste.png" style="border:2px solid gray; margin-top:22%;margin-left: 36%;">    
        
        
       
    </body>
    
    
</html>
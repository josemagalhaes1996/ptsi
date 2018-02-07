  <!DOCTYPE html>
 <html>
	
	<head> 
		<title> Garden Corporation </title>
 <?php
                 $query_css="select * from css where login_Uti='$login'";
                 $sql_css = mysql_query($query_css);
                 if(mysql_num_rows($sql_css)>0){
                     $css=  mysql_fetch_array($sql_css);
                     $mainPage=$css['mainPage'];
                 
                     ?><link rel="stylesheet" type="text/css" href="<?php echo $mainPage; ?>" /><?php
                 }else{
                 $css_insert ="INSERT INTO `gardencorporation`.`css` (`mainPage`, `Rproduto`, `Ines`, `login_Uti`) VALUES ('css_original/MainPage.css', 'css_original/Rproduto.css', 'css_original/Ines.css', '$login');";
               $sql_insert=  mysql_query($css_insert);
?>
            <link rel="stylesheet" type="text/css" href="css_original/mainPage.css" />   
           <?php             
}
                 
            
            ?>
                <meta charset="UTF-8"/>
                <link rel="shortcut icon" href="gardenlogo.png" type="image/x-icon"/>

	</head>

	<body>
            <header>
            <div id="boxhead" class="header">
                <div class="topbarhead">
                    <div id="level2">
                        <ul> <li> Bem Vindo Senhor/a | <a href="sair.php">Logout</a></li></ul>
                    </div>
                    <div id="level1">
                        <ul> <li> <P> BEM-VINDO À NOSSA LOJA ONLINE! </p> </li> <li></ul>        
                    </div>
                </div>
                
                <div id="logo">
                    <img src="gardenlogo6.png" alt="gardenlogo">
                </div>                  
           
            </div>

            </header>
	</body>
	
</html> 

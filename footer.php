<!DOCTYPE html>
 <html>
	
	<head> 
		<title> Footer </title>
                <?php
if (isset($_COOKIE["css"])) {
                ?>  <link rel="stylesheet" type="text/css" href="<?php echo $_COOKIE["css"]; ?>" />
                <?php
            } else {
                //css original
                $name = "css";
                $value = "css_original/MainPage.css";
                $time = time() + (3 * 24 * 3600);
                setcookie($name, $value, $time, "/");

                //agora criar uma cookie para o Rproduto.css
                $name = "cssP";
                $value = "css_original/Rproduto.css";
                $time = time() + (3 * 24 * 3600);
                setcookie($name, $value, $time, "/");

                //agora criar cookie para Ines.css
                $name = "cssI";
                $value = "css_original/Ines.css";
                $time = time() + (3 * 24 * 3600);
                setcookie($name, $value, $time, "/");
                ?>
                <link rel="stylesheet" type="text/css" href="css_original/mainPage.css" />
                <?php
            }
            ?>


                <meta charset="UTF-8"/>
	</head>

	<body>
            <footer>
            <div id="foo" class="footer">
                <div  class="foot">
                    <div id="fb-root"> 
                        <script>(function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s); js.id = id;
                        js.src = "//connect.facebook.net/pt_PT/sdk.js#xfbml=1&version=v2.5&appId=820784838048321";
                        fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));</script>
                        <div class="fb-page" data-href="https://www.facebook.com/GardenCorporation-939437992758261/?skip_nax_wizard=true" data-tabs="timeline" data-width="260" data-height="200" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>
                    </div>
                    <div id='footnonfb'>
                    <div id="footer2">
                        <ul> 
                            <li></li>
                            <li> <h3 style="color: yellowgreen"> Contactos </h3> </li>
                            <li> <p> Morada em php <p> </li>
                            <li> <p> Telefone em php<p> </li>
                            <li> <p> Mail php <p> </li>
                        </ul>    
                    </div>
                    <div id="footer2">
                        <ul> 
                            <li></li>
                            <li> <h3 style="color: yellowgreen"> Minha Conta </h3> </li>
                            <?php if(isset($login)) { ?>
                            <li> <a href="PerfilCliente.php"> Meu Perfil </a> </li>
                            <?php }else{ ?>
                            <li> <a href="login.php"> Log In </a> </li>
                            <?php } ?>
                            <?php if(isset($login)) { ?>
                            <li> <a href="carrinho.php"> Carrinho </a> </li>
                            <li> <a href="wishList.php"> Whislist </a> </li> 
                            <?php }else{ ?>                          
                            <li> <a href="login.php"> Carrinho </a> </li>
                            <li> <a href="login.php"> Wishlist </a> </li>
                            <?php } ?>
                            
                        </ul>    
                    </div>                    
                    <div id="footer1">
                        <ul> 
                            <li> <h3 style="color: yellowgreen"> Informação </h3> </li>
                            <li> <p> Sobre nós <p> </li>
                            <li> <p> Localização <p> </li>
                            <li> <a href="Ajuda.php"> Ajuda </a> </li>
                        </ul>        
                    </div>
                </div>
                </div>
            </div>
                
            </footer>
	</body>
	
</html> 
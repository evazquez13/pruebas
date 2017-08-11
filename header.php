<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>
  <!DOCTYPE html>
<html class="no-js">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">  
  <link rel="shortcut icon" href="http://ec2-52-213-166-151.eu-west-1.compute.amazonaws.com/wp-content/uploads/2017/03/favicon.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/css/custom.css">
  <link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/css/menu.css">
</head>
  <?php wp_head(); ?>
  <?php 
  global $wpdb;
  global $post;
  $translations = pll_the_languages( array( 'raw' => url ) );
  $idioma = pll_current_language( 'slug' ); 
echo '<script languaje="JavaScript">
            
      var varjs="'.$idioma.'";      
</script>';
  $slug = get_permalink();
  $email = 'Test@test.com';
  $nombre = $post->post_name;
  ?>
<body>
<header>
  <div class="fonfoAzul hidden-xs">    
    <div class="container cabecera">
      <div class="row hidden-xs">
        <div class="col-md-3 col-sm-3">
          <div class="logo-container">
            <a href="http://ec2-52-50-46-136.eu-west-1.compute.amazonaws.com/es/index/" class="logo-cabecera"><img src="http://ec2-52-50-46-136.eu-west-1.compute.amazonaws.com/wp-content/uploads/2017/03/group-2.png" class="img-responsive hidden-xs"></a>
          </div>
        </div>
        <div class="col-md-6 col-sm-4 accionistahead">
        	<?php if ($idioma== 'en') { ?>
            <p class="hidden-xs hidden-sm"><span class="bordehead"></span>Financial Information</p>
            <p class="visible-sm" style="font-size: 17px;">Financial Information</p>
            <?php } ?>
            <?php if ($idioma== 'es') { ?>
            <p class="hidden-xs hidden-sm"><span class="bordehead"></span>Información Financiera</p>
            <p class="visible-sm" style="font-size: 17px;">Información Financiera</p>
            <?php } ?>
        </div>
        
        <div class="col-md-3 col-sm-5">
	        <ul class="lista-idioma">
	        	<li class="lang-item lang-item-2 lang-item-es lang-item-first">
	        		<a lang="en-US" hreflang="en-US" href="<?php echo $translations['en']['url']; ?>"><h1 class="menuEnEs <?php if ($idioma== 'en') { echo 'activado';} ?>">EN</h1></a>
	          	</li>
    				<li class="lang-item lang-item-5 lang-item-en">
    					<a lang="es-MX" hreflang="es-MX" href="<?php echo $translations['es']['url']; ?>"><h1 class="menuEnEs <?php if ($idioma== 'es') { echo 'activado';} ?>">ES</h1></a>
    				</li>
            <li>
            <a onclick="agregaFav();">
            <i id="fav" style="color: red;"></i>
            </a>
            </li>
			</ul>
        </div>
        
      </div>
    </div>
  </div>
  </header>  
<?php if ($idioma== 'es') { ?>
<div class="fonfoAzul visible-lg visible-md visible-sm">
     <div class="container">
        <div class="row">
            <div class="menu-container">
              <div class="menu">
                <ul>
                  <li class="desktop <?php if (is_page('Index')) { echo 'desktopSelect'; } ?>"><a href="http://ec2-52-50-46-136.eu-west-1.compute.amazonaws.com/es/index/">Inicio</a></li>
                  <li class="desktop <?php if (is_page('Conócenos')) { echo 'desktopSelect'; } ?>"><a href="http://ec2-52-50-46-136.eu-west-1.compute.amazonaws.com/es/conocenos/">Conócenos</a></li>     
                  <li class="desktop <?php if (is_page('Inf_Financiera')) { echo 'desktopSelect'; } ?>"><a href="http://ec2-52-50-46-136.eu-west-1.compute.amazonaws.com/es/inf_financiera/">Información Financiera</a></li>
                  <li class="desktop <?php if (is_page('Renta_fija')) { echo 'desktopSelect'; } ?>"><a href="http://ec2-52-50-46-136.eu-west-1.compute.amazonaws.com/es/renta_fija/">Renta Fija</a></li>
                  <li class="desktop <?php if (is_page('Gobierno_Corporativo')) { echo 'desktopSelect'; } ?>"><a href="http://ec2-52-50-46-136.eu-west-1.compute.amazonaws.com/es/gobierno_corporativo/">Gobierno Corporativo</a></li>
                  <li class="desktop <?php if (is_page('Contacto')) { echo 'desktopSelect'; } ?>"><a href="http://ec2-52-50-46-136.eu-west-1.compute.amazonaws.com/es/contacto/">Contacto</a></li>
                </ul>
            </div>
        </div>
      </div>
    </div>
</div>
  <div class="fonfoAzul hidden-lg hidden-md hidden-sm">
      <div class="container">
        <div class="row">
            <div class="menu-container">
              <div class="menu">
                <ul>
<!-- Saque clase menumobile -->
                    <li><a href="http://ec2-52-50-46-136.eu-west-1.compute.amazonaws.com/es/index/">Inicio</a></li>
                  <li><a href="#">Conócenos</a>
                         <ul>
                            <li><a href="#">Misión</a></li>
                            <li><a href="#">Historia</a>
                                <ul></ul>
                            </li>
                            <li><a href="#">BBVA en Resumen</a>
                                <ul></ul>
                            </li>
                            <li><a href="#">Modelo de Negocio</a>
                                <ul></ul>
                            </li>
                            <li><a href="#">Estructura Directiva</a>
                                <ul></ul>
                            </li>
                            <li><a href="#">Negocio Responsable</a>
                                <ul></ul>
                            </li>
                            <li><a href="#">Grupo BBVA</a>
                                <ul></ul>
                            </li>
                        </ul> 
                    </li>     
                    <li><a href="http://ec2-52-50-46-136.eu-west-1.compute.amazonaws.com/es/inf_financiera/">Información Financiera</a>
                        <ul></ul>  
                    </li>
                    <li><a href="#">Renta Fija</a>
                        <ul>
                            <li><a href="#">Calificaciones</a>
                                <ul></ul>
                            </li>
                            <li><a href="#">Factsheet</a>
                                <ul></ul>
                            </li>
                            <li><a href="#">Emisiones</a>
                                <ul></ul>
                            </li>
                        </ul> 
                    </li>
                    <li><a href="#">Gobierno Corporativo</a>
                        <ul>
                            <li><a href="#">Consejo de Administración</a>
                                <ul></ul>
                            </li>
                            <li><a href="#">Asamblea de Accionistas</a>
                                <ul></ul>
                            </li>
                            <li><a href="#">Estatutos Sociales y Convenio Único</a>
                                <ul></ul>
                            </li>
                            <li><a href="#">Código de Conducta</a>
                                <ul></ul>
                            </li>
                            <li><a href="#">Código de Mejores Prácticas Corporativas</a>
                                <ul></ul>
                            </li>
                        </ul>       
                    </li>
                    <li><a href="http://ec2-52-50-46-136.eu-west-1.compute.amazonaws.com/es/contacto/">Contacto</a></li>
<!--  -->
                    <li>
                      <div class="row">
                        <div class="col-sm-12 col-xs-11">
                          <ul class="lista-idioma">
                            <li class="lang-item lang-item-2 lang-item-es lang-item-first">
                              <a lang="en-US" hreflang="en-US" href="<?php echo $translations['en']['url']; ?>"><p class="menuEnEs <?php if ($idioma== 'en') { echo 'activado';} ?>">EN</p></a>
                            </li>
                            <li class="lang-item lang-item-5 lang-item-en">
                              <a lang="es-MX" hreflang="es-MX" href="<?php echo $translations['es']['url']; ?>"><p class="menuEnEs <?php if ($idioma == 'es') { echo 'activado';} ?>">ES</p></a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </li>
                    <!--  -->
                </ul>
            </div>
        </div>
      </div>
    </div>
  </div>
 
<?php 
if (is_page("Conócenos")) { ?>
 <div class="fondoClaro visible-lg visible-md visible-sm">
     <div class="container">
         <div class="row">
             <div class="menu-claro">
                 <ul>
                     <li><a href="#">Misión</a></li>
                        <li><a href="#">Historia</a></li>
                        <li><a href="#">BBVA en Resumen</a></li>
                        <li><a href="#">Modelo de Negocio</a>
                        </li>
                        <li><a href="#">Estructura Directiva</a>
                        </li>
                        <li><a href="#">Negocio Responsable</a>
                        </li>
                        <li><a href="#">Grupo BBVA</a>
                        </li>
                 </ul>
             </div>
         </div>
     </div>
 </div>

<?php } ?>
<?php if (is_page("Renta_fija")) { ?>
 <div class="fondoClaro visible-lg visible-md visible-sm">
     <div class="container">
         <div class="row">
             <div class="menu-claro">
                <ul>
                    <li><a href="#">Calificaciones</a> </li>
                    <li><a href="#">Factsheet</a></li>
                    <li><a href="#">Emisiones</a></li>
                </ul>  
             </div>
         </div>
     </div>
 </div>

<?php 
  } 
if (is_page("Gobierno_Corporativo")) { ?>
 <div class="fondoClaro visible-lg visible-md visible-sm">
     <div class="container">
         <div class="row">
             <div class="menu-claro">
                <ul>
                    <li><a href="#">Consejo de Administración</a></li>
                    <li><a href="#">Asamblea de Accionistas</a></li>
                    <li><a href="#">Estatutos Sociales y Convenio Único</a></li>
                    <li><a href="#">Código de Conducta</a></li>
                    <li><a href="#">Código de Mejores Prácticas Corporativas</a></li>
                </ul>
             </div>
         </div>
     </div>
 </div>
<?php } ?>
<?php } ?>

<!-- Inicia el menu en ingles-->
<?php if ($idioma== 'en') { ?>
<div class="fonfoAzul visible-lg visible-md visible-sm">
     <div class="container">
        <div class="row">
            <div class="menu-container">
              <div class="menu">
                <ul>
                  <li class="desktop <?php if (is_page('Index-en')) { echo 'desktopSelect'; } ?>"><a href="http://ec2-52-50-46-136.eu-west-1.compute.amazonaws.com/en/index-en/">Home</a></li>
                  <li class="desktop <?php if (is_page('Conócenos-en')) { echo 'desktopSelect'; } ?>"><a href="http://ec2-52-50-46-136.eu-west-1.compute.amazonaws.com/en/conocenos-en/">About Us</a></li>
                  <li class="desktop <?php if (is_page('Inf_Financiera-en')) { echo 'desktopSelect'; } ?>"><a href="http://ec2-52-50-46-136.eu-west-1.compute.amazonaws.com/en/inf_financiera-2/">Financial Information</a></li>
                  <li class="desktop <?php if (is_page('Renta_fija-en')) { echo 'desktopSelect'; } ?>"><a href="http://ec2-52-50-46-136.eu-west-1.compute.amazonaws.com/en/renta_fija-en/">Setteled Rent</a></li>
                  <li class="desktop <?php if (is_page('Gobierno_Corporativo-en')) { echo 'desktopSelect'; } ?>"><a href="http://ec2-52-50-46-136.eu-west-1.compute.amazonaws.com/en/gobierno_corporativo-en/">Corporative Goverment </a></li>
                  <li class="desktop <?php if (is_page('Contacto-en')) { echo 'desktopSelect'; } ?>"><a href="http://ec2-52-50-46-136.eu-west-1.compute.amazonaws.com/en/contacto-en/">Contact Us</a></li>
                </ul>
            </div>
        </div>
      </div>
    </div>
</div>
  <div class="fonfoAzul hidden-lg hidden-md hidden-sm">
      <div class="container">
        <div class="row">
            <div class="menu-container">
              <div class="menu">
                <ul>
<!--                     <li>
                      <a href="#" class="menu-mobile"></a>
                    </li> -->
                    <li><a href="http://ec2-52-50-46-136.eu-west-1.compute.amazonaws.com/en/index-en/">Home</a></li>
                  <li><a href="#">About Us</a>
                         <ul>
                            <li><a href="#">Mission</a></li>
                            <li><a href="#">History</a>
                                <ul></ul>
                            </li>
                            <li><a href="#">BBVA in Resume</a>
                                <ul></ul>
                            </li>
                            <li><a href="#">Business Model</a>
                                <ul></ul>
                            </li>
                            <li><a href="#">Directive Structure</a>
                                <ul></ul>
                            </li>
                            <li><a href="#">Liable Business</a>
                                <ul></ul>
                            </li>
                            <li><a href="#">Group BBVA</a>
                                <ul></ul>
                            </li>
                        </ul> 
                    </li>
                    <li><a href="http://ec2-52-50-46-136.eu-west-1.compute.amazonaws.com/en/inf_financiera-2/">Financial Information</a></li>
                    <li><a href="#">Setteled Rent</a>
                        <ul>
                            <li><a href="#">Qualifications</a>
                                <ul></ul>
                            </li>
                            <li><a href="#">Factsheet</a>
                                <ul></ul>
                            </li>
                            <li><a href="#">Emissions</a>
                                <ul></ul>
                            </li>
                        </ul> 
                    </li>
                    <li><a href="#">Corporative Goverment</a>
                        <ul>
                            <li><a href="#">Board of Directors</a>
                                <ul></ul>
                            </li>
                            <li><a href="#">Investors Assembly</a>
                                <ul></ul>
                            </li>
                            <li><a href="#">Social Bylaw and Exclusive Agreement</a>
                                <ul></ul>
                            </li>
                            <li><a href="#">Behavior Code</a>
                                <ul></ul>
                            </li>
                            <li><a href="#">Code of Better Corporative Practices</a>
                                <ul></ul>
                            </li>
                        </ul>       
                    </li>
                    <li><a href="http://ec2-52-50-46-136.eu-west-1.compute.amazonaws.com/en/contacto-en/">Contact Us</a></li>
                    <!--  -->
                    <li>
                      <div class="row">
                        <div class="col-sm-12 col-xs-11">
                          <ul class="lista-idioma">
                            <li class="lang-item lang-item-2 lang-item-es lang-item-first">
                              <a lang="en-US" hreflang="en-US" href="<?php echo $translations['en']['url']; ?>"><p class="menuEnEs <?php if ($idioma== 'en') { echo 'activado';} ?>">EN</p></a>
                            </li>
                            <li class="lang-item lang-item-5 lang-item-en">
                              <a lang="es-MX" hreflang="es-MX" href="<?php echo $translations['es']['url']; ?>"><p class="menuEnEs <?php if ($idioma == 'es') { echo 'activado';} ?>">ES</p></a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </li>
                    <!--  -->
                </ul>
            </div>
        </div>
      </div>

<!--       <div class="row">
      	<div class="col-sm-12 col-xs-12">
      		<ul class="lista-idioma">
	        	<li class="lang-item lang-item-2 lang-item-es lang-item-first">
	        		<a lang="en-US" hreflang="en-US" href="<?php echo $translations['en']['url']; ?>"><h1 class="menuEnEs <?php if ($idioma == 'en') { echo 'activado';} ?>">EN</h1></a>
	          	</li>
				<li class="lang-item lang-item-5 lang-item-en">
					<a lang="es-MX" hreflang="es-MX" href="<?php echo $translations['es']['url']; ?>"><h1 class="menuEnEs <?php if ($idioma == 'es') { echo 'activado';} ?>">ES</h1></a>
				</li>
			</ul>
      	</div>
      </div> -->

    </div>
  </div>
 
<?php 
if (is_page("Conócenos-en")) { ?>
 <div class="fondoClaro visible-lg visible-md visible-sm">
     <div class="container">
         <div class="row">
             <div class="menu-claro">
                 <ul>
                     <li><a href="#">Mission</a></li>
                        <li><a href="#">History</a></li>
                        <li><a href="#">BBVA in Resume</a></li>
                        <li><a href="#">Business Model</a></li>
                        <li><a href="#">Directive Structure</a></li>
                        <li><a href="#">Liable Business</a></li>
                        <li><a href="#">Group BBVA</a></li>
                 </ul>
             </div>
         </div>
     </div>
 </div>

<?php 
  } 
if (is_page("Renta_fija-en")) { ?>
 <div class="fondoClaro visible-lg visible-md visible-sm">
     <div class="container">
         <div class="row">
             <div class="menu-claro">
                <ul>
                    <li><a href="#">Qualifications</a> </li>
                    <li><a href="#">Factsheet</a></li>
                    <li><a href="#">Emissions</a></li>
                </ul>  
             </div>
         </div>
     </div>
 </div>
<?php 
  } 
if (is_page("Gobierno_Corporativo-en")) { ?>
 <div class="fondoClaro visible-lg visible-md visible-sm">
     <div class="container">
         <div class="row">
             <div class="menu-claro">
                <ul>
                    <li><a href="#">Board of Directors</a></li>
                    <li><a href="#">Investors Assembly</a></li>
                    <li><a href="#">Social Bylaw and Exclusive Agreement</a></li>
                    <li><a href="#">Behavior Code</a></li>
                    <li><a href="#">Code of Better Corporative Practices</a></li>
                </ul>
             </div>
         </div>
     </div>
 </div>
<?php } ?>
<?php } ?>
<script type = "text/javascript">
function agregaFav() {
$.ajax( {
          type: 'POST',
          data: {
            page: "<?php echo $post->post_name; ?>",
            correoUser: "Test@test.com",
            perma: "<?php echo get_permalink(); ?>"
          },
          url: '/pruebas/wp-content/themes/pruebas/addFav.php',
          success: function(data){
            console.log(data);
            var x = document.getElementById('fav');

              if (data == 0) {
                  x.className = "fa fa-heart";
              } else {
                   x.className = "fa fa-file";
              }
          },
          error: function(xhr){
            console.log("error");
          }
        });
}
function validar(){
    $.ajax( {
          type: 'POST',
          data: {
            correoUser: "Test@test.com",
            perma: "<?php echo get_permalink(); ?>"
          },
          url: '/pruebas/wp-content/themes/pruebas/valid.php',
          success: function(data){
            var x = document.getElementById('fav');

              if (data == 0) {
                  x.className = "fa fa-heart";
              }else{
                   x.className = "fa fa-file";
              }
          },
          error: function(xhr){
            console.log("error");
          }
        });
  }


</script>⁠⁠⁠⁠
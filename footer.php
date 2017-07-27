<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>
<?php wp_footer(); ?>
 <?php $idioma = pll_current_language( 'slug' ); ?>
<!-- <div class="row separador"></div> -->
<!-- <div class="ayuda">
  <div class="container footer">
  <div class="row arealink">
    <div class="col-md-3 col-xs-6 borde">
      <h4>CENTRO DE AYUDA</h4>
      <ul>
        <li><a href="#">Ayuda Urgente</a></li>
        <li><a href="#">Aclaraciones</a></li>
        <li><a href="#">Consideraciones Técnicas</a></li>
        <li><a href="#">Consejos de Seguridad</a></li>
        <li><a href="#">Quejas y reclamos</a></li>
        <li><a href="#">Buró de Entidades Financieras</a></li>
      </ul>
    </div>
    <div class="col-md-3 col-xs-6 borde">
      <h4>INFORMACIÓN CORPORATIVA</h4>
      <ul>
        <li><a href="#">Empleo</a></li>
        <li><a href="#">Web Corporativa bbva.com</a></li>
        <li><a href="#">Acerca de Grupo BBVA Bancomer</a></li>
        <li><a href="#">Estudios Económicos</a></li>
        <li><a href="#">Información a Inversionistas</a></li>
        <li><a href="#">Emisiones Corporativas</a></li>
        <li><a href="#">Sala de Prensa</a></li>
        <li><a href="#">Negocio Responsable</a></li>
      </ul>
    </div>
    <div class="col-md-3 col-xs-6 borde">
      <h4>OTROS SITIOS BBVA</h4>
      <ul>
        <li><a href="#">Pensiones</a></li>
        <li><a href="#">Casa de Bolsa</a></li>
        <li><a href="#">Inmuebles</a></li>
        <li><a href="#">Noticias</a></li>
        <li><a href="#">Educación financiera</a></li>
        <li><a href="#">Fondos Bancomer</a></li>
        <li><a href="#">Centro de Innovación</a></li>
      </ul>
    </div>
    </div>
</div>
</div> -->
<?php if ($idioma== 'es') {?>
<div class="barraFooter">
	<div class="container">
    <div class="row separador">
      <div class="col-md-4 col-sm-12 col-sx-12">
      <img src="http://ec2-52-50-46-136.eu-west-1.compute.amazonaws.com/wp-content/uploads/2017/03/group-2.png"/>        
      </div>
      <div class="col-md-8 col-sm-12 accionista hidden-xs hidden-sm">
        <p>Información Financiera</p>
      </div>
    </div>
		<div class="row text-center">
			<div class="col-md-1 col-sm-12 col-xs-12">
				<p><a href="#">Seguridad</a></p>
			</div>
			<div class="col-md-2 col-sm-12 col-xs-12">
				<p><a href="#">Aviso Legal</a></p>
			</div>
			<div class="col-md-2 col-sm-12 col-xs-12">
				<p><a href="#">Mapa del Sitio</a></p>
			</div>
			<div class="col-md-2 col-sm-12 col-xs-12">
				<p><a href="#">Aviso de Privacidad</a></p>
			</div>
			<div class="col-md-3 col-sm-12 col-xs-12">
				<p><a href="#">Consulta los Costos y las Comisiones de nuestros productos</a></p>
			</div>
      <div class="col-md-2 col-sm-12 col-xs-12">
        <ul class="lista-redes">
          <li><a href="http://localhost:8888/pruebas/es/favoritos/" style="color: #FFF;">Fav</a></li>
          <li><a href="#"><div class="icon-redes-footer facebook"></div></a></li>
          <li><a href="#"><div class="icon-redes-footer twitter"></div></a></li>
          <li><a href="#"><div class="icon-redes-footer youtube"></div></a></li>
        </ul>
      </div>
      <div class="social">
          <p>BBVA Social Media</p>      
      </div>
		</div> 
	</div>
</div>
<?php } ?>
<?php if ($idioma == 'en') {?>
<div class="barraFooter">
  <div class="container">
    <div class="row separador">
      <div class="col-md-4 col-sm-12 col-sx-12">
      <img src="http://ec2-52-50-46-136.eu-west-1.compute.amazonaws.com/wp-content/uploads/2017/03/group-2.png"/>        
      </div>
      <div class="col-md-8 col-sm-12 accionista hidden-xs hidden-sm">
        <p>Financial Information</p>
      </div>
    </div>
    <div class="row text-center">
      <div class="col-md-1 col-sm-12 col-xs-12">
        <p><a href="#">Security</a></p>
      </div>
      <div class="col-md-2 col-sm-12 col-xs-12">
        <p><a href="#">Legal warning</a></p>
      </div>
      <div class="col-md-2 col-sm-12 col-xs-12">
        <p><a href="#">Site Map</a></p>
      </div>
      <div class="col-md-2 col-sm-12 col-xs-12">
        <p><a href="#">Notice of Privacy</a></p>
      </div>
      <div class="col-md-3 col-sm-12 col-xs-12">
        <p><a href="#">Consult the Costs and Commissions of our products</a></p>
      </div>
      <div class="col-md-2 col-sm-12 col-xs-12">
        <ul class="lista-redes">
          <li><a href="#"><div class="icon-redes-footer facebook"></div></a></li>
          <li><a href="#"><div class="icon-redes-footer twitter"></div></a></li>
          <li><a href="#"><div class="icon-redes-footer youtube"></div></a></li>
        </ul>
      </div>
      <div class="social">
          <p>BBVA Social Media</p>      
      </div>
    </div> 
  </div>
</div>
<?php } ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="<?php echo bloginfo('template_url'); ?>/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo bloginfo('template_url'); ?>/js/megamenu.js" type="text/javascript"></script>
<script src="<?php echo bloginfo('template_url'); ?>/js/script.js" type="text/javascript"></script>

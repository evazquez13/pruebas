<?php
/*
Template Name: templete-Contacto
*/
get_header(); 
?>

<?php 
	$contacto = get_field('contacto');
	$idioma = pll_current_language( 'slug' );
?>

<!--  -->
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
  	
	<?php
	$i == 0;
	if (get_field('banner')) {
		
	
		// check if the repeater field has rows of data
		if( have_rows('banner') ):
			// loop through the rows of data
			while ( have_rows('banner') ) : the_row();
			?>
    		<div class="hidden-xs item <?php if($i == 0) {echo 'active';} ?>" style="background-image: url('<?php the_sub_field('imag-1'); ?>');height: 480px;width: 100%;background-size: cover;">
  		<div class="container">
  			<div class="col-md-6 col-sm-6 col-xs-12" style="padding-top: 70px;">
		            <div class="banner-msn">
						<div class="row tt">
							<div class="col-md-10 col-sm-10 col-xs-10">
								<h3><?php the_sub_field('titulo-1'); ?></h3>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12 tt2">
								<p><?php the_sub_field('introduccion'); ?></p>
							</div>
						</div>
		    		</div>
		      </div>
  		</div>
  	</div>
	<div class="visible-xs">
  		<img class="img-responsive" src="<?php the_sub_field('imag-1'); ?>">
	  	<div class="container">
	  		<div class="row sec-index-mov">
				<div class="col-xs-12 text-center">
					<h2><?php the_sub_field('titulo-1'); ?></h2>
				</div>
			</div>
			<div class="row sec-index-mov">
				<div class="col-xs-12 text-center">
					<p><?php the_sub_field('introduccion'); ?></p>
				</div>
			</div>
	  	</div>
  	</div>
	<?php 
		$i ++;
		endwhile;
		endif;
	?>

 </div>
<?php if ($i!=1) { ?>
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>

  <!-- Indicators -->
  <ol class="carousel-indicators">
   	<?php for ($j=0; $j < $i ; $j++) { ?>

   			<li data-target="#carousel-example-generic" data-slide-to="<?php echo $j; ?>" <?php if ($j == 0) {echo " class='active' ";} ?> ></li> 

	<?php } ?>
  </ol>
<?php } } ?>

</div>

<?php 
if($contacto !=''){ 
	?>

<div class="space"></div>
<div>
	<div class="container">
		<div class="row">
			<div class="col-md-12 contactanos">
				<?php if ($idioma == 'es') {?>
				<h1>Contacto</h1>
				<?php } ?>
			<?php if ($idioma == 'en') {?>
				<h1>Contact Us</h1>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<div class="space"></div>
<div>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<?php
					// check if the repeater field has rows of data
					if( have_rows('contacto') ):
						// loop through the rows of data
						while ( have_rows('contacto') ) : the_row();			
				?>

					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="col-md-12 fondo">
							<div class="col-md-4 contacto text-center">	
								<img src= "<?php the_sub_field('img-contacto'); ?>" alt="">
							</div>
							<div class="col-md-8 credenciales">
								<div class="col-md-12">
									<h3><?php the_sub_field('nombre'); ?></h3>
								</div>
								<div class="col-md-12">
									<h4><?php the_sub_field('cargo'); ?></h4>
								</div>
								<div class="col-md-12">
									<p><?php the_sub_field('correo'); ?></p>
								</div>
								<div class="col-md-1 col-sm-1 col-xs-1 icon1">
									<img src="http://ec2-52-50-46-136.eu-west-1.compute.amazonaws.com/wp-content/uploads/2017/04/phone.png" alt="">
								</div>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<h5><?php the_sub_field('telefono'); ?></h5>
								</div>
							</div>
						</div>
					</div>
				<?php
					endwhile;
					endif;
				?>
			</div>
		</div>
	</div>
</div>

<?php } ?>

<?php if (get_field ('interes')) {?>
<div class="space"></div>
<div class="infoInteres">
	<div class="container">
	<div class="space2"></div>
		<div class="row">
			<div class="col-md-12 text-center">
				<?php if ($idioma == 'es') {?>
				<h1>Información de interés</h1>
				<?php } ?>
			<?php if ($idioma == 'en') {?>
				<h1>Information of interest</h1>
				<?php } ?>
			</div>
		</div>
		<div class="space"></div>
		<div class="row">
		<?php
			// check if the repeater field has rows of data
			if( have_rows('interes') ):
				// loop through the rows of data
				while ( have_rows('interes') ) : the_row();			
		?>
			<div class = "col-md-6 col-sm-6 col-xs-12 relleno2">
				<div class="col-md-12 col-sm-12 col-xs-12 borde" style="background:url('<?php the_sub_field('fondo'); ?>'); background-size: cover; height: 303px;">
				<img src="<?php the_sub_field('sobres'); ?>" alt="" class="img-responsive isobres">
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12 fondoBlanco borde">
					<div class="col-md-9">
						<div class="space"></div>
						<p><?php the_sub_field('titulo'); ?></p>
						<div class="space"></div>
						<a href="<?php the_sub_field('url'); ?>"><?php if ($idioma == 'es') {?>Leer Más <?php }if ($idioma == 'en') {?> Read more <?php } ?></a>
					</div>
				</div>
			</div>	
			<?php
						endwhile;
							endif;
					?>
		</div>
		<div class="space"></div>
	</div>
</div>
<?php } ?>

<?php
get_footer(); 
?>

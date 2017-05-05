<?php
/**
* A Simple Category Template
*/

get_header(); ?> 


<?php 
// Check if there are any posts to display
if ( have_posts() ) : ?>
<?php

// The Loop


    $query= null;
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args=array(
        'post_type' => 'preguntas_frecuentes',
        'post_status' => 'publish',
        'paged' => $paged,
        //'post_type_cat' => 'featured', // get_post_type() will return post_type, I add _cat -> post_type_cat
        //'orderby' => 'rand',
        'posts_per_page' => 1,
        'meta_query' => array(
            array(
                'key' => '_expiration_date',
                'value' => array(0, current_time('timestamp')),
                'compare' => 'BETWEEN'
                )),
            );

?>
<div class="container">	
	<div class="row">
    <div class="col-md-12 col-xs-12 text-center">
      <h1 Class="h1FAQs">Preguntas frecuentes: <?php single_cat_title(); ?></h1>
    </div>
  <div class="row">

<div class="col-md-12 form-group hidden-xs">
  <div class="col-md-4 btn-faq text-center">
    <a href="http://ec2-52-213-166-151.eu-west-1.compute.amazonaws.com/category/cirugiasegura-bancomer/">
      <div class="col-md-12 fondoFAQs<?php if (is_category('cirugiasegura-bancomer')) {echo ' active';} ?> ">
        <h3 class="h3FAQs">Cirugía Segura Bancomer</h3>
      </div>
    </a>
  </div>
  <div class="col-md-4 btn-faq text-center">
    <a href="http://ec2-52-213-166-151.eu-west-1.compute.amazonaws.com/category/salud-asegurada-bancomer/">
      <div class="col-md-12 fondoFAQs<?php if (is_category('salud-asegurada-bancomer')) {echo ' active';} ?> ">
        <h3 class="h3FAQs">Salud Asegurada Bancomer</h3>
      </div>
    </a>
  </div>
  <div class="col-md-4 btn-faq text-center">
    <a href="http://ec2-52-213-166-151.eu-west-1.compute.amazonaws.com/category/gastos-medicos-mayores-indemizatorio/">
      <div class="col-md-12 fondoFAQs<?php if (is_category('gastos-medicos-mayores-indemizatorio')) {echo ' active';} ?>">
        <h3 class="h3FAQs">Gastos Médicos Mayores Indemnizatorios</h3>
      </div>
    </a>
  </div>
  <div class="col-md-4 btn-faq text-center">
    <a href="http://ec2-52-213-166-151.eu-west-1.compute.amazonaws.com/category/gasto-medico-familiar-bancomer/">
      <div class="col-md-12 fondoFAQs<?php if (is_category('gasto-medico-familiar-bancomer')) {echo ' active';} ?> ">
        <h3 class="h3FAQs">Gasto Médico Familiar Bancomer</h3>
      </div>
    </a>
  </div>
  <div class="col-md-4 btn-faq text-center">
    <a href="http://ec2-52-213-166-151.eu-west-1.compute.amazonaws.com/category/gasto-medico-empresarial-bancomer/">
      <div class="col-md-12 fondoFAQs<?php if (is_category('gasto-medico-empresarial-bancomer')) {echo ' active';} ?> ">
        <h3 class="h3FAQs">Gasto Médico Empresarial</h3>
      </div>
    </a>
  </div>
  <div class="col-md-4 btn-faq text-center">
    <a href="http://ec2-52-213-166-151.eu-west-1.compute.amazonaws.com/category/salud-empresarial-bancomer/">
      <div class="col-md-12 fondoFAQs<?php if (is_category('salud-empresarial-bancomer')) {echo ' active';} ?> ">
        <h3 class="h3FAQs">Salud Empresarial</h3>
      </div>
      </a>
  </div>

</div>

<div class="col-md-12">
<hr>
</div>
</div>



		<div class="col-md-12 col-xs-12">
		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="false">
			
<?php
while ( have_posts() ) : the_post(); ?>

  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading-<?php the_ID(); ?>">
      <h4 class="panel-title">
        <a  class="accordion-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php the_ID(); ?>" aria-expanded="true" aria-controls="collapse-<?php the_ID(); ?>">
          <?php echo the_title(); ?>
        </a>
      </h4>
    </div>
    <div id="collapse-<?php the_ID(); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-<?php the_ID(); ?>">
      <div class="panel-body">
        <?php echo the_content(); ?>
      </div>
    </div>
  </div>	


<?php endwhile; 

else: ?>
<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

			
		</div>
		</div>
	</div>
</div>


<?php $query = new WP_Query($args); ?>

<?php #get_sidebar(); ?>
<?php get_footer(); ?>
<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>


    <?php
    $co=mostrarFav();
    ?>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul>
            <?php foreach($co as $res){ ?>
            <li><?php echo "<a href=".$res->permalink.">$res->user_slug</a>".'<br />'; ?></li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
    

<?php get_footer(); 

function mostrarFav(){
  global $wpdb;

  $correo = "Test@test.com";
  //echo $correo;

  $con = "SELECT user_slug, permalink FROM _favoritos WHERE user_correo = '$correo';";

   $count= $wpdb->get_results($con);

   return $count;

    
}

?>
<?php 
define( 'SHORTINIT', true );

require_once('../../../wp-load.php');

echo "<script>console.log( 'llega a ejecutar el script' );</script>";

$datos = (object)$_POST;
$correo = $datos->correoUser;
  global $wpdb;

   $results =$wpdb->get_results("SELECT user_slug, permalink FROM _favoritos WHERE user_correo = ' . $correo . ';");
   $wpdb->query($results);
	
	foreach($results as $result){
    echo $result->user_slug;
}
 ?>
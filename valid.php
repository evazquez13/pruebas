<?php 
	define( 'SHORTINIT', true );

require_once('../../../wp-load.php');

 global $wpdb;
  $datos = (object)$_POST;

  $correo = $datos->correoUser;
  $perma = $datos->perma;

  $sql2 = "select count(*) from _favoritos where permalink = '$perma' and user_correo='$correo';";

  $count= $wpdb->get_var($sql2);
  echo $count;

 ?>
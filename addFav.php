<?php 
	define( 'SHORTINIT', true );

require_once('../../../wp-load.php');

 global $wpdb;
  $datos = (object)$_POST;


  $page = $datos->page;
  $correo = $datos->correoUser;
  $perma = $datos->perma;

$sql2 = "select count(*) from _favoritos where permalink = '$perma' and user_correo='$correo';";

  $count= $wpdb->get_var($sql2);

   if ($count == 0) {
     $sql1 = "insert into _favoritos (user_correo, user_slug, permalink) values ('$correo','$page','$perma') ;";
      $wpdb->query($sql1);
      $count = 1;
   }else {
     $sql1 = "delete from _favoritos where permalink = '$perma' and user_correo='$correo';";
      $wpdb->query($sql1);
      $count = 0;
   }
   
echo $count;

	
 ?>
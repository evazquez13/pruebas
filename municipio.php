<?php
$post=(object)$_POST;

$estado = $post->estado;

$conexion=mysqli_connect("173.194.254.4","admin","admin")or die ("no se pudo conectar con la base de datos");
mysqli_select_db($conexion,"suiterrhhdb") or die("No se encuentra la base de datos solicitada2");
mysqli_set_charset($conexion, 'utf8');

// $conexion=mysqli_connect("localhost","root","root")or die ("no se pudo conectar con la base de datos");
// mysqli_select_db($conexion,"bbva") or die("No se encuentra la base de datos solicitada2");
// mysqli_set_charset($conexion, 'utf8');
$select= "SELECT tx_ciudadmunicipio FROM tsrh_dirmedico WHERE tx_estado ='$estado' group by tx_ciudadmunicipio;";
  $res = mysqli_query($conexion,$select);
  mysqli_close($conexion);

  	
    $count = 0;
    if(mysqli_num_rows($res) == 0){
      echo'<option value="Remover Filtro">Remover Filtro</option>';	
    }else{
    foreach ($res as $response) {
    	if ($count == 0){
	    			$option='<option value="Remover Filtro">Remover Filtro</option>';
	    		}else{
	    			$option="";
	    		}
            echo ''.$option.'<option value="'.$response['tx_ciudadmunicipio'].'">'.$response['tx_ciudadmunicipio'].'</option>';
            $count++;
        }
      }
?>
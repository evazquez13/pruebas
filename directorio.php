<?php
$post=(object)$_POST;

$estado = $post->estado;
$municipio = $post->municipio;
$especialidad = $post->especialidad;
$prov = $post->proveedor;
$correoUser =$post->correoUser;

$proveedor=str_replace(' ','%',$prov);

// $conexion=mysqli_connect("173.194.254.4","admin","admin")or die ("no se pudo conectar con la base de datos");
// mysqli_select_db($conexion,"suiterrhhdb") or die("No se encuentra la base de datos solicitada2");
// mysqli_set_charset($conexion, 'utf8');

$conexion=mysqli_connect("localhost","root","root")or die ("no se pudo conectar con la base de datos");
mysqli_select_db($conexion,"bbva") or die("No se encuentra la base de datos solicitada2");
mysqli_set_charset($conexion, 'utf8');

if ($estado!="Remover Filtro" && $municipio!="Remover Filtro" && $especialidad!="Remover Filtro" && $proveedor!="") {
	$select= "SELECT DISTINCT
	esp.id_catespecialidad,
	esp.tx_descripcion,
	dir.nb_nombre,
    dir.tx_callenumero,
    dir.tx_colonia,dir.tx_estado, 
    X(dir.tx_gps) as latitude, 
    Y(dir.tx_gps) as longitude, 
    us.id_region
	FROM
	tsrh_dirmedico dir, tsrh_usuario us, tsrh_catespecialidad esp
	where dir.TSRH_CATSERVICIOS_ID_CATSERVICIOS=(select nu_catalogo from tsrh_catservicios where id_catservicios=(select tsrh_catservicios_id_catservicios from tsrh_usuario where tx_correo='$correoUser'))
	and dir.tsrh_catespecialidad_id_catespecialidad= esp.id_catespecialidad
	and dir.tx_estado ='$estado'
	and dir.tx_ciudadmunicipio = '$municipio'
	and esp.tx_descripcion = '$especialidad'
	and tx_correo='$correoUser'
	and (( dir.nb_nombre like '%".$proveedor."%') or ( esp.tx_descripcion like '%".$proveedor."%'))
	limit 0,40";	
	$res = mysqli_query($conexion,$select);
	mysqli_close($conexion);

	if (mysqli_num_rows($res) == 0) { // regreso sin valores
	  echo '<div class="row" ng-show="nodata">
	      <div class="col-md-12 text-center">
	        <button class="btn btn-md btn-warning">
	          <i class="glyphicon glyphicon-remove"></i> Sin resultados
	        </button>
	      </div>
	    </div>';
	}else{
	    
	    foreach ($res as $response) {
	            echo '<div class="col-md-6">
						<div class="col-md-12" style="border: 4px solid #CCC;height: 260px;margin-bottom: 10px;padding: 25px;">
							<table class="table borderless table-striped">
								<tbody><tr>
									<td class="col-md-1"><strong>Nombre</strong></td>
									<td><a href="https://www.google.com/maps?ie=UTF8&amp;hq&amp;q='.$response["latitude"].','.$response["longitude"].'&amp;z=20" ng-show="19.4334022" target="_blank"> '.$response["nb_nombre"].'</a></td>
								</tr>
								<tr>
									<td><strong>Calle</strong></td>
									<td class="ng-binding">  '.$response["tx_callenumero"].'</td>
								</tr>
								<tr>
									<td><strong>Colonia</strong></td>
									<td class="ng-binding">'.$response["tx_colonia"].'</td>
								</tr>
								<tr>
									<td><strong>Estado</strong></td>
									<td class="ng-binding">'.$response["tx_estado"].'</td>
								</tr>
								<tr>
									<td><strong>Descripcion</strong></td>
									<td class="ng-binding">'.$response["tx_descripcion"].'</td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>';
	        }

	    }
}elseif ($estado!="Remover Filtro" && $municipio!="Remover Filtro" && $especialidad!="Remover Filtro" && $proveedor=="") {
	$select= "SELECT DISTINCT
	esp.id_catespecialidad,
	esp.tx_descripcion,
	dir.nb_nombre,
    dir.tx_callenumero,
    dir.tx_colonia,dir.tx_estado, 
    X(dir.tx_gps) as latitude, 
    Y(dir.tx_gps) as longitude, 
    us.id_region
	FROM
	tsrh_dirmedico dir, tsrh_usuario us, tsrh_catespecialidad esp
	where dir.TSRH_CATSERVICIOS_ID_CATSERVICIOS=(select nu_catalogo from tsrh_catservicios where id_catservicios=(select tsrh_catservicios_id_catservicios from tsrh_usuario where tx_correo='$correoUser'))
	and dir.tsrh_catespecialidad_id_catespecialidad= esp.id_catespecialidad
	and dir.tx_estado ='$estado'
	and dir.tx_ciudadmunicipio = '$municipio'
	and esp.tx_descripcion = '$especialidad'
	and tx_correo='$correoUser'
	limit 0,40";
	$res = mysqli_query($conexion,$select);
	mysqli_close($conexion);

	if (mysqli_num_rows($res) == 0) { // regreso sin valores
	  echo '<div class="row" ng-show="nodata">
	      <div class="col-md-12 text-center">
	        <button class="btn btn-md btn-warning">
	          <i class="glyphicon glyphicon-remove"></i> Sin resultados
	        </button>
	      </div>
	    </div>';
	}else{
	    
	    foreach ($res as $response) {

	            echo '<div class="col-md-6">
						<div class="col-md-12" style="border: 4px solid #CCC;height: 260px;margin-bottom: 10px;padding: 25px;">
							<table class="table borderless table-striped">
								<tbody><tr>
									<td class="col-md-1"><strong>Nombre</strong></td>
									<td><a href="https://www.google.com/maps?ie=UTF8&amp;hq&amp;q='.$response["latitude"].','.$response["longitude"].'&amp;z=20" ng-show="19.4334022" target="_blank"> '.$response["nb_nombre"].'</a></td>
								</tr>
								<tr>
									<td><strong>Calle</strong></td>
									<td class="ng-binding">  '.$response["tx_callenumero"].'</td>
								</tr>
								<tr>
									<td><strong>Colonia</strong></td>
									<td class="ng-binding">'.$response["tx_colonia"].'</td>
								</tr>
								<tr>
									<td><strong>Estado</strong></td>
									<td class="ng-binding">'.$response["tx_estado"].'</td>
								</tr>
								<tr>
									<td><strong>Descripcion</strong></td>
									<td class="ng-binding">'.$response["tx_descripcion"].'</td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>';
	        }

	    }
}elseif ($estado!="Remover Filtro" && $municipio!="Remover Filtro" && $especialidad=="Remover Filtro" && $proveedor!="") {
	$select= "SELECT DISTINCT
	esp.id_catespecialidad,
	esp.tx_descripcion,
	dir.nb_nombre,
    dir.tx_callenumero,
    dir.tx_colonia,dir.tx_estado, 
    X(dir.tx_gps) as latitude, 
    Y(dir.tx_gps) as longitude, 
    us.id_region
	FROM
	tsrh_dirmedico dir, tsrh_usuario us, tsrh_catespecialidad esp
	where dir.TSRH_CATSERVICIOS_ID_CATSERVICIOS=(select nu_catalogo from tsrh_catservicios where id_catservicios=(select tsrh_catservicios_id_catservicios from tsrh_usuario where tx_correo='$correoUser'))
	and dir.tsrh_catespecialidad_id_catespecialidad= esp.id_catespecialidad
	and dir.tx_estado ='$estado'
	and dir.tx_ciudadmunicipio = '$municipio'
	and tx_correo='$correoUser'
	and (( dir.nb_nombre like '%".$proveedor."%') or ( esp.tx_descripcion like '%".$proveedor."%'))
	limit 0,40";
	$res = mysqli_query($conexion,$select);
	mysqli_close($conexion);

	if (mysqli_num_rows($res) == 0) { // regreso sin valores
	  echo '<div class="row" ng-show="nodata">
	      <div class="col-md-12 text-center">
	        <button class="btn btn-md btn-warning">
	          <i class="glyphicon glyphicon-remove"></i> Sin resultados
	        </button>
	      </div>
	    </div>';
	}else{
	    
	    foreach ($res as $response) {

	            echo '<div class="col-md-6">
						<div class="col-md-12" style="border: 4px solid #CCC;height: 260px;margin-bottom: 10px;padding: 25px;">
							<table class="table borderless table-striped">
								<tbody><tr>
									<td class="col-md-1"><strong>Nombre</strong></td>
									<td><a href="https://www.google.com/maps?ie=UTF8&amp;hq&amp;q='.$response["latitude"].','.$response["longitude"].'&amp;z=20" ng-show="19.4334022" target="_blank"> '.$response["nb_nombre"].'</a></td>
								</tr>
								<tr>
									<td><strong>Calle</strong></td>
									<td class="ng-binding">  '.$response["tx_callenumero"].'</td>
								</tr>
								<tr>
									<td><strong>Colonia</strong></td>
									<td class="ng-binding">'.$response["tx_colonia"].'</td>
								</tr>
								<tr>
									<td><strong>Estado</strong></td>
									<td class="ng-binding">'.$response["tx_estado"].'</td>
								</tr>
								<tr>
									<td><strong>Descripcion</strong></td>
									<td class="ng-binding">'.$response["tx_descripcion"].'</td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>';
	        }

	    }
}elseif ($estado=="Remover Filtro" && $municipio=="Remover Filtro" && $especialidad=="Remover Filtro" && $proveedor!="") {
	$select= "SELECT DISTINCT
	esp.id_catespecialidad,
	esp.tx_descripcion,
	dir.nb_nombre,
    dir.tx_callenumero,
    dir.tx_colonia,dir.tx_estado, 
    X(dir.tx_gps) as latitude, 
    Y(dir.tx_gps) as longitude, 
    us.id_region
	FROM
	tsrh_dirmedico dir, tsrh_usuario us, tsrh_catespecialidad esp
	where dir.TSRH_CATSERVICIOS_ID_CATSERVICIOS=(select nu_catalogo from tsrh_catservicios where id_catservicios=(select tsrh_catservicios_id_catservicios from tsrh_usuario where tx_correo='$correoUser'))
	and dir.tsrh_catespecialidad_id_catespecialidad= esp.id_catespecialidad
	and tx_correo='$correoUser'
	and (( dir.nb_nombre like '%".$proveedor."%') or ( esp.tx_descripcion like '%".$proveedor."%'))
	limit 0,40";
	$res = mysqli_query($conexion,$select);
	mysqli_close($conexion);

	if (mysqli_num_rows($res) == 0) { // regreso sin valores
	  echo '<div class="row" ng-show="nodata">
	      <div class="col-md-12 text-center">
	        <button class="btn btn-md btn-warning">
	          <i class="glyphicon glyphicon-remove"></i> Sin resultados
	        </button>
	      </div>
	    </div>';
	}else{
	    
	    foreach ($res as $response) {

	            echo '<div class="col-md-6">
						<div class="col-md-12" style="border: 4px solid #CCC;height: 260px;margin-bottom: 10px;padding: 25px;">
							<table class="table borderless table-striped">
								<tbody><tr>
									<td class="col-md-1"><strong>Nombre</strong></td>
									<td><a href="https://www.google.com/maps?ie=UTF8&amp;hq&amp;q='.$response["latitude"].','.$response["longitude"].'&amp;z=20" ng-show="19.4334022" target="_blank"> '.$response["nb_nombre"].'</a></td>
								</tr>
								<tr>
									<td><strong>Calle</strong></td>
									<td class="ng-binding">  '.$response["tx_callenumero"].'</td>
								</tr>
								<tr>
									<td><strong>Colonia</strong></td>
									<td class="ng-binding">'.$response["tx_colonia"].'</td>
								</tr>
								<tr>
									<td><strong>Estado</strong></td>
									<td class="ng-binding">'.$response["tx_estado"].'</td>
								</tr>
								<tr>
									<td><strong>Descripcion</strong></td>
									<td class="ng-binding">'.$response["tx_descripcion"].'</td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>';
	        }

	    }
}elseif ($estado!="Remover Filtro" && $municipio!="Remover Filtro" && $especialidad=="Remover Filtro" && $proveedor=="") {
	$select= "SELECT DISTINCT
	esp.id_catespecialidad,
	esp.tx_descripcion,
	dir.nb_nombre,
    dir.tx_callenumero,
    dir.tx_colonia,dir.tx_estado, 
    X(dir.tx_gps) as latitude, 
    Y(dir.tx_gps) as longitude, 
    us.id_region
	FROM
	tsrh_dirmedico dir, tsrh_usuario us, tsrh_catespecialidad esp
	where dir.TSRH_CATSERVICIOS_ID_CATSERVICIOS=(select nu_catalogo from tsrh_catservicios where id_catservicios=(select tsrh_catservicios_id_catservicios from tsrh_usuario where tx_correo='$correoUser'))
	and dir.tsrh_catespecialidad_id_catespecialidad= esp.id_catespecialidad
	and dir.tx_estado ='$estado'
	and dir.tx_ciudadmunicipio = '$municipio'
	and tx_correo='$correoUser'
	limit 0,40";
	$res = mysqli_query($conexion,$select);
	mysqli_close($conexion);

	if (mysqli_num_rows($res) == 0) { // regreso sin valores
	  echo '<div class="row" ng-show="nodata">
	      <div class="col-md-12 text-center">
	        <button class="btn btn-md btn-warning">
	          <i class="glyphicon glyphicon-remove"></i> Sin resultados
	        </button>
	      </div>
	    </div>';
	}else{
	    foreach ($res as $response) {

	            echo '<div class="col-md-6">
						<div class="col-md-12" style="border: 4px solid #CCC;height: 260px;margin-bottom: 10px;padding: 25px;">
							<table class="table borderless table-striped">
								<tbody><tr>
									<td class="col-md-1"><strong>Nombre</strong></td>
									<td><a href="https://www.google.com/maps?ie=UTF8&amp;hq&amp;q='.$response["latitude"].','.$response["longitude"].'&amp;z=20" ng-show="19.4334022" target="_blank"> '.$response["nb_nombre"].'</a></td>
								</tr>
								<tr>
									<td><strong>Calle</strong></td>
									<td class="ng-binding">  '.$response["tx_callenumero"].'</td>
								</tr>
								<tr>
									<td><strong>Colonia</strong></td>
									<td class="ng-binding">'.$response["tx_colonia"].'</td>
								</tr>
								<tr>
									<td><strong>Estado</strong></td>
									<td class="ng-binding">'.$response["tx_estado"].'</td>
								</tr>
								<tr>
									<td><strong>Descripcion</strong></td>
									<td class="ng-binding">'.$response["tx_descripcion"].'</td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>';
	        }

	    }
}elseif ($estado!="Remover Filtro" && $municipio=="Remover Filtro" && $especialidad=="Remover Filtro" && $proveedor=="") {
	$select= "SELECT DISTINCT
	esp.id_catespecialidad,
	esp.tx_descripcion,
	dir.nb_nombre,
    dir.tx_callenumero,
    dir.tx_colonia,dir.tx_estado, 
    X(dir.tx_gps) as latitude, 
    Y(dir.tx_gps) as longitude, 
    us.id_region
	FROM
	tsrh_dirmedico dir, tsrh_usuario us, tsrh_catespecialidad esp
	where dir.TSRH_CATSERVICIOS_ID_CATSERVICIOS=(select nu_catalogo from tsrh_catservicios where id_catservicios=(select tsrh_catservicios_id_catservicios from tsrh_usuario where tx_correo='$correoUser'))
	and dir.tsrh_catespecialidad_id_catespecialidad= esp.id_catespecialidad
	and dir.tx_estado ='$estado'
	and tx_correo='$correoUser'
	limit 0,40";
	$res = mysqli_query($conexion,$select);
	mysqli_close($conexion);

	if (mysqli_num_rows($res) == 0) { // regreso sin valores
	  echo '<div class="row" ng-show="nodata">
	      <div class="col-md-12 text-center">
	        <button class="btn btn-md btn-warning">
	          <i class="glyphicon glyphicon-remove"></i> Sin resultados
	        </button>
	      </div>
	    </div>';
	}else{
	    foreach ($res as $response) {

	            echo '<div class="col-md-6">
						<div class="col-md-12" style="border: 4px solid #CCC;height: 260px;margin-bottom: 10px;padding: 25px;">
							<table class="table borderless table-striped">
								<tbody><tr>
									<td class="col-md-1"><strong>Nombre</strong></td>
									<td><a href="https://www.google.com/maps?ie=UTF8&amp;hq&amp;q='.$response["latitude"].','.$response["longitude"].'&amp;z=20" ng-show="19.4334022" target="_blank"> '.$response["nb_nombre"].'</a></td>
								</tr>
								<tr>
									<td><strong>Calle</strong></td>
									<td class="ng-binding">  '.$response["tx_callenumero"].'</td>
								</tr>
								<tr>
									<td><strong>Colonia</strong></td>
									<td class="ng-binding">'.$response["tx_colonia"].'</td>
								</tr>
								<tr>
									<td><strong>Estado</strong></td>
									<td class="ng-binding">'.$response["tx_estado"].'</td>
								</tr>
								<tr>
									<td><strong>Descripcion</strong></td>
									<td class="ng-binding">'.$response["tx_descripcion"].'</td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>';
	        }

	    }
}elseif ($estado!="Remover Filtro" && $municipio=="Remover Filtro" && $especialidad!="Remover Filtro" && $proveedor=="") {
	$select= "SELECT DISTINCT
	esp.id_catespecialidad,
	esp.tx_descripcion,
	dir.nb_nombre,
    dir.tx_callenumero,
    dir.tx_colonia,dir.tx_estado, 
    X(dir.tx_gps) as latitude, 
    Y(dir.tx_gps) as longitude, 
    us.id_region
	FROM
	tsrh_dirmedico dir, tsrh_usuario us, tsrh_catespecialidad esp
	where dir.TSRH_CATSERVICIOS_ID_CATSERVICIOS=(select nu_catalogo from tsrh_catservicios where id_catservicios=(select tsrh_catservicios_id_catservicios from tsrh_usuario where tx_correo='$correoUser'))
	and dir.tsrh_catespecialidad_id_catespecialidad= esp.id_catespecialidad
	and dir.tx_estado ='$estado'
	and esp.tx_descripcion = '$especialidad'
	and tx_correo='$correoUser'
	limit 0,40";
	$res = mysqli_query($conexion,$select);
	mysqli_close($conexion);

	if (mysqli_num_rows($res) == 0) { // regreso sin valores
	  echo '<div class="row" ng-show="nodata">
	      <div class="col-md-12 text-center">
	        <button class="btn btn-md btn-warning">
	          <i class="glyphicon glyphicon-remove"></i> Sin resultados
	        </button>
	      </div>
	    </div>';
	}else{
	    foreach ($res as $response) {

	            echo '<div class="col-md-6">
						<div class="col-md-12" style="border: 4px solid #CCC;height: 260px;margin-bottom: 10px;padding: 25px;">
							<table class="table borderless table-striped">
								<tbody><tr>
									<td class="col-md-1"><strong>Nombre</strong></td>
									<td><a href="https://www.google.com/maps?ie=UTF8&amp;hq&amp;q='.$response["latitude"].','.$response["longitude"].'&amp;z=20" ng-show="19.4334022" target="_blank"> '.$response["nb_nombre"].'</a></td>
								</tr>
								<tr>
									<td><strong>Calle</strong></td>
									<td class="ng-binding">  '.$response["tx_callenumero"].'</td>
								</tr>
								<tr>
									<td><strong>Colonia</strong></td>
									<td class="ng-binding">'.$response["tx_colonia"].'</td>
								</tr>
								<tr>
									<td><strong>Estado</strong></td>
									<td class="ng-binding">'.$response["tx_estado"].'</td>
								</tr>
								<tr>
									<td><strong>Descripcion</strong></td>
									<td class="ng-binding">'.$response["tx_descripcion"].'</td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>';
	        }

	    }
}elseif ($estado!="Remover Filtro" && $municipio=="Remover Filtro" && $especialidad=="Remover Filtro" && $proveedor!="") {
	$select= "SELECT DISTINCT
	esp.id_catespecialidad,
	esp.tx_descripcion,
	dir.nb_nombre,
    dir.tx_callenumero,
    dir.tx_colonia,dir.tx_estado, 
    X(dir.tx_gps) as latitude, 
    Y(dir.tx_gps) as longitude, 
    us.id_region
	FROM
	tsrh_dirmedico dir, tsrh_usuario us, tsrh_catespecialidad esp
	where dir.TSRH_CATSERVICIOS_ID_CATSERVICIOS=(select nu_catalogo from tsrh_catservicios where id_catservicios=(select tsrh_catservicios_id_catservicios from tsrh_usuario where tx_correo='$correoUser'))
	and dir.tsrh_catespecialidad_id_catespecialidad= esp.id_catespecialidad
	and dir.tx_estado ='$estado'
	and tx_correo='$correoUser'
	and (( dir.nb_nombre like '%".$proveedor."%') or ( esp.tx_descripcion like '%".$proveedor."%'))
	limit 0,40";
	$res = mysqli_query($conexion,$select);
	mysqli_close($conexion);

	if (mysqli_num_rows($res) == 0) { // regreso sin valores
	  echo '<div class="row" ng-show="nodata">
	      <div class="col-md-12 text-center">
	        <button class="btn btn-md btn-warning">
	          <i class="glyphicon glyphicon-remove"></i> Sin resultados
	        </button>
	      </div>
	    </div>';
	}else{
	    foreach ($res as $response) {

	            echo '<div class="col-md-6">
						<div class="col-md-12" style="border: 4px solid #CCC;height: 260px;margin-bottom: 10px;padding: 25px;">
							<table class="table borderless table-striped">
								<tbody><tr>
									<td class="col-md-1"><strong>Nombre</strong></td>
									<td><a href="https://www.google.com/maps?ie=UTF8&amp;hq&amp;q='.$response["latitude"].','.$response["longitude"].'&amp;z=20" ng-show="19.4334022" target="_blank"> '.$response["nb_nombre"].'</a></td>
								</tr>
								<tr>
									<td><strong>Calle</strong></td>
									<td class="ng-binding">  '.$response["tx_callenumero"].'</td>
								</tr>
								<tr>
									<td><strong>Colonia</strong></td>
									<td class="ng-binding">'.$response["tx_colonia"].'</td>
								</tr>
								<tr>
									<td><strong>Estado</strong></td>
									<td class="ng-binding">'.$response["tx_estado"].'</td>
								</tr>
								<tr>
									<td><strong>Descripcion</strong></td>
									<td class="ng-binding">'.$response["tx_descripcion"].'</td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>';
	        }

	    }
}elseif ($estado=="Remover Filtro" && $municipio=="Remover Filtro" && $especialidad!="Remover Filtro" && $proveedor!="") {
	$select= "SELECT DISTINCT
	esp.id_catespecialidad,
	esp.tx_descripcion,
	dir.nb_nombre,
    dir.tx_callenumero,
    dir.tx_colonia,dir.tx_estado, 
    X(dir.tx_gps) as latitude, 
    Y(dir.tx_gps) as longitude, 
    us.id_region
	FROM
	tsrh_dirmedico dir, tsrh_usuario us, tsrh_catespecialidad esp
	where dir.TSRH_CATSERVICIOS_ID_CATSERVICIOS=(select nu_catalogo from tsrh_catservicios where id_catservicios=(select tsrh_catservicios_id_catservicios from tsrh_usuario where tx_correo='$correoUser'))
	and dir.tsrh_catespecialidad_id_catespecialidad= esp.id_catespecialidad
	and esp.tx_descripcion = '$especialidad'
	and tx_correo='$correoUser'
	and (( dir.nb_nombre like '%".$proveedor."%') or ( esp.tx_descripcion like '%".$proveedor."%'))
	limit 0,40";
	$res = mysqli_query($conexion,$select);
	mysqli_close($conexion);

	if (mysqli_num_rows($res) == 0) { // regreso sin valores
	  echo '<div class="row" ng-show="nodata">
	      <div class="col-md-12 text-center">
	        <button class="btn btn-md btn-warning">
	          <i class="glyphicon glyphicon-remove"></i> Sin resultados
	        </button>
	      </div>
	    </div>';
	}else{
	    foreach ($res as $response) {

	            echo '<div class="col-md-6">
						<div class="col-md-12" style="border: 4px solid #CCC;height: 260px;margin-bottom: 10px;padding: 25px;">
							<table class="table borderless table-striped">
								<tbody><tr>
									<td class="col-md-1"><strong>Nombre</strong></td>
									<td><a href="https://www.google.com/maps?ie=UTF8&amp;hq&amp;q='.$response["latitude"].','.$response["longitude"].'&amp;z=20" ng-show="19.4334022" target="_blank"> '.$response["nb_nombre"].'</a></td>
								</tr>
								<tr>
									<td><strong>Calle</strong></td>
									<td class="ng-binding">  '.$response["tx_callenumero"].'</td>
								</tr>
								<tr>
									<td><strong>Colonia</strong></td>
									<td class="ng-binding">'.$response["tx_colonia"].'</td>
								</tr>
								<tr>
									<td><strong>Estado</strong></td>
									<td class="ng-binding">'.$response["tx_estado"].'</td>
								</tr>
								<tr>
									<td><strong>Descripcion</strong></td>
									<td class="ng-binding">'.$response["tx_descripcion"].'</td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>';
	        }

	    }
}elseif ($estado=="Remover Filtro" && $municipio=="Remover Filtro" && $especialidad!="Remover Filtro" && $proveedor=="") {
	$select= "SELECT DISTINCT
	esp.id_catespecialidad,
	esp.tx_descripcion,
	dir.nb_nombre,
    dir.tx_callenumero,
    dir.tx_colonia,dir.tx_estado, 
    X(dir.tx_gps) as latitude, 
    Y(dir.tx_gps) as longitude, 
    us.id_region
	FROM
	tsrh_dirmedico dir, tsrh_usuario us, tsrh_catespecialidad esp
	where dir.TSRH_CATSERVICIOS_ID_CATSERVICIOS=(select nu_catalogo from tsrh_catservicios where id_catservicios=(select tsrh_catservicios_id_catservicios from tsrh_usuario where tx_correo='$correoUser'))
	and dir.tsrh_catespecialidad_id_catespecialidad= esp.id_catespecialidad
	and esp.tx_descripcion = '$especialidad'
	and tx_correo='$correoUser'
	limit 0,40";
	$res = mysqli_query($conexion,$select);
	mysqli_close($conexion);

	if (mysqli_num_rows($res) == 0) { // regreso sin valores
	  echo '<div class="row" ng-show="nodata">
	      <div class="col-md-12 text-center">
	        <button class="btn btn-md btn-warning">
	          <i class="glyphicon glyphicon-remove"></i> Sin resultados
	        </button>
	      </div>
	    </div>';
	}else{
	    foreach ($res as $response) {

	            echo '<div class="col-md-6">
						<div class="col-md-12" style="border: 4px solid #CCC;height: 260px;margin-bottom: 10px;padding: 25px;">
							<table class="table borderless table-striped">
								<tbody><tr>
									<td class="col-md-1"><strong>Nombre</strong></td>
									<td><a href="https://www.google.com/maps?ie=UTF8&amp;hq&amp;q='.$response["latitude"].','.$response["longitude"].'&amp;z=20" ng-show="19.4334022" target="_blank"> '.$response["nb_nombre"].'</a></td>
								</tr>
								<tr>
									<td><strong>Calle</strong></td>
									<td class="ng-binding">  '.$response["tx_callenumero"].'</td>
								</tr>
								<tr>
									<td><strong>Colonia</strong></td>
									<td class="ng-binding">'.$response["tx_colonia"].'</td>
								</tr>
								<tr>
									<td><strong>Estado</strong></td>
									<td class="ng-binding">'.$response["tx_estado"].'</td>
								</tr>
								<tr>
									<td><strong>Descripcion</strong></td>
									<td class="ng-binding">'.$response["tx_descripcion"].'</td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>';
	        }

	    }
}else{
	$select= "SELECT DISTINCT
	esp.id_catespecialidad,
	esp.tx_descripcion,
	dir.nb_nombre,
    dir.tx_callenumero,
    dir.tx_colonia,dir.tx_estado, 
    X(dir.tx_gps) as latitude, 
    Y(dir.tx_gps) as longitude, 
    us.id_region
	FROM
	tsrh_dirmedico dir, tsrh_usuario us, tsrh_catespecialidad esp
	where dir.TSRH_CATSERVICIOS_ID_CATSERVICIOS=(select nu_catalogo from tsrh_catservicios where id_catservicios=(select tsrh_catservicios_id_catservicios from tsrh_usuario where tx_correo='$correoUser'))
	and dir.tsrh_catespecialidad_id_catespecialidad= esp.id_catespecialidad
	and tx_correo='$correoUser' limit 0,40";	
	$res = mysqli_query($conexion,$select);
	mysqli_close($conexion);

	if (mysqli_num_rows($res) == 0) { // regreso sin valores
	  echo '<div class="row" ng-show="nodata">
	      <div class="col-md-12 text-center">
	        <button class="btn btn-md btn-warning">
	          <i class="glyphicon glyphicon-remove"></i> Sin resultados
	        </button>
	      </div>
	    </div>';
	}else{
	    
	    foreach ($res as $response) {
	            echo '<div class="col-md-6">
						<div class="col-md-12" style="border: 4px solid #CCC;height: 260px;margin-bottom: 10px;padding: 25px;">
							<table class="table borderless table-striped">
								<tbody><tr>
									<td class="col-md-1"><strong>Nombre</strong></td>
									<td><a href="https://www.google.com/maps?ie=UTF8&amp;hq&amp;q='.$response["latitude"].','.$response["longitude"].'&amp;z=20" ng-show="19.4334022" target="_blank"> '.$response["nb_nombre"].'</a></td>
								</tr>
								<tr>
									<td><strong>Calle</strong></td>
									<td class="ng-binding">  '.$response["tx_callenumero"].'</td>
								</tr>
								<tr>
									<td><strong>Colonia</strong></td>
									<td class="ng-binding">'.$response["tx_colonia"].'</td>
								</tr>
								<tr>
									<td><strong>Estado</strong></td>
									<td class="ng-binding">'.$response["tx_estado"].'</td>
								</tr>
								<tr>
									<td><strong>Descripcion</strong></td>
									<td class="ng-binding">'.$response["tx_descripcion"].'</td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>';
	        }
}
}

?>
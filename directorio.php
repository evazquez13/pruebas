<?php
$post=(object)$_POST;

$estado = $post->estado;
$municipio = $post->municipio;
$especialidad = $post->especialidad;
$prov = $post->proveedor;

$proveedor=str_replace(' ','%',$prov);


if ($estado!="Remover Filtro" && $municipio!="Remover Filtro" && $especialidad!="Remover Filtro" && $proveedor!="") {
	$conexion=mysqli_connect("173.194.254.4","admin","admin")or die ("no se pudo conectar con la base de datos");
	mysqli_select_db($conexion,"suiterrhhdb") or die("No se encuentra la base de datos solicitada2");
	mysqli_set_charset($conexion, 'utf8');
	$select= "SELECT  d.id_dirmedico,e.tx_descripcion, d.nb_nombre,d.tx_callenumero,d.tx_colonia,d.tx_cp,d.tx_ciudadmunicipio,d.tx_estado,d.tx_direccion_formateada,d.st_visible,d.fh_creamod, X(d.tx_gps) as latitude, Y(d.tx_gps) as longitude, e.tx_descripcion 
				from tsrh_dirmedico as d join tsrh_catespecialidad as e on e.id_catespecialidad = d.tsrh_catespecialidad_id_catespecialidad where d.tx_estado = '$estado' and d.tx_ciudadmunicipio = '$municipio' and e.tx_descripcion = '$especialidad' and (( d.nb_nombre like '%".$proveedor."%') or ( e.tx_descripcion like '%".$proveedor."%'))  limit 0,30";	
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
	    
	    $count=1;
	    foreach ($res as $response) {
	    		
	    		if ($count%2 == 0){
	    			$row="<div class='row'>";
	    			$row1="</div>";
	    		}else{
	    			$row="";
	    			$row1="";
	    		}

	            echo ''.$row.'<div class="col-md-6">
						<div class="col-md-12" style="border: 4px solid #CCC;height: 253px;margin-bottom: 10px;padding: 25px;">
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
					</div>'.$row1.'';
					$count++;
	        }

	    }
}elseif ($estado!="Remover Filtro" && $municipio!="Remover Filtro" && $especialidad!="Remover Filtro" && $proveedor=="") {
	$conexion=mysqli_connect("173.194.254.4","admin","admin")or die ("no se pudo conectar con la base de datos");
	mysqli_select_db($conexion,"suiterrhhdb") or die("No se encuentra la base de datos solicitada2");
	mysqli_set_charset($conexion, 'utf8');
	$select= "SELECT  d.id_dirmedico, d.nb_nombre,d.tx_callenumero,d.tx_colonia,d.tx_cp,d.tx_ciudadmunicipio,d.tx_estado,d.tx_direccion_formateada,d.st_visible,d.fh_creamod, X(d.tx_gps) as latitude, Y(d.tx_gps) as longitude, e.tx_descripcion 
				from tsrh_dirmedico as d join tsrh_catespecialidad as e on e.id_catespecialidad = d.tsrh_catespecialidad_id_catespecialidad where d.tx_estado = '$estado' and d.tx_ciudadmunicipio = '$municipio' and e.tx_descripcion = '$especialidad' limit 0,30";
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
	    
	    $count=1;
	    foreach ($res as $response) {
	    		
	    		if ($count%2 == 0){
	    			$row="<div class='row'>";
	    			$row1="</div>";
	    		}else{
	    			$row="";
	    			$row1="";
	    		}

	            echo ''.$row.'<div class="col-md-6">
						<div class="col-md-12" style="border: 4px solid #CCC;height: 253px;margin-bottom: 10px;padding: 25px;">
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
					</div>'.$row1.'';
					$count++;
	        }

	    }
}elseif ($estado!="Remover Filtro" && $municipio!="Remover Filtro" && $especialidad=="Remover Filtro" && $proveedor!="") {
	$conexion=mysqli_connect("173.194.254.4","admin","admin")or die ("no se pudo conectar con la base de datos");
	mysqli_select_db($conexion,"suiterrhhdb") or die("No se encuentra la base de datos solicitada2");
	mysqli_set_charset($conexion, 'utf8');
	$select= "SELECT  d.id_dirmedico,e.tx_descripcion, d.nb_nombre,d.tx_callenumero,d.tx_colonia,d.tx_cp,d.tx_ciudadmunicipio,d.tx_estado,d.tx_direccion_formateada,d.st_visible,d.fh_creamod, X(d.tx_gps) as latitude, Y(d.tx_gps) as longitude, e.tx_descripcion 
				from tsrh_dirmedico as d join tsrh_catespecialidad as e on e.id_catespecialidad = d.tsrh_catespecialidad_id_catespecialidad where d.tx_estado = '$estado' and d.tx_ciudadmunicipio = '$municipio' and (( d.nb_nombre like '%".$proveedor."%') or ( e.tx_descripcion like '%".$proveedor."%')) limit 0,30";
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
	    
	    $count=1;
	    foreach ($res as $response) {
	    		
	    		if ($count%2 == 0){
	    			$row="<div class='row'>";
	    			$row1="</div>";
	    		}else{
	    			$row="";
	    			$row1="";
	    		}

	            echo ''.$row.'<div class="col-md-6">
						<div class="col-md-12" style="border: 4px solid #CCC;height: 253px;margin-bottom: 10px;padding: 25px;">
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
					</div>'.$row1.'';
					$count++;
	        }

	    }
}elseif ($estado=="Remover Filtro" && $municipio=="Remover Filtro" && $especialidad=="Remover Filtro" && $proveedor!="") {
	$conexion=mysqli_connect("173.194.254.4","admin","admin")or die ("no se pudo conectar con la base de datos");
	mysqli_select_db($conexion,"suiterrhhdb") or die("No se encuentra la base de datos solicitada2");
	mysqli_set_charset($conexion, 'utf8');
	$select= "SELECT  d.id_dirmedico,e.tx_descripcion, d.nb_nombre,d.tx_callenumero,d.tx_colonia,d.tx_cp,d.tx_ciudadmunicipio,d.tx_estado,d.tx_direccion_formateada,d.st_visible,d.fh_creamod, X(d.tx_gps) as latitude, Y(d.tx_gps) as longitude, e.tx_descripcion 
				from tsrh_dirmedico as d join tsrh_catespecialidad as e on e.id_catespecialidad = d.tsrh_catespecialidad_id_catespecialidad where  (d.nb_nombre like '%".$proveedor."%') or  (e.tx_descripcion like '%".$proveedor."%') limit 0,30";
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
	    
	    $count=1;
	    foreach ($res as $response) {
	    		
	    		if ($count%2 == 0){
	    			$row="<div class='row'>";
	    			$row1="</div>";
	    		}else{
	    			$row="";
	    			$row1="";
	    		}

	            echo ''.$row.'<div class="col-md-6">
						<div class="col-md-12" style="border: 4px solid #CCC;height: 253px;margin-bottom: 10px;padding: 25px;">
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
					</div>'.$row1.'';
					$count++;
	        }

	    }
}elseif ($estado!="Remover Filtro" && $municipio!="Remover Filtro" && $especialidad=="Remover Filtro" && $proveedor=="") {
	$conexion=mysqli_connect("173.194.254.4","admin","admin")or die ("no se pudo conectar con la base de datos");
	mysqli_select_db($conexion,"suiterrhhdb") or die("No se encuentra la base de datos solicitada2");
	mysqli_set_charset($conexion, 'utf8');
	$select= "SELECT  d.id_dirmedico, d.nb_nombre,d.tx_callenumero,d.tx_colonia,d.tx_cp,d.tx_ciudadmunicipio,d.tx_estado,d.tx_direccion_formateada,d.st_visible,d.fh_creamod, X(d.tx_gps) as latitude, Y(d.tx_gps) as longitude, e.tx_descripcion 
				from tsrh_dirmedico as d join tsrh_catespecialidad as e on e.id_catespecialidad = d.tsrh_catespecialidad_id_catespecialidad where d.tx_estado = '$estado' and d.tx_ciudadmunicipio = '$municipio'  limit 0,30";
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
	    $count=1;
	    foreach ($res as $response) {
	    		
	    		if ($count%2 == 0){
	    			$row="<div class='row'>";
	    			$row1="</div>";
	    		}else{
	    			$row="";
	    			$row1="";
	    		}

	            echo ''.$row.'<div class="col-md-6">
						<div class="col-md-12" style="border: 4px solid #CCC;height: 253px;margin-bottom: 10px;padding: 25px;">
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
					</div>'.$row1.'';
					$count++;
	        }

	    }
}elseif ($estado!="Remover Filtro" && $municipio=="Remover Filtro" && $especialidad=="Remover Filtro" && $proveedor=="") {
	$conexion=mysqli_connect("173.194.254.4","admin","admin")or die ("no se pudo conectar con la base de datos");
	mysqli_select_db($conexion,"suiterrhhdb") or die("No se encuentra la base de datos solicitada2");
	mysqli_set_charset($conexion, 'utf8');
	$select= "SELECT  d.id_dirmedico, d.nb_nombre,d.tx_callenumero,d.tx_colonia,d.tx_cp,d.tx_ciudadmunicipio,d.tx_estado,d.tx_direccion_formateada,d.st_visible,d.fh_creamod, X(d.tx_gps) as latitude, Y(d.tx_gps) as longitude, e.tx_descripcion 
				from tsrh_dirmedico as d join tsrh_catespecialidad as e on e.id_catespecialidad = d.tsrh_catespecialidad_id_catespecialidad where d.tx_estado = '$estado'  limit 0,30";
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
	    $count=1;
	    foreach ($res as $response) {
	    		
	    		if ($count%2 == 0){
	    			$row="<div class='row'>";
	    			$row1="</div>";
	    		}else{
	    			$row="";
	    			$row1="";
	    		}

	            echo ''.$row.'<div class="col-md-6">
						<div class="col-md-12" style="border: 4px solid #CCC;height: 253px;margin-bottom: 10px;padding: 25px;">
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
					</div>'.$row1.'';
					$count++;
	        }

	    }
}elseif ($estado!="Remover Filtro" && $municipio=="Remover Filtro" && $especialidad!="Remover Filtro" && $proveedor=="") {
	$conexion=mysqli_connect("173.194.254.4","admin","admin")or die ("no se pudo conectar con la base de datos");
	mysqli_select_db($conexion,"suiterrhhdb") or die("No se encuentra la base de datos solicitada2");
	mysqli_set_charset($conexion, 'utf8');
	$select= "SELECT  d.id_dirmedico, d.nb_nombre,d.tx_callenumero,d.tx_colonia,d.tx_cp,d.tx_ciudadmunicipio,d.tx_estado,d.tx_direccion_formateada,d.st_visible,d.fh_creamod, X(d.tx_gps) as latitude, Y(d.tx_gps) as longitude, e.tx_descripcion 
				from tsrh_dirmedico as d join tsrh_catespecialidad as e on e.id_catespecialidad = d.tsrh_catespecialidad_id_catespecialidad where d.tx_estado = '$estado' and e.tx_descripcion = '$especialidad' limit 0,30";
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
	    $count=1;
	    foreach ($res as $response) {
	    		
	    		if ($count%2 == 0){
	    			$row="<div class='row'>";
	    			$row1="</div>";
	    		}else{
	    			$row="";
	    			$row1="";
	    		}

	            echo ''.$row.'<div class="col-md-6">
						<div class="col-md-12" style="border: 4px solid #CCC;height: 253px;margin-bottom: 10px;padding: 25px;">
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
					</div>'.$row1.'';
					$count++;
	        }

	    }
}elseif ($estado!="Remover Filtro" && $municipio=="Remover Filtro" && $especialidad=="Remover Filtro" && $proveedor!="") {
	$conexion=mysqli_connect("173.194.254.4","admin","admin")or die ("no se pudo conectar con la base de datos");
	mysqli_select_db($conexion,"suiterrhhdb") or die("No se encuentra la base de datos solicitada2");
	mysqli_set_charset($conexion, 'utf8');
	$select= "SELECT  d.id_dirmedico, d.nb_nombre,d.tx_callenumero,d.tx_colonia,d.tx_cp,d.tx_ciudadmunicipio,d.tx_estado,d.tx_direccion_formateada,d.st_visible,d.fh_creamod, X(d.tx_gps) as latitude, Y(d.tx_gps) as longitude, e.tx_descripcion 
				from tsrh_dirmedico as d join tsrh_catespecialidad as e on e.id_catespecialidad = d.tsrh_catespecialidad_id_catespecialidad where d.tx_estado = '$estado' and (( d.nb_nombre like '%".$proveedor."%') or ( e.tx_descripcion like '%".$proveedor."%')) limit 0,30";
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
	    $count=1;
	    foreach ($res as $response) {
	    		
	    		if ($count%2 == 0){
	    			$row="<div class='row'>";
	    			$row1="</div>";
	    		}else{
	    			$row="";
	    			$row1="";
	    		}

	            echo ''.$row.'<div class="col-md-6">
						<div class="col-md-12" style="border: 4px solid #CCC;height: 253px;margin-bottom: 10px;padding: 25px;">
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
					</div>'.$row1.'';
					$count++;
	        }

	    }
}elseif ($estado=="Remover Filtro" && $municipio=="Remover Filtro" && $especialidad!="Remover Filtro" && $proveedor!="") {
	$conexion=mysqli_connect("173.194.254.4","admin","admin")or die ("no se pudo conectar con la base de datos");
	mysqli_select_db($conexion,"suiterrhhdb") or die("No se encuentra la base de datos solicitada2");
	mysqli_set_charset($conexion, 'utf8');
	$select= "SELECT  d.id_dirmedico, d.nb_nombre,d.tx_callenumero,d.tx_colonia,d.tx_cp,d.tx_ciudadmunicipio,d.tx_estado,d.tx_direccion_formateada,d.st_visible,d.fh_creamod, X(d.tx_gps) as latitude, Y(d.tx_gps) as longitude, e.tx_descripcion 
				from tsrh_dirmedico as d join tsrh_catespecialidad as e on e.id_catespecialidad = d.tsrh_catespecialidad_id_catespecialidad where e.tx_descripcion = '$especialidad' and (( d.nb_nombre like '%".$proveedor."%') or ( e.tx_descripcion like '%".$proveedor."%')) limit 0,30";
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
	    $count=1;
	    foreach ($res as $response) {
	    		
	    		if ($count%2 == 0){
	    			$row="<div class='row'>";
	    			$row1="</div>";
	    		}else{
	    			$row="";
	    			$row1="";
	    		}

	            echo ''.$row.'<div class="col-md-6">
						<div class="col-md-12" style="border: 4px solid #CCC;height: 253px;margin-bottom: 10px;padding: 25px;">
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
					</div>'.$row1.'';
					$count++;
	        }

	    }
}elseif ($estado=="Remover Filtro" && $municipio=="Remover Filtro" && $especialidad!="Remover Filtro" && $proveedor=="") {
	$conexion=mysqli_connect("173.194.254.4","admin","admin")or die ("no se pudo conectar con la base de datos");
	mysqli_select_db($conexion,"suiterrhhdb") or die("No se encuentra la base de datos solicitada2");
	mysqli_set_charset($conexion, 'utf8');
	$select= "SELECT  d.id_dirmedico, d.nb_nombre,d.tx_callenumero,d.tx_colonia,d.tx_cp,d.tx_ciudadmunicipio,d.tx_estado,d.tx_direccion_formateada,d.st_visible,d.fh_creamod, X(d.tx_gps) as latitude, Y(d.tx_gps) as longitude, e.tx_descripcion 
				from tsrh_dirmedico as d join tsrh_catespecialidad as e on e.id_catespecialidad = d.tsrh_catespecialidad_id_catespecialidad where e.tx_descripcion = '$especialidad'  limit 0,30";
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
	    $count=1;
	    foreach ($res as $response) {
	    		
	    		if ($count%2 == 0){
	    			$row="<div class='row'>";
	    			$row1="</div>";
	    		}else{
	    			$row="";
	    			$row1="";
	    		}

	            echo ''.$row.'<div class="col-md-6">
						<div class="col-md-12" style="border: 4px solid #CCC;height: 253px;margin-bottom: 10px;padding: 25px;">
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
					</div>'.$row1.'';
					$count++;
	        }

	    }
}else{
	$conexion=mysqli_connect("173.194.254.4","admin","admin")or die ("no se pudo conectar con la base de datos");
	mysqli_select_db($conexion,"suiterrhhdb") or die("No se encuentra la base de datos solicitada2");
	mysqli_set_charset($conexion, 'utf8');
	$select= "SELECT  d.id_dirmedico, d.nb_nombre,d.tx_callenumero,d.tx_colonia,d.tx_cp,d.tx_ciudadmunicipio,d.tx_estado,d.tx_direccion_formateada,d.st_visible,d.fh_creamod, X(d.tx_gps) as latitude, Y(d.tx_gps) as longitude, e.tx_descripcion 
				from tsrh_dirmedico as d join tsrh_catespecialidad as e on e.id_catespecialidad = d.tsrh_catespecialidad_id_catespecialidad limit 0,10";
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
						<div class="col-md-12" style="border: 4px solid #CCC;height: 253px;margin-bottom: 10px;padding: 25px;">
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
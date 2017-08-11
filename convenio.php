<?php 



  $post=(object)$_POST;

  $region=$post->region;
  $categoria=$post->categoria;
  $keyword=$post->keyword;
  $reg=$post->nomRe;
  $cat=$post->nomCa;

if($keyword==""){//sin palabra clave

$conexion=mysqli_connect("localhost","root","root")or die ("no se pudo conectar con la base de datos");
  mysqli_select_db($conexion,"bbva") or die("No se encuentra la base de datos solicitada2");
        mysqli_set_charset($con, 'utf8');

  $select= "SELECT id_categoria,nb_empresa,tx_descripcion,tx_porcentaje,id_region,tx_estado,tx_url, X(tx_gps) as latitude, Y(tx_gps) as longitud FROM tsrh_convenio WHERE id_region='$region' and id_categoria='$categoria' group by nb_empresa;";
  $res = mysqli_query($conexion,$select);

if (mysqli_num_rows($res) == 0) { // regreso sin valores
  echo '<div class="row" ng-show="nodata">
      <div class="col-md-12 text-center">
        <button class="btn btn-md btn-warning">
          <i class="glyphicon glyphicon-remove"></i> Sin resultados
        </button>
      </div>
    </div>';
}else{

  foreach ($res as $response) {//Dibujado de Filas
   echo '<div class="row " ng-repeat="row in resultados">

      <div class="col-md-2">
        <div class="row">
          <!-- ngIf: row.porcentaje --><div class="col-md-12 ng-scope" ng-if="row.porcentaje">
            <span class="onsale ng-binding" style="background:#F96566; color:#ffffff; padding:6px; float:left;">'.$response["tx_porcentaje"].'</span>
          </div><!-- end ngIf: row.porcentaje -->
          <div class="col-md-12 text-center">
            
            <span class="icon-result">
            
              <i class="fa fa-car ng-hide" aria-hidden="true" ng-show=""></i>
              
            </span>
            
          </div>
        </div>
      </div>
      
      <div class="col-md-10 enterprise-info">
        <div class="row">
          <div class="col-md-12">
            <h3><strong class="ng-binding">'.$response["nb_empresa"].'</strong></h3>
          </div>
          <div class="col-md-12 ng-binding">
            '.$response["tx_descripcion"].'
          </div>
          <div class="col-md-12">
            <h2 class="ng-binding">'.$response["tx_estado"].'</h2>
          </div>
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-6">
                <a class="btn btn-cyan" href="http://'.$response["tx_url"].'" target="_blank"> VER DETALLE </a>
                <a class="btn btn-cyan-dark" href="https://www.google.com/maps?ie=UTF8&amp;hq&amp;q='.$response["latitude"].','.$response["longitud"].'&amp;z=20" ng-show="19.4334022" target="_blank">
                  <i class="fa fa-map-o" aria-hidden="true"></i> UBICACIONES 
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-3">Región:   <span class="block-cyan ng-binding">'.$reg.'</span></div>
              <div class="col-md-3">Categoría: <span class="block-cyan ng-binding">'.$cat.'</span></div>
            </div>
          </div>
        </div>
      </div>

    </div>'
    ;
  }//foreach

}
}else{ //campo palabra clave
$conexion=mysqli_connect("localhost","root","root")or die ("no se pudo conectar con la base de datos");
  mysqli_select_db($conexion,"bbva") or die("No se encuentra la base de datos solicitada2");
        mysqli_set_charset($con, 'utf8');

  $select= "SELECT id_categoria,nb_empresa,tx_descripcion,tx_porcentaje,id_region,tx_estado,tx_url, X(tx_gps) as latitude, Y(tx_gps) as longitud FROM tsrh_convenio WHERE id_region='$region' and id_categoria='$categoria' and nb_empresa like '%$keyword%' or tx_descripcion like '%$keyword%' group by nb_empresa;";
  $res = mysqli_query($conexion,$select);

if (mysqli_num_rows($res) == 0) { // regreso sin valores
  echo '<div class="row" ng-show="nodata">
      <div class="col-md-12 text-center">
        <button class="btn btn-md btn-warning">
          <i class="glyphicon glyphicon-remove"></i> Sin resultados
        </button>
      </div>
    </div>';
}else{

  foreach ($res as $response) {//Dibujado de Filas
   echo '<div class="row " ng-repeat="row in resultados">

      <div class="col-md-2">
        <div class="row">
          <!-- ngIf: row.porcentaje --><div class="col-md-12 ng-scope" ng-if="row.porcentaje">
            <span class="onsale ng-binding" style="background:#F96566; color:#ffffff; padding:6px; float:left;">'.$response["tx_porcentaje"].'</span>
          </div><!-- end ngIf: row.porcentaje -->
          <div class="col-md-12 text-center">
            
            <span class="icon-result">
            
              <i class="fa fa-car ng-hide" aria-hidden="true" ng-show=""></i>
              
            </span>
            
          </div>
        </div>
      </div>
      
      <div class="col-md-10 enterprise-info">
        <div class="row">
          <div class="col-md-12">
            <h3><strong class="ng-binding">'.$response["nb_empresa"].'</strong></h3>
          </div>
          <div class="col-md-12 ng-binding">
            '.$response["tx_descripcion"].'
          </div>
          <div class="col-md-12">
            <h2 class="ng-binding">'.$response["tx_estado"].'</h2>
          </div>
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-6">
                <a class="btn btn-cyan" href="http://'.$response["tx_url"].'" target="_blank"> VER DETALLE </a>
                <a class="btn btn-cyan-dark" href="https://www.google.com/maps?ie=UTF8&amp;hq&amp;q='.$response["latitude"].','.$response["longitud"].'&amp;z=20" ng-show="19.4334022" target="_blank">
                  <i class="fa fa-map-o" aria-hidden="true"></i> UBICACIONES 
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-3">Región:   <span class="block-cyan ng-binding">'.$reg.'</span></div>
              <div class="col-md-3">Categoría: <span class="block-cyan ng-binding">'.$cat.'</span></div>
            </div>
          </div>
        </div>
      </div>

    </div>'
    ;
  }//foreach

}


}


 ?>⁠⁠⁠⁠
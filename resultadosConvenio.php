<?php 

  $post=(object)$_POST;

  $region=$post->region;
  $categoria=$post->categoria;
  $kw=$post->keyword;
  $keyword=str_replace(' ','%',$kw);
  $http='href="http://';//Activa o desactiva la funcion de Ver Detalles
 
//Se abre una conexion
$conexion=mysqli_connect("173.194.254.4","admin","admin")or die ("no se pudo conectar con la base de datos");
  mysqli_select_db($conexion,"suiterrhhdb") or die("No se encuentra la base de datos solicitada2");
        mysqli_set_charset($conexion, 'utf8');


if($keyword!="" && $categoria!="" && $region!=""){//palabra clave vacia
  
    $select= "SELECT c.id_categoria,c.nb_empresa,c.tx_descripcion,c.tx_porcentaje,c.id_region,c.tx_estado,c.tx_url, X(c.tx_gps) as latitude, Y(c.tx_gps) as longitud, r.nb_region as region, p.nb_categoria as categoria FROM tsrh_convenio c, tsrh_regiones r,tsrh_catpromos p WHERE (c.id_region=r.id_region and c.id_categoria=p.id_categoria) and  c.id_region='$region' and c.id_categoria='$categoria' and ((c.nb_empresa like '%".$keyword."%') or (c.tx_descripcion like '%".$keyword."%')) group by c.nb_empresa;";
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
      $count=1;
      foreach ($res as $response) {
        if ($count%2 == 0){
                    $row="<div class='row' style='margin-bottom: 30px'>";
                    $row1="</div>";
                  }else{
                    $row="";
                    $row1="";
                  }
      if ($url=="NO APLICA") {$url="";$det="SIN DETALLES";$http="";}else{$det="VER DETALLES";$http='href="http://';}//Valida URL
    $icono=seleccionIcono($response["id_categoria"]);
    echo ''.$row.'<div class="col-md-6">
              <div class="col-md-4" style="padding-right: 0;padding-left: 0;">
                <div class="col-md-12 ng-scope" ng-if="row.porcentaje">
                  <span class="onsale ng-binding" style="background:#F96566; color:#ffffff; padding:6px; float:left;">Precios Especiales desde '.$response["tx_porcentaje"].'</span>
                </div>
                <div class="col-md-12 text-center">
                  <span class="icon-result">
                    <i class="'.$icono.' ng-hide" aria-hidden="true" ng-show=""></i>
                  </span>
                </div>
              </div>        
              <div class="col-md-8 enterprise-info">
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
                  <div class="col-md-6">
                    <a class="btn btn-cyan" '.$http.$url.'" target="_blank">'.$det.'</a>
                  </div>
                  <div class="col-md-6">
                    <a class="btn btn-cyan-dark" href="https://www.google.com/maps?ie=UTF8&amp;hq&amp;q='.$response["latitude"].','.$response["longitud"].'&amp;z=20" ng-show="19.4334022" target="_blank">
                    <i class="fa fa-map-o" aria-hidden="true"></i> UBICACIONES </a>
                  </div>
                </div>
                
                <div class="col-md-12">
                  <div class="col-md-6">Región:
                    <span class="block-cyan ng-binding">'.$response["region"].'</span>
                  </div>
                  <div class="col-md-6">Categoría:
                    <span class="block-cyan ng-binding">'.$response["categoria"].'</span>
                  </div>
                </div>
              </div>
          </div>'.$row1.''
        
    ;
    $count++;
  }//foreach
  
    }

}elseif($keyword=="" && $categoria!="" && $region!=""){ //Solo campo clave

  $select= "SELECT c.id_categoria,c.nb_empresa,c.tx_descripcion,c.tx_porcentaje,c.id_region,c.tx_estado,c.tx_url, X(c.tx_gps) as latitude, Y(c.tx_gps) as longitud, r.nb_region as region, p.nb_categoria as categoria FROM tsrh_convenio c, tsrh_regiones r,tsrh_catpromos p WHERE (c.id_region=r.id_region and c.id_categoria=p.id_categoria) and c.id_region='$region' and c.id_categoria='$categoria' group by c.nb_empresa;";
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
      $count=1;
      foreach ($res as $response) {
        if ($count%2 == 0){
                    $row="<div class='row' style='margin-bottom: 30px'>";
                    $row1="</div>";
                  }else{
                    $row="";
                    $row1="";
                  }
      if ($url=="NO APLICA") {$url="";$det="SIN DETALLES";$http="";}else{$det="VER DETALLES";$http='href="http://';}//Valida URL
      $icono=seleccionIcono($response["id_categoria"]);

    echo ''.$row.'<div class="col-md-6">
              <div class="col-md-4" style="padding-right: 0;padding-left: 0;">
                <div class="col-md-12 ng-scope" ng-if="row.porcentaje">
                  <span class="onsale ng-binding" style="background:#F96566; color:#ffffff; padding:6px; float:left;">Precios Especiales desde '.$response["tx_porcentaje"].'</span>
                </div>
                <div class="col-md-12 text-center">
                  <span class="icon-result">
                    <i class="'.$icono.' ng-hide" aria-hidden="true" ng-show=""></i>
                  </span>
                </div>
              </div>        
              <div class="col-md-8 enterprise-info">
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
                  <div class="col-md-6">
                    <a class="btn btn-cyan" '.$http.$url.'" target="_blank">'.$det.'</a>
                  </div>
                  <div class="col-md-6">
                    <a class="btn btn-cyan-dark" href="https://www.google.com/maps?ie=UTF8&amp;hq&amp;q='.$response["latitude"].','.$response["longitud"].'&amp;z=20" ng-show="19.4334022" target="_blank">
                    <i class="fa fa-map-o" aria-hidden="true"></i> UBICACIONES </a>
                  </div>
                </div>
                
                <div class="col-md-12">
                  <div class="col-md-6">Región:
                    <span class="block-cyan ng-binding">'.$response["region"].'</span>
                  </div>
                  <div class="col-md-6">Categoría:
                    <span class="block-cyan ng-binding">'.$response["categoria"].'</span>
                  </div>
                </div>
              </div>
          </div>'.$row1.''
        
    ;
    $count++;
  }//foreach
  
    }


}elseif($keyword!="" && $categoria=="" && $region!=""){ //Solo campo clave

  $select= "SELECT c.id_categoria,c.nb_empresa,c.tx_descripcion,c.tx_porcentaje,c.id_region,c.tx_estado,c.tx_url, X(c.tx_gps) as latitude, Y(c.tx_gps) as longitud, r.nb_region as region, p.nb_categoria as categoria FROM tsrh_convenio c, tsrh_regiones r,tsrh_catpromos p WHERE c.id_region=r.id_region and c.id_categoria=p.id_categoria and c.id_region='$region' and ((c.nb_empresa like '%".$keyword."%') or (c.tx_descripcion like '%".$keyword."%')) group by c.nb_empresa;";
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
      $count=1;
      foreach ($res as $response) {
        if ($count%2 == 0){
                    $row="<div class='row' style='margin-bottom: 30px'>";
                    $row1="</div>";
                  }else{
                    $row="";
                    $row1="";
                  }
                  echo $row;
      if ($url=="NO APLICA") {$url="";$det="SIN DETALLES";$http="";}else{$det="VER DETALLES";$http='href="http://';}//Valida URL
        $icono=seleccionIcono($response["id_categoria"]);

    echo ''.$row.'<div class="col-md-6">
              <div class="col-md-4" style="padding-right: 0;padding-left: 0;">
                <div class="col-md-12 ng-scope" ng-if="row.porcentaje">
                  <span class="onsale ng-binding" style="background:#F96566; color:#ffffff; padding:6px; float:left;">Precios Especiales desde '.$response["tx_porcentaje"].'</span>
                </div>
                <div class="col-md-12 text-center">
                  <span class="icon-result">
                    <i class="'.$icono.' ng-hide" aria-hidden="true" ng-show=""></i>
                  </span>
                </div>
              </div>        
              <div class="col-md-8 enterprise-info">
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
                  <div class="col-md-6">
                    <a class="btn btn-cyan" '.$http.$url.'" target="_blank">'.$det.'</a>
                  </div>
                  <div class="col-md-6">
                    <a class="btn btn-cyan-dark" href="https://www.google.com/maps?ie=UTF8&amp;hq&amp;q='.$response["latitude"].','.$response["longitud"].'&amp;z=20" ng-show="19.4334022" target="_blank">
                    <i class="fa fa-map-o" aria-hidden="true"></i> UBICACIONES </a>
                  </div>
                </div>
                
                <div class="col-md-12">
                  <div class="col-md-6">Región:
                    <span class="block-cyan ng-binding">'.$response["region"].'</span>
                  </div>
                  <div class="col-md-6">Categoría:
                    <span class="block-cyan ng-binding">'.$response["categoria"].'</span>
                  </div>
                </div>
              </div>
          </div>'.$row1.''
        
    ;
    $count++;
  }//foreach
  
    }



}elseif($keyword!="" && $categoria!="" && $region==""){ //Solo campo clave
    $select= "SELECT c.id_categoria,c.nb_empresa,c.tx_descripcion,c.tx_porcentaje,c.id_region,c.tx_estado,c.tx_url, X(c.tx_gps) as latitude, Y(c.tx_gps) as longitud, r.nb_region as region, p.nb_categoria as categoria FROM tsrh_convenio c, tsrh_regiones r,tsrh_catpromos p WHERE (c.id_region=r.id_region and c.id_categoria=p.id_categoria) and  c.id_categoria='$categoria' and ((c.nb_empresa like '%".$keyword."%') or (c.tx_descripcion like '%".$keyword."%')) group by c.nb_empresa;";
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
      $count=1;
      foreach ($res as $response) {
        if ($count%2 == 0){
                    $row="<div class='row' style='margin-bottom: 30px'>";
                    $row1="</div>";
                  }else{
                    $row="";
                    $row1="";
                  }
      if ($url=="NO APLICA") {$url="";$det="SIN DETALLES";$http="";}else{$det="VER DETALLES";$http='href="http://';}//Valida URL
        $icono=seleccionIcono($response["id_categoria"]);

    echo ''.$row.'<div class="col-md-6">
              <div class="col-md-4" style="padding-right: 0;padding-left: 0;">
                <div class="col-md-12 ng-scope" ng-if="row.porcentaje">
                  <span class="onsale ng-binding" style="background:#F96566; color:#ffffff; padding:6px; float:left;">Precios Especiales desde '.$response["tx_porcentaje"].'</span>
                </div>
                <div class="col-md-12 text-center">
                  <span class="icon-result">
                    <i class="'.$icono.' ng-hide" aria-hidden="true" ng-show=""></i>
                  </span>
                </div>
              </div>        
              <div class="col-md-8 enterprise-info">
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
                  <div class="col-md-6">
                    <a class="btn btn-cyan" '.$http.$url.'" target="_blank">'.$det.'</a>
                  </div>
                  <div class="col-md-6">
                    <a class="btn btn-cyan-dark" href="https://www.google.com/maps?ie=UTF8&amp;hq&amp;q='.$response["latitude"].','.$response["longitud"].'&amp;z=20" ng-show="19.4334022" target="_blank">
                    <i class="fa fa-map-o" aria-hidden="true"></i> UBICACIONES </a>
                  </div>
                </div>
                
                <div class="col-md-12">
                  <div class="col-md-6">Región:
                    <span class="block-cyan ng-binding">'.$response["region"].'</span>
                  </div>
                  <div class="col-md-6">Categoría:
                    <span class="block-cyan ng-binding">'.$response["categoria"].'</span>
                  </div>
                </div>
              </div>
          </div>'.$row1.''
        
    ;
    $count++;
  }//foreach
  
    }


}elseif($keyword=="" && $categoria!="" && $region==""){ //Solo campo clave

    $select= "SELECT c.id_categoria,c.nb_empresa,c.tx_descripcion,c.tx_porcentaje,c.id_region,c.tx_estado,c.tx_url, X(c.tx_gps) as latitude, Y(c.tx_gps) as longitud, r.nb_region as region, p.nb_categoria as categoria FROM tsrh_convenio c, tsrh_regiones r,tsrh_catpromos p WHERE (c.id_region=r.id_region and c.id_categoria=p.id_categoria) and c.id_categoria='$categoria' limit 0,30;";
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
      $count=1;
      foreach ($res as $response) {
        if ($count%2 == 0){
                    $row="<div class='row' style='margin-bottom: 30px'>";
                    $row1="</div>";
                  }else{
                    $row="";
                    $row1="";
                  }
      if ($url=="NO APLICA") {$url="";$det="SIN DETALLES";$http="";}else{$det="VER DETALLES";$http='href="http://';}//Valida URL
        $icono=seleccionIcono($response["id_categoria"]);

    echo ''.$row.'<div class="col-md-6">
              <div class="col-md-4" style="padding-right: 0;padding-left: 0;">
                <div class="col-md-12 ng-scope" ng-if="row.porcentaje">
                  <span class="onsale ng-binding" style="background:#F96566; color:#ffffff; padding:6px; float:left;">Precios Especiales desde '.$response["tx_porcentaje"].'</span>
                </div>
                <div class="col-md-12 text-center">
                  <span class="icon-result">
                    <i class="'.$icono.' ng-hide" aria-hidden="true" ng-show=""></i>
                  </span>
                </div>
              </div>        
              <div class="col-md-8 enterprise-info">
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
                  <div class="col-md-6">
                    <a class="btn btn-cyan" '.$http.$url.'" target="_blank">'.$det.'</a>
                  </div>
                  <div class="col-md-6">
                    <a class="btn btn-cyan-dark" href="https://www.google.com/maps?ie=UTF8&amp;hq&amp;q='.$response["latitude"].','.$response["longitud"].'&amp;z=20" ng-show="19.4334022" target="_blank">
                    <i class="fa fa-map-o" aria-hidden="true"></i> UBICACIONES </a>
                  </div>
                </div>
                
                <div class="col-md-12">
                  <div class="col-md-6">Región:
                    <span class="block-cyan ng-binding">'.$response["region"].'</span>
                  </div>
                  <div class="col-md-6">Categoría:
                    <span class="block-cyan ng-binding">'.$response["categoria"].'</span>
                  </div>
                </div>
              </div>
          </div>'.$row1.''
        
    ;
    $count++;
  }//foreach
  
    }


}elseif($keyword=="" && $categoria=="" && $region!=""){ //Solo campo clave

    $select= "SELECT c.id_categoria,c.nb_empresa,c.tx_descripcion,c.tx_porcentaje,c.id_region,c.tx_estado,c.tx_url, X(c.tx_gps) as latitude, Y(c.tx_gps) as longitud, r.nb_region as region, p.nb_categoria as categoria FROM tsrh_convenio c, tsrh_regiones r,tsrh_catpromos p WHERE (c.id_region=r.id_region and c.id_categoria=p.id_categoria) and  c.id_region='$region' limit 0,30;";
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
      $count=1;
      foreach ($res as $response) {
        if ($count%2 == 0){
                    $row="<div class='row' style='margin-bottom: 30px'>";
                    $row1="</div>";
                  }else{
                    $row="";
                    $row1="";
                  }
      if ($url=="NO APLICA") {$url="";$det="SIN DETALLES";$http="";}else{$det="VER DETALLES";$http='href="http://';}//Valida URL
        $icono=seleccionIcono($response["id_categoria"]);

    echo ''.$row.'<div class="col-md-6">
              <div class="col-md-4" style="padding-right: 0;padding-left: 0;">
                <div class="col-md-12 ng-scope" ng-if="row.porcentaje">
                  <span class="onsale ng-binding" style="background:#F96566; color:#ffffff; padding:6px; float:left;">Precios Especiales desde '.$response["tx_porcentaje"].'</span>
                </div>
                <div class="col-md-12 text-center">
                  <span class="icon-result">
                    <i class="'.$icono.' ng-hide" aria-hidden="true" ng-show=""></i>
                  </span>
                </div>
              </div>        
              <div class="col-md-8 enterprise-info">
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
                  <div class="col-md-6">
                    <a class="btn btn-cyan" '.$http.$url.'" target="_blank">'.$det.'</a>
                  </div>
                  <div class="col-md-6">
                    <a class="btn btn-cyan-dark" href="https://www.google.com/maps?ie=UTF8&amp;hq&amp;q='.$response["latitude"].','.$response["longitud"].'&amp;z=20" ng-show="19.4334022" target="_blank">
                    <i class="fa fa-map-o" aria-hidden="true"></i> UBICACIONES </a>
                  </div>
                </div>
                
                <div class="col-md-12">
                  <div class="col-md-6">Región:
                    <span class="block-cyan ng-binding">'.$response["region"].'</span>
                  </div>
                  <div class="col-md-6">Categoría:
                    <span class="block-cyan ng-binding">'.$response["categoria"].'</span>
                  </div>
                </div>
              </div>
          </div>'.$row1.''
        
    ;
    $count++;
  }//foreach
  
    }


}elseif($keyword!="" && $categoria=="" && $region==""){ //Solo campo clave
    $select= "SELECT c.id_categoria,c.nb_empresa,c.tx_descripcion,c.tx_porcentaje,c.id_region,c.tx_estado,c.tx_url, X(c.tx_gps) as latitude, Y(c.tx_gps) as longitud, r.nb_region as region, p.nb_categoria as categoria FROM tsrh_convenio c, tsrh_regiones r,tsrh_catpromos p WHERE (c.id_region=r.id_region and c.id_categoria=p.id_categoria) and ((c.nb_empresa like '%".$keyword."%') or (c.tx_descripcion like '%".$keyword."%')) group by c.nb_empresa limit 0,30;";
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
      $count=1;
      foreach ($res as $response) {
        if ($count%2 == 0){
                    $row="<div class='row' style='margin-bottom: 30px'>";
                    $row1="</div>";
                  }else{
                    $row="";
                    $row1="";
                  }
      if ($url=="NO APLICA") {$url="";$det="SIN DETALLES";$http="";}else{$det="VER DETALLES";$http='href="http://';}//Valida URL
        $icono=seleccionIcono($response["id_categoria"]);

    echo ''.$row.'<div class="col-md-6">
              <div class="col-md-4" style="padding-right: 0;padding-left: 0;">
                <div class="col-md-12 ng-scope" ng-if="row.porcentaje">
                  <span class="onsale ng-binding" style="background:#F96566; color:#ffffff; padding:6px; float:left;">Precios Especiales desde '.$response["tx_porcentaje"].'</span>
                </div>
                <div class="col-md-12 text-center">
                  <span class="icon-result">
                    <i class="'.$icono.' ng-hide" aria-hidden="true" ng-show=""></i>
                  </span>
                </div>
              </div>        
              <div class="col-md-8 enterprise-info">
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
                  <div class="col-md-6">
                    <a class="btn btn-cyan" '.$http.$url.'" target="_blank">'.$det.'</a>
                  </div>
                  <div class="col-md-6">
                    <a class="btn btn-cyan-dark" href="https://www.google.com/maps?ie=UTF8&amp;hq&amp;q='.$response["latitude"].','.$response["longitud"].'&amp;z=20" ng-show="19.4334022" target="_blank">
                    <i class="fa fa-map-o" aria-hidden="true"></i> UBICACIONES </a>
                  </div>
                </div>
                
                <div class="col-md-12">
                  <div class="col-md-6">Región:
                    <span class="block-cyan ng-binding">'.$response["region"].'</span>
                  </div>
                  <div class="col-md-6">Categoría:
                    <span class="block-cyan ng-binding">'.$response["categoria"].'</span>
                  </div>
                </div>
              </div>
          </div>'.$row1.''
        
    ;
     $count++;
  }//foreach
 
    }


}else{ //campo palabra clave+combo
echo '<div class="row" ng-show="nodata">
      <div class="col-md-12 text-center">
        <button class="btn btn-md btn-warning">
          <i class="glyphicon glyphicon-remove"></i> Sin resultados
        </button>
      </div>
    </div>';


}
//Seleccion de icono
function seleccionIcono($idCat){
switch ($idCat) {
    case 'cp1':
        return 'fa fa-car';
        break;
    case 'cp2':
    return 'fa fa-female';
        break;
    case 'cp3':
       return 'fa fa-ticket';
        break;
    case 'cp4':
       return 'fa fa-university';
        break;
    case 'cp5':
       return 'fa fa-bookmark-o';
        break;
    case 'cp6':
       return 'fa fa-bicycle';
        break;
    case 'cp7':
       return 'fa fa-home';
        break;
    case 'cp8':
       return 'fa fa-book';
        break;
    case 'cp9':
        return 'fa fa-desktop';
        break;
    case 'cp10':
    return 'fa fa-gift';
        break;
    case 'cp11':
       return 'fa fa-cutlery';
        break;
    case 'cp12':
       return 'fa fa-suitcase';
        break;
    case 'cp13':
       return 'fa fa-user-md';
        break;
    case 'cp14':
       return 'fa fa-shopping-bag';
        break;
    case 'cp15':
       return 'fa fa-bullseye';
        break;
    case 'cp16':
       return 'fa fa-plane';
        break;
    
}
}
mysqli_close($conexion);

 ?>
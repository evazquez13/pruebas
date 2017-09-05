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
  $profile = new stdClass();
  $profile->gid = $me["Correo"];
  $profile->gen = $me["gender"];
  $profile->nam = $me["displayName"];
  // $profile->email = $me['emails'][0]['value'];
  $profile->email="emmanuel.vazquez.bravo.contractor@bbva.com"; 
  $_SESSION["profile"] = $profile;
  //$profile = (object)$_SESSION["profile"];
  $esp= especialidad();
  $dir= directorioMedico();
   
 ?>
 
 <body>
    <div class="container-wrap" style="opacity: 1; margin-bottom: 317px; min-height: 72px;">  
      <ui-view></ui-view>
      <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Directorio Médico</a></li>
          </ol>
        </div>
      </div>
      <div class="row">
      <form method="POST" action="">
          <!-- Filter menu -->
          <div class="col-md-2">
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-default">
                  <div class="panel-heading"><strong>Filtro por Estado</strong></div>
                  <div class="panel-body">
                    <select name="estado" id="estado" onchange="estados(this.form); directorio(this.form);" class="medico-select form-control ng-pristine ng-invalid" >
                      <option value="">Remover Filtro</option>
                      <option value="AGUASCALIENTES">AGUASCALIENTES</option>
                      <option value="BAJA CALIFORNIA">BAJA CALIFORNIA</option>
                      <option value="BAJA CALIFORNIA SUR">BAJA CALIFORNIA SUR</option>
                      <option value="CAMPECHE">CAMPECHE</option>
                      <option value="CDMX">CDMX</option>
                      <option value="CHIAPAS">CHIAPAS</option>
                      <option value="CHIHUAHUA">CHIHUAHUA</option>
                      <option value="COAHUILA">COAHUILA</option>
                      <option value="COLIMA">COLIMA</option>
                      <option value="DURANGO">DURANGO</option>
                      <option value="ESTADO DE MEXICO">ESTADO DE MEXICO</option>
                      <option value="GUANAJUATO">GUANAJUATO</option>
                      <option value="GUERRERO">GUERRERO</option>
                      <option value="HIDALGO">HIDALGO</option>
                      <option value="JALISCO">JALISCO</option>
                      <option value="MICHOACAN">MICHOACAN</option>
                      <option value="MORELOS">MORELOS</option>
                      <option value="NAYARIT">NNAYARIT</option>
                      <option value="NUEVO LEON">NUEVO LEON</option>
                      <option value="OAXACA">OAXACA</option>
                      <option value="PUEBLA">PUEBLA</option>
                      <option value="QUERETARO">QUERETARO</option>
                      <option value="QUINTANA ROO">QUINTANA ROO</option>
                      <option value="SAN LUIS POTOSI">SAN LUIS POTOSI</option>
                      <option value="SINALOA">SINALOA</option>
                      <option value="SONORA">SONORA</option>
                      <option value="TABASCO">TABASCO</option>
                      <option value="TAMAULIPAS">TAMAULIPAS</option>
                      <option value="TLAXCALA">TLAXCALA</option>
                      <option value="VERACRUZ">VERACRU</option>
                      <option value="YUCATAN">YUCATAN</option>
                      <option value="ZACATECAS">ZACATECAS</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>  
            
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-default">
                  <div class="panel-heading"><strong>Filtro por Municipio</strong></div>
                  <div class="panel-body">
                    <select class="medico-select form-control" onchange="directorio(this.form)" name="municipio" id="jmr_contacto_municipio">
                    <option>Remover Filtro</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-default">
                  <div class="panel-heading"><strong>Filtro por Especialidad</strong></div>
                  <div class="panel-body">
                    <select class="medico-select form-control" name="especialidad" id="especialidad" onchange="directorio(this.form)">
                      <option value="">Remover Filtro</option>
                      <?php while ($es=mysqli_fetch_array($esp)){
                            echo "<option value=".$es['id_catespecialidad'].">".$es['tx_descripcion']."</option>";
                            }
                          ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-default">
                  <div class="panel-heading"><strong>Filtro por Proveedor</strong></div>
                  <div class="panel-body">
                    <input type="text" name="proveedor" id="proveedor" onchange="directorio(this.form)" class="medico-input form-control">
                    <button type="button" class="btn btn-sm btn-primary" onclick="directorio(this.form)">Filtrar</button>
                  </div>
                </div>
              </div>
            </div>
      </form>
      </div>
      <div class="col-md-10" id="resultado">
        <?php
          if (mysqli_num_rows($dir) == 0) { // regreso sin valores
              echo '<div class="row" ng-show="nodata">
                  <div class="col-md-12 text-center">
                    <button class="btn btn-md btn-warning">
                      <i class="glyphicon glyphicon-remove"></i> Sin resultados
                    </button>
                  </div>
                </div>';
            }else{ 
          foreach ($dir as $response) {
            echo '<div class="col-md-6">
            <div class="col-md-12" style="border: 4px solid #CCC;height: 260px;margin-bottom: 10px;padding:25px;">
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
         ?>
    </div>
    </div>
    </div>
    

    
 </body>
 
<script type ="text/javascript">

function estados(frm){
  $estado = frm.estado.value;

  $.ajax( {
          type: 'POST',
          data: {
            estado: $estado

          },
          url: '/pruebas/wp-content/themes/pruebas/municipio.php',
          success: function(data){
            $("#jmr_contacto_municipio").empty();
            $("#jmr_contacto_municipio").append(data);
          },
          error: function(xhr){
            console.log("error1");
          }
        });
  document.getElementById('jmr_contacto_municipio').options.selectedIndex = 0;
}

function directorio(frm){
  $estado = $("#estado option:selected").text();
  $municipio= frm.municipio.value;
  $especialidad = $("#especialidad option:selected").text();
  $proveedor = frm.proveedor.value;

  
  $("#resultado").empty();
  $("#resultado").append('<div class="row text-center" ng-show="isActive"><button class="btn btn-lg btn-info"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Filtrando contenido ...</button></div>');

  $.ajax( {
          type: 'POST',
          data: {
            estado: $estado,
            municipio: $municipio,
            especialidad: $especialidad,
            correoUser: "<?php echo $profile->email ?>",
            proveedor: $proveedor
          },
          url: '/pruebas/wp-content/themes/pruebas/directorio.php',
          success: function(data){
            $("#resultado").empty();
            $("#resultado").append(data);
          },
          error: function(xhr){
            console.log("error1");
          }
        });
}
</script>⁠⁠⁠⁠

<?php get_footer();?>
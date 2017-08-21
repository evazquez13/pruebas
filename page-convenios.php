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
    $co = region();
    $co1 = promo();
    ?>
  
<div class="container-wrap" style="background-image: url(http://appengine.us/wp-content/themes/salient/img/convenios.jpg); background-repeat: no-repeat; background-size: 1373px 673px; opacity: 1; margin-bottom: 317px; min-height: 133px;"> 
  <ui-view></ui-view>

  <div class="heading__hero_convenio loaded"></div>
    <div class="container">
    <div class="row">
      <div class="col-md-12 text-center" style="margin-top: 175px;">
          
            <span style="background: #000000;opacity: 0.8;color: white;font-size: 60px;"> Convenios </span>
            <div id="conv" class="col-md-12 text-left">
                
            <h2 class="sub-header-convenios" style="color: #fff">
              <span style="background: #000000;opacity: 0.8;color: white;font-size: 23px;"> Aquí encontrarás información <br>
                         de Convenios con proveedores <br> 
                         que te brindan beneficios por <br>
                         ser parte de BBVA Bancomer </span>
              </h2>
        
          </div>
      </div>
    </div>
        
        <form method="POST">

          <div class="row form-content">          
              <div class="col-md-4">
                <select name="reg" onchange="go(this.form)" class="input-promos form-control" >
                  <option value="" selected="selected"> Seleccionar una Región</option>
                   <?php while ($reg=mysqli_fetch_array($co)){
                    echo "<option value=".$reg['id_region'].">".$reg['nb_region']."</option>";
                    }
                  ?>
              </select>
              </div>
    
              <div class="col-md-4">  
                  <select  name="cat" onchange="go(this.form)" class="input-promos form-control" >
                  <option value="" selected="selected"> Seleccionar una Categoría</option>
                  <?php while ($cat=mysqli_fetch_array($co1)){
                    echo "<option value=".$cat['id_categoria'].">".$cat['nb_categoria']."</option>";
                    }
                  ?>
              </select>
              </div>
            
              <div class="col-md-4">
              <div class="input-group">
                    <input type="text" name="KeyID" class="input-promos form-control"  placeholder="Ingresa una palabra clave" style="background-color: white !important; color: #333; line-height: 0; margin: 0; padding: 13px !important;">
                <span class="input-group-addon" id="basic-addon2">
                  <button onclick="go(this.form)" type="button" class="ch-btn nav-search-submit">
                        <i class="nav-icon-search"><span></span></i>
                  </button>
                  <button onclick="limpia()" type="button" class="ch-btn nav-search-submit">
                        <i class="nav-icon-search"><span></span></i>
                  </button>
                </span>
              </div>
              </div>
              
          </div>

          </form>
    <div class="container" id="filtrar" style="margin-top: 25px"></div>
  </div>
    <div class="container" id="resultado" style="margin-top: 148px;"></div>
  </div>
		
<script type = "text/javascript">

function go(frm) {
  $reg = frm.reg.value;
  $cat = frm.cat.value;
  $kw = frm.KeyID.value;



    $("#resultado").empty();
    $("#filtrar").empty();
    $("#filtrar").append('<div class="row text-center" ng-show="isActive"><button class="btn btn-lg btn-info"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Filtrando contenido ...</button></div>');
  $.ajax( {
          type: 'POST',
          data: {
            region: $reg,
            categoria: $cat,
            keyword: $kw

          },
          url: '/pruebas/wp-content/themes/pruebas/resultadosConvenio.php',
          success: function(data){
            $("#filtrar").empty();
            $("#resultado").empty();
            $("#resultado").append(data);
            var scrollPos =  $("#resultado").position().top;
            $(window).scrollTop(scrollPos);
      
          },
          error: function(xhr){
            console.log("error1");
          }
        });

 
}

function limpia(){
  $("#resultado").empty();
}
</script>⁠⁠⁠⁠
<?php get_footer(); ?>

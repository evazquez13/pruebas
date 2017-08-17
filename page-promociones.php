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
    <div ng-controller="buscador">      
  <div style="background-image: url({{ siteurl }}/wp-content/themes/salient/img/PROMOCIONES_OK.jpg);" class=" heading__hero loaded"></div>
    <div class="container">

    <div class="row">
      <div class="col-md-12 text-center">
            <h1 class="header-promociones">Promociones</h1>
            <h2 class="sub-header-promociones">Queremos crecer contigo  y te ofrecemos estas promociones para ti y tu familia. ¡Disfrútalas!</h2>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12 nav-search-content">
        
        <form method="POST" action="">

          <div class="row form-content">          
              <div class="col-md-4">
                <select name="reg" id="regionID" onchange="go(this.form)" class="input-promos form-control" ng-init="regionID = options[0]">
                  <option value="" selected="selected"> Seleccionar una Región</option>
                   <?php while ($reg=mysqli_fetch_array($co)){
                    echo "<option value=".$reg['id_region'].">".$reg['nb_region']."</option>";
                    }
                  ?>
              </select>
              </div>
    
              <div class="col-md-4">  
                  <select name="cat" id="idCategoria" ng-model="catID" onchange="go(this.form)" class="input-promos form-control" ng-init="catID = options[0]">
                    <option value="" selected="selected"> Seleccionar una Categoría</option>
                    <?php while ($cat=mysqli_fetch_array($co1)){
                      echo "<option value=".$cat['id_categoria'].">".$cat['nb_categoria']."</option>";
                      }
                  ?>
              </select>
              </div>
            
              <div class="col-md-4">
                <div class="input-group">
                      <input type="text" name="KeyID" onchange="go(this.form)" class="input-promos form-control" ng-model="keyID" placeholder="Ingresa una palabra clave" style="background-color: white !important; color: #333; line-height: 0; margin: 0; padding: 13px !important;">
                    <span class="input-group-addon" id="basic-addon2">
                      <button type="button" class="ch-btn nav-search-submit" onclick="go(this.form)">
                            <i class="nav-icon-search"><span></span></i>
                      </button>
                    </span>
                </div>
              </div>
              
          </div>

          </form>
      </div>
    </div>
    <div class="row" id="resultado">
      
    </div>
  </div>
</div>
<script type = "text/javascript">

function go(frm) {
  $reg = frm.reg.value;
  $cat = frm.cat.value;
  $kw = frm.KeyID.value;
  $nomRegion = $("#regionID option:selected").text();
  $nomCat = $("#idCategoria option:selected").text();


  if ($reg !="" && $cat !="") {
    $.ajax( {
          type: 'POST',
          data: {
            region: $reg,
            categoria: $cat,
            keyword: $kw,
            nomRe: $nomRegion,
            nomCa: $nomCat
          },
          url: '/pruebas/wp-content/themes/pruebas/promocion.php',
          success: function(data){
            $("#resultado").empty();
            $("#resultado").append(data);
          },
          error: function(xhr){
            console.log("error");
          }
        });
  }

}

</script>⁠⁠⁠⁠

<?php get_footer();?>
<!DOCTYPE html>
<html>
<head>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html;charset=utf-8">
<title>Mapa de Google</title>
<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/styles.css">
<script type="text/javascript" src="<?= base_url()?>assets/js/script.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/jquery-1.9.1.js"></script>
<?php echo $map['js']; ?>
<script type="text/javascript">// <![CDATA[
  var geocoder;
  function codeAddress() {
    geocoder = new google.maps.Geocoder();
    var address = document.getElementById("address").value;
    if(address == ""){
        alert("Ingrese una dirección para continuar");
        document.getElementById('address').focus();
    }else{
      geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          map.setCenter(results[0].geometry.location);
          map.fitBounds(results[0].geometry.viewport);
          map.setZoom(14);
          document.getElementById('coordenada').value = results[0].geometry.location;
        } else {
          alert("No se encontró la dirección escrita : " + address);
        }
      });  
    }
  }
// ]]></script>
<script type="text/javascript">
    function getCoordenadas(){
        cerrarLightBox();
        $("#detailsco").show();
        $("#title").hide();
    }
    function cancelCoordenadas(){
        cerrarLightBox();
        $("#detailsco").hide();
        $("#title").show();
    }
    function postCoordenadas(){
        var coordenadas = $('#coordenada').val();
        if(coordenadas == ""){
            alert("Falta coordenadas");
            document.getElementById('coordenada').focus();
        }else{
            lightBox('main','nueva_incidencia',coordenadas);
            document.getElementById('coordenada').value = "";
            cancelCoordenadas();
        }
    }
</script>
</head>

<body onload="initialize();">
<div id="contenedor" style="width:100%; height:100%;">
   <div id="cabecera" class="cabecera">
       <div class="legend" style="overflow: hidden;float:left;">
           <img src="<?= base_url()?>assets/images/icon-alta.png" width="60" style="float:left;">
           <div class="t-legend" style="float:left;text-align: center; line-height: 15px;margin-top: 10px;margin-left: -5px;">
               <span style="font-size: 14px;">Peligrosidad Alta</span><br />
               <?php
                    $i = 0;
                    foreach ($alta as $row){
                        $i++;
                    }
               ?>
               <a href='<?= base_url()?>main/listIncidenciasById?iid=1'><span style="font-size: 12px;">(<?=$i?>)</span></a>
           </div>
           <img src="<?= base_url()?>assets/images/icon-media.png" width="60" style="float:left;">
           <div class="t-legend" style="float:left;text-align: center; line-height: 15px;margin-top: 10px;margin-left: -5px;">
               <span style="font-size: 14px;">Peligrosidad Media</span><br />
               <?php
                    $i = 0;
                    foreach ($media as $row){
                        $i++;
                    }
               ?>
               <a href='<?= base_url()?>main/listIncidenciasById?iid=2'><span style="font-size: 12px;">(<?=$i?>)</span></a>
           </div>
           <img src="<?= base_url()?>assets/images/icon-baja.png" width="60" style="float:left;">
           <div class="t-legend" style="float:left;text-align: center; line-height: 15px;margin-top: 10px;margin-left: -5px;">
               <span style="font-size: 14px;">Peligrosidad Baja</span><br />
               <?php
                    $i = 0;
                    foreach ($baja as $row){
                        $i++;
                    }
               ?>
               <a href='<?= base_url()?>main/listIncidenciasById?iid=3'><span style="font-size: 12px;">(<?=$i?>)</span></a>
           </div>
           <img src="<?= base_url()?>assets/images/icon-clear.png" width="60" style="float:left;">
           <div class="t-legend" style="float:left;text-align: center; line-height: 15px;margin-top: 10px;margin-left: -5px;">
               <span style="font-size: 14px;">Sin Peligrosidad</span><br />
               <?php
                    $i = 0;
                    foreach ($cero as $row){
                        $i++;
                    }
               ?>
               <a href='<?= base_url()?>main/listIncidenciasById?iid=4'><span style="font-size: 12px;">(<?=$i?>)</span></a>
           </div>
       </div>
       <div class="sep" style="width: 1px; background:  #969696;height: 50px;float:left;margin-left: 30px;"></div>
       <div class="detailsco" id="detailsco" style="margin-left: 10px; float:left;text-align: center;width: 600px;margin-top: 10px;display: none;">
           <form id="google" name="google" action="#" style="float: left;margin-left: 10px;">
            <label style="font-size: 12px;">Busqueda: </label>
            <input type="text" name="address" id="address" style="width: 130px;" required>
            <input type="button" id="pasar" value="Buscar" onclick="codeAddress()">
           </form>
           <label style="font-size: 12px;">Coordenadas: </label>
           <input type="text" name="coordenada" id="coordenada" style="width: 100px;">
           <input type="button" value="Agregar" onclick="postCoordenadas();">
           <input type="button" value="Cancelar" onclick="cancelCoordenadas();">
       </div>
       <div class="title" id="title" style="margin-left: 20px; float:left;text-align: center;width: 600px;">
           <img src="<?= base_url()?>assets/images/EscudoDeTrujilloPeru.png" width="40" style="float:left;margin-left: 70px;">
           <div class="t-title" style="float:left;margin-left: 20px;margin-top: 15px;">
               <span>SISTEMA DE GESTIÓN DE SEGURIDAD CIUDADANA</span>
           </div>
       </div>
   </div>
   <div id="lateral" class="lateral">
       <h4>OPCIONES MÚLTIPLES</h4>
       <input type="button" value="NUEVA INCIDENCIA" onclick="lightBox('<?= base_url()?>main','nueva_incidencia','');" class="option">
       <input type="button" value="PÁGINA PRINCIPAL" onclick="javascript: window.location.href = '<?= base_url()?>'" class="option">
   </div>
   <div id="map" class="map"><?php echo $map['html']; ?></div>
</div>
    
</body>
</html>
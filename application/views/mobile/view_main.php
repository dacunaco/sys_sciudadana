<!DOCTYPE html> 
<html> 
    <head> 
        <meta charset="utf-8">
        <meta name=viewport content="user-scalable=no,width=device-width" />
        <link rel=stylesheet href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.css" />
        <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
        <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript" src="<?= base_url()?>assets/js/jquery.validate.js"></script>   
        <script>
            $(window).load(function() {
                $("#registerForm").validate({
                        errorPlacement: function(error, element) {
                                error.insertAfter(element);
                        }
                });
                $("#zona").change(function() {
                    $("#zona option:selected").each(function() {
                        var zona = $('#zona').val();
                        $.ajax({
                            url: "<?= base_url()?>admin/cargarCuadrantes",
                            type: "post",
                            data: "zona="+zona,
                            success: function(data){
                                $("#cuadrante").html(data);
                            }
                        });
                    });
                });
                $("#cuadrante").change(function() {
                    $("#cuadrante option:selected").each(function() {
                        var cuadrante = $('#cuadrante').val();
                        $.ajax({
                            url: "<?= base_url()?>admin/cargarUrbanizaciones",
                            type: "post",
                            data: "cuadrante="+cuadrante,
                            success: function(data){
                                $("#urbanizacion").html(data);
                            }
                        });
                    });
                });
            });
        </script>
        <style>
            label.error { 
                    float: left; 
                    color: red; 
                    padding-top: .5em; 
                    vertical-align: top; 
                    font-weight:bold
            }
        </style>
    </head> 

    <body> 
        <div data-role=page id=home>
            <div data-role=header>
                <h1>Registro de Incidencia</h1>
                <a href="<?= base_url()?>usermobile/logout" data-icon="gear" class="ui-btn-right">Cerrar Sesión</a>
            </div>

            <div data-role=content>
                <form name="registerForm" id="registerForm" method="post" action="<?= base_url()?>mobile/registrarIncidente">
                    <div data-role="fieldcontain">
                        <label for="select-native-1">Zona:</label>
                        <select name="select-native-1" id="zona" name="zona" class="required">
                            <option value="">Seleccione una zona</option>
                            <?php
                                foreach ($zonas as $row_zona){?>
                                    <option value="<?= $row_zona->idzona?>"><?= $row_zona->strnombrezona?></option> 
                                <?php }
                            ?>
                        </select>
                    </div>
                    <div data-role="fieldcontain">
                        <label for="select-native-1">Cuadrante:</label>
                        <select name="select-native-1" id="cuadrante" name="cuadrante" class="required">
                            <option value="">Seleccione un cuadrante</option>
                        </select>
                    </div>
                    <div data-role="fieldcontain">
                        <label for="select-native-1">Urbanizaci&oacute;n:</label>
                        <select name="select-native-1" id="urbanizacion" name="urbanizacion" class="required">
                            <option value="">Seleccione una urbanizaci&oacute;n</option>
                        </select>
                    </div>
                    <div data-role="fieldcontain">
                        <label for="select-native-1">Tipo de incidente:</label>
                        <select name="select-native-1" id="tipoincidente" name="tipoincidente" class="required">
                            <option value="">Seleccione tipo de incidente..</option>
                            <?php
                                foreach ($tipoincidentes as $row_tipoincidente){?>
                                    <option value="<?= $row_tipoincidente->idtipoincidente?>"><?= $row_tipoincidente->strtipoincidente?></option> 
                                <?php }
                            ?>
                        </select>
                    </div>
                    <div data-role="fieldcontain">
                        <label for="textarea-1">Descripci&oacute;n:</label>
                        <textarea cols="40" rows="8" name="descripcion" id="descripcion" class="required" ></textarea>
                    </div>
                    <div data-role="fieldcontain">
                        <span> Latitud : </span> <input type=text id="lat" name="lat" readonly="readonly" />
                    </div>
                    <div data-role="fieldcontain">
                        <span> Longitud : </span> <input type=text id="lng" name="lng" readonly="readonly" />
                    </div>
                    <div data-role="fieldcontain">
                        <span> Fecha y Hora : </span> <input type=text id="fechahora" name="fechahora" value="<?= date('d/m/Y H:i:s',  strtotime("+1 hour"))?>" readonly="readonly" />
                    </div>
                    <input type="hidden" name="trabajador" id="trabajador" value="<?= $trabajador?>">
                    <input type="submit" id="submit" name="submit" value="Registrar Incidencia">
                </form>
            </div>
        </div>
        <div data-role=page id=win2 data-add-back-btn=true>
          <div data-role=header>
            <h1>Incidencia Registrada</h1>
          </div>

          <div data-role=content>
          </div>
        </div>
    </body>
</html>

<script>
    navigator.geolocation.getCurrentPosition (function (pos)
    {
        var lat = pos.coords.latitude;
        var lng = pos.coords.longitude;
        $("#lat").val (lat);
        $("#lng").val (lng);
    });

    $("#btn").bind ("click", function (event)
    {
        var lat = $("#lat").val ();
        var lng = $("#lng").val ();
        var latlng = new google.maps.LatLng (lat, lng);
        var options = { 
          zoom : 15, 
          center : latlng, 
          mapTypeId : google.maps.MapTypeId.ROADMAP 
        };
        var $content = $("#win2 div:jqmData(role=content)");
        $content.height (screen.height - 50);
        var map = new google.maps.Map ($content[0], options);
        $.mobile.changePage ($("#win2"));

        new google.maps.Marker ( 
        { 
            map : map, 
            animation : google.maps.Animation.DROP,
            position : latlng  
        });  
    });
</script>
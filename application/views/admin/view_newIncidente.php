<style>
    .timeEntry_control{
        background: url('<?= base_url()?>assets/images/forms/spinnerUpDown.png') !important;
    }
</style>
<script>
    $(window).load(function() {
        document.getElementById("zona").focus();
        $('.redB').click(function(){
             $("#validate").validate({
                rules: {
                    zona: { 
                        required: true,    
                    },
                    cuadrante:{
                        required: true,
                    },
                    urbanizacion:{
                        required: true,
                    },
                    tipoincidente:{
                        required: true,
                    },
                    descripcion:{
                        required: true,
                    },
                    coordenadas:{
                        required: true,
                    },
                    fecha:{
                        required: true,
                    },
                    hora:{
                        required: true,
                    }
                },
                messages: { 
                    zona: { 
                        required: "Seleccione una zona",    
                    },
                    cuadrante:{
                        required: "Seleccione un cuadrante",
                    },
                    urbanizacion:{
                        required: "Seleccione una urbanización",
                    },
                    tipoincidente:{
                        required: "Seleccione un tipo de incidente",
                    },
                    descripcion:{
                        required: "Ingrese una descripción",
                    },
                    coordenadas:{
                        required: "Especifique coordenadas",
                    },
                    fecha:{
                        required: "Seleccione fecha",
                    },
                    hora:{
                        required: "Seleccione hora",
                    }
                },
                submitHandler: function(form) {
                    $(form).ajaxSubmit({
                        url:"<?= base_url()?>admin/newIncidente",
                        type:"post",
                        success: function(data){
                            document.getElementById("submit").disabled = false;
                            $("#resultados").html("");
                            $.jGrowl(data, { header: 'Mensaje del Sistema' });
                            window.setTimeout(function () {
                                location.href = "<?= base_url()?>admin/nuevo_incidente";
                            }, 1500);
                        },
                        beforeSend: function(){
                            $("#resultados").html('<img src="<?= base_url()?>assets/images/loaders/loader.gif" alt="" style="margin: 5px;" />');
                            document.getElementById("submit").disabled = true;
                        },
                        error:function(){
                            $("#resultados").html('Hubo un error mientras se insertaba los datos.');
                        }
                    });
              }
            }); 
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
                        $("#waiting").html('');
                    },
                    beforeSend: function(){
                        $("#waiting").html('<img src="<?= base_url()?>assets/images/loaders/loader.gif" alt="" style="margin: 5px;" />');
                    },
                    error:function(){
                        $("#waiting").html('Hubo un error mientras se cargaba los datos.');
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
                        $("#waiting1").html('');
                    },
                    beforeSend: function(){
                        $("#waiting1").html('<img src="<?= base_url()?>assets/images/loaders/loader.gif" alt="" style="margin: 5px;" />');
                    },
                    error:function(){
                        $("#waiting1").html('Hubo un error mientras se cargaba los datos.');
                    }
                });
            });
        });
    });
</script>
    <!-- Title area -->
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5>Gestión de Incidentes</h5>
                <span>Sistema de gestión de incidencias.</span>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    
    <div class="line"></div>
    
    <div class="wrapper">
        <!-- Form -->
        <form action="" class="form" id="validate" method="post">
            <fieldset>
                <div class="widget">
                    <div class="title"><img src="<?= base_url()?>assets/images/icons/dark/list.png" alt="" class="titleIcon" /><h6>Registro de Incidentes</h6></div>
                    <div class="formRow">
                        <label>Zona:<span class="req">*</span></label>
                        <div class="formRight">
                            <select name="zona" id="zona">
                                <option value="">Seleccione una zona</option>
                                <?php
                                    foreach ($zonas as $row_zona){?>
                                        <option value="<?= $row_zona->idzona?>"><?= $row_zona->strnombrezona?></option> 
                                    <?php }
                                ?>
                            </select>           
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Cuadrante:<span class="req">*</span></label>
                        <div class="formRight">
                            <select name="cuadrante" id="cuadrante">
                                <option value="">Seleccione un cuadrante</option>
                            </select>           
                        </div>
                        <div class="formRight" id="waiting"></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Urbanizacion:<span class="req">*</span></label>
                        <div class="formRight">
                            <select name="urbanizacion" id="urbanizacion">
                                <option value="">Seleccione una urbanización</option>
                            </select>           
                        </div>
                        <div class="formRight" id="waiting1"></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Tipo de Incidente:<span class="req">*</span></label>
                        <div class="formRight">
                            <select name="tipoincidente" id="tipoincidente">
                                <option value="">Seleccione un tipo de incidente</option>
                                <?php
                                    foreach ($tipoincidentes as $row_tipoincidente){?>
                                        <option value="<?= $row_tipoincidente->idtipoincidente?>"><?= $row_tipoincidente->strtipoincidente?></option> 
                                    <?php }
                                ?>
                            </select>           
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Descripción:<span class="req">*</span></label>
                        <div class="formRight"><textarea rows="8" cols="" name="descripcion" id="descripcion"></textarea></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Coordenadas:<span class="req">*</span></label>
                        <div class="formRight"><input type="text" value="<?= $coordenadas?>" name="coordenadas" id="coordenadas"/><a href="<?= base_url()?>admin/get_coordenadas" title="" class="button greyishB" style="margin: 5px 0px;"><img src="<?= base_url()?>assets/images/icons/light/create.png" alt="" class="icon"><span>Obtener Coordenadas</span></a></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Fecha:<span class="req">*</span></label>
                        <div class="formRight">
                            <input type="text" class="datepicker" name="fecha" id="fecha" />
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Hora:<span class="req">*</span></label>
                        <div class="formRight">
                            <input type="text" class="timepicker" size="10" name="hora" id="hora" />
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formSubmit"><input type="submit" value="Guardar" class="redB" id="submit" /></div>
                    <div class="clear"></div>
                </div>
            </fieldset>
        </form>
        </div>
    </div>
    
    <!-- Footer line -->
   
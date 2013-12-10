<script>
    $(window).load(function() {
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
                <h5>Reporte de Incidentes - Por Tipos de Incidentes, Zonas y Urbanización</h5>
                <span>Sistema de gestión de incidencias.</span>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    
    <div class="line"></div>
    
    <div class="wrapper">
        <!-- Form -->
        <form action="<?= base_url()?>admin/reporteTipoIncidenteZonaUrbanizacion" class="form" id="validate" method="post">
            <fieldset>
                <div class="widget">
                    <div class="title"><img src="<?= base_url()?>assets/images/icons/dark/list.png" alt="" class="titleIcon" /><h6>Búsqueda por tipos de incidentes, zonas y urbanización</h6></div>
                    <div class="formRow">
                        <label>Tipo de Incidente:</label>
                        <div class="formRight searchDrop">
                        <select data-placeholder="Seleccione Tipo de Incidente..." class="chzn-select" style="width:150px;" tabindex="2" name="tipo" id="tipo">
                            <?php
                                foreach ($tipoincidente as $row){?>
                                    <option value="<?= $row->idtipoincidente?>"><?= $row->strtipoincidente?></option>
                                <?php } 
                            ?>
                        </select>
                        </div>             
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Zona:</label>
                        <div class="formRight searchDrop">
                        <select data-placeholder="Seleccione una zona" class="chzn-select" style="width:150px;" tabindex="2" name="zona" id="zona">
                            <option value=""></option>
                            <?php
                                foreach ($zonas as $row){?>
                                    <option value="<?= $row->idzona?>"><?= $row->strnombrezona?></option>
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
                    <div class="formSubmit"><input type="submit" value="Buscar" class="redB" /></div>
                    <div class="clear"></div>
                </div>
            </fieldset>
        </form>
        </div>
    </div>
    
    <!-- Footer line -->
   
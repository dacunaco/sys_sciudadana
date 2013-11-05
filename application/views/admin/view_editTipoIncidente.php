<?php
    if(isset($mensaje)){?>
        <script>
            $( window ).load(function() {
                var mensaje = <?= $mensaje?>;
                if(mensaje == "1"){
                    $.jGrowl('Se modificó correctamente el tipo de incidente',{header: 'Mensaje del Sistema'});
                    window.setTimeout(function () {
                        location.href = "<?= base_url()?>admin/listado_tipo_incidente";
                    }, 1500)
                }else if(mensaje == "0"){
                   $.jGrowl('Error al modificar tipo de incidente',{header: 'Mensaje del Sistema'});
                   window.setTimeout(function () {
                        location.href = "<?= base_url()?>admin/editar_tipo_incidente?tpid=<?= $id?>";
                    }, 1500)
                }
            });
        </script>
    <?php }
?>
    <!-- Title area -->
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5>Gestión de Tipos de Incidentes</h5>
                <span>Sistema de gestión de incidencias.</span>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    
    <div class="line"></div>
    
    <div class="wrapper">
        <!-- Form -->
        <?= form_open_multipart(base_url()."admin/editTipoIncidente",array("class"=>"form"))?>
            <fieldset>
                <div class="widget">
                    <div class="title"><img src="<?= base_url()?>assets/images/icons/dark/list.png" alt="" class="titleIcon" /><h6>Edición de Tipos de Incidentes</h6></div>
                    <?php
                        foreach ($tipoincidente as $row_tipo_incidente){?>
                            <div class="formRow">
                                <label>Nombre de Tipo de Incidente:</label>
                                <div class="formRight"><input type="text" name="tipoincidente" id="tipoincidente" class="validate[required]" value="<?= $row_tipo_incidente->strtipoincidente?>" /></div>
                                <div class="clear"></div>
                            </div> 
                            <div class="formRow">
                                <label>Imagen:</label>
                                <div class="formRight">
                                        <input type="file" id="imagen0" name="imagen0"/>
                                        <input type="hidden" name="id" id="id" value="<?= $row_tipo_incidente->idtipoincidente?>">
                                </div><div class="clear"></div>
                            </div>
                        <?php }
                    ?>
                    <div class="formSubmit"><input type="submit" value="Guardar" class="redB" /></div>
                    <div class="clear"></div>
                </div>
            </fieldset>
        <?= form_close();?>
        </div>
    </div>
    
    <!-- Footer line -->
   
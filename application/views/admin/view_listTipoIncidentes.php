<?php
    if(isset($mensaje)){?>
        <script>
            $( window ).load(function() {
                var mensaje = <?= $mensaje?>;
                if(mensaje == "1"){
                    $.jGrowl('Se modificó correctamente el tipo de incidente',{header: 'Mensaje del Sistema'});
                }else if(mensaje == "0"){
                   $.jGrowl('Error al modificar tipo de incidente',{header: 'Mensaje del Sistema'});
                }
            });
        </script>
    <?php }
?>
<script>
    function eliminarTipoIncidente(tipoincidente){
        var r=confirm("¿Realmente desea eliminar el tipo de incidente?");
        if (r==true){
          $.ajax({
                url: "<?= base_url()?>admin/deleteTipoIncidente",
                type: "post",
                data: "tipoincidente="+tipoincidente,
                success: function(data){
                    $.jGrowl(data, { header: 'Mensaje del Sistema' });
                    window.setTimeout(function () {
                        location.href = "<?= base_url()?>admin/listado_tipo_incidente";
                    }, 1500);
                },
                beforeSend: function(){
                    $("#waiting").html('<img src="<?= base_url()?>assets/images/loaders/loader.gif" alt="" style="margin: 5px;" />');
                },
                error:function(){
                    $("#waiting").html('Hubo un error mientras se eliminaba los datos.');
                }
            });
        }
    }
</script>
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
        <!-- Dynamic table -->
        <a href="<?= base_url()?>admin/nuevo_tipo_incidente" title="" class="sButton sBlue" style="margin-top: 12px;width: 220px !important"><img src="<?= base_url()?>assets/images/icons/sPlus.png" alt="" /><span>Registrar Tipo de Incidente</span></a>
        <div class="widget">
            <div class="title"><img src="<?= base_url()?>assets/images/icons/dark/full2.png" alt="" class="titleIcon" /><h6>Listado de Tipos de Incidentes</h6><div id="waiting" style="margin-top: 8px;float: left;"></div></div>                          
            <table cellpadding="0" cellspacing="0" border="0" class="display dTable">
            <thead>
            <tr>
            <th>N°</th>
            <th>Descripción</th>
            <th>Imagen</th>
            <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    foreach ($tipo_incidentes as $row_tipo_incidente){?>
                        <tr class="gradeA">
                            <td align="center"><?= $i?></td>
                            <td align="center"><?= $row_tipo_incidente->strtipoincidente?></td>
                            <td align="center"><img src="<?= base_url()?>assets/images/tipo-incidente/<?= $row_tipo_incidente->imgtipoincidente?>" width="20"></td>
                            <td class="center">
                                <a href="<?= base_url()?>admin/editar_tipo_incidente?tpid=<?= $row_tipo_incidente->idtipoincidente?>" title="" class="smallButton" style="margin: 5px;"><img src="<?= base_url()?>assets/images/icons/dark/pencil.png" alt="" /></a>
                                <a href="#" title="" class="smallButton" style="margin: 5px;" onclick="eliminarTipoIncidente('<?= $row_tipo_incidente->idtipoincidente?>')"><img src="<?= base_url()?>assets/images/icons/dark/close.png" alt="" /></a>
                            </td>
                        </tr>
                    <?php $i++;}
                ?>
            </tbody>
            </table>  
        </div>
        </div>
    </div>
    
    <!-- Footer line -->
   
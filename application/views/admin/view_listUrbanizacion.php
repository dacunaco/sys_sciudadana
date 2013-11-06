<script>
    function eliminarUrbanizacion(urbanizacion){
        var r=confirm("¿Realmente desea eliminar la urbanización?");
        if (r==true){
          $.ajax({
                url: "<?= base_url()?>admin/deleteUrbanizacion",
                type: "post",
                data: "urbanizacion="+urbanizacion,
                success: function(data){
                    $.jGrowl(data, { header: 'Mensaje del Sistema' });
                    window.setTimeout(function () {
                        location.href = "<?= base_url()?>admin/listado_urbanizaciones";
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
                <h5>Gestión de Urbanizaciones</h5>
                <span>Sistema de gestión de incidencias.</span>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    
    <div class="line"></div>
    
    <div class="wrapper">
        <!-- Form -->
        <!-- Dynamic table -->
        <a href="<?= base_url()?>admin/nueva_urbanizacion" title="" class="sButton sBlue" style="margin-top: 12px;"><img src="<?= base_url()?>assets/images/icons/sPlus.png" alt="" /><span>Regisrar Urbanización</span></a>
        <div class="widget">
            <div class="title"><img src="<?= base_url()?>assets/images/icons/dark/full2.png" alt="" class="titleIcon" /><h6>Listado de Urbanizaciones</h6></div>                          
            <table cellpadding="0" cellspacing="0" border="0" class="display dTable">
            <thead>
            <tr>
            <th>N°</th>
            <th>Descripción</th>
            <th>Cuadrante</th>
            <th>Zona</th>
            <th>Distrito</th>
            <th>Provincia</th>
            <th>Región</th>
            <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    foreach ($urbanizaciones as $row_urbanizacion){?>
                        <tr class="gradeA">
                            <td align='center'><?= $i?></td>
                            <td align='center'><?= $row_urbanizacion->strnombreurbanizacion?></td>
                            <td align='center'><?= $row_urbanizacion->strnombrecuadrante?></td>
                            <td align='center'><?= $row_urbanizacion->strnombrezona?></td>
                            <td align='center'><?= $row_urbanizacion->distrito?></td>
                            <td align='center'><?= $row_urbanizacion->provincia?></td>
                            <td align='center'><?= $row_urbanizacion->region?></td>
                            <td class="center">
                                <a href="<?= base_url()?>admin/editar_urbanizacion?uid=<?= $row_urbanizacion->idurbanizacion?>" title="" class="smallButton" style="margin: 5px;"><img src="<?= base_url()?>assets/images/icons/dark/pencil.png" alt="" /></a>
                                <a href="#" title="" class="smallButton" style="margin: 5px;" onclick="eliminarUrbanizacion('<?= $row_urbanizacion->idurbanizacion?>')"><img src="<?= base_url()?>assets/images/icons/dark/close.png" alt="" /></a>
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
   
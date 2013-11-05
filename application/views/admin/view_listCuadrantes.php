<script>
    function eliminarCuadrante(cuadrante){
        var r=confirm("¿Realmente desea eliminar el cuadrante?");
        if (r==true){
          $.ajax({
                url: "<?= base_url()?>admin/deleteCuadrante",
                type: "post",
                data: "cuadrante="+cuadrante,
                success: function(data){
                    $.jGrowl(data, { header: 'Mensaje del Sistema' });
                    window.setTimeout(function () {
                        location.href = "<?= base_url()?>admin/listado_cuadrantes";
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
                <h5>Gestión de Cuadrantes</h5>
                <span>Sistema de gestión de incidencias.</span>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    
    <div class="line"></div>
    
    <div class="wrapper">
        <!-- Form -->
        <!-- Dynamic table -->
        <div class="widget">
            <div class="title"><img src="<?= base_url()?>assets/images/icons/dark/full2.png" alt="" class="titleIcon" /><h6>Listado de Cuadrantes</h6><div id="waiting" style="margin-top: 8px;float: left;"></div></div>                          
            <table cellpadding="0" cellspacing="0" border="0" class="display dTable">
            <thead>
            <tr>
            <th>N°</th>
            <th>Descripción</th>
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
                    foreach ($cuadrantes as $row_cuadrante){?>
                        <tr class="gradeA">
                            <td align='center'><?= $i?></td>
                            <td align='center'><?= $row_cuadrante->strnombrecuadrante?></td>
                            <td align='center'><?= $row_cuadrante->strnombrezona?></td>
                            <td align='center'><?= $row_cuadrante->distrito?></td>
                            <td align='center'><?= $row_cuadrante->provincia?></td>
                            <td align='center'><?= $row_cuadrante->region?></td>
                            <td class="center">
                                <a href="<?= base_url()?>admin/editar_cuadrante?cid=<?= $row_cuadrante->idcuadrante?>" title="" class="smallButton" style="margin: 5px;"><img src="<?= base_url()?>assets/images/icons/dark/pencil.png" alt="" /></a>
                                <a href="#" title="" class="smallButton" style="margin: 5px;" onclick="eliminarCuadrante('<?= $row_cuadrante->idcuadrante?>')"><img src="<?= base_url()?>assets/images/icons/dark/close.png" alt="" /></a>
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
   
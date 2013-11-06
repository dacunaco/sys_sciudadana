<script>
    function eliminarTrabajador(trabajador){
        var r=confirm("¿Realmente desea eliminar el trabajador?");
        if (r==true){
          $.ajax({
                url: "<?= base_url()?>admin/deleteTrabajador",
                type: "post",
                data: "trabajador="+trabajador,
                success: function(data){
                    $.jGrowl(data, { header: 'Mensaje del Sistema' });
                    window.setTimeout(function () {
                        location.href = "<?= base_url()?>admin/listado_trabajadores";
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
                <h5>Gestión de Trabajadores</h5>
                <span>Sistema de gestión de incidencias.</span>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    
    <div class="line"></div>
    
    <div class="wrapper">
        <!-- Form -->
        <!-- Dynamic table -->
        <a href="<?= base_url()?>admin/nuevo_trabajador" title="" class="sButton sBlue" style="margin-top: 12px;"><img src="<?= base_url()?>assets/images/icons/sPlus.png" alt="" /><span>Regisrar Trabajador</span></a>
        <div class="widget">
            <div class="title"><img src="<?= base_url()?>assets/images/icons/dark/full2.png" alt="" class="titleIcon" /><h6>Listado de Trabajadores</h6></div>                          
            <table cellpadding="0" cellspacing="0" border="0" class="display dTable">
            <thead>
            <tr>
            <th>Código</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Dirección</th>
            <th>DNI</th>
            <th>Sexo</th>
            <th>Teléfono</th>
            <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($trabajadores as $row_trabajador){?>
                        <tr class="gradeA">
                            <td align="center"><?= $row_trabajador->strcodigo?></td>
                            <td align="center"><?= $row_trabajador->strnombres?></td>
                            <td align="center"><?= $row_trabajador->strapellidopaterno?> <?= $row_trabajador->strapellidomaterno?></td>
                            <td align="center"><?= $row_trabajador->strdireccion?></td>
                            <td align="center"><?= $row_trabajador->strdni?></td>
                            <td align="center"><?= $row_trabajador->strsexo?></td>
                            <td align="center"><?= $row_trabajador->strtelefono?></td>
                            <td class="center">
                                <a href="<?= base_url()?>admin/editar_trabajador?tid=<?= $row_trabajador->idtrabajador?>" title="" class="smallButton" style="margin: 5px;"><img src="<?= base_url()?>assets/images/icons/dark/pencil.png" alt="" /></a>
                                <a href="#" title="" class="smallButton" style="margin: 5px;" onclick="eliminarTrabajador('<?= $row_trabajador->idtrabajador?>')"><img src="<?= base_url()?>assets/images/icons/dark/close.png" alt="" /></a>
                            </td>
                        </tr>
                    <?php }
                ?>
            </tbody>
            </table>  
        </div>
        </div>
    </div>
    
    <!-- Footer line -->
   
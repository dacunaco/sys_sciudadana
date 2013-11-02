<script>
    function eliminarZona(zona){
        var r=confirm("¿Realmente desea eliminar la zona?");
        if (r==true){
          $.ajax({
                url: "<?= base_url()?>admin/deleteZona",
                type: "post",
                data: "zona="+zona,
                success: function(data){
                    $.jGrowl(data, { header: 'Mensaje del Sistema' });
                    window.setTimeout(function () {
                        location.href = "<?= base_url()?>admin/listado_zonas";
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
                <h5>Gestión de Zonas</h5>
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
            <div class="title"><img src="<?= base_url()?>assets/images/icons/dark/full2.png" alt="" class="titleIcon" /><h6>Listado de Zonas</h6><div id="waiting" style="margin-top: 8px;float: left;"></div></div>                          
            <table cellpadding="0" cellspacing="0" border="0" class="display dTable">
            <thead>
            <tr>
            <th>N°</th>
            <th>Descripción</th>
            <th>Distrito</th>
            <th>Provincia</th>
            <th>Región</th>
            <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $i = 1;
                foreach ($zonas as $row_zona){?>
                    <tr class="gradeA">
                        <td class="center"><?= $i?></td>
                        <td class="center"><?= $row_zona->strnombrezona?></td>
                        <td class="center"><?= $row_zona->region?></td>
                        <td class="center"><?= $row_zona->provincia?></td>
                        <td class="center"><?= $row_zona->distrito?></td>
                        <td class="center">
                            <a href="<?= base_url()?>admin/editar_zona?zid=<?= $row_zona->idzona?>" title="" class="smallButton" style="margin: 5px;"><img src="<?= base_url()?>assets/images/icons/dark/pencil.png" alt="" /></a>
                            <a href="#" title="" class="smallButton" style="margin: 5px;" onclick="eliminarZona('<?= $row_zona->idzona?>')"><img src="<?= base_url()?>assets/images/icons/dark/close.png" alt="" /></a>
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
   
<a href="#" onclick="newDetalle()" title="" class="sButton sBlue" style="margin-bottom: -12px; width: 250px;"><img src="<?= base_url()?>assets/images/icons/sPlus.png" alt="" /><span>Registrar Detalle de Incidente</span></a>
<div class="widget">
    <div class="title"><img src="<?= base_url()?>assets/images/icons/dark/full2.png" alt="" class="titleIcon" /><h6>Listado de Incidentes</h6><div id="waiting" style="margin-top: 8px;float: left;"></div></div>                          
    <table border="1" cellspacing="0" cellpadding="10" class="display dTable" widht="500">
        <thead>
            <tr>
                <th>N°</th>
                <th>Descripción</th>
                <th>Fecha y Hora</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php
            if(count($detalle) == 0){?>
                <tr>
                    <td colspan="5">No se encontró ningún detalle registrado para esta incidencia.</td>
                </tr>
            <?php }else{
                foreach ($detalle as $row_detalle){
                    if($row_detalle->strestadodetalleincidente == "P"){?>
                        <tr>
                            <td><?= $row_detalle->iddetalleincidente?></td>
                            <td><?= $row_detalle->straccion?></td>
                            <td><?= $row_detalle->datfechahoradetalleincidente?></td>
                            <td><span style="color: #ff9900">Pendiente</span></td>
                            <td>
                                <a href="#" onclick="editDetalleIncidente('<?= $row_detalle->iddetalleincidente?>')" title="" class="smallButton" style="margin: 5px;"><img src="<?= base_url()?>assets/images/icons/dark/pencil.png" alt="" /></a>
                                <a href="#" title="" class="smallButton" style="margin: 5px;" onclick="eliminardetalleIncidente('<?= $row_detalle->iddetalleincidente?>')"><img src="<?= base_url()?>assets/images/icons/dark/close.png" alt="" /></a>
                            </td>
                        </tr>
                    <?php }else if($row_detalle->strestadodetalleincidente == "C"){?>
                        <tr>
                            <td><?= $row_detalle->iddetalleincidente?></td>
                            <td><?= $row_detalle->straccion?></td>
                            <td><?= $row_detalle->datfechahoradetalleincidente?></td>
                            <td><span style="color: #599414">Concluído</span></td>
                            <td align="center">-</td>
                        </tr>
                    <?php }
                }
            }
        ?>
        </tbody>
    </table>
</div>
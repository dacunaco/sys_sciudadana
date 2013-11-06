
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
        <!-- Dynamic table -->
        <a href="<?= base_url()?>admin/nuevo_incidente" title="" class="sButton sBlue" style="margin-top: 12px;"><img src="<?= base_url()?>assets/images/icons/sPlus.png" alt="" /><span>Regisrar Incidente</span></a>
        <div class="widget">
            <div class="title"><img src="<?= base_url()?>assets/images/icons/dark/full2.png" alt="" class="titleIcon" /><h6>Listado de Incidentes</h6></div>                          
            <table cellpadding="0" cellspacing="0" border="0" class="display dTable">
            <thead>
            <tr>
            <th>N°</th>
            <th>Descripción</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Urbanización</th>
            <th>Cuadrante</th>
            <th>Zona</th>
            <th>Estado</th>
            <th>Detalle</th>
            <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <!--<tr class="gradeA">
            <td>Trident</td>
            <td>Internet
            Explorer 4.0</td>
            <td>Win 95+</td>
            <td class="center">
                <a href="#" title="" class="smallButton" style="margin: 5px;"><img src="<?= base_url()?>assets/images/icons/dark/pencil.png" alt="" /></a>
                <a href="#" title="" class="smallButton" style="margin: 5px;"><img src="<?= base_url()?>assets/images/icons/dark/close.png" alt="" /></a>
            </td>
            </tr>-->
            </tbody>
            </table>  
        </div>
        </div>
    </div>
    
    <!-- Footer line -->
   
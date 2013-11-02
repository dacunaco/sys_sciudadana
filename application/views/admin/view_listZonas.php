
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
            <div class="title"><img src="<?= base_url()?>assets/images/icons/dark/full2.png" alt="" class="titleIcon" /><h6>Listado de Zonas</h6></div>                          
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
                        <td><?= $i?></td>
                        <td><?= $row_zona->strnombrezona?></td>
                        <td><?= $row_zona->region?></td>
                        <td><?= $row_zona->provincia?></td>
                        <td><?= $row_zona->distrito?></td>
                        <td class="center">
                            <a href="#" title="" class="smallButton" style="margin: 5px;"><img src="<?= base_url()?>assets/images/icons/dark/pencil.png" alt="" /></a>
                            <a href="#" title="" class="smallButton" style="margin: 5px;"><img src="<?= base_url()?>assets/images/icons/dark/close.png" alt="" /></a>
                        </td>
                    </tr>
                <?php }
            ?>
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
   
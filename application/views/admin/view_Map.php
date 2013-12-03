<?php echo $map['js']; ?>
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
        <form>
            <fieldset>
                <div class="widget">
                    <div class="title"><img src="<?= base_url()?>assets/images/icons/dark/list.png" alt="" class="titleIcon" /><h6>Mapa de incidencia registrada</h6></div>
                    
                    <div class="clear"></div>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="95%" align="center" style="padding-bottom: 20px;">
                                <div id="map" class="map" style="width: 95%;margin-top: 15px;"><?php echo $map['html']; ?></div>
                            </td>
                        </tr>
                    </table>
                </div>
            </fieldset>
        </form>
        </div>
    </div>
    
    <!-- Footer line -->
   
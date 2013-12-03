<?php echo $map['js']; ?>
<style>
    .timeEntry_control{
        background: url('<?= base_url()?>assets/images/forms/spinnerUpDown.png') !important;
    }
</style>
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
        <form action="<?= base_url()?>admin/post_coordenadas" class="form" id="validate" method="post">
            <fieldset>
                <div class="widget">
                    <div class="title"><img src="<?= base_url()?>assets/images/icons/dark/list.png" alt="" class="titleIcon" /><h6>Coordenadas</h6></div>
                    <div class="formRow">
                        <label>Coordenadas del mapa:</label>
                        <div class="formRight searchDrop">
                            <input type="text" name="coordenadas" id="coordenadas" class="validate[required]"/>
                        </div>             
                        <div class="clear"></div>
                    </div>
                    <div class="formSubmit"><input type="submit" value="Enviar Coordenadas" class="redB" id="submit" /></div>
                    <div class="clear"></div>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="95%" align="center" style="padding-bottom: 20px;">
                                <div id="map" class="map" style="width: 95%;"><?php echo $map['html']; ?></div>
                            </td>
                        </tr>
                    </table>
                </div>
            </fieldset>
        </form>
        </div>
    </div>
    
    <!-- Footer line -->
   
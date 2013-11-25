<?php echo $map['js']; ?>
    <!-- Title area -->
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5>Página Principal</h5>
                <span>Sistema de gestión de incidencias.</span>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    
    <div class="line"></div>
    
    <!-- Page statistics and control buttons area -->
    <div class="statsRow">
         <div class="wrapper statsItems">
        	<!-- Stats item -->
            <div class="sItem visitsStats">
            	<h2><a title="" class="value">0<span>Pendientes</span></a></h2>
                <span class="changes">
                    <span class="posBar" values="5,10,15,20,18,16,14,20,15,16"></span>
                    <span class="positive">+0.0%</span>
                </span>
            </div>
            <div class="sItem visitsStats">
            	<h2><a title="" class="value">0<span>Concluidas</span></a></h2>
                <span class="changes">
                    <span class="posBar" values="5,10,15,20,18,16,14,20,15,16"></span>
                    <span class="positive">+0.0%</span>
                </span>
            </div>
        </div>
    </div>
    <div class="line"></div>
    
    <div class="wrapper">
        <div class="widget">
            <div class="title"><img src="<?= base_url()?>assets/images/icons/dark/frames.png" alt="" class="titleIcon" /><h6>Mapa principal de ubigeo de las incidencias registradas.</h6></div>
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="95%" align="center" style="padding-bottom: 20px;padding-top: 20px;">
                            <div id="map" class="map" style="width: 95%;"><?php echo $map['html']; ?></div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    
    <!-- Footer line -->
   
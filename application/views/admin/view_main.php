<?php echo $map['js']; ?>
    <!-- Title area -->
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5>Página Principal</h5>
                <span>Sistema de gestión de incidencias.</span>
            </div>
            <div class="middleNav">
                <ul>
                    <li class="mUser"><a title="Usuarios" class="tipN"><span class="users"></span></a>
                        <ul class="mSub1">
                            <li><a href="#" title="">Nuevo usuario</a></li>
                        </ul>
                    </li>
                    <li class="mFiles"><a href="#" title="Incidencias" class="tipN"><span class="files"></span></a></li>
                </ul>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    
    <div class="line"></div>
    
    <!-- Page statistics and control buttons area -->
    <div class="statsRow">
         <div class="wrapper statsItems">
        
        	<!-- Stats item -->
            <div class="sItem ticketsStats">
                <h2><a title="" class="value">0<span>Alta</span></a></h2>
                <div class="statsDetailed" id="s1">
                    <div class="statsContent">
                        <div class="sElements">
                            <div class="sDisplay"><h4>0</h4><span>Nuevas</span></div>
                            <div class="sDisplay"><h4>0</h4><span>Total</span></div>
                            <div class="sDisplay"><h4>0</h4><span>Eliminadas</span></div>
                        </div>
                        <span class="line"></span>
                        <div class="statsDropBtn"><a href="#" class="button basic"><img src="<?= base_url()?>assets/images/icons/dark/stats.png" class="icon" alt="" /><span>Ver Listado</span></a></div>
                    </div>
                </div>
                <span class="changes">
                    <span class="negBar" values="5,10,15,20,18,16,14,20,15,16"></span>
                    <span class="negative">+0.0%</span>
                </span>
            </div>
        
        	<!-- Stats item -->
            <div class="sItem visitsStats">
            	<h2><a title="" class="value">0<span>Media</span></a></h2>
                <div class="statsDetailed" id="s2">
                    <div class="statsContent">
                        <div class="sElements">
                            <div class="sDisplay"><h4>0</h4><span>Nuevas</span></div>
                            <div class="sDisplay"><h4>0</h4><span>Total</span></div>
                            <div class="sDisplay"><h4>0</h4><span>Eliminadas</span></div>
                        </div>
                        <div class="statsDropBtn"><a href="#" class="button basic"><img src="<?= base_url()?>assets/images/icons/dark/stats.png" class="icon" alt="" /><span>Ver Listado</span></a></div>
                    </div>
                </div>
                <span class="changes">
                    <span class="posBar" values="5,10,15,20,18,16,14,20,15,16"></span>
                    <span class="positive">+0.0%</span>
                </span>
            </div>
        
        	<!-- Stats item -->
            <div class="sItem usersStats">
                <h2><a title="" class="value">0<span>Baja</span></a></h2>
                <div class="statsDetailed" id="s3">
                    <div class="statsContent">
                        <div class="sElements">
                            <div class="sDisplay"><h4>0</h4><span>Nuevas</span></div>
                            <div class="sDisplay"><h4>0</h4><span>Total</span></div>
                            <div class="sDisplay"><h4>0</h4><span>Eliminadas</span></div>
                        </div>
                        <span class="line"></span>
                        <div class="statsDropBtn"><a href="#" class="button basic"><img src="<?= base_url()?>assets/images/icons/dark/stats.png" class="icon" alt="" /><span>Ver Listado</span></a></div>
                    </div>
                </div>
                <span class="changes">
                <span class="zeroBar" values="5,10,15,20,18,16,14,20,15,16"></span>
                <span class="zero">0.0%</span>
                </span>
            </div>
        
            <!-- Stats item -->
            <div class="sItem ordersStats">
                <h2><a title="" class="value">0<span>Limpia</span></a></h2>
                <div class="statsDetailed" id="s4">
                    <div class="statsContent">
                        <div class="sElements">
                            <div class="sDisplay"><h4>0</h4><span>Nuevas</span></div>
                            <div class="sDisplay"><h4>0</h4><span>Total</span></div>
                            <div class="sDisplay"><h4>0</h4><span>Eliminadas</span></div>
                        </div>
                        <span class="line"></span>
                        <div class="statsDropBtn"><a href="#" class="button basic"><img src="<?= base_url()?>assets/images/icons/dark/stats.png" class="icon" alt="" /><span>Ver Listado</span></a></div>
                    </div>
                </div>
                <span class="changes">
                    <span class="negBar" values="5,10,15,20,18,16,14,20,15,16"></span>
                    <span class="negative">+0.0%</span>
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
                        <td align="center">
                            <div class="legend" style="margin: 0 auto; width: 100%;overflow: hidden;margin-left: 20%; margin-top: 20px;">
                                <img src="<?= base_url()?>assets/images/icon-alta.png" width="60" style="float:left;">
                                <div class="t-legend" style="float:left;text-align: center; line-height: 15px;margin-top: 10px;margin-left: -5px;">
                                    <span style="font-size: 14px;">Peligrosidad Alta</span><br />
                                    <?php
                                         $i = 0;
                                         foreach ($alta as $row){
                                             $i++;
                                         }
                                    ?>
                                    <a href='<?= base_url()?>main/listIncidenciasById?iid=1'><span style="font-size: 12px;">(<?=$i?>)</span></a>
                                </div>
                                <img src="<?= base_url()?>assets/images/icon-media.png" width="60" style="float:left;">
                                <div class="t-legend" style="float:left;text-align: center; line-height: 15px;margin-top: 10px;margin-left: -5px;">
                                    <span style="font-size: 14px;">Peligrosidad Media</span><br />
                                    <?php
                                         $i = 0;
                                         foreach ($media as $row){
                                             $i++;
                                         }
                                    ?>
                                    <a href='<?= base_url()?>main/listIncidenciasById?iid=2'><span style="font-size: 12px;">(<?=$i?>)</span></a>
                                </div>
                                <img src="<?= base_url()?>assets/images/icon-baja.png" width="60" style="float:left;">
                                <div class="t-legend" style="float:left;text-align: center; line-height: 15px;margin-top: 10px;margin-left: -5px;">
                                    <span style="font-size: 14px;">Peligrosidad Baja</span><br />
                                    <?php
                                         $i = 0;
                                         foreach ($baja as $row){
                                             $i++;
                                         }
                                    ?>
                                    <a href='<?= base_url()?>main/listIncidenciasById?iid=3'><span style="font-size: 12px;">(<?=$i?>)</span></a>
                                </div>
                                <img src="<?= base_url()?>assets/images/icon-clear.png" width="60" style="float:left;">
                                <div class="t-legend" style="float:left;text-align: center; line-height: 15px;margin-top: 10px;margin-left: -5px;">
                                    <span style="font-size: 14px;">Sin Peligrosidad</span><br />
                                    <?php
                                         $i = 0;
                                         foreach ($cero as $row){
                                             $i++;
                                         }
                                    ?>
                                    <a href='<?= base_url()?>main/listIncidenciasById?iid=4'><span style="font-size: 12px;">(<?=$i?>)</span></a>
                                </div>
                                <p style="clear: both"></p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td width="95%" align="center" style="padding-bottom: 20px;">
                            <div id="map" class="map" style="width: 95%;"><?php echo $map['html']; ?></div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    
    <!-- Footer line -->
   
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<link rel="shortcut icon" href="<?= base_url()?>assets/images/icono.png" type="image/x-icon" />	
<title>..:: Municipalidad Provincial de Trujillo ::.. - Administrador</title>
<link href="<?= base_url()?>assets/css/main.css" rel="stylesheet" type="text/css" />


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>

<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/spinner/ui.spinner.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/spinner/jquery.mousewheel.js"></script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/charts/excanvas.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/charts/jquery.flot.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/charts/jquery.flot.orderBars.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/charts/jquery.flot.pie.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/charts/jquery.flot.resize.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/charts/jquery.sparkline.min.js"></script>

<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/forms/uniform.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/forms/jquery.cleditor.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/forms/jquery.validationEngine-en.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/forms/jquery.validationEngine.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/forms/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/forms/autogrowtextarea.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/forms/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/forms/jquery.dualListBox.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/forms/jquery.inputlimiter.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/forms/chosen.jquery.min.js"></script>

<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/wizard/jquery.form.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/wizard/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/wizard/jquery.form.wizard.js"></script>

<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/uploader/plupload.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/uploader/plupload.html5.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/uploader/plupload.html4.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/uploader/jquery.plupload.queue.js"></script>

<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/tables/datatable.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/tables/tablesort.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/tables/resizable.min.js"></script>

<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/ui/jquery.tipsy.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/ui/jquery.collapsible.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/ui/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/ui/jquery.progress.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/ui/jquery.timeentry.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/ui/jquery.colorpicker.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/ui/jquery.jgrowl.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/ui/jquery.breadcrumbs.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/ui/jquery.sourcerer.js"></script>

<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/calendar.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/elfinder.min.js"></script>

<script type="text/javascript" src="<?= base_url()?>assets/js/custom.js"></script>

<script type="text/javascript" src="<?= base_url()?>assets/js/charts/chart.js"></script>


<?php echo $map['js']; ?>


<!-- Shared on MafiaShare.net  --><!-- Shared on MafiaShare.net  --></head>

<body>

<!-- Left side content -->
<div id="leftSide">
    <div class="logo"><a href="<?= base_url()?>admin"><img src="<?= base_url()?>assets/images/EscudoDeTrujilloPeru1.png" width="136" alt="" /></a></div>
        
    <div class="sidebarSep"></div>
    
    <!-- Left navigation -->
    <ul id="menu" class="nav">
        <li class="dash"><a href="index.html" title="" class="active"><span>Página Principal</span></a></li>
        <li class="forms"><a href="#" title="" class="exp"><span>Gestión de Incidencias</span><strong>1</strong></a>
            <ul class="sub">
                <li class="last"><a href="<?= base_url()?>admin/new_incidencia" title="">Nueva Incidencia</a></li>
            </ul>
        </li>
    </ul>
</div>


<!-- Right side -->
<div id="rightSide">

    <!-- Top fixed navigation -->
    <div class="topNav">
        <div class="wrapper">
            <div class="welcome"><a href="#" title=""><img src="<?= base_url()?>assets/images/userPic.png" alt="" /></a><span><?= $nombres?> <?= $apellidos?> ( <?= $dni?> )</span></div>
            <div class="userNav">
                <ul>
                    <li class="dd"><a title=""><img src="<?= base_url()?>assets/images/icons/topnav/profile.png" alt="" /><span>Perfil</span></a>
                        <ul class="userDropdown">
                            <li><a href="#" title="" class="sInbox">Editar Perfil</a></li>
                            <li><a href="#" title="" class="sOutbox">Cambiar Contraseña</a></li>
                        </ul>
                    </li>
                    <li><a href="<?= base_url()?>user/logout" title=""><img src="<?= base_url()?>assets/images/icons/topnav/logout.png" alt="" /><span>Cerrar Sesión</span></a></li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>

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
    <div id="footer">
        <div class="wrapper">Todo los derechos reservados por <a href="<?= base_url()?>admin" title="">La Municipalidad Provincial de Trujillo</a></div>
    </div>

</div>

<div class="clear"></div>

</body>
</html>
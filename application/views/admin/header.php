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
<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/forms/jquery.validationEngine-es.js"></script>
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





<!-- Shared on MafiaShare.net  --><!-- Shared on MafiaShare.net  --></head>

<body>

<!-- Left side content -->
<div id="leftSide">
    <div class="logo"><a href="<?= base_url()?>admin"><img src="<?= base_url()?>assets/images/EscudoDeTrujilloPeru1.png" width="136" alt="" /></a></div>
        
    <div class="sidebarSep"></div>
    
    <!-- Left navigation -->
    <ul id="menu" class="nav">
        <li class="dash"><a href="index.html" title="" class="active"><span>Página Principal</span></a></li>
        <li class="forms"><a href="#" title="" class="exp"><span>Mantenedores</span><strong>10</strong></a>
            <ul class="sub">
                <li class="last"><a href="<?= base_url()?>admin/listado_tipo_incidente" title="">Lista Tipos de Incidentes</a></li>
                <li class="last"><a href="<?= base_url()?>admin/nuevo_tipo_incidente" title="">Agregar Tipos de Incidentes</a></li>
                <li class="last"><a href="<?= base_url()?>admin/listado_zonas" title="">Lista de Zonas</a></li>
                <li class="last"><a href="<?= base_url()?>admin/nueva_zona" title="">Agregar Zonas</a></li>
                <li class="last"><a href="<?= base_url()?>admin/listado_cuadrantes" title="">Lista de Cuadrantes</a></li>
                <li class="last"><a href="<?= base_url()?>admin/nuevo_cuadrante" title="">Registrar Cuadrantes</a></li>
                <li class="last"><a href="<?= base_url()?>admin/listado_urbanizaciones" title="">Lista de Urbanizaciones</a></li>
                <li class="last"><a href="<?= base_url()?>admin/nueva_urbanizacion" title="">Registrar Urbanizaciones</a></li>
                <li class="last"><a href="<?= base_url()?>admin/listado_trabajadores" title="">Lista de Trabajadores</a></li>
                <li class="last"><a href="<?= base_url()?>admin/nuevo_trabajador" title="">Registrar Trabajador</a></li>
                
            </ul>
        </li>
        <li class="tables"><a href="#" title="" class="exp"><span>Operaciones</span><strong>10</strong></a>
            <ul class="sub">
                <li class="last"><a href="<?= base_url()?>admin/nuevo_incidente" title="">Registrar Incidente</a></li>
                <li class="last"><a href="<?= base_url()?>admin/listado_incidentes" title="">Lista Incidentes</a></li>
                <li class="last"><a href="<?= base_url()?>admin/buscar_incidente" title="">Buscar Incidentes</a></li>
                <li class="last"><a href="<?= base_url()?>admin/reporte_tipo_incidente" title="">Reporte por Tipo de Incidente</a></li>
                <li class="last"><a href="<?= base_url()?>admin/reporte_tipo_incidente_zona" title="">Reporte por Zona y Tipo de Incidente</a></li>
                <li class="last"><a href="<?= base_url()?>admin/reporte_tipo_incidente_zona_estado" title="">Reporte por Zona, Tipo de Incidente y Estado Actual</a></li>
                <li class="last"><a href="<?= base_url()?>admin/reporte_tipo_incidente_zona_urbanizacion" title="">Reporte por Zona, Tipo de Incidente y Urbanización</a></li>
                <li class="last"><a href="#" title="">Reporte por Totales Anuales y Mensuales</a></li>
                <li class="last"><a href="#" title="">Reporte en Mapa por Tipo y Zona</a></li>
                <li class="last"><a href="#" title="">Reporte Gráfico</a></li>
                
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

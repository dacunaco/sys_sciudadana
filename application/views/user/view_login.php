<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<link rel="shortcut icon" href="<?= base_url()?>assets/images/icono.png" type="image/x-icon" />	
<title>..:: Municipalidad Provincial de Trujillo ::.. - Login</title>
<link href="<?= base_url()?>assets/css/main.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>

<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/spinner/ui.spinner.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/spinner/jquery.mousewheel.js"></script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/charts/excanvas.min.js"></script>
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

<!-- Shared on MafiaShare.net  --><!-- Shared on MafiaShare.net  --></head>

<body class="nobg loginPage">

<!-- Top fixed navigation -->
<div class="topNav">
    <div class="wrapper">
        <div class="userNav">
            <ul>
                <li><a href="#" title=""><img src="<?= base_url()?>assets/images/icons/topnav/mainWebsite.png" alt="" /><span>Sitio Principal</span></a></li>
                <li><a href="#" title=""><img src="<?= base_url()?>assets/images/icons/topnav/profile.png" alt="" /><span>Contactar Administrador</span></a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>


<!-- Main content wrapper -->
<div class="loginWrapper">
    <div class="loginLogo"><img src="<?= base_url()?>assets/images/loginLogo.png" alt=""  /></div>
    <div class="widget">
        <div class="title"><img src="<?= base_url()?>assets/images/icons/dark/files.png" alt="" class="titleIcon" /><h6>Panel de Usuario</h6></div>
        <form action="<?= base_url()?>user/login" id="validate" class="form" method="post">
            <fieldset>
                <div class="formRow">
                    <label for="login">Usuario:</label>
                    <div class="loginInput"><input type="text" name="login" placeholder="Ingrese nombre de usuario" class="validate[required]" id="login" /></div>
                    <div class="clear"></div>
                </div>
                
                <div class="formRow">
                    <label for="pass">Contraseña:</label>
                    <div class="loginInput"><input type="password" name="password" placeholder="Ingrese contraseña" class="validate[required]" id="pass" /></div>
                    <div class="clear"></div>
                </div>
                
                <div class="loginControl">
                    <div class="rememberMe"><label for="remMe"><?php if(isset($mensaje)){echo $mensaje;}?></label></div>
                    <input type="submit" value="Iniciar sesión" class="dredB logMeIn" />
                    <div class="clear"></div>
                </div>
            </fieldset>
        </form>
    </div>
</div>    

<!-- Footer line -->
<div id="footer">
    <div class="wrapper">Todo los derechos reservados por <a href="<?= base_url()?>" title="">La Municipalidad Provincial de Trujillo</a></div>
</div>


</body>
</html>
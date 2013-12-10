<?php echo $map['js']; ?>
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
<style>
    .timeEntry_control{
        background: url('<?= base_url()?>assets/images/forms/spinnerUpDown.png') !important;
    }
</style>
<script>
    function datos(){
        var coordenadas = $("#coordenadas").val();
        if(coordenadas == ""){
            alert("Seleccione una posici&oacute;n");
            document.getElementById("coordenadas").focus();
        }else{
            opener.document.validate.coordenadas.value = coordenadas;
            window.close();
        }
    }
</script>

        <!-- Form -->
        <form action="#" class="form" id="validate" method="post">
            <fieldset>
                <div class="widget">
                    <div class="title"><img src="<?= base_url()?>assets/images/icons/dark/list.png" alt="" class="titleIcon" /><h6>Coordenadas</h6></div>
                    <div class="formSubmit"><input type="hidden" name="coordenadas" id="coordenadas" class="validate[required]"/><input type="button" value="Enviar Coordenadas" class="redB" id="submit" onclick="datos();" /></div>
                    <div class="clear"></div>
                    <table width="580" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="95%" align="center" style="padding-bottom: 20px;">
                                <div id="map" class="map" style="width: 95%;"><?php echo $map['html']; ?></div>
                            </td>
                        </tr>
                    </table>
                </div>
            </fieldset>
        </form>
    
    <!-- Footer line -->
   
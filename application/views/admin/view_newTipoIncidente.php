<script type="text/javascript" src="<?= base_url()?>assets/ajaxupload/ajaxfileupload.js"></script>
<script>
    $(window).load(function() {
        $('#validate').submit(function(e) {
        e.preventDefault();
        $.ajaxFileUpload({
           url         :'<?= base_url()?>admin/newTipoIncidente', 
           secureuri      :false,
           fileElementId  :'imagen',
           dataType    : 'json',
           data        : {
              'tipoincidente'           : $('#tipoincidente').val()
           },
           success  : function (data, status)
           {
              if(data.status != 'error')
              {
                 $('#tipoincidente').val('');
              }
              alert(data.msg);
           }
        });
        return false;
     });
    }
</script>
    <!-- Title area -->
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5>Gestión de Tipos de Incidentes</h5>
                <span>Sistema de gestión de incidencias.</span>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    
    <div class="line"></div>
    
    <div class="wrapper">
        <!-- Form -->
        <form action="" class="form" id="validate" method="post">
            <fieldset>
                <div class="widget">
                    <div class="title"><img src="<?= base_url()?>assets/images/icons/dark/list.png" alt="" class="titleIcon" /><h6>Registro de Tipos de Incidentes</h6></div>
                    <div class="formRow">
                        <label>Nombre de Tipo de Incidente:</label>
                        <div class="formRight"><input type="text" value="" name="tipoincidente" id="tipoincidente" class="validate[required]" /></div>
                        <div class="clear"></div>
                    </div> 
                    <div class="formRow">
                        <label>Imagen:</label>
                        <div class="formRight">
                                <input type="file" id="imagen" name="imagen" class="validate[required]" />
                        </div><div class="clear"></div>
                    </div>
                    <div class="formSubmit"><input type="submit" value="Guardar" class="redB" /></div>
                    <div class="clear"></div>
                </div>
            </fieldset>
        </form>
        </div>
    </div>
    
    <!-- Footer line -->
   
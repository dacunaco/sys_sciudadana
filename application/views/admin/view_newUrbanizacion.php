<style>
    #resultados{
        float: left;
        margin-top: 5px;
        margin-right: 10px;
    }
</style>
<script>
    $(window).load(function() {
        document.getElementById("zona").focus();
        $('.redB').click(function(){
             $("#validate").validate({
                rules: {
                    zona: { 
                        required: true,    
                    },
                    cuadrante:{
                        required: true,
                    },
                    urbanizacion:{
                        required: true,
                    }
                },
                messages: { 
                    zona: {
                        required:"Seleccione una zona para continuar."
                     },
                     cuadrante:{
                        required:"Seleccione un cuadrante para continuar."
                     },
                     urbanizacion:{
                         required:"Ingrese descripción de la urbanización para continuar."
                     } 
                },
                submitHandler: function(form) {
                    $(form).ajaxSubmit({
                        url:"<?= base_url()?>admin/newUrbanizacion",
                        type:"post",
                        success: function(data){
                            document.getElementById("submit").disabled = false;
                            $("#resultados").html("");
                            $.jGrowl(data, { header: 'Mensaje del Sistema' });
                            window.setTimeout(function () {
                                location.href = "<?= base_url()?>admin/nueva_urbanizacion";
                            }, 1500);
                        },
                        beforeSend: function(){
                            $("#resultados").html('<img src="<?= base_url()?>assets/images/loaders/loader.gif" alt="" style="margin: 5px;" />');
                            document.getElementById("submit").disabled = true;
                        },
                        error:function(){
                            $("#resultados").html('Hubo un error mientras se insertaba los datos.');
                        }
                    });
              }
            }); 
        });
        $("#zona").change(function() {
            $("#zona option:selected").each(function() {
                var zona = $('#zona').val();
                $.ajax({
                    url: "<?= base_url()?>admin/cargarCuadrantes",
                    type: "post",
                    data: "zona="+zona,
                    success: function(data){
                        $("#cuadrante").html(data);
                        $("#waiting").html('');
                    },
                    beforeSend: function(){
                        $("#waiting").html('<img src="<?= base_url()?>assets/images/loaders/loader.gif" alt="" style="margin: 5px;" />');
                    },
                    error:function(){
                        $("#waiting").html('Hubo un error mientras se cargaba los datos.');
                    }
                });
            });
        });
    });
</script>
    <!-- Title area -->
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5>Gestión de Urbanizaciones</h5>
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
                    <div class="title"><img src="<?= base_url()?>assets/images/icons/dark/list.png" alt="" class="titleIcon" /><h6>Registro de Urbanizaciones</h6></div>
                    <div class="formRow">
                        <label>Zona:<span class="req">*</span></label>
                        <div class="formRight">
                            <select name="zona" id="zona">
                                <option value="">Seleccione una zona</option>
                                <?php
                                    foreach ($zonas as $row_zona){?>
                                        <option value="<?= $row_zona->idzona?>"><?= $row_zona->strnombrezona?></option> 
                                    <?php }
                                ?>
                            </select>           
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Cuadrante:<span class="req">*</span></label>
                        <div class="formRight">
                            <select name="cuadrante" id="cuadrante">
                                <option value="">Seleccione un cuadrante</option>
                            </select>           
                        </div>
                        <div class="formRight" id="waiting"></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Nombre de Urbanización:<span class="req">*</span></label>
                        <div class="formRight"><input type="text" value="" name="urbanizacion" id="urbanizacion"/></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formSubmit"><input type="submit" value="Guardar" class="redB" id='submit' /></div>
                    <div class="clear"></div>
                </div>
            </fieldset>
        </form>
        </div>
    </div>
    
    <!-- Footer line -->
   
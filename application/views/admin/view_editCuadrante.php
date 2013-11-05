<style>
    #resultados{
        float: left;
        margin-top: 5px;
        margin-right: 10px;
    }
</style>
<script>
    $(window).load(function() {
        document.getElementById("cuadrante").focus();
        $('.redB').click(function(){
             $("#validate").validate({
                rules: {
                    zona: { 
                        required: true,    
                    },
                    cuadrante:{
                        required: true,
                    }
                },
                messages: { 
                    zona: {
                        required:"Por favor selecciona una zona."
                     },
                     cuadrante:{
                        required:"Ingrese descripción para el cuadrante."
                     }
                },
                submitHandler: function(form) {
                    $(form).ajaxSubmit({
                        url:"<?= base_url()?>admin/editCuadrante",
                        type:"post",
                        success: function(data){
                            document.getElementById("submit").disabled = false;
                            $("#resultados").html("");
                            $.jGrowl(data, { header: 'Mensaje del Sistema' });
                            window.setTimeout(function () {
                                location.href = "<?= base_url()?>admin/listado_cuadrantes";
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
    });
</script>
    <!-- Title area -->
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5>Gestión de Cuadrantes</h5>
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
                    <div class="title"><img src="<?= base_url()?>assets/images/icons/dark/list.png" alt="" class="titleIcon" /><h6>Registro de Cuadrantes</h6></div>
                    <?php
                        foreach ($cuadrante as $row_cuadrante){?>
                            <div class="formRow">
                                <label>Zona:<span class="req">*</span></label>
                                <div class="formRight">
                                    <select name="zona" id="zona">
                                        <option value="">Seleccione una zona</option>
                                        <?php
                                            foreach ($zonas as $row_zona){
                                                if($row_zona->idzona == $row_cuadrante->idzona){?>
                                                    <option value="<?= $row_zona->idzona?>" selected="selected"><?= $row_zona->strnombrezona?></option> 
                                                <?php }else{?>
                                                    <option value="<?= $row_zona->idzona?>"><?= $row_zona->strnombrezona?></option> 
                                                <?php }?>
                                            <?php }
                                        ?>
                                    </select>           
                                </div>
                                <div class="formRight" id="waiting"></div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label>Nombre de Cuadrante:<span class="req">*</span></label>
                                <div class="formRight"><input type="text" id="cuadrante" name="cuadrante" value="<?= $row_cuadrante->strnombrecuadrante?>" /><input type="hidden" id='id' name='id' value="<?= $row_cuadrante->idcuadrante?>"></div>
                                <div class="clear"></div>
                            </div>
                        <?php }
                    ?>
                    <div class="formSubmit"><input type="submit" value="Guardar" class="redB" id="submit" /><div id="resultados"></div></div>
                    <div class="clear"></div>
                </div>
            </fieldset>
        </form>
        </div>
    </div>
    
    <!-- Footer line -->
   
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
                    region:{
                        required: true,
                    },
                    provincia:{
                        required: true,
                    },
                    distrito:{
                        required: true,
                    }
                },
                messages: { 
                    zona: {
                        required:"Por favor ingrese una descripción para la zona."
                     },
                     region:{
                        required:"Seleccione una región para continuar."
                     },
                     provincia:{
                         required:"Seleccione una provincia para continuar."
                     },
                     distrito:{
                         required:"Seleccione un distrito para continuar."
                     }
                },
                submitHandler: function(form) {
                    $(form).ajaxSubmit({
                        url:"<?= base_url()?>admin/editZona",
                        type:"post",
                        success: function(data){
                            document.getElementById("submit").disabled = false;
                            $("#resultados").html("");
                            $.jGrowl(data, { header: 'Mensaje del Sistema' });
                            window.setTimeout(function () {
                                location.href = "<?= base_url()?>admin/listado_zonas";
                            }, 1500);
                        },
                        beforeSend: function(){
                            $("#resultados").html('<img src="<?= base_url()?>assets/images/loaders/loader.gif" alt="" style="margin: 5px;" />');
                            document.getElementById("submit").disabled = true;
                        },
                        error:function(){
                            $("#resultados").html('Hubo un error mientras se modificaba los datos.');
                        }
                    });
              }
            }); 
        });
        $("#region").change(function() {
            $("#region option:selected").each(function() {
                var departamento = $('#region').val();
                $.ajax({
                    url: "<?= base_url()?>admin/cargarProvincias",
                    type: "post",
                    data: "departamento="+departamento,
                    success: function(data){
                        $("#provincia").html(data);
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
        $("#provincia").change(function() {
            $("#provincia option:selected").each(function() {
                var provincia = $('#provincia').val();
                $.ajax({
                    url: "<?= base_url()?>admin/cargarDistritos",
                    type: "post",
                    data: "provincia="+provincia,
                    success: function(data){
                        $("#distrito").html(data);
                        $("#waiting1").html('');
                    },
                    beforeSend: function(){
                        $("#waiting1").html('<img src="<?= base_url()?>assets/images/loaders/loader.gif" alt="" style="margin: 5px;" />');
                    },
                    error:function(){
                        $("#waiting1").html('Hubo un error mientras se cargaba los datos.');
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
                <h5>Gestión de Zonas</h5>
                <span>Sistema de gestión de incidencias.</span>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    
    <div class="line"></div>
    
    <div class="wrapper">
        <!-- Form -->
        <form class="form" id="validate" method="post">
            <fieldset>
                <div class="widget">
                    <div class="title"><img src="<?= base_url()?>assets/images/icons/dark/list.png" alt="" class="titleIcon" /><h6>Registro de Zonas</h6></div>
                    <?php
                        foreach ($zona as $row_zona){?>
                            <div class="formRow">
                                <label>Nombre de Zona:<span class="req">*</span></label>
                                <div class="formRight"><input type="text" id="zona" name="zona" value="<?= $row_zona->strnombrezona?>" /></div>
                                <div class="clear"></div>
                            </div>   
                            <div class="formRow">
                                <label>Región:<span class="req">*</span></label>
                                <div class="formRight">
                                    <select name="region" id="region">
                                        <option value="">Seleccione un región</option>
                                        <?php
                                            $departamentos = $this->Admin_model->getDepartamentos();
                                            
                                            foreach ($departamentos as $row_departamento){
                                                if($row_departamento->IdDepartamento == $row_zona->IdDepartamento){?>
                                                    <option value="<?= $row_departamento->IdDepartamento?>" selected="selected"><?= $row_departamento->Nombre?></option>
                                                <?php }else{?>
                                                    <option value="<?= $row_departamento->IdDepartamento?>"><?= $row_departamento->Nombre?></option>
                                                <?php }
                                             }
                                        ?>
                                    </select>           
                                </div>             
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label>Provincia:<span class="req">*</span></label>
                                <div class="formRight">
                                    <select name="provincia" id="provincia">
                                        <option value="">Seleccione una provincia</option>
                                        <?php
                                            $provincias = $this->Admin_model->getProvincias($row_zona->IdDepartamento);
                                            
                                            foreach ($provincias as $row_provincia){
                                                if($row_provincia->IdProvincia == $row_zona->IdProvincia){?>
                                                    <option value="<?= $row_provincia->IdProvincia?>" selected="selected"><?= $row_provincia->Nombre?></option>
                                                <?php }else{?>
                                                    <option value="<?= $row_provincia->IdProvincia?>"><?= $row_provincia->Nombre?></option>
                                                <?php }
                                             }
                                        ?>
                                    </select>           
                                </div>
                                <div class="formRight" id="waiting"></div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label>Distrito:<span class="req">*</span></label>
                                <div class="formRight">
                                    <select name="distrito" id="distrito">
                                        <option value="">Seleccione un distrito</option>
                                        <?php
                                            $distritos = $this->Admin_model->getDistritos($row_zona->IdProvincia);
                                            
                                            foreach ($distritos as $row_distrito){
                                                if($row_distrito->IdDistrito == $row_zona->IdDistrito){?>
                                                    <option value="<?= $row_distrito->IdDistrito?>" selected="selected"><?= $row_distrito->Nombre?></option>
                                                <?php }else{?>
                                                    <option value="<?= $row_distrito->IdDistrito?>"><?= $row_distrito->Nombre?></option>
                                                <?php }
                                             }
                                        ?>
                                    </select>  
                                    <input type="hidden" id="id" name="id" value="<?= $row_zona->idzona?>">
                                </div> 
                                <div class="formRight" id="waiting1"></div>
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
   
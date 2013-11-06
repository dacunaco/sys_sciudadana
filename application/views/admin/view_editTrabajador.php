<style>
    #resultados{
        float: left;
        margin-top: 5px;
        margin-right: 10px;
    }
</style>
<script>
    $(window).load(function() {
        document.getElementById("codigo").focus();
        $('.redB').click(function(){
             $("#validate").validate({
                rules: {
                    codigo: { 
                        required: true, 
                    },
                    nombres:{
                        required: true,
                    },
                    apellidopaterno: {
                        required: true,
                    },
                    apellidomaterno: {
                        required: true,
                    },
                    direccion: {
                        required: true,
                    },
                    dni: {
                        required: true,
                        number: true,
                    },
                    sexo: {
                      required: true,  
                    },
                    fechanacimiento: {
                        required: true,
                    }
                    
                },
                messages: { 
                    codigo: { 
                        required: "Ingrese código para continuar",   
                    },
                    nombres:{
                        required: "Ingrese nombres para continuar",
                    },
                    apellidopaterno: {
                        required: "Ingrese apellido paterno para continuar",
                    },
                    apellidomaterno: {
                        required: "Ingrese apellido materno para continuar",
                    },
                    direccion: {
                        required: "Ingrese dirección para continuar",
                    },
                    dni: {
                        required: "Ingrese DNI para continuar",
                    },
                    sexo:{
                        required: "Seleccione sexo",
                    },
                    fechanacimiento: {
                        required: "Seleccione fecha de nacimiento",
                    }
                },
                submitHandler: function(form) {
                    $(form).ajaxSubmit({
                        url:"<?= base_url()?>admin/editTrabajador",
                        type:"post",
                        success: function(data){
                            document.getElementById("submit").disabled = false;
                            $("#resultados").html("");
                            $.jGrowl(data, { header: 'Mensaje del Sistema' });
                            window.setTimeout(function () {
                                location.href = "<?= base_url()?>admin/listado_trabajadores";
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
                <h5>Gestión de Trabajadores</h5>
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
                    <div class="title"><img src="<?= base_url()?>assets/images/icons/dark/list.png" alt="" class="titleIcon" /><h6>Edición de Trabajadores</h6></div>
                    <?php
                        foreach ($trabajador as $row_trabajador){?>
                            <div class="formRow">
                                <label>Código:<span class="req">*</span></label>
                                <div class="formRight"><input type="text" value="<?= $row_trabajador->strcodigo?>" style="width: 150px !important" name="codigo" id="codigo" /></div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label>Nombres:<span class="req">*</span></label>
                                <div class="formRight"><input type="text" value="<?= $row_trabajador->strnombres?>" name="nombres" id="nombres" /></div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label>Apellido Paterno:<span class="req">*</span></label>
                                <div class="formRight"><input type="text" value="<?= $row_trabajador->strapellidopaterno?>" name="apellidopaterno" id="apellidopaterno" /></div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label>Apellido Materno:<span class="req">*</span></label>
                                <div class="formRight"><input type="text" value="<?= $row_trabajador->strapellidomaterno?>" name="apellidomaterno" id="apellidomaterno" /></div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label>Dirección:<span class="req">*</span></label>
                                <div class="formRight"><input type="text" value="<?= $row_trabajador->strdireccion?>" name="direccion" id="direccion" /></div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label>DNI:<span class="req">*</span></label>
                                <div class="formRight"><input type="text" value="<?= $row_trabajador->strdni?>" style="width: 150px !important" name="dni" id="dni" maxlength="8" /></div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label>Sexo:<span class="req">*</span></label>
                                <div class="formRight">
                                    <?php
                                        $data = array(
                                            '' => "Seleccione un sexo",
                                            'M' => "Masculino",
                                            'F' => "Femenino"
                                        );
                                        
                                        echo form_dropdown("sexo", $data, $row_trabajador->strsexo);
                                    ?>         
                                </div>
                                <div class="formRight" id="waiting"></div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label>Fecha de Nacimiento:<span class="req">*</span></label>
                                <div class="formRight">
                                    <input type="text" class="datepicker" name="fechanacimiento" id="fechanacimiento" value="<?= date("d-m-Y", strtotime($row_trabajador->datfechanacimiento))?>"/>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label>Teléfono:</label>
                                <div class="formRight"><input type="text" name="telefono" id="telefono" style="width: 150px !important" value="<?= $row_trabajador->strtelefono?>"/><input type="hidden" name="id" id="id" value="<?= $row_trabajador->idtrabajador?>"></div>
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
   
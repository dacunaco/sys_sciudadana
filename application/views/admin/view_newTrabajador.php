
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
                    <div class="title"><img src="<?= base_url()?>assets/images/icons/dark/list.png" alt="" class="titleIcon" /><h6>Registro de Trabajadores</h6></div>
                    <div class="formRow">
                        <label>Código:</label>
                        <div class="formRight"><input type="text" value="" style="width: 150px !important" name="codigo" id="codigo" class="validate[required]" /></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Nombres:</label>
                        <div class="formRight"><input type="text" value="" name="nombres" id="nombres" class="validate[required]" /></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Apellido Paterno:</label>
                        <div class="formRight"><input type="text" value="" name="apellidopaterno" id="apellidopaterno" class="validate[required]" /></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Apellido Materno:</label>
                        <div class="formRight"><input type="text" value="" name="apellidomaterno" id="apellidomaterno" class="validate[required]" /></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Dirección:</label>
                        <div class="formRight"><input type="text" value="" name="direccion" id="direccion" class="validate[required]" /></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>DNI:</label>
                        <div class="formRight"><input type="text" value="" style="width: 150px !important" name="dni" id="dni" class="validate[required,custom[onlyNumberSp]]" maxlength="8" /></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Fecha de Nacimiento:</label>
                        <div class="formRight">
                            <input type="text" class="datepicker" name="fechanacimiento" id="fechanacimiento" class="validate[required]" />
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Teléfono:</label>
                        <div class="formRight"><input type="text" value="" style="width: 150px !important" /></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formSubmit"><input type="submit" value="Guardar" class="redB" /></div>
                    <div class="clear"></div>
                </div>
            </fieldset>
        </form>
        </div>
    </div>
    
    <!-- Footer line -->
   
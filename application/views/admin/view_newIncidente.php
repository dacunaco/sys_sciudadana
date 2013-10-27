<style>
    .timeEntry_control{
        background: url('<?= base_url()?>assets/images/forms/spinnerUpDown.png') !important;
    }
</style>
    <!-- Title area -->
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5>Gestión de Incidentes</h5>
                <span>Sistema de gestión de incidencias.</span>
            </div>
            <div class="middleNav">
                <ul>
                    <li class="mUser"><a title="Usuarios" class="tipN"><span class="users"></span></a>
                        <ul class="mSub1">
                            <li><a href="#" title="">Nuevo Incidente</a></li>
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
    
    <div class="wrapper">
        <!-- Form -->
        <form action="" class="form" id="validate" method="post">
            <fieldset>
                <div class="widget">
                    <div class="title"><img src="<?= base_url()?>assets/images/icons/dark/list.png" alt="" class="titleIcon" /><h6>Registro de Incidentes</h6></div>
                    <div class="formRow">
                        <label>Zona:</label>
                        <div class="formRight searchDrop">
                        <select data-placeholder="Seleccione Zona..." class="chzn-select" style="width:150px;" tabindex="2">
                            <option value=""></option>
                        </select>
                        </div>             
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Cuadrante:</label>
                        <div class="formRight searchDrop">
                        <select data-placeholder="Seleccione Cuadrante..." class="chzn-select" style="width:150px;" tabindex="2">
                            <option value=""></option>
                        </select>
                        </div>             
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Urbanización:</label>
                        <div class="formRight searchDrop">
                        <select data-placeholder="Seleccione Urbanización..." class="chzn-select" style="width:150px;" tabindex="2">
                            <option value=""></option>
                        </select>
                        </div>             
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Tipo de Incidente:</label>
                        <div class="formRight searchDrop">
                        <select data-placeholder="Seleccione Tipo de Incidente..." class="chzn-select" style="width:150px;" tabindex="2">
                            <option value=""></option>
                        </select>
                        </div>             
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Descripción:</label>
                        <div class="formRight"><textarea rows="8" cols="" name="descripcion" id="descripcion" class="validate[required]"></textarea></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Coordenadas:</label>
                        <div class="formRight"><input type="text" value="" name="coordenadas" id="coordenadas" class="validate[required]" /></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Fecha:</label>
                        <div class="formRight">
                            <input type="text" class="datepicker" name="fecha" id="fecha" class="validate[required]" />
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Hora:</label>
                        <div class="formRight">
                            <input type="text" class="timepicker" size="10" name="hora" id="hora" class="validate[required]" />
                        </div>
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
   
    <!-- Title area -->
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5>Búsqueda de Incidentes</h5>
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
                    <div class="title"><img src="<?= base_url()?>assets/images/icons/dark/list.png" alt="" class="titleIcon" /><h6>Búsqueda por zona, cuadrante y urbanización</h6></div>
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
                    <div class="formSubmit"><input type="submit" value="Buscar" class="redB" /></div>
                    <div class="clear"></div>
                </div>
            </fieldset>
        </form>
        <form action="" class="form" id="validate" method="post">
            <fieldset>
                <div class="widget">
                    <div class="title"><img src="<?= base_url()?>assets/images/icons/dark/list.png" alt="" class="titleIcon" /><h6>Búsqueda por fecha</h6></div>
                    <div class="formRow">
                        <label>Fecha:</label>
                        <div class="formRight">
                            <input type="text" class="datepicker" name="fecha" id="fecha" class="validate[required]" />
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formSubmit"><input type="submit" value="Buscar" class="redB" /></div>
                    <div class="clear"></div>
                </div>
            </fieldset>
        </form>
        <form action="" class="form" id="validate" method="post">
            <fieldset>
                <div class="widget">
                    <div class="title"><img src="<?= base_url()?>assets/images/icons/dark/list.png" alt="" class="titleIcon" /><h6>Búsqueda por estado</h6></div>
                    <div class="formRow">
                        <label>Estado:</label>
                        <div class="formRight searchDrop">
                        <select data-placeholder="Seleccione Estado..." class="chzn-select" style="width:150px;" tabindex="2">
                            <option value=""></option>
                        </select>
                        </div>             
                        <div class="clear"></div>
                    </div>
                    <div class="formSubmit"><input type="submit" value="Buscar" class="redB" /></div>
                    <div class="clear"></div>
                </div>
            </fieldset>
        </form>
        </div>
    </div>
    
    <!-- Footer line -->
   
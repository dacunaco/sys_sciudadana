    <!-- Title area -->
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5>Reporte de Incidentes - Por Tipos de Incidentes, Zonas y Estado</h5>
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
                    <div class="title"><img src="<?= base_url()?>assets/images/icons/dark/list.png" alt="" class="titleIcon" /><h6>Búsqueda por tipos de incidentes, zonas y estado</h6></div>
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
                        <label>Zona:</label>
                        <div class="formRight searchDrop">
                        <select data-placeholder="Seleccione Zona..." class="chzn-select" style="width:150px;" tabindex="2">
                            <option value=""></option>
                        </select>
                        </div>             
                        <div class="clear"></div>
                    </div>
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
   
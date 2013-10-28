<script>
    $( document ).ready(function() {
    lightBox();
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
        <form action="" class="form" id="validate" method="post">
            <fieldset>
                <div class="widget">
                    <div class="title"><img src="<?= base_url()?>assets/images/icons/dark/list.png" alt="" class="titleIcon" /><h6>Registro de Zonas</h6></div>
                    <div class="formRow">
                        <label>Nombre de Zona:</label>
                        <div class="formRight"><input type="text" value="" id="zona" name="zona" class="validate[required]" /></div>
                        <div class="clear"></div>
                    </div>   
                    <div class="formRow">
                        <label>Región:</label>
                        <div class="formRight searchDrop">
                        <select data-placeholder="Seleccione Región..." class="chzn-select" style="width:150px;" tabindex="2">
                            <option value=""></option>
                        </select>
                        </div>             
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Provincia:</label>
                        <div class="formRight searchDrop">
                        <select data-placeholder="Seleccione Provincia..." class="chzn-select" style="width:150px;" tabindex="2">
                            <option value=""></option>
                        </select>
                        </div>             
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Distrito:</label>
                        <div class="formRight searchDrop">
                        <select data-placeholder="Seleccione Distrito..." class="chzn-select" style="width:150px;" tabindex="2">
                            <option value=""></option>
                        </select>
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
   
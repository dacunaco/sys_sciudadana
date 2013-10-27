
    <!-- Title area -->
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5>Gestión de Tipos de Incidentes</h5>
                <span>Sistema de gestión de incidencias.</span>
            </div>
            <div class="middleNav">
                <ul>
                    <li class="mUser"><a title="Usuarios" class="tipN"><span class="users"></span></a>
                        <ul class="mSub1">
                            <li><a href="#" title="">Nuevo Tipo Incidente</a></li>
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
   
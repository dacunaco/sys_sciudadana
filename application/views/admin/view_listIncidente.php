        <script>
            $(window).load(function() {
               $( "#dialog-detalleincidente" ).dialog({
                    autoOpen: false,
                    modal: true
                }); 
                $( "#dialog-detalleincidente-list" ).dialog({
                    autoOpen: false,
                    modal: true
                }); 
                $("#dialog-detalleincidente-detalle").dialog({
                    autoOpen: false,
                    modal: true
                }); 
                $("#dialog-postdown").dialog({
                    autoOpen: false,
                    modal: true
                }); 
                $('.redB').click(function(){
                    $("#validate").validate({
                       rules: {
                           descripcion: {
                               required: true,
                           },
                           fecha:{
                               required: true,
                           },
                           hora: {
                             required: true,  
                           },
                           estado: {
                               required: true,
                           }

                       },
                       messages: { 
                           descripcion: { 
                               required: "Ingrese descripción para continuar",   
                           },
                           fecha:{
                               required: "Ingrese fecha para continuar",
                           },
                           hora: {
                               required: "Ingrese hora para continuar",
                           },
                           estado: {
                               required: "Seleccione un estado para continuar",
                           },
                       },
                       submitHandler: function(form) {
                           $(form).ajaxSubmit({
                               url:"<?= base_url()?>admin/newDetalleIncidente",
                               type:"post",
                               success: function(data){
                                   document.getElementById("submit").disabled = false;
                                   $("#resultados").html("");
                                   $.jGrowl(data, { header: 'Mensaje del Sistema' });
                                   $("#dialog-detalleincidente").dialog("close");
                                   getDetalle($("#incidente").val());
                                   limpiaForm($("#validate"));
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
               $('#submit2').click(function(){
                    $("#validate2").validate({
                       rules: {
                           conclusion: {
                               required: true,
                           }

                       },
                       messages: { 
                           conclusion: { 
                               required: "Seleccione estado para continuar",   
                           }
                       },
                       submitHandler: function(form) {
                           $(form).ajaxSubmit({
                               url:"<?= base_url()?>admin/concluirIncidente",
                               type:"post",
                               success: function(data){
                                   if(data == "1"){
                                       document.getElementById("submit2").disabled = false;
                                        $("#resultados2").html("");
                                        $.jGrowl("Se concluyó incidente correctamente", { header: 'Mensaje del Sistema' });
                                        $("#dialog-postdown").dialog("close");
                                        window.setTimeout(function () {
                                             location.href = "<?= base_url()?>admin/listado_incidentes";
                                         }, 1500);
                                   }else{
                                        document.getElementById("submit2").disabled = false;
                                        $("#resultados2").html("");
                                        $.jGrowl("No se pudo concluir el incidente porque tiene detalles pendientes", { header: 'Mensaje del Sistema' });
                                        $("#dialog-postdown").dialog("close");
                                   }
                               },
                               beforeSend: function(){
                                   $("#resultados2").html('<img src="<?= base_url()?>assets/images/loaders/loader.gif" alt="" style="margin: 5px;" />');
                                   document.getElementById("submit2").disabled = true;
                               },
                               error:function(){
                                   $("#resultados2").html('Hubo un error mientras se insertaba los datos.');
                               }
                           });
                     }
                   }); 
               });
            });
            
            function getDetalle(incidencia){
                $("#dialog-detalleincidente-list").dialog("open");
                document.getElementById("incidente").value = incidencia;
                
                $.ajax({
                    url: "<?= base_url()?>admin/get_detalle_incidente",
                    type: "post",
                    data: "incidente="+incidencia,
                    success: function(data){
                        $("#dialog-detalleincidente-list").html(data);
                    }
                });
            }
            
            function postDown(incidencia){
                $("#dialog-postdown").dialog("open");
                document.getElementById("incidenteconclusion").value = incidencia;
            }
            
            function newDetalle(){
                $("#dialog-detalleincidente-list").dialog("close");
                $("#dialog-detalleincidente").dialog("open");
            }
            
            function eliminarIncidente(incidencia){
                $.ajax({
                    url: "<?= base_url()?>admin/eliminar_incidente",
                    type: "post",
                    data: "incidente="+incidencia,
                    success: function(data){
                        if(data == "1"){
                            $.jGrowl("Se eliminó correctamente el incidente", { header: 'Mensaje del Sistema' });
                            window.setTimeout(function () {
                                location.href = "<?= base_url()?>admin/listado_incidentes";
                            }, 1500);
                        }else{
                            $.jGrowl("No se pudo eliminar el incidente", { header: 'Mensaje del Sistema' });
                            $("#waiting").html('');
                        }
                    },
                    beforeSend: function(){
                        $("#waiting").html('<img src="<?= base_url()?>assets/images/loaders/loader.gif" alt="" style="margin: 5px;" />');
                    },
                    error:function(){
                        $("#waiting").html('Hubo un error mientras se cargaba los datos.');
                    }
                });
            }
            
            function limpiaForm(miForm) {
                $(':input', miForm).each(function() {
                var type = this.type;
                var tag = this.tagName.toLowerCase();
                if (type == 'text' || type == 'password' || tag == 'textarea')
                this.value = "";
                else if (type == 'checkbox' || type == 'radio')
                this.checked = false;
                else if (tag == 'select')
                this.selectedIndex = 0;
                });
            }
            
            function editDetalleIncidente(detalle){
                $("#dialog-detalleincidente-list").dialog("close");
                $("#dialog-detalleincidente-detalle").dialog("open");
                
                $.ajax({
                    url: "<?= base_url()?>admin/get_edit_detalle_incidente",
                    type: "post",
                    data: "detalle="+detalle,
                    success: function(data){
                        $("#dialog-detalleincidente-detalle").html(data);
                    }
                });
            }
            
            function editarDetalleIncidente(){
                var vdescripcion = $("#descripciondetalle").val();
                var vfecha = $("#fechadetalle").val();
                var vhora = $("#horadetalle").val();
                var vestado = $("#estadodetalle option:selected").val();
                var vdetalle = $("#detalle").val();
                
                if(vdescripcion == ""){
                    alert("Ingresa un detalle para continuar");
                    document.getElementById("descripciondetalle").focus();
                }else if(vfecha == ""){
                    alert("Ingresa una fecha para continuar");
                    document.getElementById("fechadetalle").focus();
                }else if(vhora == ""){
                    alert("Ingresa una hora para continuar");
                    document.getElementById("horadetalle").focus();
                }else if(vestado == ""){
                    alert("Seleccione un estado para continuar");
                    document.getElementById("estadodetalle").focus();
                }else{
                    $.post("<?= base_url()?>admin/editar_detalle_incidencia",{detalle:vdetalle, descripcion: vdescripcion, fecha:vfecha, hora:vhora, estado: vestado},
                        function(data){
                            $.jGrowl(data, { header: 'Mensaje del Sistema' });
                           $("#dialog-detalleincidente-detalle").dialog("close");
                           getDetalle($("#incidente").val());
                        }
                    )
                }
            }
            
            function eliminardetalleIncidente(detalle){
                $.ajax({
                    url: "<?= base_url()?>admin/eliminar_detalle_incidente",
                    type: "post",
                    data: "detalle="+detalle,
                    success: function(data){
                        if(data == "1"){
                            $.jGrowl("Se eliminó correctamente el detalle de incidente", { header: 'Mensaje del Sistema' });
                            getDetalle($("#incidente").val());
                            $("#waiting").html('');
                        }else{
                            $.jGrowl("No se pudo eliminar el incidente", { header: 'Mensaje del Sistema' });
                            $("#waiting").html('');
                        }
                    },
                    beforeSend: function(){
                        $("#waiting").html('<img src="<?= base_url()?>assets/images/loaders/loader.gif" alt="" style="margin: 5px;" />');
                    },
                    error:function(){
                        $("#waiting").html('Hubo un error mientras se cargaba los datos.');
                    }
                });
            }
        </script>
        <style>
            .ui-dialog{
                width: auto !important;
            }
            .timeEntry_control{
                background: url('<?= base_url()?>assets/images/forms/spinnerUpDown.png') !important;
            }
            .ui-datepicker-append{
                display: none;
            }
            .timeEntry_control{
                float: left; 
                margin-top: 10px;
            }
        </style>
    <!-- Title area -->
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5>Gestión de Incidentes</h5>
                <span>Sistema de gestión de incidencias.</span>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    
    <div class="line"></div>
    
    <div class="wrapper">
        <!-- Form -->
        <!-- Dynamic table -->
        <a href="<?= base_url()?>admin/nuevo_incidente" title="" class="sButton sBlue" style="margin-top: 12px;"><img src="<?= base_url()?>assets/images/icons/sPlus.png" alt="" /><span>Registrar Incidente</span></a>
        <div class="widget">
            <div class="title"><img src="<?= base_url()?>assets/images/icons/dark/full2.png" alt="" class="titleIcon" /><h6>Listado de Incidentes</h6><div id="waiting" style="margin-top: 8px;float: left;"></div></div>                          
            <table cellpadding="0" cellspacing="0" border="0" class="display dTable">
            <thead>
            <tr>
            <th>N°</th>
            <th>Descripción</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Urbanización</th>
            <th>Cuadrante</th>
            <th>Zona</th>
            <th>Estado</th>
            <th>Detalle</th>
            <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $i = 1;
                foreach ($incidentes as $row_incidente){?>
                    <tr>
                        <td><?= $i?></td>
                        <td><?= $row_incidente->strdescripcionincidente?></td> 
                        <td><?= date('d/m/Y', strtotime($row_incidente->datfechahoraincidente))?></td>
                        <td><?= date('H:i:s', strtotime($row_incidente->datfechahoraincidente))?></td>
                        <td>
                            <?php
                                $urbanizacion = $this->db->get_where('urbanizacion',array('idurbanizacion' => $row_incidente->idurbanizacion))->result();
                                
                                foreach ($urbanizacion as $row_urbanizacion){ 
                                    echo $row_urbanizacion->strnombreurbanizacion;
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                $cuadrante = $this->db->get_where('cuadrante',array('idcuadrante' => $row_incidente->idcuadrante))->result();
                                
                                foreach ($cuadrante as $row_cuadrante){ 
                                    echo $row_cuadrante->strnombrecuadrante;
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                $zona = $this->db->get_where('zona',array('idzona' => $row_incidente->idzona))->result();
                                
                                foreach ($zona as $row_zona){ 
                                    echo $row_zona->strnombrezona;
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                if($row_incidente->strestadoincidente == "P"){
                                    echo "<span style='color:#DF7401'>Pendiente</span>";
                                }else if($row_incidente->strestadoincidente == "C"){
                                    echo "<span style='color:#0B610B'>Concluido</span>";
                                }
                            ?>
                        </td>
                        <?php
                            if($row_incidente->strestadoincidente == "C"){?>
                                <td align="center">
                                    <a href="<?= base_url()?>admin/view_map?iid=<?= $row_incidente->idincidente?>" id="view_map" title="" class="smallButton" style="margin: 5px;" ><img src="<?= base_url()?>assets/images/icons/dark/magnify.png" alt="" /></a>                  
                                </td>
                                <td align="center">
                                    -
                                </td>
                            <?php }else{?>
                                <td align="center">
                                    <a href="#" onclick="getDetalle('<?= $row_incidente->idincidente?>');" title="" class="smallButton" style="margin: 5px;"><img src="<?= base_url()?>assets/images/icons/dark/laptop.png" alt="" /></a>
                                    <a href="<?= base_url()?>admin/view_map?iid=<?= $row_incidente->idincidente?>" id="view_map" title="" class="smallButton" style="margin: 5px;" ><img src="<?= base_url()?>assets/images/icons/dark/magnify.png" alt="" /></a>    
                                    <a href="#" id="darbaja" title="" class="smallButton" style="margin: 5px;" onclick="postDown('<?= $row_incidente->idincidente?>');"><img src="<?= base_url()?>assets/images/icons/dark/like.png" alt="" /></a>  
                                </td>
                                <td align="center">
                                    <a href="<?= base_url()?>admin/editar_incidente?iid=<?= $row_incidente->idincidente?>" title="" class="smallButton" style="margin: 5px;"><img src="<?= base_url()?>assets/images/icons/dark/pencil.png" alt="" /></a>
                                    <a href="#" title="" class="smallButton" style="margin: 5px;" onclick="eliminarIncidente('<?= $row_incidente->idincidente?>')"><img src="<?= base_url()?>assets/images/icons/dark/close.png" alt="" /></a>
                                </td>
                            <?php }
                        ?>
                    </tr>
                <?php $i++;}
            ?>
            </tbody>
            </table>  
        </div>
        </div>
        <div id="dialog-detalleincidente" name="dialog-detalleincidente" title="Registrar detalles de incidente">
            <div class="uiForm">
                <form action="" class="form" id="validate">
                    <table cellspacing="0" cellpadding="0" border="0" width="300" style="text-align: left !important;">
                        <tr>
                            <td style="text-align: left !important;">
                                <strong>Descripción: <span class="req">*</span></strong><br />
                                <textarea rows="5" id="descripcion" name="descripcion" style="width: 290px;"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left !important;">
                                <strong>Fecha: <span class="req">*</span></strong><br />
                                <input type="text" class="datepicker" name="fecha" id="fecha" style="width: 290px !important;" />
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left !important;">
                                <strong>Hora: <span class="req">*</span></strong><br />
                                <input type="text" class="timepicker" size="10" name="hora" id="hora" style="width: 271px !important; float:left; height: 16px;" />
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left !important;">
                                <strong>Estado: <span class="req">*</span></strong><br />
                                <select name="estado" id="estado" style="width: 290px !important;">
                                    <option value="">Seleccione un estado...</option>
                                    <option value="P">Pendiente</option>
                                    <option value="C">Concluído</option>
                                </select>
                                <input type="hidden" name="incidente" id="incidente" value="">
                            </td>
                        </tr>
                        <tr>
                            <td align="center"><br /><input type="submit" value="Guardar" class="redB" id="submit" /><div id="resultados"></div></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div id="dialog-postdown" name="dialog-postdown" title="Concluir Incidente">
            <div class="uiForm">
                <form action="" class="form" id="validate2">
                    <table cellspacing="0" cellpadding="0" border="0" width="300" style="text-align: left !important;">
                        <tr>
                            <td style="text-align: left !important;">
                                <strong>Estado: <span class="req">*</span></strong><br />
                                <select name="conclusion" id="conclusion" style="width: 290px !important;">
                                    <option value="">Seleccione un estado...</option>
                                    <option value="C">Concluído</option>
                                </select>
                                <input type="hidden" name="incidenteconclusion" id="incidenteconclusion">
                            </td>
                        </tr>
                        <tr>
                            <td align="center"><br /><input type="submit" value="Guardar" class="redB" id="submit2" /><div id="resultados2"></div></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div id="dialog-detalleincidente-list" name="dialog-detalleincidente-list" title="Detalles de incidente"></div>
        <div id="dialog-detalleincidente-detalle" name="dialog-detalleincidente-detalle" title="Editar detalle incidente"></div>
    </div>
    
    <!-- Footer line -->
   
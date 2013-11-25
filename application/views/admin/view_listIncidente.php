        <script>
            $(window).load(function() {
               $( "#dialog-maps" ).dialog({
                    autoOpen: false,
                    modal: true
                }); 
            });
            function getMapa(incidencia){
                $.ajax({
                    url: "<?= base_url()?>admin/get_mapa_incidencia",
                    type: "post",
                    data: "incidente="+incidencia,
                    success: function(data){
                        $("#dialog-maps").html(data);
                        $("#dialog-maps").dialog("open");
                        $("#waiting").html('');
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
                        <td>
                            <a href="<?= base_url()?>admin/estados_incidente?iid=<?= $row_incidente->idincidente?>" title="" class="smallButton" style="margin: 5px;"><img src="<?= base_url()?>assets/images/icons/dark/laptop.png" alt="" /></a>
                            <a href="#" id="view_map" title="" class="smallButton" style="margin: 5px;" onclick="getMapa('<?= $row_incidente->idincidente?>');"><img src="<?= base_url()?>assets/images/icons/dark/magnify.png" alt="" /></a>    
                        </td>
                        <td>
                            <a href="<?= base_url()?>admin/editar_incidente?iid=<?= $row_incidente->idincidente?>" title="" class="smallButton" style="margin: 5px;"><img src="<?= base_url()?>assets/images/icons/dark/pencil.png" alt="" /></a>
                            <a href="#" title="" class="smallButton" style="margin: 5px;" onclick="eliminarTipoIncidente('<?= $row_incidente->idincidente?>')"><img src="<?= base_url()?>assets/images/icons/dark/close.png" alt="" /></a>
                        </td>
                    </tr>
                <?php }
            ?>
            </tbody>
            </table>  
        </div>
        </div>
        <div id="dialog-maps" name="dialog-maps" title="Mapa Generado"></div>
    </div>
    
    <!-- Footer line -->
   
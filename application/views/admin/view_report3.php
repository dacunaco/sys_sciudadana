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
    
    <div class="wrapper"><br />
        <!-- Form -->
        <!-- Dynamic table -->
        
        
            <?php
                foreach ($zonas as $row_zona){?>
                    <h1>Zona: <?= $row_zona->strnombrezona?></h1>
                    <?php
                        $ti = $this->db->get_where("tipo_incidente",array("idtipoincidente" => $tipoincidente))->result();
                        
                        foreach ($ti as $row_ti){?>
                            <br /><blockquote>Tipo de Incidente: <?= $row_ti->strtipoincidente?></blockquote>
                            <?php
                                $this->db->where("strestadoincidente",$estado);
                                $incidentes = $this->db->get_where("incidente",array("idtipoincidente" => $row_ti->idtipoincidente, "idzona" => $row_zona->idzona))->result();?>
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
                        <td align="center">
                            <a href="<?= base_url()?>admin/view_map?iid=<?= $row_incidente->idincidente?>" id="view_map" title="" class="smallButton" style="margin: 5px;" ><img src="<?= base_url()?>assets/images/icons/dark/magnify.png" alt="" /></a>                  
                        </td>
                           
                    </tr>
                <?php $i++;}
            ?>
            </tbody>
            </table>  </div><br />
                        <?php }
                    ?>
                <?php }
            ?>
            
        
        </div>
    </div>
    
    <!-- Footer line -->
   
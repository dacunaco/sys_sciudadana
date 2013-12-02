<?php
    foreach ($detalle as $row_detalle){?>
        <div class="uiForm">
            <form action="" class="form" id="validate2">
                <table cellspacing="0" cellpadding="0" border="0" width="300" style="text-align: left !important;">
                    <tr>
                        <td style="text-align: left !important;">
                            <strong>Descripción: <span class="req">*</span></strong><br />
                            <textarea rows="5" id="descripcion2" name="descripcion2" style="width: 290px;"><?= $row_detalle->straccion?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left !important;">
                            <strong>Fecha: <span class="req">*</span></strong><br />
                            <input type="text" class="datepicker" name="fecha2" id="fecha2" style="width: 290px !important;" value="<?= date("d-m-Y",  strtotime($row_detalle->datfechahoradetalleincidente))?>" />
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left !important;">
                            <strong>Hora: <span class="req">*</span></strong><br />
                            <input type="text" class="timepicker" size="10" name="hora2" id="hora2" value="<?= date("H:i:s",  strtotime($row_detalle->datfechahoradetalleincidente))?>" style="width: 271px !important; float:left; height: 16px;" />
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left !important;">
                            <strong>Estado: <span class="req">*</span></strong><br />
                            <select name="estado2" id="estado2" style="width: 290px !important;">
                                <option value="">Seleccione un estado...</option>
                                <option value="P">Pendiente</option>
                                <option value="C">Concluído</option>
                            </select>
                            <input type="hidden" name="detalle" id="detalle" value="<?= $row_detalle->iddetalleincidente?>">
                        </td>
                    </tr>
                    <tr>
                        <td align="center"><br /><input type="submit" value="Guardar" class="redB2" id="submit2" /><div id="resultados2"></div></td>
                    </tr>
                </table>
            </form>
        </div>
    <?php }
?>
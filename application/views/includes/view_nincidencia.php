<div class="cont" style="padding: 10px;text-align: justify !important;">
    <?= form_open('main/newIncidencia')?>
    <center><span style="font-weight: bold;">Formulario de Registro de Incidencias</span></center><br />    
        <fieldset>
            <legend style="font-size: 13px;"><strong>Nueva Incidencia</strong></legend>
            <table width="400" cellspacing="0" cellpadding="5" border="0">
                <tr>
                    <td style="font-size: 12px;"><strong>Nombres y Apellidos : </strong></td>
                    <td><input type="text" name="names" style="width: 200px;"></td>
                </tr>
                <tr>
                    <td style="font-size: 12px;"><strong>Estado de Incidencia : </strong></td>
                    <td>
                        <select name="estado" style="width: 204px;">
                            <option value="1">ALTA PELIGROSIDAD</option>
                            <option value="2">MEDIA PELIGROSIDAD</option>
                            <option value="3">BAJA PELIGROSIDAD</option>
                            <option value="4">SIN PELIGROSIDAD</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="font-size: 12px;"><strong>Coordenadas : </strong></td>
                    <td><input type="text" name="coordenadas" value="<?= $co?>">&nbsp;<a onclick="getCoordenadas();" style="background: #0066cc;color: #fff;padding-left: 10px;padding-right: 10px;">OC</a></td>
                </tr>
                <tr>
                    <td style="font-size: 12px;" valign="top"><strong>Descripción : </strong></td>
                    <td><textarea name="descripcion" rows="4" style="width: 200px;"></textarea></td>
                </tr>
                <tr>
                    <td colspan="2" align="Center"><input type="submit" value="Guardar"></td>
                </tr>
            </table>
        </fieldset>
    <?= form_close()?>
</div>


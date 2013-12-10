<script type="text/javascript" src="<?= base_url()?>assets/highcharts/js/highcharts.js"></script>
<script src="<?= base_url()?>assets/highcharts/js/modules/exporting.js"></script>
<script type="text/javascript">
    $(window).load(function() {   
        var chart1;
        var chart2;
        var chart3;
        chart1 = new Highcharts.Chart({
            chart:{
                renderTo: 'container',
                plotBackgroundColor: null,
                plotBorderWidth: 0,
                plotShadow: false
            },
            title: {
              text: 'Incidencias por Tipos de Incidentes'  
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            exporting: {
                filename: 'GP_ITIP'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectorColor: '#000000',
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: <?= $percentage?>
            
            
        });
        
        chart2 = new Highcharts.Chart({
            chart:{
                renderTo: 'container2',
                type: 'column'
            },
            title: {
              text: 'Incidencias por Tipos de Incidentes'  
            },
            xAxis: {
                categories: <?= $axis_data?>
            },
            exporting: {
                filename: 'GP_ITIC'
            },
            yAxis: {
                title: {
                    text: 'Cantidad de Incidencias Registradas'
                }
            },
            series: <?= $series_data?>
        });
        
        chart3 = new Highcharts.Chart({
            chart:{
                renderTo: 'container3',
                type: 'column'
            },
            title: {
              text: 'Comparativo de incidencias entre <?= $mes1?> y <?= $mes2?>'  
            },
            xAxis: {
                categories: <?= $axis_data?>
            },
            exporting: {
                filename: 'GP_ITIF'
            },
            yAxis: {
                title: {
                    text: 'Cantidad de Incidencias Registradas'
                }
            },
            series: <?= $series_data2?>
            
        });
    });
    function update_chart(){
            var vmes1 = $("#mes1").val();
            var vmes2 = $("#mes2").val();
            
            if(vmes1 == ""){
                alert("Seleccione el primer mes");
            }else if(vmes2 == ""){
                alert("Seleccione el segundo mes");
            }else{
                $.post("<?= base_url()?>admin/ajax_get_data",{mes1: vmes1, mes2: vmes2},function(data){
                    if(data.status == 'ok'){
                        chart3.series[0].setData(data.series_data[0]);
                        chart3.series[1].setData(data.series_data[1]);
                    }else{
                        alert(data.error_message);
                    }
                }, "json");
            }
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
    <div class="wrapper" name="container2" id="container2"></div><br />
    <div class="wrapper" name="container" id="container"></div><br />
    <div class="wrapper">
        <!-- Form -->
                <div class="widget">
                    <div class="title"><img src="<?= base_url()?>assets/images/icons/dark/list.png" alt="" class="titleIcon" /><h6>Obtener gráfico comparativo entre meses.</h6></div>
                    <div class="formRow">
                        <label>Primer mes:<span class="req">*</span></label>
                        <div class="formRight">
                            <select name="mes1" id="mes1">
                                <option value="">Seleccione primer mes</option>
                                <option value="01">Enero</option>
                                <option value="02">Febrero</option>
                                <option value="03">Marzo</option>
                                <option value="04">Abril</option>
                                <option value="05">Mayo</option>
                                <option value="06">Junio</option>
                                <option value="07">Julio</option>
                                <option value="08">Agosto</option>
                                <option value="09">Setiembre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>                                
                            </select>           
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Segundo mes:<span class="req">*</span></label>
                        <div class="formRight">
                            <select name="mes2" id="mes2">
                                <option value="">Seleccione segundo mes</option>
                                <option value="01">Enero</option>
                                <option value="02">Febrero</option>
                                <option value="03">Marzo</option>
                                <option value="04">Abril</option>
                                <option value="05">Mayo</option>
                                <option value="06">Junio</option>
                                <option value="07">Julio</option>
                                <option value="08">Agosto</option>
                                <option value="09">Setiembre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option> 
                            </select>           
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formSubmit"><input type="button" value="Obtener gráfico" onclick="update_chart();" class="redB"/></div>
                    <div class="clear"></div>
                </div>
        </div>
    <div class="wrapper" name="container3" id="container3"></div>
    </div>
    
    <!-- Footer line -->
   
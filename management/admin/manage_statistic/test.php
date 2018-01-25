<?php
require '../../../connect/connect.php';
require 'menu/time_format.php';
$sql_search_month="SELECT datatime,sum(money),sum(meter_united) FROM meter_management INNER JOIN house ON meter_management.house_id=house.house_id  WHERE (datatime between '2016-01-01' and '2017-12-31') and house.village_no='1' GROUP BY MONTH(datatime),YEAR(datatime) ORDER BY datatime ";
$objq_search=mysqli_query($conn,$sql_search_month);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Highcharts</title>
</head>

<body>

<div style="width:80%;margin:auto;">

    <div id="hc_container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script type="text/javascript">
    $(function () {
        $('#hc_container').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Monthly Average Rainfall'
            },
            subtitle: {
                text: 'Source: WorldClimate.com'
            },
            xAxis: {
                categories: [
                    <?php foreach ($objq_search as $r):?>
                    '<?php echo DateThai($r['datatime'])?>',
                    <?php endforeach;?>
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Rainfall (mm)'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Tokyo',
                data: [<?php foreach ($objq_search as $t):?>
                    <?php echo $t['sum(meter_united)']?>,
                    <?php endforeach;?>]

            } ]
        });
    });
</script>
</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: BB
 * Date: 2/12/2560
 * Time: 17:27
 */
require 'menu/sesion.php';
$sql="SELECT * FROM meter_management WHERE house_id = 10002";
$objq_search = mysqli_query($conn,$sql);
?>

<!DOCTYPE HTML>
<html>
<head>
    <script>
        window.onload = function () {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                title:{
                    text: "Music Album Sales by Year"
                },
                axisY: {

                },
                data: [{
                    yValueFormatString: "#,### Units",
                    xValueFormatString: "YYYY",
                    type: "spline",
                    dataPoints: [
                        <?php foreach ($objq_search as $r):?>
                        {x: new Date(<?php echo $r['datatime']?>, 0), y: <?php echo $r['meter_united']?>},
                        <?php endforeach;?>

                    ]
                }]
            });
            chart.render();

        }
    </script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>

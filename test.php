<?php
//require "spheader.php";
//require "header.php";//ヘッダー読み込み
$today = date("Y-m-d");

$pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");

//期間
$week = "1 WEEK";
$month = "1 MONTH";
    

$period = $week;

//瞑想前
$st = $pdo->query("SELECT * FROM mf_impressions WHERE id = '1' and bfaf = 'bf' and datetime between '$today 00:00:00' - INTERVAL $period and '$today 23:59:59'");

while ($row = $st->fetch()) {
    
    //ラベル
    $rep = htmlspecialchars($row['rep']);
    $datetime = htmlspecialchars($row['datetime']);

    $date = new DateTime($datetime);
    $val1 = $date->format('n/j');
    //感情
    $ang = htmlspecialchars($row['ang']);
    $sad = htmlspecialchars($row['sad']);
    $anxiety = htmlspecialchars($row['anxiety']);
    $joy = htmlspecialchars($row['joy']);
    $stress = htmlspecialchars($row['stress']);


    $label_data[] = "$val1 $rep";

    $bf_ang_data[] = $ang;
    $bf_sad_data[] = $sad;
    $bf_anxiety_data[] = $anxiety;
    $bf_joy_data[] = $joy;
    $bf_stress_data[] = $stress;
    
}

$jsonLabel=json_encode($label_data);

$json_bf_ang=json_encode($bf_ang_data);
$json_bf_sad=json_encode($bf_sad_data);
$json_bf_anxiety=json_encode($bf_anxiety_data);
$json_bf_joy=json_encode($bf_joy_data);
$json_bf_stress=json_encode($bf_stress_data);

/*
print_r($label_data);
print("<br />");
print("<br />");
print_r($bf_ang_data);
print("<br />");
print_r($bf_sad_data);
print("<br />");
print_r($bf_anxiety_data);
print("<br />");
print_r($bf_joy_data);
print("<br />");
print_r($bf_stress_data);
*/

//瞑想後
$st1 = $pdo->query("SELECT * FROM mf_impressions WHERE id = '1' and bfaf = 'af' and datetime between '$today 00:00:00' - INTERVAL 1 WEEK and '$today 23:59:59'");

while ($row = $st1->fetch()) {
    
    //感情
    $ang = htmlspecialchars($row['ang']);
    $sad = htmlspecialchars($row['sad']);
    $anxiety = htmlspecialchars($row['anxiety']);
    $joy = htmlspecialchars($row['joy']);
    $stress = htmlspecialchars($row['stress']);


    $af_ang_data[] = $ang;
    $af_sad_data[] = $sad;
    $af_anxiety_data[] = $anxiety;
    $af_joy_data[] = $joy;
    $af_stress_data[] = $stress;
    
}

$json_af_ang=json_encode($af_ang_data);
$json_af_sad=json_encode($af_sad_data);
$json_af_anxiety=json_encode($af_anxiety_data);
$json_af_joy=json_encode($af_joy_data);
$json_af_stress=json_encode($af_stress_data);

/*
print("<br />");
print_r($af_ang_data);
print("<br />");
print_r($af_sad_data);
print("<br />");
print_r($af_anxiety_data);
print("<br />");
print_r($af_joy_data);
print("<br />");
print_r($af_stress_data);
*/
?>

<html>
    <head>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
        <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
        
        <script src="mind.js"></script>
    </head>
    <body>
        <div class="ct-chart ct-perfect-fourth"></div>
        <script>
            // Our labels and three data series
            var data = {
              labels: ['Week1', 'Week2', 'Week3', 'Week4', 'Week5', 'Week6'],
              series: [
                [5, 4, 3, 7, 5, 10],
                [3, 2, 9, 5, 4, 6],
                [2, 1, -3, -4, -2, 0]
              ]
            };

            // We are setting a few options for our chart and override the defaults
            var options = {
              // Don't draw the line chart points
              showPoint: false,
              // Disable line smoothing
              lineSmooth: false,
              // X-Axis specific configuration
              axisX: {
                // We can disable the grid for this axis
                showGrid: false,
                // and also don't show the label
                showLabel: false
              },
              // Y-Axis specific configuration
              axisY: {
                // Lets offset the chart a bit from the labels
                offset: 60,
                // The label interpolation function enables you to modify the values
                // used for the labels on each axis. Here we are converting the
                // values into million pound.
                labelInterpolationFnc: function(value) {
                  return '$' + value + 'm';
                }
              }
            };

            // All you need to do is pass your configuration as third parameter to the chart function
            new Chartist.Line('.ct-chart', data, options);
        </script>
    </body>
</html>
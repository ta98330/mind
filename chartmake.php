<?php
//開発時のみ有効にする
//require "spheader.php";
//require "header.php";//ヘッダー読み込み

$rangestr = '2015-09-04';
$rangeend = '2015-09-07';


$pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");

//瞑想前
$st = $pdo->query("select * from mf_impressions where id = '{$_SESSION['userId']}' AND bfaf = 'bf' and datetime between '2015-09-04' and '2015-09-04' + interval 7 day");
$before = array( );
while ($row = $st->fetch()) {
    $rep = htmlspecialchars($row['rep']);
    $datetime = htmlspecialchars($row['datetime']);
    $bfaf = htmlspecialchars($row['bfaf']);
    $ang = htmlspecialchars($row['ang']);
    $sad = htmlspecialchars($row['sad']);
    $joy = htmlspecialchars($row['joy']);
    $stress = htmlspecialchars($row['stress']);

    //echo $rep,$datetime,$bfaf,$ang,$sad,$joy,$stress;
    
    list($year, $month, $day, $hour, $minute, $second) = preg_split('/[-: ]/', $datetime);//datetime分割
    
    //echo "<br />年",$year,"月",$month,"日",$day,"時",$hour,"分",$minute,"秒",$second,"<br />";
    
    
    
    $before["$month$day $rep"] = $ang*25;
}

//瞑想後
$st = $pdo->query("select * from mf_impressions where id = '{$_SESSION['userId']}' AND bfaf = 'af' and datetime between '2015-09-04' and '2015-09-04' + interval 7 day");
$after = array( );
while ($row = $st->fetch()) {
    $rep = htmlspecialchars($row['rep']);
    $datetime = htmlspecialchars($row['datetime']);
    $bfaf = htmlspecialchars($row['bfaf']);
    $ang = htmlspecialchars($row['ang']);
    $sad = htmlspecialchars($row['sad']);
    $joy = htmlspecialchars($row['joy']);
    $stress = htmlspecialchars($row['stress']);

    //echo $rep,$datetime,$bfaf,$ang,$sad,$joy,$stress;
    
    list($year, $month, $day, $hour, $minute, $second) = preg_split('/[-: ]/', $datetime);//datetime分割
    
    //echo "<br />年",$year,"月",$month,"日",$day,"時",$hour,"分",$minute,"秒",$second,"<br />";
    
    
    
    $after["$month$day $rep"] = $ang*25;

}


echo "<br /><p>before ";
print_r($before);
echo "</p>";

echo "<br /><p>after ";
print_r($after);
echo "</p>";





include_once('GoogChart.class.php');

$chart = new GoogChart();

$color = array(//色
    '#00BFFF',
    '#FF4500',
    '#999999',
);

// Set multiple graph data
$dataMultiple = array(
    'before' => $before,
    'after' => $after,
);


/*
echo "<br /><p>";
print_r($dataMultiple);
echo "</p>";
*/



$chart->setChartAttrs( array(
    'type' => 'line',
    'title' => 'Browser market 2008',
    'data' => $dataMultiple,
    'size' => array( 550, 200 ),
    'color' => $color,
    'labelsXY' => false,

    ));
// Print chart
echo $chart;



?>
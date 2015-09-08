
    
    
    
<?php
mb_internal_encoding('utf-8');
 
$max     = 100; //上限
$step    = 20;  //目盛の刻み
 
//値
$lines = array(
    array(
        'name'   => 'line1',
        'values' => array(20, 50, 40, 80, 100, 90, 70),
        'color'  => array(100, 180, 255)
    ),
    array(
        'name'   => 'line2',
        'values' => array(10, 30, 60, 70, 90, 90, 80),
        'color'  => array(255, 150, 200)
    ),
    array(
        'name'   => 'line3',
        'values' => array(60, 70, 70, 50, 60, 40, 30),
        'color'  => array(255, 255, 150)
    )
);
//ラベル
$labels = array('2000', '2001', '2002', '2003', '2004', '2005', '2006');
$label_rotate = false;
 
$title = 'Line Graph';
$show_legend = true;        //凡例の表示
 
$width   = 320;
$height  = 240;
$margin_top      = 50;
$margin_right    = 100;
$margin_bottom   = 50;
$margin_left     = 50;
 
//フォント
$font = 'migmix-1p-regular.ttf';
$font_size = 10;
 
$image = imagecreatetruecolor($width + $margin_left + $margin_right, $height + $margin_top + $margin_bottom);
imageantialias($image, true);
 
$org_x = $margin_left;
$org_y = $height + $margin_top;
 
//色
$bg_color   = imagecolorallocate($image, 10, 10, 10);       //背景
$text_color = imagecolorallocate($image, 255, 255, 255);    //テキスト
$grid_color = imagecolorallocate($image, 50, 50, 50);       //グリッド
$grid_spacing = $height / $max * $step;
 
imagefill($image, 0, 0, $bg_color);
 
for($i=0;$i&lt;=floor($max / $step);$i++){
    if($i !== 0) imageline($image, $org_x, $org_y - $grid_spacing * $i, $org_x + $width, $org_y - $grid_spacing * $i, $grid_color);
 
    $text = $i * $step;
    $box = imagettfbbox($font_size, 0, $font, $text);
    $text_width = $box[2] - $box[6];
    $text_height = $box[3] - $box[7];
     
    $text_x = $org_x - $font_size;
    $text_y = $org_y - $grid_spacing * $i;
    imagettftext($image, $font_size, 0, (-1 * $text_width) + $text_x, ($text_height / 2) + $text_y, $text_color, $font, $text);
}
 
$count = count($lines[0]['values']);
$graph_spacing = floor( $width / $count);
 
$legend_x = $org_x + $width + 20;
$legend_y = $margin_top + 10;
 
//各グラフの描画
foreach($lines as $line){
    $values = $line['values'];
    $graph_color  = imagecolorallocate($image, $line['color'][0], $line['color'][1], $line['color'][2]);
     
    for($i=0;$i<$count;$i++){
        $graph_x = $org_x + $graph_spacing * $i + round($graph_spacing / 2);
        $graph_y = $org_y - $height * $values[$i] / $max;
 
        if(isset($prev)){
            imageline($image, $prev[0], $prev[1], $graph_x, $graph_y, $graph_color);
            imageline($image, $prev[0] + round($graph_spacing / 2), $org_y, $prev[0] + round($graph_spacing / 2), $org_y + 5, $text_color);
        } 
        imagefilledrectangle($image, $graph_x - 2, $graph_y - 2, $graph_x + 2, $graph_y + 2, $graph_color);
         
 
        $prev = array($graph_x,$graph_y);
    }
     
    //凡例の描画
    if($show_legend){
        $text = $line['name'];
        $box = imagettfbbox($font_size, 0, $font, $text);
        $text_width = $box[2] - $box[6];
        $text_height = $box[3] - $box[7];
        imagettftext($image, $font_size, 0, $legend_x, $legend_y, $graph_color, $font, '■ ' . $text);
        $legend_y = $legend_y + ($text_height * 2);
    }
    unset($prev);
}
 
for($i=0;$i&lt;$count;$i++){
        $graph_x = $org_x + $graph_spacing * $i + round($graph_spacing / 2);
         
        $text = $labels[$i];
        $box = imagettfbbox($font_size, 0, $font, $text);
        $text_width = $box[2] - $box[6];
        $text_height = $box[3] - $box[7];
         
        if($label_rotate){
            $text_x = round($text_height / 2) + $graph_x;
            $text_y = $text_width + $org_y + $font_size;
            imagettftext($image, $font_size, 90, $text_x, $text_y, $text_color, $font, $text);
        } else {
            $text_x = round((-1 * $text_width / 2)) + $graph_x;
            $text_y = ($text_height / 2) + $org_y + $font_size * 2;
            imagettftext($image, $font_size, 0, $text_x, $text_y, $text_color, $font, $text);
        }
}
 
imageline($image, $org_x, $org_y, $org_x, $margin_top, $text_color);
imageline($image, $org_x, $org_y, $org_x + $width, $org_y, $text_color);
 
$box = imagettfbbox($font_size, 0, $font, $title);
$text_width  = $box[2] - $box[6];
$text_height = $box[3] - $box[7];
$text_x = $org_x + $width / 2 - ($text_width / 2);
$text_y = $org_y - $height - $font_size * 2;
imagettftext($image, $font_size, 0, $text_x, $text_y, $text_color, $font, $title);
 
header('Content-type: image/png');
imagepng($image);
 
imagedestroy($image);
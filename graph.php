<?php
    require "spheader.php";
    
    //未ログイン処理
    if(!isset($_SESSION["mf_login"])){
        header('Location: index.php');
    }
    require "header.php";//ヘッダー読み込み

    //セリフ
    $_SESSION["mf_speak_flag"] = "graph";
?>
    <body>

    <!--ページ領域-->
    <div data-role="page" data-url="./graph.php" id="graph">

        <!--ヘッダー領域-->
        <div data-role="header" data-theme="z" class="data-role-none header">
            <a href="top.php" class="home_btn"><i class="fa fa-chevron-left"></i></a>
            <h1>グラフ</h1>
        </div>

        <div role="main" id="graph" class="ui-content">
            
            
            <?php
            if(isset($_POST['period']) && $_POST['period'] == 'month'){
                $disweek = '';
                $dismonth = 'disabled';
                $pediodtext = '1ヶ月の';
            }
            else{
                $disweek = 'disabled';
                $dismonth = '';
                $pediodtext = '1週間の';
            }
            
            
            $today = date("Y-m-d");
            
            $endday = date("n/j");
            
            $strweek = date("n/j",strtotime("$today -7 days"));
            $strmonth = date("n/j",strtotime("$today -1 month"));
            
            //echo $strweek,"～",$endday;
            //echo $strmonth,"～",$endday;
            
            $nowweek = date("w");
            
            switch ($nowweek){
                case '0';
                    $weekja = "(日)";
                    break;
                case '1';
                    $weekja = "(月)";
                    break;
                case '2';
                    $weekja = "(火)";
                    break;
                case '3';
                    $weekja = "(水)";
                    break;
                case '4';
                    $weekja = "(木)";
                    break;
                case '5';
                    $weekja = "(金)";
                    break;
                case '6';
                    $weekja = "(土)";
                    break;
            }





            ?>
            
            <form action="" method="post" data-ajax="false" id="g_period" class="data-role-none">
                <button type="submit" name="period" value="week" id="week_btn" <?=$disweek?>>週</button>
                <button type="submit" name="period" value="month" id="month_btn" <?=$dismonth?>>月</button>
            </form>
            
            
            <?php
                //月
                if(isset($_POST['period']) && $_POST['period'] == 'month'){
                    echo "<p class='period_data'>",$strmonth,$weekja," ～ ",$endday,$weekja,"</p>";
                }
                else{
                    echo "<p class='period_data'>",$strweek,$weekja," ～ ",$endday,$weekja,"</p>";
                }
            ?>
            
            <div data-role="navbar" id="graphbtn">
                <ul>
                    <li><a href="#" id="ang_btn" class="ui-btn-active">怒り</a></li>
                    <li><a href="#" id="sad_btn">悲しみ</a></li>
                    <li><a href="#" id="anxiety_btn">不安</a></li>
                    <li><a href="#" id="joy_btn">喜び</a></li>
                    <li><a href="#" id="stress_btn">ストレス</a></li>
                </ul>
            </div>
            
            
            <h2><?=$pediodtext?><span id="graph_emo">怒り</span>のグラフ</h2>
            <div class="ct-chart ct-perfect-fourth grapharea"></div><!--グラフ表示-->
            
            <?php
            
            

            $pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");

            //期間
            $week = "1 WEEK";
            $month = "1 MONTH";

            //選択期間
            $period = $week;
            
            if(isset($_POST['period']) && $_POST['period'] == 'month'){
                $period = $month;
                
                $disweek = '';
                $dismonth = 'disabled';
                
            }
            
            

            //瞑想前
            $st = $pdo->query("SELECT * FROM mf_impressions WHERE id = '1' and bfaf = 'bf' and datetime between '$today 00:00:00' - INTERVAL $period and '$today 23:59:59'");

            while ($row = $st->fetch()) {

                //ラベル
                //$rep = htmlspecialchars($row['rep']);
                $datetime = htmlspecialchars($row['datetime']);

                $date = new DateTime($datetime);
                $val1 = $date->format('n/j');
                
                $val2 = $val1 = $date->format('j日');
                
                //感情
                $ang = htmlspecialchars($row['ang']);
                $sad = htmlspecialchars($row['sad']);
                $anxiety = htmlspecialchars($row['anxiety']);
                $joy = htmlspecialchars($row['joy']);
                $stress = htmlspecialchars($row['stress']);


                $label_data[] = "$val2";

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

            //瞑想後
            $st1 = $pdo->query("SELECT * FROM mf_impressions WHERE id = '1' and bfaf = 'af' and datetime between '$today 00:00:00' - INTERVAL $period and '$today 23:59:59'");

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
            
            ?>
            
            
            <script>
                
                
                //ラベル
                var label=JSON.parse('<?php echo  $jsonLabel; ?>');

                //瞑想前
                var bf_ang=JSON.parse('<?php echo  $json_bf_ang; ?>');
                var bf_sad=JSON.parse('<?php echo  $json_bf_sad; ?>');
                var bf_anxiety=JSON.parse('<?php echo  $json_bf_anxiety; ?>');
                var bf_joy=JSON.parse('<?php echo  $json_bf_joy; ?>');
                var bf_stress=JSON.parse('<?php echo  $json_bf_stress; ?>');

                //瞑想後
                var af_ang=JSON.parse('<?php echo  $json_af_ang; ?>');
                var af_sad=JSON.parse('<?php echo  $json_af_sad; ?>');
                var af_anxiety=JSON.parse('<?php echo  $json_af_anxiety; ?>');
                var af_joy=JSON.parse('<?php echo  $json_af_joy; ?>');
                var af_stress=JSON.parse('<?php echo  $json_af_stress; ?>');
                
                
                /*
                var bf = [0,0,0,0];
                var af = [1,1,1,1];
                label = [1,2,3,4];
                */
                //graph();
                
                
                
                //グラフ描画
                function graph(){
                    console.log('graph');
                    
                    var data = {
                        labels: label,
                        series: [
                            bf,
                            af
                        ]
                    };
                    
                    var options = {
                        axisX: {
                            offset: 30,		// X軸ラベルエリアの高さ。ここの数値-10が実際の要素の高さになる
                            position: 'end',		// "start"だと上に配置される
                            labelOffset: {
                                x: -10,
                                y: 0
                            },
                            showLabel: true,	// offsetの数値は維持される
                            showGrid: true,
                            labelInterpolationFnc: Chartist.noop,
                            type: undefined
                        },
                        axisY: {
                            offset: 20,		// Y軸ラベルのwidth
                            position: 'start',		// "end"だと右に配置される
                            labelOffset: {
                                x: 0,
                                y: 0
                            },
                            showLabel: true,
                            showGrid: true,
                            labelInterpolationFnc: Chartist.noop,
                            type: undefined,
                            scaleMinSpace: 10,		// 間隔
                            onlyInteger: true		// 小数点ラベルの表示
                        },
                        width: undefined,		// 描画範囲width、グラフが縮むわけではない
                        height: undefined,		// 描画範囲height、グラフが縮むわけではない
                        showLine: true,			// ラインの描画
                        showPoint: true,		// ポイントの描画
                        showArea: false,			// ラインの下に薄いエリアの塗りを描画
                        areaBase: 0,
                        lineSmooth: false,		// いわゆるベジェ曲線か折れ線か
                        low: 1,			// Y軸の最低数値の指定
                        high: 10,
                        chartPadding: {			// padding
                            top: 20,
                            right: 20,
                            bottom: 5,
                            left: 10
                        },
                        fullWidth: true,
                        reverseData: false		// X軸データを反転
                    };
                    
                    new Chartist.Line('.ct-chart', data, options);
                    
                }
                
                /*
                $(document).on('pagecreate', '#graph', function() {
                    //location.reload();
                    bf = bf_ang;
                    af = af_ang;
                    graph();
                    console.log('reload');
                })
                */
                
                bf = bf_ang;
                af = af_ang;
                graph();
                
                
                $('#ang_btn').click(function(){
                    $('#graph_emo').text('怒り');
                    bf = bf_ang;
                    af = af_ang;
                    console.log(bf);
                    console.log(af);
                    graph();
                });

                $('#sad_btn').click(function(){
                    $('#graph_emo').text('悲しみ');
                    bf = bf_sad;
                    af = af_sad;
                    console.log(bf);
                    console.log(af);
                    graph();
                });

                $('#anxiety_btn').click(function(){
                    $('#graph_emo').text('不安');
                    bf = bf_anxiety;
                    af = af_anxiety;
                    console.log(bf);
                    console.log(af);
                    graph();
                });

                $('#joy_btn').click(function(){
                    $('#graph_emo').text('喜び');
                    bf = bf_joy;
                    af = af_joy;
                    console.log(bf);
                    console.log(af);
                    graph();
                });

                $('#stress_btn').click(function(){
                    $('#graph_emo').text('ストレス');
                    bf = bf_stress;
                    af = af_stress;
                    console.log(bf);
                    console.log(af);
                    graph();
                });
                
                
                
                
            </script>
            
            <div id="legend"><span id="bf_line">青実線</span>：瞑想<span id="bf_line">前</span><br /><span id="af_line">赤破線</span>：瞑想<span id="af_line">後</span></div>
            
            
        </div><!--main-->
            
        
    </div>

    </body>
</html>
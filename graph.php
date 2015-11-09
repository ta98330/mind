<?php
    require "spheader.php";
    
    if($_SESSION['mf_login'] == "ログインしていません．" || empty($_SESSION['mf_login'])){
        header('Location: index.php');
    }
    require "header.php";//ヘッダー読み込み
?>
    <body>

    <!--ページ領域-->
    <div data-role="page" data-url="./graph.php" id="graph">

        <!--ヘッダー領域-->
        <div data-role="header" data-theme="b" data-position="fixed">
            <a href="top.php" class="ui-btn ui-btn-a ui-btn-left">Home</a>
            <h1>グラフ</h1>
        </div>

        <div role="main" id="graph" class="ui-content">
            <h1>グラフ</h1>
            
            <form action="" method="post" data-ajax="false">
                <input type="hidden" name="period_week" value="week">
                <input type="submit" value="週">
            </form>
            <form action="" method="post" data-ajax="false">
                <input type="hidden" name="period_month" value="month">
                <input type="submit" value="月">
            </form>
            
            <div id="graphbtn">
                <button data-role="none" id="ang_btn">怒り</button>
                <button data-role="none" id="sad_btn">悲しみ</button>
                <button data-role="none" id="anxiety_btn">不安</button>
                <button data-role="none" id="joy_btn">喜び</button>
                <button data-role="none" id="stress_btn">ストレス</button>
            </div>
            
            <h2><span id="graph_emo">怒り</span>のグラフ</h2>
            <div class="ct-chart ct-perfect-fourth grapharea"></div><!--グラフ表示-->
            
            <?php
            $today = date("Y-m-d");

            $pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");

            //期間
            $week = "1 WEEK";
            $month = "1 MONTH";

            //選択期間
            $period = $week;
            
            if(isset($_POST['period_month']) && $_POST['period_month'] == 'month'){
                $period = $month;
            }
            
            

            //瞑想前
            $st = $pdo->query("SELECT * FROM mf_impressions WHERE id = '1' and bfaf = 'bf' and datetime between '$today 00:00:00' - INTERVAL $period and '$today 23:59:59'");

            while ($row = $st->fetch()) {

                //ラベル
                //$rep = htmlspecialchars($row['rep']);
                $datetime = htmlspecialchars($row['datetime']);

                $date = new DateTime($datetime);
                $val1 = $date->format('n/j');
                //感情
                $ang = htmlspecialchars($row['ang']);
                $sad = htmlspecialchars($row['sad']);
                $anxiety = htmlspecialchars($row['anxiety']);
                $joy = htmlspecialchars($row['joy']);
                $stress = htmlspecialchars($row['stress']);


                $label_data[] = "$val1";

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
                
                
                var bf = bf_ang;
                var af = af_ang;
                
                
                //グラフ描画
                function graph(){
                    console.log('graph');
                    new Chartist.Line(
                        '.ct-chart', {
                        labels: label,
                        series: [
                            bf,
                            af
                        ]
                    },

                    {
                    fullWidth: true,
                    chartPadding: {
                        right: 30
                    },
                    axisX: {

                    },
                    axisY: {
                        lineSmooth: true,		// いわゆるベジェ曲線か折れ線か
                        scaleMinSpace: 1,		// 間隔
                        high: 10,       //最大値
                        low: 0,     //最小値
                        onlyInteger: true,
                        offset: 20
                    }
                    });

                }
                
                
                graph();
                
                
                $('#ang_btn').click(function(){
                    $('#graph_emo').text('怒り');
                    bf = bf_ang;
                    af = af_ang;
                    console.log(bf);
                    graph();
                });

                $('#sad_btn').click(function(){
                    $('#graph_emo').text('悲しみ');
                    bf = bf_sad;
                    af = af_sad;
                    console.log(bf);
                    graph();
                });

                $('#anxiety_btn').click(function(){
                    $('#graph_emo').text('不安');
                    bf = bf_anxiety;
                    af = af_anxiety;
                    console.log(bf);
                    graph();
                });

                $('#joy_btn').click(function(){
                    $('#graph_emo').text('喜び');
                    bf = bf_joy;
                    af = af_joy;
                    console.log(bf);
                    graph();
                });

                $('#stress_btn').click(function(){
                    $('#graph_emo').text('ストレス');
                    bf = bf_stress;
                    af = af_stress;
                    console.log(bf);
                    graph();
                });
                
                
                
                
            </script>
            
            <div id="legend"><span id="bf_line">青実線</span>：瞑想<span id="bf_line">前</span><br /><span id="af_line">赤破線</span>：瞑想<span id="af_line">後</span></div>
            
            
        </div><!--main-->
            
        
    </div>

    </body>
</html>
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

        <div role="main" id="graphcontain" class="ui-content">
            <?php
            if(isset($_POST['period']) && $_POST['period'] == 'month'){
                $disweek = '';
                $dismonth = 'disabled';
            }
            else{
                $disweek = 'disabled';
                $dismonth = '';
            }
            
            $today = date("Y-m-d");
            /*
            $endday = date("j日");
            
            $strweek = date("j日",strtotime("$today -7 days"));
            $strmonth = date("j日",strtotime("$today -1 month"));
            
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
            */
            ?>
            
            <form action="" method="post" data-ajax="false" id="g_period" class="data-role-none">
                <button type="submit" name="period" value="week" id="week_btn" <?=$disweek?>>週</button>
                <button type="submit" name="period" value="month" id="month_btn" <?=$dismonth?>>月</button>
            </form>
            <!--過去月検索断念
            <form action="" method="post" data-ajax="false" id="g_selectmon" class="data-role-none">
                <label for="selmonarea">過去検索：</label>
                <input type="month" id="selmonarea" name="sel_mon" min="2015-10-01" required></input>
                <input type="submit" value="検索" id="selmonbtn" class="ui-btn">
            </form>
            -->
            <?php
            /*
                if(isset($_POST['period']) && $_POST['period'] == 'month'){
                    echo "<p class='period_data'>",$strmonth,$weekja," ～ ",$endday,$weekja,"</p>";
                }
                else{
                    echo "<p class='period_data'>",$strweek,$weekja," ～ ",$endday,$weekja,"</p>";
                }
            */
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
            
            <div id='graph_container'></div>
            
            <?php
            $pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");
            
            //期間
            $week = "1 WEEK";
            $month = "1 MONTH";
            $selmon = "期間中の";

            if(isset($_POST['sel_mon'])){
                $selmon = $_POST['sel_mon'];
                $selmon = date('Y年n月の', strtotime($selmon));
                //echo $selmon;
            }

            //選択期間
            $period = $week;
            
            if(isset($_POST['period']) && $_POST['period'] == 'month'){
                $period = $month;
                $disweek = '';
                $dismonth = 'disabled';
            }
            //瞑想前
            if($selmon == "期間中の"){
                $st = $pdo->query("SELECT * FROM mf_impressions WHERE id = '{$_SESSION['mf_userId']}' and bfaf = 'bf' and datetime between '$today 00:00:00' - INTERVAL $period and '$today 23:59:59'");
            }
            else{//過去月選択時
                $st = $pdo->query("SELECT * FROM mf_impressions WHERE id = '{$_SESSION['mf_userId']}' and bfaf = 'bf' and datetime between '$selmon-01 00:00:00' and '$selmon-31 23:59:59'");
            }

            while ($row = $st->fetch()) {

                //ラベル
                $datetime = htmlspecialchars($row['datetime']);

                $date = new DateTime($datetime);
                $val1 = $date->format('n/j');
                
                $val2 = $val1 = $date->format('j日');
                
                $ang = $row['ang'];
                $sad = $row['sad'];
                $anxiety = $row['anxiety'];
                $joy = $row['joy'];
                $stress = $row['stress'];

                $label_data[] = "$val2";

                $bf_ang_data[] = intval($ang);
                $bf_sad_data[] = intval($sad);
                $bf_anxiety_data[] = intval($anxiety);
                $bf_joy_data[] = intval($joy);
                $bf_stress_data[] = intval($stress);

            }
                
            if(!isset($val1)){
                echo "<div id='nonedata'><p>期間中に記録がありません</p></div>";
            }
            
            //ラベル
            @$jsonLabel=json_encode($label_data);

            @$json_bf_ang=json_encode($bf_ang_data);
            @$json_bf_sad=json_encode($bf_sad_data);
            @$json_bf_anxiety=json_encode($bf_anxiety_data);
            @$json_bf_joy=json_encode($bf_joy_data);
            @$json_bf_stress=json_encode($bf_stress_data);

            //瞑想後
            if($selmon == "期間中の"){
                $st1 = $pdo->query("SELECT * FROM mf_impressions WHERE id = '{$_SESSION['mf_userId']}' and bfaf = 'af' and datetime between '$today 00:00:00' - INTERVAL $period and '$today 23:59:59'");
            }
            else{//過去月選択時
                $st1 = $pdo->query("SELECT * FROM mf_impressions WHERE id = '{$_SESSION['mf_userId']}' and bfaf = 'af' and datetime between '$selmon-01 00:00:00' - INTERVAL 1 MONTH and '$selmon-31 23:59:59'");
            }

            while ($row = $st1->fetch()) {

                //感情
                $ang = htmlspecialchars($row['ang']);
                $sad = htmlspecialchars($row['sad']);
                $anxiety = htmlspecialchars($row['anxiety']);
                $joy = htmlspecialchars($row['joy']);
                $stress = htmlspecialchars($row['stress']);

                $af_ang_data[] = intval($ang);
                $af_sad_data[] = intval($sad);
                $af_anxiety_data[] = intval($anxiety);
                $af_joy_data[] = intval($joy);
                $af_stress_data[] = intval($stress);
            }

            @$json_af_ang=json_encode($af_ang_data);
            @$json_af_sad=json_encode($af_sad_data);
            @$json_af_anxiety=json_encode($af_anxiety_data);
            @$json_af_joy=json_encode($af_joy_data);
            @$json_af_stress=json_encode($af_stress_data);
            
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
                
                //新グラフ
                var chart;
                
                bf = bf_ang;
                af = af_ang;
                
                var week = $('#week_btn').prop('disabled');
                console.log(week);
                
                
                //週・月判定
                var periodtext;
                
                var sel_mon = "<?php echo $selmon;?>";
                console.log("selmon = "+sel_mon);
                
                if(week){
                    periodtext = "ここ１週間の";
                }
                else{
                    periodtext = "ここ１ヶ月の";
                }
                
                if(sel_mon !== "期間中の"){
                    periodtext = sel_mon;
                    //console.log("selmon = "+sel_mon);
                }
                
                var title = periodtext+"怒りのグラフ";
                
                console.log(label);
                
                function draw() {
                    // グラフオプションを指定
                    var options = {
                          // 出力先を指定
                          chart :{
                              renderTo : "graph_container",
                              type : "line",
                              backgroundColor : "white",
                              height : 350,
                              margin: [40, 20, 70, 35] //余白
                              
                          },
                          scrollbar: {
                              enabled: true  // scrollbar 有効
                          },

                          // タイトルを指定
                          title : {text: title},
                          // x軸のラベルを指定
                          xAxis : {
                              type : 'datetime',
                              title : null,
                              offset : 0,
                              categories : label
                          },
                          // y軸のラベルを指定
                          yAxis : {
                              title : null,
                              max : 10,
                              min : 0,
                              allowDecimals : false //小数点非表示
                          },

                          // データ系列を作成
                          series: [
                                  {name: "瞑想前", data: bf},
                                  {name: "瞑想後", data: af}
                          ]

                    }

                    // グラフを作成
                    chart = new Highcharts.Chart(options);

                }
                
                $(document).on('pagecreate', '#graph', function(){
                    draw();
                    
                });
                
                $('#ang_btn').click(function(){
                    title = periodtext+"怒りのグラフ";
                    bf = bf_ang;
                    af = af_ang;
                    console.log(bf);
                    console.log(af);
                    draw();
                });

                $('#sad_btn').click(function(){
                    title = periodtext+"悲しみのグラフ";
                    bf = bf_sad;
                    af = af_sad;
                    console.log(bf);
                    console.log(af);
                    draw();
                });

                $('#anxiety_btn').click(function(){
                    title = periodtext+"不安のグラフ";
                    bf = bf_anxiety;
                    af = af_anxiety;
                    console.log(bf);
                    console.log(af);
                    draw();
                });

                $('#joy_btn').click(function(){
                    title = periodtext+"喜びのグラフ";
                    bf = bf_joy;
                    af = af_joy;
                    console.log(bf);
                    console.log(af);
                    draw();
                });

                $('#stress_btn').click(function(){
                    title = periodtext+"ストレスのグラフ";
                    bf = bf_stress;
                    af = af_stress;
                    console.log(bf);
                    console.log(af);
                    draw();
                });
                
            </script>
            
            <h3><?=$selmon ?>出来事</h3>
            <ul id="record_event" class="eventlist">
            <?php
            
            $st1 = $pdo->query("SELECT * FROM mf_events WHERE id = '{$_SESSION['mf_userId']}' and datetime between '$today' - interval $period and '$today' + interval 1 day ORDER BY datetime ASC");
                
            function week_jp($weekno){
                switch ($weekno){
                    case '0';
                        $weekja = "日";
                        break;
                    case '1';
                        $weekja = "月";
                        break;
                    case '2';
                        $weekja = "火";
                        break;
                    case '3';
                        $weekja = "水";
                        break;
                    case '4';
                        $weekja = "木";
                        break;
                    case '5';
                        $weekja = "金";
                        break;
                    case '6';
                        $weekja = "土";
                        break;
                }

                return $weekja;
            }

            while (@$row = $st1->fetch()) {
                $datetime = htmlspecialchars($row['datetime']);
                $content = nl2br(htmlspecialchars($row['content']));

                $week = date('w', strtotime($datetime));

                        if($week == "0"){
                            echo "<li class='sunday'>";
                        }
                        elseif($week == "6"){
                            echo "<li class='saturday'>";
                        }
                        else{
                            echo "<li class='weekday'>";
                        }
                        
                        echo "<h4>",date('n月j日', strtotime($datetime)),"(",week_jp($week),")",date('  G:i', strtotime($datetime)),"</h4>";
                echo "<p>$content</p>";
                echo "</li>\n";
            }

            if(empty($content))
                echo "<li>この期間中に登録された出来事はありません．<br /></li>";
            
            ?>
            </ul>
            
        </div><!--main-->
    </div><!--page-->
    </body>
</html>
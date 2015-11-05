<?php
    require "spheader.php";
    
    if($_SESSION['mf_login'] == "ログインしていません．" || empty($_SESSION['mf_login'])){
        header('Location: index.php');
    }
    require "header.php";//ヘッダー読み込み
    include_once "chartmake.php";
?>
    <body>

    <!--ページ領域-->
    <div data-role="page" data-url="./graph.php">

        <!--ヘッダー領域-->
        <div data-role="header" data-theme="b" data-position="fixed">
            <a href="top.php" class="ui-btn ui-btn-a ui-btn-left">Home</a>
            <h1>グラフ</h1>
        </div>

        <div role="main" id="graph" class="ui-content ui-mini">
            <h1>グラフ</h1>
            
            <div data-role="controlgroup" data-type="horizontal">
                <button type="button" id="ang_btn" class="ui-btn">怒り</button>
                <button type="button" id="sad_btn" class="ui-btn">悲しみ</button>
                <button type="button" id="anxiety_btn" class="ui-btn">不安</button>
                <button type="button" id="joy_btn" class="ui-btn">喜び</button>
                <button type="button" id="stress_btn" class="ui-btn">ストレス</button>
            </div>
            <h2><span id="graph_emo">怒り</span>のグラフ</h2>
            <div class="ct-chart ct-perfect-fourth grapharea"></div>
            
            
        
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
                
                
                
                
            </script>
            
            
            
            
        </div><!--main-->
            
        
    </div>

    </body>
</html>
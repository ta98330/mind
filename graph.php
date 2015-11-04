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

        <div role="main" class="ui-content">
            <h1>グラフ</h1>
            <div class="ct-chart ct-perfect-fourth grapharea"></div>
        
            <script>
                var label=JSON.parse('<?php echo  $jsonLabel; ?>');

                var bf_ang=JSON.parse('<?php echo  $json_bf_ang; ?>');

                var af_ang=JSON.parse('<?php echo  $json_af_ang; ?>');

                new Chartist.Line('.ct-chart', {
                    labels: label,
                    /*
                  labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                  series: [
                    [12, 5, 7, 8, 5],
                    [2, 1, 3.5, 7, 3],
                    [1, 3, 4, 5, 6]
                  ]*/

                    series: [
                        bf_ang,
                        af_ang
                    ]

                }, {
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
                        offset: 10
                    }
                });
            </script>
            
            
            
            
        </div><!--main-->
            
        
    </div>

    </body>
</html>
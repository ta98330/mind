<?php
    require "spheader.php";
    
    if($_SESSION['login'] == "ログインしていません．" || empty($_SESSION['login'])){
        header('Location: index.php');
    }
    require "header.php";//ヘッダー読み込み
?>
<body>
    <div class="container" id="main">
        
        <h1>グラフ</h1>
        <p>気分の変動</p>

        <?php include_once("chartmake.php"); /*グラフ作成ファイル読み込み*/ ?>

        <ul class="nav nav-tabs nav-justified">
            <li class="active"><a href="#ang" data-toggle="tab">怒り</a></li>
            <li><a href="#sad" data-toggle="tab">悲しみ</a></li>
            <li><a href="#anxiety" data-toggle="tab">不安</a></li>
            <li><a href="#joy" data-toggle="tab">喜び</a></li>
            <li><a href="#stress" data-toggle="tab">ストレス</a></li>
            <li><a href="#allemo" data-toggle="tab">すべて</a></li>
        </ul>

        <div class="tab-content" id="chartimg">
            <div class="tab-pane active" id="ang">
                <?php chart('ang'); ?>
            </div>
            <div class="tab-pane" id="sad">
                <?php chart('sad'); ?>
            </div>
            <div class="tab-pane" id="anxiety">
                <?php chart('anxiety'); ?>
            </div>
            <div class="tab-pane" id="joy">
                <?php chart('joy'); ?>
            </div>
            <div class="tab-pane" id="stress">
                <?php chart('stress'); ?>
            </div>
            <div class="tab-pane" id="allemo">
                <?php
                    chart('ang');
                    chart('sad');
                    chart('anxiety');
                    chart('joy');
                    chart('stress');
                ?>
            </div>
        </div>
        
        
    </div>

<?php require "footer.php" //フッター読み込み?>
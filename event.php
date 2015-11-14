<?php
    require "spheader.php";
    
    //未ログイン処理
    if(!isset($_SESSION["mf_login"])){
        header('Location: index.php');
    }
    require "header.php";//ヘッダー読み込み

    
?>
<body>
    <!--ページ領域-->
    <div data-role="page" data-url="./event.php" id="event">
        
        <!--ヘッダー領域-->
        <div data-role="header" data-theme="z" class="data-role-none header">
            <a href="top.php" class="home_btn"><i class="fa fa-chevron-left"></i></a>
            <h1>出来事</h1>
        </div>
    
        <div role="main" class="ui-content">
            <?php $_SESSION["mf_speak_flag"] = "event"; //セリフ?>
            <form action="event_insert.php" method="post" data-ajax="false" id="event_lec" class="data-role-none">
                <textarea name="eventContent" placeholder="今日の出来事(100字以内)"　id="eventContent" class="form-control" maxlength="100" required></textarea>
                <button onclick="submit()" id="lec_btn"><i class="fa fa-check"></i></button>
            </form>

            <h3>1週間の出来事</h3>
            <ul class="eventlist">

                <?php
                $today = date("Y-m-d");

                $pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");

                $st = $pdo->query("SELECT * FROM mf_events WHERE id = '{$_SESSION['mf_userId']}' and datetime between '$today' - interval 7 day and '$today' + interval 1 day ORDER BY datetime DESC");

                while (@$row = $st->fetch()) {
                    $datetime = htmlspecialchars($row['datetime']);
                    $content = nl2br(htmlspecialchars($row['content']));

                    $ampm = date('a', strtotime($datetime));

                    if($ampm == "am"){
                        echo "<li class='am'>";
                    }
                    else{
                        echo "<li class='pm'>";
                    }

                    echo "<h4>",date('n月j日　a g:i', strtotime($datetime)),"</h4>";
                    echo "<p>$content</p>";
                    echo "</li>\n";
                }

                if(empty($content))
                    echo "<li>この1週間で登録された出来事はありません．<br /></li>";
                ?>


           </ul> 


        </div>
        
    </div>
    
</body>
</html>
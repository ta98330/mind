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

                <h2>期間選択</h2>
                <div id="event_range">
                    <form method="post" action="" class="data-role-none">
                        <input type="date" name="str_day" id="strday" min="2015-10-01" title="開始日" data-role="none" required>
                        <p><i class="fa fa-arrows-h"></i></p>
                        <input type="date" name="end_day" id="endday" min="2015-10-01" title="終了日" data-role="none" required>
                        <button type="submit" class="ui-btn">検索</button>
                    </form>
                </div>
                <?php
                if(isset($_POST['str_day'])){
                    echo '<h2>期間中の出来事</h2>';
                }
                else{
                    echo '<h2>1週間の出来事</h2>';
                }
                ?>
                <ul class="eventlist">
                    <?php
                    $today = date("Y-m-d");

                    $pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");

                    if(isset($_POST['str_day'])){
                        //期間選択
                        $st = $pdo->query("SELECT * FROM mf_events WHERE id = '{$_SESSION['mf_userId']}' and datetime between '{$_POST['str_day']} 00:00:00' and '{$_POST['end_day']} 23:59:59' ORDER BY datetime ASC");
                    }
                    else{
                        //1週間
                        $st = $pdo->query("SELECT * FROM mf_events WHERE id = '{$_SESSION['mf_userId']}' and datetime between '$today' - interval 7 day and '$today' + interval 1 day ORDER BY datetime DESC");
                    }
                    
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

                    while (@$row = $st->fetch()) {
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
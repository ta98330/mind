<?php
    require "spheader.php";
    
    if($_SESSION['login'] == "ログインしていません．" || empty($_SESSION['login'])){
        header('Location: index.php');
    }
    require "header.php";//ヘッダー読み込み
?>
<body>
    <div class="container" id="main">
        
        <h1>出来事</h1>
        <p>今日の出来事を記録しましょう</p>

        <form action="event_insert.php" method="post">
            <div class="form-group">
                <label class="control-label" for="eventContent">今日の出来事(200文字まで)</label>
                <textarea name="eventContent" placeholder="入力してください"　id="eventContent" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="送信" class="btn btn-primary">
            </div>
        </form>

        <h2>1周間の出来事</h2>
        <ul class="eventlist">

            <?php
            $today = date("Y-m-d");

            $pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");

            $st = $pdo->query("SELECT * FROM mf_events WHERE id = '{$_SESSION['userId']}' and datetime between '$today' - interval 7 day and '$today' + interval 1 day ORDER BY datetime DESC");

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

                echo "<h2>",date('Y年n月j日　a g:i', strtotime($datetime)),"</h2>";
                echo "<p>$content</p>";
                echo "</li>\n";
            }

            if(empty($content))
                echo "<li class='alert alert-danger' role='alert'>この1周間で登録された出来事はありません．<br /></li>";
            ?>


       </ul> 
        
    
    </div>

<?php require "footer.php" //フッター読み込み?>
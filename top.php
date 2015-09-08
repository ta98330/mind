<?php
    require "spheader.php";
    
    if($_SESSION['login'] == "ログインしていません．" || empty($_SESSION['login'])){
        header('Location: index.php');
    }
    require "header.php";//ヘッダー読み込み
?>
    
    <body>
        <?php require "navbar.php";//ナビゲーションバー読み込み?>
     
    <!--目標達成率バー
        <div class="progress progress-striped active">
          <div class="progress-bar" style="width: <?='90'?>%">目標達成率　<?='90'?>%</div>
        </div>-->
        
        <div class="container" style="padding-top: 20px 0;" id="main">
            
            <ul class="nav nav-tabs nav-justified">
                <li class="active"><a href="#start" data-toggle="tab">スタート</a></li>
                <li><a href="#event" data-toggle="tab">出来事</a></li>
                <li><a href="#graf" data-toggle="tab">グラフ</a></li>
            </ul>
            
            <div class="tab-content">
                <div class="tab-pane active" id="start">
                    <h1>スタート</h1>
                    <p>Mindfulnessを開始</p>
                    
                    <div class=”video-wrap”><iframe src="https://www.youtube.com/embed/2W2EvcXrb3A" frameborder="0" allowfullscreen></iframe></div>
                    
                    <h2>今の気分は？</h2>
                    <form action="impressions.php" method="post">
                        <div class="form-group" id="impression">
                            <p class="control-label"><b>怒り</b></p>
                            <div class="checkbox-inline">
                                <input required="required" type="radio" value="1" name="ang" id="ang1">
                                <label for="ang1">1</label>
                            </div>
                            <div class="checkbox-inline">
                                <input type="radio" value="2" name="ang" id="ang2">
                                <label for="ang2">2</label>
                            </div>
                            <div class="checkbox-inline">
                                <input type="radio" value="3" name="ang" id="ang3">
                                <label for="ang3">3</label>
                            </div>
                            <div class="checkbox-inline">
                                <input type="radio" value="4" name="ang" id="ang4">
                                <label for="ang4">4</label>
                            </div>

                            <p class="control-label"><b>悲しみ</b></p>
                            <div class="checkbox-inline">
                                <input required="required" type="radio" value="1" name="sad" id="sad1">
                                <label for="sad1">1</label>
                            </div>
                            <div class="checkbox-inline">
                                <input type="radio" value="2" name="sad" id="sad2">
                                <label for="sad2">2</label>
                            </div>
                            <div class="checkbox-inline">
                                <input type="radio" value="3" name="sad" id="sad3">
                                <label for="sad3">3</label>
                            </div>
                            <div class="checkbox-inline">
                                <input type="radio" value="4" name="sad" id="sad4">
                                <label for="sad4">4</label>
                            </div>

                            <p class="control-label"><b>喜び</b></p>
                            <div class="checkbox-inline">
                                <input required="required" type="radio" value="1" name="joy" id="joy1">
                                <label for="joy1">1</label>
                            </div>
                            <div class="checkbox-inline">
                                <input type="radio" value="2" name="joy" id="joy2">
                                <label for="joy2">2</label>
                            </div>
                            <div class="checkbox-inline">
                                <input type="radio" value="3" name="joy" id="joy3">
                                <label for="joy3">3</label>
                            </div>
                            <div class="checkbox-inline">
                                <input type="radio" value="4" name="joy" id="joy4">
                                <label for="joy4">4</label>
                            </div>

                            <p class="control-label"><b>ストレス</b></p>
                            <div class="checkbox-inline">
                                <input required="required" type="radio" value="1" name="stress" id="stress1">
                                <label for="stress">1</label>
                            </div>
                            <div class="checkbox-inline">
                                <input type="radio" value="2" name="stress" id="stress2">
                                <label for="stress">2</label>
                            </div>
                            <div class="checkbox-inline">
                                <input type="radio" value="3" name="stress" id="stress3">
                                <label for="stress3">3</label>
                            </div>
                            <div class="checkbox-inline">
                                <input type="radio" value="4" name="stress" id="stress4">
                                <label for="stress4">4</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="記録" class="btn btn-primary">
                        </div>
                    </form>
                </div><!--スタート-->
                
                <div class="tab-pane" id="event">
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
                    
                    <ul class="eventlist">
                    
                        <?php
                        $pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");

                        $st = $pdo->query("SELECT * FROM mf_events WHERE id = '{$_SESSION['userId']}' ORDER BY datetime DESC");

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
                        ?>
                    
                    
                   </ul> 
                    
                    
                </div><!--出来事-->
                
                <div class="tab-pane" id="graf">
                    <h1>グラフ</h1>
                    <p>気分の変動</p>
                    <p class='alert alert-danger' role='alert'>現在利用できません．</p>
                    <!--
                    <div class="form-group form-inline">
                        <form action="" method="post">
                            <label for="sell_emotion">感情:</label>
                            <select class="form-control" id="sell_emotion">
                                <option value="ang">怒り</option>
                                <option value="sad">悲しみ</option>
                                <option value="joy">喜び</option>
                                <option value="stress">ストレス</option>
                                <option value="all">すべて</option>
                            </select>

                            <label for="sell_range">表示範囲:</label>
                            <select class="form-control" id="sell_range">
                                <option value="week">週</option>
                                <option value="mon">月</option>
                            </select>

                            <?php
                            $now = date("Y-m");
                            echo "<input name='period' type='month' min='2015-09' max='$now'>";
                            ?>

                            <input type="submit" value="選択" class="btn btn-primary">
                        </form>

                    </div>
                    
                    <?php require "chartmake.php" //フッター読み込み?>
                    
                    <form>
                        <div class="form-group">
                            
                        </div>
                    </form>
                    
                    
                    
                    
                    
                    <ul class="nav nav-tabs nav-justified">
                        <li class="active"><a href="#week" data-toggle="tab">週</a></li>
                        <li><a href="#mon" data-toggle="tab">月</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="week">
                            <form>
                                <div class="form-group form-inline">
                                    <?php
                                    $nowweek = date("Y-m-d");
                                    echo "<input name='period' type='week' min='2015-09-01' max='$nowweek'>";
                                    ?>
                                    <input type="submit" value="選択" class="btn btn-primary">
                                </div>
                            </form>
                        
                        
                        
                        
                        
                        
                        </div>
                        
                        <div class="tab-pane" id="mon">
                        
                        <?php
                        $nowmon = date("Y-m");
                        echo "<input name='period' type='month' min='2015-09' max='$nowmon'>";
                        ?>
                        
                        
                        
                        
                        </div>
                        
                        
                    </div>-->
                    
                </div><!--グラフ-->
                
            </div><!--class="tab-content"-->
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
        </div><!-- id="main"-->
        
        
        
            
        
<?php require "footer.php" //フッター読み込み?>
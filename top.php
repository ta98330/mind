<?php
    require "spheader.php";
    
    if($_SESSION['login'] == "ログインしていません．" || empty($_SESSION['login'])){
        header('Location: index.php');
    }

    require "header.php";//ヘッダー読み込み
?>
    
    <body>
        <nav class="navbar navbar-default navbar-inverse" role="navigation" id="pagetop">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#pagetop">Mindfulness</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li><p class="navbar-text" id="date"><?=date('n月 j日 (D)')?></p></li>
                <li class="active"><a href="#">Link</a></li>
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                    <li class="divider"></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li>
              </ul>
              
              <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b><?= "{$_SESSION['userName']}さん"?></b> <span class="caret"></span></a>
                    <ul id="login-dp" class="dropdown-menu">
                        <li>
                             <div class="row">
                                    <div class="col-md-12" id="pro_con">
                                        <h1>設定</h1>
                                        <?= "<p>{$_SESSION['userName']}さん<p>"?>
                                        <h2>パスワード変更</h2>
                                        <form class="form" role="form" method="post" name="pass_insert" action="pass_update.php" accept-charset="UTF-8" id="login-nav">
                                            <div class="form-group">
                                                <label class="sr-only" for="exampleInputPassword1">現在のパスワード</label>
                                                <input type="password" class="form-control" name="pass" placeholder="現在のパスワード" required>
                                                <label class="sr-only" for="exampleInputPassword2">新しいパスワード</label>
                                                <input type="password" class="form-control" name="newPass" placeholder="新しいパスワード" required>
                                                <button type="submit" class="btn btn-primary btn-block">変更</button>
                                            </div>
                                        </form>
                                         
                                    </div>
                             </div>
                        </li>
                    </ul>
                </li>
                
                
                <li><a href="logout.php">ログアウト</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>

         
    
        <div class="progress progress-striped active">
          <div class="progress-bar" style="width: <?='90'?>%"></div>
        </div>
        
        <?php
        echo "sessionlogin ",$_SESSION['login'];
        echo " name",$_SESSION['userName']
        
        
        ?>
        
        
        
        
        

        <div class="container" style="padding-top: 20px 0;" id="main">
            
            <ul class="nav nav-tabs nav-justified">
                <li class="active"><a href="#start" data-toggle="tab">スタート</a></li>
                <li><a href="#event" data-toggle="tab">出来事</a></li>
                <li><a href="#graf" data-toggle="tab">グラフ</a></li>
            </ul>
            
            <div class="tab-content">
                <div class="tab-pane" id="start">
                    <h1>スタート</h1>
                    <p>Mindfulnessを開始</p>
                    
                    <div class=”video-wrap”><iframe src="https://www.youtube.com/embed/2W2EvcXrb3A" frameborder="0" allowfullscreen></iframe></div>
                    
                    
                    <section>
                        <h1>今の気分は？</h1>
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



                    </section>
                </div>
                
                <div class="tab-pane" id="event">
                    <h1>出来事</h1>
                    <p>今日の出来事を記録しましょう</p>
                    
                    <form action="event_insert.php" method="post">
                        <div class="form-group">
                            <label class="control-label" for="eventContent">今日の出来事(200文字まで)</label>
                            <textarea name="eventContent" placeholder="入力してください。"　id="eventContent" class="form-control" required></textarea>
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
                            
                            echo "<li>";
                            echo "<h2>$datetime</h2>\n";
                            echo "<p>$content</p>";
                            echo "</li>";
                        }
                        ?>
                    
                    
                   </ul> 
                    
                    
                </div>
                
                <div class="tab-pane active" id="graf">
                    <h1>グラフ</h1>
                    <p>気分の変動</p>
                    
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
                    
                    <?php
                    $pdo = new PDO("mysql:dbname={$_SESSION['dbname']}", "{$_SESSION['dbusername']}", "{$_SESSION['dbpass']}");
                    
                    $st = $pdo->query("SELECT FROM mf_impressions WHERE id = '{$_POST['userId']}'");
                    while ($row = $st->fetch()) {
                        $rep = htmlspecialchars($row['rep']);
                        $datetime = htmlspecialchars($row['datetime']);
                        $bfaf = htmlspecialchars($row['bfaf']);
                        $ang = htmlspecialchars($row['ang']);
                        $sad = htmlspecialchars($row['sad']);
                        $joy = htmlspecialchars($row['joy']);
                        $stress = htmlspecialchars($row['stress']);
                        
                        $瞑想前{} = $var;
                        
                        
                        
                    }
                    
                    
                    
                    include_once('GoogChart.class.php');
                    
                    $chart = new GoogChart();

                    $color = array(//色
                        '#99C754',
                        '#54C7C5',
                        '#999999',
                    );
                    
                    // Set multiple graph data
                    $dataMultiple = array( 
                        '瞑想前' => array(
                            'IE7' => 1,
                            'IE6' => 2,
                            'IE5' => 3,
                            'Firefox' => 4,
                            'Mozilla' => 1,
                            'Safari' => 2,
                            'Opera' => 3,
                        ),
                        '瞑想後' => array(
                            'IE7' => 22,
                            'IE6' => 30.7,
                            'IE5' => 1.7,
                            'Firefox' => 36.5,
                            'Mozilla' => 1.1,
                            'Safari' => 2,
                            'Opera' => 1.4,
                        ),
                    );
                    


                    $chart->setChartAttrs( array(
                        'type' => 'line',
                        'title' => 'Browser market 2008',
                        'data' => $dataMultiple,
                        'size' => array( 550, 200 ),
                        'color' => $color,
                        'labelsXY' => true,
                        ));
                    // Print chart
                    echo $chart;

                    
                    
                    ?>
                    
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
                        
                        
                    </div>
                    
                    
                    
                    
                    
                    
                </div>
            </div>
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
        </div>
        
        
        
            
        
<?php require "footer.php" //フッター読み込み?>
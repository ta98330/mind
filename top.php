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
        
        <ul class="nav row" id="strmenu">
            <li class="col-xs-6"><a data-toggle="modal" href="#emoselModal" class="btn btn-success btn-block">スタート</a></li>
            <li class="col-xs-6"><a href="event.php" class="btn btn-success btn-block">出来事</a></li>
            <li class="col-xs-6"><a href="graph.php" class="btn btn-success btn-block">グラフ</a></li>
            <li class="col-xs-6"><a href="logout.php" class="btn btn-success btn-block">ログアウト</a></li>
        </ul>
        
        
            
            
            
            

            <div id="emoselModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h2 id="emoselModal-title">瞑想前の今の気分は？</h3>
                        </div>
                        <div class="modal-body">
                            <form action="impressions.php" method="post">
                                <div class="form-group" id="impression">
                                    <input type="hidden" name="bfaf" value="bf">
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

                                    <p class="control-label"><b>不安</b></p>
                                    <div class="checkbox-inline">
                                        <input required="required" type="radio" value="1" name="anxiety" id="anxiety1">
                                        <label for="anxiety1">1</label>
                                    </div>
                                    <div class="checkbox-inline">
                                        <input type="radio" value="2" name="anxiety" id="anxiety2">
                                        <label for="anxiety2">2</label>
                                    </div>
                                    <div class="checkbox-inline">
                                        <input type="radio" value="3" name="anxiety" id="anxiety3">
                                        <label for="anxiety3">3</label>
                                    </div>
                                    <div class="checkbox-inline">
                                        <input type="radio" value="4" name="anxiety" id="anxiety4">
                                        <label for="anxiety4">4</label>
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
                                    <input type="submit" value="始める" class="btn btn-primary">
                                </div>
                            </form>
                        </div>                
                    </div>
                 </div>
            </div>    
            
            
            
        
        
        
            
        
<?php require "footer.php" //フッター読み込み?>
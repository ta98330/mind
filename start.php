<?php
    require "spheader.php";
    
    if($_SESSION['login'] == "ログインしていません．" || empty($_SESSION['login'])){
        header('Location: index.php');
    }
    require "header.php";//ヘッダー読み込み
?>
<body>

       
                    
                    
                    
                    
                    
                    
                    
                
    
    <div class="container" id="main">
    
        <h1>スタート</h1>
        <p>Mindfulnessを開始</p>

        <div class="embed-responsive embed-responsive-16by9"><iframe src="https://www.youtube.com/embed/2W2EvcXrb3A" frameborder="0" allowfullscreen></iframe></div>

        <h2>瞑想後の今の気分は？</h2>
        <form action="impressions.php" method="post">
            <div class="form-group" id="impression">
                <input type="hidden" name="bfaf" value="af">
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
                <input type="submit" value="終わる" class="btn btn-primary">
            </div>
        </form>
        
    </div>

<?php require "footer.php" //フッター読み込み?>
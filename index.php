<?php
    require "spheader.php";
    
    if($_SESSION['login'] == "ログイン中！"){
        header('Location: top.php');
    }
    require "header.php";//ヘッダー読み込み
?>

    
    <body>
        <nav class="navbar navbar-default navbar-inverse" role="navigation" id="top">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Mindfulness</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#top">Link</a></li>
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
                <li><p class="navbar-text">ログインしてください</p></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
                    <ul id="login-dp" class="dropdown-menu">
                        <li>
                             <div class="row">
                                    <div class="col-md-12">
                                        ログイン
                                         <form class="form" role="form" method="post" action="login.php" accept-charset="UTF-8" id="login-nav">
                                                <div class="form-group">
                                                     <label class="sr-only" for="exampleinputformat">ID</label>
                                                     <input type="text" class="form-control" name="id" placeholder="ID" required>
                                                </div>
                                                <div class="form-group">
                                                     <label class="sr-only" for="exampleInputPassword2">Password</label>
                                                     <input type="password" class="form-control" name="pass" placeholder="Password" required>
                                                     <div class="help-block text-right"><a href="">Forget the password ?</a></div>
                                                </div>
                                                <div class="form-group">
                                                     <button type="submit" class="btn btn-primary btn-block">ログイン</button>
                                                </div>
                                         </form>
                                    </div>
                                    <div class="bottom text-center">
                                        New here ? <a href="#"><b>Join Us</b></a>
                                    </div>
                             </div>
                        </li>
                    </ul>
                </li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
        
        
        
        
        
        
        <header>
            <h1>Mindfulness</h1>
        </header>
        
        <div id="splash">
            <h1>Mindfulnessとは</h1>
            <p><blockquote cite="http://mindfulness.jp.net/concept.html">今、この瞬間の体験に意図的に意識を向け、評価をせずに、とらわれのない状態で、ただ観ること</blockquote>-日本マインドフルネス学会-</p>
        </div>
        
        
    
    
    
        
    
<?php require "footer.php" //フッター読み込み?>
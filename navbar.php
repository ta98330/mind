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
              </ul>
              
              <ul class="nav navbar-nav navbar-right" <?php if($_SESSION['login'] == "ログインしていません．" || empty($_SESSION['login'])){
        echo "style='display: none'";
    }?>>
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
                
            <ul class="nav navbar-nav navbar-right" <?php if($_SESSION['login'] == "ログイン中！"){
        echo "style='display: none'";
    }?>>
                <li class="dropdown"  id="signup">
                  <a href="#signup" class="dropdown-toggle" data-toggle="dropdown"><b>SignUp</b> <span class="caret"></span></a>
                    <ul id="login-dp" class="dropdown-menu">
                        <li>
                             <div class="row">
                                    <div class="col-md-12">
                                         SignUp
                                         <form class="form" role="form" method="post" action="signin.php" accept-charset="UTF-8" id="login-nav">
                                                <div class="form-group">
                                                     <label class="sr-only" for="exampleinputformat">User Name</label>
                                                     <input type="text" class="form-control" name="username" placeholder="User Name" required>
                                                </div>
                                                <div class="form-group">
                                                                     <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                                                     <input type="email" class="form-control" name="address" id="exampleInputEmail2" placeholder="Email address" required>
                                                                </div>
                                                <div class="form-group">
                                                     <label class="sr-only" for="exampleInputPassword2">Password</label>
                                                     <input type="password" class="form-control" name="pass" placeholder="Password" required>
                                                </div>
                                                <div class="form-group">
                                                     <button type="submit" class="btn btn-primary btn-block">SignUp</button>
                                                </div>
                                         </form>
                                    </div>
                             </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
                    <ul id="login-dp" class="dropdown-menu">
                        <li>
                             <div class="row">
                                    <div class="col-md-12">
                                        ログイン
                                         <form class="form" role="form" method="post" action="login.php" accept-charset="UTF-8" id="login-nav">
                                                <div class="form-group">
                                                     <label class="sr-only" for="exampleinputformat">UserName</label>
                                                     <input type="text" class="form-control" name="username" placeholder="UserName" required>
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
                                        New here ? <a href="#signup" data-toggle="dropdown"><b>Join Us</b></a>
                                    </div>
                             </div>
                        </li>
                    </ul>
                </li>
                </div>  
              </ul>
              
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
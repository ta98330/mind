<?php
    require "spheader.php";
    
    if($_SESSION['login'] == "ログイン中！"){
        header('Location: top.php');
    }
    require "header.php";//ヘッダー読み込み
?>

    
    <body>
        <header>
            <h1>Mindfulness</h1>
        </header>
        
        <div id="splash">
            <h1>Mindfulnessとは</h1>
            <p><blockquote cite="http://mindfulness.jp.net/concept.html">今、この瞬間の体験に意図的に意識を向け、評価をせずに、とらわれのない状態で、ただ観ること</blockquote>-日本マインドフルネス学会-</p>
        </div>
        
        
    
    
    
        <div class = "container">
            <div class="wrapper">
                <form action="login.php" method="post" name="Login_Form" class="form-signin">       
                    <h3 class="form-signin-heading">Welcome Back! Please Sign In</h3>
                      <hr class="colorgraph"><br>

                      <input type="number" class="form-control" name="id" placeholder="UserID" required="" autofocus="">
                      <input type="password" class="form-control" name="pass" placeholder="Password" required=""/>     		  

                      <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit">Login</button>  			
                </form>			
            </div>
        </div>
    
<?php require "footer.php" //フッター読み込み?>
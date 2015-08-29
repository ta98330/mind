<?php
    require "spheader.php";
    
    if($_SESSION['login'] == "ログインしていません．"/* || $_SESSION['userName'] == NULL*/){
        header('Location: index.php');
    }

    require "header.php";//ヘッダー読み込み
?>
    
    <body>
        <header>
            <h1>Mindfulness</h1>
        </header>
        
    
        <div id="user">
          
          <?="<p>{$_SESSION['userName']}さん</p>"?>
        </div>
    
        <div class="progress progress-striped active">
  <div class="progress-bar" style="width: <?='90'?>%"></div>
</div>

        <div class="container" style="padding-top: 20px 0;">
            
            <ul class="nav nav-tabs">
                <li class="active"><a href="#start" data-toggle="tab">スタート</a></li>
                <li><a href="#event" data-toggle="tab">出来事</a></li>
                <li><a href="#graf" data-toggle="tab">グラフ</a></li>
                <li><a href="#config" data-toggle="tab">設定</a></li>
            </ul>
            
            <div class="tab-content">
                <div class="tab-pane activ" id="start">
                    <h1>スタート</h1>
                    <p>Mindfulnessを開始</p>
                    <section>
                        <h1>感想</h1>
                        <form action="../test.php" method="post">
                            ID<input type="text" name="id"><br />
                            感想
                            <select name="evaluation">
                                <option value="実感アリ">実感アリ</option>
                                <option value="普通">普通</option>
                                <option value="実感ナシ">実感ナシ</option>
                            </select>
                            怒り
                            <input type="radio" name="anger" value="1">
                            <div class="form-group">
                                <p class="control-label"><b>怒り</b></p>
                                  <div class="checkbox-inline">
                                    <input type="radio" value="soccer" name="interests" id="interest_soccer">
                                      <label for="interest_soccer">サッカー</label>
                                  </div>
                                  <div class="checkbox-inline">
                                    <input type="radio" value="basketball" name="interests" id="interest_basketball">
                                      <label for="interest_basketball">バスケットボール</label>
                                  </div>
                                  <div class="checkbox-inline">
                                    <input type="radio" value="baseball" name="interests" id="interest_baseball">
                                      <label for="interest_baseball">野球</label>
                                  </div> 

                            <input type="submit">
                        </form>



                    </section>
                </div>
                <div class="tab-pane" id="event">
                    <h1>出来事</h1>
                    <p>今日の出来事を記録しましょう</p>
                </div>
                <div class="tab-pane" id="graf">
                    <h1>グラフ</h1>
                    <p>気分の変動</p>
                    
                    <form>
                        <div class="form-group">
                            
                        </div>
                    </form>
                    
                    
                    
                </div>
                <div class="tab-pane" id="config">
                    <h1>設定</h1>
                    <p>プロフィールなど</p>
                </div>
            </div>
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
        </div>
        
        
        <div class="container">
            <div class="row">
                <div class="span12">
                    <p class="lead">Bare minimum radio button tabs example:</p>
                    <div id="tab" class="btn-group" data-toggle="buttons-radio">
                      <a href="#prices" class="btn active" data-toggle="tab">Prices</a>
                      <a href="#features" class="btn" data-toggle="tab">Features</a>
                      <a href="#requests" class="btn" data-toggle="tab">Requests</a>
                      <a href="#contact" class="btn"  data-toggle="tab">Contact</a>
                    </div>

                    <div class="tab-content">
                      <div class="tab-pane active" id="prices">Prices content</div>
                      <div class="tab-pane" id="features">Features Content</div>
                      <div class="tab-pane" id="requests">Requests Content</div>
                      <div class="tab-pane" id="contact">Contact Content</div>
                    </div>


                    <hr>

                    <p class="lead">More complex content example:</p>
                    <div id="tab" class="btn-group" data-toggle="buttons-radio">
                      <a href="#prices2" class="btn btn-large btn-info active" data-toggle="tab">Prices</a>
                      <a href="#features2" class="btn btn-large btn-info" data-toggle="tab">Features</a>
                      <a href="#requests2" class="btn btn-large btn-info" data-toggle="tab">Requests</a>
                      <a href="#contact2" class="btn btn-large btn-info"  data-toggle="tab">Contact</a>
                    </div>

                    <div class="tab-content">
                      <div class="tab-pane active" id="prices2">
                        <br>
                        <p class="lead">Prices content</p>
                        <div class="row">
                            <div class="span3">
                              <img src="http://placehold.it/200x200">  
                            </div>
                            <div class="span9">
                              <p>There are now two rates of Capital Gains Tax (CGT) for individuals. A standard rate of 18% and a higher rate of 28%. The annual exempt amount is still £10,100 for ’10-’11. For more information on CGT please see the factsheet we have put together, which is available to download below.</p> 
                            </div>
                        </div>
                      </div>
                      <div class="tab-pane" id="features2">
                            <br>
                        <p class="lead">Features content</p>
                        <div class="row">
                            <div class="span6">
                              <p>For a full list of our services including support and consultancy for start-up businesses please see the Our Services section of the website. Alternatively if you have a specific service or question in mind please don’t hesitate to contact us to discuss this using the contact details on the Contact Us page of the site.</p> 
                            </div>
                            <div class="span6">
                              <img src="http://placehold.it/400x400">  
                            </div>
                        </div>
                      </div>
                      <div class="tab-pane" id="requests2">
                            <br>
                        <p class="lead">Requests content</p>
                        <div class="row">
                            <div class="span3">
                              <img src="http://placehold.it/200x200">  
                            </div>
                            <div class="span5">
                              <p>There are now two rates of Capital Gains Tax (CGT) for individuals. A standard rate of 18% and a higher rate of 28%. The annual exempt amount is still £10,100 for ’10-’11. For more information on CGT please see the factsheet we have put together, which is available to download below.</p> 
                            </div>
                            <div class="span4">
                              <img src="http://placehold.it/400x200">  
                            </div>
                        </div>
                      </div>
                      <div class="tab-pane" id="contact2">
                            <br>
                        <p class="lead">Contact Us</p>
                        <form class="well span8">
                          <div class="row">
                                <div class="span3">
                                    <label>First Name</label>
                                    <input type="text" class="span3" placeholder="Your First Name">
                                    <label>Last Name</label>
                                    <input type="text" class="span3" placeholder="Your Last Name">
                                    <label>Email Address</label>
                                    <input type="text" class="span3" placeholder="Your email address">
                                    <label>Subject
                                    <select id="subject" name="subject" class="span3">
                                        <option value="na" selected="">Choose One:</option>
                                        <option value="service">General Customer Service</option>
                                        <option value="suggestions">Suggestions</option>
                                        <option value="product">Product Support</option>
                                    </select>
                                    </label>
                                </div>
                                <div class="span5">
                                    <label>Message</label>
                                    <textarea name="message" id="message" class="input-xlarge span5" rows="10"></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary pull-right">Send</button>
                            </div>
                        </form>
                      </div>
                    </div>
                </div>
            </div>
        </div>
            
        
<?php require "footer.php" //フッター読み込み?>
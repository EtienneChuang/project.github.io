<!DOCTYPE HTML>
<html>
<head>
  <title>首頁</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
  <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
  <script type="text/javascript" src="js/constructor.js"></script>
</head>
<script type="text/javascript">
  function quizAlert(obj){
    alert("請先閱讀文章，之後再進行測驗");
  }
  function loginAlert(obj){
    alert("請先登入");
  }
</script>
<body>
  <div id="main">
    <header>
      <nav>
        <div id="menu_container">
          <ul class="sf-menu" id="nav">
            <?php
              function show_page_after_login(){
                print <<<LIST
                <li><a href="#">首頁</a></li>
                <li><a href="back/background.php">背景簡介</a></li>
                <li><a href="understanding/understanding.php">正文</a></li>
                <li><a href="#" onclick="quizAlert(this)">測驗</a></li>
                <li><a href="EngIndex.php">English</a></li>
              </ul>
              <br>
LIST;
              //print "Hello ".$_POST['ID']."!";
              print <<<BUTTON
                  <form method="POST" action="$_SERVER[PHP_SELF]">
                  <font size="3" color="black"> Hello {$_SESSION['user']}! </font>
                  <input type="hidden" name="logout" value="true"></input>
                  <input type="submit" value="logout"></input>
                  </form>
BUTTON;
              }
              function show_page_before_login(){
                print <<<LIST
                <li><a href="#" onclick="loginAlert(this)">首頁</a></li>
                <li><a href="#" onclick="loginAlert(this)">背景簡介</a></li>
                <li><a href="#" onclick="loginAlert(this)">正文</a></li>
              <li><a href="#" onclick="loginAlert(this)">測驗</a></li>
              <li><a href="EngIndex.php">English</a></li>
            </ul>
            <br>
LIST;
            print<<<_HTML_
          <form method="POST" action="$_SERVER[PHP_SELF]">
          <input type="text" name="ID" placeholder="帳號"></input>
          <input type="password" name="PWD" placeholder="密碼"></input>
          <input type="submit" value="Login"></input>
          </form>
_HTML_;
              }
              function show_page_when_fail(){
                print <<<LIST
                <li><a href="#" onclick="loginAlert(this)">首頁</a></li>
                <li><a href="#" onclick="loginAlert(this)">背景簡介</a></li>
                <li><a href="#" onclick="loginAlert(this)">正文</a></li>
                <li><a href="#" onclick="loginAlert(this)">測驗</a></li>
                <li><a href="EngIndex.php">English</a></li>
            </ul>
            <br>
LIST;
            print<<<_HTML_
          <form method="POST" action="$_SERVER[PHP_SELF]">
          <input type="text" name="ID" placeholder="帳號">></input>
          <input type="password" name="PWD" placeholder="密碼"></input>
          <input type="submit" value="Login"></input>
          </form>
          錯誤!
_HTML_;
              }
              session_start();
              if(isset($_POST['logout'])){
                session_unset();
                session_destroy();
                unset($_POST['ID']);
                show_page_before_login();
              }
              //if(isset($_POST['ID']||isset($_SESSION['user']))){
              else{
                if(isset($_SESSION['user'])){
                  //true
                  show_page_after_login();
                }
                else{
                  if(isset($_POST['ID'])){
                    //connect to database
                    $link = mysql_connect("localhost", "root", "root1234");
                    if(!$link){
                      print "connection failed<br>";
                    }
                    $db_selected = mysql_select_db("user_data", $link);
                    if(!$db_selected){
                      die("Can't access<br>".mysql_error($link));
                    }
                    $sql = "SELECT PWD FROM data WHERE ID='".$_POST['ID']."'";
                    $result = mysql_query($sql, $link);
                    $data = mysql_fetch_row($result);
                    if($_POST['PWD']===$data[0]){
                      $_SESSION['user'] = $_POST['ID'];
                      show_page_after_login();
                    }
                    else{
                      show_page_when_fail();
                    }
                  }
                  else{
                    show_page_before_login();
                  }
                }
              }
          ?>
        </div>
      </nav>       
    <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <!--
          <h1><a href="index.html">English<span class="logo_colour">_learning</span></a></h1>-->
          <h2>目前位置</h2>
          <h1><a href="#"><b>首頁</b></a></h1>
        </div>
      </div>

    </header>
    <div id="site_content">
      <div id="sidebar_container">
        <div class="sidebar" id="latestNews">
        </div>
        <div class="sidebar" id="usefulLink">
        </div>
        <!--
        <div class="sidebar">
          <h3>More Useful Links</h3>
          <ul>
            <li><a href="#">First Link</a></li>
            <li><a href="#">First Link</a></li>
            <li><a href="#">Another Link</a></li>
            <li><a href="#">And Another</a></li>
            <li><a href="#">Last One</a></li>
          </ul>
        </div>-->
      </div>
      <div class="content">
        <ul><h1>概覽</h1><hr/>
          <li><h2>背景簡介</h2>　提供文章主題的相關背景知識供讀者參考<hr/></li>
          <li><h2>正文</h2>　在每個單元中將分成幾個部分 :
            <ul>
              <li><h3>全文</h3>包含原文文章、翻譯文章以及原文文章的閱讀</li>
              <li><h3>單字</h3>包含單字的字義、單字例句以及單字查詢</li>
            </ul>
          <hr/></li>
          <li><h2>測驗</h2>　依據文章內容來提供一些讀完文章後的測驗，包括:
            <ul>
              <li><h3>閱讀測驗</h3></li>
              <li><h3>克漏字測驗</h3></li>
              <li><h3>翻譯填空</h3></li>
              <li><h3>句子改寫</h3></li>
              <li><h3>合併句子</h3></li>
            </ul>
          <hr/></li>
          <!--
          <li><h2>補充</h2>　一些額外的補充<hr/></li>-->
        </ul>
      </div>
    </div>
    <div id="scroll">
      <a title="Scroll to the top" class="top" href="#"><img src="images/top.png" alt="top" /></a>
    </div>
    <footer>
      <p><img src="images/twitter.png" alt="twitter" />&nbsp;<img src="images/facebook.png" alt="facebook" />&nbsp;<img src="images/rss.png" alt="rss" /></p>
      <p><a href="#">首頁</a> | <a href="back/background.php">背景簡介</a> | <a href="understanding/understanding.php">正文</a> | <a href="#">測驗</a> </p>
      <p>Copyright &copy; CSS3_clouds | <a href="http://www.css3templates.co.uk">design from css3templates.co.uk</a></p>
    </footer>
  </div>
  <!-- javascript at the bottom for fast page loading -->
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery.easing-sooper.js"></script>
  <script type="text/javascript" src="js/jquery.sooperfish.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('ul.sf-menu').sooperfish();
      $('.top').click(function() {$('html, body').animate({scrollTop:0}, 'fast'); return false;});
    });
  </script>
</body>
</html>
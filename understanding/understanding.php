<!DOCTYPE HTML>
<html>

<head>
  <title>正文</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="../js/modernizr-1.5.min.js"></script>
  <script type="text/javascript" src="../js/jquery-1.10.2.js"></script>
  <script type="text/javascript" src="../js/constructor.js"></script>
</head>
<script type="text/javascript">/*
  function quizAlert(obj){
    alert("請先閱讀文章，之後再進行測驗");
  }*/
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
              function show_page_when_session_exist(){
                print <<<PAGE
                <li><a href="../index.php">首頁</a></li>
                <li><a href="../back/background.php">背景簡介</a></li>
                <li><a href="#">正文</a></li>
                <li><a href="#">測驗</a></li>
                <li><a href="EngUnderstanding.php">English</a></li>
                </ul>
                <br>
PAGE;
                print <<<BUTTON
                  <form method="POST" action="$_SERVER[PHP_SELF]">
                  <font size="3" color="black"> Hello {$_SESSION['user']}! </font>
                  <input type="hidden" name="logout" value="true"></input>
                  <input type="submit" value="logout"></input>
                  </form>
BUTTON;
              }
              function show_page_when_session_not_exist(){
                print <<<PAGE
                <li><a href="../index.php">首頁</a></li>
                <li><a href="#" onclick="loginAlert(this)">背景簡介</a></li>
                <li><a href="#" onclick="loginAlert(this)">正文</a></li>
                <li><a href="#" onclick="loginAlert(this)">測驗</a></li>
                <li><a href="EngUnderstanding.php">English</a></li>
                </ul>
                <br>
PAGE;
                print<<<_HTML_
                <form method="POST" action="$_SERVER[PHP_SELF]">
                <input type="text" name="ID" placeholder="帳號"></input>
                <input type="password" name="PWD" placeholder="密碼"></input>
                <input type="submit" value="Login"></input>
                </form>
_HTML_;
              }
              function show_page_when_session_not_exist_and_fail(){
                print <<<PAGE
                <li><a href="../index.php">首頁</a></li>
                <li><a href="#" onclick="loginAlert(this)">背景簡介</a></li>
                <li><a href="#" onclick="loginAlert(this)">正文</a></li>
                <li><a href="#" onclick="loginAlert(this)">測驗</a></li>
                <li><a href="EngUnderstanding.php">English</a></li>
                </ul>
                <br>
PAGE;
                print<<<_HTML_
                <form method="POST" action="$_SERVER[PHP_SELF]">
                <input type="text" name="ID" placeholder="帳號"></input>
                <input type="password" name="PWD" placeholder="密碼"></input>
                <input type="submit" value="Login"></input>
                </form>
                ERROR
_HTML_;
              }
              session_start();
              $_SESSION['exist'] = False;
              if(isset($_POST['logout'])){
                session_unset();
                session_destroy();
                $_SESSION['exist'] = False;
                show_page_when_session_not_exist();
              }
              else{
                if(isset($_SESSION['user'])){
                  $_SESSION['exist'] = True;
                  show_page_when_session_exist();
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
                      $_SESSION['user']=$_POST['ID'];
                      $_SESSION['exist'] = True;
                      show_page_when_session_exist();
                    }
                    else{
                      $_SESSION['exist'] = False;
                      show_page_when_session_not_exist_and_fail();
                    }
                  }
                  else{
                    $_SESSION['exist'] = False;
                    show_page_when_session_not_exist();
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
          <h1><a href="../index.html">首頁</a> -> <a href="#"><b>正文</b></a></h1>
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
            <li><a href="#">Another Link</a></li>
            <li><a href="#">And Another</a></li>
            <li><a href="#">Last One</a></li>
          </ul>
        </div>-->
      </div>
      <div class="content">
        <h3>此主題包括了全文閱讀以及單字，選擇一個單元進入全文部分</h3>
        <hr>
        <br>
        <br>
        <div class='background'>
          <ul class="unitol" style="list-style-type:none">
            <?php
              function print_content_when_session_exists(){
                print <<<PAGE
            <li><a href="article/articleUnit1.php"><h4>Unit 1 : Taiwanese Designer's Fashions fit For a First Lady</h4></a></li><br>
            <li><a href="article/articleUnit2.html"><h4>Unit 2 : Dogs Are More Than Man's Best Friend</h4></a></li><br>
            <li><a href="article/articleUnit3.html"><h4>Unit 3 : Florentijn Hofman: Spreading Joy With Art</h4></a></li><br>
            <li><a href="article/articleUnit4.html"><h4>Unit 4 : Sweeten Up Yourr Sweetheart</h4></a></li><br>
            <li><a href="article/articleUnit5.html"><h4>Unit 5 : Finding NEMO 3D</h4></a></li><br>
            <li><a href="article/articleUnit6.html"><h4>Unit 6 : Winter X Games</h4></a></li><br>
            <li><a href="article/articleUnit7.html"><h4>Unit 7 : Nature's Keepers</h4></a></li><br>
PAGE;
              }
              function print_content_when_session_doesnt_exists(){
                print <<<PAGE
            <li><a href="#" onclick="loginAlert(this)"><h4>Unit 1 : Taiwanese Designer's Fashions fit For a First Lady</h4></a></li><br>
            <li><a href="#" onclick="loginAlert(this)"><h4>Unit 2 : Dogs Are More Than Man's Best Friend</h4></a></li><br>
            <li><a href="#" onclick="loginAlert(this)"><h4>Unit 3 : Florentijn Hofman: Spreading Joy With Art</h4></a></li><br>
            <li><a href="#" onclick="loginAlert(this)"><h4>Unit 4 : Sweeten Up Yourr Sweetheart</h4></a></li><br>
            <li><a href="#" onclick="loginAlert(this)"><h4>Unit 5 : Finding NEMO 3D</h4></a></li><br>
            <li><a href="#" onclick="loginAlert(this)"><h4>Unit 6 : Winter X Games</h4></a></li><br>
            <li><a href="#" onclick="loginAlert(this)"><h4>Unit 7 : Nature's Keepers</h4></a></li><br>
PAGE;
              }
              if($_SESSION['exist']){
                print_content_when_session_exists();
              }
              else{
                print_content_when_session_doesnt_exists();
              }
            ?>
          </ul>
        </div>
      </div>
    </div>
    <div id="scroll">
      <a title="Scroll to the top" class="top" href="#"><img src="../images/top.png" alt="top" /></a>
    </div>
    <footer>
      <p><img src="../images/twitter.png" alt="twitter" />&nbsp;<img src="../images/facebook.png" alt="facebook" />&nbsp;<img src="../images/rss.png" alt="rss" /></p>
      <p><a href="../index.php">首頁</a> | <a href="../back/background.php">背景簡介</a> | <a href="#">正文</a> | <a href="#">測驗</a></p>
      <p>Copyright &copy; CSS3_clouds | <a href="http://www.css3templates.co.uk">design from css3templates.co.uk</a></p>
    </footer>
  </div>
  <!-- javascript at the bottom for fast page loading -->
  <script type="text/javascript" src="../js/jquery.js"></script>
  <script type="text/javascript" src="../js/jquery.easing-sooper.js"></script>
  <script type="text/javascript" src="../js/jquery.sooperfish.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('ul.sf-menu').sooperfish();
      $('.top').click(function() {$('html, body').animate({scrollTop:0}, 'fast'); return false;});
    });
  </script>
</body>
</html>

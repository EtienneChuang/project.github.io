<!DOCTYPE HTML>
<html>
<head>
  <title>背景知識</title>
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
                <li><a href="#">背景簡介</a></li>
                <li><a href="../understanding/understanding.php">正文</a></li>
                <li><a href="#">測驗</a></li>
                <li><a href="EngBackground.php">English</a></li>
                </ul>
                <br>
PAGE;
                print <<<BUTTON
                  <form method="POST" action="$_SERVER[PHP_SELF]">
                  <font size="3" color="black"> Hello {$_SESSION['user']}! </font>
                  <input type="hidden" name="logout" value="true"></input>
                  <input type="submit" value="logout"></input>
                  <font size="3" color="black">  觀看次數: {$_SESSION['freqB']} </font>
                  </form>

BUTTON;
              }
              function show_page_when_session_not_exist(){
                print <<<PAGE
                <li><a href="../index.php">首頁</a></li>
                <li><a href="#" onclick="loginAlert(this)">背景簡介</a></li>
                <li><a href="#" onclick="loginAlert(this)">正文</a></li>
                <li><a href="#" onclick="loginAlert(this)">測驗</a></li>
                <li><a href="EngBackground.php">English</a></li>
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
                <li><a href="EngBackground.php">English</a></li>
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
              if(isset($_POST['logout'])){
                session_unset();
                session_destroy();

                show_page_when_session_not_exist();
              }
              else{
                if(isset($_SESSION['user'])){
                  $link = mysql_connect("localhost", "root", "root1234");
                    if(!$link){
                      print "connection failed<br>";
                    }
                    $db_selected = mysql_select_db("user_data", $link);
                    if(!$db_selected){
                      die("Can't access<br>".mysql_error($link));
                    }
                    $select_freqB = "SELECT FreqB FROM data_ch1 WHERE ID='".$_SESSION['user']."'";
                      $select_result = mysql_query($select_freqB, $link);
                      if($select_result)
                        ; 
                      else
                        print "error";
                      $data = mysql_fetch_row($select_result);
                      $_SESSION['freqB'] = $data[0]+1;
                      $update_freqB = "UPDATE data_ch1 SET FreqB=Freqb+1 WHERE ID='".$_SESSION['user']."'";
                      if(mysql_query($update_freqB, $link))
                        ;
                      else
                        print "error";
                    $string = '1';
                    $select_order = "SELECT vieworder FROM data_ch1 WHERE ID='".$_SESSION['user']."'";
                    $result = mysql_query($select_order, $link);
                    $data = mysql_fetch_row($result);
                    $str = $data[0];
                    if($str[strlen($str)-1]=='1')
                      ;
                    else
                      $str = $str.'1';
                    $update_order = "UPDATE data_ch1 SET vieworder = {$str} WHERE ID='".$_SESSION['user']."'";
                    if(mysql_query($update_order, $link))
                      ;
                    else
                      print "error";
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

                      $select_freqB = "SELECT FreqB FROM data_ch1 WHERE ID='".$_SESSION['user']."'";
                      $select_result = mysql_query($select_freqB, $link);
                      if($select_result)
                        ; 
                      else
                        print "error";
                      $data = mysql_fetch_row($select_result);
                      $_SESSION['freqB'] = $data[0]+1;
                      $update_freqB = "UPDATE data_ch1 SET FreqB=Freqb+1 WHERE ID='A0995540'";
                      if(mysql_query($update_freqB, $link))
                        ;
                     else
                        print "error";
                      $string = '1';
                      $select_order = "SELECT vieworder FROM data_ch1 WHERE ID='".$_SESSION['user']."'";
                      $result = mysql_query($select_order, $link);
                      $data = mysql_fetch_row($result);
                      $str = $data[0];
                      if($str[strlen($str)-1]=='1')
                        ;
                      else
                        $str = $str.'1';
                      $update_order = "UPDATE data_ch1 SET vieworder = {$str} WHERE ID='".$_SESSION['user']."'";
                      if(mysql_query($update_order, $link))
                        ;
                      else
                        print "error";
                        show_page_when_session_exist();
                    }
                    else{
                      show_page_when_session_not_exist_and_fail();
                    }
                  }
                  else{
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
          <h1><a href="../index.php">首頁</a> -> <a href="#"><b>背景簡介</b></a></h1>
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
        <h2>此頁面收錄了與每個單元文章所相關的背景知識</h2><hr><br>
        <div class='background'>
          <h3>Unit 1 - Taiwanese Designer's Fashions fit For a First Lady</h3>
          <ol class="backol">
            <li><a href="http://zh.wikipedia.org/zh-tw/%E5%90%B3%E5%AD%A3%E5%89%9B" target="blank">吳季剛─维基百科</a></li><hr><br>
            <li><a href="http://storyintaiwan.appspot.com/dogwebtemp/taiwanspirit_wugigone.html" target="blank">吳季剛─台灣的故事</a></li><hr><br>
            <li><a href="http://www.parenting.com.tw/article/article.action?id=5046551" target="blank">親子天下雜誌－42期－吳季剛做自己，沒有理由不自信</a></li><hr><br>
            <li><a href="http://www.vogue.com/voguepedia/Jason_Wu" target="blank">Jason Wu─Voguepedia</a></li><hr><br>
            <li><a href="http://www.nytimes.com/2009/01/25/fashion/25WU.html?_r=2&" target="blank">The Spotlight Finds Jason Wu</a></li><br>
          </ol>
        </div>
        <hr><br>
        <div class='background'>
          <h3>Unit 2 - Dogs Are More Than Man's Best Friend</h3>
          <ol class="backol">
            <li><a href="http://www.tada-taiwan.com/" target="blank">TADA─中華民國台灣協助犬協會</a></li><hr><br>
            <li><a href="http://en.wikipedia.org/wiki/Assistance_dog" target="blank">Assistance dog─wikipedia</a></li><hr><br>
            <li><a href="http://www.assistancedogsinternational.org" target="blank">Assistance Dogs International</a></li><br>
          </ol>
        </div>
        <hr><br>
        <div class='background'>
          <h3>Unit 3 - Florentijn Hofman: Spreading Joy With Art</h3>
          <ol class="backol">
            <li><a href="http://nl.wikipedia.org/wiki/Florentijn_Hofman" target="blank">Florentijn Hofman─wikipedia</a></li><hr><br>
            <li><a href="http://www.florentijnhofman.nl/dev/project.php?id=154" target="blank">Rubber Duck - Florentijn Hofman</a></li><hr><br>
            <li><a href="http://www.florentijnhofman.nl/dev/projects.php" target="blank">Florentijn Hofman's projects</a></li><br>
          </ol>
        </div>
        <hr><br>
        <div class='background'>
          <h3>Unit 4 - Sweeten Up Your Sweetheart</h3>
          <ol class="backol">
            <li><a href="http://zh.wikipedia.org/wiki/%E6%83%85%E4%BA%BA%E8%8A%82" target="blank">情人節─维基百科</a></li><hr><br>
            <li><a href="http://en.wikipedia.org/wiki/Valentine's_Day" target="blank">Valentine's Day─wikipedia</a></li><hr><br>
            <li><a href="http://zh.wikipedia.org/wiki/%E8%8A%9D%E5%A3%AB%E7%81%AB%E9%8D%8B" target="blank">起司火鍋─维基百科</a></li><hr><br>
            <li><a href="http://en.wikipedia.org/wiki/Fondue" target="blank">Foudue─wikipedia</a></li><hr><br>
            <li><a href="http://www.wisegeek.com/what-is-fondue.htm" target="blank">What Is Fondue?</a></li><br>
          </ol>
        </div>
        <hr><br>
        <div class='background'>
          <h3>Unit 5 - Finding NEMO 3D</h3>
          <ol class="backol">
            <li><a href="http://zh.wikipedia.org/wiki/%E6%B5%B7%E5%BA%95%E6%80%BB%E5%8A%A8%E5%91%98" target="blank">海底總動員─維基百科</a></li><hr><br>
            <li><a href="http://www.disney.co.uk/finding-nemo/" target="blank">Finding Nemo </a></li><hr><br>
            <li><a href="http://www.youtube.com/watch?v=SPHfeNgogVs" target="blank">Finding Nemo 3D Trailer</a></li><br>
          </ol>
        </div>
        <hr><br>
        <div class='background'>
          <h3>Unit 6 - Winter X Games</h3>
          <ol class="backol">
            <li><a href="http://zh.wikipedia.org/wiki/%E4%B8%96%E7%95%8C%E6%9E%81%E9%99%90%E8%BF%90%E5%8A%A8%E4%BC%9A" target="blank">世界極限運動會─維基百科</a></li><hr><br>
            <li><a href=" http://en.wikipedia.org/wiki/X_Games" target="blank">X Games introduction on Wikipedia</a></li><hr><br>
            <li><a href=" http://www.chiff.com/recreation/sports/winter-x-games.htm" target="blank">2013 Winter X Games introduction and winners</a></li><hr><br>
            <li><a href="http://xgames.espn.go.com/events/2013/aspen/" target="blank">Official website on ESPN</a></li><hr><br>
            <li><a href=" http://extreme.com/freeski/1026337/winter-x-games-aspen-2013-best-bits" target="blank">精采特技合輯(Winter X Games Aspen 2013-Best Bits)</a></li><hr><br>
            <li><a href="https://www.youtube.com/watch?v=iKlzBd8CEXc" target="blank">Gold medal winner of Superpipe</a></li><hr><br>
            <li><a href=" https://www.youtube.com/watch?v=HlBGe3O4Y-o" target="blank">Skiing- final</a></li><br>
          </ol>
        </div>
        <hr><br>
        <div class='background'>
          <h3>Unit 7 - Nature's Keepers</h3>
          <ol class="backol">
            <li><a href="http://www.greenbalkans-wrbc.org/show.php?id=761&language=en_EN&cat_id=35" target="blank">White Storks Raised in The Rescue Centre Were Released從保加利亞動物救治中心野
        放的鸛</a></li><hr><br>
            <li><a href="http://www.greenbalkans-wrbc.org/show.php?id=767&language=en_EN&cat_id=35" target="blank">A New Home for The Vultures  禿鷹野放計畫</a></li><hr><br>
            <li><a href="http://www.vier-pfoten.org/en/projects/bears/dancing-bearpark-belitsa/" target="blank">Dancing Bear Park Introduction　Dancing Bear Park介紹</a></li><hr><br>
            <li><a href="http://translate.google.com.tw/translate?hl=zh-Hant-TW&langpair=en%7Czh-Ha nt&u=http://greenbalkans.org/category.php?language%3Den_EN%26cat_id%3D65" target="blank">保加利亞的禿鷹介紹及保護方法</a></li><hr><br>
            <li><a href=" http://greenbalkans.org/category.php?language=en_EN&cat_id=65" target="blank">(同上)英文原文 English version</a></li><hr><br>
            <li><a href="https://www.youtube.com/watch?v=iKlzBd8CEXc" target="blank">Dancing Bear Park影片</a></li><hr><br>
            <li><a href="https://www.youtube.com/watch?v=uxWRfCHIpS4" target="blank">Skiing- final</a></li><br>
          </ol>
        </div>
      </div>
    </div>
    <div id="scroll">
      <a title="Scroll to the top" class="top" href="#"><img src="../images/top.png" alt="top" /></a>
    </div>
    <footer>
      <p><img src="../images/twitter.png" alt="twitter" />&nbsp;<img src="../images/facebook.png" alt="facebook" />&nbsp;<img src="../images/rss.png" alt="rss" /></p>
      <p><a href="../index.php">首頁</a> | <a href="#">背景簡介</a> | <a href="../understanding/understanding.php">正文</a> | <a href="#">測驗</a></p>
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

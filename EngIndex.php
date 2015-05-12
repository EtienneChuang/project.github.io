<!DOCTYPE HTML>
<html>

<head>
  <title>Home</title>
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
    alert("Please read the artcile fisrt.");
  }
  function loginAlert(obj){
    alert("Please login at first!");
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
                <li><a href="EngIndex.php">Home</a></li>
                <li><a href="back/EngBackground.php">Introductory section</a></li>
                <li><a href="understanding/EngUnderstanding.php">Text-based section</a></li>
                <li><a href="#" onclick="quizAlert(this)">Monitoring section</a></li>
                <!--<li><a href="#">補充</a></li>-->
                <li><a href="Index.php">中文</a></li>
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
                <li><a href="#" onclick="loginAlert(this)">Home</a></li>
                <li><a href="#" onclick="loginAlert(this)">Introductory section</a></li>
                <li><a href="#" onclick="loginAlert(this)">Text-based section</a></li>
              <li><a href="#" onclick="loginAlert(this)">Monitoring section</a></li>
              <li><a href="Index.php">中文</a></li>
            </ul>
            <br>
LIST;
            print<<<_HTML_
          <form method="POST" action="$_SERVER[PHP_SELF]">
          <input type="text" name="ID" size="5" placeholder="Account"></input>
          <input type="password" name="PWD" size="5" placeholder="Password"></input>
          <input type="submit" value="Login"></input>
          </form>
_HTML_;
              }
              function show_page_when_fail(){
                print <<<LIST
                <li><a href="#" onclick="loginAlert(this)">Home</a></li>
                <li><a href="#" onclick="loginAlert(this)">Introductory section</a></li>
                <li><a href="#" onclick="loginAlert(this)">Text-based section</a></li>
              <li><a href="#" onclick="loginAlert(this)">Monitoring section</a></li>
              <li><a href="Index.php">中文</a></li>
            </ul>
            <br>
LIST;
            print<<<_HTML_
          <form method="POST" action="$_SERVER[PHP_SELF]">
          <input type="text" name="ID" size="5" placeholder="Account"></input>
          <input type="password" name="PWD" size="5" placeholder="Password"></input>
          <input type="submit" value="Login"></input>
          </form>
          ERROR!
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
          <h2>Now</h2>
          <h1><a href="#"><b>Home</b></a></h1>
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
        <ul><h1>overview</h1><hr/>
          <li><h2>Introductory section</h2>　Offering the background knowledge related to the article.<hr/></li>
          <li><h2>Text-based section</h2>　There are two parts in each unit:
            <ul>
              <li><h3>Article</h3>Including original articles and translated articles</li>
              <li><h3>Vocabulary</h3>Including vocabulary meanings, example sentences, and dictionary</li>
            </ul>
          <hr/></li>
          <li><h2>Monitoring section</h2>　Related to the content of the articles, including:
            <ul>
              <li><h3>Reading Comprehension Test</h3></li>
              <li><h3>Cloze Test</h3></li>
              <li><h3>Filling in the Blank</h3></li>
              <li><h3>Sentence Rewriting</h3></li>
              <li><h3>Sentence Combining</h3></li>
            </ul>
          <hr/></li>
          <!--
          <li><h2>Extra Materials</h2>　Providing extra materials for understanding<hr/></li>-->
        </ul>
      </div>
    </div>
    <div id="scroll">
      <a title="Scroll to the top" class="top" href="#"><img src="images/top.png" alt="top" /></a>
    </div>
    <footer>
      <p><img src="images/twitter.png" alt="twitter" />&nbsp;<img src="images/facebook.png" alt="facebook" />&nbsp;<img src="images/rss.png" alt="rss" /></p>
      <p><a href="#">Home</a> | <a href="back/EngBackground.php">Introductory section</a> | <a href="understanding/EngUnderstanding.php">Text-based section</a> | <a href="#">Monitoring section</a></p>
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



<!DOCTYPE HTML>
<html>

<head>
  <title>Vocabulary:Unit1</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="../../css/style.css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="../../js/modernizr-1.5.min.js"></script>
  <script type="text/javascript" src="../../js/jquery-1.10.2.js"></script>
  <script type="text/javascript" src="../../js/constructor.js"></script>
  <script type="text/javascript">
  function vocaClick(obj){
    $(obj).siblings('p').show('slow');
  }
  function cancel(obj){
    $(obj).parent('p').hide('slow');
  }
  function loginAlert(obj){
    alert("請先登入");
  }
  </script>
</head>

<body>
  <div id="main">
    <header>
      <nav>
        <div id="menu_container">
          <ul class="sf-menu" id="nav">
            <?php
              function show_page_when_session_exist(){
                print <<<PAGE
                <li><a href="../../EngIndex.php">Home</a></li>
                <li><a href="../../back/EngBackground.php">Introductory section</a></li>
                <li><a href="../EngUnderstanding.php">Text-based section</a>
                  <ul>
                    <li><a href="../article/EngArticleUnit1.php">Article</a>
                    </li>
                    <li><a href="#">Vocabulary</a>
                      <ul>
                        <li><a href="explanation/EngvocaExpUnit1.php">Vocabulary List</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li><a href="../../quiz/EngQuizUnit1.php">Monitoring section</a></li>
                <li><a href="vocabularyUnit1.php">中文</a></li>
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
                <li><a href="../../EngIndex.php">Home</a></li>
                <li><a href="#" onclick="loginAlert(this)">Introductory section</a></li>
                <li><a href="#" onclick="loginAlert(this)">Text-based section</a>
                  <ul>
                    <li><a href="#" onclick="loginAlert(this)">Article</a>
                    </li>
                    <li><a href="#" onclick="loginAlert(this)">Vocabulary</a>
                      <ul>
                        <li><a href="#" onclick="loginAlert(this)">Vocabulary List</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li><a href="#" onclick="loginAlert(this)">Monitoring section</a></li>
                <li><a href="vocabularyUnit1.php">中文</a></li>
              </ul>
      
PAGE;
                print<<<_HTML_
                <form method="POST" action="$_SERVER[PHP_SELF]">
                <input type="text" name="ID" size="5" placeholder="Account"></input>
                <input type="password" name="PWD" size="5" placeholder="Password"></input>
                <input type="submit" value="Login"></input>
                </form>
_HTML_;
              }
              function show_page_when_session_not_exist_and_fail(){
                print <<<PAGE
                <li><a href="../../EngIndex.php">Home</a></li>
                <li><a href="#" onclick="loginAlert(this)">Introductory section</a></li>
                <li><a href="#" onclick="loginAlert(this)">Text-based section</a>
                  <ul>
                    <li><a href="#" onclick="loginAlert(this)">Article</a>
                    </li>
                    <li><a href="#" onclick="loginAlert(this)">Vocabulary</a>
                      <ul>
                        <li><a href="#" onclick="loginAlert(this)">Vocabulary List</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li><a href="#" onclick="loginAlert(this)">Monitoring section</a></li>
                <li><a href="vocabularyUnit1.php">中文</a></li>
              </ul>
          
PAGE;
                print<<<_HTML_
                <form method="POST" action="$_SERVER[PHP_SELF]">
                <input type="text" name="ID" size="5" placeholder="Account"></input>
                <input type="password" name="PWD" size="5" placeholder="Password"></input>
                <input type="submit" value="Login"></input>
                ERROR
                </form>
                
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
          <h2>Now</h2>
          <?php
          function print_head_when_session_exists(){
            print <<<HEAD
            <h1><a href="../../EngIndex.php">Home</a>-><a href="../EngUnderstanding.php">Text-based section</a>-><a href="#"><b>Vocabulary</b></a></h1>
HEAD;
          }
          function print_head_when_session_doesnt_exist(){
            print <<<HEAD
            <h2><a href="../../EngIndex.php">Home</a>-><a href="#" onclick="loginAlert(this)">Text-based section</a>-><a href="#" onclick="loginAlert(this)"><b>Vocabulary</b></a></h2>
HEAD;
          }
          if($_SESSION['exist']){
            print_head_when_session_exists();
          }
          else{
            print_head_when_session_doesnt_exist();
          }
          ?>
          
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
        <a href="explanation/EngVocaExpUnit1.php"><h2>Vocabulary</h2></a>
          <p>　Contains all vocabulary and phrases which included in the article.</p>
          <!--
        <a href="#"><h2>單字測驗</h2></a>
          <p>　單字的小測驗</p>-->
        <br>

      </div>
    </div>
    <div id="scroll">
      <a title="Scroll to the top" class="top" href="#"><img src="../../images/top.png" alt="top" /></a>
    </div>
    <footer>
      <p><img src="../../images/twitter.png" alt="twitter" />&nbsp;<img src="../../images/facebook.png" alt="facebook" />&nbsp;<img src="../../images/rss.png" alt="rss" /></p>
      <p><a href="../../EngIndex.php">Home</a> | <a href="../../back/EngBackground.php">Introductory section</a> | <a href="../../understanding/EngUnderstanding.php">Text-based section</a> | <a href="../../quiz/EngQuizUnit1.php">Monitoring section</a></p>
      <p>Copyright &copy; CSS3_clouds | <a href="http://www.css3templates.co.uk">design from css3templates.co.uk</a></p>
    </footer>
  </div>
  <!-- javascript at the bottom for fast page loading -->
  <script type="text/javascript" src="../../js/jquery.js"></script>
  <script type="text/javascript" src="../../js/jquery.easing-sooper.js"></script>
  <script type="text/javascript" src="../../js/jquery.sooperfish.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('ul.sf-menu').sooperfish();
      $('.top').click(function() {$('html, body').animate({scrollTop:0}, 'fast'); return false;});
    });
  </script>
</body>
</html>

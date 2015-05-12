<!DOCTYPE HTML>
<html>

<head>
  <title>Vocabulary list:Unit1</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="../../../css/style.css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="../../../js/modernizr-1.5.min.js"></script>
  <script type="text/javascript" src="../../../js/jquery-1.10.2.js"></script>
  <script type="text/javascript" src="../../../js/constructor.js"></script>
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
                <li><a href="../../../EngIndex.php">Home</a></li>
                <li><a href="../../../back/EngBackground.php">Introductory section</a></li>
                <li><a href="../../EngUnderstanding.php">Text-based section</a>
                  <ul>
                    <li><a href="../../article/EngArticleUnit1.php">Article</a>
                    </li>
                    <li><a href="../../vocabulary/EngVocaUnit1.php">Vocabulary</a>
                      <ul>
                        <li><a href="#">Vocabulary List</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li><a href="../../../quiz/EngQuizUnit1.php">Monitoring section</a></li>
                <li><a href="vocaExpUnit1.php">中文</a></li>
              </ul>
              <br>
PAGE;
                print <<<BUTTON
                  <form method="POST" action="$_SERVER[PHP_SELF]">
                  <font size="3" color="black"> Hello {$_SESSION['user']}! </font>
                  <input type="hidden" name="logout" value="true"></input>
                  <input type="submit" value="logout"></input>
                  <font size="3" color="black">   Views: {$_SESSION['freqVE']} </font>
                  </form>
BUTTON;
              }
              function show_page_when_session_not_exist(){
                print <<<PAGE
                <li><a href="../../../EngIndex.php">Home</a></li>
                <li><a href="#" onclick="loginAlert(this)">Introductory section</a></li>
                <li><a href="#" onclick="loginAlert(this)">Text-based section</a>
                  <ul>
                    <li><a href="#" onclick="loginAlert(this)">Article</a>
                    </li>
                    <li><a href="#" onclick="loginAlert(this)">Vocabulary</a>
                      <ul>
                        <li><a href="#">Vocabulary List</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li><a href="#" onclick="loginAlert(this)">Monitoring section</a></li>
                <li><a href="vocaExpUnit1.php">中文</a></li>
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
                <li><a href="../../../EngIndex.php">Home</a></li>
                <li><a href="#" onclick="loginAlert(this)">Introductory section</a></li>
                <li><a href="#" onclick="loginAlert(this)">Text-based section</a>
                  <ul>
                    <li><a href="#" onclick="loginAlert(this)">Article</a>
                    </li>
                    <li><a href="#" onclick="loginAlert(this)">Vocabulary</a>
                      <ul>
                        <li><a href="#">Vocabulary List</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li><a href="#" onclick="loginAlert(this)">Monitoring section</a></li>
                <li><a href="vocaExpUnit1.php">中文</a></li>
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
                  $link = mysql_connect("localhost", "root", "root1234");
                    if(!$link){
                      print "connection failed<br>";
                    }
                    $db_selected = mysql_select_db("user_data", $link);
                    if(!$db_selected){
                      die("Can't access<br>".mysql_error($link));
                    }
                    $select_freqVE = "SELECT FreqVE FROM data_ch1 WHERE ID='".$_SESSION['user']."'";
                      $select_result = mysql_query($select_freqVE, $link);
                      if($select_result)
                        ; 
                      else
                        print "error";
                      $data = mysql_fetch_row($select_result);
                      $_SESSION['freqVE'] = $data[0]+1;
                      $update_freqVE = "UPDATE data_ch1 SET FreqVE=FreqVE+1 WHERE ID='".$_SESSION['user']."'";
                      if(mysql_query($update_freqVE, $link))
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
                      $_SESSION['exist'] = True;
                      $link = mysql_connect("localhost", "root", "root1234");
                      if(!$link){
                        print "connection failed<br>";
                      }
                      $db_selected = mysql_select_db("user_data", $link);
                      if(!$db_selected){
                        die("Can't access<br>".mysql_error($link));
                      }
                      $select_freqVE = "SELECT FreqVE FROM data_ch1 WHERE ID='".$_SESSION['user']."'";
                        $select_result = mysql_query($select_freqVE, $link);
                      if($select_result)
                        ; 
                      else
                        print "error";
                      $data = mysql_fetch_row($select_result);
                      $_SESSION['freqVE'] = $data[0]+1;
                      $update_freqVE = "UPDATE data_ch1 SET FreqVE=FreqVE+1 WHERE ID='".$_SESSION['user']."'";
                      if(mysql_query($update_freqVE, $link))
                        ;
                      else
                        print "error";
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
            <h2><a href="../../../EngIndex.php">Home</a>-><a href="../../EngUnderstanding.php">Text-based section</a>-><a href="../EngVocaUnit1.php">Vocabulary</a><br>-><a href="#"><b>Vocabulary List</b></a></h2>
HEAD;
          }
          function print_head_when_session_doesnt_exist(){
            print <<<HEAD
            <h2><a href="../../../EngIndex.html">Home</a>-><a href="#" onclick="loginAlert(this)">Text-based section</a>-><a href="#" onclick="loginAlert(this)">Vocabulary</a><br>-><a href="#" onclick="loginAlert(this)"><b>Vocabulary List</b></a></h2>
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
        <h3>Click on word and you will see the explanation.</h3>
        <hr><br>
        <div class="voca">
          <b onclick="vocaClick(this)">glamorous</b> [ˈglæmərəs] adj. 迷人的 <br/> <p>The famous fashion model is always wearing glamorous clothes <br/>那位知名的時裝與模特兒總是穿著光鮮亮麗的衣服。<img src="../../../images/arrow.png" onclick="cancel(this)"></img></p><br>
        </div>
        <div class="voca">
          <b onclick="vocaClick(this)">fanatic</b> [fəˈnætɪk] n. 狂熱份子 <br/> <p>Ted is a film fanatic, and his film collection includes thousands of movies.<br/>泰德很迷電影，他收藏了好幾千部影片。<img src="../../../images/arrow.png" onclick="cancel(this)"></img></p><br>
        </div>
        <div class="voca">  
          <b onclick="vocaClick(this)">take to</b> 從事;開始喜歡 <br/> <p>Mark took to baseball at a young age because his father encouraged him to do so.<br/>在父親的鼓勵之下，馬克很小的時候就開始打棒球了。<img src="../../../images/arrow.png" onclick="cancel(this)"></img></p><br>
        </div>
        <div class="voca">  
          <b onclick="vocaClick(this)">fascination</b> [ˌfæsnˈeʃən] n. 著迷 <br/> <p>I have a fascination for Japanese culture so I'm really looking forward to my trip to Japan.<br/>我對日本文化相當著迷，所以很期待這趟日本之旅。<img src="../../../images/arrow.png" onclick="cancel(this)"></img></p><br>
        </div>
        <div class="voca">  
          <b onclick="vocaClick(this)">refine</b> [rɪˈfɑɪn] v. 使......精進 <br/><p>The cooking instructor is helping his students to refine their cutting techniques.<br/>這名烹飪老師正在教他的學生如何精進刀功。<img src="../../../images/arrow.png" onclick="cancel(this)"></img></p><br>
        </div>
        <div class="voca">  
          <b onclick="vocaClick(this)">integrity</b> [ɪnˈtɛgrətɪ] n. 正直;誠實 <br/><p>A man of integrity always tells the truth and stands up for what he believes in.<br/>正直的人總是實話實說，堅持信念。<img src="../../../images/arrow.png" onclick="cancel(this)"></img></p><br>
        </div>
        <div class="voca">  
          <b onclick="vocaClick(this)">sensibility</b> [ˌsɛnsəˈbɪlətɪ] n. 敏感;鑑賞力 <br/><p>The director's artistic sensibilities ake him a perfect choice for this movie.<br/>這位導演的藝術美感使他成為這部電影的不二人選。<img src="../../../images/arrow.png" onclick="cancel(this)"></img></p><br>
        </div>
        <div class="voca">  
          <b onclick="vocaClick(this)">solidify</b> [səˈlɪdəfɑɪ] v. 鞏固，加強 <br/><p>The two companies signed a contract to solidify their partnership.<br/>這兩間公司簽訂合約，鞏固彼此的合作關係。<img src="../../../images/arrow.png" onclick="cancel(this)"></img></p><br>
        </div>
        <div class="voca">  
          <b onclick="vocaClick(this)">celebrity</b> [səˈlɛbrətɪ] n. 名人 <br/><p>The company hired a celebrity to help promote their new line of products.<br/>這間公司特地請名人幫忙宣傳他們最新系列的產品。<img src="../../../images/arrow.png" onclick="cancel(this)"></img></p><br>
        </div>
      </div>
    </div>
    <div id="scroll">
      <a title="Scroll to the top" class="top" href="#"><img src="../../../images/top.png" alt="top" /></a>
    </div>
    <footer>
      <p><img src="../../../images/twitter.png" alt="twitter" />&nbsp;<img src="../../../images/facebook.png" alt="facebook" />&nbsp;<img src="../../../images/rss.png" alt="rss" /></p>
      <p><a href="../../../EngIndex.php">Home</a> | <a href="../../../back/EngBackground.php">Introductory section</a> | <a href="../../../understanding/EngUnderstanding.php">Text-based section</a> | <a href="../../../quiz/EngQuizUnit1.php">Monitoring section</a></p>
      <p>Copyright &copy; CSS3_clouds | <a href="http://www.css3templates.co.uk">design from css3templates.co.uk</a></p>
    </footer>
  </div>
  <!-- javascript at the bottom for fast page loading -->
  <script type="text/javascript" src="../../../js/jquery.js"></script>
  <script type="text/javascript" src="../../../js/jquery.easing-sooper.js"></script>
  <script type="text/javascript" src="../../../js/jquery.sooperfish.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('ul.sf-menu').sooperfish();
      $('.top').click(function() {$('html, body').animate({scrollTop:0}, 'fast'); return false;});
    });
  </script>
</body>
</html>

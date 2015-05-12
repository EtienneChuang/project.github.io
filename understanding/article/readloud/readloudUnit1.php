<?php
  session_start();
?>
<!DOCTYPE HTML>
<html>

<head>
  <title>朗讀:Unit1</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="../../../css/style.css" />
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <script type="text/javascript">
  document.createElement("audio");
  </script>
  <script type="text/javascript" src="../../../js/modernizr-1.5.min.js"></script>
  <script type="text/javascript" src="../../../js/jquery-1.10.2.js"></script>
  <script type="text/javascript" src="../../../js/constructor.js"></script>
  <script type="text/javascript">
  function translationClick(obj){
      //$('div#translation').html('<input type="button" id="bTranslation" value="隱藏">');
      $('input#cancelTranslation').show();
      $('div#translation').slideToggle('normal');
  };
  function canceltranslationClick(obj){
      $('input#cancelTranslation').hide('slow');
      $('div#translation').slideToggle('slow');
  }
  var lastID= "";
  function dateUpdate(obj){
    document.getElementById('tracktime').innerHTML = Math.floor(obj.currentTime) + ' / ' + Math.floor(obj.duration);
    if(obj.currentTime!=0&&obj.currentTime<7){
      if(Math.floor(obj.currentTime)==0){
        //alert('ts');
        $('#t1').css('color', 'red');
        lastID = "#t1";
      }
    }
    else if(obj.currentTime>=7&&obj.currentTime<=14){
      if(Math.floor(obj.currentTime)==7)
        $(lastID).css('color', 'black');
      else
        ;
    }
    else if(obj.currentTime>14&&obj.currentTime<=17){
      //alert('AAAAA');
      if(Math.floor(obj.currentTime)==15){
        $('#t2').css('color', 'red');
        lastID = "#t2";
      }
    }
    else if(obj.currentTime>17&&obj.currentTime<=26){
      if(Math.floor(obj.currentTime)==18){
        $(lastID).css('color', 'black');
        $('#t3').css('color', 'red');
        lastID = "#t3";
      }
    }
    else if(obj.currentTime>26&&obj.currentTime<=35){
      if(Math.floor(obj.currentTime)==26){
        $(lastID).css('color', 'black');
        $('#t4').css('color', 'red');
        lastID = "#t4";
      }
    }
    else if(obj.currentTime>35&&obj.currentTime<=38){
      if(Math.floor(obj.currentTime)==35){
        $(lastID).css('color', 'black');
        $('#t5').css('color', 'red');
        lastID = "#t5";
      }
    }
    else if(obj.currentTime>38&&obj.currentTime<=42){
      if(Math.floor(obj.currentTime)==38){
        $(lastID).css('color', 'black');
        $('#t6').css('color', 'red');
        lastID = "#t6";
      }
    }
    else if(obj.currentTime>42&&obj.currentTime<=44){
      if(Math.floor(obj.currentTime)==42){
        $(lastID).css('color', 'black');
        $('#t7').css('color', 'red');
        lastID = "#t7";
      }
    }
    else if(obj.currentTime>44&&obj.currentTime<=48){
      if(Math.floor(obj.currentTime)==44){
        $(lastID).css('color', 'black');
        $('#t8').css('color', 'red');
        lastID = "#t8";
      }
    }
    else if(obj.currentTime>49&&obj.currentTime<=50){
      if(Math.floor(obj.currentTime)==49){
        $(lastID).css('color', 'black');
      }
    }
    else if(obj.currentTime>50&&obj.currentTime<=51){
      if(Math.floor(obj.currentTime)==50){
        //$(lastID).css('color', 'black');
        $('#t9').css('color', 'red');
        lastID = "#t9";
      }
    }
    else if(obj.currentTime>51&&obj.currentTime<=55){
      if(Math.floor(obj.currentTime)==51){
        $(lastID).css('color', 'black');
        $('#t10').css('color', 'red');
        lastID = "#t10";
      }
    }
    else if(obj.currentTime>55&&obj.currentTime<=59){
      if(Math.floor(obj.currentTime)==55){
        $(lastID).css('color', 'black');
        $('#t11').css('color', 'red');
        lastID = "#t11";
      }
    }
    else if(obj.currentTime>59&&obj.currentTime<=67){
      if(Math.floor(obj.currentTime)==59){
        $(lastID).css('color', 'black');
        $('#t12').css('color', 'red');
        lastID = "#t12";
      }
    }
    else if(obj.currentTime>67&&obj.currentTime<=69){
      if(Math.floor(obj.currentTime)==67){
        $(lastID).css('color', 'black');
        $('#t13').css('color', 'red');
        lastID = "#t13";
      }
    }
    else if(obj.currentTime>69&&obj.currentTime<=72){
      if(Math.floor(obj.currentTime)==69){
        $(lastID).css('color', 'black');
        $('#t14').css('color', 'red');
        lastID = "#t14";
      }
    }
    else if(obj.currentTime>72&&obj.currentTime<=74){
      if(Math.floor(obj.currentTime)==72){
        $(lastID).css('color', 'black');
        $('#t15').css('color', 'red');
        lastID = "#t15";
      }
    }
    else if(obj.currentTime>74&&obj.currentTime<=79){
      if(Math.floor(obj.currentTime)==74){
        $(lastID).css('color', 'black');
        $('#t16').css('color', 'red');
        lastID = "#t16";
      }
    }
    else if(obj.currentTime>79&&obj.currentTime<=82){
      if(Math.floor(obj.currentTime)==79){
        $(lastID).css('color', 'black');
        $('#t17').css('color', 'red');
        lastID = "#t17";
      }
    }
    else if(obj.currentTime>82&&obj.currentTime<=85){
      if(Math.floor(obj.currentTime)==82){
        $(lastID).css('color', 'black');
        $('#t18').css('color', 'red');
        lastID = "#t18";
      }
    }
    else if(obj.currentTime>85&&obj.currentTime<=94){
      if(Math.floor(obj.currentTime)==85){
        $(lastID).css('color', 'black');
        $('#t19').css('color', 'red');
        lastID = "#t19";
      }
    }
    else if(obj.currentTime>95&&obj.currentTime<=101){
      if(Math.floor(obj.currentTime)==95){
        $(lastID).css('color', 'black');
        $('#t20').css('color', 'red');
        lastID = "#t20";
      }
    }
    else if(obj.currentTime>102&&obj.currentTime<=109){
      if(Math.floor(obj.currentTime)==102){
        $(lastID).css('color', 'black');
        $('#t21').css('color', 'red');
        lastID = "#t21";
      }
    }
    else if(obj.currentTime>109&&obj.currentTime<=113){
      if(Math.floor(obj.currentTime)==109){
        $(lastID).css('color', 'black');
        $('#t22').css('color', 'red');
        lastID = "#t22";
      }
    }
    else if(obj.currentTime>113&&obj.currentTime<=118){
      if(Math.floor(obj.currentTime)==113){
        $(lastID).css('color', 'black');
        $('#t23').css('color', 'red');
        lastID = "#t23";
      }
    }
    else if(obj.currentTime>118&&obj.currentTime<=123){
      if(Math.floor(obj.currentTime)==118){
        $(lastID).css('color', 'black');
        $('#t24').css('color', 'red');
        lastID = "#t24";
      }
    }
    else if(obj.currentTime>123&&obj.currentTime<=135){
      if(Math.floor(obj.currentTime)==123){
        $(lastID).css('color', 'black');
        $('#t25').css('color', 'red');
        lastID = "#t25";
      }
    }
    else{
      $(lastID).css('color', 'black');
    }
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
                <li><a href="../../../index.php">首頁</a></li>
                <li><a href="../../../back/background.php">背景簡介</a></li>
                <li><a href="#">正文</a>
                  <ul>
                    <li><a href="../../article/articleUnit1.php">全文</a>
                      <ul>
                        <li><a href="../translation/translationUnit1.php">翻譯</a></li>
                        <li><a href="#">全文朗讀</a></li>
                      </ul>
                    </li>
                  <li><a href="../../vocabulary/vocabularyUnit1.php">單字</a></li>
                  </ul>
                </li>
                <li><a href="../../../quiz/quizUnit1.php">測驗</a></li>
                <li><a href="EngReadloudUnit1.php">English</a></li>
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
                <li><a href="../../../index.php">首頁</a></li>
                <li><a href="#" onclick="loginAlert(this)">背景簡介</a></li>
                <li><a href="#" onclick="loginAlert(this)">正文</a>
                  <ul>
                    <li><a href="#" onclick="loginAlert(this)">全文</a>
                      <ul> onclick="loginAlert(this)"
                        <li><a href="#" onclick="loginAlert(this)">翻譯</a></li>
                        <li><a href="#" onclick="loginAlert(this)">全文朗讀</a></li>
                      </ul>
                    </li>
                  <li><a href="#" onclick="loginAlert(this)">單字</a></li>
                  </ul>
                </li>
                <li><a href="#" onclick="loginAlert(this)">測驗</a></li>
                <li><a href="EngReadloudUnit1.php">English</a></li>
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
                <li><a href="../../../index.php">首頁</a></li>
                <li><a href="#" onclick="loginAlert(this)">背景簡介</a></li>
                <li><a href="#" onclick="loginAlert(this)">正文</a>
                  <ul>
                    <li><a href="#" onclick="loginAlert(this)">全文</a>
                      <ul>
                        <li><a href="#" onclick="loginAlert(this)">翻譯</a></li>
                        <li><a href="#" onclick="loginAlert(this)">全文朗讀</a></li>
                      </ul>
                    </li>
                  <li><a href="#" onclick="loginAlert(this)">單字</a></li>
                  </ul>
                </li>
                <li><a href="#" onclick="loginAlert(this)">測驗</a></li>
                <li><a href="EngReadloudUnit1.php">English</a></li>
              </ul>
              <br>
PAGE;
                print<<<_HTML_
                <form method="POST" action="$_SERVER[PHP_SELF]">
                <input type="text" name="ID" placeholder="帳號"></input>
                <input type="password" name="PWD" placeholder="密碼"></input>
                <input type="submit" value="Login"></input>
                ERROR
                </form>
_HTML_;
              }
              //session_start();
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
          <?php
            function print_head_when_session_exists(){
              print <<<HEAD
              <h1><a href="../../../index.php">首頁</a>-><a href="../../understanding.php">正文</a>-><a href="../articleUnit1.php">全文</a><br>-><a href="#"><b>全文朗讀</b></a></h1>
HEAD;
            }
          function print_head_when_session_doesnt_exist(){
              print <<<HEAD
              <h1><a href="../../../index.php">首頁</a>-><a href="#" onclick="loginAlert(this)">正文</a>-><a href="#" onclick="loginAlert(this)">全文</a><br>-><a href="#" onclick="loginAlert(this)"><b>全文朗讀</b></a></h1>
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
      </div>
      <div class="content">
        <div class="title">
          <h2 class="h_title"><font id="t1">Unit 1 : Taiwanese Designer's Fashions fit For a First Lady</font></h2>
        </div>
        <div class="article">
          <?php
            function print_player_when_session_exists(){
              print <<<HEAD
              <audio id="track" src="unit1.mp3" controls
            ontimeupdate="dateUpdate(this)">
            <p>Your browser does not support the audio element</p>
          </audio>
          <span id="tracktime">0 / 0</span>
HEAD;
            }
          function print_player_when_session_doesnt_exist(){
              print <<<HEAD
              <audio id="track" src="unit1.mp3" 
            onclick="loginAlert(this)">
            <p>Your browser does not support the audio element</p>
          </audio>
HEAD;
            }
          if($_SESSION['exist']){
            print_player_when_session_exists();
          }
          else{
            print_player_when_session_doesnt_exist();
          }
          ?>
          <hr>
          <p id='1'><font id="t2">Jason Wu may only be 26 years old</font>, <font id="t3">but the Taiwanese-born fashion designer has already seen his dresses 
            <u>donned</u> by some highly visible and 
            <b id='v1' 
            onMouseOver="vacOver(this)" 
            onMouseOut="vacOut(this)" 
            message="<b>glamorous</b> [ˈglæmərəs] adj. 迷人的 <br/> <p>The famous fashion model is always wearing glamorous clotheds <br/>那位知名的時裝與模特兒總是穿著光鮮亮麗的衣服。</p>">glamorous</b> 
            people</font>. <font id="t4">He found himself thrust into the 
            <u>limelight</u> again when Michelle Obama wore one of his dresses to the 2013 <u>inaugural ball</u></font>.
            <font id="t5">The Fisrt Lady is something of a Wu 
            <b id='v2'
            onMouseOver="vacOver(this)"
            onMouseOut="vacOut(this)"
            message="<b>fanatic</b> [fəˈnætɪk] n. 狂熱份子 <br/> <p>Ted is a film fanatic, and his film collection includes thousands of movies.<br/>泰德很迷電影，他收藏了好幾千部影片。</p>">fanatic</b>
            </font>, <font id="t6"><u>sporting</u> his <u>haute couture</u> during
            the President's first <u>inauguration</u></font>, <font id="t7">on the cover of <i>Vogue</i> magazine</font>, <font id="t8">and on state visits to London to meet Queen Elizabeth II</font>.
          </p>
          <p id='2'><font id="t9">Wu, who was born in Taipei</font>, <font id="t10">was 
            <b id='v3'
            onMouseOver="vacOver(this)"
            onMouseOut="vacOut(this)"
            message="<b>engrossed</b> [ɪnˈgrost] adj. 全神貫注的 <br/> <p>be engrossed in  著迷於... <br/>I was so engrossed in the novel that I completely lost track of time.<br/>我看小說看得出神，完全忘了時間。<p>">engrossed</b> 
            by fashion at an early age</font>, <font id="t11">and 
            <b id='v4'
            onMouseOver="vacOver(this)"
            onMouseOut="vacOut(this)"
            message="<b>take to</b> 從事;開始喜歡 <br/> <p>Mark took to baseball at a young age because his father encouraged him to do so.<br/>在父親的鼓勵之下，馬克很小的時候就開始打棒球了。<p>">took to</b> 
            drawing sketches of wedding dresses he saw in Taipei shops</font>. <font id="t12">His mother noted his 
            <b id='v5'
            onMouseOver="vacOver(this)"
            onMouseOut="vacOut(this)"
            message="<b>fascination</b> [ˌfæsnˈeʃən] n. 著迷 <br/> <p>I have a fascination for Japanese culture so I'm really looking forward to my trip to Japan.<br/>我對日本文化相當著迷，所以很期待這趟日本之旅。<p>">fascination</b> 
            and sent him to study in Vancouver, Canada to 
            <b id='v6'
            onMouseOver="vacOver(this)"
            onMouseOut="vacOut(this)"
            message="<b>refine</b> [rɪˈfɑɪn] v. 使......精進 <br/><p>The cooking instructor is helping his students to refine their cutting techniques.<br/>這名烹飪老師正在教他的學生如何精進刀功。<p>">refine</b> 
            his drawing abilities</font>. <font id="t13">When he was 16</font>, <font id="t14">Wu <u>cold called</u> the president of 
            <b id='v7'
            onMouseOver="vacOver(this)"
            onMouseOut="vacOut(this)"
            message="<b>integrity</b> [ɪnˈtɛgrətɪ] n. 正直;誠實 <br/><p>A man of integrity always tells the truth and stands up for what he believes in.<br/>正直的人總是實話實說，堅持信念。">Integrity</b> 
            Toys</font>, <font id="t15">a company which made dolls</font>, <font id="t16">and sent them his sketches for potential doll clothing</font>. <font id="t17">Before long he was hired and promoted to creative director</font>, <font id="t18">designing dolls' outfits</font>. <font id="t19"><u>Stint</u> in Tokyo, Paris, and New York followedd as he went from creating <u>miniature</u> clothes to <u>life-sized ensembles</u> in 2006</font>. <font id="t20">Over the next few years he dressed the likes of Ivana Trump and notable drag queen RuPaul</font>. <font id="t21">It wasn't until 2008 that Michelle Obama discovered Wu's seemingly timeless design 
            <b id='v8'
            onMouseOver="vacOver(this)"
            onMouseOut="vacOut(this)"
            message="<b>sensibility</b> [ˌsɛnsəˈbɪlətɪ] n. 敏感;鑑賞力 <br/><p>The director's artistic sensibilities ake him a perfect choice for this movie.<br/>這位導演的藝術美感使他成為這部電影的不二人選。<p>">sensibilities</b></font>. 
            <font id="t22">An editor at 
            <i>Vogue</i> showed Obama Wu's work</font>, <font id="t23">which aroused her interest and soon she was sporting his clothes on television</font>. <font id="t24">This 
            <b id='v9'
            onMouseOver="vacOver(this)"
            onMouseOut="vacOut(this)"
            message="<b>solidify</b> [səˈlɪdəfɑɪ] v. 鞏固，加強 <br/><p>The two companies signed a contract to solidify their partnership.<br/>這兩間公司簽訂合約，鞏固彼此的合作關係。<p>">solidified</b> 
            what was arguably Wu's breakout moment in the fashion world</font>. <font id="t25">The young desinger's dresses continue to <u>grace</u> red carpets and find their way into the wardrobes of 
            <b id='v10'
            onMouseOver="vacOver(this)"
            onMouseOut="vacOut(this)"
            message="<b>celebrity</b> [səˈlɛbrətɪ] n. 名人 <br/><p>The company hired a celebrity to help promote their new line of products.<br/>這間公司特地請名人幫忙宣傳他們最新系列的產品。">
            celebrities</b> as he keeps making headlines in the fashion world</font>.
          </p>
        </div>
      </div>
    </div>
    <div id="scroll">
      <a title="Scroll to the top" class="top" href="#"><img src="../../../images/top.png" alt="top" /></a>
    </div>
    <footer>
      <p><img src="../../../images/twitter.png" alt="twitter" />&nbsp;<img src="../../../images/facebook.png" alt="facebook" />&nbsp;<img src="../../../images/rss.png" alt="rss" /></p>
      <p><a href="../../../index.php">首頁</a> | <a href="../../../back/background.php">背景簡介</a> | <a href="../../understanding.php">正文</a> | <a href="../../../quiz/quizUnit1.php">測驗</a></p>
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

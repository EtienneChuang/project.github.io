<!DOCTYPE HTML>
<html>

<head>
  <title>Article:Unit1</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="../../css/style.css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="../../js/modernizr-1.5.min.js"></script>
  <script type="text/javascript" src="../../js/jquery-1.10.2.js"></script>
  <script type="text/javascript" src="../../js/constructor.js"></script>
  <script type="text/javascript">
   function vacOver(obj){
    var vd = document.getElementById('vocaDisplay');
    var vc = document.getElementById('vocaCard');
    var id = obj.id
    //alert(id);
    var position = $("#"+id).offset();  
    var x = position.left;  
    var y = position.top;  
    //alert('x:'+x+', y:'+y); 
    $(obj).css('color', 'red');

    vd.innerHTML = obj.getAttribute('message');
    vc.innerHTML = obj.getAttribute('message');
    $("div#vocaCard").css('position', 'absolute');
    //$("div#vocaCard").css('left', x).css('top', y);
    $("div#vocaCard").css('left', x-40+'px').css('top', y+15+'px');
    $('div#vocaCard').show();

  }
  function vacOut(obj){
    var vd = document.getElementById('vocaDisplay');
    var vc = document.getElementById('vocaCard');
    $(obj).css('color', 'black');
    vc.innerHTML = "";
    $('div#vocaCard').hide();
    //vd.innerHTML = "";
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
                    <li><a href="#">Article</a>
                      <ul>
                        <li><a href="translation/EngTranslationUnit1.php">Translation</a></li>
                        <li><a href="readloud/EngReadloudUnit1.php">Reading Aloud</a></li>
                      </ul>
                    </li>
                    <li><a href="../vocabulary/EngVocaUnit1.php">Vocabulary</a></li>
                  </ul>
                </li>
                <li><a href="../../quiz/EngQuizUnit1.php">Monitoring section</a></li>
                <li><a href="articleUnit1.php">中文</a></li>
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
                      <ul>
                        <li><a href="#" onclick="loginAlert(this)">Translation</a></li>
                        <li><a href="#" onclick="loginAlert(this)">Reading Aloud</a></li>
                      </ul>
                    </li>
                    <li><a href="#" onclick="loginAlert(this)">Vocabulary</a></li>
                  </ul>
                </li>
                <li><a href="#" onclick="loginAlert(this)">Monitoring section</a></li>
                <li><a href="articleUnit1.php">中文</a></li>
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
                      <ul>
                        <li><a href="#" onclick="loginAlert(this)">Translation</a></li>
                        <li><a href="#" onclick="loginAlert(this)">Reading Aloud</a></li>
                      </ul>
                    </li>
                    <li><a href="#" onclick="loginAlert(this)">Vocabulary</a></li>
                  </ul>
                </li>
                <li><a href="#" onclick="loginAlert(this)">Monitoring section</a></li>
                <li><a href="articleUnit1.php">中文</a></li>
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
                  $string = '2';
                  $select_orderE = "SELECT vieworderE FROM data_ch1 WHERE ID='".$_SESSION['user']."'";
                  $result = mysql_query($select_orderE, $link);
                  $data = mysql_fetch_row($result);
                  $str = $data[0];
                  if($str[strlen($str)-1]=='2')
                    ;
                  else
                    $str = $str.'2';
                  $update_orderE = "UPDATE data_ch1 SET vieworderE = {$str} WHERE ID='".$_SESSION['user']."'";
                  if(mysql_query($update_orderE, $link))
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
                      $string = '2';
                      $select_orderE = "SELECT vieworderE FROM data_ch1 WHERE ID='".$_SESSION['user']."'";
                      $result = mysql_query($select_orderE, $link);
                      $data = mysql_fetch_row($result);
                      $str = $data[0];
                      if($str[strlen($str)-1]=='2')
                        ;
                      else
                        $str = $str.'2';
                      $update_orderE = "UPDATE data_ch1 SET vieworderE = {$str} WHERE ID='".$_SESSION['user']."'";
                      if(mysql_query($update_orderE, $link))
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
          <h1><a href="../../EngIndex.html">Home</a>-><a href="../EngUnderstanding.html">Introductory section</a>-><a href="#"><b>Article</b></a></h1>
        </div>
      </div>
    </header>
    <div id="site_content">
      <div id="sidebar_container">
        <!--
        <font style="background-color: #B4E3FF">VOCABULARY</font>/<font style="background-color: #F2B7B4">PHRASE</font>
        <hr>
        <br>
        <div class="sidebar" id="vocaDisplay" style="height: 200px">
        </div>
        <hr>-->
        <div class="sidebar" id="usefulLink">
        </div>
        <span>
          <font style="background-color: #B4E3FF">VOCABULARY</font>/<font style="background-color: #F2B7B4">PHRASE</font>
        </span>
        <hr>
        <br>
        <div id='vocaDisplay' style='height: 200px'>

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
        <div class="title">
          <!--<h5>小提示: 將游標移到以"粗體"表示的單字可查看解釋</h5>-->
          <h2 class="h_title">Unit 1 : Taiwanese Designer's Fashions fit For a First Lady</h2>
        </div>
        <div class="article">
          <div style="float:left">
            <img src="../../images/jason-wu2.jpg">
            </img><br>
            <b style="color: "> (Jason Wu) </b><br>
          </div>
          <p id='1'>Jason Wu may only be 26 years old, but the Taiwanese-born fashion designer has already seen his dresses 
            <u id="a1"
            onMouseOver="vacOver(this)" 
            onMouseOut="vacOut(this)" 
            message="<b>don</b> [dɑn] <br>v.. 穿上；披上 <br/>">donned</u> by some highly visible and 
            <b id='v1' 
            onMouseOver="vacOver(this)" 
            onMouseOut="vacOut(this)" 
            message="<b>glamorous</b> [ˈglæmərəs] adj. 迷人的 <br/> <p>The famous fashion model is always wearing glamorous clotheds <br/>那位知名的時裝與模特兒總是穿著光鮮亮麗的衣服。</p>">glamorous</b> 
            people. He found himself thrust into the 
            <u id="a2"
            onMouseOver="vacOver(this)" 
            onMouseOut="vacOut(this)" 
            message="<b>limelight</b> [ˋlaɪm͵laɪt] <br>n. 焦點 <br/>">limelight</u> again when Michelle Obama wore one of his dresses to the 2013 
            <u id="a3"
            onMouseOver="vacOver(this)" 
            onMouseOut="vacOut(this)" 
            message="<b>inaugural ball</b> [ɪnˋɔgjərəl] <br>就職舞會 <br/>">inaugural ball</u>.
            The Fisrt Lady is something of a Wu 
            <b id='v2'
            onMouseOver="vacOver(this)"
            onMouseOut="vacOut(this)"
            message="<b>fanatic</b> [fəˈnætɪk] n. 狂熱份子 <br/> <p>Ted is a film fanatic, and his film collection includes thousands of movies.<br/>泰德很迷電影，他收藏了好幾千部影片。</p>">fanatic</b>
            , 
            <u id="a4"
            onMouseOver="vacOver(this)" 
            onMouseOut="vacOut(this)" 
            message="<b>sport</b> [sport] <br>v. 炫耀；展現 <br/>">sporting</u> his 
            <u id="a5"
            onMouseOver="vacOver(this)" 
            onMouseOut="vacOut(this)" 
            message="<b>haute couture</b> [ ͵ot ku'tur ]    <br>n. 高級訂製服 <br/>">haute couture</u> during
            the President's first 
            <u id="a6"
            onMouseOver="vacOver(this)" 
            onMouseOut="vacOut(this)" 
            message="<b>inauguration</b> [ɪn͵ɔgjəˋreʃən] <br>n. 就職典禮 <br/>">inauguration</u>, on the cover of <i>Vogue</i> magazine, and on state visits to London to meet Queen Elizabeth II.
          </p>
          <div style="float:right">
            　　　<img src="../../images/dress.jpg">
            </img><br>
            <h5>flickr by national <br>museum of american<br> history</h5>
            <img src="../../images/firstlady.jpg">
            </img>
            <h5>Photo by Sustainable<br> sanitation from flickr</h5>
            <br>
          </div>
          <p id='2'>Wu, who was born in Taipei, was 
            <b id='v3'
            onMouseOver="vacOver(this)"
            onMouseOut="vacOut(this)"
            message="<b>engrossed</b> [ɪnˈgrost] adj. 全神貫注的 <br/> <p>be engrossed in  著迷於... <br/>I was so engrossed in the novel that I completely lost track of time.<br/>我看小說看得出神，完全忘了時間。<p>">engrossed</b> 
            by fashion at an early age, and 
            <font style="background-color: #FFD5D2" id='p1'
            onMouseOver="vacOver(this)"
            onMouseOut="vacOut(this)"
            message="<b>take to</b> 從事;開始喜歡 <br/> <p>Mark <font style='color: #F778A1'>took to</font> baseball at a young age because his father encouraged him to do so.<br/>在父親的鼓勵之下，馬克很小的時候就開始打棒球了。<p>">took to</font> 
            drawing sketches of wedding dresses he saw in Taipei shops. His mother noted his 
            <b id='v4'
            onMouseOver="vacOver(this)"
            onMouseOut="vacOut(this)"
            message="<b>fascination</b> [ˌfæsnˈeʃən] n. 著迷 <br/> <p>I have a fascination for Japanese culture so I'm really looking forward to my trip to Japan.<br/>我對日本文化相當著迷，所以很期待這趟日本之旅。<p>">fascination</b> 
            and sent him to study in Vancouver, Canada to 
            <b id='v5'
            onMouseOver="vacOver(this)"
            onMouseOut="vacOut(this)"
            message="<b>refine</b> [rɪˈfɑɪn] v. 使......精進 <br/><p>The cooking instructor is helping his students to refine their cutting techniques.<br/>這名烹飪老師正在教他的學生如何精進刀功。<p>">refine</b> 
            his drawing abilities. When he was 16, Wu 
            <u id="a7"
            onMouseOver="vacOver(this)" 
            onMouseOut="vacOut(this)" 
            message="<b>cold call</b> [dɑn] <br>n. 電話推銷 <br/>">cold called</u> the president of 
            <b id='v6'
            onMouseOver="vacOver(this)"
            onMouseOut="vacOut(this)"
            message="<b>integrity</b> [ɪnˈtɛgrətɪ] n. 正直;誠實 <br/><p>A man of integrity always tells the truth and stands up for what he believes in.<br/>正直的人總是實話實說，堅持信念。">Integrity</b> 
            Toys, a company which made dolls, and sent them his sketches for potential doll clothing. Before long he was hired and promoted to creative director, designing dolls' outfits. 
            <u id="a8"
            onMouseOver="vacOver(this)" 
            onMouseOut="vacOut(this)" 
            message="<b>stint</b> [stɪnt] <br>n. (工作的) 一段時間 <br/>">Stint</u> in Tokyo, Paris, and New York followedd as he went from creating 
            <u id="a9"
            onMouseOver="vacOver(this)" 
            onMouseOut="vacOut(this)" 
            message="<b>miniature</b> [ˋmɪnɪətʃɚ] <br>adj. 小型的 <br/>">miniature</u> clothes to 
            <u id="a10"
            onMouseOver="vacOver(this)" 
            onMouseOut="vacOut(this)" 
            message="<b>life-sized</b> [ˋlaɪfˋsaɪzd] <br>adj. 真人大小的 <br/>">life-sized</u> 
            <u id="a11"
            onMouseOver="vacOver(this)" 
            onMouseOut="vacOut(this)" 
            message="<b>ensemble</b> [ɑnˋsɑmb!] <br>n. 整套服裝；整體 <br/>">ensembles</u> in 2006. Over the next few years he dressed the likes of Ivana Trump and notable drag queen RuPaul. It wasn't until 2008 that Michelle Obama discovered Wu's seemingly timeless design 
            <b id='v7'
            onMouseOver="vacOver(this)"
            onMouseOut="vacOut(this)"
            message="<b>sensibility</b> [ˌsɛnsəˈbɪlətɪ] n. 敏感;鑑賞力 <br/><p>The director's artistic sensibilities ake him a perfect choice for this movie.<br/>這位導演的藝術美感使他成為這部電影的不二人選。<p>">sensibilities</b>. 
            An editor at 
            <i>Vogue</i> showed Obama Wu's work, which aroused her interest and soon she was sporting his clothes on television. This 
            <b id='v8'
            onMouseOver="vacOver(this)"
            onMouseOut="vacOut(this)"
            message="<b>solidify</b> [səˈlɪdəfɑɪ] v. 鞏固，加強 <br/><p>The two companies signed a contract to solidify their partnership.<br/>這兩間公司簽訂合約，鞏固彼此的合作關係。<p>">solidified</b> 
            what was arguably Wu's breakout moment in the fashion world. The young designer's dresses continue to 
            <u id="a12"
            onMouseOver="vacOver(this)" 
            onMouseOut="vacOut(this)" 
            message="<b>grace</b> [gres] <br>vt. 使......增添光輝 <br/>">grace</u> red carpets and find their way into the wardrobes of 
            <b id='v9'
            onMouseOver="vacOver(this)"
            onMouseOut="vacOut(this)"
            message="<b>celebrity</b> [səˈlɛbrətɪ] n. 名人 <br/><p>The company hired a celebrity to help promote their new line of products.<br/>這間公司特地請名人幫忙宣傳他們最新系列的產品。">
            celebrities</b> as he keeps making headlines in the fashion world.
          </p>
          <p>
            (Source: <i>English 4U May 2013 Unit1</i>)
          </p>
        </div>
        <div id="vocaCard" style="background-color:#FFF4C1;
          width:200px;
          height:auto;
          opacity: 0.93;border: 1px #888888 solid;
          -moz-box-shadow: 0px 0px 33px 1px #b4c8ca;
          -webkit-box-shadow: 0px 0px 33px 1px #b4c8ca;
          box-shadow: 0px 0px 33px 1px #b4c8ca;
          border: 1px #000000 solid;
          padding-top:10px;
          padding-left:10px;">
        </div>
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

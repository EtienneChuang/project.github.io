<!DOCTYPE HTML>
<html>

<head>
  <title>Cloze Test:Unit1</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="../../css/style.css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="../../js/modernizr-1.5.min.js"></script>
  <script type="text/javascript" src="../../js/jquery-1.10.2.js"></script>
  <script type="text/javascript" src="../../js/jquery-1.10.2.js"></script>
  <script type="text/javascript" src="../../js/constructor.js"></script>
  <script type="text/javascript">
  function load(){
    window.location = "#seeExp";
  }
  function doExerciseClick(obj){
      //$('div#translation').html('<input type="button" id="bTranslation" value="隱藏">');
      $('input#bCancelDo').show();
      $('div#clozeSet').slideToggle('slow');
  };
  function cancelDoExerciseClick(obj){
      $('input#bCancelDo').hide('slow');
      $('div#clozeSet').slideToggle('slow');
  }
  function checkAns(obj){
      var numRight = 0;
      var anss = new Array();
      var userAnss = new Array();
      anss[0] = "D";
      anss[1] = "C";
      anss[2] = "A";
      anss[3] = "A";
      anss[4] = "B";
      anss[5] = "B";
      anss[6] = "C";
      var i,j;
      for(i=0;i<anss.length;i++){
        var name = "a" + (i+1);
        //從a(1-7)檢查
        var checkString = "input[name=" + name + "]:radio:checked";
        //prompt($(checkString).val());
        if($(checkString).val()==null)
          break;
        userAnss[i] = $(checkString).val();
      }
      if(userAnss.length!=7){
        alert("Please finish all questions.");
        return;
      }

      for(i=0;i<anss.length;i++){
        var id = "ia" + (i+1);
        if(anss[i] == userAnss[i]){
          numRight++;
          var tid = "img#a" + (i+1);
          $(tid).attr('src', '../../true.jpg');
          continue;
        }
        else{
          var tid = "img#a" + (i+1);
          var tfid = "torf" + (i+1);
          $(tid).attr('src', '../../false.jpg');
          document.getElementById(tfid).innerHTML = "The correct answer is (" + anss[i] + ")";
         // alert('成功');
        }
        $('input#btnAns').hide();
        $('input#bCancelDo').hide();
        $('input#bDo').hide();
        $('span#keyandexp').show('slow');
        $('div#anss').show('slow');
        load();
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
                <li><a href="../../EngIndex.php">Home</a></li>
                <li><a href="../../back/EngBackground.php">Introductory section</a></li>
                <li><a href="../../understanding/EngUnderstanding.php">Text-based section</a>
                  <ul>
                    <li><a href="../../understanding/article/EngArticleUnit1.php">Article</a>
                      <ul>
                        <li><a href="../../understanding/article/translation/EngTranslationUnit1.php">Translation</a></li>
                        <li><a href="../../understanding/article/readloud/EngReadloudUnit1.php">Reading aloud</a></li>
                      </ul>
                    </li>
                    <li><a href="../../understanding/vocabulary/EngVocaUnit1.php">Vocabulary</a>
                    </li>
                  </ul>
                </li>
                <li><a href="../EngQuizUnit1.php">Monitoring section</a>
                  <ul>
                    <li><a href="#">Cloze Test</a></li>
                  </ul>
                </li>
                <li><a href="clozeUnit1.php">中文</a></li>
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
                <li><a href="#" onclick="loginAlert(this)">Home</a></li>
                <li><a href="#" onclick="loginAlert(this)">Introductory section</a></li>
                <li><a href="#" onclick="loginAlert(this)">Text-based section</a>
                  <ul>
                    <li><a href="#" onclick="loginAlert(this)">Article</a>
                      <ul>
                        <li><a href="#" onclick="loginAlert(this)">Translation</a></li>
                        <li><a href="#" onclick="loginAlert(this)">Reading aloud</a></li>
                      </ul>
                    </li>
                    <li><a href="#" onclick="loginAlert(this)">Vocabulary</a>
                    </li>
                  </ul>
                </li>
                <li><a href="#" onclick="loginAlert(this)">Monitoring section</a>
                  <ul>
                    <li><a href="#" onclick="loginAlert(this)">Cloze Test</a></li>
                  </ul>
                </li>
                <li><a href="clozeUnit1.php">中文</a></li>
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
                <li><a href="#" onclick="loginAlert(this)">Home</a></li>
                <li><a href="#" onclick="loginAlert(this)">Introductory section</a></li>
                <li><a href="#" onclick="loginAlert(this)">Text-based section</a>
                  <ul>
                    <li><a href="#" onclick="loginAlert(this)">Article</a>
                      <ul>
                        <li><a href="#" onclick="loginAlert(this)">Translation</a></li>
                        <li><a href="#" onclick="loginAlert(this)">Reading aloud</a></li>
                      </ul>
                    </li>
                    <li><a href="#" onclick="loginAlert(this)">Vocabulary</a>
                    </li>
                  </ul>
                </li>
                <li><a href="#" onclick="loginAlert(this)">Monitoring section</a>
                  <ul>
                    <li><a href="#" onclick="loginAlert(this)">Cloze Test</a></li>
                  </ul>
                </li>
                <li><a href="clozeUnit1.php">中文</a></li>
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
                  $string = '3';
                  $select_orderE = "SELECT vieworderE FROM data_ch1 WHERE ID='".$_SESSION['user']."'";
                  $result = mysql_query($select_orderE, $link);
                  $data = mysql_fetch_row($result);
                  $str = $data[0];
                  if($str[strlen($str)-1]=='3')
                    ;
                  else
                    $str = $str.'3';
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
                      $string = '3';
                      $select_orderE = "SELECT vieworderE FROM data_ch1 WHERE ID='".$_SESSION['user']."'";
                      $result = mysql_query($select_orderE, $link);
                      $data = mysql_fetch_row($result);
                      $str = $data[0];
                      if($str[strlen($str)-1]=='3')
                       ;
                      else
                        $str = $str.'3';
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
          <?php
          function print_head_when_session_exists(){
            print <<<HEAD
            <h2><a href="../../EngIndex.php">Home</a>-><a href="../EngQuizUnit1.php">Monitoring section</a>-><a href="#"><b>Cloze Test</b></a></h2>
HEAD;
          }
          function print_head_when_session_doesnt_exist(){
            print <<<HEAD
            <h2><a href="../../EngIndex.php">Home</a>-><a href="#" onclick="loginAlert(this)">Monitoring section</a>-><a href="#" onclick="loginAlert(this)"><b>Cloze Test</b></a></h2>
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
        <div class="title">
          <h2>Cloze Test</h2>
          <h2 class="h_title">Unit 1 : Taiwanese Designer's Fashions fit For a First Lady</h2>
        </div>
        <div class="article">
          <p id='1'>Jason Wu may only be 26 years old, but the Taiwanese-born fashion designer has already seen his dresses 
            <u>donned</u> by some highly visible and 
            <b id='v1' 
            onMouseOver="vacOver(this)" 
            onMouseOut="vacOut(this)" 
            message="<b>glamorous</b> [ˈglæmərəs] adj. 迷人的 <br/> <p>The famous fashion model is always wearing glamorous clotheds <br/>那位知名的時裝與模特兒總是穿著光鮮亮麗的衣服。</p>">glamorous</b> 
            people. He found himself <u>　1　</u> the 
            <u>limelight</u> again when Michelle Obama wore one of his dresses to the 2013 <u>inaugural ball</u>.
            The Fisrt Lady is <u>　2　</u> of a Wu 
            <b id='v2'
            onMouseOver="vacOver(this)"
            onMouseOut="vacOut(this)"
            message="<b>fanatic</b> [fəˈnætɪk] n. 狂熱份子 <br/> <p>Ted is a film fanatic, and his film collection includes thousands of movies.<br/>泰德很迷電影，他收藏了好幾千部影片。</p>">fanatic</b>
            , <u>sporting</u> his <u>haute couture</u> during
            the President's first <u>inauguration</u>, on the cover of <i>Vogue</i> magazine, and on state visits to London to meet Queen Elizabeth II.
          </p>
          <p id='2'>Wu, who was born in Taipei, was 
            <b id='v3'
            onMouseOver="vacOver(this)"
            onMouseOut="vacOut(this)"
            message="<b>engrossed</b> [ɪnˈgrost] adj. 全神貫注的 <br/> <p>be engrossed in  著迷於... <br/>I was so engrossed in the novel that I completely lost track of time.<br/>我看小說看得出神，完全忘了時間。<p>">engrossed</b> 
            by fashion at an early age, and 
            <b id='v4'
            onMouseOver="vacOver(this)"
            onMouseOut="vacOut(this)"
            message="<b>take to</b> 從事;開始喜歡 <br/> <p>Mark took to baseball at a young age because his father encouraged him to do so.<br/>在父親的鼓勵之下，馬克很小的時候就開始打棒球了。<p>">took to</b> 
            drawing sketches of wedding dresses he saw in Taipei shops. His mother noted his 
            <b id='v5'
            onMouseOver="vacOver(this)"
            onMouseOut="vacOut(this)"
            message="<b>fascination</b> [ˌfæsnˈeʃən] n. 著迷 <br/> <p>I have a fascination for Japanese culture so I'm really looking forward to my trip to Japan.<br/>我對日本文化相當著迷，所以很期待這趟日本之旅。<p>">fascination</b> 
            and sent him to study in Vancouver, Canada to 
            <b id='v6'
            onMouseOver="vacOver(this)"
            onMouseOut="vacOut(this)"
            message="<b>refine</b> [rɪˈfɑɪn] v. 使......精進 <br/><p>The cooking instructor is helping his students to refine their cutting techniques.<br/>這名烹飪老師正在教他的學生如何精進刀功。<p>">refine</b> 
            his drawing <u>　3　</u>. When he was 16, Wu <u>cold called</u> the president of 
            <b id='v7'
            onMouseOver="vacOver(this)"
            onMouseOut="vacOut(this)"
            message="<b>integrity</b> [ɪnˈtɛgrətɪ] n. 正直;誠實 <br/><p>A man of integrity always tells the truth and stands up for what he believes in.<br/>正直的人總是實話實說，堅持信念。">Integrity</b> 
            Toys, a company which made dolls, and sent them his sketches for <u>　4　</u> doll clothing. Before long he was hired and promoted to creative director, designing dolls' outfits. <u>Stint</u> in Tokyo, Paris, and New York followedd as he went from creating <u>miniature</u> clothes to <u>life-sized ensembles</u> in 2006. Over the next few years he dressed the likes of Ivana Trump and notable drag queen RuPaul. It wasn't until 2008 <u>　5　</u> Michelle Obama discovered Wu's seemingly timeless design 
            <b id='v8'
            onMouseOver="vacOver(this)"
            onMouseOut="vacOut(this)"
            message="<b>sensibility</b> [ˌsɛnsəˈbɪlətɪ] n. 敏感;鑑賞力 <br/><p>The director's artistic sensibilities ake him a perfect choice for this movie.<br/>這位導演的藝術美感使他成為這部電影的不二人選。<p>">sensibilities</b>. 
            An editor at 
            <i>Vogue</i> showed Obama Wu's work, which <u>　6　</u> her interest and soon she was sporting his clothes on television. This 
            <b id='v9'
            onMouseOver="vacOver(this)"
            onMouseOut="vacOut(this)"
            message="<b>solidify</b> [səˈlɪdəfɑɪ] v. 鞏固，加強 <br/><p>The two companies signed a contract to solidify their partnership.<br/>這兩間公司簽訂合約，鞏固彼此的合作關係。<p>">solidified</b> 
            what was arguably Wu's breakout moment in the fashion world. The young desinger's dresses continue to <u>grace</u> red carpets and find their way into the wardrobes of 
            <b id='v10'
            onMouseOver="vacOver(this)"
            onMouseOut="vacOut(this)"
            message="<b>celebrity</b> [səˈlɛbrətɪ] n. 名人 <br/><p>The company hired a celebrity to help promote their new line of products.<br/>這間公司特地請名人幫忙宣傳他們最新系列的產品。">
            celebrities</b> as he keeps <u>　7　</u> in the fashion world.
          </p>
        </div>
        <div id="doExerciseBtn">
          <?php
          function print_button_when_session_exists(){
            print <<<HEAD
            <input type="button" value="Do exercise" class="bTranslation" id="bDo" onclick="doExerciseClick(this)">
HEAD;
          }
          function print_button_when_session_doesnt_exist(){
            print <<<HEAD
            <input type="button" value="Do exercise" class="bTranslation" id="bDo" onclick="loginAlert(this)">
HEAD;
          }
          if($_SESSION['exist']){
            print_button_when_session_exists();
          }
          else{
            print_button_when_session_doesnt_exist();
          }
          ?>
          <input type="button" value="Cancel" class="bTranslation" id="bCancelDo" onclick="cancelDoExerciseClick(this)">
        </div>
        <div id="clozeSet">
          <hr>
          <form action="#">
            <br>
            <p id="seeExp">Choose the best answer:</p>
            <p id="a1"><b>1.</b>　<img src="" id='a1'></img><b id="torf1">　</b><br>
            <input type="radio" name='a1' id='1-1' value='A'>(A)put off</input><br>
            <input type="radio" name='a1' id='1-2' value='B'>(B)fallen out</input><br>
            <input type="radio" name='a1' id='1-3' value='C'>(C)set up</input><br>
            <input type="radio" name='a1' id='1-4' value='D'>(D)thrust into</input>
            </p>
            <span id="keyandexp"><b>Key and Explanation</b></span>
            <div id="anss" style="background-color:#FFFFBB">
              <div style="background-color:#FFCCCC">
                <p>(D) He founmd himself <font style="color:#0066FF">thrust into</font> the limelight again when Michelle Obama wore one of his dresses to the 2013 inaugural ball.</p>
              </div>
              <ul>
                本空格說明當歐巴馬夫人穿上他設計的衣服參加2013年就職舞會時，這位台灣出生的服裝設計師的感覺。以文意而言感覺當然是正面的。所以選<b>(D)</b><font style="color:#0066FF">thrust into</font>被推向鎂光燈。表示吳季剛又成為萬眾矚目的焦點。<br>
                <li>
                  The boy thrust a letter into the mailbox and ran away quickly.<br>
                  這男孩把一封信塞進信箱就迅速跑走了。<br>
                  <ul>
                    <span>(A) <font style="color:#0066FF">put off</font> 拖延</span>
                      <li>
                          Most students have a bad habit of putting off their assignments.<br>
                          大多數學生有遲交作業的壞習慣。
                      </li>
                    <span>(B) <font style="color:#0066FF">fall out</font> 鬧翻</span>
                      <li>
                          After the man fell out with his father, he moved to Taipei.<br>
                          他和父親鬧翻後，就一個人搬到台北。
                      </li>
                    <span>(C) <font style="color:#0066FF">set up</font> 設立</span>
                      <li>
                          His dream was to set up a school for the poor in his hometown.<br>
                          他的夢想是在家鄉為窮人創辦一所學校。
                      </li>
                  </ul>
                </li>
              </ul>
            </div>
            <p id="a2"><b>2.</b>　<img src="" id='a2'></img><b id="torf2">　</b><br>
            <input type="radio" name='a2' id='2-1' value='A'>(A)somehow </input><br>
            <input type="radio" name='a2' id='2-2' value='B'>(B)somebody  </input><br>
            <input type="radio" name='a2' id='2-3' value='C'>(C)something </input><br>
            <input type="radio" name='a2' id='2-4' value='D'>(D)someone</input>
            </p>
            <span id="keyandexp"><b>Key and Explanation</b></span>
            <div id="anss" style="background-color:#FFFFBB">
              <div style="background-color:#FFCCCC">
                <p>(C) The First Lady is <font style="color:#0066FF">something</font> of a Wu fanatic, sporting his haute couture during the President's first inauguration, on the cover of <i>Vogue</i> magazine, and on state visits to London to meet Queen Elizabeth II.</p>
              </div>
              <ul>
                本句說明美國第一夫人在歐巴馬第一次就職、上Vogue雜誌封面及訪問倫敦會見伊莉莎白女王時都是穿吳季剛的高級服裝，可見對吳季剛服裝的喜愛，所以選<b>(C)</b><font style="color:#0066FF">something</font>。表示歐巴馬夫人可以說是吳季剛的狂熱者。something of a是慣用詞，意思是「算得上是；可以說是」。<br>
                <li>
                  He is something of a file fanatic. Watching movies is his favorite pastime.<br>
                  他可以說是電影迷，看電影是他最愛的消遣。<br>
                  <ul>
                    <span>(A) <font style="color:#0066FF">somehow</font> adv. 不知怎麼地</span>
                      <li>
                          The pilot somehow managed to land the damaged plane.<br>
                          飛機駕駛不知怎地成功降落受損的飛機。。
                      </li>
                    <span>(B) <font style="color:#0066FF">somebody</font>
                      pron. 某人；重要人物</span>
                      <li>
                          Somebody left a message for you while you were out.<br>
                          有人在你出去時留訊息給你。
                      </li>
                    <span>(D) <font style="color:#0066FF">someone</font>  pron. 某人</span>
                      <li>
                          When you feel down, you should find someone to talk to.<br>
                          當你覺得心情低落時，應該要找人聊一聊。
                      </li>
                  </ul>
                </li>
              </ul>
            </div>
            <p id="a3"<b>3.</b>　<img src="" id='a3'></img><b id="torf3">　</b><br> 
            <input type="radio" name='a3' id='3-1' value='A'>(A)abilities</input><br>
            <input type="radio" name='a3' id='3-2' value='B'>(B)elements</input><br>
            <input type="radio" name='a3' id='3-3' value='C'>(C)textures</input><br>
            <input type="radio" name='a3' id='3-4' value='D'>(D)practices</input>
            </p>
            <span id="keyandexp"><b>Key and Explanation</b></span>
            <div id="anss" style="background-color:#FFFFBB">
              <div style="background-color:#FFCCCC">
                <p>(A) His mother noted his fascination and sent him to study in Vancouver, Canada, to refine his drawing <font style="color:#0066FF">abilities</font>.</p>
              </div>
              <ul>
                本句說明吳季剛的母親注意到他對服裝的著迷，所以送他到加拿大溫哥華，根據當然是讓他的才會有所精進。所以本空格選<b>(A)</b><font style="color:#0066FF">abilities</font> [əˋbɪlətɪz]  能力，表示精進他的繪畫能力。<br>
                <li>
                  He has an amazing ability to learn languages.<br>
                  他有驚人的語言學習能力。<br>
                  <ul>
                    <span>(B) <font style="color:#0066FF">element</font> [ˋɛləmənt] n. 元素；要素</span>
                      <li>
                          Perseverance is an essential element to be successful.<br>
                          毅力是邁向成功不可或缺的要素。
                      </li>
                    <span>(C) <font style="color:#0066FF">texture</font>
                      [ˋtɛkstʃɚ] n. 質地</span>
                      <li>
                          Clothing made of silk has a smooth texture.<br>
                          絲綢的衣服質地相當柔軟。
                      </li>
                    <span>(D) <font style="color:#0066FF">practice</font>  [ˋpræktɪs] n. 習慣；慣例</span>
                      <li>
                          He makes it a practice to jog for at least one hour every morning.<br>
                          他養成每天早上慢跑至少一小時的習慣。
                      </li>
                  </ul>
                </li>
              </ul>
            </div>
            <p id="a4"><b>4.</b>　<img src="" id='a4'></img><b id="torf4">　</b><br>
            <input type="radio" name='a4' id='4-1' value='A'>(A)potential</input><br>
            <input type="radio" name='a4' id='4-2' value='B'>(B)harmonious</input><br>
            <input type="radio" name='a4' id='4-3' value='C'>(C)sensible</input><br>
            <input type="radio" name='a4' id='4-4' value='D'>(D)exhausted</input>
            </p>
            <span id="keyandexp"><b>Key and Explanation</b></span>
            <div id="anss" style="background-color:#FFFFBB">
              <div style="background-color:#FFCCCC">
                <p>(A) When he was 16, Wu cold called the president of Integrity Toys, a company which made dolls, and sent them his sketches for <font style="color:#0066FF">potential</font> doll clothing.</p>
              </div>
              <ul>
                本句說明吳季剛在十六歲時就打電話給玩具公司的總裁並寄玩偶可能穿的衣服草圖。所以選<b>(A)</b><font style="color:#0066FF">potential</font>  [pəˋtɛnʃəl] 可能的，意思是這些衣服有可能成為玩偶的衣服。<br>
                <li>
                  These samples have to be mailed to potential buyers as soon as possible.<br>
                  這些樣本要盡快寄給可能的買主。<br>
                  <ul>
                    <span>(B) <font style="color:#0066FF">harmonious</font> [hɑrˋmonɪəs] adj. 和諧的</span>
                      <li>
                          To maintain a harmonious relationship, we must sometimes make compromises.<br>
                          為了維持和諧的關係，有時候我們必須讓步。
                      </li>
                    <span>(C) <font style="color:#0066FF">sensible</font>
                      [ˋsɛnsəb!] adj. 理智的</span>
                      <li>
                          It's sensible to save some of your pay each month.<br>
                          每個月存一些新水下來是很明智的決定。
                      </li>
                    <span>(D) <font style="color:#0066FF">exhausted</font>  [ɪgˋzɔstɪd] adj. 感覺疲憊的</span>
                      <li>
                          Seeing his exhausted face, I knew he had stayed up late again last night.<br>
                          看到他疲憊的臉，我知道他昨天又熬夜了。
                      </li>
                  </ul>
                </li>
              </ul>
            </div>
            <p id="a5"><b>5.</b>　<img src="" id='a5'></img><b id="torf5">　</b><br>
            <input type="radio" name='a5' id='5-1' value='A'>(A)since</input><br>
            <input type="radio" name='a5' id='5-2' value='B'>(B)that</input><br>
            <input type="radio" name='a5' id='5-3' value='C'>(C)did</input><br>
            <input type="radio" name='a5' id='5-4' value='D'>(D)had</input>
            </p>
            <span id="keyandexp"><b>Key and Explanation</b></span>
            <div id="anss" style="background-color:#FFFFBB">
              <div style="background-color:#FFCCCC">
                <p>(B) It wasn't until 2008 <font style="color:#0066FF">that</font> Michelle Obama discovered Wu's seemingly timeless design sensibilities.</p>
              </div>
              <ul>
                本句測驗句型結構。這是加強語氣的句型It is / was + 加強的人、事、物、時間、地點 + that + 句子其餘的部分。所以選<b>(B)</b><font style="color:#0066FF">that</font>。本句要加強的是時間 not until 2008。原來的句子是 : Michelle Obama did not discover Wu's seemingly timeless design sensibilities until 2008。強調直到2008年，所以把not until 2008 放在強調的位置 It was 後面然後接that...。成為強調句型的句子->It was not until 2008 that Michelle Obana discovered Wu's seemingly timeless design sensibilities.<br>
              </ul>
            </div>
            <p id="a6"><b>6.</b>　<img src="" id='a6'></img><b id="torf6">　</b><br>
            <input type="radio" name='a6' id='6-1' value='A'>(A)raised</input><br>
            <input type="radio" name='a6' id='6-2' value='B'>(B)aroused</input><br>
            <input type="radio" name='a6' id='6-3' value='C'>(C)arose</input><br>
            <input type="radio" name='a6' id='6-4' value='D'>(D)rose</input>
            </p>
            <span id="keyandexp"><b>Key and Explanation</b></span>
            <div id="anss" style="background-color:#FFFFBB">
              <div style="background-color:#FFCCCC">
                <p>(B) An editor at <i>Vogue</i> showed Obama Wu's work, which <font style="color:#0066FF">aroused</font> her interest and soon she was sporting his clothes on television.</p>
              </div>
              <ul>
               本句說明Vogue雜誌的一位編輯把吳季剛的作品給歐巴馬夫人看而引起她的興趣，不久就穿著上電視。所以本空格選<b>(B)</b><font style="color:#0066FF">aroused</font>  [əˋraʊzd] 惹起；引起。<br>
                <li>
                  The new policy is sure to arouse opposition.<br>
                  新的政策一定會引起反彈聲浪。<br>
                  <ul>
                    <span>(A) <font style="color:#0066FF">raise</font>  [rez] v. 提出；舉起；養育</span>
                      <li>
                          The way American people raise their children is different from that of Chinese people.<br>
                          美國人和中國人養育小孩的方式不同。
                      </li>
                    <span>(C) <font style="color:#0066FF">arose</font> [əˋroz] <font style="color:#0066FF">arise</font>
                      的過去式，不及物動詞；引起；產生</span>
                      <li>
                          His depression arose from his feeling of inferiority<br>
                          他的憂鬱症源自自卑感。
                      </li>
                    <span>(D) <font style="color:#0066FF">rose</font> [roz] <font style="color:#0066FF">rise</font>  的過去式，不及物動詞；上升</span>
                      <li>
                          Because prices keep rising, I can't help but increase our budget.<br>
                          因為價格不斷上漲，所以我只好把預算提高。
                      </li>
                  </ul>
                </li>
              </ul>
            </div>
            <p id="a7"><b>7.</b>　<img src="" id='a7'></img><b id="torf7">　</b><br>
            <input type="radio" name='a7' id='7-1' value='A'>(A)taking place</input><br>
            <input type="radio" name='a7' id='7-2' value='B'>(B)playing tricks</input><br>
            <input type="radio" name='a7' id='7-3' value='C'>(C)making headlines</input><br>
            <input type="radio" name='a7' id='7-4' value='D'>(D)running errands</input>
            </p>
            <span id="keyandexp"><b>Key and Explanation</b></span>
            <div id="anss" style="background-color:#FFFFBB">
              <div style="background-color:#FFCCCC">
                <p>(C) The young designer's dresses continue to grace red carpets and find their way into the wardrobes of celebrities as he keeps <font style="color:#0066FF">making headlines</font> in the fashion world.</p>
              </div>
              <ul>
                結論提到這位年輕設計師設計的衣服將持續受到歡迎，成為名人衣櫥裡的收藏，所以選<b>(C)</b><font style="color:#0066FF">making headlines</font> 上頭條，表示當他在時裝界持續出名，他的衣服也會受到青睞。<br>
                <li>
                  Since his story made headlines, his business has been booming.<br>
                  自從他的故事上頭條後，他的生意就暴增了。<br>
                  <ul>
                    <span>(A) <font style="color:#0066FF">take place</font> 發生</span>
                      <li>
                          The police were called shortly after the murder took place..<br>
                          謀殺案發生後，警察很快就來了。
                      </li>
                    <span>(B) <font style="color:#0066FF">play tricks</font>
                      惡作劇</span>
                      <li>
                          Some students play tricks on their friends on April Fools' Day.<br>
                          有些學生會在愚人節時整朋友。
                      </li>
                    <span>(D) <font style="color:#0066FF">run errands</font>  出差；跑腿</span>
                      <li>
                          My younger brother always runs errands for me.<br>
                          我弟弟常常替我跑腿。
                      </li>
                  </ul>
                </li>
              </ul>
            </div>
            <input type="button" class="bTranslation" id="btnAns" value="Check Answer" onclick="checkAns(this)"></input>
          </form>
        </div>
      </div>
    </div>
    <div id="scroll">
      <a title="Scroll to the top" class="top" href="#"><img src="../../images/top.png" alt="top" /></a>
    </div>
    <footer>
      <p><img src="../../images/twitter.png" alt="twitter" />&nbsp;<img src="../../images/facebook.png" alt="facebook" />&nbsp;<img src="../../images/rss.png" alt="rss" /></p>
      <p><a href="../../EngIndex.php">Home</a> | <a href="../../back/EngBackground.php">Introductory section</a> | <a href="../../understanding/EngUnderstanding.php">Text-based section</a> | <a href="../EngQuizUnit1.php">Monitoring section</a></p>
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

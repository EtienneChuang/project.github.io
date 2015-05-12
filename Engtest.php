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
    alert("請先閱讀文章，之後再進行測驗");
  }
</script>
<body>
  <div id="main">
    <header>
      <nav>
        <div id="menu_container">
          <ul class="sf-menu" id="nav">
            <li><a href="#">Home</a></li>
            <li><a href="back/EngBackground.html">Introductory section</a></li>
            <li><a href="understanding/EngUnderstanding.html">Text-based section</a>
              <!--
              <ul>
                <li><a href="#">全文</a>
                  <ul>
                    <li><a href="#">翻譯</a></li>
                    <li><a href="#">全文朗讀</a></li>
                  </ul>
                </li>
                <li><a href="#">單字</a>
                  <ul>
                    <li><a href="#">單字解釋</a></li>
                    <li><a href="#">單字測驗</a></li>
                  </ul>
                </li>
              </ul>-->
            </li>
            <li><a href="#" onclick="quizAlert(this)">Monitoring section</a></li>
            <!--<li><a href="#">Extra Materials</a></li>-->
            <li><a href="index.html">中文</a></li>
          </ul>
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
      <p><a href="#">Home</a> | <a href="back/EngBackground.html">Introductory section</a> | <a href="understanding/EngUnderstanding.html">Text-based section</a> | <a href="#">Monitoring section</a></p>
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

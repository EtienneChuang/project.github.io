$(document).ready(function(){
	//最新消息的部分
    //var news = document.getElementById('latestNews');
    var link = document.getElementById('usefulLink');
    /*
    news.innerHTML = "<h3>Latest News</h3>" +
          "<h4>新增全文部分</h4>" +
          "<h5>Unit 2 - 4</h5>" +
          "<h4><font style='color:red'>注意事項</font></h4>" +
          "<h5>有些頁面尚未建置</h5>" +
          "<h5>因此有可能是沒連結的</h5>" +
          "<h4>新增功能</h4>" +
          "<h5>克漏字測驗</h5>" +
          "<h5>Sep. 30th, 2013</h5>" +
          "<h4>新增頁面<h4>" +
          "<h5>單字-解釋部分, 全文翻譯部分</h5>" +
          "<h4>網站新測試</h4>" +
          "<h5>Sep. 26th, 2013</h5>" + 
          "<h4>New Website Launched</h4>" +
          "<h5>Sep. 1st, 2013</h5>" +
          "<p>2013 sees the redesign of our website. <a href='#'>Read more</a></p>";*/
    //連結部分
    link.innerHTML = "<h3>Useful Links</h3>" +
          "<ul>" +
            "<li><a href='http://translate.google.com.tw/' target='_blank'>Google翻譯</a></li>" +
            "<li><a href='http://tw.dictionary.yahoo.com/' target='_blank'>奇摩字典</a></li>" +
            "<li><a href='http://www.bbc.co.uk/worldservice/learningenglish/language/' target='_blank'>BBC Learning English</a></li>" +
          "</ul>";
 	//全文翻譯部分
 	$('div#translation').hide();
    $('input#cancelTranslation').hide();
    //單字部分
    $('div.voca').children('p').hide();
    //測驗部分
    $('div#clozeSet').hide();
    $('input#bCancelDo').hide();
    //填空部分
    $('div#ansOfFilling').hide();
    $('div#anss').hide();
    $('span#keyandexp').hide();
    $('div#vocaCard').hide();
 });
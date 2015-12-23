<!DOCTYPE html>
<html lang="tr-TR">
 <head>
  <meta charset="utf-8" />
  <link rel="shortcut icon" href="../img/sayfa_ikon.ico" />
  <link rel="apple-touch-icon" href="../img/sayfa_ikonu.png" />
  <title>kodbilimi.com | Testler</title>
  <meta name="robots" content="index, follow" />
  <meta name="viewport" content="width=500"  />
  <meta name="description" content="Özgün html, css, javascript, php, sql ve algoritma testleriyle yeteneklerinizi test edin..." />
  <link rel="stylesheet" type="text/css" href="tasarim.css" />
  <link href='../kodlar/font.css' rel='stylesheet' type='text/css' />
  <script type="text/javascript" src="../kodlar/jquery.min.js"></script>
 </head>
 <body style="margin-top:<?php $tar=$_SERVER['HTTP_USER_AGENT']; if(stripos($tar,"firefox")){echo "-23px";} else{echo "-20px";} ?>;" >
   <?php
     require ('../kodlar/database.php');
     require ('../kodlar/menu.php');
   ?> <style type="text/css">#menu{position:fixed;}</style>
   <script>function  HariciLinkler() {if (!document.getElementsByTagName)return; var  linkler = document.getElementsByTagName("a");var  linklerAdet = linkler.length;for  (var i=0; i<linklerAdet; i++) {var tekLink = linkler[i];if(tekLink.getAttribute("href") && tekLink.getAttribute("rel") == "external") { tekLink.target  = "_blank";} }}window.onload =  HariciLinkler;</script>
   <ul class="icon_socials">
   <li><a  href="https://www.facebook.com/kodbilimi" rel="external"  title="facebook sayfamıza gidin" ><img  src="../img/face.png" alt="facebook icon kodbilimi" width="50" /></a></li>
   <li><a  href="https://www.twitter.com/kodbilimi"  rel="external"  title="twitter sayfamıza gidin"><img  src="../img/twitter.png" alt="twitter icon kodbilimi" width="50"/></a></li>
   <li><a  href="https://plus.google.com/u/0/b/117742091662167423562/117742091662167423562/about" rel="external" title="google+ sayfamıza gidin"><img  src="../img/google+.png" alt="google icon kodbilimi" width="50"/></a></li>
   <li><a  href="https://www.youtube.com/channel/UCameeZ6Wocp_yGn2rajMGvw" rel="external" title="youtube sayfamıza gidin"><img  src="../img/youtube.png" alt="youtbe icon kodbilimi" width="50"/></a></li>
  </ul>
  <br />
  <section>
   <div id ="ana">
    <h1 id="anabaslik">-Bu bölümde istediğiniz alanda yeteneklerinizi test edebilirsiniz deneyin ve gerçekten iyi misiniz görün.</h1>
	<ul class="html5_testi">
      <li>
	    <a class="menu_link" href="./html5_testi-t1.html" title="html5 testine katılın"><center><h2 class="baslik">Html5 bilgileriniz ne kadar iyi?</h2>
		<img src="../img/html5.png" alt="html5 logosu" width="200" height="200" />
		<p class="butonbasla">Teste Başla</p></center></a>
	  </li>
	  <li>
	    <a class="menu_link" href="./css3_testi-t2.html" title="css3 testine katılın"><center><h2 class="baslik">CSS3'de gerçekten kendine güveniyor musun?</h2>
		<img src="../img/css3.png" alt="css3 logosu" width="175" height="175" />
		<p class="butonbasla">Teste Başla</p></center></a>
	  </li>
	  <li>
	    <a class="menu_link" href="./php_testi-t3.html" title="php testine katılın"><center><h2 class="baslik">PHP en kolay dil mi?</h2>
		<img src="../img/php.png" alt="php logosu" width="230" height="150" vspace="25" />
		<p class="butonbasla">Teste Başla</p></center></a>
	  </li>
	  <li>
	    <a class="menu_link" href="./javascript_testi-t4.html" title="javascript testine katılın"><center><h2 class="baslik">JAVASCRİPT, kulağa hoş geliyor!</h2>
		<img src="../img/javascript.png" alt="javascript logosu" width="200" height="200" />
		<p class="butonbasla">Teste Başla</p></center></a>
	  </li>
	  <li>
	    <a class="menu_link" href="./sql_testi-t5.html" title="sql testine katılın"><center><h2 class="baslik">SQL ne kadar zor olabilir ki?</h2>
		<img src="../img/sql.png" alt="sql logosu" width="200" height="200" />
		<p class="butonbasla">Teste Başla</p></center></a>
	  </li>
	  <li>
	    <a class="menu_link" href="./programlama_testi-t6.html" title="programlama testine katılın"><center><h2 class="baslik">Genel Programlama bilgilerinizi sınayın...</h2>
		<img src="../img/algoritma.svg" alt="algoritma logosu" width="200" height="175" />
		<p class="butonbasla">Teste Başla</p></center></a>
	  </li>
    </ul>
   </div>
   <?php
     function SEO($text) { 
     $tr = array('ş','Ş','ı','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç',' ','?','!','*','/','=',':','(',')');     
     $eng = array('s','s','i','i','g','g','u','u','o','o','c','c','-','-','-','-','-','-','-','-','-');     
     $text = str_replace($tr,$eng,$text);     
     $text = strtolower($text);     
     return $text; 
     }
    ?>
  </section>
  <?php include("../kodlar/footer.php"); ?>
 </body>
</html>
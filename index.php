<!DOCTYPE html>
<html lang="tr-TR">
 <head>
  <meta charset="utf-8" />
  <link rel="shortcut icon" href="img/sayfa_ikon.ico" />
  <link rel="apple-touch-icon" href="img/sayfa_ikonu.png" />
  <title>kodbilimi.com | Anasayfa</title>
  <meta name="robots" content="index, follow" />
  <meta name="viewport" content="width=500" />
  <meta name="description" content="Türkiye'nin, hızla büyüyen kod ve yazılım platformuna sizde katılın." />
  <meta name="google-site-verification" content="YO93rfPhppxaNhpOvqqUY473MCuT7KENHao3Fj5xj0Q" />
  <link href='./kodlar/font.css' rel='stylesheet' type='text/css' />
  <script type="text/javascript" src="./kodlar/jquery.min.js"></script>
  <script type="text/javascript" src="./kodlar/jquery-stick.js"></script>
  <link rel="stylesheet" type="text/css" href="tasarim.css" />
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-64292850-1', 'auto');
  ga('send', 'pageview');

</script>
 </head>
 <body>
 <div class="bas_bolum">
  <img src="./img/logo1.png" alt="kodbilimi.com logosu" width="380" height="130" />
 </div>
   <?php
      require ('./kodlar/database.php');
      require ('./kodlar/menu.php');
   ?>
  <script type="text/javascript">function  HariciLinkler() {if (!document.getElementsByTagName)return; var  linkler = document.getElementsByTagName("a");var  linklerAdet = linkler.length;for  (var i=0; i<linklerAdet; i++) {var tekLink = linkler[i];if(tekLink.getAttribute("href") && tekLink.getAttribute("rel") == "external") { tekLink.target  = "_blank";} }}window.onload =  HariciLinkler;</script>
  <script type="text/javascript">$(document).ready(function() {$('#menu').scrollToFixed();});</script>
  <ul class="icon_socials">
   <li><a  href="https://www.facebook.com/kodbilimi" rel="external"  title="facebook sayfamıza gidin" ><img  src="img/face.png" alt="facebook icon kodbilimi" width="50" /></a></li>
   <li><a  href="https://www.twitter.com/kodbilimi"  rel="external"  title="twitter sayfamıza gidin"><img  src="img/twitter.png" alt="twitter icon kodbilimi" width="50" /></a></li>
   <li><a  href="https://plus.google.com/u/0/b/117742091662167423562/117742091662167423562/about" rel="external" title="google+ sayfamıza gidin"><img  src="img/google+.png" alt="google icon kodbilimi" width="50" /></a></li>
   <li><a  href="https://www.youtube.com/channel/UCameeZ6Wocp_yGn2rajMGvw" rel="external" title="youtube sayfamıza gidin"><img  src="img/youtube.png" alt="youtbe icon kodbilimi" width="50" /></a></li>
  </ul>
  <br />
  <section>
   <div id ="ana">
    <header id="headlines">
    <ul class="thumbnails">
    <?php
	  $baglan = @mysql_connect($host,$dbuser,$dbpass);
	  mysql_query("SET NAMES UTF8");
      if(! $baglan) die ("Mysql Baglantisi Yapilamadi");
      @mysql_select_db($database,$baglan) or die ("Veri Tabanina Baglanti Yapilamadi"); 
      $sqlsorgu = mysql_query("SELECT * FROM konular Order By yayin_tarihi desc Limit 3");
	  while($yazdir=mysql_fetch_array($sqlsorgu)){
	  $url=seo($yazdir['konu_baslik']);
	  echo '<li class="headline-1">
       <a href="./'.$yazdir['kategori'].'/'.$url.'-t'.$yazdir['konu_id'].'.html" title="'.$yazdir['konu_baslik'].'"><img src="'.$yazdir['konu_resmi'].'" width="100%" height="100%" /><div class="content"><div class="wrapper"><h1>'.$yazdir['konu_baslik'].'</h1><aside>
       <p>'.mb_substr(strip_tags($yazdir['konu_icerik']), 0, 150,'UTF-8').'...</p></aside></div></div></a></li>';}
	?>
     </ul></header>
     <?php
	  $sqlsorgu = mysql_query("SELECT * FROM konular Order By yayin_tarihi desc  LIMIT 12 offset 3 ");
	 ?>
	 <div class="konular">
	  <h2 class="konu_aciklama2">Güncel Konular</h2><hr color="#0066FF" />
	 <?php
	 while($yazdir=mysql_fetch_array($sqlsorgu)){
	        $newdate = date("d-m-Y", strtotime($yazdir['yayin_tarihi']));
			$url=seo($yazdir['konu_baslik']);
			$dosya=$yazdir['konu_resmi'];
			echo '<img style="float:right;margin-left:5px;" src="./img/zaman.png" alt="zaman simgesi" width="15" height="15" /><p class="tarih">'.$newdate.' </p><a class="menu_link" href="./'.$yazdir['kategori'].'/'.$url.'-t'.$yazdir['konu_id'].'.html" title="'.$yazdir['konu_baslik'].'"><div class="konu"><img class="resim" src="'.$dosya.'" alt="'.$yazdir['konu_baslik'].'" width="170" height="120" /><h5 class="konubaslik" title="'.$yazdir['konu_baslik'].'"> - '.$yazdir['konu_baslik'].'</h5><p class="konu_aciklama"><br />'.substr(strip_tags($yazdir['konu_icerik']), 0, 150).'...Devamını Okuyun</p></div></a>';
			}
	 ?>
	 </div>
	 <div class="merak">
	 <h2 class="konu_aciklama2">Merak Edilenler</h2><hr color="#0066FF" />
	 <?php
	        $sqlsorgu = mysql_query("SELECT * FROM soru Order By tarih desc  LIMIT 10 ");
	        while($yazdir=mysql_fetch_array($sqlsorgu)){
			$soru=$yazdir['soru'];
			$url=seo($soru);
			$dosya=$yazdir['resim_url'];
			echo '<a class="menu_link" href="./soru-cevap/'.$url.'-t'.$yazdir['soru_id'].'.html" title="'.$soru.'"><img class="merakresmi" src="'.$dosya.'" alt="'.$soru.'" width="180" height="120" /><h5 class="soru" title="'.$soru.'"> '.$soru.'</h5></a>';
			}
	 ?>
	 </div>
	 <div class="popi">
	 <h2 class="konu_aciklama2">Popüler Konular</h2><hr color="#0066FF" />
          <?php
	        $sqlsorgu = mysql_query("SELECT * FROM konular Order By okunma desc  LIMIT 4 ");
	        while($yazdir=mysql_fetch_array($sqlsorgu)){
			$soru=$yazdir['konu_baslik'];
			$url=seo($soru);
			$dosya=$yazdir['konu_resmi'];
			echo '<a class="menu_link" href="./'.$yazdir['kategori'].'/'.$url.'-t'.$yazdir['konu_id'].'.html" title="'.$soru.'"><img class="merakresmi" src="'.$dosya.'" alt="'.$soru.'" width="240" height="120" /><h5 class="soru" title="'.$soru.'">'.$soru.'</h5></a>';
			}
	 ?>
	 </div>
	 <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- yan -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-1094890557548807"
     data-ad-slot="7345163374"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
	 <div class="popi">
	 <h2 class="konu_aciklama2">Popüler Sorular</h2><hr color="#0066FF" />
	 <?php
	        $sqlsorgu = mysql_query("SELECT * FROM soru Order By okunma desc  LIMIT 5 ");
	        while($yazdir=mysql_fetch_array($sqlsorgu)){
			$soru=$yazdir['soru'];
			$url=seo($soru);
			$dosya=$yazdir['resim_url'];
			echo '<a class="menu_link" href="./soru-cevap/'.$url.'-t'.$yazdir['soru_id'].'.html" title="'.$soru.'"><img src="'.$dosya.'" alt="'.$soru.'" width="240" height="120" /><h5 class="soru" title="'.$soru.'">'.$soru.'</h5></a>';
			}
	 ?>
	 </div>
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
  <?php include("./kodlar/footer.php"); ?>
 </body>
</html>
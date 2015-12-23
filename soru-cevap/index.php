<!DOCTYPE html>
<html lang="tr-TR">
 <head>
  <meta charset="utf-8" />
  <link rel="shortcut icon" href="../img/sayfa_ikon.ico" />
  <link rel="apple-touch-icon" href="../img/sayfa_ikonu.png" />
  <title>kodbilimi.com | Soru-cevap</title>
  <meta name="robots" content="index, follow" />
  <meta name="viewport" content="width=500"  />
  <meta name="description" content="Kısa soru-cevaplarla kod ve yazılım hakkında merak ettiklerinizi öğrenin" />
  <link href='../kodlar/font.css' rel='stylesheet' type='text/css' />
  <script type="text/javascript" src="../kodlar/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="tasarim.css" />
 </head>
  <body style="margin-top:<?php $tar=$_SERVER['HTTP_USER_AGENT']; if(stripos($tar,"firefox")){echo "-23px";} else{echo "-20px";} ?>;">
     <?php
    require("../kodlar/database.php");
    require("../kodlar/menu.php");echo '<style type="text/css">#menu{position:fixed;}</style>';
	include("../kodlar/icon_socials.php");
     ?>
  <br />
  <section>
   <div id ="ana">
    <div id="icerik">
     <div class="anabaslik"><img src="../img/soru_is.png" alt="soru-cevap simgesi" width="35" height="35" style="margin-top:15px;margin-right:10px;margin-bottom:5px;float:left;" /><h1 style="font-size:25px;line-height:18px;margin-bottom:15px;"> Soru-Cevap</h1></div>
	 <p class="aciklama">-Öyle uzun makalelerden sıkılanlar için yazılım dünyasında merak edilenleri kısa soru cavaplarla açıklamaya çalıştık.<br /><br /><i>Bazı kategorilerimiz:</i></p>
	  <ul class="kategoriler">
	   <?php
	     $baglan = @mysql_connect($host,$dbuser,$dbpass);
	     mysql_query("SET NAMES UTF8");
         if(! $baglan) die ("Mysql Baglantisi Yapilamadi");
         @mysql_select_db($database,$baglan) or die ("Veri Tabanina Baglanti Yapilamadi"); 
         $sqlsorgu = mysql_query("SELECT * FROM istatistik");
		 $yazdir=mysql_fetch_array($sqlsorgu);
		 $kategori_sayisi=$yazdir['soru_kategori_sayisi'];
		 $rastgele_dizi=array();
		 for ($i = 0; $i < 12; $i++)
            {
                $rastgele_dizi[$i] = rand(1,$kategori_sayisi);
            }
		 $durum1 = true;
            while ($durum1 == true)
            {
                $durum1 = false;
                for ($i = 0; $i < 11; $i++)
                {
                    
                    for ($j = $i + 1; $j < 12; $j++)
                    {
                        while ($rastgele_dizi[$i] == $rastgele_dizi[$j]) { $rastgele_dizi[$i] = rand(1, $kategori_sayisi); $durum1 = true; }
                    }
                }
            }
	     

		 for($i=0;$i<12;$i++){
		 $sqlsorgu = mysql_query("SELECT * FROM soru where kategori_id=".$rastgele_dizi[$i]."");
		 $yazdir=mysql_fetch_array($sqlsorgu);
		 $kategori=$yazdir['alt_kategori'];
		 $url=seo($kategori);
          echo '<li><a class="menu_link2" href="./kategoriler/'.$url.'-t'.$rastgele_dizi[$i].'s1.html" title="'.$kategori.' kategorisinden soruları sıralayın" >'.$kategori.'</a></li>';
		  
		 }
		 echo '</ul>';
	     echo '<br /><p class="aciklama">Aşağıda gezinmeniz için birkaç örnek verdik buradan başlayabilirsiniz:</p>';
		 
	   ?>
          <div class="sorular">
		    <?php
			$sqlsorgu = mysql_query("SELECT * FROM soru");
		    $soru_sayisi=mysql_num_rows($sqlsorgu);
		    $rastgele_baslangic=rand(1,$soru_sayisi-9);
			for($i=$rastgele_baslangic;$i<$rastgele_baslangic+9;$i++){
			$sqlsorgu = mysql_query("SELECT * FROM soru where soru_id=".$i."");
			$yazdir=mysql_fetch_array($sqlsorgu);
			$url=seo($yazdir['soru']);
			echo '<a class="menu_link" title="'.$yazdir['soru'].'" href="../soru-cevap/'.$url.'-t'.$yazdir['soru_id'].'.html"><p class="soru">-'.$yazdir['soru'].'<br /><em class="sss"> '.mb_substr(strip_tags($yazdir['cevap']), 0, 50,'UTF-8').'...Devamını Okuyun</em></p></a>';
			}
			?>
			
	      </div>
		      <?php include("../kodlar/reklam.php"); ?>
	          <?php include("../kodlar/yan_test.php"); ?> 
              <?php include("../kodlar/son_basliklar.php"); ?>
		  <p class="aciklama2">Daha detaylı gezinmek için yukarıdan kategori seçiniz.</p>
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
   </div>
  </section>
  <?php require("../kodlar/footer.php"); ?>
 </body>
</html>
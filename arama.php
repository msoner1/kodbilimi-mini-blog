<!DOCTYPE html>
<html lang="tr-TR">
 <head>
  <meta charset="utf-8" />
  <link rel="shortcut icon" href="img/sayfa_ikonu.ico" />
  <link rel="apple-touch-icon" href="img/sayfa_ikonu.png" />
  <title>kodbilimi.com | Arama</title>
  <meta name="robots" content="noindex, follow" />
  <meta name="viewport" content="width=500"  />
  <link rel="stylesheet" type="text/css" href="aramatasarim.css" />
  <?php
  $terim= $_POST['ara'];
  for($i=0;$i<strlen($terim);$i++){if($terim[$i]!=" "){break;}if($i+1==strlen($terim)){$terim="";}}
  if(isset($terim) && $terim!="" && !ctype_digit($terim) ){}
  else{header("Location: http://www.kodbilimi.com"); die();}
   $kelimeler=explode(" ",$terim);
   $kelimesayisi=count($terim);
  ?>
  <meta name="description" content="<?php echo "".$terim." araması"; ?>" />
  <link href='./kodlar/font.css' rel='stylesheet' type='text/css' />
  <script type="text/javascript" src="./kodlar/jquery.min.js"></script>
 </head>
 <body style="margin-top:<?php $tar=$_SERVER['HTTP_USER_AGENT']; if(stripos($tar,"firefox")){echo "-23px";} else{echo "-20px";} ?>;" >
   <?php
      require ('./kodlar/database.php');
      require ('./kodlar/menu.php');
   ?> <style>#menu{position:fixed;}</style>
  <br />
  <section>
   <div id ="ana">
     <?php
	  $baglan = @mysql_connect($host,$dbuser,$dbpass);
	  mysql_query("SET NAMES UTF8");
      if(! $baglan) die ("Mysql Baglantisi Yapilamadi");
      @mysql_select_db($database,$baglan) or die ("Veri Tabanina Baglanti Yapilamadi"); 
	?>
	 <div class="konular">
	  <h2 id="konu_aciklama2">Konu Arama Sonuçları <hr /><h2>
	 <?php
	 $konuvarmi=0;
	  for($i=0;$i<$kelimesayisi;$i++){
	  $sqlsorgu = mysql_query("SELECT * FROM konular where konu_baslik like '%".$kelimeler[$i]."%' or konu_icerik like '%".$kelimeler[$i]."%' order by yayin_tarihi desc limit 20");
	  while($yazdir=mysql_fetch_array($sqlsorgu)){
			$konuvarmi=1;
			$url=seo($yazdir['konu_baslik']);
			$dosya=$yazdir['konu_resmi'];
			echo '<a class="menu_link" href="./'.$yazdir['kategori'].'/'.$url.'-t'.$yazdir['konu_id'].'.html" title="'.$yazdir['konu_baslik'].'"><h3 id="konu" > <img id="resim" src="'.$dosya.'"  alt="konu resmi" align="left" width="120px" height="80px" />-'.$yazdir['konu_baslik'].'<p id="konu_aciklama">'.mb_substr(strip_tags($yazdir['konu_icerik']), 0, 150,'UTF-8').'...Devamını Okuyun</p></h3></a>';
			}
		}
	  if($konuvarmi==0){echo "<p id=konu_aciklama2> Hiç bir konu bulunamadı, dikkat çeken konulara bakın...</p>";
	  $sqlsorgu = mysql_query("SELECT * FROM konular Order By okunma desc limit 20");
	  while($yazdir=mysql_fetch_array($sqlsorgu)){
			$konuvarmi=1;
			$url=seo($yazdir['konu_baslik']);
			$dosya=$yazdir['konu_resmi'];
			echo '<a class="menu_link" href="./'.$yazdir['kategori'].'/'.$url.'-t'.$yazdir['konu_id'].'.html" title="'.$yazdir['konu_baslik'].'"><h3 id="konu" > <img id="resim" src="'.$dosya.'"  alt="konu resmi" align="left" width="120px" height="80px" />-'.$yazdir['konu_baslik'].'<p id="konu_aciklama">'.mb_substr(strip_tags($yazdir['konu_icerik']), 0, 150,'UTF-8').'...Devamını Okuyun</p></h3></a>';
			}
	  }
	 ?>
	 
	 </div>
	  <div class="konular">
	  <h2 id="konu_aciklama2">Soru Arama Sonuçları <hr /><h2>
	 <?php
	  $soruvarmi=0;
	  for($i=0;$i<$kelimesayisi;$i++){
      $sqlsorgu = mysql_query("SELECT * FROM soru where soru like '%".$kelimeler[$i]."%' or cevap like '%".$kelimeler[$i]."%' order by tarih desc limit 20");
	  while($yazdir=mysql_fetch_array($sqlsorgu)){
			$soruvarmi=1;
			$url=seo($yazdir['soru']);
			$dosya=$yazdir['resim_url'];
			echo '<a class="menu_link" href="./soru-cevap/'.$url.'-t'.$yazdir['soru_id'].'.html" title="'.$yazdir['soru'].'"><h3 id="konu" > <img id="resim" src="'.$dosya.'"  alt="soru resmi" align="left" width="120px" height="80px" />-'.$yazdir['soru'].'<p id="konu_aciklama">'.mb_substr(strip_tags($yazdir['cevap']), 0, 80,'UTF-8').'...Devamını Okuyun</p></h3></a>';
			}
		}
	  if($soruvarmi==0){echo "<p id=konu_aciklama2> Hiç bir soru bulunamadı, dikkat çeken sorulara bakın...</p>";
	  $sqlsorgu = mysql_query("SELECT * FROM soru Order By okunma desc limit 20");
	  while($yazdir=mysql_fetch_array($sqlsorgu)){
	   $url=seo($yazdir['soru']);
	   $dosya=$yazdir['resim_url'];
	   echo '<a class="menu_link" href="./soru-cevap/'.$url.'-t'.$yazdir['soru_id'].'.html" title="'.$yazdir['soru'].'"><h3 id="konu" > <img id="resim" src="'.$dosya.'"  alt="soru resmi" align="left" width="120px" height="80px" />-'.$yazdir['soru'].'<p id="konu_aciklama">'.mb_substr(strip_tags($yazdir['cevap']), 0, 80,'UTF-8').'...Devamını Okuyun</p></h3></a>';
	   }
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
<?php
    require("../kodlar/database.php");
    $baglan = @mysql_connect($host,$dbuser,$dbpass);
	mysql_query("SET NAMES UTF8");
    if(! $baglan) die ("Mysql Baglantisi Yapilamadi");
    @mysql_select_db($database,$baglan) or die ("Veri Tabanina Baglanti Yapilamadi");
	$sayfa=$_GET['s'];
	$sayfa = mysql_real_escape_string($sayfa);
    $sqlsorgu = mysql_query("SELECT * FROM konular where kategori='bilgisayar_bilimi'");
	$yazdir=mysql_fetch_array($sqlsorgu);
    $konu_sayisi=mysql_num_rows($sqlsorgu);
	$sayfa_sayisi= $konu_sayisi/10;
	if($konu_sayisi%10==0){
			}
	else{
		$sayfa_sayisi++;
			}
    if($sayfa>0 &&$sayfa<$sayfa_sayisi){}
	else{header("Location: ?s=1"); die();}	
?>
<!DOCTYPE html>
<html lang="tr-TR">
 <head>
  <meta charset="utf-8" />
  <link rel="shortcut icon" href="../img/sayfa_ikon.ico" />
  <link rel="apple-touch-icon" href="../img/sayfa_ikonu.png" />
  <title>kodbilimi.com | Bilgisayar Bilimi</title>
  <meta name="robots" content="index, follow" />
  <meta name="viewport" content="width=500"  />
  <meta name="description" content="Bilgisayarlarla ilgili merak edilenler ve işletim sistemlerinin incelikleri bu bölümde sizlerle" />
  <link href='../kodlar/font.css' rel='stylesheet' type='text/css' />
  <script type="text/javascript" src="../kodlar/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../kodlar/konu_tasarim.css" />
  <link rel="stylesheet" type="text/css" href="../kodlar/sayfalamastil.css" />
 </head>
 <body style="margin-top:<?php $tar=$_SERVER['HTTP_USER_AGENT']; if(stripos($tar,"firefox")){echo "-23px";} else{echo "-20px";} ?>;">
   <?php
    require("../kodlar/menu.php");
	include("../kodlar/icon_socials.php");
   ?><style type="text/css">#menu{position:fixed;}</style>
  <br />
  <section>
   <div id ="ana">
    <div id="icerik">
     <div class="anabaslik"><img src="../img/pc.png" alt="pc simgesi" width="35" height="35" style="margin-top:15px;margin-right:10px;margin-bottom:5px;float:left;" /><h1 style="font-size:25px;line-height:18px;margin-bottom:5px;"> Bilgisayar Bilimi</h1></div>
	 
	 <?php
	  $ofset=($sayfa-1)*10;
	  $baglan = @mysql_connect($host,$dbuser,$dbpass);
	  mysql_query("SET NAMES UTF8");
      if(! $baglan) die ("Mysql Baglantisi Yapilamadi");
      @mysql_select_db($database,$baglan) or die ("Veri Tabanina Baglanti Yapilamadi"); 
      $sqlsorgu = mysql_query("SELECT * FROM konular where kategori='bilgisayar_bilimi' Order By yayin_tarihi desc  LIMIT 10 OFFSET ".$ofset." ");
	 ?>
	 <div class="konular">
	 <?php
	 while($yazdir=mysql_fetch_array($sqlsorgu)){
			$newdate = date("d-m-Y", strtotime($yazdir['yayin_tarihi']));
            $url=seo($yazdir['konu_baslik']);
			$dosya=$yazdir['konu_resmi'];
			$metin=$yazdir['konu_baslik'];
			echo '<a class="menu_link2" href="./'.$url.'-t'.$yazdir['konu_id'].'.html" title="'.$metin.'"><div class="konu"><img style="float:right;margin-left:5px;" src="../img/zaman.png" alt="zaman simgesi" width="15" height="15" /><p class="tarih">'.$newdate.' </p><img class="resim" src="'.$dosya.'"   alt="'.$metin.'" width="150" height="100" /><h3 class="konu_baslik" title="'.$metin.'">- '.$metin.'</h3><p class="konu_aciklama">'.mb_substr(strip_tags($yazdir['konu_icerik']), 0, 250,'UTF-8').'...Devamını Okuyun</p></div></a>';
			}
	 ?>
	 </div>
        	<ul class="sayfalama">
			  <?php
			   for($i=1; $i<=$sayfa_sayisi; $i++){
			   echo '<li><a class="menu_link2" title="'.$i.'.sayfaya gidin..." href="?s='.$i.'">'.$i.'</a></li>';
			   }
			  ?>
			</ul>
        <?php include("../kodlar/reklam.php"); ?>
	    <?php include("../kodlar/yan_test.php"); ?>
		<?php include("../kodlar/merak_edilenler.php"); ?>
        <?php include("../kodlar/son_basliklar.php"); ?>			
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
  <?php include("../kodlar/footer.php"); ?>
 </body>
</html>
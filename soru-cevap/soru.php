<?php
    require("../kodlar/database.php");
    $baglan = @mysql_connect($host,$dbuser,$dbpass);
	mysql_query("SET NAMES UTF8");
    if(! $baglan) die ("Mysql Baglantisi Yapilamadi");
    @mysql_select_db($database,$baglan) or die ("Veri Tabanina Baglanti Yapilamadi");
	$id = $_GET['t'];
    $id = mysql_real_escape_string($id);
    $sqlsorgu = mysql_query("SELECT * FROM soru where soru_id=".$id."");
	$yazdir=mysql_fetch_array($sqlsorgu);
	$metin =$yazdir['soru'];
	$cevap=$yazdir['cevap'];
	$kategori=$yazdir['kategori_id'];
	$kategorigenel=$yazdir['kategori'];
    if(isset($metin)){$okunma=$yazdir['okunma']+1; $sqlsorgu = mysql_query("UPDATE soru SET okunma=".$okunma." where soru_id=".$id."");}
	else{header("Location: http://www.kodbilimi.com"); die();}	
	$noktaninyeri=strpos($cevap,'.');
	
?>
<!DOCTYPE html>
<html lang="tr-TR">
 <head>
  <meta charset="utf-8" />
  <link rel="shortcut icon" href="../img/sayfa_ikon.ico" />
  <link rel="apple-touch-icon" href="../img/sayfa_ikonu.png" />
  <title><?php echo $metin; ?></title>
  <meta name="robots" content="index, follow" />
  <meta name="viewport" content="width=500"  />
  <meta name="description" content="<?php echo substr(strip_tags($yazdir['cevap']), 0, $noktaninyeri); ?>" />
  <link href='../kodlar/font.css' rel='stylesheet' type='text/css' />
  <script type="text/javascript" src="../kodlar/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="tasarim.css" />
   <script type="text/javascript">
    function son_soru_yok(){
	alert("Bu Soru Son Sorudur.");}
    function ilk_soru_yok(){
	alert("Bu Soru İlk Sorudur.");}
  </script>
 </head>
 <body style="margin-top:<?php $tar=$_SERVER['HTTP_USER_AGENT']; if(stripos($tar,"firefox")){echo "-23px";} else{echo "-20px";} ?>;">
  <?php
    require("../kodlar/menu.php");echo '<style type="text/css">#menu{position:fixed;}</style>';
	include("../kodlar/icon_socials.php");
  ?>
  <br />
  <section>
   <div id ="ana">
    <div id="icerik">
     <div class="anabaslik"><img src="../img/soru_is.png" alt="soru-cevap simgesi" width="35" height="35" style="margin-top:15px;margin-right:10px;margin-bottom:5px;float:left;" /><h3 style="font-size:25px;line-height:18px;margin-bottom:15px;"> Soru-Cevap</h3></div>
	 <img class="soru_resmi" src="<?php echo $yazdir['resim_url']; ?>" alt="soru resmi">
	 <?php
	 echo '<h1 id="soru">-'.$metin.'</h1>';
	 echo '<div id="cevap"> '.$cevap.'</div>';
     $sqlsorgu = mysql_query("SELECT * FROM soru where soru_id = ".($id-1)."");
	 while($yazdir=mysql_fetch_array($sqlsorgu)){
	 $onceki_konu="./".seo($yazdir['soru'])."-t".$yazdir['soru_id'].".html";}
	 $sqlsorgu = mysql_query("SELECT * FROM soru where soru_id= ".($id+1)."");
	 if($yazdir=mysql_fetch_array($sqlsorgu)){
	 $sonraki_konu="./".seo($yazdir['soru'])."-t".$yazdir['soru_id'].".html";}
	 ?>
	  <a href="<?php if(isset($onceki_konu)){echo $onceki_konu;}else{echo '#" onclick="ilk_soru_yok()';} ?>" title="bir önceki konuya gidin"><div class="onceki"> Önceki </div></a>
	  <a href="<?php if(isset($sonraki_konu)){echo $sonraki_konu;}else{echo '#" onclick="son_soru_yok()';} ?>" title="bir sonraki konuya gidin"><div class="sonraki"> Sonraki </div></a>
	  <div class="anabaslik"><img src="../img/göz.png" alt="göz simgesi" width="45" height="27" style="margin-top:37px;margin-right:10px;margin-bottom:5px;float:left;" /><h5 style="font-size:25px;line-height:18px;font-weight:lighter;margin-bottom:5px;"> Bunlarada Göz Atın</h5></div>
	    <div class="sorular2">
		    <?php
			 $sqlsorgu = mysql_query("SELECT * FROM soru where kategori='".$kategorigenel."' Order By tarih desc limit 5");
             while($yazdir=mysql_fetch_array($sqlsorgu)){
             $metin = $yazdir['soru'];
	         $id2 = $yazdir['soru_id'];
	         if($id2!=$id){
	         $konu_basligi=$metin;
             $url=seo($yazdir['soru']);
	         echo '<a class="menu_link" title="'.$yazdir['soru'].'" href="../soru-cevap/'.$url.'-t'.$yazdir['soru_id'].'.html"><p class="soru">-'.$yazdir['soru'].'<br /><em class="sss"> '.mb_substr(strip_tags($yazdir['cevap']), 0, 50,'UTF-8').'...Devamını Okuyun</em></p></a>';
			 }
	         }
			?>
		</div>
	<?php include("../kodlar/reklam.php"); ?>
	<?php include("../kodlar/yan_test.php"); ?>
    <?php include("../kodlar/benzer_sorular.php"); ?>
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
  <?php require ('../kodlar/footer.php'); ?>
 </body>
</html>
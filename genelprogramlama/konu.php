<?php
     require ('../kodlar/database.php');
    $baglan = @mysql_connect($host,$dbuser,$dbpass);
	mysql_query("SET NAMES UTF8");
    if(! $baglan) die ("Mysql Baglantisi Yapilamadi");
    @mysql_select_db($database,$baglan) or die ("Veri Tabanina Baglanti Yapilamadi");
	$id = $_GET['t'];
    $id = mysql_real_escape_string($id);
    $sqlsorgu = mysql_query("SELECT * FROM konular where konu_id=".$id."");
	$yazdir=mysql_fetch_array($sqlsorgu);
	$metin =$yazdir['konu_baslik'];
	$cevap=$yazdir['konu_icerik'];
    if(isset($metin)){$okunma=$yazdir['okunma']+1; $sqlsorgu = mysql_query("UPDATE konular SET okunma=".$okunma." where konu_id=".$id."");}
	else{header("Location: http://www.kodbilimi.com"); die();}	
	$noktaninyeri=strpos($cevap,'.');
	$kategorigenel=$yazdir['kategori'];
	$kategori=$yazdir['alt_kategori'];
	
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
  <meta name="description" content="<?php echo substr(strip_tags($cevap), 0, $noktaninyeri); ?>" />
  <link href='../kodlar/font.css' rel='stylesheet' type='text/css' />
  <script type="text/javascript" src="../kodlar/jquery.min.js"></script>
  <script type="text/javascript" src="../kodlar/kod_alani/scripts/shCore.js"></script>
  <script type="text/javascript" src="../kodlar/kod_alani/scripts/shBrushXml.js"></script>
  <link type="text/css" rel="stylesheet" href="../kodlar/kod_alani/styles/shThemeFadeToGrey.css"/>
  <script type="text/javascript">SyntaxHighlighter.all();</script>
  <link rel="stylesheet" type="text/css" href="../kodlar/konu_tasarim.css" />
   <script type="text/javascript">
    function son_konu_yok(){
	alert("Bu Konu Son Konudur.");}
    function ilk_konu_yok(){
	alert("Bu Konu İlk Konudur.");}
  </script>
 </head>
 <body style="margin-top:<?php $tar=$_SERVER['HTTP_USER_AGENT']; if(stripos($tar,"firefox")){echo "-23px";} else{echo "-20px";} ?>;" >
  <?php
   include("../kodlar/menu.php");echo '<style type="text/css">#menu{position:fixed;}</style>';
   include("../kodlar/icon_socials.php");
   $newdate = date("d-m-Y", strtotime($yazdir['yayin_tarihi']));
  ?>
  <br />
  <section>
   <div id ="ana">
    <div id="icerik">
     <div class="anabaslik"><img src="../img/prog.png" alt="programlama simgesi" width="35" height="35" style="margin-top:15px;margin-right:10px;margin-bottom:5px;float:left;" /><h3 style="font-size:25px;line-height:18px;margin-bottom:15px;"> Genel Programlama</h3></div>
	 <img class="soru_resmi" src="<?php echo $yazdir['konu_resmi']; ?>" alt="<?php echo $metin; ?>" width="80%" height="450" />
	 <?php
	 echo '<img style="float:left;position:relaitive;margin-right:5px;" src="../img/zaman.png" alt="zaman simgesi" width="15" height="15" /><p class="tarih" style="float:left;position:relaitive;margin-right:25px;">'.$newdate.'</p><h1 class="soru" title="'.$metin.'" >-'.$metin.'</h1>';
	 echo '<div class="cevap"> '.$cevap.'</div>';
	 $sqlsorgu = mysql_query("SELECT * FROM konular where kategori='".$kategorigenel."' AND konu_id < ".$id."");
	 while($yazdir=mysql_fetch_array($sqlsorgu)){
	 $onceki_konu="../".$kategorigenel."/".seo($yazdir['konu_baslik'])."-t".$yazdir['konu_id'].".html";}
	 $sqlsorgu = mysql_query("SELECT * FROM konular where kategori='".$kategorigenel."' AND konu_id > ".$id."");
	 if($yazdir=mysql_fetch_array($sqlsorgu)){
	 $sonraki_konu="../".$kategorigenel."/".seo($yazdir['konu_baslik'])."-t".$yazdir['konu_id'].".html";}
	 ?>
	  <a href="<?php if(isset($onceki_konu)){echo $onceki_konu;}else{echo '#" onclick="ilk_konu_yok()';} ?>" title="bir önceki konuya gidin"><div class="onceki"> Önceki </div></a>
	  <a href="<?php if(isset($sonraki_konu)){echo $sonraki_konu;}else{echo '#" onclick="son_konu_yok()';} ?>" title="bir sonraki konuya gidin"><div class="sonraki"> Sonraki </div></a>
	  <div class="anabaslik"><img src="../img/göz.png" alt="göz simgesi" width="45" height="27" style="margin-top:37px;margin-right:10px;margin-bottom:5px;float:left;" /><h4 style="font-size:25px;line-height:18px;font-weight:lighter;margin-bottom:5px;"> Bunlarada Göz Atın</h4></div>
	    <div class="konular">
		    <?php
			
			$sqlsorgu = mysql_query("SELECT * FROM konular where kategori='".$kategorigenel."' Order By okunma desc limit 5");
            while($yazdir=mysql_fetch_array($sqlsorgu)){
            $metin = $yazdir['konu_baslik'];
	        $id2 = $yazdir['konu_id'];
			$dosya=$yazdir['konu_resmi'];
			$kategori2=$yazdir['alt_kategori'];
	        if($id2!=$id){
            $url=seo($metin);
	        echo '<a class="menu_link2" href="../'.$kategorigenel.'/'.$url.'-t'.$id2.'.html" title="'.$metin.'"><div class="konu"><img class="resim" src="'.$dosya.'"  alt="'.$metin.'" width="120" /><h3 class="konu_baslik"> - '.$metin.'</h3><p class="konu_aciklama">'.mb_substr(strip_tags($yazdir['konu_icerik']), 0, 250,'UTF-8').'...Devamını Okuyun</p></div></a>';
	        }
	        }
			?>
			
	     </div>
		     <?php include("../kodlar/reklam.php"); ?>
	         <?php include("../kodlar/yan_test.php"); ?>
             <?php include("../kodlar/benzer_konular.php"); ?>
			 <?php include("../kodlar/cok_okunanlar.php"); ?>
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
  <?php require("../kodlar/footer.php"); ?>
 </body>
</html>
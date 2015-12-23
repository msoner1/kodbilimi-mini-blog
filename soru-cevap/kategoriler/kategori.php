<?php
    require ('../../kodlar/database.php');
	$durum=1;
    $baglan = @mysql_connect($host,$dbuser,$dbpass);
	mysql_query("SET NAMES UTF8");
    if(! $baglan) die ("Mysql Baglantisi Yapilamadi");
    @mysql_select_db($database,$baglan) or die ("Veri Tabanina Baglanti Yapilamadi");
	$id = $_GET['t'];
	$sayfa=$_GET['s'];
    $id = mysql_real_escape_string($id);
	$sayfa = mysql_real_escape_string($sayfa);
    $sqlsorgu = mysql_query("SELECT * FROM soru where kategori_id=".$id."");
	$yazdir=mysql_fetch_array($sqlsorgu);
	$babakategori=$yazdir['alt_kategori'];
	$urlbaba=seo($babakategori);
    $soru_sayisi=mysql_num_rows($sqlsorgu);
	$sayfa_sayisi= $soru_sayisi/15;
	if($soru_sayisi%15==0){
			}
	else{
		$sayfa_sayisi++;
			}
    if(isset($babakategori) && $sayfa<$sayfa_sayisi+1){}
	else{header("Location: http://www.kodbilimi.com"); die();}	
?>
<!DOCTYPE html>
<html lang="tr-TR">
 <head>
  <meta charset="utf-8" />
  <link rel="shortcut icon" href="../../img/sayfa_ikon.ico" />
  <link rel="apple-touch-icon" href="../../img/sayfa_ikonu.png" />
  <title><?php echo ''.$babakategori.' kategorisi'; ?></title>
  <meta name="robots" content="index, follow" />
  <meta name="viewport" content="width=500"  />
  <meta name="description" content="<?php echo ''.$babakategori.' kategorisinden kısa soru-cevaplarla merak ettiklerinize ulaşın.';?>" />
  <link href='../../kodlar/font.css' rel='stylesheet' type='text/css' />
  <script type="text/javascript" src="../../kodlar/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="tasarim.css" />
  <link rel="stylesheet" type="text/css" href="../../kodlar/sayfalamastil.css" />
 </head>
 <body style="margin-top:<?php $tar=$_SERVER['HTTP_USER_AGENT']; if(stripos($tar,"firefox")){echo "-23px";} else{echo "-20px";} ?>;" >
  <?php
   require("../../kodlar/menu.php");echo '<style type="text/css">#menu{position:fixed;}</style>';
   include("../../kodlar/icon_socials.php");
  ?>
  <br />
  <section>
   <div id ="ana">
    <div id="icerik">
	 <div class="anabaslik"><img src="../../img/soru_is.png" alt="soru-cevap simgesi" width="35" height="35" style="margin-top:15px;margin-right:10px;margin-bottom:5px;float:left;" /><h1 style="font-size:25px;line-height:18px;margin-bottom:15px;"> Soru-Cevap</h1></div>
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
		 $durum = true;
            while ($durum == true)
            {
                $durum = false;
                for ($i = 0; $i < 11; $i++)
                {
                    
                    for ($j = $i + 1; $j < 12; $j++)
                    {
                        while ($rastgele_dizi[$i] == $rastgele_dizi[$j]) { $rastgele_dizi[$i] = rand(1, $kategori_sayisi); $durum = true; }
                    }
                }
            }
	     

		 for($i=0;$i<12;$i++){
		 $sqlsorgu = mysql_query("SELECT * FROM soru where kategori_id=".$rastgele_dizi[$i]."");
		 $yazdir=mysql_fetch_array($sqlsorgu);
		 $kategori=$yazdir['alt_kategori'];
		 $url=seo($kategori);
         echo '<a class="menu_link2" href="../kategoriler/'.$url.'-t'.$rastgele_dizi[$i].'s1.html" title="'.$kategori.' kategorisinden soruları sıralayın" ><li>'.$kategori.'</li></a>';
		 }
		 echo '</ul>'; 
	   ?>
	   <?php
	   echo '<h2 class="babakategori">-'.$babakategori.' kategorisinden...</h2>';
	   ?>
	    <div class="sorular">
		    <?php
            $ofset=($sayfa-1)*15;
			$sqlsorgu = mysql_query("SELECT * FROM soru where kategori_id=".$id." Order By tarih desc  LIMIT 15 OFFSET ".$ofset." ");
			while($yazdir=mysql_fetch_array($sqlsorgu)){
			
			$url=seo($yazdir['soru']);
			echo '<a class="menu_link" title="'.$yazdir['soru'].'" href="../'.$url.'-t'.$yazdir['soru_id'].'.html"><p class="soru">-'.$yazdir['soru'].'<br /><em class="sss"> '.mb_substr(strip_tags($yazdir['cevap']), 0, 50,'UTF-8').'...Devamını Okuyun</em></p></a>';
			}
			?>
	      </div>
		  <ul class="sayfalama">
			  <?php
			   for($i=1; $i<=$sayfa_sayisi; $i++){
			   echo '<li><a class="menu_link2" title="'.$i.'.sayfaya gidin..." href="../kategoriler/'.$urlbaba.'-t'.$_GET['t'].'s'.$i.'.html">'.$i.'</a></li>';
			   }
			  ?>
		  </ul>
          <?php include("../../kodlar/reklam.php"); ?>
	      <?php include("../../kodlar/yan_test.php"); ?>
          <?php include("../../kodlar/merak_edilenler.php"); ?>		  
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
  <?php require("../../kodlar/footer.php"); ?>
 </body>
</html>
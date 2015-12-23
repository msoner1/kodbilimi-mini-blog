<?php 
$id=$_GET["t"];
if($id=="1"){$testadı="html5 testi";$testurl="html5_testi-t1.html";}
else if($id=="2"){$testadı="css3 testi";$testurl="css3_testi-t2.html";}
else if($id=="3"){$testadı="php testi";$testurl="php_testi-t3.html";}
else if($id=="4"){$testadı="javascript testi";$testurl="javascript_testi-t4.html";}
else if($id=="5"){$testadı="sql testi";$testurl="sql_testi-t5.html";}
else if($id=="6"){$testadı="genel programlama testi";$testurl="programlama_testi-t6.html";}
else{header("Location: index.php");}
require("../kodlar/database.php");
$durum=0;
$sifirlar="0";
if(isset($_POST["sorunumarasi"])){
$value=$_POST["cevaplar"];
$sorunumarasi=$_POST["sorunumarasi"]+1;
for($i=0;$i<20-$sorunumarasi;$i++){
$sifirlar="".$sifirlar."0";
}
$ekkisim=substr($value, 0, $sorunumarasi-2);
if(isset($_POST["quiz"])){$value="".$_POST["quiz"]."".$ekkisim."".$sifirlar."";}
else{$value="0".$ekkisim."".$sifirlar."";}
$baglan = @mysql_connect($host,$dbuser,$dbpass);
mysql_query("SET NAMES UTF8");
if(! $baglan) die ("Mysql Baglantisi Yapilamadi");
@mysql_select_db($database,$baglan) or die ("Veri Tabanina Baglanti Yapilamadi"); 
$sqlsorgu = mysql_query("SELECT * FROM testler where soru_id=".($sorunumarasi+($id-1)*20)."");
$yazdir=mysql_fetch_array($sqlsorgu);
$dogrucevap=$yazdir['dogru_cevap'];
$soru=$yazdir['soru'];
if($_POST["sorunumarasi"]=="20"){
  $durum=1;$sayac=0;
  if(isset($_POST["quiz"])){$cevaplardizisi="".$_POST["quiz"]."".substr($_POST["cevaplar"], 0, 19)."";}
  else{$cevaplardizisi="0".substr($_POST["cevaplar"], 0, 19)."";}
  $dogrusayisi=0;$yanlissayisi=0;   $k=1;
  for($i=19;$i>-1;$i--){
   $sqlsorgu = mysql_query("SELECT * FROM testler where soru_id=".($k+(($id-1)*20))."");
   $yazdir=mysql_fetch_array($sqlsorgu);
   $dogrusik=$yazdir['dogru_cevap_sikki'];
   if($cevaplardizisi[$i]==$dogrusik){$dogrusayisi++;}
   else{$yanlissayisi++;$yanlissorular[$sayac]=20-$i;$sayac++;}
   $k++;
  }
}}
else{
$value="00000000000000000000";
$sorunumarasi=1;
$baglan = @mysql_connect($host,$dbuser,$dbpass);
mysql_query("SET NAMES UTF8");
if(! $baglan) die ("Mysql Baglantisi Yapilamadi");
@mysql_select_db($database,$baglan) or die ("Veri Tabanina Baglanti Yapilamadi"); 
$sqlsorgu = mysql_query("SELECT * FROM testler where soru_id=".($sorunumarasi+($id-1)*20)."");
$yazdir=mysql_fetch_array($sqlsorgu);
$dogrucevap=$yazdir['dogru_cevap'];
$soru=$yazdir['soru'];
}
?>
<!DOCTYPE html>
<html lang="tr-TR">
 <head>
  <meta charset="utf-8" />
  <link rel="shortcut icon" href="../img/sayfa_ikon.ico" />
  <link rel="apple-touch-icon" href="../img/sayfa_ikonu.png" />
  <title>kodbilimi.com | <?php echo $testadı ?></title>
  <meta name="robots" content="index, follow" />
  <meta name="viewport" content="500"  />
  <meta name="description" content="html5 yeteneklerinizi deneyin..." />
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
      <?php 
	  
	  if($durum==0){require("./form.php"); }
	  else{require("./sonuc.php");}
	  
	  ?>
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
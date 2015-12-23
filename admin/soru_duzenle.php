<?php

require('libs/Smarty.class.php'); 
$smarty = new Smarty; 
$smarty->template_dir = 'tema'; 
$smarty->compile_dir = 'tema_c'; 
$smarty->cache_dir = 'cache'; 
$smarty->config_dir = 'configs'; 

 session_start();
 
 if($_SESSION['giris'])
 {
   $smarty -> assign('session',$_SESSION['name']);
   require '../kodlar/database.php';  
   
   $baglan = @mysql_connect($host,$dbuser,$dbpass);
   mysql_query("SET NAMES UTF8");
   if(! $baglan) die ("Mysql Baglantisi Yapilamadi");
   @mysql_select_db($database,$baglan) or die ("Veri Tabanina Baglanti Yapilamadi");
   $i = -1;
   $sqlsorgu = mysql_query("SELECT COUNT(*) FROM soru");
   $kolon_sayisi = mysql_num_rows($sqlsorgu);
   if($kolon_sayisi %10 == 0)
   {
        $sayfa_sayisi = $kolon_sayisi /10;
   }
   else 
   {
       $sayfa_sayisi = $kolon_sayisi /10 ;
       $sayfa_sayisi++;
   }
   $smarty ->assign('sayfa',$sayfa_sayisi);
   if(isset($_GET['s'])){$offset =intval($_GET['s'])*10-10;$sqlsorgu = mysql_query("SELECT * FROM soru Order By soru_id Limit 10 offset ".$offset." ");}
   else{$sqlsorgu = mysql_query("SELECT * FROM soru Order By soru_id Limit 10");}
   while($yazdir=mysql_fetch_array($sqlsorgu))
    {
        $i++;
      
         $veriler = Array(
         0 => $yazdir['soru_id'],
         1 => $yazdir['soru'],
         2 => $yazdir['kategori'],
         3 => $yazdir['alt_kategori'],
         4 => $yazdir['okunma'],
         5 => $yazdir['tarih']
      );
      $buyuk_veri[$i] =$veriler;
      $smarty ->assign('veriler',$buyuk_veri);
      
    }
    
    ////////////////
    
      if(isset($_POST['sil']))
          {
            if(mysql_query("DELETE FROM soru where soru_id = ".$_POST['konu_id']." ")){}
          }
      if(isset($_POST['duzenle']))
          {
            header("Location:soru_girisi.php?id=".$_POST['konu_id']."");
          }
    
    ///////////////
    
 }
 else
 {  
     header("Location: http://www.kodbilimi.com"); die();
 }
 
 $smarty->display('soru_duzenle.tpl');
 
?>

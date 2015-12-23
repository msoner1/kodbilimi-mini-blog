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
    if(isset($_POST['onay']))
    {  
       if(isset($_GET['id'])){
           $gelen_veriler = Array(
            "soru" => $_POST['baslik'],
            "cevap" => $_POST['icerik'],
            "kategori" => $_POST['kategori'],
            "alt_kategori" => $_POST['alt_kategori']
          );
           $update = true;
        }
        else{
            $gelen_veriler = Array(
             "soru" => $_POST['baslik'],
             "cevap" => $_POST['icerik'],
             "kategori" => $_POST['kategori'],
             "alt_kategori" => $_POST['alt_kategori'],
             "kategori_id" => 0,
             "okunma" => 5
            );
        
        

        if ($_FILES["resim"]["error"])
          $onaylimi = "resim seçiniz";
          else
          {
            if ($_FILES["resim"]["size"]>500*1024)
                $onaylimi = "500KB'dan küçük bir dosya seçiniz.";
            
            else
            {
            if ($_FILES["resim"]["type"]=="image/jpeg" || $_FILES["resim"]["type"]=="image/png")
            {
                 $dosya_yolu="../img/soruresimleri/".$_FILES["resim"]["name"];
                 
               if (move_uploaded_file($_FILES["resim"]["tmp_name"],$dosya_yolu)) 
               {
                   $smarty->assign('durum','basari');
                   $baglan = @mysql_connect($host,$dbuser,$dbpass);
                   mysql_query("SET NAMES UTF8");
                   if(! $baglan) die ("Mysql Baglantisi Yapilamadi");
                   @mysql_select_db($database,$baglan) or die ("Veri Tabanina Baglanti Yapilamadi");  
                   if($yazdir=mysql_fetch_array(mysql_query("SELECT * FROM soru WHERE alt_kategori LIKE '%".$gelen_veriler['alt_kategori']."%'")))
                   {
                      $gelen_veriler['alt_kategori'] = $yazdir['alt_kategori'];
                      $gelen_veriler['kategori_id'] = $yazdir['kategori_id'];
                      $kategori_varmi = true;
                   }
                   if(!isset($kategori_varmi))
                   {
                       if($yazdir=mysql_fetch_array(mysql_query("SELECT * FROM soru Order By kategori_id desc ")))
                       {

                          $gelen_veriler['kategori_id'] = $yazdir['kategori_id']+1;

                       }
                   }
                    if(isset($_FILES["upload_resim"])){
                    if ($_FILES["upload_resim"]["type"]=="image/jpeg" || $_FILES["upload_resim"]["type"]=="image/png" ){
                    $dosya_yolu="../img/soruresimleri/".$_FILES["upload_resim"]["name"];
                    if (move_uploaded_file($_FILES["upload_resim"]["tmp_name"],$dosya_yolu)) 
                    {$smarty->assign('durum','basari');}
                    }}   
                }
                else
                  $onaylimi = "Dosya yükleme başarısız.";
                }
                 else
                  $onaylimi = "Lütfen jpg veya png formatında resim seçiniz.";
                }
            } } 
     $smarty->assign('gelen_veriler',$gelen_veriler);
   if(isset($onaylimi))
       {
            $smarty->assign('onaylimi',$onaylimi);
       }
   else
       { 
       $baglan = @mysql_connect($host,$dbuser,$dbpass);
       mysql_query("SET NAMES UTF8");
       if(! $baglan) die ("Mysql Baglantisi Yapilamadi");
       @mysql_select_db($database,$baglan) or die ("Veri Tabanina Baglanti Yapilamadi");
       if(isset($update))
       {  $soru_id = intval($_GET['id']);
          if(mysql_query("UPDATE soru SET soru='".$gelen_veriler['soru']."' , cevap='".$gelen_veriler['cevap']."' where soru_id=".$soru_id."") )
          {
             $smarty->assign('durum','basari');
          }
       else
          {
             echo mysql_error();
          } 
       }
       else 
       {
       $eklenen_sayi = $gelen_veriler['kategori_id']-1;
       if(mysql_query("insert into soru (soru_id,tarih,soru,cevap,kategori,alt_kategori,resim_url,okunma,kategori_id) VALUES (null,CURRENT_TIMESTAMP,'".$gelen_veriler["soru"]."','".$gelen_veriler["cevap"]."','".$gelen_veriler["kategori"]."','".$gelen_veriler["alt_kategori"]."','../img/soruresimleri/".$_FILES["resim"]["name"]."','5','".$gelen_veriler['kategori_id']."')") && mysql_query("UPDATE istatistik SET soru_kategori_sayisi='".$gelen_veriler['kategori_id']."' where soru_kategori_sayisi=".$eklenen_sayi."") )
          {
             $smarty->assign('durum','basari');
          }
       else
          {
             echo mysql_error();
          }
       }               
       }

       }
       else //onay yoksa
       {
           //////////////KONU DÜZENLEME////////////
   
        if(isset($_GET['id'])){
            $baglan = @mysql_connect($host,$dbuser,$dbpass);
            mysql_query("SET NAMES UTF8");
            if(! $baglan) die ("Mysql Baglantisi Yapilamadi");
            @mysql_select_db($database,$baglan) or die ("Veri Tabanina Baglanti Yapilamadi");  
            $soru_id = intval($_GET['id']);
            $sqlsorgu = mysql_query("SELECT * FROM soru where soru_id ='".$soru_id."' ");
            if($yazdir=mysql_fetch_array($sqlsorgu))
            {
                   $gelen_veriler = Array(
                    "soru" => $yazdir['soru'],
                    "cevap" => $yazdir['cevap'],
                    "kategori" => $yazdir['kategori'],
                    "alt_kategori" => $yazdir['alt_kategori'],
                    "okunma" => $yazdir['okunma']
                   );
            }
                $smarty->assign('gelen_veriler',$gelen_veriler);
                //////////////KONU DÜZENLEME////////////
           }
       
            }//onay yoksa

}
else
{
    header("Location: http://www.kodbilimi.com"); die();
}
$smarty->display('soru_girisi.tpl');
 ?>
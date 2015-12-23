
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
            "konu_baslik" => $_POST['baslik'],
            "konu_icerik" => $_POST['icerik'],
            "kategori" => $_POST['kategori'],
            "alt_kategori" => $_POST['alt_kategori']
          );
        }
        else{
        $gelen_veriler = Array(
          "konu_baslik" => $_POST['baslik'],
          "konu_icerik" => $_POST['icerik'],
          "kategori" => $_POST['kategori'],
          "alt_kategori" => $_POST['alt_kategori'],
          "okunma" => 5
        );
        
        
        if ($_FILES["resim"]["error"])
          $onaylimi = "resim seçiniz";
        else{
         
         if ($_FILES["resim"]["size"]>500*1024)
             $onaylimi = "500KB'dan küçük bir dosya seçiniz.";
         else{
          if ($_FILES["resim"]["type"]=="image/jpeg" || $_FILES["resim"]["type"]=="image/png" ){
              $dosya_yolu="../img/konuresimleri/".$_FILES["resim"]["name"];
            if (move_uploaded_file($_FILES["resim"]["tmp_name"],$dosya_yolu)) 
            {$smarty->assign('durum','basari');
              if(isset($_FILES["upload_resim"])){
                  if ($_FILES["upload_resim"]["type"]=="image/jpeg" || $_FILES["upload_resim"]["type"]=="image/png" ){
                  $dosya_yolu="../img/konuresimleri/".$_FILES["upload_resim"]["name"];
                  if (move_uploaded_file($_FILES["upload_resim"]["tmp_name"],$dosya_yolu)) 
                  {$smarty->assign('durum','basari');}
                  }   
              }
            }
            else
               $onaylimi = "Dosya yükleme başarısız.";
         }
         else
            $onaylimi = "Lütfen jpg veya png formatında resim seçiniz.";
     }
    }}   
     $smarty->assign('gelen_veriler',$gelen_veriler);
    if(isset($onaylimi)){$smarty->assign('onaylimi',$onaylimi);}
    else{
        $baglan = @mysql_connect($host,$dbuser,$dbpass);
        mysql_query("SET NAMES UTF8");
        if(! $baglan) die ("Mysql Baglantisi Yapilamadi");
        @mysql_select_db($database,$baglan) or die ("Veri Tabanina Baglanti Yapilamadi");  
        if(isset($_GET['id'])){
            if(mysql_query("UPDATE konular SET konu_baslik='".$gelen_veriler['konu_baslik']."' , konu_icerik='".$gelen_veriler['konu_icerik']."' , kategori='".$gelen_veriler['kategori']."' , alt_kategori='".$gelen_veriler['alt_kategori']."' where konu_id=".$_GET['id'].""))
            {
            $smarty->assign('durum','basari');
            }
        }
        else{
        if(mysql_query("insert into konular (konu_id,yayin_tarihi,konu_baslik,konu_icerik,kategori,alt_kategori,konu_resmi,okunma) VALUES (null,CURRENT_TIMESTAMP,'".$gelen_veriler["konu_baslik"]."','".$gelen_veriler["konu_icerik"]."','".$gelen_veriler["kategori"]."','".$gelen_veriler["alt_kategori"]."','../img/konuresimleri/".$_FILES["resim"]["name"]."','5')"))
        {
            $smarty->assign('durum','basari');
        }
        else
        {
            echo mysql_error();
        }
    }}}
      else //onay yoksa
       {
           //////////////KONU DÜZENLEME////////////
   
        if(isset($_GET['id'])){
            $baglan = @mysql_connect($host,$dbuser,$dbpass);
            mysql_query("SET NAMES UTF8");
            if(! $baglan) die ("Mysql Baglantisi Yapilamadi");
            @mysql_select_db($database,$baglan) or die ("Veri Tabanina Baglanti Yapilamadi");  
            $konu_id = intval($_GET['id']);
            $sqlsorgu = mysql_query("SELECT * FROM konular where konu_id ='".$konu_id."' ");
            if($yazdir=mysql_fetch_array($sqlsorgu))
            {
                   $gelen_veriler = Array(
                    "konu_baslik" => $yazdir['konu_baslik'],
                    "konu_icerik" => $yazdir['konu_icerik'],
                    "kategori" => $yazdir['kategori'],
                    "alt_kategori" => $yazdir['alt_kategori'],
                    "okunma" => $yazdir['okunma']
                   );
            }
                $smarty->assign('gelen_veriler',$gelen_veriler);
                //////////////KONU DÜZENLEME////////////
        }
        
       }
     }
   
 else{
     
     header("Location: http://www.kodbilimi.com"); die();
 }
 $smarty->display('konu_girisi.tpl');
?>
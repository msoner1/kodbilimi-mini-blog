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
        
        if ($_FILES["upload_resim"]["error"])
          $onaylimi = "resim seçiniz";
          else
          {
            if ($_FILES["upload_resim"]["size"]>500*1024)
                $onaylimi = "500KB'dan küçük bir dosya seçiniz.";
            
            else
            {
            if ($_FILES["upload_resim"]["type"]=="image/jpeg" || $_FILES["upload_resim"]["type"]=="image/png")
            {
                 if($_POST['kategori'] =="konu" ){$dosya_yolu="../img/konuresimleri/".$_FILES["upload_resim"]["name"];}
                 else{$dosya_yolu="../img/soruresimleri/".$_FILES["upload_resim"]["name"];}
                 
               if (move_uploaded_file($_FILES["upload_resim"]["tmp_name"],$dosya_yolu)) 
               {
                   $smarty->assign('durum','basari');
                
                }
                else
                  $onaylimi = "Dosya yükleme başarısız.";
                }
                 else
                  $onaylimi = "Lütfen jpg veya png formatında resim seçiniz.";
                }
            }  
   if(isset($onaylimi))
       {
            $smarty->assign('onaylimi',$onaylimi);
       }

       }

}
else
{
    header("Location: http://www.kodbilimi.com"); die();
}
$smarty->display('resim_upload.tpl');
 ?>
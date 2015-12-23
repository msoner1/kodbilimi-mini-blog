<?php
session_start();
if(!isset($_SESSION['giris'])){
    
    header("Location: http://www.kodbilimi.com/admin-paneli/"); die();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta NAME="ROBOTS" CONTENT="noindex, nofollow" >
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
<title>Kodbilimi Yönetim Paneli</title>
<style>
 .butonlar1{
        height: 250px;
        font-size: 40px;
        width: 100%;
  	background-image: url(images/konu.png);
	background-repeat: no-repeat;
	background-position:center center;
	background-size:150px;
	background-color: mediumspringgreen;
 }
  .butonlar2{
       height: 250px;
        font-size: 40px;
        width: 100%;
  	background-image: url(images/yorum.png);
	background-repeat: no-repeat;
	background-position:center center;
	background-size:150px;
	background-color:#7FFF00;
 }
   .butonlar3{
        height: 250px;
        font-size: 40px;
        width: 100%;
  	background-image: url(images/soru.png);
	background-repeat: no-repeat;
	background-position:center center;
	background-size:150px;
	background-color:green;
 }
   .butonlar4{
        height: 250px;
        font-size: 40px;
        width: 100%;
  	background-image: url(images/duzenle.png);
	background-repeat: no-repeat;
	background-position:center center;
	background-size:150px;
	background-color:#6495ED;
 }
    .butonlar5{
         height: 250px;
        font-size: 40px;
        width: 100%;
  	background-image: url(images/soru2.png);
	background-repeat: no-repeat;
	background-position:center center;
	background-size:150px;
	background-color:#FF8C00;
 }
 button:hover{
  cursor:pointer;
  background-color:white;
  background-image: url(images/yes.png);
 }
 h1{
  font-size:35px;
  color:#ddd;
 }
</style>
</head>
<body style="background-image: url(images/bg.png);background-repeat: repeat;">
 <a href='kontrol.php'><button style="float:right;">Çıkış</button></a>
 <h1 align="center">Hoşgeldin <?php echo $_SESSION['name']; ?></h1>
 <table align="center" width="900" height="520" style="margin-top:10px;" >
  
     <tr><td><a href="konu_girisi.php"><button class="butonlar1" >Konu Girin</button></a></td><td><a href="resim_upload.php"><button class="butonlar2" >Resim Upload Edin</button></a></td><td><a href="soru_girisi.php"><button class="butonlar3" >Soru Girin</button></a></td></tr>
     <tr><td><a href="konu_duzenle.php"><button class="butonlar4" >Konu Düzenle</button></a></td><td colspan="2"><a href="soru_duzenle.php"><button class="butonlar5" >Soru Düzenle</button></a></td></tr>

 </table>
</body>
</html>

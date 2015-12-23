<?php
if(!isset($_POST['kullaniciadi'])){session_start();session_destroy();header("Location:index.php"); die();}
else{
if($_POST['kullaniciadi']=="admin"){
 if($_POST['sifre']=="12345"){
    session_start();
    $name = $_POST['kullaniciadi'];
    $giris= TRUE;
    $_SESSION['name']=$name;
    $_SESSION['giris']=$giris;
    header("Location: panel.php");
 }
 else{
 session_start();
 session_destroy();
 header("Location:index.php"); die();}

}
else{
 require("class.phpmailer.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 1; 
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; 
$mail->IsHTML(true);
$mail->SetLanguage("tr", "phpmailer/language");
$mail->CharSet  ="utf-8";
$mail->Username = "mailadres@mail.com"; 
$mail->Password = "12345"; 
$mail->SetFrom("kodbilimi@kod.com", "Yönetim Paneli");
$mail->AddAddress("mail"); 
$mail->Subject = "Hatalı Giriş"; 
$mail->Body = "Hatalı Giriş Yapıldı"; 
if(!$mail->Send()){
          session_start();
	  session_destroy();
          header("Location:index.php"); die();
} else {
         session_start();
	 session_destroy();
         header("Location:index.php"); die();
}
}
}

?>
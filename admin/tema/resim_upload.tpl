<!DOCTYPE html>
<html>
<head>
<meta NAME="ROBOTS" CONTENT="noindex, nofollow" >
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
<title>Kodbilimi Yönetim Paneli</title>
</head>
<body style="background-image: url(images/bg.png);background-repeat: repeat;">
    <a href='panel.php'><button>Geri</button></a>
    <a href='kontrol.php'><button style="float:right;">Çıkış</button></a>
    <h1 align="center">Hoşgeldin {$session}</h1>
    {if isset($durum)}<h3 align= 'center'>Resim Başarıyla Sunucuya Aktarıldı...</h3>{/if}
    {if isset($onaylimi)}<h3 align= 'center'>{$onaylimi}</h3>{/if}
    <table align="center" width="800" style="margin-top:20px;margin-bottom:100px;" >
             <form action="" method="post" enctype="multipart/form-data">
             <tr><td>Kategori</td><td><select name="kategori" >
             <option value="konu" >Konu</option>
             <option value="soru" >Soru</option>
             </select></td></tr>
             <tr><td>Resin Seç</td><td><input type="file" name="upload_resim" /></td></tr>
             <tr><td colspan="2" ><input type="submit" name="onay"  /></td></tr>
             </form>
    </table>
</body>
</html>
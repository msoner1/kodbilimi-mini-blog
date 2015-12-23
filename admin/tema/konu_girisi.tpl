<!DOCTYPE html>
<html>
<head>
<meta NAME="ROBOTS" CONTENT="noindex, nofollow" >
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
<title>Kodbilimi Yönetim Paneli</title>
<script type="text/javascript">
    function kontrol(){
    for(i = 1;i<4; i++){
     var a = document.getElementById(i).value;
     if(a == ""){
         alert("Formlar Boş Geçilemez");break;
     }
    }
    }
</script>
</head>
<body style="background-image: url(images/bg.png);background-repeat: repeat;">
    <a href='panel.php'><button>Geri</button></a>
    <a href='kontrol.php'><button style="float:right;">Çıkış</button></a>
    <h1 align="center">Hoşgeldin {$session}</h1>
    {if isset($onaylimi)}<font color="red"><h3 align= 'center'>**{$onaylimi}</h3></font>{/if}
    {if isset($durum)}<h3 align= 'center'>Konu Başarıyla Kaydedildi...</h3>{/if}
    <table align="center" width="1000" style="margin-top:20px;margin-bottom:100px;" >
             <form action="" method="post" enctype="multipart/form-data">
             <tr><td>Konu Başlığı</td><td><input type="text" id="1" value = "{if isset($gelen_veriler)}{$gelen_veriler['konu_baslik']}{/if}" name="baslik" maxlength="80" placeholder="maksimum 80 karakter" size="50" /></td></tr>
             <tr><td>Konu İçerik</td><td><textarea name="icerik" id="2" placeholder="Html etiketlerinini kullabilirsiniz" cols="120" rows="30" >{if isset($gelen_veriler)}{$gelen_veriler['konu_icerik']}{/if}</textarea></td></tr>
             <tr><td>Kategori</td><td><select name="kategori" >
             <option value="webdunyasi" {if isset($gelen_veriler)}{if $gelen_veriler["kategori"] eq "webdunyasi"}selected{/if}{/if}>Web Dunyası</option>
             <option value="bilgisayar_bilimi" {if isset($gelen_veriler)}{if $gelen_veriler["kategori"] eq "bilgisayar_bilimi"}selected{/if}{/if}>Bilgisayar Bilimi</option>
             <option value="photoshop" {if isset($gelen_veriler)}{if $gelen_veriler["kategori"] eq "photoshop" }selected{/if}{/if}>Photoshop</option>
             <option value="genelprogramlama" {if isset($gelen_veriler)}{if $gelen_veriler["kategori"] eq "genelprogramlama"}selected{/if}{/if}>Genel Programlama</option>
             </select></td></tr>
             <tr><td>Alt Kategori</td><td><input type="text" id="3" name="alt_kategori" value = "{if isset($gelen_veriler)}{$gelen_veriler['alt_kategori']}{/if}" maxlength="50" placeholder="maksimum 50 karakter" size="50" /></td></tr>
             <tr><td>Konu resmi seçin</td><td><input type="file" name="resim" /></td></tr>
             <tr><td>Konu'ya resim upload edin</td><td><input type="file" name="upload_resim" /></td></tr>
             <tr><td colspan="2" ><input type="submit" name="onay" onclick="kontrol()" /></td></tr>
             </form>
    </table>
</body>
</html>
<!DOCTYPE html>
<html>    
<head> 
    
<meta NAME="ROBOTS" CONTENT="noindex, nofollow" >
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >

<title>Kodbilimi Yönetim Paneli</title>

<script type="text/javascript">
 function tik(){
      alert("konu silindi sayfayı yenileyin");
    
    }
</script>

</head>

<body style="background-image: url(images/bg.png);background-repeat: repeat;">
    
    <a href='panel.php'><button>Geri</button></a>
    <a href='kontrol.php'><button style="float:right;">Çıkış</button></a>
    <h1 align="center">Hoşgeldin {$session}</h1>
    <table align="center" width="1000" height="500" style="margin-top:20px;margin-bottom:100px;" border="1" >
        <tr><th>Konu ID</th><th>Konu Başlığı</th><th>Kategori</th><th>Alt Kategori</th><th>Okunma Sayısı</th><th>Yayın Tarihi</th><th>Düzenleme</th></tr>
        {foreach from=$veriler item=any}
        <tr align="center"><td>{$any.0}</td><td>{$any.1}</td><td>{$any.2}</td><td>{$any.3}</td><td>{$any.4}</td><td>{$any.5}</td><td><form action ="" method="post"><input type="hidden" value="{$any.0}" name="konu_id" /><input type="submit" value="Sil" name="sil" onclick="tik()" /> <input type="submit" value="Düzenle" name ="duzenle" /></form></td></tr>
        {/foreach}
        <tr><td colspan="7">{for $i=1 to $sayfa } <a href="?s={$i}"> {$i} </a> {/for}</td></tr>
    </table>
    
</body>
</html>
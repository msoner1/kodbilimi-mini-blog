<?php /* Smarty version 3.1.24, created on 2015-06-14 21:21:59
         compiled from "tema/soru_girisi.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:28180557dc6471770b3_71219628%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3cffabf5b5da3a6085ab3eca42d665c7a4da4ba2' => 
    array (
      0 => 'tema/soru_girisi.tpl',
      1 => 1434306110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28180557dc6471770b3_71219628',
  'variables' => 
  array (
    'session' => 0,
    'onaylimi' => 0,
    'durum' => 0,
    'gelen_veriler' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_557dc647210922_66974053',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_557dc647210922_66974053')) {
function content_557dc647210922_66974053 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '28180557dc6471770b3_71219628';
?>
<!DOCTYPE html>
<html>
<head>
<meta NAME="ROBOTS" CONTENT="noindex, nofollow" >
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
<title>Kodbilimi Yönetim Paneli</title>
<?php echo '<script'; ?>
 type="text/javascript">
    function kontrol(){
    for(i = 1;i<4; i++){
     var a = document.getElementById(i).value;
     if(a == ""){
         alert("Formlar Boş Geçilemez");break;
     }
    }
    }
<?php echo '</script'; ?>
>
</head>
<body style="background-image: url(images/bg.png);background-repeat: repeat;">
    <a href='panel.php'><button>Geri</button></a>
    <a href='kontrol.php'><button style="float:right;">Çıkış</button></a>
    <h1 align="center">Hoşgeldin <?php echo $_smarty_tpl->tpl_vars['session']->value;?>
</h1>
    <?php if (isset($_smarty_tpl->tpl_vars['onaylimi']->value)) {?><font color="red"><h3 align= 'center'>**<?php echo $_smarty_tpl->tpl_vars['onaylimi']->value;?>
</h3></font><?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['durum']->value)) {?><h3 align= 'center'>Konu Başarıyla Kaydedildi...</h3><?php }?>
    <table align="center" width="800" style="margin-top:20px;margin-bottom:100px;" >
             <form action="" method="post" enctype="multipart/form-data">
             <tr><td>Soru</td><td><input type="text" id="1" value = "<?php if (isset($_smarty_tpl->tpl_vars['gelen_veriler']->value)) {
echo $_smarty_tpl->tpl_vars['gelen_veriler']->value['soru'];
}?>" name="baslik" maxlength="80" placeholder="maksimum 80 karakter" size="50" /></td></tr>
             <tr><td>Cevap</td><td><textarea name="icerik" id="2" placeholder="Html etiketlerinini kullabilirsiniz" cols="60" rows="15" ><?php if (isset($_smarty_tpl->tpl_vars['gelen_veriler']->value)) {
echo $_smarty_tpl->tpl_vars['gelen_veriler']->value['cevap'];
}?></textarea></td></tr>
             <tr><td>Kategori</td><td><select name="kategori" >
             <option value="webdunyasi" <?php if (isset($_smarty_tpl->tpl_vars['gelen_veriler']->value)) {
if ($_smarty_tpl->tpl_vars['gelen_veriler']->value["kategori"] == "webdunyasi") {?>selected<?php }
}?>>Web Dunyası</option>
             <option value="bilgisayar_bilimi" <?php if (isset($_smarty_tpl->tpl_vars['gelen_veriler']->value)) {
if ($_smarty_tpl->tpl_vars['gelen_veriler']->value["kategori"] == "bilgisayar_bilimi") {?>selected<?php }
}?>>Bilgisayar Bilimi</option>
             <option value="photoshop" <?php if (isset($_smarty_tpl->tpl_vars['gelen_veriler']->value)) {
if ($_smarty_tpl->tpl_vars['gelen_veriler']->value["kategori"] == "photoshop") {?>selected<?php }
}?>>Photoshop</option>
             <option value="genelprogramlama" <?php if (isset($_smarty_tpl->tpl_vars['gelen_veriler']->value)) {
if ($_smarty_tpl->tpl_vars['gelen_veriler']->value["kategori"] == "genelprogramlama") {?>selected<?php }
}?>>Genel Programlama</option>
             </select></td></tr>
             <tr><td>Alt Kategori</td><td><input type="text" id="3" name="alt_kategori" value = "<?php if (isset($_smarty_tpl->tpl_vars['gelen_veriler']->value)) {
echo $_smarty_tpl->tpl_vars['gelen_veriler']->value['alt_kategori'];
}?>" maxlength="50" placeholder="maksimum 50 karakter" size="50" /></td></tr>
             <tr><td>Soru resmi seçin</td><td><input type="file" name="resim" /></td></tr>
             <tr><td colspan="2" ><input type="submit" name="onay" onclick="kontrol()" /></td></tr>
             </form>
    </table>
</body>
</html><?php }
}
?>
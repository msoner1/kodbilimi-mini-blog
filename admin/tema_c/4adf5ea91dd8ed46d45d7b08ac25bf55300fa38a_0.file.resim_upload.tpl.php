<?php /* Smarty version 3.1.24, created on 2015-06-17 14:53:36
         compiled from "tema/resim_upload.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2141951127558189f06a2b93_13929758%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4adf5ea91dd8ed46d45d7b08ac25bf55300fa38a' => 
    array (
      0 => 'tema/resim_upload.tpl',
      1 => 1434551823,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2141951127558189f06a2b93_13929758',
  'variables' => 
  array (
    'session' => 0,
    'durum' => 0,
    'onaylimi' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_558189f07b0610_00938101',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_558189f07b0610_00938101')) {
function content_558189f07b0610_00938101 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2141951127558189f06a2b93_13929758';
?>
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
    <h1 align="center">Hoşgeldin <?php echo $_smarty_tpl->tpl_vars['session']->value;?>
</h1>
    <?php if (isset($_smarty_tpl->tpl_vars['durum']->value)) {?><h3 align= 'center'>Resim Başarıyla Sunucuya Aktarıldı...</h3><?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['onaylimi']->value)) {?><h3 align= 'center'><?php echo $_smarty_tpl->tpl_vars['onaylimi']->value;?>
</h3><?php }?>
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
</html><?php }
}
?>
<?php /* Smarty version 3.1.24, created on 2015-06-15 12:42:12
         compiled from "tema/soru_duzenle.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1561557e9df445ab29_59471065%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '204d94b50e6ccb1726916c92a2d0824c257e1701' => 
    array (
      0 => 'tema/soru_duzenle.tpl',
      1 => 1434361164,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1561557e9df445ab29_59471065',
  'variables' => 
  array (
    'session' => 0,
    'veriler' => 0,
    'any' => 0,
    'sayfa' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_557e9df45120a5_95549852',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_557e9df45120a5_95549852')) {
function content_557e9df45120a5_95549852 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1561557e9df445ab29_59471065';
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
    <table align="center" width="1000" height="500" style="margin-top:20px;margin-bottom:100px;" border="1" >
        <tr><th>Soru ID</th><th>Soru Başlığı</th><th>Kategori</th><th>Alt Kategori</th><th>Okunma Sayısı</th><th>Yayın Tarihi</th><th>Düzenleme</th></tr>
        <?php
$_from = $_smarty_tpl->tpl_vars['veriler']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['any'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['any']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['any']->value) {
$_smarty_tpl->tpl_vars['any']->_loop = true;
$foreach_any_Sav = $_smarty_tpl->tpl_vars['any'];
?>
        <tr align="center"><td><?php echo $_smarty_tpl->tpl_vars['any']->value[0];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['any']->value[1];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['any']->value[2];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['any']->value[3];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['any']->value[4];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['any']->value[5];?>
</td><td><form action ="" method="post"><input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['any']->value[0];?>
" name="konu_id" /><input type="submit" value="Sil" name="sil" /> <input type="submit" value="Düzenle" name ="duzenle" /></form></td></tr>
        <?php
$_smarty_tpl->tpl_vars['any'] = $foreach_any_Sav;
}
?>
        <tr><td colspan="7"><?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['sayfa']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['sayfa']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?> <a href="?s=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['i']->value;?>
 </a> <?php }} ?></td></tr>
    </table>
    
</body>
</html><?php }
}
?>
﻿	<link rel="stylesheet" type="text/css" title="Main" media="screen,print" href="<?php if(isset($durum)){echo '../../kodlar/son_basliklarstil.css';}else{echo '../kodlar/son_basliklarstil.css';} ?>" />
	<div id="yan">
     <h4 class="yanbaslik1">Son Başlıklar </h4>
      <?php
      $baglan = @mysql_connect($host,$dbuser,$dbpass);
	  mysql_query("SET NAMES UTF8");
      if(! $baglan) die ("Mysql Baglantisi Yapilamadi");
      @mysql_select_db($database,$baglan) or die ("Veri Tabanina Baglanti Yapilamadi"); 
      $sqlsorgu = mysql_query("SELECT * FROM konular Order By yayin_tarihi desc limit 10");
	  $ilk=1;
      while($yazdir=mysql_fetch_array($sqlsorgu)){
      $metin = $yazdir['konu_baslik'];
	  $id = $yazdir['konu_id'];
	  $kategori=$yazdir['kategori'];
	  $kategori2=$yazdir['alt_kategori'];
	  $konu_basligi=$metin;
      $url=SEO($konu_basligi);
	  if($ilk==1){$ilk=5;}else{$ilk=-10;}
	  $konuresmi=$yazdir['konu_resmi'];
	  if(isset($durum)){$konuresmi="../"+$yazdir['konu_resmi'];}
	  echo '<a class="menu_link" href="../'.$kategori.'/'.$url.'-t'.$id.'.html" title="'.$konu_basligi.'"><img src="'.$konuresmi.'" width="50" height="35" alt="'.$konu_basligi.'" style="border-radius:50px;float:right;margin-right:5px;margin-top:'.$ilk.'px" /><h3 class="dikkatceken">'.$konu_basligi.'</h3></a>';}
       ?>
	 </div>
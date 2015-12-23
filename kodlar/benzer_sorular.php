      <link rel="stylesheet" type="text/css" title="Main" media="screen,print"title="Main" media="screen,print" href="<?php if(isset($durum)){echo '../../kodlar/son_basliklarstil.css';}else{echo '../kodlar/son_basliklarstil.css';} ?>" />
	  <?php
      $baglan = @mysql_connect($host,$dbuser,$dbpass);
	  mysql_query("SET NAMES UTF8");
      if(! $baglan) die ("Mysql Baglantisi Yapilamadi");
      @mysql_select_db($database,$baglan) or die ("Veri Tabanina Baglanti Yapilamadi"); 
      $sqlsorgu = mysql_query("SELECT * FROM soru Where kategori_id=".$kategori." Order By okunma desc limit 10");
	  $ilk=1;
      while($yazdir=mysql_fetch_array($sqlsorgu)){
      $metin = $yazdir['soru'];
	  $id2 = $yazdir['soru_id'];
	  if($id2!=$id){
	  $konu_basligi=$metin;
      $url=SEO($konu_basligi);
	  if($ilk==1){$ilk=5;
	  echo '<div id="yan">
            <h4 class="yanbaslik1">Benzer Sorular </h4>';
	  }else{$ilk=-10;}
	  $konuresmi=$yazdir['resim_url'];
	  echo '<a class="menu_link" href="../soru-cevap/'.$url.'-t'.$id2.'.html" title="'.$metin.'"><img src="'.$konuresmi.'" width="50" height="35" alt="'.$konu_basligi.'" style="border-radius:50px;float:right;padding-right:5px;margin-top:'.$ilk.'px" /><h3 class="dikkatceken" title="'.$metin.'">'.$metin.'</h3></a>';
	  }
	  }
       if($ilk!=1){echo "</div>";}
     ?>
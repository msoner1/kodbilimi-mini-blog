	  <?php
         $baglan = @mysql_connect($host,$dbuser,$dbpass);
	     mysql_query("SET NAMES UTF8");
         if(! $baglan) die ("Mysql Baglantisi Yapilamadi");
         @mysql_select_db($database,$baglan) or die ("Veri Tabanina Baglanti Yapilamadi"); 
         $sqlsorgu = mysql_query("SELECT * FROM konular Where alt_kategori='".$kategori."' Order By yayin_tarihi desc limit 10");
		 $ilk=1;
         while($yazdir=mysql_fetch_array($sqlsorgu)){
         $metin = $yazdir['konu_baslik'];
	     $id2 = $yazdir['konu_id'];
	     if($id2!=$id){
	     $konu_basligi=$metin;
         $url=SEO($konu_basligi);
		 if($ilk==1){$ilk=5;
		 echo '<div id="yan">
         <h4 class="yanbaslik1">Benzer Konular </h4>';
		 }else{$ilk=-10;}
		 $konuresmi=$yazdir['konu_resmi'];
	     echo '<a class="menu_link" href="../'.$kategorigenel.'/'.$url.'-t'.$id2.'.html" title="'.$konu_basligi.'"><img src="'.$konuresmi.'" width="50" height="35" alt="'.$konu_basligi.'" style="border-radius:50px;float:right;padding-right:5px;margin-top:'.$ilk.'px" /><h3 class="dikkatceken">'.$konu_basligi.'</h3></a>';
		 }
	     }
		 if($ilk!=1){echo "</div>";}
	    ?>
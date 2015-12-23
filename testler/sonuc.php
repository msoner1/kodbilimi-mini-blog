<?php $yuzde=$dogrusayisi*5; ?>
<div id="sorupaneli">
  <center><h1 class="sonuc"> Sonuçlar</h1>
  <h3 class="sonuc"><?php echo $yuzde ?>%</h3>
  <p>(20 de <?php echo $dogrusayisi ?>)</p>
  <?php if(isset($yanlissorular)){echo '<a class="menu_link" href="'.$testurl.'" title="tekrar deneyin"><p class="butonbasla">Tekrar Dene</p></a>';} 
        else{echo '<h3 class="sonuc">Tebrikler</h3>';echo '<a class="menu_link" href="index.php" title="Diğer Testlerimiz"><p class="butonbasla" style="width:300px; background-color:#ADD8E6;">Farklı Testlerimize Katılın</p></a>';}
  if(isset($yanlissorular)){echo '<br /><h3 class="sonuc">Yanlış Cevapların</h3>';
      for($i=0;$i<sizeof($yanlissorular);$i++){
	   $sqlsorgu = mysql_query("SELECT * FROM testler where soru_id=".($yanlissorular[$i]+(($id-1)*20))."");
	   $yazdir=mysql_fetch_array($sqlsorgu);
	   $verilen_cevapsikki=$cevaplardizisi[20-$yanlissorular[$i]];
	   if($verilen_cevapsikki==0){$verilen_cevap="Boş bıraktınız.";}
	   else if($verilen_cevapsikki==1){if($yazdir['yanlis_cevap1_sikki']==1){$verilen_cevap=$yazdir['yanlis_cevap1'];}else if($yazdir['yanlis_cevap2_sikki']==1){$verilen_cevap=$yazdir['yanlis_cevap2'];}else if($yazdir['yanlis_cevap3_sikki']==1){$verilen_cevap=$yazdir['yanlis_cevap3'];}}
	   else if($verilen_cevapsikki==2){if($yazdir['yanlis_cevap1_sikki']==2){$verilen_cevap=$yazdir['yanlis_cevap1'];}else if($yazdir['yanlis_cevap2_sikki']==2){$verilen_cevap=$yazdir['yanlis_cevap2'];}else if($yazdir['yanlis_cevap3_sikki']==2){$verilen_cevap=$yazdir['yanlis_cevap3'];}}
	   else if($verilen_cevapsikki==3){if($yazdir['yanlis_cevap1_sikki']==3){$verilen_cevap=$yazdir['yanlis_cevap1'];}else if($yazdir['yanlis_cevap2_sikki']==3){$verilen_cevap=$yazdir['yanlis_cevap2'];}else if($yazdir['yanlis_cevap3_sikki']==3){$verilen_cevap=$yazdir['yanlis_cevap3'];}}
	   else if($verilen_cevapsikki==4){if($yazdir['yanlis_cevap1_sikki']==4){$verilen_cevap=$yazdir['yanlis_cevap1'];}else if($yazdir['yanlis_cevap2_sikki']==4){$verilen_cevap=$yazdir['yanlis_cevap2'];}else if($yazdir['yanlis_cevap3_sikki']==4){$verilen_cevap=$yazdir['yanlis_cevap3'];}}
	   echo '<p class="yanlislar"><strong>'.$yanlissorular[$i].'.'.$yazdir['soru'].'<br /><i style="color:red;">Verdiğin cevap:  '.$verilen_cevap.'<br /></i><i style="color:green;">Doğru cevap:  '.$yazdir['dogru_cevap'].'</i></strong></p>';
	  }}
  ?>
  </center>
 </div>
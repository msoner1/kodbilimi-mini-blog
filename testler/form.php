   <div id="sorupaneli">
	  <h1 id="soru"><?php echo "".$sorunumarasi.".";echo $soru; ?></h1>
	  <form name="testformu" action='<?php echo $testurl ?>' method='post'>
	   <input type="hidden" name="cevaplar" value="<?php echo $value; ?>" size="20" />
	   <input type="hidden" name="sorunumarasi" value="<?php echo $sorunumarasi; ?>" size="20" />
	   <div class='radio'><label><input type='radio' name='quiz' id='1' value='1' /><?php if($yazdir['dogru_cevap_sikki']==1){echo $yazdir['dogru_cevap'];}else if($yazdir['yanlis_cevap1_sikki']==1){echo $yazdir['yanlis_cevap1'];}else if($yazdir['yanlis_cevap2_sikki']==1){echo $yazdir['yanlis_cevap2'];}else if($yazdir['yanlis_cevap3_sikki']==1){echo $yazdir['yanlis_cevap3'];} ?></label></div>
	   <div class='radio'><label><input type='radio' name='quiz' id='2' value='2' /><?php if($yazdir['dogru_cevap_sikki']==2){echo $yazdir['dogru_cevap'];}else if($yazdir['yanlis_cevap1_sikki']==2){echo $yazdir['yanlis_cevap1'];}else if($yazdir['yanlis_cevap2_sikki']==2){echo $yazdir['yanlis_cevap2'];}else if($yazdir['yanlis_cevap3_sikki']==2){echo $yazdir['yanlis_cevap3'];} ?></label></div>
 	   <div class='radio'><label><input type='radio' name='quiz' id='3' value='3' /><?php if($yazdir['dogru_cevap_sikki']==3){echo $yazdir['dogru_cevap'];}else if($yazdir['yanlis_cevap1_sikki']==3){echo $yazdir['yanlis_cevap1'];}else if($yazdir['yanlis_cevap2_sikki']==3){echo $yazdir['yanlis_cevap2'];}else if($yazdir['yanlis_cevap3_sikki']==3){echo $yazdir['yanlis_cevap3'];} ?></label></div>
	   <div class='radio'><label><input type='radio' name='quiz' id='4' value='4' /><?php if($yazdir['dogru_cevap_sikki']==4){echo $yazdir['dogru_cevap'];}else if($yazdir['yanlis_cevap1_sikki']==4){echo $yazdir['yanlis_cevap1'];}else if($yazdir['yanlis_cevap2_sikki']==4){echo $yazdir['yanlis_cevap2'];}else if($yazdir['yanlis_cevap3_sikki']==4){echo $yazdir['yanlis_cevap3'];} ?></label></div>
	  <input type='submit' class="butonsonraki" value='Sonraki ' />
	  </form>
	 </div>
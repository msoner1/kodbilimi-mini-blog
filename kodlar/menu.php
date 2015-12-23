  
  <link rel="stylesheet" type="text/css" title="Main" media="screen,print" href="<?php if(isset($durum)){echo '../../kodlar/menustil.css';}else{echo '../kodlar/menustil.css';} ?>" />
  	<script type="text/javascript">
	$(function(){
		var a = 0;
		$('.responsive_menu').click(function(){
			$(this).next('ul').slideToggle(500);
		});
	});
	</script>
  <header id="menu">
   <a href="<?php if(isset($durum)){echo '../../';}else{echo '../';} ?>" title="anasayfa" ><img class="logo" src="<?php if(isset($durum)){echo '../../img/kodbilimi.png';}else{echo '../img/kodbilimi.png';} ?>" alt="kodbilimi logo" width="150" height="45" /></a>
  <nav class="menu" >
   <img class="responsive_menu" src="<?php if(isset($durum)){echo '../../img/respmenu.png';}else{echo '../img/respmenu.png';} ?>" alt="kodbilimi logo" width="55" height="55" />
   <ul>
    <li><a href="<?php if(isset($durum)){echo '../../';}else{echo '../';} ?>" title="anasayfa" >Anasayfa</a></li>
    <li><a href="<?php if(isset($durum)){echo '../../soru-cevap';}else{echo '../soru-cevap';} ?>" title="soru-cevap" >Soru-Cevap</a></li>
    <li><a href="<?php if(isset($durum)){echo '../../webdunyasi/?s=1';}else{echo '../webdunyasi/?s=1';} ?>" title="web dünyasi" >Web Dünyası</a></li>
	<li><a href="<?php if(isset($durum)){echo '../../genelprogramlama/?s=1';}else{echo '../genelprogramlama/?s=1';} ?>" title="genel programlama" >Genel Programlama</a></li>
    <li><a href="<?php if(isset($durum)){echo '../../bilgisayar_bilimi/?s=1';}else{echo '../bilgisayar_bilimi/?s=1';} ?>" title="bilgisayar bilimi" >Bilgisayar Bilimi</a></li>
    <li><a href="<?php if(isset($durum)){echo '../../photoshop/?s=1';}else{echo '../photoshop/?s=1';} ?>" title="photoshop" >Photoshop</a></li>
    <li><a href="<?php if(isset($durum)){echo '../../testler/';}else{echo '../testler/';} ?>" title="Bilgilerinizi test edin..." >Bilginizi Test Edin</a></li> 
   </ul>
  </nav>
   <form class="aramacubuk" method="post" action="<?php if(isset($durum)){echo '../../arama.php';}else{echo '../arama.php';} ?>">
     <input id="cubuk" type="text" name="ara" placeholder="Bir şeyler Arayın..." autocomplete="off" value="" maxlength="20" />
	 <input id="buton" type="submit" value="ARA">
   </form>
  </header>

<?php
	session_start();
	$veza = new PDO('mysql:host=' . getenv('MYSQL_SERVICE_HOST') . ';port=3306;dbname=balasevizam', 'remorker7', 'balasevizam7');
	$veza->exec("set names utf8");
	$koJe = $_SESSION['username'];
	$rezultat = $veza->prepare("SELECT * FROM korisnici where username = '$koJe'");
	$rezultat->execute();
	$broj = $rezultat->rowCount();
	if ($broj < 1){
		header('Location: index.php');
		die;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title> Balaševizam - Za sanjare, male blesane, noći besane... </title>
	<link type = "text/css" rel = "stylesheet" href = "balasevizam.css"/>
	<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
	<meta charset = "utf-8">
</head>
<body>
	<div class = "okvir">
		<p id = "poruka-log">
			Ulogovani ste kao: <?php echo $_SESSION['username']; ?>.
			<a id = "odjava" href = "odjava.php">Odjavite se</a></p>
		</p>
		<div class = "banner">
			<img src = "slike/banner.jpg" alt = "Đorđe Balašević"/>
		</div>
		<div class = "meni-button">
			<button class = "meni_btn" onclick = "prikazMenija('meni_div')">MENI <span id = "strelica">&#9662;</span></button>
		</div>
		<script src = "js/dropdown_meni.js"></script>
		<div class = "meni" id = "meni_div">
			<nav>
				<ul>
					<li><a href = "pocetna.php">POČETNA</a></li>
					<li><a href = "balasgram.php">BALAŠGRAM</a></li>
					<li><a href = "tekstoviPjesama.php" class = "aktivni">TEKSTOVI PJESAMA</a></li>
					<li><a href = "knjige.php">KNJIGE</a></li>
					<li><a href = "maliBalasevici.php">MALI BALAŠEVIĆI</a></li>
					<li><a href = "kontakt.php">KONTAKT</a></li>
				</ul>
			</nav>
		</div>
		<div id = "sadrzaj" class = "sadrzaj">
			<div class = "naziv_album">
				<br><br><p class = "citati"><b>Mojoj mami, umesto maturske slike u izlogu (1979.)</b></p>
				1. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/uvod-mojoj-mami-umesto-maturske-slike-u-izlogu/">Uvod</a><br>
				2. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/sve-je-dobro-kad-se-dobro-svrsi/">Sve je dobro kad se dobro svrši</a><br>
				3. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/drago-mi-je-zbog-mog-starog/">Drago mi je zbog mog starog</a><br>
				4. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/jedan-sasa-iz-voza/">Jedan Saša iz voza</a><br>
				5. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/uticaj-rodaka-na-moj-zivotni-put/">Uticaj rođaka na moj životni put</a><br>
				6. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/mnogo-mi-znaci-to/">Mnogo mi znači to</a><br>
				7. <a target="_blank" class = "link_pjesma" href = ""http://www.balasevic.info/tekstovi-pjesama/neki-novi-klinci/>Neki novi klinci</a><br>
				8. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/stara-pesma/">Stara pesma</a><br>
				9. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/moj-frend-ima-rock-and-roll-band/">Moj frend ima Rock and Roll Band</a><br>
				10. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/brakolomac/">Brakolomac</a><br>
				11. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/prodaje-se-prijatelj/">Prodaje se prijatelj</a><br><br>
				
				<p class = "citati"><b>Odlazi cirkus (1980.)</b></p>
				1. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/prica-o-vasi-ladackom-singl/">Priča o Vasi Ladačkom</a><br>
				2. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/jos-jedna-gorka-pesma/">Još jedna gorka pesma</a><br>
				3. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/nisam-bio-ja-za-nju/">Nisam bio ja za nju</a><br>
				4. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/menuet/">Menuet</a><br>
				5. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/zivot-je-more/">Život je more</a><br>
				6. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/pa-dobro-gde-si-ti/">Pa dobro gde si ti</a><br>
				7. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/mirka/">Mirka</a><br>
				8. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/o-kako-tuznih-ljubavi-ima/">O, kako tužnih ljubavi ima</a><br>
				9. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/ostaje-mi-to-sto-se-volimo/">Ostaje mi to što se volimo</a><br>
				10. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/odlazi-cirkus/">Odlazi cirkus</a><br><br>
				
				<p class = "citati"><b>Pub (1982.)</b></p>
				1. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/ilona/">Ilona</a><br>
				2. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/ratnik-paorskog-srca/">Ratnik paorskog srca</a><br>
				3. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/za-sve-je-kriv-toma-sojer/">Za sve je kriv Toma Sojer</a><br>
				4. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/za-trecu-smenu/">Za treću smenu</a><br>
				5. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/lepa-protina-kci/">Lepa protina kći</a><br>
				6. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/pesma-o-jednom-petlu/">Pesma o jednom petlu</a><br>
				7. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/boza-zvani-pub/">Boža zvani Pub</a><br>
				8. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/predlog/">Predlog</a><br>
				9. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/na-pola-puta/">Na pola puta</a><br><br>
				
				<p class = "citati"><b>Celovečernji The Kid (1983.)</b></p>
				1. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/celovecernji-the-kid/">Celovečernji The Kid</a><br>
				2. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/vi-ste-jedan-obican-mis/">Vi ste jedan običan miš</a><br>
				3. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/crni-labud/">Crni labud</a><br>
				4. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/blues-mutne-vode/">Blues mutne vode</a><br>
				5. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/svirajte-mi-jesen-stize-dunjo-moja/">Svirajte mi "Jesen stiže dunjo moja"</a><br>
				6. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/don-francisko-long-play/">Don Francisko Long Play</a><br>
				7. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/medena-vremena/">Medena vremena</a><br>
				8. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/lunjo/">Lunjo</a><br>
				9. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/nikad-kao-bane/">Nikad kao Bane</a><br>
				10. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/neko-to-od-gore-vidi-sve/">Neko to od gore vidi sve</a><br><br>
				
				<p class = "citati"><b>003 (1985.)</b></p>
				1. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/noc-kad-sam-preplivao-dunav/">Noć kad sam preplivao Dunav</a><br>
				2. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/baby-blue/">Baby Blue</a><br>
				3. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/morao-sam-da-se-odselim/">Morao sam da se odselim</a><br>
				4. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/bela-lada/">Bela lađa</a><br>
				5. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/al-se-nekad-dobro-jelo/">Al' se nekad dobro jelo</a><br>
				6. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/slovenska/">Slovenska</a><br>
				7. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/mani-me-se-lepa-nasto/">Mani me se lepa Nasto</a><br>
				8. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/olivera/">Olivera</a><br>
				9. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/put-u-srediste-zemlje/">Put u središte zemlje</a><br>
				10. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/badnje-vece/">Badnje veče</a><br><br>
				
				<p class = "citati"><b>Bezdan (1986.)</b></p>
				1. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/sve-je-otislo-u-honduras/">Sve je otišlo u Honduras</a><br>
				2. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/virovitica/">Virovitica</a><br>
				3. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/ne-volim-januar/">Ne volim januar</a><br>
				4. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/nema-vise-benda-kao-neoplanti/">Nema više benda kao Neoplanti</a><br>
				5. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/bezdan/">Bezdan</a><br>
				6. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/stari-orkestar/">Stari orkestar</a><br>
				7. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/narodnjaci/">Narodnjaci</a><br>
				8. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/ne-lomite-mi-bagrenje/">Ne lomite mi bagrenje</a><br>
				9. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/slow-motion/">Slow Motion</a><br><br>
				
				<p class = "citati"><b>Panta Rei (1988.)</b></p>
				1. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/soliter/">Soliter</a><br>
				2. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/neki-se-rode-kraj-vode/">Neki se rode kraj vode</a><br>
				3. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/oni/">Oni</a><br>
				4. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/sansona/">Šansona</a><br>
				5. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/nemam-nista-s-tim/">Nemam ništa s tim</a><br>
				6. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/starim/">Starim</a><br>
				7. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/cekajuci-montenegro-express/">Čekajući Montenegro Express</a><br>
				8. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/jednom/">Jednom…</a><br>
				9. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/requiem/">Requiem</a><br><br>
				
				<p class = "citati"><b>Tri posleratna druga (1989.)</b></p>
				1. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/sugar-rap/">Sugar Rap</a><br>
				2. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/jos-jedna-pesma-o-maloj-garavoj/">Još jedna pesma o maloj garavoj</a><br>
				3. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/devojka-sa-cardas-nogama/">Devojka sa "čardaš" nogama</a><br>
				4. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/caletova-pesma/">Ćaletova pesma</a><br>
				5. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/d-moll/">D-moll</a><br>
				6. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/kad-odem/">Kad odem</a><br>
				7. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/saputnik/">Saputnik</a><br>
				8. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/remorker/">Remorker</a><br>
				9. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/o-boze/">O, Bože</a><br><br>
				
				<p class = "citati"><b>Marim ja… (1991.)</b></p>
				1. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/covek-za-koga-se-udala-buba-erdeljan/">Čovek za koga se udala Buba Erdeljan</a><br>
				2. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/divlji-badem/">Divlji badem</a><br>
				3. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/citron-pesma/">Citron pesma</a><br>
				4. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/marim-ja/">Marim ja...</a><br>
				5. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/nevernik/">Nevernik</a><br>
				6. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/ringispil/">Ringišpil</a><br>
				7. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/slabo-divanim-madarski/">Slabo divanim mađarski</a><br>
				8. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/ole-lole/">Ole-Lole</a><br>
				9. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/kako-su-zli-dedaci/">Kako su zli dedaci razbucali godišnjicu braka kod mog druga Jevrema</a><br><br>
				
				<p class = "citati"><b>Jedan od onih života (1993.)</b></p>
				1. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/ja-luzer/">Ja luzer?</a><br>
				2. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/the-last-marsh/">The Last Marsh</a><br>
				3. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/krivi-smo-mi/">Krivi smo mi (Putuj Evropo)</a><br>
				4. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/posvadana-pesma-izvini/">Posvađana pesma (Izvini)</a><br>
				5. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/dan-posle-ponedeljka/">Dan posle ponedeljka</a><br>
				6. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/provincijalka/">Provincijalka</a><br>
				7. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/portret-mog-zivota/">Portret mog života</a><br>
				8. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/stari-laloski-vals/">Stari laloški vals</a><br>
				9. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/covek-sa-mesecom-u-ocima/">Čovek sa mesecom u očima</a><br><br>
				
				<p class = "citati"><b>Na posletku (1996.)</b></p>
				1. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/naposletku/">Na posletku</a><br>
				2. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/sin-jedinac/">Sin jedinac</a><br>
				3. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/regruteska/">Regruteska</a><br>
				4. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/drvena-pesma/">Drvena pesma</a><br>
				5. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/namcor/">Namćor</a><br>
				6. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/dodoska/">Dođoška</a><br>
				7. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/miholjsko-leto/">Miholjsko leto</a><br>
				8. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/poslednja-nevesta/">Poslednja nevesta</a><br>
				9. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/uspavanka-za-decaka/">Uspavanka za dečaka</a><br><br>
				
				<p class = "citati"><b>Devedesete (2000.)</b></p>
				1. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/devedesete/">Devedesete</a><br>
				2. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/ziveti-slobodno/">Živeti slobodno</a><br>
				3. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/balkanski-tango/">Balkanski tango</a><br>
				4. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/plava-balada/">Plava balada</a><br>
				5. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/stih-na-asfaltu/">Stih na asfaltu</a><br>
				6. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/legenda-o-gedi-gluperdi/">Legend'a o Gedi Gluperdi</a><br>
				7. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/sevdalinka/">Sevdalinka</a><br>
				8. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/kao-talas/">Kao talas</a><br>
				9. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/nedostaje-mi-nasa-ljubav/">Nedostaje mi naša ljubav</a><br>
				10. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/naopaka-bajka/">Naopaka bajka</a><br>
				11. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/dok-gori-nebo-nad-novim-sadom/">Dok gori nebo nad Novim Sadom</a><br>
				12. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/mrtvi/">Mrtvi...</a><br><br>
				
				<p class = "citati"><b>Dnevnik starog momka (2001.)</b></p>
				1. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/otilia/">Otilia (Lakonoga)</a><br>
				2. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/ljerka/">Ljerka (Korzo novosadski)</a><br>
				3. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/ankica/">Ankica (Prolazi još jedan dan bez nje)</a><br>
				4. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/jaroslava/">Jaroslava (Princezo javi se)</a><br>
				5. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/eleonora/">Eleonora (Na bogojavljensku noć)</a><br>
				6. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/nevena/">Nevena (Sale Nađ)</a><br>
				7. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/anita/">Anita (Budimpeštanski sneg)</a><br>
				8. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/julia/">Julia (Jablani tuže jalovi)</a><br>
				9. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/branislava/">Branislava (Narkomanska)</a><br>
				10. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/ognjena/">Ognjena (Malecka)</a><br>
				11. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/ljudmila/">Ljudmila (Noć kad je Tisa nadošla)</a><br>
				12. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/andela/">Anđela (Moja je draga veštica)</a><br><br>
				
				<p class = "citati"><b>Rani mraz (2004.)</b></p>
				1. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/prica-o-vasi-ladackom-singl/">Priča o Vasi Ladačkom</a><br>
				2. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/aco-braco/">Aco braco</a><br>
				3. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/civutski-vrt/">Ćivutski vrt</a><br>
				4. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/kere-varosanke/">Kere varošanke</a><br>
				5. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/ladarska-serenata/">Lađarska serenata</a><br>
				6. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/boze-boze/">Bože, Bože</a><br>
				7. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/galicia/">Galicia</a><br>
				8. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/tvoj-neko/">Tvoj neko</a><br>
				9. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/maliganska/">Maliganska</a><br>
				10. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/ja-vas-kanda-znam/">Ja vas kanda znam?</a><br>
				11. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/pred-zadnji-sneg/">Pred zadnji sneg</a><br>
				12. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/tekstovi-pjesama/kao-rani-mraz/">Kao rani mraz</a><br><br>
				
				<p class = "citati"><b>Singlovi</b></p>
				1. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/singlovi/poluuspavanka-1987/">Poluuspavanka</a><br>
				2. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/singlovi/hej-carobnjaci-svi-su-vam-daci-1982/">Hej čarobnjaci, svi su vam đaci</a><br>
				3. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/singlovi/tri-put-sam-video-tita-1981/">Tri put sam video Tita</a><br>
				4. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/singlovi/marina-1980/">Marina</a><br>
				5. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/singlovi/prvi-januar-popodne-1979/">Prvi januar popodne</a><br>
				6. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/singlovi/panonski-mornar-1979/">Pannoski mornar</a><br>
				7. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/singlovi/oprosti-mi-katrin-1978/">Oprosti mi, Katrin</a><br>
				8. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/singlovi/ljubio-sam-snasu-na-salasu-1978/">Ljubio sam snašu na salašu</a><br>
				9. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/singlovi/racunajte-na-nas-1978/">Računajte na nas</a><br>
				11. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/singlovi/kristofore-crni-sine-1978/">Kristofore crni sine</a><br>
				12. <a target="_blank" class = "link_pjesma" href = "http://www.balasevic.info/singlovi/u-razdeljak-te-ljubim-1977/">U razdeljak te ljubim</a><br><br>
			</div>
		</div>
		<div class = "footer">
			<p>Copyright &copy; Selmir Hasanović (remorker7), 2016. godina</p>
		</div>
	</div>
</body>
</html>
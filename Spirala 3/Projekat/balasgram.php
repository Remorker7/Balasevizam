<?php
	session_start();
	if(!file_exists('korisnici/' . $_SESSION['username'] . '.xml')){
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
					<li><a href = "balasgram.php" class = "aktivni">BALAŠGRAM</a></li>
					<li><a href = "tekstoviPjesama.php">TEKSTOVI PJESAMA</a></li>
					<li><a href = "knjige.php">KNJIGE</a></li>
					<li><a href = "maliBalasevici.php">MALI BALAŠEVIĆI</a></li>
					<li><a href = "kontakt.php">KONTAKT</a></li>
				</ul>
			</nav>
		</div>
		<div id = "sadrzaj" class = "sadrzaj">
			<div class = "top-slike">
				<p class = "citat-naslov">Đorđe Balašević - citati</p>
				<a href = "#prikaz-slike"><img src = "slike/citat6.jpg" alt = "Slika 6" onclick = "funkcijaPrikaz('slike/citat6.jpg'); return false;"/></a>
				<a href = "#prikaz-slike"><img src = "slike/citat5.jpg" alt = "Slika 5" onclick = "funkcijaPrikaz('slike/citat5.jpg'); return false;"/></a>
				<a href = "#prikaz-slike"><img src = "slike/citat4.jpg" alt = "Slika 4" onclick = "funkcijaPrikaz('slike/citat4.jpg'); return false;"/></a>
				<a href = "#prikaz-slike"><img src = "slike/citat3.jpg" alt = "Slika 3" onclick = "funkcijaPrikaz('slike/citat3.jpg'); return false;"/></a>
				<a href = "#prikaz-slike"><img src = "slike/citat2.jpg" alt = "Slika 2" onclick = "funkcijaPrikaz('slike/citat2.jpg'); return false;"/></a>
				<a href = "#prikaz-slike"><img src = "slike/citat1.jpg" alt = "Slika 1" onclick = "funkcijaPrikaz('slike/citat1.jpg'); return false;"/></a>
			</div>
			<div id = "prikaz-slike" class = "galerija">
				<div class = "galerija-slika" id = "slika-galerija">
					<img id = "slika_u_galeriji" src = "slike/banner.jpg" alt = "slika"/>
				</div>
			</div>
			<script src = "js/galerija.js"></script>
		</div>
		<div class = "footer">
			<p>Copyright &copy; Selmir Hasanović (remorker7), 2016. godina</p>
		</div>
	</div>
</body>
</html>
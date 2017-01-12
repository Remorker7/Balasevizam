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
					<li><a href = "tekstoviPjesama.php">TEKSTOVI PJESAMA</a></li>
					<li><a href = "knjige.php" class = "aktivni">KNJIGE</a></li>
					<li><a href = "maliBalasevici.php">MALI BALAŠEVIĆI</a></li>
					<li><a href = "kontakt.php">KONTAKT</a></li>
				</ul>
			</nav>
		</div>
		<div id = "sadrzaj" class = "sadrzaj">
			<div class = "top-slike">
				<p>Đorđe Balašević - Knjige</p>
				<a href = "pdf/krm.pdf" download><img src = "slike/kao_rani_mraz.jpg" alt = "Slika 5" onclick = "funkcijaPrikaz('slike/kao_rani_mraz.jpg'); return false;"/></a>
				<a href = "pdf/joz.pdf" download><img src = "slike/jedan_od_onih_zivota.jpg" alt = "Slika 4" onclick = "funkcijaPrikaz('slike/jedan_od_onih_zivota.jpg'); return false;"/></a>
				<a href = "pdf/izid.pdf" download><img src = "slike/i_zivot_ide_dalje.jpg" alt = "Slika 3" onclick = "funkcijaPrikaz('slike/i_zivot_ide_dalje.jpg'); return false;"/></a>
				<a href = "pdf/tpr.pdf" download><img src = "slike/tri_posleratna_druga.jpg" alt = "Slika 2" onclick = "funkcijaPrikaz('slike/tri_posleratna_druga.jpg'); return false;"/></a>
				<a href = "pdf/ds.pdf" download><img src = "slike/dodir_svile.jpg" alt = "Slika 1" onclick = "funkcijaPrikaz('slike/dodir_svile.jpg'); return false;"/></a>
				<p>Klikom na sliku možete preuzeti željenu knjigu u pdf formatu.</p>
			</div>
		</div>
		<div class = "footer">
			<p>Copyright &copy; Selmir Hasanović (remorker7), 2016. godina</p>
		</div>
	</div>
</body>
</html>
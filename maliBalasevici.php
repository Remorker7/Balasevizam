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
					<li><a href = "knjige.php">KNJIGE</a></li>
					<li><a href = "maliBalasevici.php" class = "aktivni">MALI BALAŠEVIĆI</a></li>
					<li><a href = "kontakt.php">KONTAKT</a></li>
				</ul>
			</nav>
		</div>
		<div id = "sadrzaj" class = "sadrzaj">
			<div class = "postovi">
				<p><img src = "slike/msobic.jpg" alt = "Miladin Sobic"/>A zašto ne bit' običan, voljet' male stvari, zašto svako mora biti glavni? Šta to lijepo ima obraz uprljan sa flekom, i zašto sa tugom gledam za čovjekom?</p>
				<p><img src = "slike/nbh.jpg" alt = "Nura Bazdulj-Hubijar"/>Kaže da nikoga više nema. Morala bi znati da mene ima više nego iko na ovom prokletom svijetu. Zar je zamislivo živjeti a nju ne voljeti?</p>
			</div>
		</div>
		<div class = "footer">
			<p>Copyright &copy; Selmir Hasanović (remorker7), 2016. godina</p>
		</div>
	</div>
</body>
</html>
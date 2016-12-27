<?php
	session_start();
	if(!file_exists('korisnici/' . $_SESSION['username'] . '.xml')){
		header('Location: index.php');
		die;
	}
	$greskeFeedback = array();
	if(isset($_POST['email_slanje'])){
		/*
		$to = 'shasanovic2@etf.unsa.ba';
		$subject = 'Balaševizam - feedback (poslao: ' . $_POST['ime'] . ')';
		$message = $_POST['sadrzaj'];
		$headers = 'From: ' . $_POST['email-adresa'] . "\r\n" . 'Reply-To: selmir3@gmail.com' . "\r\n" . 'X-Mailer: PHP/' .  phpversion();
		mail($to, $subject, $message, $headers);
		*/
		$bezGreske3 = true;
		$ime = htmlEntities($_POST['ime'], ENT_QUOTES);
		$ime = preg_replace("#[^0-9a-zA-Z ščćžđŠČĆŽĐ]#i", "", $ime);
		$provjera = preg_replace("#[^0-9a-zA-ZščćžđŠČĆŽĐ]#i", "", $ime);
		if(strlen($provjera) < 2) {
			$greskeFeedback[] = "Ime mora sadržati barem 2 karaktera.";
			$bezGreske3 = false;
		}
		$email = htmlEntities($_POST['email-adresa'], ENT_QUOTES);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$greskeFeedback[] = "Neispravan format e-maila."; 
			$bezGreske3 = false;
		}
		$sadrzaj_emaila = htmlEntities($_POST['sadrzaj'], ENT_QUOTES);
		$sadrzaj_emaila = preg_replace("#[^0-9a-zA-Z ščćžđŠČĆŽĐ\.,?!-_()\n]#i", "", $sadrzaj_emaila);
		if(strlen($sadrzaj_emaila) < 11) {
			$greskeFeedback[] = "Sadržaj e-maila mora biti duži od 10 karaktera.";
			$bezGreske3 = false;
		}
		if($bezGreske3){
			$xml = new SimpleXMLElement('<?xml version = "1.0" encoding = "utf-8"?><feedback></feedback>');
			$xml->addChild('Ime', $ime);
			$xml->addChild('E-mail', $email);
			$xml->addChild('Sadržaj', $sadrzaj_emaila);
			$xml->asXML('feedback/' . $ime . '.xml');
			echo "<meta http-equiv = 'refresh' content = '0'>";
		}
	}
	$greskeOcjena = array();
	if(isset($_POST['ocjenjivanje'])){
		$bezGreske4 = true;
		$lajk = $_POST['lajk'];
		$korisna = $_POST['korisna'];
		$podstranica = "";
		foreach ($_POST['podstranica-izbor'] as $izbor){
			$podstranica = $izbor;
		}
		$ocjena = htmlEntities($_POST['ocjena'], ENT_QUOTES);
		if($ocjena != "1" && $ocjena != "2" && $ocjena != "3" && $ocjena != "4" && $ocjena != "5") {
			$greskeOcjena[] = "Pogrešna ocjena.";
			$bezGreske4 = false;
		}
		if($bezGreske4){
			$xml = new SimpleXMLElement('<?xml version = "1.0" encoding = "utf-8"?><ocjena></ocjena>');
			$xml->addChild('Lajk', $lajk);
			$xml->addChild('Korisna', $korisna);
			$xml->addChild('Podstranica', $podstranica);
			$xml->addChild('Ocjena', $ocjena);
			$xml->asXML('ocjene/' . 'ocjena_' . date("Y-m-d-H-i-s"). '.xml');
			echo "<meta http-equiv = 'refresh' content = '0'>";
		}
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
						<li><a href = "maliBalasevici.php">MALI BALAŠEVIĆI</a></li>
						<li><a href = "kontakt.php" class = "aktivni">KONTAKT</a></li>
				</ul>
			</nav>
		</div>
		<div id = "sadrzaj" class = "sadrzaj">
			<div class = "sadrzaj-kontakt">
				<figure class = "facebook">
					<img class = "logo" src = "slike/FacebookLogo.png" alt = "Facebook logo"/>
					<figcaption><a id = "facebook-link" href = "https://www.facebook.com/Remorker7" target = "_blank">Selmir Hasanović</a></figcaption>
				</figure>
				<figure class = "instagram">
					<img class = "logo" src = "slike/InstagramLogo.png" alt = "Instagram logo">
					<figcaption><a id = "instagram-link" href = "https://www.instagram.com/remorker7/" target = "_blank">Selmir Hasanović</a></figcaption>
				</figure>
				<figure class = "viber">
					<img class = "logo" src = "slike/ViberLogo.png" alt = "Viber logo"/>
					<figcaption><a id = "viber-link" href = "http://www.viber.com/en/" target = "_blank">062-122-577</a></figcaption>
				</figure>
			</div>
			<div class = "email">
				<form class = "ocjena-str" name = "ocjena-str" action = "" onsubmit = "return ValidirajFeedback()" method = "post">
					<p>Feedback</p>
					Vaše ime:<br>
					<input type = "text" name = "ime" class = "unos"><br>
					Vaša e-mail adresa:<br>
					<input type = "text" name = "email-adresa" class = "unos"><br>
					E-mail:<br>
					<textarea class = "unos" name = "sadrzaj" cols = "40" rows = "10"></textarea><br>
					<span id = "ime-greska" class = "provjera-greske"></span>
					<span id = "email-greska" class = "provjera-greske"></span>
					<span id = "sadrzaj-greska" class = "provjera-greske"></span><br>
					<input type = "submit" value = "Pošalji" name = "email_slanje">
					<input type = "reset" value = "Poništi">
				</form>
				<?php
					if(count($greskeFeedback) > 0){
						echo '<ul style = "color:white;">Greške pri pokušaju slanja feedbacka:';
						foreach($greskeFeedback as $g){
							echo '<li style = "color:red; list-style: none;">- ' . $g . '</li>';
						}
						echo '</ul>';
					}
				?>
				<script src = "js/validacija_feedback.js"></script>
			</div>
			<div class = "ocjena-stranice">
				<form class = "forma-e" name = "forma-ocjena" action = "" method = "post" onsubmit = "return ValidirajOcjenu()">
					<table class = "ocjena-str">
						<caption>Ocjena stranice</caption>
						<tr>
							<td>Da li Vam se sviđa dizajn stranice?</td>
							<td><input type = "radio" name = "lajk" value = "DA" checked = "checked"> DA
							<input type = "radio" name = "lajk" value = "NE"> NE</td>
						</tr>
						<tr>
							<td>Da li smatrate ovu stranicu korisnom i zanimljivom?</td>
							<td><input type = "radio" name = "korisna" value = "DA" checked = "checked"> DA
							<input type = "radio" name = "korisna" value = "NE"> NE</td>
						</tr>
						<tr>
							<td>Koja podstranica Vam se najviše svidjela?</td>
							<td><select class = "selekt" name = "podstranica-izbor[]"> <option value = "Početna">Početna</option> <option value = "Balašgram">Balašgram</option>
							<option value = "Tekstovi-pjesama">Tekstovi pjesama</option> <option value = "Knjige">Knjige</option> <option value = "Mali-Balaševići">Mali Balaševići</option> <option value = "Kontakt">Kontakt</option> </select></td>
						</tr>
						<tr>
							<td>Ocjenite stranicu (1-5): </td>
							<td><input type = "text" name = "ocjena" class = "unos" id = "polje-ocjena"></td>
						</tr>
						<tr>
							<td></td>
							<td class = "desno"><input type = "submit" name = "ocjenjivanje" value = "Pošalji"></td>
						</tr>
						<tr>
							<td></td>
							<td><span id = "ocjena-greska" class = "provjera-greske"></span></td>
						</tr>
					</table>
				</form>
				<?php
					if(count($greskeOcjena) > 0){
						echo '<ul style = "color:white;">Greške pri pokušaju slanja ocjene stranice:';
						foreach($greskeOcjena as $g){
							echo '<li style = "color:red; list-style: none;">- ' . $g . '</li>';
						}
						echo '</ul>';
					}
				?>
				<!--<script src = "js/validacija_ocjena_str.js"></script>-->
			</div>
		</div>
		<div class = "footer">
			<p>Copyright &copy; Selmir Hasanović (remorker7), 2016. godina</p>
		</div>
	</div>
</body>
</html>
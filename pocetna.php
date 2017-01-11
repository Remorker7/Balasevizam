<?php
	function barbarskiNacin($tekst){
		$tekst = str_replace("š", "%9a", $tekst);
		$tekst = str_replace("č", "c", $tekst);
		$tekst = str_replace("ć", "c", $tekst);
		$tekst = str_replace("ž", "%9e", $tekst);
		$tekst = str_replace("đ", "dj", $tekst);
		$tekst = str_replace("Š", "%8a", $tekst);
		$tekst = str_replace("Č", "C", $tekst);
		$tekst = str_replace("Ć", "C", $tekst);
		$tekst = str_replace("Ž", "%8e", $tekst);
		$tekst = str_replace("Đ", "%d0", $tekst);
		return $tekst;
	}
	if(isset($_POST['pdfDownload'])){
		require("pdf/fpdf/fpdf.php");
		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont("Arial", "B", 14);
		$tekst = "Balaševizam - izvještaj (pjesme i registrovani korisnici)";
		$tekst = barbarskiNacin($tekst);
		$tekst = urldecode($tekst);
		$pdf->Cell(50, 10, $tekst, 0, 1);
		$pdf->Cell(100, 10, "", 0, 1);
		$pdf->SetFont("Arial", "B", 12);
		$pdf->Cell(50, 10, "Najbolje pjesme ovog mjeseca su: ", 0, 1);
		$pdf->SetFont("Arial", "", 12);
		
		$veza = new PDO("mysql:dbname=balasevizam; host=localhost; charset=utf8", "remorker7", "balasevizam7");
		$upit = 'SELECT * FROM najbolje';
		foreach($veza->query($upit) as $red) {
			$pdf->Cell(30, 10, "ID", 1, 0);
			$pdf->Cell(150, 10, $red['id'], 1, 1);
			$tekst = $red['izvodjac'];
			$tekst = barbarskiNacin($tekst);
			$tekst = urldecode($tekst);
			$pdf->Cell(30, 10, "Izvodjac", 1, 0);
			$pdf->Cell(150, 10, $tekst, 1, 1);
			$tekst = $red['pjesma'];
			$tekst = barbarskiNacin($tekst);
			$tekst = urldecode($tekst);
			$pdf->Cell(30, 10, "Pjesma", 1, 0);
			$pdf->Cell(150, 10, $tekst, 1, 1);
			$pdf->Cell(50, 10, "", 0, 1);
		}
		$pdf->Cell(100, 10, "", 0, 1);
		$pdf->SetFont("Arial", "B", 12);
		$tekst = "Predložene pjesme su: ";
		$tekst = barbarskiNacin($tekst);
		$tekst = urldecode($tekst);
		$pdf->Cell(50, 10, $tekst, 0, 1);
		$pdf->SetFont("Arial", "", 12);
		
		$veza = new PDO("mysql:dbname=balasevizam; host=localhost; charset=utf8", "remorker7", "balasevizam7");
		$upit = 'SELECT * FROM pjesme';
		foreach($veza->query($upit) as $red) {
			$tekst = $red['izvodjac'];
			$tekst = barbarskiNacin($tekst);
			$tekst = urldecode($tekst);
			$pdf->Cell(30, 10, "Izvodjac", 1, 0);
			$pdf->Cell(150, 10, $tekst, 1, 1);
			$tekst = $red['pjesma'];
			$tekst = barbarskiNacin($tekst);
			$tekst = urldecode($tekst);
			$pdf->Cell(30, 10, "Pjesma", 1, 0);
			$pdf->Cell(150, 10, $tekst, 1, 1);
			$tekst = $red['mjesec'];
			$tekst = barbarskiNacin($tekst);
			$tekst = urldecode($tekst);
			$pdf->Cell(30, 10, "Mjesec", 1, 0);
			$pdf->Cell(150, 10, $tekst, 1, 1);
			$pdf->Cell(50, 10, "", 0, 1);
		}
		$pdf->Cell(100, 10, "", 0, 1);
		$pdf->SetFont("Arial", "B", 12);
		$pdf->Cell(50, 10, "Registrovani korisnici su: ", 0, 1);
		$pdf->SetFont("Arial", "", 12);
		
		$veza = new PDO("mysql:dbname=balasevizam; host=localhost; charset=utf8", "remorker7", "balasevizam7");
		$upit = 'SELECT * FROM korisnici';
		foreach($veza->query($upit) as $red) {
			$tekst = $red['username'];
			$tekst = barbarskiNacin($tekst);
			$tekst = urldecode($tekst);
			$pdf->Multicell(0, 2, "- " . $tekst . "\n\n\n");
		}
		$pdf->output('D','balasevizam_izvjestaj.pdf');
	}
	
	session_start();
	$server = "localhost";
	$korisnik = "remorker7";
	$pass = "balasevizam7";
	$baza = "balasevizam";$veza = mysqli_connect($server, $korisnik, $pass, $baza);
	mysqli_set_charset($veza, 'utf8');
	if (!$veza) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$koJe = $_SESSION['username'];
	$upit = "SELECT * FROM korisnici where username = '$koJe'";
	$rezultat = $veza->query($upit);
	if ($rezultat->num_rows < 1){
		header('Location: index.php');
		die;
	}
	if(isset($_POST['XMLtoDB'])){
		$fajlovi = glob('korisnici/*.xml');
		foreach($fajlovi as $fajl) {
			$xml = new SimpleXMLElement($fajl, 0, true);
			$username = $xml->username;
			$password = $xml->password;
			$email = $xml->email;
			
			$provjeraDuplih = "SELECT * FROM korisnici where username = '$username'";
			$rezultat = $veza->query($provjeraDuplih);
			if ($rezultat->num_rows < 1){
				$upit = "INSERT INTO korisnici (username, password, email)
				VALUES ('$username', '$password', '$email')";
				if (mysqli_query($veza, $upit)) {
					echo "";
				}
				else {
					echo "Greška: " . $upit . "<br>" . mysqli_error($veza);
				}
			}
		}
		
		$fajlovi = glob('pjesme/*.xml');
		foreach($fajlovi as $fajl) {
			$xml = new SimpleXMLElement($fajl, 0, true);
			$izvodjac = $xml->izvodjac;
			$pjesma = $xml->pjesma;
			$mjesec = $xml->mjesec;
			$provjeraDuplih = "SELECT * FROM pjesme where izvodjac = '$izvodjac' and pjesma = '$pjesma' and mjesec = '$mjesec'";
			$rezultat = $veza->query($provjeraDuplih);
			if ($rezultat->num_rows < 1){
				$upit = "INSERT INTO pjesme (id, izvodjac, pjesma, mjesec)
				VALUES (DEFAULT, '$izvodjac', '$pjesma', '$mjesec')";
				if (mysqli_query($veza, $upit)) {
					echo "";
				}
				else {
					echo "Greška: " . $upit . "<br>" . mysqli_error($veza);
				}
			}
		}
		
		$fajlovi = glob('pjesme-najbolje/*.xml');
		foreach($fajlovi as $fajl) {
			$xml = new SimpleXMLElement($fajl, 0, true);
			$ID = $xml->ID;
			$izvodjac = $xml->izvodjac;
			$pjesma = $xml->pjesma;
			$korisnik = 'N/A';
			$traziKorisnika = "SELECT * FROM korisnici where username = 'admin'";
			$izvrsi = $veza->query($traziKorisnika);
			if($izvrsi->num_rows > 0) {
				$rez = mysqli_fetch_row($izvrsi);
				$korisnik = $rez[0];
			}
			$pjesmafk = -1;
			$traziFK = "SELECT * FROM pjesme where izvodjac = '$izvodjac' and pjesma = '$pjesma'";
			$izvrsi = $veza->query($traziFK);
			if($izvrsi->num_rows > 0) {
				$rez = mysqli_fetch_row($izvrsi);
				$pjesmafk = $rez[0];
			}
			$provjeraDuplih = "SELECT * FROM pjesme where id = '$ID'";
			$rezultat = $veza->query($provjeraDuplih);
			if ($rezultat->num_rows < 1){
				if($pjesmafk != -1) {
					$upit = "INSERT INTO najbolje (id, izvodjac, pjesma, korisnik, pjesmafk)
					VALUES ('$ID', '$izvodjac', '$pjesma', '$korisnik', '$pjesmafk')";
				}
				else{
					$upit = "INSERT INTO najbolje (id, izvodjac, pjesma, korisnik, pjesmafk)
					VALUES ('$ID', '$izvodjac', '$pjesma', '$korisnik', DEFAULT)";
				} 
				if (mysqli_query($veza, $upit)) {
					echo "";
				}
				else {
					echo "Greška: " . $upit . "<br>" . mysqli_error($veza);
				}
			}
		}
	
		header('Location: pocetna.php');
	}
	
	$greske_izmjena = array();
	$greske_dodavanje = array();
	$greske_slanje = array();
	$bezGreske = true;
	if(isset($_POST['slanje'])){
		$izvodjac = htmlEntities($_POST['izvodjac'], ENT_QUOTES);
		$izvodjac = preg_replace("#[^0-9a-zA-Z ščćžđŠČĆŽĐ]#i", "", $izvodjac);
		$provjera = preg_replace("#[^0-9a-zA-ZščćžđŠČĆŽĐ]#i", "", $izvodjac);
		if(strlen($provjera) < 2) {
			$greske_slanje[] = "Naziv izvođača mora sadržati barem dva karaktera.";
			$bezGreske = false;
		}
		$pjesma = htmlEntities($_POST['pjesma'], ENT_QUOTES);
		$pjesma = preg_replace("#[^0-9a-zA-Z ščćžđŠČĆŽĐ]#i", "", $pjesma);
		$provjera = preg_replace("#[^0-9a-zA-ZščćžđŠČĆŽĐ]#i", "", $pjesma);
		if(strlen($provjera) < 2) {
			$greske_slanje[] = "Naziv pjesme mora sadržati barem dva karaktera.";
			$bezGreske = false;
		}
		$mjesec = htmlEntities($_POST['mjesec'], ENT_QUOTES);
		$mjesec = preg_replace("#[^0-9a-zA-Z ščćžđŠČĆŽĐ]#i", "", $mjesec);
		$provjera = preg_replace("#[^0-9a-zA-ZščćžđŠČĆŽĐ]#i", "", $mjesec);
		if(strlen($provjera) < 2) {
			$greske_slanje[] = "Naziv mjeseca mora sadržati barem dva karaktera.";
			$bezGreske = false;
		}
		if($bezGreske){
			$upit = "INSERT INTO pjesme (id, izvodjac, pjesma, mjesec)
			VALUES (DEFAULT, '$izvodjac', '$pjesma', '$mjesec')";
			if (mysqli_query($veza, $upit)) {
				echo "";
			}
			else {
				echo "Greška: " . $upit . "<br>" . mysqli_error($veza);
			}
			header('Location: pocetna.php');
			die;
		}
		unset($_POST['slanje']);
	}
	if(isset($_POST['csvDownload'])){
		ob_end_clean();
		header('Content-Type: text/csv; charset = utf-8');
		header('Content-Disposition: attachment; filename = pjesme.csv');
		$fp = fopen('php://output', 'w');
		$veza = new PDO("mysql:dbname=balasevizam; host=localhost; charset=utf8", "remorker7", "balasevizam7");
		$upit = 'SELECT * FROM pjesme';
		foreach($veza->query($upit) as $red) {
			$red = array($red['izvodjac'], $red['pjesma'], $red['mjesec']);
			fputcsv($fp, $red, ',');
		}
		exit();
	}
	
	$ispis = "";
	if(isset($_POST['pretraga'])){
		$tekst = htmlEntities($_POST['pretrazivanje'], ENT_QUOTES);
		$tekst = preg_replace("#[^0-9a-zA-Z ščćžđŠČĆŽĐ]#i", "", $tekst);
		if(strlen($tekst) > 0) {
			$veza = new PDO("mysql:dbname=balasevizam; host=localhost; charset=utf8", "remorker7", "balasevizam7");
			$upit = 'SELECT * FROM najbolje';
			$rezultati_pretrage = array();
			foreach($veza->query($upit) as $red) {
				if(stristr($red['izvodjac'], $tekst)){
					$rezultati_pretrage[] = $red['izvodjac'];
				}
				if (stristr($red['pjesma'], $tekst)){
					$rezultati_pretrage[] = $red['pjesma'];
				}
			}
			$broj_rezultata = count($rezultati_pretrage);
			if($broj_rezultata == 0){
				$ispis = "Nije pronađen niti jedan rezultat za unešeni tekst pretrage(" . htmlspecialchars($tekst, ENT_QUOTES, 'UTF-8') . ").";
			}
			else {
				$ispis .= '<div>Za unešeni tekst(' . htmlspecialchars($tekst, ENT_QUOTES, 'UTF-8') . ') pronađeni su sljedeći rezultati:</div>';
				foreach($rezultati_pretrage as $rez){
					$ispis .= '<div>- ' . htmlspecialchars($rez, ENT_QUOTES, 'UTF-8') . '</div>';
				}
			}
		}
		else {
			$ispis = "Niste unijeli ispravan tekst za pretragu. Pokušajte ponovo.";
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
					<li><a href = "pocetna.php" class = "aktivni">POČETNA</a></li>
					<li><a href = "balasgram.php">BALAŠGRAM</a></li>
					<li><a href = "tekstoviPjesama.php">TEKSTOVI PJESAMA</a></li>
					<li><a href = "knjige.php">KNJIGE</a></li>
					<li><a href = "maliBalasevici.php">MALI BALAŠEVIĆI</a></li>
					<li><a href = "kontakt.php">KONTAKT</a></li>
				</ul>
			</nav>
		</div>
		<div id = "sadrzaj" class = "sadrzaj">
			<div class = "top-slike">
				<p class = "citati">TOP 3 citata ovog mjeseca</p>
				<a href = "#prikaz-slike"><img src = "slike/citat1.jpg" alt = "Slika 1" onclick = "funkcijaPrikaz('slike/citat1.jpg'); return false;"/></a>
				<a href = "#prikaz-slike"><img src = "slike/citat6.jpg" alt = "Slika 6" onclick = "funkcijaPrikaz('slike/citat6.jpg'); return false;"/></a>
				<a href = "#prikaz-slike"><img src = "slike/citat3.jpg" alt = "Slika 3" onclick = "funkcijaPrikaz('slike/citat3.jpg'); return false;"/></a>
			</div>
			<div class = "top-pjesme">
				<form method = "post" name = "forma-najbolje-pjesme" action = "">
					<table class = "playlista" id = "pjesme_najbolje">
						<caption>Najbolje pjesme mjeseca</caption>
						<tr>
							<th>ID</th>
							<th>IZVOĐAČ</th>
							<th>PJESMA</th>
						</tr>
						<?php
							$veza = new PDO("mysql:dbname=balasevizam; host=localhost; charset=utf8", "remorker7", "balasevizam7");
							$upit = 'SELECT * FROM najbolje';
							foreach($veza->query($upit) as $red) {
								echo '<tr>';
								echo '<td>'. htmlspecialchars($red['id'], ENT_QUOTES, 'UTF-8') . '</td>';
								echo '<td>'. htmlspecialchars($red['izvodjac'], ENT_QUOTES, 'UTF-8') . '</td>';
								echo '<td>'. htmlspecialchars($red['pjesma'], ENT_QUOTES, 'UTF-8') . '</td>';
								if(stristr($_SESSION['username'], "admin")){
									echo '<td><form action = "" method = "POST"><input type = "hidden" name = "xkaodelete" value = "' . $red['id']. '"/><input type = "submit" name = "izbrisi" value = "X" style = "width: 20px;"/></form></td>';
								}
								echo '</tr>';
							}
							if(stristr($_SESSION['username'], "admin")){
								echo '<tr>';
								echo '<td><input type = "text" style = "background-color: black; color: white;" name = "IDdodaj" class = "unos" placeholder = "unikatni ID pjesme"></td>';
								echo '<td><input type = "text" style = "background-color: black; color: white;" name = "izvodjacdodaj" class = "unos" placeholder = "izvođač"></td>';
								echo '<td><input type = "text" style = "background-color: black; color: white;" name = "pjesmadodaj" class = "unos" placeholder = "nova pjesma"></td>';
								echo '<td><input type = "submit" name = "dodaj" class = "unos" value = "+" style = "width: 20px;"';
								echo '</tr>';
								
								echo '<tr>';
								echo '<td><input type = "text" style = "background-color: black; color: white;" name = "izmjena_ID" class = "unos" placeholder = "unesite ID pjesme koju želite izmijeniti"></td>';
								echo '<td><input type = "text" style = "background-color: black; color: white;" name = "novi_izvodjac" class = "unos" placeholder = "novi naziv izvođača"></td>';
								echo '<td><input type = "text" style = "background-color: black; color: white;" name = "nova_pjesma" class = "unos" placeholder = "novi naziv pjesme"></td>';
								echo '<td><input type = "submit" name = "napravi_izmjene" class = "unos" value = "E" style = "width: 20px;"';
								echo '</tr>';
							}
							
							if(isset($_POST['napravi_izmjene'])){
								$veza = new PDO("mysql:dbname=balasevizam; host=localhost; charset=utf8", "remorker7", "balasevizam7");
								$upit = 'SELECT * FROM najbolje';
								$bul = true;
								$bezGreske1 = true;
								foreach($veza->query($upit) as $red) {
									if($red['id'] == $_POST['izmjena_ID']){
										$ID_d = $_POST['izmjena_ID'];
										$izvodjac_d = htmlEntities($_POST['novi_izvodjac'], ENT_QUOTES);
										$izvodjac_d = preg_replace("#[^0-9a-zA-Z ščćžđŠČĆŽĐ]#i", "", $izvodjac_d);
										$provjera = preg_replace("#[^0-9a-zA-ZščćžđŠČĆŽĐ]#i", "", $izvodjac_d);
										if(strlen($provjera) < 2) {
											$greske_izmjena[] = "Naziv izvođača mora sadržati barem dva karaktera.";
											$bezGreske1 = false;
										}
										$pjesma_d = htmlEntities($_POST['nova_pjesma'], ENT_QUOTES);
										$pjesma_d = preg_replace("#[^0-9a-zA-Z ščćžđŠČĆŽĐ]#i", "", $pjesma_d);
										$provjera = preg_replace("#[^0-9a-zA-ZščćžđŠČĆŽĐ]#i", "", $pjesma_d);
										if(strlen($provjera) < 2) {
											$greske_izmjena[] = "Naziv pjesme mora sadržati barem dva karaktera.";
											$bezGreske1 = false;
										}
										$bul = false;
										if($bezGreske1){
											$upit1 = $veza->prepare("UPDATE najbolje SET izvodjac=?, pjesma=? WHERE id=?");
											$upit1->bindValue(1, $izvodjac_d, PDO::PARAM_STR);
											$upit1->bindValue(2, $pjesma_d, PDO::PARAM_STR);
											$upit1->bindValue(3, $ID_d, PDO::PARAM_INT);
											$upit1->execute();
											echo "<meta http-equiv = 'refresh' content = '0'>";
										}
									}
								}
								if($bul){
									$greske_izmjena[] = "Ne postoji pjesma sa navedenim ID-om.";
								}
							}
							
							if(isset($_POST['dodaj'])){
								$veza = new PDO("mysql:dbname=balasevizam; host=localhost; charset=utf8", "remorker7", "balasevizam7");
								$upit = 'SELECT * FROM najbolje';
								$bul = true;
								foreach($veza->query($upit) as $red) {
									if($red['id'] == $_POST['IDdodaj']){
										$bul = false;
									}
								}
								$bezGreske2 = true;
								if($bul){
									$ID_d = htmlEntities($_POST['IDdodaj'], ENT_QUOTES);
									$ID_d = preg_replace("#[^0-9a-zA-Z ščćžđŠČĆŽĐ]#i", "", $ID_d);
									$provjera = preg_replace("#[^a-z A-ZščćžđŠČĆŽĐ]#i", "", $ID_d);
									if(strlen($provjera) > 0) {
										$greske_dodavanje[] = "Neispravan ID.";
										$bezGreske2 = false;
									}
									$izvodjac_d = htmlEntities($_POST['izvodjacdodaj'], ENT_QUOTES);
									$izvodjac_d = preg_replace("#[^0-9a-zA-Z ščćžđŠČĆŽĐ]#i", "", $izvodjac_d);
									$provjera = preg_replace("#[^0-9a-zA-ZščćžđŠČĆŽĐ]#i", "", $izvodjac_d);
									if(strlen($provjera) < 2) {
										$greske_dodavanje[] = "Naziv izvođača mora sadržati barem dva karaktera.";
										$bezGreske2 = false;
									}
									$pjesma_d = htmlEntities($_POST['pjesmadodaj'], ENT_QUOTES);
									$pjesma_d = preg_replace("#[^0-9a-zA-Z ščćžđŠČĆŽĐ]#i", "", $pjesma_d);
									$provjera = preg_replace("#[^0-9a-zA-ZščćžđŠČĆŽĐ]#i", "", $pjesma_d);
									if(strlen($provjera) < 2) {
										$greske_dodavanje[] = "Naziv pjesme mora sadržati barem dva karaktera.";
										$bezGreske2 = false;
									}
									if($bezGreske2){
										$traziKorisnika = "SELECT * FROM korisnici where username = 'admin'";
										$server = "localhost";
										$korisnik = "remorker7";
										$pass = "balasevizam7";
										$baza = "balasevizam";$veza = mysqli_connect($server, $korisnik, $pass, $baza);
										mysqli_set_charset($veza, 'utf8');
										if (!$veza) {
											die("Connection failed: " . mysqli_connect_error());
										}
										$korisnik = 'N/A';
										$izvrsi = $veza->query($traziKorisnika);
										if($izvrsi->num_rows > 0) {
											$rez = mysqli_fetch_row($izvrsi);
											$korisnik = $rez[0];
										}
										$pjesmafk = -1;
										$traziFK = "SELECT * FROM pjesme where izvodjac = '$izvodjac_d' and pjesma = '$pjesma_d'";
										$izvrsi = $veza->query($traziFK);
										if($izvrsi->num_rows > 0) {
											$rez = mysqli_fetch_row($izvrsi);
											$pjesmafk = $rez[0];
										}
										
										if($pjesmafk != -1) {
											$upit = "INSERT INTO najbolje (id, izvodjac, pjesma, korisnik, pjesmafk)
											VALUES ('$ID_d', '$izvodjac_d', '$pjesma_d', '$korisnik', '$pjesmafk')";
										}
										else{
											$upit = "INSERT INTO najbolje (id, izvodjac, pjesma, korisnik, pjesmafk)
											VALUES ('$ID_d', '$izvodjac_d', '$pjesma_d', '$korisnik', DEFAULT)";
										} 
										if (mysqli_query($veza, $upit)) {
											echo "";
										}
										else {
											echo "Greška: " . $upit . "<br>" . mysqli_error($veza);
										}
										echo "<meta http-equiv = 'refresh' content = '0'>";
									}
								}
								else {
									$greske_dodavanje[] = "Već postoji pjesma sa unešenim ID-om. ID mora biti jedinstven.";
								}
							}
					
							if(isset($_POST['izbrisi'])){
								$ID_i = $_POST['xkaodelete'];
								$veza = new PDO("mysql:dbname=balasevizam; host=localhost; charset=utf8", "remorker7", "balasevizam7");
								$upit = $veza->prepare("DELETE FROM najbolje WHERE id=?");
								$upit->bindValue(1, $ID_i, PDO::PARAM_STR);
								$upit->execute();
								echo "<meta http-equiv = 'refresh' content = '0'>";
							}
						?>
					</table>
					<?php
						if(count($greske_izmjena) > 0){
							echo '<ul style = "color:white;">Greške pri pokušaju izmjene podataka:';
							foreach($greske_izmjena as $g){
								echo '<li style = "color:red; list-style: none;">- ' . $g . '</li>';
							}
							echo '</ul>';
						}
						if(count($greske_dodavanje) > 0){
							echo '<ul style = "color:white;">Greške pri pokušaju dodavanja pjesme:';
							foreach($greske_dodavanje as $g){
								echo '<li style = "color:red; list-style: none;">- ' . $g . '</li>';
							}
							echo '</ul>';
						}
					?>
			</div>
			<div class = "pjesma">
				<form method = "post" class = "forma-pocetna" name = "forma-pocetna" action = "" onsubmit = "return ValidirajPocetna()">
					<table class = "najbolja-pjesma">
						<caption>Predložite pjesmu</caption>
						<tr>
							<td>Izvođač: </td>
							<td><input type = "text" name = "izvodjac" class = "unos"></td>
						</tr>
						<tr>
							<td>Pjesma: </td>
							<td><input type = "text" name = "pjesma" class = "unos"></td>
						</tr>
						<tr>
							<td>Mjesec: </td>
							<td><input type = "text" name = "mjesec" class = "unos"></td>
						</tr>
						<tr>
							<td></td>
							<td class = "desno"><input name = "slanje" type = "submit" value = "Pošalji"></td>
						</tr>
						<tr>
							<td></td>
							<td>
								<?php
									if(count($greske_slanje) > 0){
										echo '<ul>';
										foreach($greske_slanje as $g){
											echo '<li style = "color:red; list-style: none;">- ' . $g . '</li>';
										}
										echo '</ul>';
									}
								?>
							</td>
						</tr>
					</table>
					<script src = "js/validacija_pocetna.js"></script>
				</form>
				<form method = "post" class = "forma-pocetna" name = "forma-prebacivanje" action = "">
					<?php
						if(stristr($_SESSION['username'], "admin")){
							echo '<p class = "citati"><input name = "XMLtoDB" type = "submit" value = "Prebaci podatke iz XML-a u bazu podataka"></p>';
						}
					?>
				</form>
				<form method = "post" class = "forma-pocetna" name = "forma-preuzimanje" action = "">
					<?php
						if(stristr($_SESSION['username'], "admin")){
							echo '<p class = "citati"><input name = "csvDownload" type = "submit" value = "Preuzmite predložene pjesme (csv)"></p>';
						}
					?>
				</form>
				<form method = "post" class = "forma-pocetna" name = "forma-preuzimanje_pdf" action = "">
					<p class = "citati"><input name = "pdfDownload" type = "submit" value = "Preuzmite izvještaj (pdf)"></p>
				</form>
				<div>
					<form method = "post" class = "forma-pocetna" name = "forma-pretrazivanje" action = "">
						<table class = "pretraga_xml">
							<caption>Pretraga pjesama i izvođača</caption>
							<tr class = "red_pretraga">
								<td><input type = "text" style = "background-color: black; color: white;" name = "pretrazivanje" class = "unos" placeholder = "unesite tekst za pretragu" onkeyup = "prikaziDoDeset(this.value)"></td>
								<td><input name = "pretraga" type = "submit" value = "pretraži"></td>
							</tr>
							<tr class = "red_pretraga">
								<td><div class = "pjesma" id = "instant_pretraga"></div></td>
								<td></td>
							</tr>
						</table>
					</form>
					<script src = "js/instantPretrazivanje.js"></script>
				</div>
			</div>
			<div class = "pjesma" id = "prikaz_div"></div>
			<script type = "text/javascript">
				function ispisiRezultate(tekst){
					document.getElementById("prikaz_div").innerHTML = tekst;
				}
			</script>
			<?php
				echo "<script> ispisiRezultate('$ispis'); </script>";
			?>
			<div id = "prikaz-slike" class = "galerija">
				<div class = "galerija-slika" id = "slika-galerija">
					<img id = "slika_u_galeriji" src = "slike/banner.jpg" alt = "slika"/>
				</div>
			</div>
		</div>
		<script src = "js/galerija.js"></script>
		<div class = "footer">
			<p>Copyright &copy; Selmir Hasanović (remorker7), 2016. godina</p>
		</div>
	</div>
</body>
</html>
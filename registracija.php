<?php
	echo '<span style="color:#AFA;"></span>';
	$greske = array();
	if(isset($_POST['register'])){
		$username = htmlEntities($_POST['username'], ENT_QUOTES);
		$username = preg_replace('/[^A-Za-z0-9 ščćžđŠČĆŽĐ]/', '', $username);
		$email = htmlEntities($_POST['email'], ENT_QUOTES);
		$password = htmlEntities($_POST['password'], ENT_QUOTES);
		$c_password = htmlEntities($_POST['c_password'], ENT_QUOTES);
		$server = "localhost";
		$korisnik = "remorker7";
		$pass = "balasevizam7";
		$baza = "balasevizam";
		$veza = mysqli_connect($server, $korisnik, $pass, $baza);
		mysqli_set_charset($veza, 'utf8');
		if (!$veza) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$upit = "SELECT * FROM korisnici where username = '$username'";
		$rezultat = $veza->query($upit);
		if ($rezultat->num_rows > 0){
			$greske[] = 'Username već postoji';
		}
		if($username == ''){ $greske[] = 'Niste unijeli username'; }
		if($email == ''){ $greske[] = 'Niste unijeli email'; }
		if($password == '' || $c_password == ''){ $greske[] = 'Niste unijeli password'; }
		if($password != $c_password){ $greske[] = 'Passwordi se ne poklapaju'; }
		if(strlen($password) < 5){ $greske[] = 'Password mora sadržati najmanje 5 karaktera'; }
		if(strlen($username) < 3){ $greske[] = 'Username mora sadržati najmanje 3 karaktera'; }
		if (!preg_match("/^[a-zA-Z0-9 ščćžđŠČĆŽĐ]*$/", $password)) { $greske[] = 'Password može sadržati samo slova i brojeve'; }
		if (!preg_match("/^[a-zA-Z0-9 ščćžđŠČĆŽĐ]*$/", $username)) { $greske[] = 'Username može sadržati samo slova i brojeve'; }
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { $greske[] = "Neispravan format e-maila"; }
		if(count($greske) == 0){
			$veza = new PDO("mysql:dbname=balasevizam; host=localhost; charset=utf8", "remorker7", "balasevizam7");
			$upit = "INSERT INTO korisnici (username, password, email)
			VALUES ('$username', 'md5($password)', '$email')";
			if (mysqli_query($veza, $upit)) {
				echo "Upit uspješno izvršen!";
			}
			else {
				echo "Greška: " . $upit . "<br>" . mysqli_error($veza);
			}
			header('Location: index.php');
			die;
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
		<div class = "banner">
			<img src = "slike/banner.jpg" alt = "Đorđe Balašević"/>
		</div>
		<div class = "login-page">
		  <div class = "form">
			<div id = "registracija-div">
				<form method = "post" class = "register-form" action = "">
					<input type = "text" name = "username" placeholder = "username"/>
					<input type = "password" name = "password" placeholder = "password"/>
					<input type = "password" name = "c_password" placeholder = "potvrdite password"/>
					<input type = "text" name = "email" placeholder = "email"/>
					<?php
						if(count($greske) > 0){
							echo '<ul style = "color:white;">Greške pri pokušaju registracije:';
							foreach($greske as $g){
								echo '<li style = "color:red; list-style: none;">- ' . $g . '</li>';
							}
							echo '</ul>';
						}
					?>
					<input type = "submit" name = "register" value = "Kreiraj"/>
					<p class = "message">Već ste registrovani? <a href = "index.php">Ulogujte se</a></p>
				</form>
			</div>
		  </div>
		</div>
		<div class = "footer">
			<p>Copyright &copy; Selmir Hasanović (remorker7), 2016. godina</p>
		</div>
	</div>
</body>
</html>
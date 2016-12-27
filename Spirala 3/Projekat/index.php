<?php
	$greska = false;
	if(isset($_POST['login'])){
		$username = htmlEntities($_POST['username'], ENT_QUOTES);
		$username = preg_replace('/[^A-Za-z0-9 ščćžđŠČĆŽĐ]/', '', $username);
		$password = md5($_POST['password']);
		if(file_exists('korisnici/' . $username . '.xml')){
			$xml = new SimpleXMLElement('korisnici/' . $username . '.xml', 0, true);
			if($password == $xml->password){
				session_start();
				$_SESSION['username'] = $username;
				header('Location: pocetna.php');
				die;
			}
		}
		$greska = true;
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
			<div id = "login-div">
				<form method = "post" class = "login-form" action = "">
					<input type = "text" name = "username" placeholder = "username"/>
					<input type = "password" name = "password" placeholder = "password"/>
					<?php
						if($greska){
							echo '<span style = "color:red;">Pogrešan username ili password</span>';
							$greska = false;
						}
					?>
					<input type = "submit" name = "login" value = "Login"/>
					<p class = "message">Niste registrovani? <a href = "registracija.php">Kreirajte novi račun</a></p>
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
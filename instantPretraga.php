<?php
	$tekst = $_GET["q"];
	$veza = new PDO('mysql:host=' . getenv('MYSQL_SERVICE_HOST') . ';port=3306;dbname=balasevizam', 'remorker7', 'balasevizam7');
	$veza->exec("set names utf8");
	$upit = 'SELECT * FROM najbolje';
	if (strlen($tekst) > 0) {
		$ispis = "";
		$doDeset = 0;
		foreach($veza->query($upit) as $red) {
			if(stristr($red['izvodjac'], $tekst)){
				if ($ispis == "") {
					$ispis = $red['izvodjac'];
				}
				else {
				  $ispis = $ispis . "<br/>" . $red['izvodjac'];
				}
				$doDeset++;
			}
			if($doDeset < 10 && stristr($red['pjesma'], $tekst)){
				if ($ispis == "") {
					$ispis = $red['pjesma'];
				}
				else {
				  $ispis = $ispis . "<br/>" . $red['pjesma'];
				}
				$doDeset++;
			}
			if($doDeset > 9){
				break;
			}
		}
	}
	if ($ispis == "") {
	  $odgovor = "nema rezultata";
	}
	else {
	  $odgovor = $ispis;
	}
	echo $odgovor;
?>
<?php
	$tekst = $_GET["q"];
	$veza = new PDO("mysql:dbname=balasevizam; host=localhost; charset=utf8", "remorker7", "balasevizam7");
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
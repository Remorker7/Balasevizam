<?php
	$tekst = $_GET["q"];
	$fajlovi = glob('pjesme-najbolje/*.xml');
	if (strlen($tekst) > 0) {
		$ispis = "";
		$doDeset = 0;
		foreach($fajlovi as $fajl) {
			$xml = new SimpleXMLElement($fajl, 0, true);
			if(stristr($xml->izvodjac, $tekst)){
				if ($ispis == "") {
					$ispis = $xml->izvodjac;
				}
				else {
				  $ispis = $ispis . "<br/>" . $xml->izvodjac;
				}
				$doDeset++;
			}
			if($doDeset < 10 && stristr($xml->pjesma, $tekst)){
				if ($ispis == "") {
					$ispis = $xml->pjesma;
				}
				else {
				  $ispis = $ispis . "<br/>" . $xml->pjesma;
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
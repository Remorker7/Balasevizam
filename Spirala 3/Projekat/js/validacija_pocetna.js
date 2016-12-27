var izvodjac = document.forms["forma-pocetna"]["izvodjac"];
var pjesma = document.forms["forma-pocetna"]["pjesma"];
var mjesec = document.forms["forma-pocetna"]["mjesec"];

var izvodjac_greska = document.getElementById("izvodjac-greska");
var pjesma_greska = document.getElementById("pjesma-greska");
var mjesec_greska = document.getElementById("mjesec-greska");

izvodjac.addEventListener("blur", verifikacijaIzvodjaca, true);
pjesma.addEventListener("blur", verifikacijaPjesme, true);
mjesec.addEventListener("blur", verifikacijaMjeseca, true);

function ValidirajPocetna() {
	if(izvodjac.value === "") {
		izvodjac.style.border = "1px solid red";
		pjesma.style.border = "1px solid black";
		mjesec.style.border = "1px solid black";
		izvodjac_greska.textContent = "Naziv izvodjaca je obavezan";
		pjesma_greska.textContent = "";
		mjesec_greska.textContent = "";
		izvodjac.focus();
		return false;
	}
	else if(pjesma.value === "") {
		izvodjac.style.border = "1px solid black";
		pjesma.style.border = "1px solid red";
		mjesec.style.border = "1px solid black";
		izvodjac_greska.textContent = "";
		pjesma_greska.textContent = "Naziv pjesme je obavezan";
		mjesec_greska.textContent = "";
		pjesma.focus();
		return false;
	}
	else if(mjesec.value === "") {
		izvodjac.style.border = "1px solid black";
		pjesma.style.border = "1px solid black";
		mjesec.style.border = "1px solid red";
		izvodjac_greska.textContent = "";
		pjesma_greska.textContent = "";
		mjesec_greska.textContent = "Naziv mjeseca je obavezan";
		mjesec.focus();
		return false;
	}
}

function verifikacijaIzvodjaca() {
	if(izvodjac.value != "") {
		izvodjac.style.border = "1px solid black";
		izvodjac_greska.innerHTML = "";
		return true;
	}
}

function verifikacijaPjesme() {
	if(pjesma.value != "") {
		pjesma.style.border = "1px solid black";
		pjesma_greska.innerHTML = "";
		return true;
	}
}

function verifikacijaMjeseca() {
	if(mjesec.value != "") {
		mjesec.style.border = "1px solid black";
		mjesec_greska.innerHTML = "";
		return true;
	}
}
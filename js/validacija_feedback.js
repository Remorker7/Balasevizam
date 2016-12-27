var ime = document.forms["ocjena-str"]["ime"];
var email = document.forms["ocjena-str"]["email-adresa"];
var sadrzaj = document.forms["ocjena-str"]["sadrzaj"];

var ime_greska = document.getElementById("ime-greska");
var email_greska = document.getElementById("email-greska");
var sadrzaj_greska = document.getElementById("sadrzaj-greska");

ime.addEventListener("blur", verifikacijaImena, true);
email.addEventListener("blur", verifikacijaEmaila, true);
sadrzaj.addEventListener("blur", verifikacijaSadrzaja, true);

var provjera = /[a-zA-Z0-9_\.-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9\.]{2,7}$/;

function ValidirajFeedback() {
	if(ime.value === "") {
		ime.style.border = "1px solid red";
		email.style.border = "1px solid black";
		sadrzaj.style.border = "1px solid black";
		//ime_greska.textContent = "Niste unijeli Vaše ime";
		//email_greska.textContent = "";
		//sadrzaj_greska.textContent = "";
		ime.focus();
		return false;
	}
	else if(!provjera.test(email.value)) {
		ime.style.border = "1px solid black";
		email.style.border = "1px solid red";
		sadrzaj.style.border = "1px solid black";
		//ime_greska.textContent = "";
		//email_greska.textContent = "E-mail adresa je neispravna";
		//sadrzaj_greska.textContent = "";
		email.focus();
		return false;
	}
	else if(sadrzaj.value === "") {
		ime.style.border = "1px solid black";
		email.style.border = "1px solid black";
		sadrzaj.style.border = "1px solid red";
		//ime_greska.textContent = "";
		//email_greska.textContent = "";
		//sadrzaj_greska.textContent = "Niste unijeli sadrzaj e-maila";
		sadrzaj.focus();
		return false;
	}
}

function verifikacijaImena() {
	if(ime.value != "") {
		ime.style.border = "1px solid black";
		ime.innerHTML = "";
		return true;
	}
}

function verifikacijaEmaila() {
	if(provjera.test(email.value)) {
		email.style.border = "1px solid black";
		email_greska.innerHTML = "";
		return true;
	}
}

function verifikacijaSadrzaja() {
	if(sadrzaj.value != "") {
		sadrzaj.style.border = "1px solid black";
		sadrzaj_greska.innerHTML = "";
		return true;
	}
}
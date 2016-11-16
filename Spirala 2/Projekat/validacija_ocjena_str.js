var ocjena = document.forms["forma-ocjena"]["ocjena"];
var ocjena_greska = document.getElementById("ocjena-greska");
ocjena.addEventListener("blur", verifikacijaOcjene, true);

function ValidirajOcjenu() {
	if(ocjena.value === "") {
		ocjena.style.border = "1px solid red";
		ocjena_greska.textContent = "Niste unijeli ocjenu";
		ocjena.focus();
		return false;
	}
	else if(ocjena.value != "5" && ocjena.value != "4" && ocjena.value != "3" && ocjena.value != "2" && ocjena.value != "1") {
		ocjena.style.border = "1px solid red";
		ocjena_greska.textContent = "Neispravna ocjena";
		ocjena.focus();
		return false;
	}
}

function verifikacijaOcjene() {
	if(ocjena.value == "5" || ocjena.value == "4" || ocjena.value == "3" || ocjena.value == "2" || ocjena.value == "1" ) {
		ocjena.style.border = "1px solid black";
		ocjena.innerHTML = "";
		return true;
	}
}
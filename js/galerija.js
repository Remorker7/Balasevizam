var galerija = document.getElementById("prikaz-slike");
galerija.style.display = "none";

function funkcijaPrikaz(x) {
	var slika_fajl = x;
	var slika = document.getElementById("slika_u_galeriji");
	slika.src = x;
	galerija.style.display = "block";
}

document.onkeydown = esc;

function esc(event) {
	var tipka = event.keyCode;
    if (tipka == 27 && galerija.style.display != "none") {
		galerija.style.display = "none";
    }
};

document.onmouseup = mis;

function mis(event) {
	if (galerija.style.display != "none") {
		galerija.style.display = "none";
    }
}
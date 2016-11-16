var checkLoad = function() {   
    document.readyState !== "complete" ? setTimeout(checkLoad, 11) : ucitaj('pocetna.html', 'prva');    
};  
checkLoad(); 

function dodajJavaScript(jsFilePath) {
	var js = document.createElement("script");
	js.type = "text/javascript";
	js.src = jsFilePath;
	document.body.appendChild(js);	
}

function ucitaj(url, link) {
	var mojDiv = document.getElementById('sadrzaj');
	var ajax;  
	var izabraniLink = document.getElementById(link);
	document.getElementById("prva").className = "";
	document.getElementById("druga").className = "";
	document.getElementById("treca").className = "";
	document.getElementById("cetvrta").className = "";
	document.getElementById("peta").className = "";
	document.getElementById("sesta").className = "";
    izabraniLink.className = "aktivni";
	if(typeof XMLHttpRequest !== 'undefined') ajax = new XMLHttpRequest();
	else {
		var verzije = ["Microsoft.XmlHttp", "MSXML2.XmlHttp", 
					   "MSXML2.XmlHttp.3.0", "MSXML2.XmlHttp.4.0", "MSXML2.XmlHttp.5.0"];
		for (var i = 0, duzina = verzije.length; i < duzina; i++){
			try{
				ajax = new ActiveXObject(verzije[i]);
				break;
			}
			catch(e){}
		}
	}
	
	ajax.onreadystatechange = provjera;
	function provjera() {
		if(ajax.readyState < 4){
			return;
		}
		if(ajax.status !== 200){
			return;
		}
		if(ajax.readyState === 4){
			mojDiv.innerHTML = ajax.responseText;
			if(link === "prva") {
				dodajJavaScript("validacija_pocetna.js");
				dodajJavaScript("galerija.js");
			}
			if(link === "druga") {
				dodajJavaScript("galerija.js");
			}
			if(link === "sesta") {
				dodajJavaScript("validacija_ocjena_str.js");
				dodajJavaScript("validacija_feedback.js");
			}
		}
	}
	
	ajax.open('GET', url, true);
	ajax.send('');	
}

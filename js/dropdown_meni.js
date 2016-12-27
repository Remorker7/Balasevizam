function prikazMenija(x){
    var meni = document.getElementById(x);
	var	strelica = document.getElementById("strelica");
	var maxH = "100%";
	var minH = "0px";
    if(meni.style.height != "0px" && meni.style.display == "block"){
        meni.style.height = minH;
		meni.style.display = "none";
		meni.style.overflow = "hidden";
        strelica.innerHTML = "&#9662;";
    } else {
        meni.style.height = maxH;
		meni.style.display = "block";
        strelica.innerHTML = "&#9652;";
		meni.style.overflow = "visible";
    }
}
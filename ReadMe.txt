Spirala 3 � Bala�evizam
(Selmir Hasanovi�)

Uvodne napomene
-	Napravio sam sistem za registraciju i login korisnika. Za registraciju korisnici trebaju unijeti username (koji je validiran, tako da je onemogu�eno da dva korisnika imaju isti username), password (kao i potvrdu passworda) i e-mail (koji je, tako�er, validiran). Username nije case sensitive, tako da je svejedno ako se admin uloguje sa username-om admin ili npr. ADMin, ali je onemogu�eno da se kreira jo� jedan ra�un ADMin ako ve� postoji ra�un sa usernam-om admin. Password se u xml sprema kriptovan pomo�u funkcije md5. Za svakog novog korisnika se pravi novi xml fajl u folderu korisnici.
-	Podaci za login kao admin su: username �� admin, password � 12345. Podaci za login test korisnika su: username � test, password �� 12345.
-	Onemogu�eno je pregledavanje stranica sve dok se korisnik ne uloguje. U gornjem lijevom uglu korisnik ima opciju da klikne na link za log out sa stranice.
-	Za razliku od prethodne spirale gdje su se najbolje pjesme prikazivale u obliku tabele, sada sam za potrebe izrade zadataka u ovoj spiralu tu tabelu predstavio u obliku forme, kako bih podatke mogao spremati u xml fajlove i �itati ih iz istih.
-	Izbrisao sam ajax pozive.
-	Dodao sam sadr�aj na sve podstranice koje nisam kompletirao na prethodnim spiralama.
-	Svi folderi namijenjeni za xml fajlove sadr�e neke testne xml fajlove koje sam ja kreirao i testirao prilikom izrade spirale.
-	Sve fajlove sam razvrstao u odgovaraju�e foldere (slike, javascript, pdf).

I � �ta je ura�eno?
Zadatak 1
-	Sve forme koje sam kreirao na stranici (trenutno imam �etiri forme) su spa�ene u odgovaraju�e xml fajlove (folderi pjesme-najbolje, pjesme, feedback i ocjene). Svi podaci koje korisnik unosi su validirani kori�tenjem JS-a i PHP-a. Poruke o eventualnim gre�kama se ispisuju kori�tenjem PHP-a, ispod submit-a (u obliku liste, crvenom bojom).
-	XSS ranjivost koda sprije�io sam kori�tenjem funkcije htmlspecialchars na svakom mjestu gdje se ispisuju podaci koje unosi korisnik putem formi, a pri u�itavanju une�enih podataka koristio sam funkciju htmlEntities uz dodatnu validaciju une�enih karaktera. Nakon kori�tenja ovih funkcija, nije mogu�e ispravno spasiti rije�i koje sadr�e slova �, �, �, � i �, jer ova slova budu zamijenjena (npr. � bude zamijenjeno sa scaron), iako sam kao tre�i parametar stavio da se koristi UTF-8.
-	Unos, izmjena i brisanje su omogu�eni adminu. Ako je ulogovan neki drugi korisnik, ne�e mu biti prikazane dodatne opcije, nego �e biti samo prikazani podaci iz xml-a. Ako je ulogovan admin, na formi na kojoj se prikazuju najbolje pjesme �e mu pored svake pjesme biti prikazan znak �X� za brisanje pjesme. Ispod liste pjesama dodao sam dva reda. Jedan red slu�i za dodavanje nove pjesme (izvr�io sam provjeru da li ID ve� postoji, ako da, korisniku se ispisuje poruka o gre�ci), a dodavanje se vr�i klikom na button sa znakom �+�. Drugi red slu�i za editovanje neke pjesme, klikom na button sa znakom �E� (edit). Ukoliko korisnik unese validan ID i validne podatke za naziv izvo�a�a i pjesme, promjena �e biti izvr�ena, u suprotnom se ispod forme ispisuju podaci o gre�kama.

Zadatak 2
-	Ukoliko je korisnik ulogovan kao admin, na po�etnoj formi �e mu se prikazati dugme �preuzmite predlo�ene pjesme (csv)�. Klikom na dugme admin mo�e preuzeti csv fajl o do sada predlo�enim pjesmama koje su poslane putem forme �Predlo�ite pjesmu�. Podaci se u�itavaju iz xml fajlova iz foldera �pjesme�.
-	Za otvaranje .csv fajla koristio sam notepad++ i podaci se prikazuju onako kako je i predvi�eno, s tim da se po defaultu dodaju dvostruki navodnici oko polja koja sadr�e vi�e od jedne rije�i (tj. koja sadr�e white spaces).
-	Pri direktnom otvaranju u Excel-u imao sam problem sa UTF-8 karakterima po�to ih excel po defaultu ne prepoznaje, nego se podaci iz .csv fajla trebaju importovati pomo�u Data -> Import text tako da se promijeni encoding na UTF-8. Pri otvaranju fajla pomo�u notepad++ nisam imao taj problem jer sam u php-u podesio ovaj format za spremanje fajlova.
Zadatak 3
-	Korisnicima je prikazan button za preuzimanje izvje�taja u pdf-u (preuzmite izvje�taj (pdf) na po�etnoj stranici). Klikom na dugme korisnik preuzima pdf sa podacima o najboljim pjesmama, o predlo�enim pjesmama i registrovanim korisnicima. Sve tri grupe podataka od kojih se sastoji pdf se u�itavaju iz odgovaraju�ih xml fajlova.
-	Koristio sam fpdf biblioteku za kreiranje pdf fajla.
Zadatak 4
-	Na po�etnoj stranici napravio sam formu gdje korisnik mo�e unijeti podatke za pretra�ivanje najboljih pjesama i izvo�a�a tih pjesama istovremeno. Dok korisnik unosi tekst za pretragu ispod se izlistavaju rezultati (maksimalno 10), bez reloada stranice. Ako nema rezultata za une�eni tekst, korisniku se ispisuje poruka da nema rezultata.
-	Klikom na dugme pretra�i korisniku se ispod forme izlistavaju svi rezultati za tekst koji je unio, �ak i ako ih ima vi�e od 10. Ukoliko je do�lo do neke gre�ke, korisniku se ispisuje odgovaraju�i tekst.
-	Za izradu ovog zadatka napravio sam js fajl (nalazi se u js folderu) instantPretrazivanje.js u kojem pravim ajax poziv kako ne bih morao osvje�avati stranicu, a koristio sam i php skriptu instantPretraga kako bih prona�ao rezultate pretrage.
Zadatak 5
-	Uspje�no ura�en deployment na OpenShift:
http://balasevizam-balasevizam2017.44fs.preview.openshiftapps.com/

II � �ta nije ura�eno?
/
III - Bug-ovi koje ste primijetili ali niste stigli ispraviti, a znate rje�enje (opis rje�enja)
/

IV  - Bug-ovi koje ste primijetili ali ne znate rje�enje
/
V  - Lista fajlova u formatu NAZIVFAJLA - Opis u vidu jedne re�enice �ta se u fajlu nalazi
�	feedback � folder gdje su smje�teni xml fajlovi u koje su spremljeni podaci sa forme feedback
�	fdpf � folder u kojem je spremljena fpdf biblioteka
�	js � folder u kojem su smje�teni javascript fajlovi (u odnosu na prethodnu spiralu dodat fajl instantPretrazivanje.js prilikom izrade 4. zadatka
�	korisnici � folder u kojem su smje�teni xml fajlovi u kojima se nalaze podaci registrovanih korisnika
�	ocjene � folder u kojem su smje�teni xml fajlovi u koje su spremljeni podaci sa forme za ocjenu stranice
�	pdf � folder u kojem se nalaze pdf fajlovi koji su dostupni za download na podstranici knjige
�	pjesme � folder u kojem se nalaze xml fajlovi u koje su smje�tene informacije o pjesmama koje korisnici �alju putem forme na po�etnoj strani
�	pjesme-najbolje � folder u koji se smje�taju najbolje pjesme na po�etnoj strani
�	slike � folder u kojem su smje�tene sve slike koje se nalaze na stranici
�	balasevizam.css � css fajl za �itav projekat
�	balasgram.php � podstranica na kojoj su smje�teni citati u obliku galerije
�	index.php � po�etna stranica namijenjena za login korisnika
�	instantPretraga.php � php skripta za pretragu koja je realizovana u sklopu 4. zadatka
�	knjige.php � podstranica na kojoj se nalaze slike svih knjiga i omogu�ava download knjiga u pdf formatu
�	kontakt.php � podstranica koja sadr�i kontakt informacije i forme za ocjenu stranice
�	maliBalasevici.php � podstranica koja sadr�i tekstove i slike drugih umjetnika
�	odjava.php � php skripta koja omogu�ava korisnicima da se odjave sa stranice
�	pocetna.php � podstranica na kojoj su smje�tene forme za slanje i prikaz pjesama, i na njoj je omogu�en download pdf izvje�taja i csv fajla
�	registracija.php � stranica za registraciju novih korisnika
�	tekstoviPjesama.php � podstranica na kojoj se nalaze nazivi albuma, pjesama i linkovi na tekstove svih pjesama.

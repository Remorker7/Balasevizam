Spirala 3 – Balaševizam
(Selmir Hasanoviæ)

Uvodne napomene
-	Napravio sam sistem za registraciju i login korisnika. Za registraciju korisnici trebaju unijeti username (koji je validiran, tako da je onemoguæeno da dva korisnika imaju isti username), password (kao i potvrdu passworda) i e-mail (koji je, takoðer, validiran). Username nije case sensitive, tako da je svejedno ako se admin uloguje sa username-om admin ili npr. ADMin, ali je onemoguæeno da se kreira još jedan raèun ADMin ako veæ postoji raèun sa usernam-om admin. Password se u xml sprema kriptovan pomoæu funkcije md5. Za svakog novog korisnika se pravi novi xml fajl u folderu korisnici.
-	Podaci za login kao admin su: username ¬– admin, password – 12345. Podaci za login test korisnika su: username – test, password ¬– 12345.
-	Onemoguæeno je pregledavanje stranica sve dok se korisnik ne uloguje. U gornjem lijevom uglu korisnik ima opciju da klikne na link za log out sa stranice.
-	Za razliku od prethodne spirale gdje su se najbolje pjesme prikazivale u obliku tabele, sada sam za potrebe izrade zadataka u ovoj spiralu tu tabelu predstavio u obliku forme, kako bih podatke mogao spremati u xml fajlove i èitati ih iz istih.
-	Izbrisao sam ajax pozive.
-	Dodao sam sadržaj na sve podstranice koje nisam kompletirao na prethodnim spiralama.
-	Svi folderi namijenjeni za xml fajlove sadrže neke testne xml fajlove koje sam ja kreirao i testirao prilikom izrade spirale.
-	Sve fajlove sam razvrstao u odgovarajuæe foldere (slike, javascript, pdf).

I – Šta je uraðeno?
Zadatak 1
-	Sve forme koje sam kreirao na stranici (trenutno imam èetiri forme) su spašene u odgovarajuæe xml fajlove (folderi pjesme-najbolje, pjesme, feedback i ocjene). Svi podaci koje korisnik unosi su validirani korištenjem JS-a i PHP-a. Poruke o eventualnim greškama se ispisuju korištenjem PHP-a, ispod submit-a (u obliku liste, crvenom bojom).
-	XSS ranjivost koda sprijeèio sam korištenjem funkcije htmlspecialchars na svakom mjestu gdje se ispisuju podaci koje unosi korisnik putem formi, a pri uèitavanju unešenih podataka koristio sam funkciju htmlEntities uz dodatnu validaciju unešenih karaktera. Nakon korištenja ovih funkcija, nije moguæe ispravno spasiti rijeèi koje sadrže slova š, è, æ, ž i ð, jer ova slova budu zamijenjena (npr. š bude zamijenjeno sa scaron), iako sam kao treæi parametar stavio da se koristi UTF-8.
-	Unos, izmjena i brisanje su omoguæeni adminu. Ako je ulogovan neki drugi korisnik, neæe mu biti prikazane dodatne opcije, nego æe biti samo prikazani podaci iz xml-a. Ako je ulogovan admin, na formi na kojoj se prikazuju najbolje pjesme æe mu pored svake pjesme biti prikazan znak „X“ za brisanje pjesme. Ispod liste pjesama dodao sam dva reda. Jedan red služi za dodavanje nove pjesme (izvršio sam provjeru da li ID veæ postoji, ako da, korisniku se ispisuje poruka o grešci), a dodavanje se vrši klikom na button sa znakom „+“. Drugi red služi za editovanje neke pjesme, klikom na button sa znakom „E“ (edit). Ukoliko korisnik unese validan ID i validne podatke za naziv izvoðaèa i pjesme, promjena æe biti izvršena, u suprotnom se ispod forme ispisuju podaci o greškama.

Zadatak 2
-	Ukoliko je korisnik ulogovan kao admin, na poèetnoj formi æe mu se prikazati dugme „preuzmite predložene pjesme (csv)“. Klikom na dugme admin može preuzeti csv fajl o do sada predloženim pjesmama koje su poslane putem forme „Predložite pjesmu“. Podaci se uèitavaju iz xml fajlova iz foldera „pjesme“.
-	Za otvaranje .csv fajla koristio sam notepad++ i podaci se prikazuju onako kako je i predviðeno, s tim da se po defaultu dodaju dvostruki navodnici oko polja koja sadrže više od jedne rijeèi (tj. koja sadrže white spaces).
-	Pri direktnom otvaranju u Excel-u imao sam problem sa UTF-8 karakterima pošto ih excel po defaultu ne prepoznaje, nego se podaci iz .csv fajla trebaju importovati pomoæu Data -> Import text tako da se promijeni encoding na UTF-8. Pri otvaranju fajla pomoæu notepad++ nisam imao taj problem jer sam u php-u podesio ovaj format za spremanje fajlova.
Zadatak 3
-	Korisnicima je prikazan button za preuzimanje izvještaja u pdf-u (preuzmite izvještaj (pdf) na poèetnoj stranici). Klikom na dugme korisnik preuzima pdf sa podacima o najboljim pjesmama, o predloženim pjesmama i registrovanim korisnicima. Sve tri grupe podataka od kojih se sastoji pdf se uèitavaju iz odgovarajuæih xml fajlova.
-	Koristio sam fpdf biblioteku za kreiranje pdf fajla.
Zadatak 4
-	Na poèetnoj stranici napravio sam formu gdje korisnik može unijeti podatke za pretraživanje najboljih pjesama i izvoðaèa tih pjesama istovremeno. Dok korisnik unosi tekst za pretragu ispod se izlistavaju rezultati (maksimalno 10), bez reloada stranice. Ako nema rezultata za unešeni tekst, korisniku se ispisuje poruka da nema rezultata.
-	Klikom na dugme pretraži korisniku se ispod forme izlistavaju svi rezultati za tekst koji je unio, èak i ako ih ima više od 10. Ukoliko je došlo do neke greške, korisniku se ispisuje odgovarajuæi tekst.
-	Za izradu ovog zadatka napravio sam js fajl (nalazi se u js folderu) instantPretrazivanje.js u kojem pravim ajax poziv kako ne bih morao osvježavati stranicu, a koristio sam i php skriptu instantPretraga kako bih pronašao rezultate pretrage.
Zadatak 5
-	Uspješno uraðen deployment na OpenShift:
http://balasevizam-balasevizam2017.44fs.preview.openshiftapps.com/

II – Šta nije uraðeno?
/
III - Bug-ovi koje ste primijetili ali niste stigli ispraviti, a znate rješenje (opis rješenja)
/

IV  - Bug-ovi koje ste primijetili ali ne znate rješenje
/
V  - Lista fajlova u formatu NAZIVFAJLA - Opis u vidu jedne reèenice šta se u fajlu nalazi
•	feedback – folder gdje su smješteni xml fajlovi u koje su spremljeni podaci sa forme feedback
•	fdpf – folder u kojem je spremljena fpdf biblioteka
•	js – folder u kojem su smješteni javascript fajlovi (u odnosu na prethodnu spiralu dodat fajl instantPretrazivanje.js prilikom izrade 4. zadatka
•	korisnici – folder u kojem su smješteni xml fajlovi u kojima se nalaze podaci registrovanih korisnika
•	ocjene – folder u kojem su smješteni xml fajlovi u koje su spremljeni podaci sa forme za ocjenu stranice
•	pdf – folder u kojem se nalaze pdf fajlovi koji su dostupni za download na podstranici knjige
•	pjesme – folder u kojem se nalaze xml fajlovi u koje su smještene informacije o pjesmama koje korisnici šalju putem forme na poèetnoj strani
•	pjesme-najbolje – folder u koji se smještaju najbolje pjesme na poèetnoj strani
•	slike – folder u kojem su smještene sve slike koje se nalaze na stranici
•	balasevizam.css – css fajl za èitav projekat
•	balasgram.php – podstranica na kojoj su smješteni citati u obliku galerije
•	index.php – poèetna stranica namijenjena za login korisnika
•	instantPretraga.php – php skripta za pretragu koja je realizovana u sklopu 4. zadatka
•	knjige.php – podstranica na kojoj se nalaze slike svih knjiga i omoguæava download knjiga u pdf formatu
•	kontakt.php – podstranica koja sadrži kontakt informacije i forme za ocjenu stranice
•	maliBalasevici.php – podstranica koja sadrži tekstove i slike drugih umjetnika
•	odjava.php – php skripta koja omoguæava korisnicima da se odjave sa stranice
•	pocetna.php – podstranica na kojoj su smještene forme za slanje i prikaz pjesama, i na njoj je omoguæen download pdf izvještaja i csv fajla
•	registracija.php – stranica za registraciju novih korisnika
•	tekstoviPjesama.php – podstranica na kojoj se nalaze nazivi albuma, pjesama i linkovi na tekstove svih pjesama.

I - �ta je ura�eno?
a) Sve tri forme imaju JavaScript validaciju. 
Prva na po�etnoj strani, gdje se gre�ka ispisuje odmah ispod button-a za submit, dok se kod druge forme na podstranici "kontakt.html" za koju sam napravio validaciju gre�ka ispisuje iznad button-a za submit. Na ovoj formi sam tako�er napravio dodatnu provjeru e-maila, kori�tenjem regex-a. Na tre�oj formi sam dodao jedno polje za unos ocjene stranice koje sam detaljno provjerio da li je ispunjeno i ako jeste, da li je unesena ocjena ispravna. Ostala polja na ovoj formi nije potrebno provjeravati jer uvijek moraju imati neku odabranu vrijednost.
b) - Koriste�i JavaScript (fajl dropdown_meni.js) kreirao sam dropdown meni koji se prikazuje na displejima koji imaju �irinu <= 540 px, tako da se u�tedi prostor na manjim displejima. Na ve�im displejima se prikazuje standardni meni, tj. uvijek je prikazan.
- Kreirao sam galeriju na postranicama Po�etna (tri slike) i Bala�gram (�est slika) koriste�i JavaScript (fajl galerija.js). Kada se klikne na neku sliku, ona blokira kompletan ostali sadr�aj i zauzme cijeli ekran (ra�iri se div za sliku, a pove�ao sam i dimenzije slike, ve�e su nego kada se prikazuje u galeriji; mislim da ne treba slika da bude preko cijelog ekrana, tj. da joj stavimo width 100%, jer onda izgleda poprili�no ru�no). Klikom na escape zatvara se slika i vra�a se pogled na galeriju, s tim da sam dodao i da se klikom mi�a isto tako mo�e zatvoriti slika, jer mislim da je dobro da se ne mora koristiti isklju�ivo tastatura.
c) Koriste�i AJAX napravio sam da se sve stranice u�itavaju bez reload-a cijele stranice (fajl ajax.js). Testirao sam koriste�i wamp i mislim da sve radi bez ikakvih problema, a poku�ao sam napraviti tako da ajax radi u svim vrstama browser-a. Tako�er, u datom fajlu sam u odre�ene podstranice dodao i script-e koje oni koriste. 
Napomene - sve ispo�tovane.

II - �ta nije ura�eno?
/

III - Bug-ovi koje ste primijetili ali niste stigli ispraviti, a znate rje�enje (opis rje�enja)
/

IV  - Bug-ovi koje ste primijetili ali ne znate rje�enje
/

V  - Lista fajlova u formatu NAZIVFAJLA - Opis u vidu jedne re�enice �ta se u fajlu nalazi
AJAX - javascript kod za u�itavanje podstranice bez reload-a cijele stranice.
BALASEVIZAM - fajl u kome je sadr�an kompletan css kod za sve podstranice.
BALASGRAM - html kod za istoimenu podstranicu, u njemu se nalazi zajedni�ki kod za sve stranice (meni, banner...), kao i par citata koje sam dodao kako bih prikazao zami�ljeni izgled stranice, a dodao sam i div koji slu�i za prikaz galerije slika.
DROPDOWN_MENI - javascript kod za dropdown meni koji sam dodao za displeje �ija je �irina manja od 540px.
GALERIJA - javascript kod za prikaz galerije slika na podstranicama Bala�gram i Po�etna.
INDEX - glavni html kod stranice, u njemu se nalazi zajedni�ki kod za sve stranice (meni, banner, footer).
KNJIGE - trenutno je sadr�aj ove podstranice prazan.
KONTAKT - html kod za istoimenu podstranicu, u njemu se nalaze kontakt informacije i logo-i socijalnih mre�a, kao i dvije forme koje slu�e za to da bi korisnici mogli dati recenziju stranice ili poslati e-mail adminu, a omogu�ena je i validacija navedenih formi.
MALIBALA�EVI�I- trenutno je sadr�aj ove podstranice prazan.
POCETNA- html kod za po�etnu podstranicu, dodata validacija za formu, kao i prikaz galerije slika za slike koje su prikazane na ovoj stranici.
TEKSTOVIPJESAMA - trenutno je sadr�aj ove podstranice prazan.
VALIDACIJA_FEEDBACK - javascript kod za validaciju prve forme na podstranici kontakt.
VALIDACIJA_OCJENA_STR - javascript kod za validaciju druge forme na podstranici kontakt.
VALIDACIJA_POCETNA - javascript kod za validaciju forme na podstranici po�etna.

*svi html i css fajlovi su validirani na validatorima koji su preporu�eni na tutorijalima, tako da nemaju ni jednu gre�ku.
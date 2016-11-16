I - Šta je uraðeno?
a) Sve tri forme imaju JavaScript validaciju. 
Prva na poèetnoj strani, gdje se greška ispisuje odmah ispod button-a za submit, dok se kod druge forme na podstranici "kontakt.html" za koju sam napravio validaciju greška ispisuje iznad button-a za submit. Na ovoj formi sam takoðer napravio dodatnu provjeru e-maila, korištenjem regex-a. Na treæoj formi sam dodao jedno polje za unos ocjene stranice koje sam detaljno provjerio da li je ispunjeno i ako jeste, da li je unesena ocjena ispravna. Ostala polja na ovoj formi nije potrebno provjeravati jer uvijek moraju imati neku odabranu vrijednost.
b) - Koristeæi JavaScript (fajl dropdown_meni.js) kreirao sam dropdown meni koji se prikazuje na displejima koji imaju širinu <= 540 px, tako da se uštedi prostor na manjim displejima. Na veæim displejima se prikazuje standardni meni, tj. uvijek je prikazan.
- Kreirao sam galeriju na postranicama Poèetna (tri slike) i Balašgram (šest slika) koristeæi JavaScript (fajl galerija.js). Kada se klikne na neku sliku, ona blokira kompletan ostali sadržaj i zauzme cijeli ekran (raširi se div za sliku, a poveæao sam i dimenzije slike, veæe su nego kada se prikazuje u galeriji; mislim da ne treba slika da bude preko cijelog ekrana, tj. da joj stavimo width 100%, jer onda izgleda poprilièno ružno). Klikom na escape zatvara se slika i vraæa se pogled na galeriju, s tim da sam dodao i da se klikom miša isto tako može zatvoriti slika, jer mislim da je dobro da se ne mora koristiti iskljuèivo tastatura.
c) Koristeæi AJAX napravio sam da se sve stranice uèitavaju bez reload-a cijele stranice (fajl ajax.js). Testirao sam koristeæi wamp i mislim da sve radi bez ikakvih problema, a pokušao sam napraviti tako da ajax radi u svim vrstama browser-a. Takoðer, u datom fajlu sam u odreðene podstranice dodao i script-e koje oni koriste. 
Napomene - sve ispoštovane.

II - Šta nije uraðeno?
/

III - Bug-ovi koje ste primijetili ali niste stigli ispraviti, a znate rješenje (opis rješenja)
/

IV  - Bug-ovi koje ste primijetili ali ne znate rješenje
/

V  - Lista fajlova u formatu NAZIVFAJLA - Opis u vidu jedne reèenice šta se u fajlu nalazi
AJAX - javascript kod za uèitavanje podstranice bez reload-a cijele stranice.
BALASEVIZAM - fajl u kome je sadržan kompletan css kod za sve podstranice.
BALASGRAM - html kod za istoimenu podstranicu, u njemu se nalazi zajednièki kod za sve stranice (meni, banner...), kao i par citata koje sam dodao kako bih prikazao zamišljeni izgled stranice, a dodao sam i div koji služi za prikaz galerije slika.
DROPDOWN_MENI - javascript kod za dropdown meni koji sam dodao za displeje èija je širina manja od 540px.
GALERIJA - javascript kod za prikaz galerije slika na podstranicama Balašgram i Poèetna.
INDEX - glavni html kod stranice, u njemu se nalazi zajednièki kod za sve stranice (meni, banner, footer).
KNJIGE - trenutno je sadržaj ove podstranice prazan.
KONTAKT - html kod za istoimenu podstranicu, u njemu se nalaze kontakt informacije i logo-i socijalnih mreža, kao i dvije forme koje služe za to da bi korisnici mogli dati recenziju stranice ili poslati e-mail adminu, a omoguæena je i validacija navedenih formi.
MALIBALAŠEVIÆI- trenutno je sadržaj ove podstranice prazan.
POCETNA- html kod za poèetnu podstranicu, dodata validacija za formu, kao i prikaz galerije slika za slike koje su prikazane na ovoj stranici.
TEKSTOVIPJESAMA - trenutno je sadržaj ove podstranice prazan.
VALIDACIJA_FEEDBACK - javascript kod za validaciju prve forme na podstranici kontakt.
VALIDACIJA_OCJENA_STR - javascript kod za validaciju druge forme na podstranici kontakt.
VALIDACIJA_POCETNA - javascript kod za validaciju forme na podstranici poèetna.

*svi html i css fajlovi su validirani na validatorima koji su preporuèeni na tutorijalima, tako da nemaju ni jednu grešku.
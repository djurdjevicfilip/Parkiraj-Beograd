
# Parkiraj! Beograd 

Velika frustracija za vozače (posebno u velikim gradovima) je **parkiranje**.
Ogromna količina vremena i goriva se troši na traženje slobodnog parking
mesta. Od 2016. godine u Beogradu je instalirano ***3600* parking senzora** koji pružaju informaciju o slobodnim parking mestima. Na osnovu ove informacije došli smo na ideju da svaki dan olakšamo vozačima. Koristeći ove senzore, pomogli bismo vozačima da se brže parkiraju, i samim tim sačuvaju vreme i gorivo. 
## Prototip
Ukoliko želite da pogledate prototip, možete da koristite sledeće linkove:
[Gost](https://djurdjevicfilip.github.io/prototip/)
[Korisnik](https://djurdjevicfilip.github.io/prototip/user.html)
[Moderator](https://djurdjevicfilip.github.io/prototip/moderator.html)
[Administrator](https://djurdjevicfilip.github.io/prototip/administrator.html)
# Pokrivenost i senzori
Veliki deo Beograda pokriven je zonama za parkiranje. Parkiraj! Beograd pomoći će korisnicima da nađu mesta pokrivena **senzorima**. Senzori za sada čine jedan manji deo ove pokrivenosti.
## Parking Zone u Beogradu
![Zone](https://parking-servis.co.rs/wp-content/uploads/2014/05/Beograd-Zone3.jpg)
## Senzori u Beogradu

> U Beogradu, Sistem za praćenje slobodnih parking mesta počeo je sa radom 2016. godine u Njegoševoj i okolnim ulicama. Od tada je proširen
> i na deo grada oivičen ulicama Beogradska, Krunska, Baba Višnjina i
> Bulevar kralja Aleksandra, a zatim i na prostor do Kliničkog centra i
> Bulevara oslobođenja.

Kako se ovaj projekat ugradnje senzora dobro pokazao, očekuje se dalje širenje prikazane mape.

![Senzori](https://parking-servis.co.rs/wp-content/uploads/2017/12/Web-Mapa-Senzora-2019-v2.jpg)
## Način rada senzora

> Parking senzor, ugrađen na parking mestu, detektuje parkirano vozilo i
> šalje informaciju do info tabli na raskrsnicama ulica, na kojima
> vozači mogu da vide u kojoj ulici ima slobodnih mesta za parkiranje.

Izrada naše aplikacije obuhvataće simulaciju rada ovih senzora. 2 tipa korisnika imaće mogućnost dodavanja novih parking senzora, pri čemu lokacije neće biti ograničene bilo kakvim parametrima. Smatra se da je svako područje pokriveno, kao i da onaj ko dodaje senzore zna šta radi.
# Tehnički Detalji
Sekcija o implementaciji aplikacije.

## Korišćene tehnologije, alati i biblioteke
Standardni jezici koji su korišćeni :

 - PHP (4.9.2)
 - JavaScript 
 - HTML, CSS
 - MySQL 

### Tehnologije i biblioteke koje su korišćene
  | Tehnologija/Bibl.  |      Opis      |  Verzija |
|:----------:|-------------|------:|
| [Laravel](https://www.laravel.com) | PHP Framework za veb aplikacije, sa ekspresivnom i elegantnom sintaksom  | 7.x |
| [polyline.js](https://github.com/mapbox/polyline) | Biblioteka koja se koristi za dekodiranje polyline objekta dobijenog od Google Maps Directions API. Uz pomoć ove biblioteke možemo da dobijemo niz pozicija koje predstavljaju rutu, a samim tim i da simuliramo kretanje korisnika  | |
|  [alertify.js](https://alertifyjs.com/) | Biblioteka koja se koristi za prikazivanje obaveštenja korisniku ||
| [Pusher API](https://pusher.com/) | API koji se koristi za slanje obaveštavanje korisnika. Korisnik se pretplaćuje na kanal, i bilo koja promena senzora (dodavanje, brisanje, senzor postaje zauzet...) na serveru se manifestuje kod klijenata| |
|[Google Maps JavaScript API](https://cloud.google.com/maps-platform/) | Google-ov API za dinamičko prikazivanje mape. On nam služi za postavljanje markera na mapu, kao i za većinu onoga što se vidi na mapi. |3.0|
|[Google Maps Directions API](https://cloud.google.com/maps-platform/) | Google-ov API za prikazivanje rute do mesta. Ovaj API takodje koristimo za uzimanje polyline objekta koji se dalje šalje u polyline.js|3.0|
|[Google Maps Places API](https://cloud.google.com/maps-platform/) | Google-ov API za pretragu i prikazivanje relevantnih mesta. Ovaj API nam omogućava i *location biasing*|3.0|
|[Google Maps Distance Matrix API](https://cloud.google.com/maps-platform/) | Google-ov API za pronalazenje najbliže lokacije. (prethodno korišćen, više detalja prikazano je u nastavku ovog dokumenta, kao i u readme.md fajlu na našem [Git Repozitorijumu](https://github.com/djurdjevicfilip/Parkiraj-Beograd) ) |3.0|
|[Apache](http://apache.com/) | Besplatan open-source HTTP server |2.4.41|
|[Ajax](http://project-osrm.org/) | Ajax koristimo za slanje poruka serveru od strane klijenta, o dolasku na određenu lokaciju||

### Ostalo
 | Stavka  |      Opis      |  
|:----------:|-------------|  
| [GitHub](https://www.github.com) | Platforma za kolaboraciju | 
| [GitHub Pages](https://www.github.com) | Besplatno host-ovanje stranica, korišćeno za prototip | 
| [MS Teams](https://www.microsoft.com/en-us/microsoft-365/microsoft-teams/group-chat-software) | Platforma korišćena za komunikaciju između članova tima| 
| [VS Code](https://code.visualstudio.com/) | Vrlo mocan Code Editor, sa odličnim izborom ekstenzija| 
  | [VS Code Extensions](https://code.visualstudio.com/) | Prettier, Bracket Pair Colorizer,   Better Comments | 
   | [Toad Data Modeler](https://www.quest.com/products/toad-data-modeler/) | Alat za modelovanje baze podataka | 
 | [StarUML](http://staruml.io/) | Alat za UML modelovanje |

### Implementacija
Korišćen je **MySql** za bazu podataka, **PHP** za backend, kao i prethodno pomenute tehnologije za izradu frontend dela stranice. 

Koristili smo **Laravel** Framework, kao i neke dodatne funkcionalnosti istog. Neke od tih dodatnih funkcionalosti su **Event Handling**, **Broadcasting** i **Observing**. Za potrebe Broadcasting-a korišćen je **Pusher API**.

Tehnologije korišćene za mapu:  
- Google Maps Javascript API
- Google Directions API
- Google Places API
- OSRM API


Bitno je da se poštuju određene paradigme. Takođe, veoma je bitno da kod bude što bolji, lepši, i da bude čitljiv, radi olakšanja razvoja aplikacije. Stoga se svim članovima tima preporučuje korišćenje **Visual Studio Code** editor-a. Preporučuje se i korišćenje sledećih dodataka:

 - ESLint
 - Prettier
 - Live Server
 - Bracket Pair Colorizer
 - Better Comments
## Performanse
Korisnička stranica sadrži mapu koju je često potrebno osvežavati i menjati. Trudili smo se da poboljšamo performanse stranice i da je što manje preopteretimo. Iz tog razloga je umesto Ajax-a korišćene su Laravel-ove dodatne mogućnosti. **Observing** nam služi za praćenje promena u bazi, a **Broadcasting** i **Pusher API** nam služe za slanje poruka korisničkim stranicama. Ovim dobijamo bolje performanse korisničke stranice, jer se stranica ne osvežava na fiksan vremenski period. Takođe, ovo nam omogućava i trenutno vidljive promene, dok bi kod većeg fiksnog intervala bilo kašnjenja.
## Testiranje
Testiranje je obavezno. Aplikacija će biti testirana automatski uz pomoć Selenium IDE plugin-a, ali i manuelno.
### Testiranje performansi aplikacije
Potrebno je testirati I performanse aplikacije. Razlozi I dodatna pojašnjenja mogu se pronaći u samoj dokumentaciji projekta. U ovom dokumentu objašnjen je proces testirana performansi, zaključci pri tom procesu, kao I određeni elementi koji nam pomažu pri vizuelizaciji procesa I odnosa podataka.   Uz neke stavke priložena su urađena rešenja ili moguća dodatna rešenja.
#### Testiranje funkcionalnog ograničenja broja lokacija
Broj lokacija bio je ograničen na približno 165 lokacija. Testiranje je rađeno ručno. Ograničenje je predstavljala veličina zahteva koji se šalju API-u. Rešenje je jednostavan algoritam koji šalje više zahteva I na osnovu tih zahteva sam traži najbližu lokaciju. Samim ovim procesom unosimo dodatno kašnjenje, ali to nama ne predstavlja veliki problem, kao što se može videti u Tabeli 1. Ovim smo odstranili ograničenja u pogledu API-a.
#### Testiranje trajanja obrade zahteva
Rešenje iz prethodne stavke nam omogućava bolje testiranje trajanja obrade zahteva. Umesto da se ograničimo na 165 lokacija, možemo da testiramo performanse za mnogo veći broj lokacija. Testiranje je rađeno ručno. Na osnovu zaključka da je maksimalni broj lokacija u jednom zahtevu 165, dobijamo maksimalni inkrement. Broj zahteva koji se šalju API-u biće ceil(location_number/increment). U tabeli ispod ovog teksta dat je prikaz trajanja celokupnog procesa obrade zahteva (u milisekundama). Može se primetiti da nema velikog odstupanja pri porastu broja lokacija (ukoliko ima preko 600 lokacija), pa možemo da ‘‘pogađamo’’ I neke druge vrednosti. Na primer, recimo za 50 000 lokacija bi po ovoj računici proces trajao 1 minut, za 200 000 4m… U kolonama Test n prikazano je trajanje zahteva pri korišćenju OSRM API-a (API koji se trenutno koristi), dok je u koloni Prosek OSRM API prikazan prosek tih testova. Kolona Predviđeno Directions API označava približno vreme koje bi bilo potrebno za jedan korisnički zahtev da smo nastavili da koristimo isti API.

| Broj lokacija | Test 1 | Test 2 | Test 3 | Test 4 | Test 5 | Prosek OSRM API | Predviđeno Directions API |
|:----------:|-------------|------:|------:|------:|------:|------:|------:|
| **1** | 194.351 | 138.090 | 253.323 | 201.660 | 196.126 | **196.708**‬ |**200** |
| **601** | 865.39 | 1097.33 |993.624 | 879.857 | 960.296 | **959.310** | **601 000 (~10min)** |
| **901** | 1248.99 | 1452.17 | 1371.94 | 1435.44 | 1244.07 | **1350.522** | **901 000 (~15min)** |
| **2059** | 2739.269 | 2632.16 | 2790.13 | 2687.78 | 2838.86 | **2737.640** | **2 059 000  (~34min)** |



## Ograničenja
Jedno ograničenje aplikacije javlja se kroz API za mape. Ograničenje je u tome što je broj zahteva ograničen na mesečnoj ili dnevnoj bazi. Ovo ograničenje nama trenutno ne predstavlja problem, ali može uticati na novčane resurse pri velikom porastu korisnika aplikacije. Takođe, nemamo pristup senzorima, tako da će oni biti simulirani.
## OSRM API vs. Google Maps API

 - **Google Maps Api** korišćen je za prikazivanje mape, rutiranje, clustering...  
 - **OSRM Api** je korišćen za pronalazak mesta do kog se najbrže dolazi  
 

***Zašto OSRM?***  
Google nam uz svoju uslugu **Distance Matrix** omogućava pronalazak najbližeg mesta, ali je broj mesta ograničen, a broj poziva API-a drastično raste sa porastom broja mesta. Na primer, ukoliko bismo imali **200** parking mesta, pronalazak najbližeg mesta bi trajao više od 2 minuta, a broj poziva bi mogao da bude među desetinama hiljada. To je, dakle, samo za jedan korisnički zahtev! 
OSRM nam sve ovo rešava jer je besplatan i bez ograničenja. Jedina 'mana' je što OSRM trenutno ne podržava **Distance Matrix**, već samo **Duration Matrix**


# Plan i prioriteti
Osnovni plan je da aplikacija zadovoljava zahteve predmeta, da bude funkcionalna, brza i laka za korišćenje. Želimo da što više različitih tipova korisnika bude u mogućnosti da koristi našu aplikaciju. Iz tog razloga, u sklopu sekcije proširenja ćemo uključiti i opcije koje proširuju već postojeće funkcionalnosti, sa ciljem inkluzije većeg broja ljudi (na primer invalida).

# Tim
## Članovi tima
 - Filip Đurđević
 - Danilo Dabović
 - Milan Ciganović
## Platforme korišćene za saradnju
 - GitHub
 - Microsoft Teams

## Izvori
[https://parking-servis.co.rs/](https://parking-servis.co.rs/)

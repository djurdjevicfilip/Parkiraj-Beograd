
## Korišćene tehnologije, alati i biblioteke
** Fajl je predvidjen za prikaz na [https://github.com/djurdjevicfilip/Parkiraj-Beograd](https://github.com/djurdjevicfilip/Parkiraj-Beograd) 
***
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
|:----------:|-------------|------:|
| [GitHub](https://www.github.com) | Platforma za kolaboraciju | 
| [GitHub Pages](https://www.github.com) | Besplatno host-ovanje stranica, korišćeno za prototip | 
| [MS Teams](https://www.microsoft.com/en-us/microsoft-365/microsoft-teams/group-chat-software) | Platforma korišćena za komunikaciju između članova tima| 
| [VS Code](https://code.visualstudio.com/) | Vrlo mocan Code Editor, sa odličnim izborom ekstenzija| 
  | [VS Code Extensions](https://code.visualstudio.com/) | Prettier, Bracket Pair Colorizer,   Better Comments | 
   | [Toad Data Modeler](https://www.quest.com/products/toad-data-modeler/) | Alat za modelovanje baze podataka | 
 | [StarUML](http://staruml.io/) | Alat za UML modelovanje |

## OSRM API vs. Google Maps API

 - **Google Maps Api** korišćen je za prikazivanje mape, rutiranje, clustering...  
 - **OSRM Api** je korišćen za pronalazak mesta do kog se najbrže dolazi  
 

***Zašto OSRM?***  
Google nam uz svoju uslugu **Distance Matrix** omogućava pronalazak najbližeg mesta, ali je broj mesta ograničen, a broj poziva API-a drastično raste sa porastom broja mesta. Na primer, ukoliko bismo imali **200** parking mesta, pronalazak najbližeg mesta bi trajao više od 2 minuta, a broj poziva bi mogao da bude među desetinama hiljada. To je, dakle, samo za jedan korisnički zahtev! 
OSRM nam sve ovo rešava jer je besplatan i bez ograničenja. Jedina 'mana' je što OSRM trenutno ne podržava **Distance Matrix**, već samo **Duration Matrix**.

## Broadcasting & Observing
Korisnička stranica sadrži mapu koju je često potrebno osvežavati i menjati. Trudili smo se da poboljšamo performanse stranice i da je što manje preopteretimo. Iz tog razloga umesto Ajax-a korišćene su Laravel-ove dodatne mogućnosti.  **Observing**  nam služi za praćenje promena u bazi, a  **Broadcasting**  i  **Pusher API**  nam služe za slanje poruka korisničkim stranicama. Ovim dobijamo bolje performanse korisničke stranice, jer se stranica ne osvežava na fiksan vremenski period. Takođe, ovo nam omogućava i trenutno vidljive promene, dok bi kod većeg fiksnog intervala bilo kašnjenja.

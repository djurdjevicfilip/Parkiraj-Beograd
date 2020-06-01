
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
|----------|:-------------:|------:|
| [Laravel](https://www.laravel.com) | PHP Framework za veb aplikacije, sa ekspresivnom i elegantnom sintaksom  | 7.x |
| [polyline.js](https://github.com/mapbox/polyline) | Biblioteka koja se koristi za dekodiranje polyline objekta dobijenog od Google Maps Directions API | |
|  [alertify.js](https://alertifyjs.com/) | Biblioteka koja se koristi za obaveštenja ||
| [Pusher API](https://pusher.com/) | API koji se koristi za slanje obaveštavanje korisnika | |
|[Google Maps JavaScript API](https://cloud.google.com/maps-platform/) | Google-ov API za dinamičko prikazivanje mape. On nam služi za postavljanje markera na mapu, kao i za većinu onoga što se vidi na mapi. |3.0|
|[Google Maps Directions API](https://cloud.google.com/maps-platform/) | Google-ov API za prikazivanje rute do mesta. Ovaj API takodje koristimo za uzimanje polyline objekta koji se dalje salje u polyline.js|3.0|
|[Google Maps Places API](https://cloud.google.com/maps-platform/) | Google-ov API za pretragu i prikazivanje relevantnih mesta.|3.0|
|[Google Maps Distance Matrix API](https://cloud.google.com/maps-platform/) | Google-ov API za pronalazenje najblize lokacije. (prethodno koriscen, vise detalja prikazano je u nastavku ovog dokumenta, kao i u readme.md fajlu na nasem [Git Repozitorijumu](https://github.com/djurdjevicfilip/Parkiraj-Beograd) ) |3.0|
|[Apache](http://project-osrm.org/) | Besplatan open-source HTTP server |2.4.41|
|[Apache](http://project-osrm.org/) | Besplatan open-source HTTP server |2.4.41|
## OSRM API vs. Google Maps API

 - **Google Maps Api** korišćen je za prikazivanje mape, rutiranje, clustering...  
 - **OSRM Api** je korišćen za pronalazak mesta do kog se najbrže dolazi  
 

***Zašto OSRM?***  
Google nam uz svoju uslugu **Distance Matrix** omogućava pronalazak najbližeg mesta, ali je broj mesta ograničen, a broj poziva API-a drastično raste sa porastom broja mesta. Na primer, ukoliko bismo imali **200** parking mesta, pronalazak najbližeg mesta bi trajao više od 2 minuta, a broj poziva bi mogao da bude među desetinama hiljada. To je, dakle, samo za jedan korisnički zahtev! 
OSRM nam sve ovo rešava jer je besplatan i bez ograničenja. Jedina 'mana' je što OSRM trenutno ne podržava **Distance Matrix**, već samo **Duration Matrix**

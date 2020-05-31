
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
## Tehnologije
Za izradu prototipa koristili smo **HTML**, **CSS** i **Bootstrap**. Takođe je urađena trivijalna komunikacija sa **Google Maps API**.

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

## Baza podataka
Kako je implementirana baza podataka...
## Performanse
Korisnička stranica sadrži mapu koju je često potrebno osvežavati i menjati. Trudili smo se da poboljšamo performanse stranice i da je što manje preopteretimo. Iz tog razloga je umesto Ajax-a korišćene su Laravel-ove dodatne mogućnosti. **Observing** nam služi za praćenje promena u bazi, a **Broadcasting** i **Pusher API** nam služe za slanje poruka korisničkim stranicama. Ovim dobijamo bolje performanse korisničke stranice, jer se stranica ne osvežava na fiksan vremenski period. Takođe, ovo nam omogućava i trenutno vidljive promene, dok bi kod većeg fiksnog intervala bilo kašnjenja.
## Sigurnost
Kako obezbeđujemo sigurnost naših korisnika, njihovih naloga...
## Testiranje
Testiranje je obavezno.
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
## Osnovna verzija
Lista najosnovnijih funkcionalnosti.
## Proširenja
Lista mogućih proširenja.
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

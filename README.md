
# Parkiraj! Beograd 

Velika frustracija za vozače (posebno u velikim gradovima) je **parkiranje**.
Ogromna količina vremena i goriva se troši na traženje slobodnog parking
mesta. Od 2016. godine u Beogradu je instalirano ***3600* parking senzora** koji pružaju informaciju o slobodnim parking mestima. Na osnovu ove informacije došli smo na ideju da svaki dan olakšamo vozačima. Koristeći ove senzore, pomogli bismo vozačima da se brže parkiraju, i samim tim sačuvaju vreme i gorivo. 
## Prototip
Ukoliko želite da pogledate prototip, možete da kliknete na ovaj link:
[https://djurdjevicfilip.github.io/prototip/index.html](https://djurdjevicfilip.github.io/prototip/index.html)
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

Implementacioni deo je još uvek delimično neodređen. Koristićemo **MySql** za bazu podataka, **PHP** i **Ajax** za backend, kao i prethodno pomenute tehnologije za izradu frontend dela stranice. 

Tehnologije koje će verovatno biti korišćene pri implementaciji:

 - **Laravel** - PHP Framework
 - Front-end dodaci

Bitno je da se poštuju određene paradigme. Takođe, veoma je bitno da kod bude što bolji, lepši, i da bude čitljiv, radi olakšanja razvoja aplikacije. Stoga se svim članovima tima preporučuje korišćenje **Visual Studio Code** editor-a. Preporučuje se i korišćenje sledećih dodataka:

 - ESLint
 - Prettier
 - Live Server
 - Bracket Pair Colorizer
 - Better Comments

## Baza podataka
Kako je implementirana baza podataka...
## Performanse
Načini za poboljšanje performansi aplikacije.
## Sigurnost
Kako obezbeđujemo sigurnost naših korisnika, njihovih naloga...
## Testiranje
Testiranje je obavezno.
## Ograničenja
Jedno ograničenje aplikacije javlja se kroz API za mape. Ograničenje je u tome što je broj zahteva ograničen na mesečnoj ili dnevnoj bazi. Ovo ograničenje nama trenutno ne predstavlja problem, ali može uticati na novčane resurse pri velikom porastu korisnika aplikacije. Takođe, nemamo pristup senzorima, tako da će oni biti simulirani.
# Plan i prioriteti
## Osnovna verzija
Lista najosnovnijih funkcionalnosti.
## Proširenja
Lista mogućih proširenja.
# Tim
## Članovi tima
 - Filip Đurđević
 - Danilo Dabović
 - Milan Ciganović
## Misija
## Vizija
## Platforme korišćene za saradnju
 - GitHub
 - Microsoft Teams

## Izvori
[https://parking-servis.co.rs/](https://parking-servis.co.rs/)
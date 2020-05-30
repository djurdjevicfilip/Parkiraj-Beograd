
#### Windows - *Task Scheduler*.
#### Linux  - *CRON*
### Uputstvo za simuliranje senzora na Windows platformi
		1. Pokrenuti Task Scheduler
		2. Odabrati opciju Create Task...
		3. Otvoriće se novi prozor. Uneti ime Task-a i odabrati opciju Hidden.
		4. Otvoriti tab Triggers i dodati periodu izvršavanja promene.
		5. Otvoriti tab Actions i pritisnuti dugme New...
		6. U polje Program/Script upisati putanju do php.exe fajla
		Primer putanje: C:\wamp64\bin\php\php7.4.0\php.exe
		7. U polje Add arguments upisati putanju do aplikacij i komandu artisan schedule:run
		Primer: C:\wamp64\www\app\artisan schedule:run
		8. Sačuvati Task. Ovim ste omogućili periodično simuliranje senzora.

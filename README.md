## Installatie

Hier worden de stappen, waarmee de applicatie op jouw systeem wordt geïnstalleerd, omschreven.  
Voordat je deze stappen uitvoert moet je Composer en NPM installeren.  
Dit doe je bij de volgende links:  
- Composer: https://getcomposer.org/download/
- NPM: https://nodejs.org/en/

Eerst is het nodig om alle packages via Composer en NPM binnen te halen.  
Dit doe je door de volgende commando's uit te voeren in de project map:

``composer install`` en daarna ``npm install``

Ga daarna naar `config -> database`, en pas de database instellingen aan naar jou toebehoren.

Om gebruik te maken van migrations voer het volgende commando uit: `php database/migrate.php`
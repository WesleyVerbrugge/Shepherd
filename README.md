<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Intial install en basis commando's.
<b>Voor dit project is Composer vereist. Die kun je via: "https://getcomposer.org/" downloaden.</b><br>
Hierna zul je via de command line het composer commando kunnen gebruiken bij elke directory op je device.<br>
Bij de eerte pull van de back-end branch moet je via command line de installatie van composer in de root directory uitvoeren.<br>
Dit doe je door in de root directory "composer install" te runnen.

Daarna wordt er geacht dat je via .env in de root directory de database gegevens van je desbetreffende lokale development omgeving invult. Dingen als de root inlog en database naam. De database moet je dan ook via de SQL tool die je gebruikt van te voren aanmaken.

Laravel maakt gebruikt van zogeheten artisan commando's voor het maken van classes en het vullen van de database met bijvoorbeeld te tabellen en de test data. Dit omdat de tabellen in de code worden gedefiniëert.

Voor het migreren van de database tabellen zodat deze zichtbaar worden
-php artisan migrate // Initieel
-php artisan migrate:refresh/reset //Wanneer aanpassingen aan de migraties zijn gemaakt naar de initiële migreer actie.

Voor het vervolgens toevoegen van test-data gebruik je de het volgende commando
-php artisan db:seed

Hiermee worden een aantal willekeurige test-gebruikers aangemaakt die gebruikt kunnen worden om visiuele aspecten van de UI te testen.
<br>


<h3>Functies die via de routes beschikbaar zijn gemaakt in de back-end. Voorbeeld "localhost:8000/users (index) of localhost:8000/users/1 (show)"</h3><br>

<br><h4>##Available routes for users Includes GET, POST, SHOW, PUT/PATCH and DELETE method. </h4></b><br>
 /users (GET) index <br>
 /users/{id} (GET) show <br>
 
 /users (POST) create <br>
 /users/{id} (PUT/PATCH) update <br>
 
 <b>Beschikbare post en put parameters:</b><br>
  'username' - String van maximaal 20 karakters. <br>
  'e_mail' - Unieke e-mail van maximaal 20 karakters. <br>
  'full_name' => 'Unieke username van maximaal 40 karakters. <br>
 
 /users/{id} (DELETE) delete <br>
 

<br><h4>##Available routes for shifts Includes GET, POST, SHOW, PUT/PATCH and DELETE method. </h4></b><br>
 /shifts (GET) index <br>
 /shifts/{id} (GET) show <br>
 
 /shifts (POST) create <br>
 /shifts/{id} (PUT/PATCH) update <br>
 
 <b>Beschikbare post en put parameters:</b><br>
 'shift_start_details' - Startdatum en tijdstip voor shift <br>
 'shift_end_details' - Einddatum en tijdstip voor shift <br>
 'in_office' - Integer te vullen met 1, 2 of 3 maar ook leeg te laten. Dan zal er automatisch met 1 worden gevuld. Dit staat voor: <br>
  1 = 'Unknown'. <br>
  2 = 'Pressent'. <br>
  3 = 'Out of office'. <br>
 
 /shifts/{id} (DELETE) delete <br>


<br><h4>##Available routes for roles Includes GET, POST, SHOW, PUT/PATCH and DELETE method. </h4></b><br>
 /roles (GET) index <br>
 /roles/{id} (GET) show <br>
 
 /roles (POST) create <br>
 /roles/{id} (PUT/PATCH) update <br>
 
 <b>Beschikbare post en put parameters:</b><br>
 'name' - String en maximaal 20 karakters. <br>
 'description' - String en maximaal 60 karakters. <br>
 'clearance_level' - Integer te vullen met 1, 2 of 3. Dit staat voor: <br>
  1 = 'Employee'. <br>
  2 = 'Team-lead'. <br>
  3 = 'Developer'. <br>
      
 /roles/{id} (DELETE) delete <br>

<br><h4>##Available routes for notifications Includes GET and SHOW method. </h4></b><br>
 /notifications (GET) index <br>
 /notifications/{id} (GET) show <br>
